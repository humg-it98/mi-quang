
@extends('layout.admin')


@section('main-admin')

    <div class="body d-flex py-lg-3 py-md-2">
        <div class="row align-items-center">
            <div class="border-0 mb-4">
                <div
                    class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                    <h3 class="fw-bold mb-0"> Danh Sách Món Ăn</h3>
                    <div class="col-auto d-flex w-sm-100">
                        <a href="{{route('products.create')}}"><button type="button" class="btn btn-dark btn-set-task w-sm-100"><i class="icofont-plus-circle me-2 fs-6"></i>Thêm món ăn</button></a>
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
                                <th style="width: 220px">Chi tiết sản phẩm </th>
                                <th>Danh mục</th>
                                <th>Hình</th>
                                <th>Trạng thái</th>
                                <th>Xử lý</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(isset($product))
                                @foreach ($product as $item)
                                    <tr>
                                        <td>{{$item->id}}</td>
                                        <td>{{$item->pro_name}}
                                            <ul>
                                                <li>
                                                    <i class="icofont-price"></i>
                                                    <span>{{number_format($item->pro_price)}}đ</span>
                                                </li>
                                                <li>
                                                    <i class="icofont-sale-discount"></i>
                                                    <span>{{number_format($item->pro_sale)}}đ</span>
                                                </li>
                                                <li>
                                                        <span class="rating">
                                                            <i class=""></i>
                                                            <i class=""></i>
                                                            <i class=""></i>
                                                            <i class=""></i>
                                                            <i class=""></i>
                                                            <em>0/5.0</em>
                                                    </span>
                                                </li>

                                            </ul>
                                        </td>
                                        <td>{{$item->categories->p_c_name}}</td>
                                        <td>
                                            <a href="{{$item->pro_img_path}}" target="_blank">
                                                <img src="{{$item->pro_img_path}}" style="height:50px;" >
                                            </a>
                                        </td>
                                        <td>
                                            @if($item->pro_active == 1)
                                                <span class="badge bg-success">Hiển thị </span>
                                            @else
                                                <span class="badge bg-danger">SP đang bị ẩn</span>
                                            @endif
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Basic outlined example">
                                                <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal">
                                                    <a class="btn btn-primary btn-sm" href="{{ route('products.edit',$item->id) }}"><i class="icofont-edit text-success"></i></a>
                                                </button>

                                                <button type="button" class="btn btn-outline-secondary deleterow">
                                                    <a href="{{route('products.destroy',$item->id)}}" onclick="removeRow()"><i class="icofont-ui-delete text-danger"></i></a>
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
            {!! $product->links() !!}
        </nav>

    </div>
    </div>

@endsection
