@extends('layout.admin')


@section('main-admin')
    <div class="body d-flex py-lg-3 py-md-2">
        <div class="container-xxl">
            <div class="row align-items-center">
                <div class="border-0 mb-4">
                    <div
                        class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                        <h3 class="fw-bold mb-0"> Thêm bài viết giới thiệu cửa hàng</h3>
                    </div>
                </div>
            </div>

            <!-- Add Tickit-->
            <div class="modal-body">
                <div class="deadline-form">
                    <form action="{{route('about.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Mô tả thông tin</label>
                            <textarea class="form-control" name="ab_description" rows="4" id="ckeditor" placeholder="Nhap ....">{{ old('ab_description') }}</textarea>
                            @if ($errors->first('ab_description'))
                                <span class="text-danger">{{ $errors->first('ab_description') }}</span>
                            @endif
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Địa chỉ (dùng &lt;<b>br</b>&gt; để xuống hàng)</label>
                            <textarea class="form-control" name="ab_address" rows="4">{{ old('ab_address') }}</textarea>
                            @if ($errors->first('ab_address'))
                                <span class="text-danger">{{ $errors->first('ab_address') }}</span>
                            @endif
                        </div>


                        <div class="row">
                            <div class="col-md-6">
                                <label class="form-label">Địa chỉ email</label>
                                <input type="text" value="{{old('ab_email')}}" name="ab_email" class="form-control">
                                @if ($errors->first('ab_email'))
                                    <span class="text-danger">{{ $errors->first('ab_email') }}</span>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Số điện thoaị</label>
                                <input type="text" name="ab_phone" value="{{old('ab_phone')}}" class="form-control">
                                @if ($errors->first('ab_phone'))
                                    <span class="text-danger">{{ $errors->first('ab_phone') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <label class="form-label">Thời gian mở cửa</label>
                                <input type="text" name="ab_openH" value="{{old('ab_openH')}}" class="form-control">
                                @if ($errors->first('ab_openH'))
                                    <span class="text-danger">{{ $errors->first('ab_openH') }}</span>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Địa chỉ bản đồ</label>
                                <input type="text" name="ab_map" value="{{old('ab_map')}}" class="form-control" placeholder="https://www.google.com/maps/...">
                                @if ($errors->first('ab_map'))
                                    <span class="text-danger">{{ $errors->first('ab_map') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label for="menu" class="form-label"> Ảnh</label>
                            <img id="preview-image" src="{{asset('admin/img/image-notfound.png')}}" class="img-thumbnail" style="width: 220px;height:200px" alt="">
                            <br>
                            <input type="file" name="ab_img" id="image" class="js-upload">
                            <br>
                            @if ($errors->first('ab_img'))
                                <span class="text-danger">{{ $errors->first('ab_img') }}</span>
                            @endif
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary"><a href="{{route('about.index')}}">Hủy</a></button>
                            <button type="submit" class="btn btn-primary">Cập nhật</button>
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



