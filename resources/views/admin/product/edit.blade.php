@extends('layout.admin')


@section('main-admin')
    <div class="body d-flex py-lg-3 py-md-2">
        <div class="container-xxl">
            <div class="row align-items-center">
                <div class="border-0 mb-4">
                    <div
                        class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                        <h3 class="fw-bold mb-0"> Sửa Sản Phẩm </h3>
                    </div>
                </div>
            </div>

            <!-- Add Tickit-->
            <div class="modal-body">
                <div class="deadline-form">
                    <form action="{{ route('products.update',['id'=>$product->id]) }}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <label class="form-label">Tên sản phẩm</label>
                                <input type="text" name="pro_name" value="{{$product->pro_name}}"class="form-control" placeholder="Nhập tên sản phẩm">
                                @if ($errors->first('pro_name'))
                                    <span class="text-danger">{{ $errors->first('pro_name') }}</span>
                                @endif
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Danh mục</label>
                                <select class="form-select" name="pro_category_id">
                                    @foreach($proCate as $key =>$item)
                                        <option {{ ($product->pro_category_id == $item->id ) ? 'selected' : '' }} value="{{$item->id}}">{{$item->p_c_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <label class="form-label">Giá gốc</label>
                                <input type="number" name="pro_price" value="{{$product->pro_price}}" id="price" class="form-control">
                                @if ($errors->first('pro_price'))
                                    <span class="text-danger">{{ $errors->first('pro_price') }}</span>
                                @endif
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Giá giảm (nếu có)</label>
                                <input type="number" name="pro_sale" value="{{$product->pro_sale}}" id="price" class="form-control">
                                @if ($errors->first('pro_sale'))
                                    <span class="text-danger">{{ $errors->first('pro_sale') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Mô tả</label>
                            <textarea class="form-control" name="pro_content" placeholder="Nội dung mô tả">{{$product->pro_content}}</textarea>
                            @if ($errors->first('pro_content'))
                                <span class="text-danger">{{ $errors->first('pro_content') }}</span>
                            @endif
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Mô tả chi tiết</label>
                            <textarea class="form-control" name="pro_description" id="content" rows="3" placeholder="Nội dung mô tả chi tiết">{{$product->pro_description}}</textarea>
                            @if ($errors->first('pro_description'))
                                <span class="text-danger">{{ $errors->first('pro_description') }}</span>
                            @endif
                        </div>

                        <div class="col-md-6">
                            <label for="menu" class="form-label"> Ảnh</label>
                            <img id="preview-image" src="{{$product->pro_img_path}}" class="img-thumbnail" style="width: 220px;height:200px" alt="">
                            <br>
                            <input type="file" name="pro_avatar" id="image" class="js-upload">
                            <br>
                            @if ($errors->first('pro_avatar'))
                                <span class="text-danger">{{ $errors->first('pro_avatar') }}</span>
                            @endif
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Kích hoạt</label>
                            <div>
                                <input type="radio" id="active" value="1" name="pro_active" {{ ($product->pro_active == 1) ? 'checked' : '' }}>
                                <label for="active" >Có</label>
                            </div>
                            <div>
                                <input type="radio" id="no_active" value="0" name="pro_active" {{ ($product->pro_active == 0) ? 'checked' : '' }}>
                                <label for="no_active" >Không</label>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <a href="{{route('products.index')}}" class="btn btn-secondary">Hủy</a>
                            <button type="submit" class="btn btn-primary" >Thêm sản phẩm</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')

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
