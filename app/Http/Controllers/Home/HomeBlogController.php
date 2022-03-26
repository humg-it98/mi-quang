<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeBlogController extends Controller
{
    public function index()
    {
        $listPost = Post::with('postcategories')->orderBy('id', 'ASC')->where('post_status','1')->paginate((int)config('contants.PER_PAGE_DEFAULT_ADMIN'));
        $viewData = [
            'listPost' => $listPost,
        ];
        return view('pages.blog.index',$viewData);
    }
    public function detailsPost($id)
    {
        $detailPost = Post::findOrfail($id);
        dd($detailPost);
    }

}
