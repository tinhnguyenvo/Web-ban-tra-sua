@extends('master')
@section('content')
<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Đăng ký</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb">
					<a href="{{route('trang-chu')}}">Home</a> / <span>Đăng ký</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	
	<div class="container">
		<div id="content">
			
			<form action="{{route('signin')}}" method="post" class="beta-form-checkout">
			<input type="hidden" name="_token" value="{{csrf_token()}}">
				<div class="row">
				@if(count($errors)>0)
					<div class="alert alert-danger">
						@foreach($errors->all() as $err)
						{{$err}}
						@endforeach
					</div>
				@endif
				@if(Session::has('thanhcong'))
					<div class="alert alert-success">{{Session::get('thanhcong')}} &nbsp; <a style="color:red;font-size: 15px;" href="{{route('login')}}" >Click vào đây để đăng nhập</a></div>
				@endif
					<div class="col-sm-3"></div>
					<div class="col-sm-6">
						<h4>Đăng ký</h4>
						<div class="space20">&nbsp;</div>

						
						<div class="form-block">
							<label for="email">Địa chỉ Email*</label>
							<input type="email" name="email" placeholder="expample@gmail.com" required>
						</div>

						<div class="form-block">
							<label for="your_last_name">Họ và tên*</label>
							<input type="text" name="hovaten"  placeholder="Nhập họ và tên" required>
						</div>

						<div class="form-block">
							<label for="adress">Địa chỉ*</label>
							<input type="text" id="adress"  name="diachi" placeholder="Nhập vào địa chỉ" required>
						</div>


						<div class="form-block">
							<label for="phone">Số điện thoại*</label>
							<input type="text" id="phone" name="sdt" placeholder="Nhập số điện thoại" required>
						</div>
						<div class="form-block">
							<label for="phone">Mật khẩu*</label>
							<input type="password" id="phone" name="password" placeholder="Nhập mật khẩu" required>
						</div>
						<div class="form-block">
							<label for="phone">Nhập lại mật khẩu*</label>
							<input type="password" id="phone" name="repassword" placeholder="Nhập lại mật khẩu" required>
						</div>
						<div class="form-block">
							<button type="submit" class="btn btn-primary">Đăng ký</button>
						</div>
					</div>
					<div class="col-sm-3"></div>
				</div>
			</form>
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection      