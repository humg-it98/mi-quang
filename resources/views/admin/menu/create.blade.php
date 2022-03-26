@extends('layout.admin')


@section('main-admin')
    <div class="body d-flex py-lg-3 py-md-2">
        <div class="container-xxl">
            <div class="row align-items-center">
                <div class="border-0 mb-4">
                    <div
                        class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                        <h3 class="fw-bold mb-0"> Thêm Menu mới</h3>
                    </div>
                </div>
            </div>

            <!-- Add Tickit-->
            <div class="modal-body">
                <div class="deadline-form">
                    <form action="{{route('menu.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <label class="form-label">Tên danh mục</label>
                                <input type="text" name="m_name" value="{{old('m_name')}}" class="form-control">
                                @if ($errors->first('m_name'))
                                    <span class="text-danger">{{ $errors->first('m_name') }}</span>
                                @endif
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Đường dẫn</label>
                                <input type="text" name="m_url" value="{{old('m_url')}}" class="form-control">
                                @if ($errors->first('m_url'))
                                    <span class="text-danger">{{ $errors->first('m_url') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Mô tả</label>
                            <textarea class="form-control" name="m_description" rows="3" placeholder="Nội dung mô tả">{{old('m_description')}}</textarea>
                            @if ($errors->first('m_description'))
                                <span class="text-danger">{{ $errors->first('m_description') }}</span>
                            @endif
                        </div>

                        <div class="col-md-6">
                            <label for="menu" class="form-label">Ảnh</label>
                            <img id="preview-image" src="{{asset('admin/img/image-notfound.png')}}" class="img-thumbnail" style="width: 220px;height:200px" alt="">
                            <br>
                            <input type="file" name="m_avatar" id="image" class="js-upload">
                            <br>
                            @if($errors->first('m_avatar'))
                                <span class="text-danger">{{ $errors->first('m_avatar') }}</span>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Kích hoạt</label>
                            <div>
                                <input type="radio" id="active" value="1" name="m_status" checked>
                                <label for="active">Có</label>
                            </div>
                            <div>
                                <input type="radio" id="no_active" value="0" name="m_status">
                                <label for="no_active">Không</label>
                            </div>
                        </div>


                        <div class="modal-footer">
                            <a href="{{route('menu.index')}}"><button type="button" class="btn btn-secondary">Hủy</button></a>
                            <button type="submit" class="btn btn-primary" >Thêm Menu</button>
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

