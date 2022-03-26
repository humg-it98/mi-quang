<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HomeCartController extends Controller
{
    public function index()
    {
        return view('pages.cart.index');
    }

    public function addCart(Request $request)
    {
        $data = $request->all();
        $session_id = substr(md5(microtime()),rand(0,26),5);
        $cart = Session::get('cart');
        if($cart==true){
            $is_avaiable = 0;
            foreach($cart as $key => $val){
                if($val['pro_id']==$data['pro_id']){
                    $is_avaiable++;
                }
            }
            if($is_avaiable == 0){
                $cart[] = array(
                    'session_id' => $session_id,
                    'pro_name' => $data['pro_name'],
                    'pro_id' => $data['pro_id'],
                    'pro_avatar' => $data['pro_avatar'],
                    'product_qty' => $data['num_product'],
                    'pro_sale' => $data['pro_sale'],
                );
                Session::put('cart',$cart);
            }
        }else{
            $cart[] = array(
                'session_id' => $session_id,
                'pro_name' => $data['pro_name'],
                'pro_id' => $data['pro_id'],
                'pro_avatar' => $data['pro_avatar'],
                'product_qty' => $data['num_product'],
                'pro_sale' => $data['pro_sale'],
            );
            Session::put('cart',$cart);
        }
        Session::save();
        toastr()->success('Bạn vừa thêm sp vào giỏ hàng thành công');
        return redirect()->route('home.cart.index');
    }

    public function updateCart(Request $request)
    {
        $data = $request->all();
        $cart = Session::get('cart');
        if ($cart == true) {
            $message = '';

            foreach ($data['num_product'] as $key => $qty) {
                $i = 0;
                foreach ($cart as $session => $val) {
                    $i++;

                    if ($val['session_id'] == $key) {

                        $cart[$session]['product_qty'] = $qty;
                        $message .= '<p class="alert alert-success">' . $i . ') Cập nhật số lượng: ' . $cart[$session]['pro_name'] . ' thành công</p>';

                    } elseif ($val['session_id'] == $key && $qty > $cart[$session]['product_quantity']) {
                        $message .= '<p class="alert alert-danger">' . $i . ') Cập nhật số lượng: ' . $cart[$session]['pro_name'] . ' thất bại</p>';
                    }

                }

            }

            Session::put('cart', $cart);
            return redirect()->back()->with('message', $message);
        } else {
            return redirect()->back()->with('message', 'Cập nhật số lượng thất bại');
        }
    }

    public function deleteCart($session_id)
    {
        $cart = Session::get('cart');
        if (is_iterable($cart))
        {
            foreach ($cart as $key => $val)
            {
                if($val['session_id']==$session_id){
                    unset($cart[$key]);
                }
            }
            Session::put('cart', $cart);
            toastr()->success('Xóa sản phẩm trong giỏ hàng thành công ');
            return redirect()->back();
        }
        else{
            toastr()->error('Xóa sản phẩm trong giỏ hàng thất bại');
            return redirect()->back();
        }
    }
}
