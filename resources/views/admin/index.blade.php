
@extends('masterAd')
@section('main')		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">		
		<div class="row">
			<div class="col-lg-12">
				<h3 class="page-header">Trang chủ</h3>
			</div>
		</div><!--/.row-->
									
		<div class="row">
			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-blue panel-widget ">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<svg class="glyph stroked paper coffee cup"><use xlink:href="#stroked-paper-coffee-cup"/></svg>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large">{{count($sp)}}</div>
							<div class="text-muted">Sản phẩm</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-orange panel-widget">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<svg class="glyph stroked table"><use xlink:href="#stroked-table"/></svg>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large">{{count($loai)}}</div>
							<div class="text-muted">Doanh mục</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-teal panel-widget">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large">{{count($kh)}}</div>
							<div class="text-muted">Khách hàng</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-red panel-widget">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<svg class="glyph stroked clipboard with paper"><use xlink:href="#stroked-clipboard-with-paper"/></svg>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large">{{count($hd)}}</div>
							<div class="text-muted">Đơn hàng</div>
						</div>
					</div>
				</div>
			</div>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-md-12">
				
					<p style="color:red;font-size:20px" class="title_thongke">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					THỐNG KÊ DOANH THU</p>

					<form autocomplete="off">
					@csrf
					<div class="col-md-2">
						<p>Từ ngày: <input type="text" id="datepicker1" class="form-control"></p>
						<input type="button" id="btn-dashboard-filter" class="btn btn-primary btn-sm" value="Lọc kết quả"></p>
					</div>
					
					<div class="col-md-2">
						<p>Đến ngày: <input type="text" id="datepicker2" class="form-control"></p>
					</div>

					<div class="col-md-2">
						<p>
							Lọc theo:
							<select class="dashboard-filter form-control">
								<option>--Chọn--</option>
								<option value="7ngay">7 ngày qua</option>
								<option value="thangtruoc">tháng trước</option>
								<option value="thangnay">tháng này</option>
								<option value="365ngayqua">365 ngày qua</option>
							</select>
						</p>
					</div>

					</form>

					<div class="col-md-12">
						<div id="myfirstchart" style="height: 250px"></div>
					</div>

				
			</div><!--/.col-->
		</div><!--/.row-->
	</div>	<!--/.main-->
@endsection	
		  


