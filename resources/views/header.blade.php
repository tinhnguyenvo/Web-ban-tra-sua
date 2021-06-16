<div id="header" >
		<div class="header-top">
			<div class="container">
				<div class="pull-left auto-width-left">
					<ul class="top-menu menu-beta l-inline">
						<li><a href=""><i class="fa fa-home"></i> 256 Nguyễn Văn Cừ, Quận Ninh Kiều, Thành phố Cần Thơ</a></li>
						<li><a href=""><i class="fa fa-phone"></i>0917254513</a></li>
					</ul>
				</div>
				<div class="pull-right auto-width-right">
					<ul class="top-details menu-beta l-inline">
					@if(Auth::check())
						<li><a  class="fa fa-user"></i> Xin chào {{Auth::user()->hovaten}}</a></li><li>
						<a href="{{route('order')}}">Đơn hàng</a></li>
						<li><a href="{{route('logout')}}">Đăng xuất</a></li>
					@else	
						<li><a href="{{route('signin')}}">Đăng kí</a></li>
						<li><a href="{{route('login')}}">Đăng nhập</a></li>
					@endif	
					</ul>
				</div>
				<div class="clearfix"></div>
			</div> <!-- .container -->
		</div> <!-- .header-top -->
		<div class="header-body" >
			<div class="container beta-relative">
				<div class="pull-left">
					<a href="{{route('trang-chu')}}" id="logo"><img src="source/assets/dest/images/logo-dau-biec.png" width="300px"  alt=""></a>
				</div>
				<div class="pull-right beta-components space-left ov">
					<div class="space10">&nbsp;</div>
					<div class="beta-comp">
						<form role="search" method="get" id="searchform" action="{{route('search')}}">
					        <input type="text" value="" name="search" id="search" placeholder="Nhập từ khóa..." />
					        <button class="fa fa-search" type="submit" id="searchsubmit"></button>
						</form>
					</div>

					<div class="beta-comp">
					
						<div class="cart">
						
							<div class="beta-select"><i class="fa fa-shopping-cart"></i> Giỏ hàng @if(Session::has('cart')) ({{Session('cart')->totalQty}} @else Trống @endif) <i class="fa fa-chevron-down"></i></div>
							<div class="beta-dropdown cart-body">
							@if(Session::has('cart'))
							@foreach($product_cart as $product)
								<div class="cart-item">
								<a class="cart-item-delete" href="{{route('xoagiohang',$product['item']['id'])}}"><i class="fa fa-times"></i></a>
								
									<div class="media">
										<a class="pull-left" href="#"><img src="source/image/product/{{$product['item']['image']}}" alt=""></a>
										<a style="position: absolute;bottom: 20px;right: 0;background: #e1e1e1;width: 15px;height: 15px;" href="{{route('giamgiohang',$product['item']['id'])}}"><i class="	fa fa-minus"></i></a>
										<div class="media-body">
											<span class="cart-item-title">{{$product['item']['ten']}}</span>
											<span class="cart-item-amount">@if($product['item']['giakm']==0) {{$product['qty']}}*<span>{{$product['item']['gia']}} @else {{$product['qty']}}*<span>{{$product['item']['giakm']}} @endif</span></span>
										</div>
									</div>
								</div>
							@endforeach				
							

								<div class="cart-caption">
									<div class="cart-total text-right">Tổng tiền: <span class="cart-total-value">{{Session('cart')->totalPrice}} VND</span></div>
									<div class="clearfix"></div>

									<div class="center">
										<div class="space10">&nbsp;</div>
										<a href="{{route('dathang')}}" class="beta-btn primary text-center">Đặt hàng <i class="fa fa-chevron-right"></i></a>
									</div>
								</div>

							</div><!--beta-dropdown cart-body -->
							@endif
						</div> <!-- .cart -->
												
					</div>
				</div>
				<div class="clearfix"></div>
			</div> <!-- .container -->
		</div> <!-- .header-body -->
		<div class="header-bottom" style="background-color: #1ea2eb;">
			<div class="container">
				<a class="visible-xs beta-menu-toggle pull-right" href="#"><span class='beta-menu-toggle-text'>Menu</span> <i class="fa fa-bars"></i></a>
				<div class="visible-xs clearfix"></div>
				<nav class="main-menu">
					<ul class="l-inline ov">
						<li><a href="{{route('trang-chu')}}">Trang chủ</a></li>
						<li><a href="#">Loại sản phẩm</a>
							<ul class="sub-menu">
							@foreach($loai_sp as $loai)
								<li><a href="{{route('loaisanpham',$loai->id)}}">{{$loai->ten}}</a></li>	
							@endforeach												
							</ul>
						</li>
						
						<li><a href="{{route('lienhe')}}">Liên hệ</a></li>
					</ul>
					<div class="clearfix"></div>
				</nav>
			</div> <!-- .container -->
		</div> <!-- .header-bottom -->
	</div> <!-- #header -->