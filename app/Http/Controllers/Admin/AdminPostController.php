<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\createPostRequest;
use App\Models\Post;
use App\Models\PostCategory;
use App\Traits\DeleteModelTrait;
use App\Traits\StorageImageTrait;
use Illuminate\Http\Request;

class AdminPostController extends Controller
{
    private $post;
    use StorageImageTrait;
    use DeleteModelTrait;


    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $post = $this->post->orderBy('id', 'ASC')->paginate((int)config('contants.PER_PAGE_DEFAULT_ADMIN'));
        $viewData = [
            'post' => $post,
        ];
        return  view('admin.post.index', $viewData);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $postCate = PostCategory::all();
        $viewData = [
            'postCate' => $postCate,
        ];
        return  view('admin.post.create', $viewData);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(createPostRequest $request)
    {
        try {
            $dataInert = [
                'post_name' => $request->post_name,
                'post_cate_id' => $request->post_cate_id,
                'post_content' => $request->post_content,
                'post_description' => $request->post_description,
                'post_status' => $request->post_status,
            ];


            $imageSlider = $this->storageTraitUpload($request, 'post_avatar', 'post');
            if (!empty($imageSlider)) {
                $dataInert['post_avatar'] = $imageSlider['file_path'];
            }
            $this->post->create($dataInert);
            toastr()->success('Success Create');
            return redirect()->route('posts.index');
        } catch (\Exception $exception) {
            toastr()->error('Error Create');
            echo ("Lỗi : " . $exception->getMessage() . "--Line : " . $exception->getLine());
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
        $post = Post::findOrfail($id);
        $postCate = PostCategory::all();

        $viewData = [
            'post' => $post,
            'postCate' => $postCate,
        ];
        return  view('admin.post.edit',$viewData);
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
            $post = Post::findOrfail($id);
            $dataInert = [
                'post_name' => $request->post_name,
                'post_cate_id' => $request->post_cate_id,
                'post_content' => $request->post_content,
                'post_description' => $request->post_description,
                'post_status' => $request->post_status,
            ];


            if ($request->pro_avatar) {
                $image_path = public_path().'/'.$post->post_avatar;
                unlink($image_path);
                $image = $this->storageTraitUpload($request, 'post_avatar', 'post');
                if (!empty($image)) {
                    $dataInert['post_avatar'] = $image['file_path'];
                }
            }

            $post->update($dataInert);
            toastr()->success('Success Update');
            return redirect()->route('posts.index');
        } catch (\Exception $exception) {
            toastr()->error('Error Create');
            echo ("Lỗi : " . $exception->getMessage() . "--Line : " . $exception->getLine());
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
        $this->deleteModelTrait($id,$this->post);
        toastr()->success('Success Delete');
        return redirect()->route('posts.index');
    }
}
