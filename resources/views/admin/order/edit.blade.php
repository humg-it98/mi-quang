
@extends('layout.admin')


@section('main-admin')

    <div class="tab-pane fade active show" id="Invoice-Simple">
        <div class="row justify-content-center">
            <div class="col-lg-10 col-md-12">
                <div class="card p-xl-5 p-lg-4 p-0">
                    <div class="card-body">
                        @if(isset($order))
                            @foreach($order as $order)
                        <div class="mb-3 pb-3 border-bottom">Hóa đơn: <strong>{{$order->od_code}}</strong>
                            <span class="float-center"> <strong>|| {{ date("d/m/Y H:i:s", strtotime($order->created_at)) }}</strong></span>
                            <span class="float-end"> <strong>Tình trạng:
                                @if($order->od_status == 1)
                                    Đang tiep nhan
                                @elseif($order->od_status == 2)
                                Da xu ly
                                @elseif($order->od_status == 3)
                                Huy

                                @endif
                                </strong>
                            </span>
                        </div>

                        <div class="row mb-4">
                            <div class="col-sm-6">
                                <h6 class="mb-3">Thông tin người đặt hàng </h6>
                                <div>Họ tên: <strong>{{ $order->customer->cus_name }}</strong></div>
                                <div>Địa chỉ: <strong>{{ $order->customer->cus_address }}</strong></div>
                                <div>Email: {{ $order->customer->cus_email }}</div>
                                <div>Số điện thoại: 0{{ $order->customer->cus_phone }}</div>
                                <div>Thể loại thanh toán:
                                    @if($order->od_type == 1)
                                        <strong>Tiền mặt</strong>
                                    @elseif($order->od_type == 2)
                                        <strong>VNPay</strong>
                                    @elseif($order->od_type == 3)
                                        <strong>Ví điện tử MoMo</strong>

                                    @endif
                                </div>
                            </div>


                            <div class="col-sm-6">
                                <h6 class="mb-3">Thông tin người nhận hàng </h6>
                                <div> Tên khách hàng:<strong> {{ $order->od_cus_name }}</strong></div>
                                <div>Địa chỉ:<strong> {{ $order->od_cus_address }}</strong></div>
                                <div>Email: <strong> {{ $order->od_cus_email }}</strong></div>
                                <div>Số điện thoại: <strong> {{ $order->od_cus_phone }}</strong></div>
                                <div>Ghi chú: <strong> {{ $order->od_note }}</strong></div>
                            </div>
                        </div> <!-- Row end  -->
                            @endforeach
                        @endif

                        <div class="table-responsive-sm">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th>Ảnh</th>
                                    <th>Đồ uống</th>
                                    <th class="text-end">Giá</th>
                                    <th class="text-center">Số lượng</th>
                                    <th class="text-end">TẤT CẢ</th>
                                </tr>
                                </thead>
                                @if(isset($detailOrder))
                                    @php
                                        $i = 0;
                                        $total = 0;
                                    @endphp
                                    <tbody>
                                    @foreach($detailOrder as $detailOrder)
                                        @php
                                            $subtotal = $detailOrder->od_sale*$detailOrder->od_qty;
                                            $total+=$subtotal;
                                        @endphp
                                        <tr>
                                            <td class="text-center">{{$detailOrder->products->id}}</td>
                                            <td><img src="{{$detailOrder->products->pro_img_path}}" alt="IMG" style="width: 100px"></td>
                                            <td>{{$detailOrder->products->pro_name }}</td>
                                            <td class="text-end">{{number_format($detailOrder->od_sale)}}</td>
                                            <td class="text-center">{{$detailOrder->od_qty}}</td>
                                            <td class="text-end">{{number_format($detailOrder->od_sale*$detailOrder->od_qty)}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                @endif

                            </table>
                        </div>

                        <div class="row">
                            <div class="col-lg-4 col-sm-5">

                            </div>

                            <div class="col-lg-6 col-sm-5 ms-auto">
                                <table class="table table-clear">
                                    <tbody>
                                    <tr>
                                        <td><strong>Tổng phụ</strong></td>
                                        <td class="text-end">{{number_format($total)}} đ</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Phí ship</strong></td>
                                        <td class="text-end">15.000 đ</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Thành tiền</strong></td>
                                        <td class="text-end">
                                            <strong>{{number_format($total+15000)}} đ</strong>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div> <!-- Row end  -->

                        <div class="row">

                            <div class="col-lg-12 text-end">
                                <button type="button" class="btn btn-outline-secondary btn-lg my-1">

                                    <a href=""@click.prevent="printme" target="_blank">PDF</a>
                                </button>
                                <button type="button" class="btn btn-outline-secondary btn-lg my-1">
                                    <i class="fa fa-print"></i>
                                    <a onclick="window.print();return false;"
                                       class="pointer underline" ga="event" ga-category="Invoice" ga-action="Link" ga-label="Print">
                                    </a>
                                </button>


                                <button type="button" class="btn btn-primary btn-lg my-1">
                                    <i class="fa fa-paper-plane-o"></i>Gửi hóa đơn
                                </button>
                            </div>
                        </div>
                        <!-- Row end  -->
                    </div>

                </div>
            </div>
        </div> <!-- Row end  -->
    </div>

@endsection
