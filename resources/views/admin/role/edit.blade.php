@extends('layout.admin')

@section('css')
    <link rel="stylesheet" href="{{asset('admin/custom/role/add.css')}}">
@endsection

@section('main-admin')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <form action="{{route('roles.update',['id'=>$role->id])}}" method="post" enctype="multipart/form-data" style="width:100%">
                    <div class="col-md-12">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label>Tên vai trò</label>
                            <input type="text" name="name" value="{{$role->name}}" class="form-control" placeholder="Nhập tên vai trò">
                        </div>

                        <div class="form-group">
                            <label>Mô tả vai trò</label>
                            <textarea type="text" name="display_name" rows="3" class="form-control" placeholder="Mô tả vai trò">{{$role->display_name}}</textarea>
                        </div>

                        <div class="form-group">
                            <label>Quyền trên hệ thống</label>
                        </div>

                    </div>

                    <div class="col-md-12">
                        <div class="row">

                            <div class="col-md-12">
                                <label>
                                    <input type="checkbox" class="checkall">
                                    Chọn tất cả quyền
                                </label>
                            </div>

                            @foreach ($permissionParent as $permissionParentItem)
                                <div class="card border-primary mb-3 col-md-12">
                                    <div class="card-header">
                                        <label>
                                            <input type="checkbox" class="checkbox_wrapper">
                                            {{$permissionParentItem->name}}
                                        </label>

                                    </div>

                                    <div class="row">
                                        @foreach ($permissionParentItem->permissionsChildren as $permissionsChildrenItem)
                                            <div class="card-body text-primary col-md-3">
                                                <h5 class="card-title">
                                                    <label>
                                                        <input type="checkbox" class="checkbox_children"
                                                               {{$permissionsChecked->contains('id',$permissionsChildrenItem->id) ?'checked' : ''}}
                                                               name="permission_id[]"
                                                               value="{{$permissionsChildrenItem->id}}">
                                                        {{$permissionsChildrenItem->name}}
                                                    </label>

                                                </h5>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="{{route('roles.index')}}" class="btn btn-secondary">Hủy</a>
                        <button type="submit" class="btn btn-primary">Sửa</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{asset('admin/custom/role/add.js')}}"></script>
@endsection
