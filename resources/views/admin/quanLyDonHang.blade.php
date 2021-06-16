
@extends('masterAd')
@section('main')

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<div class="col-lg-12">
				<h3 class="page-header">Danh sách đơn hàng
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				Có: {{count($sdh)}} đơn hàng
				</h3>
			</div>
		</div><!--/.row-->
		
		<div class="row">
		<div class="col-xs-12 col-md-6 col-lg-3">
        <a href="{{route('donhangmoi')}}">
				<div class="panel panel-blue panel-widget">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
						<svg class="glyph stroked email"><use xlink:href="#stroked-email"/></svg><use xlink:href="#stroked-clipboard-with-paper"/></svg>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large"></div>
							<div class="text-muted">Đơn hàng mới</div>
						</div>
					</div>
				</div>
                </a>
			</div>

        	<div class="col-xs-12 col-md-6 col-lg-3">
                <a href="{{route('donhangdangvanchuyen')}}">
				<div class="panel panel-orange panel-widget">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
						<svg class="glyph stroked gear"><use xlink:href="#stroked-gear"/></svg>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large"></div>
							<div class="text-muted">Đơn hàng đang vận chuyển</div>
						</div>
					</div>
				</div>
                </a>
			</div>

            <div class="col-xs-12 col-md-6 col-lg-3">
                <a href="{{route('donhangdangdahoanthanh')}}">
				<div class="panel panel-teal panel-widget">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
						<svg class="glyph stroked checkmark"><use xlink:href="#stroked-checkmark"/></svg>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large"></div>
							<div class="text-muted">Đơn hàng đã hoàn thành</div>
						</div>
					</div>
				</div>
                </a>
			</div>

            <div class="col-xs-12 col-md-6 col-lg-3">
                <a href="{{route('donhangdahuy')}}">
				<div class="panel panel-red panel-widget">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
						<svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"/></svg>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large"></div>
							<div class="text-muted">Đơn hàng đã hủy</div>
						</div>
					</div>
				</div>
                </a>
			</div>

			<div class="col-xs-12 col-md-12 col-lg-12">
				
				<div class="panel panel-primary">
					<div class="panel-heading">Danh sách đơn hàng</div>
					<div class="panel-body">
						<div class="bootstrap-table">
							<div class="table-responsive">
							
								<table class="table table-bordered" id="myTable" style="margin-top:20px;">				
									<thead>
										<tr class="bg-primary">
											<th>ID</th>
											<th width="12%">Tên khách hàng</th>
											<th>Số điện thoại</th>
											<th width="20%">Địa chỉ</th>
											<th width="8%">Ngày đặt</th>
                                            <th width="20%">Ghi chú</th>
											<th>Tổng tiền</th>
											<th>Trạng thái</th>
                                            <th width="6%">Thao tác</th>
										</tr>
									</thead>
									<tbody>
                                    @foreach($dh  as $d)
										<tr>
											<td>#{{$d->id}}</td>
											<td>{{$d->hoten}}</td>
											<td>{{$d->sdt}}</td>
											<td>{{$d->diachi}}</td>
											<td>{{$d->ngaydat}}</td>
                                            <td>{{$d->ghichu}}</td>
											<td>{{number_format($d->tongtien)}} Đồng</td>
											@if($d->trangthai =='Đã hủy')
											<td style="color:red">{{$d->trangthai}}</td>
											@elseif($d->trangthai =='Giao hàng thành công')
                                            <td style="color:green">{{$d->trangthai}}</td>
											@else
											<td >{{$d->trangthai}}</td>
											@endif
											<td>
											@if($d->trangthai == 'Chờ xử lý')
												<a href="{{route('xemhoadon',$d->id)}}"><i style="color:green" class="glyphicon glyphicon-eye-open" aria-hidden="true"></i></a>
												<a href="{{route('xacnhanvanchuyen',$d->id)}}"><i style="color:green"class="glyphicon glyphicon-check" aria-hidden="true"></i></a>
												<a href="{{route('huyhoadon',$d->id)}}"onclick="return confirm('Bạn có chắc chắn muốn hủy?')"><i style="color:green"class="glyphicon glyphicon-trash" aria-hidden="true"></i></a>
											@elseif($d->trangthai == 'Đang vận chuyển')	
												<a href="{{route('xemhoadon',$d->id)}}"><i style="color:green"class="glyphicon glyphicon-eye-open" aria-hidden="true"></i></a>
												<a href="{{route('xacnhandagiao',$d->id)}}"><i style="color:green"class="glyphicon glyphicon-check" aria-hidden="true"></i></a>
												<a href="{{route('huyhoadon',$d->id)}}"onclick="return confirm('Bạn có chắc chắn muốn hủy?')"><i style="color:green"class="glyphicon glyphicon-trash" aria-hidden="true"></i></a>
											@else
												<a href="{{route('xemhoadon',$d->id)}}"><i style="color:green"class="glyphicon glyphicon-eye-open" aria-hidden="true"></i></a>
												<i style="color:grey"class="glyphicon glyphicon-check" aria-hidden="true"></i>
												<a href="{{route('xoahoadon',$d->id)}}" onclick="return confirm('Bạn có chắc chắn muốn xóa?')"><i style="color:green"class="glyphicon glyphicon-trash" aria-hidden="true"></i></a>
											@endif	
											</td>
		
										</tr>
                                    @endforeach
									</tbody>
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
