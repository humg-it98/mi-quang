@extends('layout.admin')


@section('main-admin')
    <div class="body d-flex py-lg-3 py-md-2">
        <div class="container-xxl">
            <div class="row align-items-center">
                <div class="border-0 mb-4">
                    <div
                        class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                        <h3 class="fw-bold mb-0"> Tạo chức năng quyền</h3>
                    </div>
                </div>
            </div>

            <!-- Add Tickit-->
            <div class="modal-body">
                <div class="deadline-form">
                     <form action="{{route('permission.store')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label>Chọn Module</label>
                            <select class="form-control" name="module_parent">
                                <option value="">Chọn module</option>
                                @foreach (config('permissions.table_module') as $moduleItem)

                                    <option value="{{$moduleItem}}">{{$moduleItem}}</option>

                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <br>
                            <div class="row">
                                @foreach (config('permissions.module_children') as $moduleItemChildren )
                                    <div class="col-md-3">
                                        <label>
                                            <input type="checkbox" multiple name="module_child[]" value="{{$moduleItemChildren}}">
                                            {{$moduleItemChildren}}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                         <div class="modal-footer">
                             <a href="{{route('slider.index')}}"><button type="button" class="btn btn-secondary">Hủy</button></a>
                             <button type="submit" class="btn btn-primary" >Thêm quyền</button>
                         </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
