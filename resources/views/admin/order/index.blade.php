
@extends('layout.admin')


@section('main-admin')

    <div class="body d-flex py-lg-3 py-md-2">
        <div class="row align-items-center">
            <div class="border-0 mb-4">
                <div
                    class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                    <h3 class="fw-bold mb-0"> Danh Sách Đơn Đặt Hàng</h3>
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
                                <th style="width: 50px">MÃ ĐƠN</th>
                                <th>NGƯỜI ĐẶT</th>
                                <th>NGƯỜI NHẬN</th>
                                <th>SỐ ĐIỆN THOẠI</th>
                                <th>EMAIL</th>
                                <th>NGÀY ĐẶT HÀNG</th>
                                <th>TÌNH TRẠNG</th>
                                <th>CHỨC NĂNG</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(isset($order))
                                @foreach ($order as $item)
                                    <tr>
                                        <td>{{$item->od_code}}</td>
                                        <td>{{$item->customer->cus_name }}</td>
                                        <td>{{$item->od_cus_name }}</td>
                                        <td>{{$item->od_cus_phone}}</td>
                                        <td>{{$item->od_cus_email}}</td>
                                        <td>{{ date("d/m/Y H:i:s", strtotime($item->created_at))}}</td>
                                        <td>
                                            @if($item->od_status == 0)
                                                <span class="badge bg-danger">Chưa xử lý </span>
                                            @else
                                                <span class="badge bg-success">Đã xứ lý</span>
                                        @endif
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Basic outlined example">
                                                <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal">
                                                    <a class="btn btn-primary btn-sm" href="{{ route('orders.edit',$item->id) }}"><i class="icofont-eye-alt text-success"></i></a>
                                                </button>

                                                <button type="button" class="btn btn-outline-secondary deleterow">
                                                    <a href="{{route('orders.destroy',$item->id)}}" onclick="removeRow()"><i class="icofont-ui-delete text-danger"></i></a>
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
            {!! $order->links() !!}
        </nav>

    </div>
    </div>

@endsection
