<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\createProductRequest;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Traits\StorageImageTrait;
use App\Traits\DeleteModelTrait;
use Illuminate\Support\Str;

class AdminProductsController extends Controller
{

    /**
     * @var Product
     */
    private $product;
    use StorageImageTrait;
    use DeleteModelTrait;


    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $product = $this->product->with('categories')->orderBy('id', 'ASC')->paginate((int)config('contants.PER_PAGE_DEFAULT_ADMIN'));
        $viewData = [
            'product' => $product,
        ];
        return  view('admin.product.index', $viewData);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $proCate = ProductCategory::all();
        $viewData = [
            'proCate' => $proCate,
        ];
        return  view('admin.product.create', $viewData);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(createProductRequest $request)
    {
        try {
            $dataInert = [
                'pro_name' => $request->pro_name,
                'pro_slug' => Str::slug($request->pro_name),
                'pro_category_id' => $request->pro_category_id,
                'pro_user_id' => Auth::id(),
                'pro_price' => $request->pro_price,
                'pro_content' => $request->pro_content,
                'pro_description' => $request->pro_description,
                'pro_active' => $request->pro_active,
            ];

            if(!empty($_POST['pro_sale'])) {
                $dataInert['pro_sale'] = $request->pro_sale;
            }else{
                $dataInert['pro_sale'] = $request->pro_price;
            }

            $imageSlider = $this->storageTraitUpload($request, 'pro_avatar', 'product');
            if (!empty($imageSlider)) {
                $dataInert['pro_avatar'] = $imageSlider['file_name'];
                $dataInert['pro_img_path'] = $imageSlider['file_path'];
            }
            $this->product->create($dataInert);
            toastr()->success('Success Create');
            return redirect()->route('products.index');
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
        $product = Product::findOrfail($id);
        $proCate = ProductCategory::all();

        $viewData = [
            'product' => $product,
            'proCate' => $proCate,
        ];
        return  view('admin.product.edit',$viewData);
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
            $product = Product::findOrfail($id);
            $dataInert = [
                'pro_name' => $request->pro_name,
                'pro_slug' => Str::slug($request->pro_name),
                'pro_category_id' => $request->pro_category_id,
                'pro_user_id' => Auth::id(),
                'pro_price' => $request->pro_price,
                'pro_content' => $request->pro_content,
                'pro_description' => $request->pro_description,
                'pro_active' => $request->pro_active,
            ];

            if(!empty($_POST['pro_sale'])) {
                $dataInert['pro_sale'] = $request->pro_sale;
            }else{
                $dataInert['pro_sale'] = $request->pro_price;
            }

            if ($request->pro_avatar) {
                $image_path = public_path().'/'.$product->pro_img_path;
                unlink($image_path);
                $image = $this->storageTraitUpload($request, 'pro_avatar', 'product');
                if (!empty($image)) {
                    $dataInert['pro_avatar'] = $image['file_name'];
                    $dataInert['pro_img_path'] = $image['file_path'];
                }
            }

            $product->update($dataInert);
            toastr()->success('Success Create');
            return redirect()->route('products.index');
        } catch (\Exception $exception) {
            toastr()->error('Error Create');
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
        $this->deleteModelTrait($id,$this->product);
        toastr()->success('Success Delete');
        return redirect()->route('products.index');
    }
}
