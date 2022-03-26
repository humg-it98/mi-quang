@extends('layout.admin')


@section('main-admin')
    <div class="body d-flex py-lg-3 py-md-2">
        <div class="container-xxl">
            <div class="row align-items-center">
                <div class="border-0 mb-4">
                    <div
                        class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                        <h3 class="fw-bold mb-0"> Danh Sách Danh Mục Mới Nhất</h3>
                        <div class="col-auto d-flex w-sm-100">
                            <a href="{{route('menu.create')}}">
                                <button type="button" class="btn btn-dark btn-set-task w-sm-100"><i class="icofont-plus-circle me-2 fs-6"></i>Thêm Menu</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Row end  -->

            <div class="row">
                <div class="col-sm-12">
                    <div class="card mb-3">
                        <div class="card-body">
                            <table id="myProjectTable" class="table table-hover align-middle mb-0" style="width:100%">
                                <thead>
                                    <tr>
                                        <th style="width: 50px">#</th>
                                        <th>Tên danh mục</th>
                                        <th>Mô tả</th>
                                        <th>Hình ảnh</th>
                                        <th>Hiện thị</th>
                                        <th>Chức năng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @if(isset($menu))
                                    @foreach ($menu as $item)
                                    <tr>
                                        <td>{{$item->id}}</td>
                                        <td>{{$item->m_name}}</td>
                                        <td>{{$item->m_description}}</td>
                                        <td>
                                            <a href="{{$item->m_avatar_path}}" target="_blank">
                                                <img src="{{$item->m_avatar_path}}" style="with:50px;" >
                                            </a>
                                        </td>
                                        <td>
                                            @if($item->m_status == 1)
                                                <span class="badge bg-success">Hiển thị </span></td>
                                            @else
                                                <span class="badge bg-danger">Đang ẩn</span>
                                            </td>
                                            @endif
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Basic outlined example">
                                                <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal">
                                                    <a class="btn btn-primary btn-sm" href="{{ route('menu.edit',$item->id) }}"><i class="icofont-edit text-success"></i></a>
                                                </button>

                                                <button type="button" class="btn btn-outline-secondary deleterow">
                                                    <a href="{{ route('menu.destroy',$item->id) }}" onclick="removeRow()"><i class="icofont-ui-delete text-danger"></i>
                                                    </a>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
