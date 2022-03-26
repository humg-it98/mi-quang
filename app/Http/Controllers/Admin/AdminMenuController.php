<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\createMenuRequest;
use App\Models\Menu;
use App\Traits\DeleteModelTrait;
use App\Traits\StorageImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AdminMenuController extends Controller
{

    /**
     * @var Menu
     */
    private $menu;
    use StorageImageTrait;
    use DeleteModelTrait;

    public function __construct(Menu $menu)
    {
        $this->menu = $menu;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $menu = $this->menu->orderBy('id', 'DESC')->paginate((int)config('contants.PER_PAGE_DEFAULT_ADMIN'));
        $viewData = [
            'menu' => $menu,
        ];
        return  view('admin.menu.index', $viewData);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return  view('admin.menu.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(createMenuRequest $request)
    {
        try {
            $dataInert = [
                'm_name' => $request->m_name,
                'm_description' => $request->m_description,
                'm_url' => $request->m_url,
                'm_status' => $request->m_status,
            ];

            $imageSlider = $this->storageTraitUpload($request, 'm_avatar', 'menu');
            if (!empty($imageSlider)) {
                $dataInert['m_avatar'] = $imageSlider['file_name'];
                $dataInert['m_avatar_path'] = $imageSlider['file_path'];
            }
            $this->menu->create($dataInert);
            toastr()->success('Success Create');
            return redirect()->route('menu.index');
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
        $menu = Menu::findOrfail($id);
        $viewData = [
            'menu' => $menu,
        ];
        return  view('admin.menu.edit',$viewData);
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
        try {
            $menu = Menu::findOrfail($id);
            $dataInert = [
                'm_name' => $request->m_name,
                'm_description' => $request->m_description,
                'm_url' => $request->m_url,
                'm_status' => $request->m_status,
            ];
            if ($request->m_avatar) {
                $image_path = public_path().'/'.$menu->pro_img_path;
                unlink($image_path);
                $image = $this->storageTraitUpload($request, 'm_avatar', 'menu');
                if (!empty($image)) {
                    $dataInert['pro_avatar'] = $image['file_name'];
                    $dataInert['pro_img_path'] = $image['file_path'];
                }
            }
            $imageSlider = $this->storageTraitUpload($request, 'm_avatar', 'menu');
            if (!empty($imageSlider)) {
                $dataInert['m_avatar'] = $imageSlider['file_name'];
                $dataInert['m_avatar_path'] = $imageSlider['file_path'];
            }
            $menu->update($dataInert);
            toastr()->success('Success Update');
            return redirect()->route('menu.index');
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
        $this->deleteModelTrait($id,$this->menu);
        toastr()->success('Success Delete');
        return redirect()->route('menu.index');
    }
}
