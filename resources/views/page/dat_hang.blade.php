
@extends('master')
@section('content')   
<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Đặt hàng</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb">
					<a href="{{route('trang-chu')}}l">Trang chủ</a> / <span>Đặt hàng</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	
	<div class="container">
		<div id="content">
			<!--Bao loi-->
			@if ($errors->any())
				<div class="alert alert-danger">
					<ul>
						@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
			@endif
			<!--Bao loi-->
			@if(Session::has('thongbao'))
				<div class="alert alert-success">{{Session::get('thongbao')}} ! <a style="color:red;font-size: 15px;" href="{{route('trang-chu')}}">Click vào đây để tiếp tục mua hàng</a></div>
			@endif
			<form action="{{route('dathang')}}" method="post" class="beta-form-checkout">
			<input type="hidden" name="_token" value="{{csrf_token()}}"> 
				<div class="row">
					<div class="col-sm-6">
						<h4>Đặt hàng</h4>
						<div class="space20">&nbsp;</div>

						<div class="form-block">
							<label for="name">Họ tên*</label>
							@if(Auth::check())
							<input type="text" id="name" name="name" value="{{Auth::user()->hovaten}}" placeholder="Họ tên" required>
							@else
							<input type="text" id="name" name="name"  placeholder="Họ tên" required>
							@endif
						</div>
						<div class="form-block">
							<label>Giới tính </label>
							<input id="gender" type="radio" class="input-radio" name="gender" value="nam" checked="checked" style="width: 10%"><span style="margin-right: 10%">Nam</span>
							<input id="gender" type="radio" class="input-radio" name="gender" value="nữ" style="width: 10%"><span>Nữ</span>
										
						</div>

						<div class="form-block">
							<label for="email">Email*</label>
							@if(Auth::check())
							<input type="email" id="email" name="email" value="{{Auth::user()->email}}" required placeholder="expample@gmail.com">
							@else
							<input type="email" id="email" name="email"  required placeholder="expample@gmail.com">
							@endif
						</div>

						<div class="form-block">
							<label for="address">Địa chỉ*</label>
							@if(Auth::check())
							<input type="text" id="address" name="address" value="{{Auth::user()->diachi}}" placeholder="Số nhà - Xã - Huyện - Tỉnh"  required>
							@else
							<input type="text" id="address" name="address"  placeholder="Số nhà - Xã - Huyện - Tỉnh"  required>
							@endif
						</div>
						

						<div class="form-block">
							<label for="phone">Điện thoại*</label>
							@if(Auth::check())
							<input type="number" value="{{Auth::user()->sdt}}" name="phone" id="phone" required>
							@else
							<input type="number"  name="phone" id="phone"  required>
							@endif
						</div>
						
						<div class="form-block">
							<label for="notes">Ghi chú</label>
							<textarea id="notes" name="notes"></textarea>
						</div>
					</div> 
					<div class="col-sm-6">
						<div class="your-order">
							<div class="your-order-head"><h5>Đơn hàng của bạn</h5></div>
							<div class="your-order-body" style="padding: 0px 10px">
								<div class="your-order-item">
									<div>
									@if(Session::has('cart'))
									@foreach($product_cart as $cart)
									<!--  one item	 -->
										<div class="media">
											<img width="25%" src="source/image/product/{{$cart['item']['image']}}" alt="" class="pull-left">
											<div class="media-body">
												<p class="font-large">{{$cart['item']['ten']}}</p>
												<span class="color-gray your-order-info">Số lượng: {{$cart['qty']}} Ly</span>
												<span class="color-gray your-order-info">Đơn giá: {{number_format($cart['price']/$cart['qty'])}} VND</span>
											</div>
										</div>
									<!-- end one item -->
									</div>
									<div class="clearfix"></div>
									@endforeach
									@endif
								</div>
								<div class="your-order-item">
									<div class="pull-left"><p class="your-order-f18">Tổng tiền:</p></div>
									<div class="pull-right"><h5 class="color-black">@if(Session::has('cart')) {{number_format($totalPrice)}} @else 0 @endif VND</h5></div>
									<div class="clearfix"></div>
								</div>
							</div>
							<div class="your-order-head"><h5>Hình thức thanh toán</h5></div>
							
							<div class="your-order-body">
								<ul class="payment_methods methods">
									<li class="payment_method_bacs">
										<input id="payment_method_bacs" type="radio" class="input-radio" name="payment_method"  value="COD" checked="checked" data-order_button_text="">
										<label for="payment_method_bacs">Thanh toán khi nhận hàng </label>
										<div class="payment_box payment_method_bacs" style="display: block;">
											Cửa hàng sẽ gửi hàng đến địa chỉ của bạn, bạn xem hàng rồi thanh toán tiền cho nhân viên giao hàng
										</div>						
									</li>

									<!-- <li class="payment_method_cheque">
										<input id="payment_method_cheque" type="radio" class="input-radio"  name="payment_method" value="ATM" data-order_button_text="">
										<label for="payment_method_cheque">Chuyển khoản </label>
										<div class="payment_box payment_method_cheque" style="display: none;">
											Chuyển tiền đến tài khoản sau:
											<br>- Số tài khoản: 123 456 789
											<br>- Chủ TK: Nguyễn A
											<br>- Ngân hàng ACB, Chi nhánh TP. Cần Thơ
											<br>(Vui lòng ghi số tài khoản và tổng số tiền vào phần ghi chú để chúng tôi xác nhận)
										</div>						
									</li> -->
									
								</ul>
							</div>

							<div class="text-center"><button type="submit" class="beta-btn primary" href="#">Đặt hàng <i class="fa fa-chevron-right"></i></button></div>
						</div> <!-- .your-order -->
					</div>
				</div>
			</form>
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection
 