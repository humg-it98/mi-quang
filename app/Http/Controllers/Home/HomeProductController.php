<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeProductController extends Controller
{
    public function details_product($pro_slug)
    {
        $product = Product::with('categories')->where('pro_slug', $pro_slug)->first();
        $product_related = Product::with('categories')
            ->where([['pro_category_id', '=', $product['pro_category_id']], ['id', '<>', $product['id']]])->get();
        $viewData = [
          'product' => $product,
          'product_related' => $product_related,
        ];
        return view('pages.product.detail',$viewData);
    }

}
