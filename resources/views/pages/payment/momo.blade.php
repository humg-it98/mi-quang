<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Tạo mới đơn hàng</title>
    <!-- Bootstrap core CSS -->
    <link href="{{asset('user/vnpay/bootstrap.min.css')}}" rel="stylesheet"/>
    <!-- Custom styles for this template -->
    <link href="{{asset('user/vnpay/jumbotron-narrow.css')}}" rel="stylesheet">
    <script src="{{asset('user/vnpay/jquery-1.11.3.min.js')}}"></script>
</head>
<body>
<div class="container">
    <div class="header clearfix">
        <h3 class="text-muted">MomoPAY DEMO</h3>
    </div>
    <h3>Tạo mới đơn hàng</h3>
    <div class="table-responsive">
        <form class="" method="POST" target="_blank" enctype="application/x-www-form-urlencoded" action="{{route('home.thanhtoan.createMomo')}}">
            @csrf
            <div class="form-group">
                <label for="fxRate" class="col-form-label">OrderId</label>
                <div class='input-group date' id='fxRate'>
                    <input type='text' name="orderId" value="{{$orderId}}" class="form-control"/>
                </div>
            </div>

            <div class="form-group">
                <label for="fxRate" class="col-form-label">OrderInfo</label>
                <div class='input-group date' id='fxRate'>
                    <input type='text' name="orderInfo" value="Thanh toán qua MoMo"
                           class="form-control"/>
                </div>
            </div>

            <div class="form-group">
                <label for="fxRate" class="col-form-label">Amount</label>
                <div class='input-group date' id='fxRate'>
                    <input type='text' name="amount" value="{{$total_order}}" class="form-control"/>
                </div>
            </div>

            <div class="form-group">
                <label for="fxRate" class="col-form-label">ExtraData</label>
                <div class='input-group date' id='fxRate'>
                    <input type='text' type="text" name="extraData" value=""
                           class="form-control"/>
                </div>
            </div>

            <p>
            <div style="margin-top: 1em;">
                <button type="submit" class="btn btn-primary btn-block">Start MoMo payment....</button>
            </div>
            </p>
        </form>
    </div>
    <p>
        &nbsp;
    </p>
    <footer class="footer">
        <p>&copy; MOMOPAY <?php echo date('Y')?></p>
    </footer>
</div>


</body>
</html>
