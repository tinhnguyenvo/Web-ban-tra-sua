@if(Auth::user()->hovaten =="admin")
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Trang quản trị | Đậu biếc shop</title>
<link href="{{asset('source/assets/admin/css/bootstrap.min.css')}}" rel="stylesheet">
<link href="{{asset('source/assets/admin/css/datepicker3.css')}}" rel="stylesheet">
<link href="{{asset('source/assets/admin/css/styles.css')}}" rel="stylesheet">
<link href="{{asset('source/assets/admin/css/jquery-ui.css')}}" rel="stylesheet">
<link href="{{asset('source/assets/admin/css/morris.css')}}" rel="stylesheet">
<script type="text/javascript" src="{{asset('source/assets/admin/ckeditor/ckeditor.js')}}"></script>
<script src="{{asset('source/assets/admin/js/lumino.glyphs.js')}}"></script>



</head>
<body>
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="#">Trang quản trị trà sữa Đậu Biếc</a>
				<ul class="user-menu">
					<li class="dropdown pull-right">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg>Xin chào {{Auth::user()->hovaten}} <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="{{route('logout')}}"><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Logout</a></li>
						</ul>
					</li>
				</ul>
			</div>
							
		</div><!-- /.container-fluid -->
	</nav>
		
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<ul class="nav menu">
			<!-- <li role="presentation" class="divider"></li> -->
        <li><img src="{{asset('source/assets/dest/images/icon.png')}}" width="200px" height="100px"   alt=""></a></li>
			<li style="height:50px"  ><a href="{{route('adminindex')}}"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Trang chủ</a></li>
			<li style="height:50px" ><a href="{{route('adminloaisp')}}"><svg class="glyph stroked table"><use xlink:href="#stroked-table"/></svg>Danh mục sản phẩm</a></li>
			<li style="height:50px"><a href="{{route('sanpham')}}"><svg class="glyph stroked paper coffee cup"><use xlink:href="#stroked-paper-coffee-cup"/></svg>Sản phẩm</a></li>
			<li style="height:50px"><a href="{{route('khachhang')}}"><svg class="glyph stroked male user "><use xlink:href="#stroked-male-user"/></svg> Khách hàng</a></li>
			<li  style="height:50px"><a href="{{route('qldh')}}"><svg class="glyph stroked clipboard with paper"><use xlink:href="#stroked-clipboard-with-paper"/></svg>Đơn hàng</a></li>
			<li  style="height:50px"class="active" ><a href="{{route('sale')}}"><svg class="glyph stroked hourglass"><use xlink:href="#stroked-hourglass"/></svg>Khuyến mãi</a></li>
			<li role="presentation" class="divider"></li>
		</ul>
		
	</div><!--/.sidebar-->


    @yield('main')
    <!--main-->


    <script src="{{asset('source/assets/admin/js/jquery-1.11.1.min.js')}}"></script>
	<script src="{{asset('source/assets/admin/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('source/assets/admin/js/chart.min.js')}}"></script>
	<script src="{{asset('source/assets/admin/js/chart-data.js')}}"></script>
	<script src="{{asset('source/assets/admin/js/easypiechart.js')}}"></script>
	<script src="{{asset('source/assets/admin/js/easypiechart-data.js')}}"></script>
	<script src="{{asset('source/assets/admin/js/bootstrap-datepicker.js')}}"></script>
	<script src="{{asset('source/assets/admin/js/jquery-ui.js')}}"></script>
	<script src="{{asset('source/assets/admin/js/morris.min.js')}}"></script>
	<script src="{{asset('source/assets/admin/js/raphael-min.js')}}"></script>
	<script>
		$('#calendar').datepicker({
		});

		!function ($) {
		    $(document).on("click","ul.nav li.parent > a > span.icon", function(){          
		        $(this).find('em:first').toggleClass("glyphicon-minus");      
		    }); 
		    $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
		}(window.jQuery);

		$(window).on('resize', function () {
		  if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
		})
		$(window).on('resize', function () {
		  if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
		})

		function changeImg(input){
		    //Nếu như tồn thuộc tính file, đồng nghĩa người dùng đã chọn file mới
		    if(input.files && input.files[0]){
		        var reader = new FileReader();
		        //Sự kiện file đã được load vào website
		        reader.onload = function(e){
		            //Thay đổi đường dẫn ảnh
		            $('#avatar').attr('src',e.target.result);
		        }
		        reader.readAsDataURL(input.files[0]);
	
		    }
		}

		//Ajax code o day *************
		$(document).ready(function() {
		 

			chart30day();

			//loc theo doanh thu 30 ngay qua
			function chart30day(){
				var _token = $('input[name="_token"]').val();
				$.ajax({
					url:"{{url('/day30-chart')}}",
					method:"POST",
					dataType:"JSON",
					data:{_token:_token},

					success:function(data)
					{
						chart.setData(data);
					}
				});	
			}


			$('.dashboard-filter').change(function(){
				var dashboard_value = $(this).val();
				var _token =  $('input[name="_token"]').val();
				// alert(dashboard_value);
				$.ajax({
					url:"{{url('/dashboard-filter')}}",
					method:"POST",
					dataType:"JSON",
					data:{dashboard_value:dashboard_value,_token:_token},

					success:function(data)
					{
						chart.setData(data);
					}
				});
			});
			
			

			// Nut loc ngay o trang dashboard admin
			$('#btn-dashboard-filter').click(function(){
				// alert('ok');
				var _token = $('input[name="_token"]').val();

				var from_date = $('#datepicker1').val();
				var to_date = $('#datepicker2').val();
				
				$.ajax({
					url:"{{url('/filter-by-date')}}",
					method:"POST",
					dataType:"JSON",
					data:{from_date:from_date,to_date:to_date,_token:_token},

					success:function(data)
					{
						chart.setData(data);
					}
				});

			});
		
			var chart = new Morris.Bar({
			//Option chart
			element: 'myfirstchart',
				parseTime: false,
			xkey: 'period',
			ykeys: ['tongtien'],

			labels: ['Tổng tiền']
			});


			$('#avatar').click(function(){
		        $('#img').click();
		    });

		});

		$( function() {
			$( "#datepicker1" ).datepicker({
				prevText:"Tháng trước",
				nextText:"Tháng sau",
				dateFormat:"yy-mm-dd",
				dayNamesMin:[ "T2", "T3", "T4", "T5", "T6", "T7", "CN"],
				duration: "slow"
			});
			$( "#datepicker2" ).datepicker({
				prevText:"Tháng trước",
				nextText:"Tháng sau",
				dateFormat:"yy-mm-dd",
				dayNamesMin:[ "T2", "T3", "T4", "T5", "T6", "T7", "CN"],
				duration: "slow"
			});
		} );

		




		
	</script>	
</body>

</html>
@endif