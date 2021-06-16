@extends('master')
@section('content')

	<div class="inner-header">
		<div class="container">
			<div class="pull-left">
			@foreach($hoadon as $hd)	<h6 style="font-family:arial;font-size: 20px;" class="inner-title">Chi tiết đơn hàng #{{$hd->id}} </h6>  @endforeach
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="{{route('trang-chu')}}">Home</a> / <span>Chi tiết đơn hàng</span>
				</div>
			</div>
			<br>
			<br>
		</div>
	</div>
	
	<div class="container" >
	@foreach($hoadon as $hd)
		@if($hd->trangthai =="Chờ xử lý")
		<div class="container" style="margin: 25px 50px 75px 200px;">	
            <div class="col-sm-12" style=""><!-- Test GUI giao hang-->
				<ol class="progtrckr" data-progtrckr-steps="5">
				<li class="progtrckr-done">Chờ xử lý</li><!--
				--><li class="progtrckr-todo">Đang vận chuyển</li><!--
				--><li class="progtrckr-todo">Giao hàng thành công</li>	
				</ol>             
            </div><!-- Test GUI giao hang-->
		</div>	
		@elseif($hd->trangthai =="Đang vận chuyển")	
			<div class="col-sm-12" style="margin: 25px 50px 75px 200px;"><!-- Test GUI giao hang-->
				<ol class="progtrckr" data-progtrckr-steps="5">
				<li class="progtrckr-done">Chờ xử lý</li><!--
				--><li class="progtrckr-done">Đang vận chuyển</li><!--
				--><li class="progtrckr-todo">Giao hàng thành công</li>	
				</ol>             
            </div><!-- Test GUI giao hang-->
		@elseif($hd->trangthai =="Giao hàng thành công")
			<div class="col-sm-12"style="margin: 25px 50px 75px 200px;"><!-- Test GUI giao hang-->
				<ol class="progtrckr" data-progtrckr-steps="5">
				<li class="progtrckr-done">Chờ xử lý</li><!--
				--><li class="progtrckr-done">Đang vận chuyển</li><!--
				--><li class="progtrckr-done">Giao hàng thành công</li>	
				</ol>             
            </div><!-- Test GUI giao hang-->
		@endif
		@endforeach

		<div id="content" style="border: 3px solid green;padding: 10px;">
		
            
			<div class="table-responsive">
				<!-- Shop Products Table -->
				<table class="shop_table beta-shopping-cart-table" cellspacing="0">
					<thead>
						<tr>
							<th class="product-name">Sản phẩm</th>
							<th class="product-price">Giá</th>
							<th class="product-quantity">Số lượng</th>
							<th class="product-subtotal">Tổng tiền</th>
						</tr>
					</thead>
					<tbody>
					
					@foreach($ct_hd as $ct)	
						<tr class="cart_item">
							<td class="product-name">
								<div class="media">
									<img class="pull-left"  width="100" height="100" src="source/image/product/{{$ct->image}}" alt="">
									<div class="media-body">
										<p class="font-large table-title" style="font-family:arial;font-size: 20px;">{{$ct->ten}}</p>									
                                        </br>
									</div>
								</div>
							</td>

							<td class="product-subtotal">
								<span class="amount">{{number_format($ct->gia)}} Đồng</span>
							</td>


							<td class="product-quantity">
							    <span class="amount">{{$ct->soluong}}</span>
							</td>

							<td class="product-subtotal">
								<span class="amount">{{number_format(($ct->soluong)*($ct->gia))}} Đồng</span>
							</td>

							
						</tr>
					
					@endforeach	
					
				
					</tbody>

					
				</table>
				<!-- End of Shop Table Products -->
			</div>
            </br>
            

			<!-- Cart Collaterals -->
			@foreach($hoadon as $hd)		
			<div class="cart-collaterals">
				<div>
					<div class="col-sm-6" style="border: 1px solid;margin-top: 20px; line-height: 30px; background: white">
						<div class="cart-totals-row"><h5 class="cart-total-title">Thông tin đơn hàng</h5></div>
						<div class="cart-totals-row"><span>Tên khách hàng:</span> <span><b>{{$hd->hovaten}}</b></span></div>
						<div class="cart-totals-row"><span>Địa chỉ:</span> <span>{{$hd->diachi}}</span></div>
						<div class="cart-totals-row"><span>Số điện thoại:</span> <span>{{$hd->sdt}}</span></div>
						<div class="cart-totals-row"><span>Email:</span> <span>{{$hd->email}}</span></div>
						<div class="cart-totals-row"><span>Ghi chú:</span> <span>{{$hd->ghichu}}</span></div>
					</div>
				</div>

				<div>
					<div class="col-sm-6" style="border: 1px solid;margin-top: 20px; line-height: 30px; background: white">
						<div class="cart-totals-row"><h5 class="cart-total-title">Thông tin thanh toán</h5></div>
						<div class="cart-totals-row"><span>Hình thức thanh toán:</span> <span>{{$hd->httt}}</span></div>
						<div class="cart-totals-row"><span>Phí vận chuyển:</span> <span>Miễn phí</span></div>
						<div class="cart-totals-row"><span>Tổng tiền:</span> <span>{{number_format($hd->tongtien)}} Đồng</span></div>
					</div>
				</div>

				

				<div class="clearfix"></div>
				</div>
				<!-- End of Cart Collaterals -->
				<div class="clearfix"></div>
			@endforeach
			<div class="clearfix"></div>

		</div> <!-- #content -->
	</div> <!-- .container -->

@endsection	