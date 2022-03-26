@extends('layout.admin')

@section('css')
    <link href="{{ asset('admin/custom/select2/select2.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin/custom/user/add.css') }}" rel="stylesheet" />
@endsection

@section('main-admin')
    <div class="body d-flex py-lg-3 py-md-2">
        <div class="container-xxl">
            <div class="row align-items-center">
                <div class="border-0 mb-4">
                    <div
                        class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                        <h3 class="fw-bold mb-0"> Thêm User Mới</h3>
                    </div>
                </div>
            </div>

            <!-- Add Tickit-->
            <div class="modal-body">
                <div class="deadline-form">
                    <form action="{{route('users.store')}}" method="post">
                        @csrf
                        <div class="row">
                            <label class="form-label">Tên user</label>
                            <input type="text" name="name" value="{{old('name')}}"class="form-control" placeholder="Nhập tên">
                            @if ($errors->first('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif
                        </div>

                        <div class="row">
                               <label class="form-label">Email</label>
                               <input type="text" name="email" value="{{old('email')}}"class="form-control" placeholder="Nhập email">
                               @if ($errors->first('email'))
                                   <span class="text-danger">{{ $errors->first('email') }}</span>
                               @endif
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <label>Chọn vai trò</label>
                                    <select class="form-control select2_init" name="role_id[]" multiple>
                                        @foreach ($roles as $role)
                                            <option value="{{$role->id}}">{{$role->name}}</option>
                                        @endforeach
                                    </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <label for="menu" class="form-label">Ảnh</label>
                                <img id="preview-image" src="{{asset('admin/img/image-notfound.png')}}" class="img-thumbnail" style="width: 220px;height:200px" alt="">
                                <br>
                                <input type="file" name="avatar" id="image" class="js-upload">
                                <br>
                                @if ($errors->first('avatar'))
                                    <span class="text-danger">{{ $errors->first('avatar') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="modal-footer">
                            <a href="{{route('users.index')}}" class="btn btn-secondary">Hủy</a>
                            <button type="submit" class="btn btn-primary">Thêm</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('admin/custom/select2/select2.min.js') }}"></script>
    <script src="{{ asset('admin/custom/user/add.js') }}"></script>
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
