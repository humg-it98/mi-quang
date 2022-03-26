@extends('layout.admin')


@section('main-admin')
    <div class="body d-flex py-lg-3 py-md-2">
        <div class="container-xxl">
            <div class="row align-items-center">
                <div class="border-0 mb-4">
                    <div
                        class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                        <h3 class="fw-bold mb-0"> Thêm Bài viết Mới</h3>
                    </div>
                </div>
            </div>

            <!-- Add Tickit-->
            <div class="modal-body">
                <div class="deadline-form">
                    <form action="{{route('posts.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <label class="form-label">Tiêu đề</label>
                                <input type="text" name="post_name" value="{{old('post_name')}}"class="form-control" placeholder="Nhập tiêu đề bài viết">
                                @if ($errors->first('post_name'))
                                    <span class="text-danger">{{ $errors->first('post_name') }}</span>
                                @endif
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Danh mục</label>
                                <select class="form-select" name="post_cate_id">
                                    @foreach($postCate as $key =>$item)
                                        <option value="{{$item->id}}">{{$item->p_c_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label for="menu" class="form-label"> Ảnh</label>
                            <img id="preview-image" src="{{asset('admin/img/image-notfound.png')}}" class="img-thumbnail" style="width: 220px;height:200px" alt="">
                            <br>
                            <input type="file" name="post_avatar" id="image" class="js-upload">
                            <br>
                            @if ($errors->first('post_avatar'))
                                <span class="text-danger">{{ $errors->first('post_avatar') }}</span>
                            @endif
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Mô tả</label>
                            <textarea class="form-control" name="post_content" rows="3">{{old('post_content')}}</textarea>
                            @if ($errors->first('post_content'))
                                <span class="text-danger">{{ $errors->first('post_content') }}</span>
                            @endif
                        </div>

                        <div class="mb-12">
                            <label class="form-label">Nội dung</label>
                            <textarea class="form-control" name="post_description" rows="3" id="ckeditor" placeholder="Nội dung mô tả">{{old('post_description')}}</textarea>
                            @if ($errors->first('post_description'))
                                <span class="text-danger">{{ $errors->first('post_description') }}</span>
                            @endif
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Kích hoạt</label>
                            <div>
                                <input type="radio" id="active" value="1" name="post_status" checked="">
                                <label for="active">Có</label>
                            </div>
                            <div>
                                <input type="radio" id="no_active" value="0" name="post_status">
                                <label for="no_active">Không</label>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <a href="{{route('posts.index')}}" class="btn btn-secondary">Hủy</a>
                            <button type="submit" class="btn btn-primary" >Thêm bài viết</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{asset('admin/ckeditor/ckeditor.js')}}"></script>
    <script>
        CKEDITOR.replace('ckeditor');
    </script>
    <script type="text/javascript">
        $('#image').change(function(){

            let reader = new FileReader();
            reader.onload = (e) => {
                $('#preview-image').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);

        });
    </script>
@endsection
