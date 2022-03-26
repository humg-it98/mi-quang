<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Transaction;
use Illuminate\Http\Request;

class AdminOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $order = Order::with('customer')->orderBy('id', 'ASC')->paginate((int)config('contants.PER_PAGE_DEFAULT_ADMIN'));
        $viewData = [
            'order' => $order,
        ];
        return view('admin.order.index',$viewData);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit($id)
    {
        $oder = Order::with('customer')->where('id',$id)->get();
        $detailOrder = Transaction::with('products')->where('tst_order_id',$id)->get();
//        $customer = Customer::where('id',$getorder[''])->first();

//        $getorder = Order::where('id',$id)->get();
//


//        $order_details_product = OrderDetails::with('product')->where('order_code', $order_code)->get();
//        dd($order_details);
//        $detailOrder = Transaction::with('order')->where('tst_order_id',$id)->get();
//        dd($detailOrder);
//        $customer = Order::with('customer')->findOrFail($id);
        $dataView = [
            'detailOrder' => $detailOrder,
            'order' => $oder,
        ];
//        dd($dataView);
        return view('admin.order.edit',$dataView);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
