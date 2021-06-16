@extends('master')
@section('content')
<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6  style="font-family:arial;font-size: 20px;" class="inner-title">Sản phẩm {{$ten_loai->ten}}</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="{{route('trang-chu')}}">Home</a> / <span>Loại sản phẩm</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<div class="container">
		<div id="content" class="space-top-none">
			<div class="main-content">
				<div class="space60">&nbsp;</div>
				<div class="row">
					<div class="col-sm-3" >
						<ul class="aside-menu">
						@foreach($loai as $l)
							<li style="font-family:arial;font-size: 15px;"><a href="{{route('loaisanpham',$l->id)}}">{{$l->ten}}</a></li>
						@endforeach	
						</ul>
					</div>
					<div class="col-sm-9">
						<div class="beta-products-list">
							<h4 style="font-family:arial;font-size: 20px;">{{$ten_loai->ten}}</h4>
							<div class="beta-products-details">
								<p class="pull-left">Có {{count($sp_theoloai)}} sản phẩm</p>
								<div class="clearfix"></div>
							</div>

							<div class="row">
							@foreach($sp_theoloai as $sp)
								<div class="col-sm-4" >
									<div class="single-item" style="border:1px solid;background:#f7f9fc;border-radius: 25px; padding: 5px;">
									@if($sp->giakm!=0)
									 <div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
									@endif
										<div class="single-item-header">
											<a href="{{route('chitietsanpham',$sp->id)}}"><img src="source/image/product/{{$sp->image}}" alt=""></a>
										</div>
										<div class="single-item-body">
											<p style="font-family:arial;font-size: 10px;" class="single-item-title">{{$sp->ten}}</p>
											<p style="font-family:arial;font-size: 10px;" class="single-item-price">
											@if($sp->giakm !=0)
												<span class="flash-del">{{number_format($sp->gia)}} VND</span>
												<span class="flash-sale">{{number_format($sp->giakm)}} VND</span>
											@else	
												<span>{{number_format($sp->gia)}} VND</span>
											@endif	
											</p>
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="{{route('themgiohang',$sp->id)}}"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="{{route('chitietsanpham',$sp->id)}}">Chi tiết <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
									<br>
								</div>								
							@endforeach									
							</div><!-- .Row -->
						</div> <!-- .beta-products-list -->

						<div class="space50">&nbsp;</div>

						<div class="beta-products-list">
							<h4 style="font-family:arial;font-size: 10px;">Các sản phẩm khác</h4>
							<div class="beta-products-details">
								<p class="pull-left">Có {{count($sp_khac)}} sản phẩm</p>
								<div class="clearfix"></div>
							</div>
							<div class="row">
							@foreach($sp_khac as $sp_k)
								<div class="col-sm-4">
									<div class="single-item" style="border:1px solid;background:#f7f9fc;border-radius: 25px; padding: 5px;">
									@if($sp_k->giakm!=0)
									 <div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
									@endif
										<div class="single-item-header">
											<a href="{{route('chitietsanpham',$sp->id)}}"><img src="source/image/product/{{$sp_k->image}}" alt=""></a>
										</div>
										<div class="single-item-body">
											<p style="font-family:arial;font-size: 10px;" class="single-item-title">{{$sp_k->ten}}</p>
											<p style="font-family:arial;font-size: 10px;" class="single-item-price">
											@if($sp_k->giakm !=0)
												<span class="flash-del">{{number_format($sp_k->gia)}} VND</span>
												<span class="flash-sale">{{number_format($sp_k->giakm)}} VND</span>
											@else	
												<span>{{number_format($sp_k->gia)}} VND</span>
											@endif	
											</p>
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="{{route('themgiohang',$sp_k->id)}}"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="{{route('chitietsanpham',$sp_k->id)}}">Chi tiết <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
									<br>
								</div>								
							@endforeach							
							</div> <!--ROW-->
							<div class="row">{{$sp_khac->links()}}</div>
							<div class="space40">&nbsp;</div>
							
						</div> <!-- .beta-products-list -->

					
					</div><!--col-9-->
				</div> <!-- end section with sidebar and main content -->


			</div> <!-- .main-content -->
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection    