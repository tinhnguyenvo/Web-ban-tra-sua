@extends('master')
@section('content')
<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Đăng nhập</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb">
					<a href="{{route('trang-chu')}}">Home</a> / <span>Đăng nhập</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	
	<div class="container">
		<div id="content">
			
			<form action="{{route('login')}}" method="post" class="beta-form-checkout">
			<input type="hidden" name="_token" value="{{csrf_token()}}">
				<div class="row">
					<div class="col-sm-3"></div>
					@if(Session::has('flag'))
					<div class="alert alert-{{Session::get('flag')}}">{{Session::get('thongbao')}}</div>
					@endif
					<div class="col-sm-6" style="border:1px double;background:#f7f9fc;border-double: 50px;">
						<h5>Đăng nhập</h5>
						<div class="space20">&nbsp;</div>

						
						<div class="form-block">
							<label for="email">Email hoặc Số điện thoại*</label>
							<input type="text" name="email" required>
						</div>
						<div class="form-block">
							<label for="password">Password*</label>
							<input type="password" name="password" required>
						</div>
						<div class="form-block" style="margin-top: 30px; padding-bottom:  60px;">
							
							<button type="submit" class="btn btn-primary pull-right" style="margin-right: 50px; border-radius: 20px;font-size: 20px;">Đăng nhập</button>
						</div>
					</div>
					<div class="col-sm-3"></div>
				</div>
			</form>
		</div> <!-- #content -->
	</div> <!-- .container -->
 @endsection        
