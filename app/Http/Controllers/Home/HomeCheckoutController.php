<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\loginAuthRequest;
use App\Http\Requests\User\registerCustomerAuth;
use App\Http\Requests\User\storeOrderCustomer;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class HomeCheckoutController extends Controller
{
    public function index()
    {
        if(Session::get('cus_id'))
        {
            $customer = Customer::findorFail(Session::get('cus_id'));
            $viewData = [
                'customer' => $customer,
            ];
            return view('pages.checkout.index', $viewData);
        }else{
            return redirect()->route('home.dangnhap.index');
        }
    }

    public function loginCustomer()
    {
        return view('pages.login_register.login');
    }

    public function loginCustomerAuth(loginAuthRequest $request)
    {
        $loginInfo = [
            'cus_email' => $request->email,
            'password' => md5($request->password),
        ];
        $remember = $request->has('remember_me') ? true : false;

        $customer = Customer::where([['cus_email', '=', $loginInfo['cus_email']], ['password', '=', $loginInfo['password']]])->first();

        if($customer){
            if($customer['cus_active'] == 1)
            {
                Session::put('cus_id',$customer->id);
                toastr()->success('Bạn tên: ' . $customer['cus_name'] .' đã đăng nhập thành công!');
                return redirect()->route('home.index');
            }
            else{
                toastr()->error('Tài khoản bị khóa, vui lòng liên hệ Admin.');
                return redirect()->back();
            }
        }else{
            toastr()->error('Tài khoản, mật khẩu không khớp.');
            return redirect()->back();
        }
        Session::save();
    }

    public function logoutCustomerAuth()
    {
        Session::forget('cus_id');
        toastr()->success('Bạn vửa logout thành công');
        return redirect()->route('home.dangnhap.index');
    }

    public function registerCustomer()
    {
        return view('pages.login_register.register');
    }

    public function saveRegisterCustomerAuth(registerCustomerAuth $request)
    {
        $remember = $request->has('remember_me') ? true : false;
        if($remember == true)
        {
            $saveCustomer = Customer::create([
                'cus_name' => $request->cus_name,
                'cus_email' => $request->cus_email,
                'cus_phone' => $request->cus_phone,
                'password' => md5($request->password),
            ]);
            toastr()->success('Bạn đã đăng ký tài khoản thành công');
            return redirect()->route('home.index');
        }else{
            toastr()->info('Bạn chưa đồng ý điều khoản của chúng tôi.');
            return redirect()->back();
        }
    }

    public function createOrder(storeOrderCustomer $request)
    {
        $data = $request->all();
        if(!empty($_POST['od_note']))
        {
            $od_note =  $request->od_note;
        }else{
            $od_note = 'N/A';
        }

        if(Session::get('cart')==true){
            $total = 15000;
            $product = 0;
            foreach(Session::get('cart') as $item => $cart)
            {
                $subtotal = $cart['pro_sale']*$cart['product_qty'];
                $subproduct = $cart['product_qty'];
                $total += $subtotal;
                $product += $subproduct;
            }
        }
        $total_order = str_replace(',','',$total);
        $total_product = str_replace(',','',$product);

        if($data['tst_type']=='1') {

            try {
                DB::beginTransaction();
                //tạo đơn
                $order = Order::create([
                    'od_code' => substr(md5(microtime()),rand(0,26),5),
                    'od_customer_id' => Session::get('cus_id'),
                    'od_cus_name' => $data['cus_name'],
                    'od_cus_phone' => $data['cus_phone'],
                    'od_cus_email' => $data['cus_email'],
                    'od_cus_address' => $data['cus_address'],
                    'od_type' => '1',
                    'od_note' => $od_note,
                    'od_total_moneys' => $total_order,
                    'od_total_products' => $total_product,
                ]);
                $tst_id = $order->id;

                //tạo chi tiết đơn
                if(Session::get('cart')==true){
                    foreach(Session::get('cart') as $key => $cart){
                        $transection = Transaction::create ([
                            'tst_order_id' => $tst_id,
                            'od_product_id' => $cart['pro_id'],
                            'od_sale' => $cart['pro_sale'],
                            'od_qty' => $cart['product_qty'],
                        ]);
                    }
                }

                DB::commit();
                Session::forget('cart');
                toastr()->success('Vui lòng check email để kiểm tra đơn hàng.');
                return redirect()->route('home.index');
            } catch (\Exception $e)
            {
                DB::rollBack();
                echo ("Lỗi : ".$e->getMessage()." Dòng: ".$e->getLine());
            }
        }elseif($data['tst_type']=='2') {
            $dataOrder = ([
                'od_cus_name' => $data['cus_name'],
                'od_cus_phone' => $data['cus_phone'],
                'od_cus_email' => $data['cus_email'],
                'od_cus_address' => $data['cus_address'],
                'od_note' => $od_note,
                'od_total_moneys' => $total_order,
                'od_total_products' => $total_product,
            ]);
            $startTime = date("YmdHis");
            $expire = date('YmdHis',strtotime('+15 minutes',strtotime($startTime)));
            session(['dataOrder' => $dataOrder]);
            return view('pages.payment.vnpay', compact('total_order','expire'));
        }elseif($data['tst_type']=='3') {
            $dataOrder = ([
                'od_cus_name' => $data['cus_name'],
                'od_cus_phone' => $data['cus_phone'],
                'od_cus_email' => $data['cus_email'],
                'od_cus_address' => $data['cus_address'],
                'od_note' => $od_note,
                'od_total_moneys' => $total_order,
                'od_total_products' => $total_product,
            ]);
            $orderId = substr(md5(microtime()),rand(0,26),5);
            session(['dataOrder' => $dataOrder]);
            return view('pages.payment.momo', compact('total_order','orderId'));


        }
    }

    public function execPostRequest($url, $data)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($data))
        );
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        //execute post
        $result = curl_exec($ch);
        //close connection
        curl_close($ch);
        return $result;
    }

    public function createVNPay(Request $request)
    {
        $vnp_TxnRef = substr(md5(microtime()),rand(0,26),5);
        $vnp_OrderInfo = $_POST['order_desc'];
        $vnp_OrderType = $_POST['order_type'];
        $vnp_Amount = str_replace(',', '', $_POST['amount']) * 100;
        $vnp_Locale = $_POST['language'];
        $vnp_BankCode = $_POST['bank_code'];
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
        //Add Params of 2.0.1 Version
        $vnp_ExpireDate = $_POST['txtexpire'];
        //Billing
        $vnp_Bill_Mobile = $_POST['txt_billing_mobile'];
        $vnp_Bill_Email = $_POST['txt_billing_email'];
        $fullName = trim($_POST['txt_billing_fullname']);
        if (isset($fullName) && trim($fullName) != '') {
            $name = explode(' ', $fullName);
            $vnp_Bill_FirstName = array_shift($name);
            $vnp_Bill_LastName = array_pop($name);
        }
        $vnp_Bill_Address=$_POST['txt_inv_addr1'];
        $vnp_Bill_City=$_POST['txt_bill_city'];
        $vnp_Bill_Country=$_POST['txt_bill_country'];
        $vnp_Bill_State=$_POST['txt_bill_state'];
        // Invoice
        $vnp_Inv_Phone=$_POST['txt_inv_mobile'];
        $vnp_Inv_Email=$_POST['txt_inv_email'];
        $vnp_Inv_Customer=$_POST['txt_inv_customer'];
        $vnp_Inv_Address=$_POST['txt_inv_addr1'];
        $vnp_Inv_Company=$_POST['txt_inv_company'];
        $vnp_Inv_Taxcode=$_POST['txt_inv_taxcode'];
        $vnp_Inv_Type=$_POST['cbo_inv_type'];
        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => env('VNP_TMN_CODE'),
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => route('home.thanhtoan.returnVNPay'),
            "vnp_TxnRef" => $vnp_TxnRef,
            "vnp_ExpireDate"=>$vnp_ExpireDate,
            "vnp_Bill_Mobile"=>$vnp_Bill_Mobile,
            "vnp_Bill_Email"=>$vnp_Bill_Email,
            "vnp_Bill_FirstName"=>$vnp_Bill_FirstName,
            "vnp_Bill_LastName"=>$vnp_Bill_LastName,
            "vnp_Bill_Address"=>$vnp_Bill_Address,
            "vnp_Bill_City"=>$vnp_Bill_City,
            "vnp_Bill_Country"=>$vnp_Bill_Country,
            "vnp_Inv_Phone"=>$vnp_Inv_Phone,
            "vnp_Inv_Email"=>$vnp_Inv_Email,
            "vnp_Inv_Customer"=>$vnp_Inv_Customer,
            "vnp_Inv_Address"=>$vnp_Inv_Address,
            "vnp_Inv_Company"=>$vnp_Inv_Company,
            "vnp_Inv_Taxcode"=>$vnp_Inv_Taxcode,
            "vnp_Inv_Type"=>$vnp_Inv_Type
        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
        if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
            $inputData['vnp_Bill_State'] = $vnp_Bill_State;
        }

        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = env('VNP_URL') . "?" . $query;
        if (env('VNP_HASH_SECRET')) {
            $vnpSecureHash =   hash_hmac('sha512', $hashdata, env('VNP_HASH_SECRET'));//
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }
        return redirect($vnp_Url);
    }

    public function returnVNPay(Request $request)
    {
        if ($request-> vnp_ResponseCode == '00')
        {
            try {
                DB::beginTransaction();

                //tạo đơn
                $order = Order::create([
                    'od_code' => $request->vnp_TxnRef,
                    'od_customer_id' => Session::get('cus_id'),
                    'od_cus_name' => session()->get('dataOrder')['od_cus_name'],
                    'od_cus_phone' => session()->get('dataOrder')['od_cus_phone'],
                    'od_cus_email' => session()->get('dataOrder')['od_cus_email'],
                    'od_cus_address' => session()->get('dataOrder')['od_cus_address'],
                    'od_type' => '2',
                    'od_note' => session()->get('dataOrder')['od_note'],
                    'od_total_moneys' => session()->get('dataOrder')['od_total_moneys'],
                    'od_total_products' => session()->get('dataOrder')['od_total_products'],
                ]);
                $tst_id = $order->id;

                //tạo chi tiết đơn
                if(Session::get('cart')==true){
                    foreach(Session::get('cart') as $key => $cart){
                        $transection = Transaction::create ([
                            'tst_order_id' => $tst_id,
                            'od_product_id' => $cart['pro_id'],
                            'od_sale' => $cart['pro_sale'],
                            'od_qty' => $cart['product_qty'],
                        ]);
                    }
                }

                DB::commit();
                Session::forget('cart');
                Session::forget('dataOrder');
                toastr()->success('Vui lòng check email để kiểm tra đơn hàng.');
                return redirect()->route('home.index');
            } catch (\Exception $e)
            {
                DB::rollBack();
                echo ("Lỗi : ".$e->getMessage()." Dòng: ".$e->getLine());
            }
        }else {
            toastr()->error('Đã xảy ra lỗi không thể thanh toán đơn hàng');
            return route('home.index');
        }
    }

    public function createMomo(Request $request)
    {
        $partnerCode = env('MOMOPAY_TMN_CODE');
        $accessKey = env('MOMOPAY_ACCESS_KEY');
        $serectkey = env('MOMOPAY_SECRET_KEY');
        $orderId = $request->orderId; // Mã đơn hàng
        $orderInfo = $_POST["orderInfo"];
        $amount = $_POST["amount"];
        $ipnUrl = env('MOMO_RETURN_URL');
        $redirectUrl = env('MOMO_RETURN_URL');
        $extraData = $_POST["extraData"];

        $requestId = time() . "";
        $requestType = "payWithATM";
        $extraData = ($_POST["extraData"] ? $_POST["extraData"] : "");
        //before sign HMAC SHA256 signature
        $rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=" . $extraData . "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId . "&requestType=" . $requestType;
        $signature = hash_hmac("sha256", $rawHash, $serectkey);
        $data = array('partnerCode' => $partnerCode,
            'partnerName' => "Test",
            "storeId" => "MomoTestStore",
            'requestId' => $requestId,
            'amount' => $amount,
            'orderId' => $orderId,
            'orderInfo' => $orderInfo,
            'redirectUrl' => $redirectUrl,
            'ipnUrl' => $ipnUrl,
            'lang' => 'vi',
            'extraData' => $extraData,
            'requestType' => $requestType,
            'signature' => $signature);
        $result = $this->execPostRequest(env('MOMOPAY_URL'), json_encode($data));
        $jsonResult = json_decode($result, true);  // decode json

        //Just a example, please check more in there
        return redirect($jsonResult['payUrl']);
    }

    public function returnMomo(Request $request)
    {
        if($request->resultCode == 0)
        {
            try {
                DB::beginTransaction();

                //tạo đơn
                $order = Order::create([
                    'od_code' => $request->orderId,
                    'od_customer_id' => Session::get('cus_id'),
                    'od_cus_name' => session()->get('dataOrder')['od_cus_name'],
                    'od_cus_phone' => session()->get('dataOrder')['od_cus_phone'],
                    'od_cus_email' => session()->get('dataOrder')['od_cus_email'],
                    'od_cus_address' => session()->get('dataOrder')['od_cus_address'],
                    'od_type' => '3',
                    'od_note' => session()->get('dataOrder')['od_note'],
                    'od_total_moneys' => session()->get('dataOrder')['od_total_moneys'],
                    'od_total_products' => session()->get('dataOrder')['od_total_products'],
                ]);
                $tst_id = $order->id;

                //tạo chi tiết đơn
                if(Session::get('cart')==true){
                    foreach(Session::get('cart') as $key => $cart){
                        $transection = Transaction::create ([
                            'tst_order_id' => $tst_id,
                            'od_product_id' => $cart['pro_id'],
                            'od_sale' => $cart['pro_sale'],
                            'od_qty' => $cart['product_qty'],
                        ]);
                    }
                }

                DB::commit();
                Session::forget('cart');
                Session::forget('dataOrder');
                toastr()->success('Vui lòng check email để kiểm tra đơn hàng.');
                return redirect()->route('home.index');
            } catch (\Exception $e)
            {
                DB::rollBack();
                echo ("Lỗi : ".$e->getMessage()." Dòng: ".$e->getLine());
            }
        }else {
            toastr()->error('Đã xảy ra lỗi không thể thanh toán đơn hàng');
            return route('home.index');
        }
    }
}
