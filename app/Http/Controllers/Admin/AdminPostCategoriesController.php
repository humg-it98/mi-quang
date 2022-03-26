<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PostCategory;
use App\Traits\DeleteModelTrait;
use Illuminate\Http\Request;

class AdminPostCategoriesController extends Controller
{
    /**
     * @var $postCate
     */
    private $postCate;
    use DeleteModelTrait;

    public function __construct(PostCategory $postCate)
    {
        $this->postCate = $postCate;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $postCate = PostCategory::paginate((int)config('contants.PER_PAGE_DEFAULT_ADMIN'));
        $viewData = [
            'postCate'           => $postCate,
        ];
        return  view('admin.postcategories.index', $viewData);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return  view('admin.postcategories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $this->validate($request,
            [
                'name' => 'required',
            ],
            [
                'name.required' => 'Dữ Liệu không để trống',

            ]);
        $dataInert = [
            'p_c_name' => $request->name,
            'p_c_status' => $request->active,
        ];
        $this->postCate->create($dataInert);
        toastr()->success('Success Create');
        return redirect()->route('postcategories.index');
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
        $postCate = PostCategory::findOrfail($id);

        $viewData = [
            'postCate'           => $postCate,
        ];
        return  view('admin.postcategories.edit',$viewData);
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
        $postCate = PostCategory::findOrfail($id);
        $this->validate($request,
            [
                'p_c_name' => 'required',
            ],
            [
                'p_c_name.required' => 'Dữ Liệu không để trống',
            ]);
        $dataInert = [
            'p_c_name' => $request->p_c_name,
            'p_c_status' => $request->p_c_active,
        ];
        $postCate->update($dataInert);
        toastr()->success('Success Update');
        return redirect()->route('postcategories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $this->deleteModelTrait($id,$this->postCate);
        toastr()->success('Success Delete');
        return redirect()->route('postcategories.index');
    }
}
