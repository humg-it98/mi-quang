<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Menu;
use App\Models\Post;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $viewData = [
            'post' => Post::with('postcategories')->where('post_status', '1')->orderBy('id', 'DESC')->take(5)->get(),
            'product' => Product::with('categories')->where('pro_active', '1')->orderBy('id', 'ASC')->take(4)->get(),
            'product_new' => Product::with('categories')->where('pro_active', '1')->orderBy('id', 'DESC')->take(4)->get(),
            'product_cate' => Product::with('categories')->where('pro_active', '1')->orderBy('id', 'DESC')->take(4)->get(),
            'slider' =>  Slider::where('sli_status', '1')->orderBy('sort_by', 'DESC')->take(5)->get(),
            'menu' =>  Menu::where('m_status', '1')->orderBy('id', 'DESC')->take(3)->get(),
            'about' => About::all(),
        ];
        return view('pages.home',$viewData);
    }

}
