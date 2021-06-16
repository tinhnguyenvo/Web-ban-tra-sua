@extends('master')
@section('content')  

    <div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 style="font-family:arial;font-size: 15px;" class="inner-title">Sản phẩm {{$ct_sp->ten}}</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a style="font-family:arial;font-size: 14px;" href="{{route('trang-chu')}}">Trang chủ</a> / <span style="font-family:arial;font-size: 14px;">Thông tin chi tiết sản phẩm</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>

	<div class="container">
		<div id="content">
			<div class="row">
				<div class="col-sm-9">

					<div class="row" style="border:1px solid;background:#f7f9fc;border-radius: 25px; padding: 15px;">
						<div class="col-sm-4">
							@if($ct_sp->giakm!=0)
								<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
							@endif
							<img src="source/image/product/{{$ct_sp->image}}" alt="">
						</div>
						<div class="col-sm-8">
							<div class="single-item-body">								
								<p class="single-item-title"><h2 style="font-family:arial;font-size: 12px;">{{$ct_sp->ten}}</h2></p><br>
								<p class="single-item-price">
										@if($ct_sp->giakm==0)
											<span  style="font-family:arial;font-size: 10px;">{{number_format($ct_sp->gia)}} VND</span>												
										@else
											<span style="font-family:arial;font-size: 10px;" class="flash-del">{{number_format($ct_sp->gia)}} VND</span>
											<span style="font-family:arial;font-size: 10px;" class="flash-sale">{{number_format($ct_sp->giakm)}} VND</span>
										@endif	
								</p>
							</div>

							<div class="clearfix"></div>
							<div class="space20">&nbsp;</div>

							<div class="single-item-desc">
								<p style="font-family:arial;font-size: 10px;">{{$ct_sp->mota}}</p>
							</div>
							<div class="space20">&nbsp;</div>

							<br>
							<br>
							<form action="{{route('themgiohangsl',$ct_sp->id)}}" method="post">
							<input type="hidden" name="_token" value="{{csrf_token()}}">
							<div class="single-item-options" >								
								<input type="number" placeholder="Chọn số lượng:"  name="soluong" id="soluong"  min="1">
								<!-- <div class="input-group number-spinner" style="width:170px;">
									<span class="input-group-btn">
										<button class="btn btn-default" data-dir="dwn"><span class="glyphicon glyphicon-minus"></span></button>
									</span>
									<input type="text" class="form-control text-center" value="1">
									<span class="input-group-btn">
										<button class="btn btn-default" data-dir="up"><span class="glyphicon glyphicon-plus"></span></button>
									</span>
								</div> -->
								<div class="add-to-cart">
									<button type="submit"  class="btn btn-primary"><i class="fa fa-shopping-cart" style="text-align: center;height: 35px;" ></i></button>
								</div>
								<!-- <a class="add-to-cart" type="submit" id="sibmit" style="width:150px" href="{{route('themgiohang',$ct_sp->id)}}"><i class="fa fa-shopping-cart" ></i></a> -->
								<div class="clearfix"></div>
							</div>
							</form>
						</div>
					</div>

					<div class="space40">&nbsp;</div>
					<!-- <div class="woocommerce-tabs">
						<ul class="tabs" >
							<li style="border: 1px solid"><a href="#tab-description">Mô tả</a></li>
						</ul>

						<div class="panel" id="tab-description" style="border: 1px solid" >
							<p>{{$ct_sp->mota}}</p>
						</div>
					</div> -->
					<!-- <div class="space50">&nbsp;</div> -->
					<div class="beta-products-list">
						<h4 style="font-family:arial;font-size: 15px;">Sản phẩm tương tự:</h4>
						<br>
						<div class="row" >
						@foreach($sp_tt as $sptt)
							<div class="col-sm-4"  >
								<div class="single-item" style="border:1px solid;background:#f7f9fc;border-radius: 25px; padding: 6px;">
									@if($sptt->giakm!=0)
									 <div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
									@endif
									<div class="single-item-header">
										<a href="{{route('chitietsanpham',$sptt->id)}}"><img src="source/image/product/{{$sptt->image}}" alt=""></a>
									</div>
									<div class="single-item-body">
										<p style="font-family:arial;font-size: 10px;" class="single-item-title">{{$sptt->ten}}</p>
										<p class="single-item-price">
											@if($sptt->giakm==0)
												<span style="font-family:arial;font-size: 10px;">{{number_format($sptt->gia)}} VND</span>												
											@else
												<span class="flash-del">{{number_format($sptt->gia)}} VND</span>
												<span class="flash-sale">{{number_format($sptt->giakm)}} VND</span>
											@endif	
										</p>
									</div>									
									<div class="single-item-caption">
										<a class="add-to-cart pull-left" href="product.html"><i class="fa fa-shopping-cart"></i></a>
										<a class="beta-btn primary" href="product.html">Details <i class="fa fa-chevron-right"></i></a>
										<div class="clearfix"></div>
									</div>
								</div>
							</div><!-- col-4 -->
						@endforeach
										
						</div><!--Row -->
						<div class="row">{{$sp_tt->links()}}</div>
					</div> <!-- .beta-products-list -->
				</div>
				<div class="col-sm-3 aside">
					<div class="widget">
						<h3 style="font-family:arial;font-size: 12px;" class="widget-title">Sản phẩm khác</h3><br>
						@foreach($sp_nn as $nn)
						<div class="widget-body">
							<div class="beta-sales beta-lists" style="border:1px solid;background:#f7f9fc;border-radius: 25px; padding: 5px;">
								<div class="media beta-sales-item">
									<a class="pull-left" href="{{route('chitietsanpham',$nn->id)}}"><img src="source/image/product/{{$nn->image}}" alt=""></a>
									<div class="media-body" style="font-family:arial;font-size: 10px;">
									{{$nn->ten}}<br>
										<span class="beta-sales-price">{{number_format($nn->gia)}}</span>
									</div>
								</div>
								
							</div>
						</div>
						<hr>
						@endforeach
					</div> <!-- best sellers widget -->
					
				</div>
			</div>
		</div> <!-- #content -->
	</div> <!-- .container -->



@endsection     