@extends('masterAd')
@section('main')


<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Sửa danh mục</h1>
			</div>
		</div><!--/.row-->
		@if(Session::has('suathanhcong'))
          <div class="alert alert-suscess" style="color:green;font-size: 20px;border:1px; ">{{Session::get('suathanhcong')}}</div>
        @endif
		
		<div class="row">
		@foreach($loaisp as $l)
			<div class="col-xs-12 col-md-5 col-lg-5">
					<div class="panel panel-primary">
						<div class="panel-heading">
							Sửa danh mục
						</div>
						<div class="panel-body">
							<form method="post"  action="{{route('adminsualoai',$l->id)}}">
								<div class="form-group">
									<label>Tên mới của danh mục:</label>
									<input type="text" name="ten" class="form-control" placeholder="Tên mới của danh mục...">
								</div>
								<div class="form-group">
									<input type="submit" name="submit" class="form-control btn btn-primary" value="Đổi tên">
								</div>
								<div class="form-group">
									<a href="{{route('adminloaisp')}}" class="form-control btn btn-danger">Hủy</a>
								</div>
							{{csrf_field()}}
						 	</form>
						</div>
					</div>
			</div>
		@endforeach	
		</div><!--/.row-->
</div>	<!--/.main-->

@endsection	
