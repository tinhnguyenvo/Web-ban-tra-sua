@extends('master')
@section('content')
 <div class="fullwidthbanner-container">

					
	</div>
	<div class="container">
		<div id="content" class="space-top-none">
			<div class="main-content">
				<!-- <div class="space60">&nbsp;</div>			 -->
				
				<div class="row">
					<div class="col-sm-12" >
						<div class="beta-products-list">
							<h4 style="font-family:arial;font-size: 14px;">Sản phẩm mới</h4>
							<div class="beta-products-details">
								<p  class="pull-left">Có {{count($sanpham_new)}} sản phẩm</p>
								<div class="clearfix"></div>
							</div>

							<div class="row">
							@foreach($sanpham_new as $new)
								<div class="col-sm-3" >
									<div class="single-item" style="border:1px solid;background:#f7f9fc;border-radius: 25px; padding: 15px;">
									@if($new->giakm!=0)
									 <div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
									@endif
										<div class="single-item-header">
											<a href="{{route('chitietsanpham',$new->id)}}"><img src="source/image/product/{{$new->image}}" alt=""></a>
										</div>
										<div class="single-item-body">
											<p style="font-family:arial;font-size: 10px;" class="single-item-title">{{$new->ten}}</p>
											<p style="font-family:arial;font-size: 10px;" class="single-item-price">
											@if($new->giakm==0)
												<span>{{number_format($new->gia)}} VND</span>												
											@else
												<span class="flash-del">{{number_format($new->gia)}} VND</span>
												<span class="flash-sale">{{number_format($new->giakm)}} VND</span>
											@endif	
											</p>
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="{{route('themgiohang',$new->id)}}"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="{{route('chitietsanpham',$new->id)}}">Chi tiết <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
							@endforeach
							<div class=row>{{$sanpham_new->links()}}</div>									
							</div>
						</div> <!-- .beta-products-list -->

						<div class="space50">&nbsp;</div>

						<div class="beta-products-list">
							<h4 style="font-family:arial;font-size: 14px;">Sản phẩm đang bán</h4>
							<div class="beta-products-details">
								<p class="pull-left">Có {{count($sanpham_khuyenmai)}} sản phẩm</p>
								<div class="clearfix"></div>
							</div>
							<div class="row">
							@foreach($sanpham_khuyenmai as $spkm)
								<div class="col-sm-3">
									<div class="single-item" style="border:1px solid;background:#f7f9fc;border-radius: 25px; padding: 15px;">
									@if($spkm->giakm!=0)
									 <div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
									@endif
										<div class="single-item-header">
											<a href="{{route('chitietsanpham',$spkm->id)}}"><img src="source/image/product/{{$spkm->image}}" alt=""></a>
										</div>
										<div class="single-item-body">
											<p style="font-family:arial;font-size: 10px;" class="single-item-title">{{$spkm->ten}}</p>
											<p style="font-family:arial;font-size: 10px;" class="single-item-price">
											@if($spkm->giakm==0)
												<span>{{number_format($spkm->gia)}} VND</span>												
											@else
												<span class="flash-del">{{number_format($spkm->gia)}} VND</span>
												<span class="flash-sale">{{number_format($spkm->giakm)}} VND</span>
											@endif	
											</p>
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="{{route('themgiohang',$spkm->id)}}"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="{{route('chitietsanpham',$spkm->id)}}">Chi tiết<i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
									<hr>
								</div>	
							@endforeach
							
							<div class="space40">&nbsp;</div>
					
						</div> <!-- .beta-products-list -->
					</div>
				</div> <!-- end section with sidebar and main content -->


			</div> <!-- .main-content -->
		</div> <!-- #content -->
@endsection