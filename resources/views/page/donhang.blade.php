
@extends('master')
@section('content')

<!-- <script type=”text/javascript”>
	$(function(){
		$(".table").on("click", "tr[role=\"button\"]", function (e) {
			window.location = $(this).data("href");
		});
	});
</script> -->


<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 style="font-family:arial;font-size: 20px;" class="inner-title" >Đơn hàng</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="{{route('trang-chu')}}">Home</a> / <span>Đơn hàng</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	
	<div class="container" style="padding-top: 1px;">
		<div id="content">
			
			<div>
				<!-- Shop Products Table -->
				<table  style="width:100%;border: 1px solid black;">
					<thead style="width:100%;border: 1px solid black;">
						<tr>
							<th style="border: 1px solid black;"  class="text-center" >Mã đơn hàng</th>
							<th style="border: 1px solid black;"  class="text-center" >Ngày đặt</th>
							<th style="border: 1px solid black;"  class="text-center" >Tổng tiền</th>
                            <th style="border: 1px solid black;"  class="text-center" >Trạng thái</th>	
							<th style="border: 1px solid black;"  class="text-center">Tác vụ</th>								
						</tr>
					</thead>
					<tbody >
					@foreach($hoadon as $hd)
						<tr style="width:100%;border: 1px solid black;">
							<td style="border: 1px solid black;width:10%;padding: 10px;" class="text-center" >
								<span class="amount"><a href="{{route('chitiethoadon',$hd->id)}}">#{{$hd->id}}</a></span>
							</td>

							<td style="border: 1px solid black;width:20%;padding: 10px;" class="text-center">
								<span class="amount">{{$hd->ngaydat}}</span>
							</td>
						

							<td style="border: 1px solid black;padding: 10px;" class="text-center" >
								<span class="amount">{{number_format($hd->tongtien)}} Đồng</span>
							</td>
							@if($hd->trangthai == 'Đã hủy')
							<td style="border: 1px solid black;padding: 10px;" class="text-justify">
								<span style="color:red" class="amount">{{$hd->trangthai}}</span>
							</td>
							@elseif($hd->trangthai == 'Giao hàng thành công')
							<td style="border: 1px solid black;padding: 10px;" class="text-justify">
								<span style="color:green" class="amount">{{$hd->trangthai}}</span>
							</td>
							@else
							<td style="border: 1px solid black;  padding: 10px;" class="text-justify">
								<span  class="amount">{{$hd->trangthai}}</span>
							</td>
							@endif
							@if($hd->trangthai == 'Đã hủy')
							<td style="border: 1px solid black;width:10%;">
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								<a href="{{route('chitiethoadon',$hd->id)}}"><button type="button" class="btn btn-primary">Xem</button></a>
								&nbsp;&nbsp;<button type="button" class="btn btn-secondary">Hủy</button>
								
							</td>
							@elseif($hd->trangthai == 'Giao hàng thành công')
							<td style="border: 1px solid black;width:10%;">
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								<a href="{{route('chitiethoadon',$hd->id)}}"><button type="button" class="btn btn-primary">Xem</button></a>
								&nbsp;&nbsp;<button type="button" class="btn btn-secondary">Hủy</button>
								
							</td>
							@elseif($hd->trangthai == 'Đang vận chuyển')
							<td style="border: 1px solid black;width:10%;">
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								<a href="{{route('chitiethoadon',$hd->id)}}"><button type="button" class="btn btn-primary">Xem</button></a>
								&nbsp;&nbsp;&nbsp;<button type="button"   class="btn btn-secondary">Hủy</button>
								
							</td>
							@else
							<td style="border: 1px solid black;width:15%;">
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								<a href="{{route('chitiethoadon',$hd->id)}}"><button type="button" class="btn btn-primary">Xem</button></a>
								&nbsp;&nbsp;<a href="{{route('huydonhang',$hd->id)}}"><button type="button" onclick="return confirm('Bạn có chắc chắn muốn hủy?')" class="btn btn-danger">Hủy</button></a>
								
							</td>
							@endif
					
								
							
						</tr>
					@endforeach	
					</tbody>

				</table>
				<!-- End of Shop Table Products -->
			</div>


			<!-- <div class="clearfix"></div> -->

		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection


