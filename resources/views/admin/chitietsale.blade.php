@extends('masterAd')
@section('main')
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<div class="col-lg-12">
				<h3 class="page-header">Chi Tiết Khuyến mãi</h3>
			</div>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-xs-12 col-md-12 col-lg-12">				
				<div class="panel panel-primary">
					<div class="panel-heading">Danh sách tất cả sản phẩm &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					&nbsp;&nbsp;&nbsp;&nbsp; 
					Danh sách sản phẩm đang khuyến mãi</div>
					
					<div class="row">

						<div class="col-lg-6 col-md-6">
							<table class="table table-bordered" style="margin-top:20px;">				
								<thead>
									<tr class="bg-primary">
										<th width="5%">ID</th>
										<th width="35%">Tên sản phẩm</th>
										<th height="10%" width="10%" >Ảnh</th>
										<th width="10%" >giá</th>
										<th height="10%">Tác vụ</th>
									</tr>
								</thead>
								<tbody>
								@foreach($sp as $s)
									<tr>
										<td>{{$s->id}}</td>
										<td>{{$s->ten}}</td>
										<td>
											<img height="50px" width="70px" src="/source/image/product/{{$s->image}}" class="thumbnail">
										</td>
										<td>{{$s->gia}}</td>		
										<td><!--Nut tac vu-->
											<form method="POST" action="{{route('chuyenspkm',$s->id)}}">
												<button type="submit" class="btn">
													<span class="glyphicon glyphicon-plus"></span>
												</button>
												{{csrf_field()}}
											</form>
										</td>	<!--Nut tac vu-->									
									</tr>	
								@endforeach
								</tbody>
							</table>
							<div class=row>{{$sp->links()}}</div>
						</div>
						<div class="col-lg-6 col-md-6">
						<table class="table table-bordered" style="margin-top:20px;">				
								<thead>
									<tr class="bg-primary">
										<th width="5%">ID</th>
										<th width="20%">Tên sản phẩm</th>
										<th >Ảnh</th>
										<th width="10%" >giá</th>
										<th height="10%">Tác vụ</th>
									</tr>
								</thead>
								<tbody>
								@foreach($mang as $m)
									<tr>
										<td>{{$m->id}}</td>
										<td>{{$m->ten}}</td>
										<td>
											<img height="50px" width="70px" src="/source/image/product/{{$m->image}}" class="thumbnail">
										</td>
										<td>{{$m->giakm}}</td>
										<td><!--Nut tac vu-->
											<form method="POST" action="{{route('chuyensp',$m->id)}}">
												<button type="submit" class="btn">
													<span class="glyphicon glyphicon-minus"></span>
												</button>
												{{csrf_field()}}
											</form>
										</td><!--Nut tac vu-->										
									</tr>											
								</tbody>
								@endforeach
							</table>
						</div>

                	</div>

				</div>
			</div>
		</div><!--/.row-->
	</div>	<!--/.main-->
	@endsection	
