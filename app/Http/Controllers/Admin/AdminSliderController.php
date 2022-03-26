<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\createSliderRequest;
use App\Models\Slider;
use App\Traits\DeleteModelTrait;
use App\Traits\StorageImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AdminSliderController extends Controller
{
    private $slider;
    use DeleteModelTrait;
    use StorageImageTrait;

    public function __construct(Slider $slider)
    {
        $this->slider = $slider;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $slider = Slider::paginate((int)config('contants.PER_PAGE_DEFAULT_ADMIN'));
        $viewData = [
            'slider'           => $slider,
        ];
        return  view('admin.slider.index', $viewData);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(createSliderRequest $request)
    {
        try {
            $dataInert = [
                'sli_name' => $request->sli_name ,
                'sli_description' => $request->sli_description,
                'sli_button' => $request->sli_button,
                'sli_url' => $request->sli_url,
                'sort_by' => $request->sort_by,
                'sli_status' => $request->sli_status,
            ];

            $imageSlider = $this->storageTraitUpload($request, 'sli_avatar', 'slider');
            if (!empty($imageSlider)) {
                $dataInert['sli_avatar'] = $imageSlider['file_name'];
                $dataInert['sli_avatar_path'] = $imageSlider['file_path'];
            }
            $this->slider->create($dataInert);
            toastr()->success('Success Create');
            return redirect()->route('slider.index');
        } catch (\Exception $exception) {
            toastr()->error('Error Create');
            Log::error("Lỗi : " . $exception->getMessage() . "--Line : " . $exception->getLine());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit($id)
    {
        $slider = Slider::findOrfail($id);

        $viewData = [
            'slider'           => $slider,
        ];
        return  view('admin.slider.edit',$viewData);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $slider = Slider::findOrfail($id);
        try {
            $dataInert = [
                'sli_name' => $request->sli_name ,
                'sli_description' => $request->sli_description,
                'sli_button' => $request->sli_button,
                'sli_url' => $request->sli_url,
                'sort_by' => $request->sort_by,
                'sli_status' => $request->sli_status,
            ];

            if ($request->sli_avatar) {
                $image_path = public_path().'/'.$slider->sli_avatar_path;
                unlink($image_path);
                $image = $this->storageTraitUpload($request, 'sli_avatar', 'slider');
                if (!empty($image)) {
                    $dataInert['sli_avatar'] = $image['file_name'];
                    $dataInert['sli_avatar_path'] = $image['file_path'];
                }
            }

            $slider->update($dataInert);
            toastr()->success('Success Update');
            return redirect()->route('slider.index');
        } catch (\Exception $exception) {
            toastr()->error('Error Update');
            Log::error("Lỗi : " . $exception->getMessage() . "--Line : " . $exception->getLine());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $this->deleteModelTrait($id,$this->slider);
        toastr()->success('Success Delete');
        return redirect()->route('slider.index');
    }
}
