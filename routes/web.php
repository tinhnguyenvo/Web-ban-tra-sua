<?php
use Carbon\Carbon;
use App\khuyenmai;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('index',[
    'as' => 'trang-chu',
    'uses' => 'PageController@getIndex'
]);

Route::get('loai-san-pham/{type}',[
    'as' => 'loaisanpham',
    'uses' => 'PageController@getLoaiSp'
]);

Route::get('chi-tiet-san-pham/{id}',[
    'as' => 'chitietsanpham',
    'uses' => 'PageController@getChiTiet'
]);

Route::get('lien-he',[
    'as' => 'lienhe',
    'uses' => 'PageController@getLienHe'
]);

Route::get('gioi-thieu',[
    'as' => 'gioithieu',
    'uses' => 'PageController@getGioiThieu'
]);
// Gio hang
Route::get('gio-hang/{id}',[
    'as' => 'themgiohang',
    'uses' => 'PageController@getGioHang'
]);
//Them san pham theo so luong ------------------------------------------------------
Route::post('gio-hang/{id}',[
    'as' => 'themgiohangsl',
    'uses' => 'PageController@postGioHangsl'
]);

Route::get('xoa-gio-hang/{id}',[
    'as' => 'xoagiohang',
    'uses' => 'PageController@getXoaGioHang'
]);

Route::get('giam-gio-hang/{id}',[
    'as' => 'giamgiohang',
    'uses' => 'PageController@getGiamGioHang'
]);

Route::get('dat-hang', [
    'as' => 'dathang',
    'uses' => 'PageController@getDatHang'
]);

Route::post('dat-hang', [
    'as' => 'dathang',
    'uses' => 'PageController@postDatHang'
]);

Route::get('dang-nhap', [
    'as' => 'login',
    'uses' => 'PageController@getLogin'
]);

Route::post('dang-nhap', [
    'as' => 'login',
    'uses' => 'PageController@postLogin'
]);

Route::get('dang-ky', [
    'as' => 'signin',
    'uses' => 'PageController@getSignin'
]);

Route::post('dang-ky', [
    'as' => 'signin',
    'uses' => 'PageController@postSignin'
]);

Route::get('dang-xuat',[
    'as' => 'logout',
    'uses' => 'PageController@getLogout'
]);

Route::get('tim-kiem',[
    'as' => 'search',
    'uses' => 'PageController@getSearch'
]);

Route::get('don-hang',[
    'as' => 'order',
    'uses' => 'PageController@getOrder'
]);

Route::get('huy-don-hang/{id}',[
    'as' => 'huydonhang',
    'uses' => 'PageController@getHuyDonHang'
]);

Route::get('chi-tiet-hoa-don/{id}',[
    'as' => 'chitiethoadon',
    'uses' => 'PageController@getChiTietHoaDon'
]);

//ROute dang nhap vao trang admin -------------------------------------------------------------------------------

Route::get('admin',[
	'as'=>'admin',
	'uses'=>'PageController@getQuanTri'
]);

Route::post('admin',[
	'as'=>'admin',
	'uses'=>'PageController@postQuanTri'
]);

//Route trang chu admin Dash board

Route::get('admin-index',[
    'as'=>'adminindex',
    'uses'=>'PageController@getAdminIndex'
]);
// Chart ------------------
Route::post('/filter-by-date','PageController@filter_by_date');
Route::post('/dashboard-filter','PageController@dashboard_filter');
Route::post('/day30-chart','PageController@day30_chart');

//ROute quan ly danh muc san pham
Route::get('admin-loaisp',[
    'as'=>'adminloaisp',
    'uses'=>'PageController@getAdminLoaisp'
]);

//ROute quan ly danh muc san pham
Route::post('admin-loaisp',[
    'as'=>'adminloaisp',
    'uses'=>'PageController@postAdminLoaisp'
]);

//sua loai san pham

Route::get('admin-sualoai/{id}',[
    'as'=>'adminsualoai',
    'uses'=>'PageController@getSuaLoai'
]);

Route::post('admin-sualoai/{id}',[
    'as'=>'adminsualoai',
    'uses'=>'PageController@postSuaLoai'
]);

//Xoa laoi san pham

Route::get('admin-xoaloai/{id}',[
    'as'=>'xoaloai',
    'uses'=>'PageController@getXoaloai'
]);

//Trang san pham ------------------------------------
Route::get('admin-sanpham',[
    'as'=>'sanpham',
    'uses'=>'PageController@getSanPham'
]);



Route::get('admin-xoasanpham/{id}',[
    'as'=>'xoasanpham',
    'uses'=>'PageController@getXoaSanPham'
]);

//ROute them san pham

Route::get('admin-themsanpham',[
    'as'=>'themsanpham',
    'uses'=>'PageController@getThemSanPham'
]);

Route::post('admin-themsanpham',[
    'as'=>'themsanpham',
    'uses'=>'PageController@postThemSanPham'
]);

//Route sua san pham
Route::get('admin-suasanpham/{id}',[
    'as'=>'suasanpham',
    'uses'=>'PageController@getSuaSanPham'
]);
Route::post('admin-suasanpham/{id}',[
    'as'=>'suasanpham',
    'uses'=>'PageController@postSuaSanPham'
]);

//Dat thoi gian sale san pham--------------------======================================================+++++++++++
Route::get('admin-khuyenmai/{id}',[
    'as'=>'khuyenmai',
    'uses'=>'PageController@getKhuyenMai'
]);
Route::post('admin-khuyenmai/{id}',[
    'as'=>'khuyenmai',
    'uses'=>'PageController@postKhuyenMai'
]);

Route::get('xoa-khuyen-mai/{id}',[
    'as'=>'xoakhuyenmai',
    'uses'=>'PageController@getXoaKhuyenMai'
]);


//Trang khach hang----------------------------------------
Route::get('admin-khachhang',[
    'as'=>'khachhang',
    'uses'=>'PageController@getKhachHang'
]);

//Xoa khach hang
Route::get('admin-xoakhachhang/{id}',[
    'as'=>'xoakhachhang',
    'uses'=>'PageController@getXoaKhachHang'
]);

//Trang quan ly don hang----------------------------------------

Route::get('admin-qldh',[
    'as'=>'qldh',
    'uses'=>'PageController@getQldh'
]);
//Xoa hoa don
Route::get('admin-xoahoadon/{id}',[
    'as'=>'xoahoadon',
    'uses'=>'PageController@getXoaDonHang'
]);
//Huy don hang
Route::get('admin-huyhoadon/{id}',[
    'as'=>'huyhoadon',
    'uses'=>'PageController@getHuyDonHangAd'
]);

//XMe chi tiet don hang (chua xong)
Route::get('admin-xemhoadon/{id}',[
    'as'=>'xemhoadon',
    'uses'=>'PageController@getXemDonHang'
]);
//Xac nhan dang van chuyen san pham
Route::get('admin-xacnhanvanchuyen/{id}',[
    'as'=>'xacnhanvanchuyen',
    'uses'=>'PageController@getXacNhanVanChuyen'
]);
//Xac nhan da giao
Route::get('admin-xacnhandagiao/{id}',[
    'as'=>'xacnhandagiao',
    'uses'=>'PageController@getXacNhanDaGiao'
]);

//Xem đơn hàng mới
Route::get('admin-donhangmoi',[
    'as'=>'donhangmoi',
    'uses'=>'PageController@getDonHangMoi'
]);
//xem đơn hàng đang vận chuyển
Route::get('admin-donhagdangvanchuyen',[
    'as'=>'donhangdangvanchuyen',
    'uses'=>'PageController@getDonHangDangVanChuyen'
]);

//Xem đơn hàng đã hủy
Route::get('admin-donhagdahuy',[
    'as'=>'donhangdahuy',
    'uses'=>'PageController@getDonHangDaHuy'
]);
//Xem đơn hàng đã hoàn thành
Route::get('admin-donhagdahoanthanh',[
    'as'=>'donhangdangdahoanthanh',
    'uses'=>'PageController@getDonHangDaDaHoanThanh'
]);



//Test ngay
// Route::get('/time',function(){
//     $dt = Carbon::now();
//     echo $dt->addYears(5);                 
//     echo $dt->addYear();                    
//     echo $dt->subYear();                  
//     echo $dt->subYears(5);    
// });

// Trang chu cua chương trình khuyến mãi-----------------------------
Route::get('admin-sale',[
    'as'=>'sale',
    'uses'=>'PageController@getSale'
]);

//Get them khuyen mai
Route::get('admin-themsale',[
    'as'=>'themsale',
    'uses'=>'PageController@getThemSale'
]);
//Post them khuyen mai
Route::post('admin-themsale',[
    'as'=>'themsale',
    'uses'=>'PageController@postThemSale'
]);
//Xoa khuyen mai
Route::get('admin-xoakhuyenmai/{id}',[
    'as'=>'xoakhuyenmai',
    'uses'=>'PageController@getXoaKhuyenMai'
]);
//Route sua san pham
Route::get('admin-suasale/{id}',[
    'as'=>'suasale',
    'uses'=>'PageController@getSuaSale'
]);
Route::post('admin-suasale/{id}',[
    'as'=>'suasale',
    'uses'=>'PageController@postSuaSale'
]);

//Rooute chi tiet sale
Route::get('admin-ctsale/{id}',[
    'as'=>'ctsale',
    'uses'=>'PageController@getCtSale'
]);
//Chuyen san pham sang san pham khuyen mai
Route::post('admin-chuyenspkm/{id}',[
    'as'=>'chuyenspkm',
    'uses'=>'PageController@postChuyenSpKm'
]);
//Chuyen san pham ve khong khuyen mai

Route::post('admin-chuyensp/{id}',[
    'as'=>'chuyensp',
    'uses'=>'PageController@postChuyenSp'
]);


//Post ngay bat dau khuyen mai
Route::post('startsale',[
    'as'=>'startsale',
    'uses'=>'PageController@postStartSale'
]);




Route::get('/time',function(){
    $current = new Carbon();
    $start = khuyenmai::select('ngaybd')->where('id',1)->first();
    $end = khuyenmai::select('ngaykt')->where('id',1)->first();
    $kts = var_dump($current->between($start->ngaybd,  $end->ngaybd));
    echo $kts;


});

