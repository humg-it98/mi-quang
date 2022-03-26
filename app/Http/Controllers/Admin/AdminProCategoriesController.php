<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Traits\DeleteModelTrait;

class AdminProCategoriesController extends Controller
{

    /**
     * @var ProductCategory
     */
    private $pro_cate;
    use DeleteModelTrait;

    public function __construct(ProductCategory $pro_cate)
    {
        $this->pro_cate = $pro_cate;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $pro_cate = ProductCategory::paginate((int)config('contants.PER_PAGE_DEFAULT_ADMIN'));
        $viewData = [
            'pro_cate'           => $pro_cate,
        ];
        return  view('admin.productcategories.index', $viewData);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return  view('admin.productcategories.create');
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
            'p_c_slug' => Str::slug($request->name),
            'p_c_active' => $request->active,
        ];
        $this->pro_cate->create($dataInert);
        toastr()->success('Success Create');
        return redirect()->route('procategories.index');
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
        $proCate = ProductCategory::findOrfail($id);

        $viewData = [
            'proCate'           => $proCate,
        ];
        return  view('admin.productcategories.edit',$viewData);
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
        $proCate = ProductCategory::findOrfail($id);
        $this->validate($request,
            [
                'p_c_name' => 'required',
            ],
            [
                'p_c_name.required' => 'Dữ Liệu không để trống',
            ]);
        $dataInert = [
            'p_c_name' => $request->p_c_name,
            'p_c_slug' => Str::slug($request->p_c_name),
            'p_c_active' => $request->p_c_active,
        ];
        $proCate->update($dataInert);
        toastr()->success('Success Create');
        return redirect()->route('procategories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $this->deleteModelTrait($id,$this->pro_cate);
        toastr()->success('Success Delete');
        return redirect()->route('procategories.index');
    }
}
