@extends('masterAd')
@section('main')

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Danh sách đơn hàng</h1>
			</div>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-xs-12 col-md-12 col-lg-12">
				
				<div class="panel panel-primary">
					<div class="panel-heading">Danh sách đơn hàng</div>
					<div class="panel-body">
						<div class="bootstrap-table">
							<div class="table-responsive">
							
								<table class="table table-bordered" style="margin-top:20px;">				
									<thead>
										<tr class="bg-primary">
											<th  width="22%">Tên</th>
											<th >Số lượng</th>
											<th >Giá</th>
										</tr>
									</thead>
									@foreach($cthd as $ct)
									<tbody>

										<tr>
											<td>{{$ct->ten}}</td>
											<td>{{$ct->soluong}}</td>
											<td>{{number_format($ct->gia)}} Đồng</td>
	
										</tr>
                                   
									</tbody>
									@endforeach
								</table>							
							</div>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
		</div><!--/.row-->
	</div>	<!--/.main-->
@endsection	
