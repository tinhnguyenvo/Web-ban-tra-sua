<html>
<head>
<style>
.alert {
  padding: 20px;
  background-color: #f44336;
  color: white;
}

.closebtn {
  margin-left: 15px;
  color: white;
  font-weight: bold;
  float: right;
  font-size: 22px;
  line-height: 20px;
  cursor: pointer;
  transition: 0.3s;
}

.closebtn:hover {
  color: black;
}


</style>
@if(Session::has('baoloi'))
<div class="alert">
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
  <strong>Lỗi!</strong> Tài khoản hoặc mật khẩu không chính xác
</div>
@endif

	<meta charset="utf-8">
    <title> Đăng nhập </title>
    <link rel="stylesheet" type="text/css" href="/css/style.css"> 
    <style>
    body{
    margin: 0;
    padding: 0;
    background: url(/css/bglogin.png);
    background-size: cover;
    background-position: center;
    font-family: sans-serif;
    }
    </style>  
</head>
    <body>
    <div class="login-box">
        
        <h1>Đăng nhập</h1>
            <form action="{{route('admin')}}" method="post" class="beta-form-checkout">
			<input type="hidden" name="_token" value="{{csrf_token()}}">
				<div class="row">
					<div class="col-sm-3"></div>
				
					<div class="col-sm-6">
						<div class="space20">&nbsp;</div>

						
						<div class="form-block">
							<label for="text">Tài khoản</label>
							<input type="text" name="hovaten" required>
						</div>
						<div class="form-block">
							<label for="password">Password</label>
							<input type="password" name="password" required>
						</div>
						<div class="form-block" style="margin-top: 30px; padding-bottom:  60px;">
							
							<button type="submit" class="btn btn-primary pull-right" style="margin-right: 50px; border-radius: 20px;font-size: 20px;">Đăng nhập</button>
						</div>
					</div>
					<div class="col-sm-3"></div>
				</div>
			</form>
        
        
        </div>
    
    </body>
</html>