
@extends('layout.admin')


@section('main-admin')

    <div class="body d-flex py-lg-3 py-md-2">
        <div class="row align-items-center">
            <div class="border-0 mb-4">
                <div
                    class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                    <h3 class="fw-bold mb-0"> Danh Sách Món Ăn</h3>
                    <div class="col-auto d-flex w-sm-100">
                        <a href="{{route('users.create')}}"><button type="button" class="btn btn-dark btn-set-task w-sm-100"><i class="icofont-plus-circle me-2 fs-6"></i>Thêm người dùng</button></a>
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
                                <th style="width: 220px">Tên </th>
                                <th scope="col">Email</th>
                                <th>Hình</th>
                                <th scope="col">Hành động</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(isset($users))
                                @foreach ($users as $item)
                                    <tr>
                                        <th scope="row">{{ $item->id}}</th>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->email}}</td>
                                        <td>
                                            <a href="{{$item->avatar}}" target="_blank">
                                                <img src="{{$item->avatar}}" style="height:50px;border-radius:50%;" >
                                            </a>
                                        </td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Basic outlined example">
                                                <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal">
                                                    <a class="btn btn-primary btn-sm" href="{{ route('users.edit',$item->id) }}"><i class="icofont-edit text-success"></i></a>
                                                </button>

                                                <button type="button" class="btn btn-outline-secondary deleterow">
                                                    <a href="{{route('users.destroy',$item->id)}}" onclick="removeRow()"><i class="icofont-ui-delete text-danger"></i></a>
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

        <nav role="navigation" aria-label="Pagination Navigation" class="flex items-center justify-between">
            {!! $users->links() !!}
        </nav>

    </div>
    </div>

@endsection
