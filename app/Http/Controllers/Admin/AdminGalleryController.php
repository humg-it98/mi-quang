<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\createGalleryRequest;
use App\Models\Gallery;
use App\Traits\DeleteModelTrait;
use App\Traits\StorageImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AdminGalleryController extends Controller
{
    /**
     * @var Gallery
     */
    private $gallery;
    use StorageImageTrait;
    use DeleteModelTrait;

    public function __construct(Gallery $gallery)
    {
        $this->gallery = $gallery;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $galleries = Gallery::paginate((int)config('contants.PER_PAGE_DEFAULT_ADMIN'));
        $viewData = [
            'galleries'           => $galleries,
        ];
        return view('admin.galleries.index',$viewData);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.galleries.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(createGalleryRequest $request)
    {
        $dataInert = [
            'g_active' => $request->g_active,
        ];
        $image = $this->storageTraitUpload($request, 'g_name', 'gallery');
        if (!empty($image)) {
            $dataInert['g_name'] = $image['file_name'];
            $dataInert['g_path'] = $image['file_path'];
        }
        $this->gallery->create($dataInert);
        toastr()->success('Success Create');
        return redirect()->route('galleries.index');
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
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $galleries = Gallery::findOrfail($id);

        $viewData = [
            'galleries'           => $galleries,
        ];
        return view('admin.galleries.edit', $viewData);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(createGalleryRequest $request, $id)
    {
        $galleries = Gallery::findOrfail($id);
        $dataInert = [
            'g_active' => $request->g_active,
        ];
        if ($request->g_name) {
            $image_path = public_path().'/'.$galleries->g_path;
            unlink($image_path);
            $image = $this->storageTraitUpload($request, 'g_name', 'gallery');
            if (!empty($image)) {
                $dataInert['g_name'] = $image['file_name'];
                $dataInert['g_path'] = $image['file_path'];
            }
        }

        $galleries->update($dataInert);
        toastr()->success('Success Update');
        return redirect()->route('galleries.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $this->deleteModelTrait($id,$this->gallery);
        toastr()->success('Success Delete');
        return redirect()->route('galleries.index');
    }

}
