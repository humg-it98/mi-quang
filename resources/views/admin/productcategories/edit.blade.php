@extends('layout.admin')


@section('main-admin')
    <div class="body d-flex py-lg-3 py-md-2">
        <div class="container-xxl">
            <div class="row align-items-center">
                <div class="border-0 mb-4">
                    <div
                        class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                        <h3 class="fw-bold mb-0"> Sửa Danh Mục Mới</h3>
                    </div>
                </div>
            </div>

            <!-- Add Tickit-->
            <div class="modal-body">
                <div class="deadline-form">
                    <form action="{{  route('procategories.update',['id'=>$proCate->id]) }}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <label class="form-label">Tên tiêu đề</label>
                                <input type="text" name="p_c_name" class="form-control" value="{{$proCate->p_c_name}}">
                                @if ($errors->first('p_c_name '))
                                    <span class="text-danger">{{ $errors->first('p_c_name ') }}</span>
                                @endif
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Kích hoạt</label>
                                <div>
                                    <input type="radio" id="active" value="1" name="p_c_active" {{ ($proCate->p_c_active == 1) ? 'checked' : '' }}>
                                    <label for="active">Có</label>
                                </div>
                                <div>
                                    <input type="radio" id="active" value="0" name="p_c_active" {{ ($proCate->p_c_active == 0) ? 'checked' : '' }}>
                                    <label for="no_active">Không</label>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                                <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Tạo</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection


