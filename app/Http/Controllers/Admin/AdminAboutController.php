<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\createAboutRequest;
use App\Models\about;
use App\Traits\StorageImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AdminAboutController extends Controller
{
    use StorageImageTrait;
    private $about;
    public function __construct(About $about)
    {
        $this->about = $about;
    }

    public function index()
    {
        $about = About::paginate((int)config('contants.PER_PAGE_DEFAULT_ADMIN'));
        $viewData = [
            'about'           => $about,
        ];
        return view('admin.about.index',$viewData);
    }

    public function create()
    {
        return view('admin.about.create');
    }

    public function store(createAboutRequest $request)
    {
        try {
            $dataInert = [
                'ab_description' => $request->ab_description,
                'ab_address' => $request->ab_address,
                'ab_email' => $request->ab_email,
                'ab_map' => $request->ab_map,
                'ab_phone' => $request->ab_phone,
                'ab_openH' => $request->ab_openH,
            ];

            $imageSlider = $this->storageTraitUpload($request, 'ab_img', 'about');
            if (!empty($imageSlider)) {
                $dataInert['ab_img'] = $imageSlider['file_name'];
                $dataInert['ab_img_path'] = $imageSlider['file_path'];
            }
            $this->about->create($dataInert);
            toastr()->success('Success Create');
            return redirect()->route('about.index');
        } catch (\Exception $exception) {
            toastr()->error('Error Create');
            Log::error("Lỗi : " . $exception->getMessage() . "--Line : " . $exception->getLine());
        }
    }

    public function edit($id)
    {
        $about = about::findOrfail($id);
        $viewData = [
            'about'           => $about,
        ];
        return view('admin.about.edit',$viewData);
    }

    public function update(Request $request, $id)
    {
        $about = About::findOrfail($id);
        $dataInert = [
            'ab_description' => $request->description,
            'ab_address' => $request->address,
            'ab_email' => $request->email,
            'ab_map' => $request->map,
            'ab_phone' => $request->phone,
            'ab_openH' => $request->openH,
        ];
        if ($request->ab_img)
        {
            $image_path = public_path().'/'.$about->ab_img_path;
            unlink($image_path);
            $image = $this->storageTraitUpload($request, 'ab_img', 'about');
            if (!empty($image)) {
                $dataInert['ab_img'] = $image['file_name'];
                $dataInert['ab_img_path'] = $image['file_path'];
            }
        }

        $about->update($dataInert);
        toastr()->success('Success Update');
        return redirect()->route('about.index');

    }

    public function destroy($id)
    {
        $this->deleteModelTrait($id,$this->about);
        toastr()->success('Success Delete');
        return redirect()->route('about.index');
    }

}
