@extends('masterAd')
@section('main')
	
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<div class="col-lg-12">
				<h3 class="page-header">Chương trình khuyến mãi</h3>
			</div>
		</div><!--/.row-->
		@if(Session::has('suathanhcong'))
          <div class="alert alert-suscess" style="color:green;font-size: 20px;">{{Session::get('suathanhcong')}}</div>
        @endif
		<div class="row">
			<div class="col-xs-12 col-md-12 col-lg-12">
			@foreach($khuyenmai as $k)
				<div class="panel panel-primary">
					<div class="panel-heading">Đặt lịch khuyến mãi</div>
					<div class="panel-body">
           <form method="post" action="{{route('suasale',$k->id)}}">  
         
							<div class="row" style="margin-bottom:40px">
								<div class="col-xs-6">
                  
                    <div class="form-group" >
                      
        
                    </div>
                  <label>Tên chương trình khuyến mãi:</label>
                  <input type="text" id="tenkm" name="tenkm"><br><br>
                  <label for="birthdaytime">Ngày bắt đầu (ngày và giờ):</label>
                  <input type="datetime-local" id="ngaybd" name="ngaybd"><br><br>
                  <label for="birthdaytime">Ngày kết thúc (ngày và giờ):</label>
                  <input type="datetime-local" id="ngaykt" name="ngaykt"><br><br>
                  <label>Mức giảm:</label>
                  <input type="number" id="giam" name="giam">&nbsp;%<br><br> 

              
                  <br><br><br>
						
  
  
									<input type="submit" name="submit" value="Đặt lịch" class="btn btn-primary"> 
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									<a href=# class="btn btn-danger">Hủy bỏ</a>
									{{csrf_field()}}
                  
								</div>

							</div>
						</form>
					</div>
				</div>

			@endforeach
			</div>			
		</div><!--/.row-->
	</div>	<!--/.main-->

	@endsection		
