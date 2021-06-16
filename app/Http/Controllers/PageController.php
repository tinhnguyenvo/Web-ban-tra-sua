<?php

namespace App\Http\Controllers;
use App\sanpham;
use App\loaisp;
use App\Cart;
use App\khachhang;
use App\cthoadon;
use App\hoadon;
use App\User;
use App\khuyenmai;
use App\ctkhuyenmai;
use Session;
use Hash;
use Auth;
use DB;
use Carbon\Carbon;

use App\Http\Requests\AddProductRequest;
use Storage;



use Illuminate\Http\Request;

class PageController extends Controller
{
    public function getIndex(){
        
        $sanpham_new = sanpham::where('new',1)->paginate(4);
        $sanpham_khuyenmai = sanpham::where('unit','Ly')->get();       
        return view('page.trangchu',compact('sanpham_new','sanpham_khuyenmai'));
    }

    public function getLoaiSp($type){
        $sp_theoloai = sanpham::where('id_loai',$type)->get();
        $sp_khac = sanpham::where('id_loai','<>',$type)->paginate(3);
        $loai = loaisp::all();
        $ten_loai = loaisp::where('id',$type)->first();
        return view('page.loai_sanpham',compact('sp_theoloai','sp_khac','loai','ten_loai'));
    }

    public function getChiTiet(Request $req){
        $ct_sp = sanpham::where('id',$req->id)->first();
        $sp_tt = sanpham::where('id_loai',$ct_sp->id_loai)->paginate(3); //san pham tuong tu
        $sp_nn = sanpham::inRandomOrder()->limit(5)->get();//sam pham ngau nhien
        return view('page.chitiet_sanpham',compact('ct_sp','sp_tt','sp_nn'));
    }

    public function getLienHe(){
        return view('page.lienhe');
    }

    public function getGioiThieu(){
        return view('page.gioithieu');
    }
//Thêm sản phẩm vào giỏ hàng
    public function getGioHang(Request $req,$id){
        $sp = sanpham::find($id);
        $oldCart = Session('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->add( $sp, $id);
        $req->session()->put('cart',$cart);
        return redirect()->back();
    }

//Thêm sản phẩm vào giỏ hàng theo số lượng tùy ý
public function postGioHangSl(Request $req,$id){
    $sp = sanpham::find($id);
    $oldCart = Session('cart')?Session::get('cart'):null;
    $cart = new Cart($oldCart);
    $qty = $req->soluong;
    $cart->addSl( $sp, $id,$qty);
    $req->session()->put('cart',$cart);
    return redirect()->back();
}




//Xóa sản phẩm trong giỏ hàng
    public function getXoaGioHang($id){
        $oldCart = Session('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);
        if(count($cart->items)>0){
            Session::put('cart',$cart);
        }
        else{
            Session::forget('cart');
        }
        return redirect()->back();
    }

    public function getGiamGioHang($id){
        $oldCart = Session('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->reduceByOne($id);
        if(count($cart->items)>0){
            Session::put('cart',$cart);
        }
        else{
            Session::forget('cart');
        }
        return redirect()->back();
    }

    public function getDatHang(){
        if(Session::has('cart')){
            $oldCart = Session::get('cart');
            $cart = new Cart($oldCart);
            //dd($cart);
            return view('page.dat_hang',['product_cart'=>$cart->items,
            'totalPrice'=>$cart->totalPrice, 'totalQty'=>$cart->totalQty]);
        }
        else{
            return view('page.dat_hang');
        }
    }


 // Đạt hàng   
    public function postDatHang(Request $req){
        $cart = Session::get('cart');
        $this->validate($req,
        [
            'name'=>'required|max:50|min:2|regex:/^[\pL\s\-]+$/u',

        ],
        [
            'name.required'=>'Vui lòng nhập tên',
            'name.regex'=>'Tên không hợp lệ',
            'name.max'=>'Tên không được quá hơn  ký tự',
            'name.min'=>'Tên không được ít hơn 50 ký tự',

        ]);
        if(Auth::check()){
            
            $khachhang = new khachhang;
            $khachhang->id = Auth::user()->id;   
                
            $khachhang->hoten = $req->name; // $khachhang trỏ tới hoten trong CSDL truyen sang  $req tro vao "name" cua họ tên trong trang dat_hang
            $khachhang->gioitinh = $req->gender; // tương tự
            $khachhang->email = $req->email; // tương tự
            $khachhang->diachi = $req->address; // tương tự
            $khachhang->sdt = $req->phone; // tương tự
        }
        else{
            $khachhang = new khachhang;     
            $khachhang->hoten = $req->name; 
            $khachhang->gioitinh = $req->gender; 
            $khachhang->email = $req->email; 
            $khachhang->diachi = $req->address; 
            $khachhang->sdt = $req->phone; 
            $khachhang->save();
        }
       // dd($khachhang);
        

        $hoadon = new hoadon;
        $hoadon->id_kh = $khachhang->id;
        $hoadon->ngaydat = date('Y-m-d');
        $hoadon->tongtien = $cart->totalPrice;
        $hoadon->httt = $req->payment_method;       
        $hoadon->ghichu =  $req->notes;
        $hoadon->trangthai ="Chờ xử lý";
        $hoadon->save();

        foreach($cart->items as $key => $value ){
            $ct_hoadon = new cthoadon;
            $ct_hoadon->id_hd = $hoadon->id;
            $ct_hoadon->id_sp = $key;
            $ct_hoadon->soluong = $value['qty'];
            $ct_hoadon->gia = ($value['price']/$value['qty']);
            $ct_hoadon->save();
        }
        Session::forget('cart');
        return redirect()->back()->with('thongbao','Đặt hàng thành công');
       

    }

    //Chức năng đăng nhập

    public function getLogin(){
        return view('page.dangnhap');
    }

    public function postLogin(Request $req){
        $this->validate($req,
        [
            'email'=>'required',
            'password'=>'required|min:6|max:20',
        ],
        [
            'email.required'=>'Vui lòng nhập email',            
            'password.required'=>'Vui lòng nhập mật khẩu',
            'password.min'=>'Mật khẩu ít nhất phải 6 ký tự',
            'password.max'=>'Mật khẩu không được vượt quá 20 ký tự'
        ]);
        $xacnhan = array('email'=>$req->email,'password'=>$req->password);
        $xacnhan2 = array('sdt'=>$req->email,'password'=>$req->password);
        //dd( $xacnhan);
        if(Auth::attempt($xacnhan)){
            return redirect()->route('trang-chu');
        }
        elseif(Auth::attempt($xacnhan2)){
            return redirect()->route('trang-chu');
        }
        else{
            return redirect()->back()->with(['flag'=>'danger','thongbao'=>'Email hoặc password không đúng!']);
        }
    }
   

    //Chức năng đăng ký
    public function getSignin(){
        return view('page.dangky');
    }
//POst dang ky
    public function postSignin(Request $req){
        $this->validate($req,
            [ //Kiểm tra nhập
                'email'=>'required|email|unique:users,email',
                'password'=>'required|min:6|max:20',
                'hovaten'=>'required',
                'repassword'=>'required|same:password',
                'sdt'=>'required|min:10|unique:users,sdt|max:10'
            ],
            [ //Thông báo 
                'email.required'=>'Vui lòng nhập email',
                'email.email'=>'Không đúng định dạng email',
                'email.unique'=>'Email đã có người sử dụng',
                'password.required'=>'Vui lòng nhập mật khẩu',
                're_password.same'=>'Mật khẩu phải giống nhau',
                'password.min'=>'Mật khẩu ít nhất phải 6 ký tự',
                'password.max'=>'Mật khẩu không được vượt quá 20 ký tự',
                'sdt.max'=>'Số điện thoại phải là số điện thoại thực',
                'sdt.min'=>'Số điện thoại phải là số điện thoại thực',
                'sdt.unique'=>'Số điện thoại đã được sử dụng'
                
            ]);
        $users = new User();    //Gọi đến CSDL
        $users->hovaten = $req->hovaten;
        $users->email = $req->email;
        $users->password = Hash::make($req->password);
        $users->sdt = $req->sdt;
        $users->diachi = $req->diachi;
        $users->save();

        $khachhang = new khachhang;    
        $khachhang->hoten = $users->hovaten; // $khachhang trỏ tới hoten trong CSDL truyen sang  $req tro vao "name" cua họ tên trong trang dat_hang
        $khachhang->gioitinh = "Nam"; // tương tự
        $khachhang->email = $users->email; // tương tự
        $khachhang->diachi = $users->diachi; // tương tự
        $khachhang->sdt =   $users->sdt; // tương tự
        $khachhang->save();

        return redirect()->back()->with('thanhcong','Tạo tài khoản thành công!');   
    }

    //Đăng xuất
    public function getLogout(){
        Session::forget('cart');
        Auth::logout();
        return redirect()->route('trang-chu');
    }

    //Tim kiem
    public function getSearch(Request $req){
        $sanpham = sanpham::where('ten','like','%'.$req->search.'%')
                            ->orwhere('gia',$req->search)->get();
        return view('page.trangtimkiem',compact('sanpham'));                    
    }

    //Theo doix don hang
    public function getOrder(){
        if(Auth::check()){
            $hoadon = DB::table('hoadon')->where('id_kh', Auth::user()->id)->get();           
        }
        //dd($hoadon);     
        return view('page.donhang', compact('hoadon'));
    }
    //Huy don hang

    public function getHuyDonHang($id){
        $xacnhan = hoadon::where('id',$id)->update(['trangthai'=>'Đã hủy','ghichu'=>'Khách hủy đơn hàng']);
        return redirect()->back();
    }

    //Chi tiet don hang
    public function getChiTietHoaDon($id){
        $ct_hd = DB::table('cthoadon')
            ->join('sanpham','sanpham.id','cthoadon.id_sp')
            ->join('hoadon','hoadon.id','cthoadon.id_hd')
            ->select('ten','cthoadon.gia','soluong','image')
            ->where('id_hd',$id)->get();
        //dd($ct_hd);

        $hoadon = DB::table('hoadon')   
            ->join('users','users.id','hoadon.id_kh')         
            ->select('hoadon.id as id','hoadon.ghichu','trangthai','hovaten','email','sdt','diachi','httt','tongtien')
            ->where('hoadon.id',$id)->get();
            
            
        //dd($hoadon);
        return view('page.chitiet_hoadon',compact('ct_hd','hoadon'));
    }

    //Trang index admin Dashboard
    public function getAdminIndex(){
        $sp = sanpham::where('unit','Ly')->get();
        $loai = loaisp::all();
        $tk = user::all();
        $kh = khachhang::all();
        $hd = hoadon::all();
        return view('admin.index',compact('sp','loai','tk','hd','kh'));
    }

    // Chuc nang filter date  LOC THEO NGAY TUY CHON
    public function filter_by_date(Request $request){
        $data = $request->all();

        $from_date = $data['from_date'];
        $to_date = $data['to_date'];

        $get = Hoadon::whereBetween('ngaydat',[$from_date,$to_date])
            ->where('trangthai','Giao hàng thành công')
            ->orderBy('ngaydat','ASC')
            ->get();

        foreach($get as $key => $val){

            $chart_data[] = array(
                'period' => $val->ngaydat,
                'id_kh' => $val->id_kh,
                'httt' =>$val->httt,
                'tongtien' =>$val->tongtien
            );
        }
        echo $data = json_encode($chart_data);

    }

    //Tu dong hien thi doanh thu 30 ngay
    public function day30_chart(Request $request){
        $data = $request->all();
        
        $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
        $dauthangnay = Carbon::now('Asia/Ho_Chi_Minh')->startOfMonth()->toDateString();


        $get = Hoadon::whereBetween('ngaydat',[ $dauthangnay,$now])
        ->where('trangthai','Giao hàng thành công')
        ->orderBy('ngaydat','ASC')
        ->get();

        foreach($get as $key => $val){

            $chart_data[] = array(
                'period' => $val->ngaydat,
                'id_kh' => $val->id_kh,
                'httt' =>$val->httt,
                'tongtien' =>$val->tongtien
            );
        }
        echo $data = json_encode($chart_data);
    }


    // chuc nang dashboard_filter LOC THEO SO NGAY DINH SAN
    public function dashboard_filter(Request $request){
        $data = $request->all();

        $dauthangnay = Carbon::now('Asia/Ho_Chi_Minh')->startOfMonth()->toDateString();
        $dau_thangtruoc = Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->startOfMonth()->toDateString();
        $cuoi_thangtruoc = Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->endOfMonth()->toDateString();

        $sub7day = Carbon::now('Asia/Ho_Chi_Minh')->subdays(7)->toDateString();
        $sub365day = Carbon::now('Asia/Ho_Chi_Minh')->subdays(365)->toDateString();

        $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();

        if($data['dashboard_value']=='7ngay'){
            $get = Hoadon::whereBetween('ngaydat',[$sub7day,$now])
            ->where('trangthai','Giao hàng thành công')
            ->orderBy('ngaydat','ASC')
            ->get(); 
        }
        elseif($data['dashboard_value']=='thangtruoc'){
            $get = Hoadon::whereBetween('ngaydat',[ $dau_thangtruoc,$cuoi_thangtruoc])
            ->where('trangthai','Giao hàng thành công')
            ->orderBy('ngaydat','ASC')
            ->get();
        }
        elseif($data['dashboard_value']=='thangnay'){
            $get = Hoadon::whereBetween('ngaydat',[ $dauthangnay,$now])
            ->where('trangthai','Giao hàng thành công')
            ->orderBy('ngaydat','ASC')
            ->get();
        }
        else{
            $get = Hoadon::whereBetween('ngaydat',[$sub365day,$now])
            ->where('trangthai','Giao hàng thành công')
            ->orderBy('ngaydat','ASC')
            ->get();
        }

        foreach($get as $key => $val){

            $chart_data[] = array(
                'period' => $val->ngaydat,
                'id_kh' => $val->id_kh,
                'httt' =>$val->httt,
                'tongtien' =>$val->tongtien
            );
        }
        echo $data = json_encode($chart_data);
        
    }


    //Get va post cua login quan tri

    public function getQuanTri(){
        return view('page.loginAdmin');
    }

    public function postQuanTri(Request $req){
        $this->validate($req,
        [
            'hovaten'=>'required',
            'password'=>'required|min:6|max:20',
        ],
        [
            'hovaten.required'=>'Vui lòng nhập email',
            
            'password.required'=>'Vui lòng nhập mật khẩu',
            'password.min'=>'Mật khẩu ít nhất phải 6 ký tự',
            'password.max'=>'Mật khẩu không được vượt quá 20 ký tự'
        ]);
        

        if(Auth::attempt(['hovaten'=>'admin','password'=>$req->password,'diachi'=>'admin'])){
            return redirect()->route('adminindex');
        }
        elseif( Auth::attempt(['hovaten'=>$req->hovaten,'password'=>$req->password]) ){
            return redirect()->back()->with('baoloi','Loi');
        }
        else{    
           return redirect()->back()->with('baoloi','Loi'); 
        }
        
        
    }

    //hien thi loai sp trong trang admin  --------------------------------------------------------------------------
    public function getAdminLoaisp(){
        $lsp = loaisp::all();   
        return view('admin.danhMuc',compact('lsp'));
    }
    //them laoi sp trong trang admn
    public function postAdminLoaisp(Request $req){
        //$lsp = DB::table('loaisp')->select('ten')->get();
        $this->validate($req,
        [ //Kiểm tra nhập
            'name'=>'required|unique:loaisp,ten',
            
        ],
        [ //Thông báo 
            
            'email.unique'=>'Email đã có người sử dụng',
            
        ]);
        $lnew = new loaisp();
        $lnew->ten = $req->name;
        $lnew->mota = "";
        $lnew->image = "";
        $lnew->save();
        return redirect()->back();

    }

    //sua ten loai san pham 

    public function getSuaLoai($id){   
        $loaisp =loaisp::where('id',$id)->get();     
        return view('admin.suaLoai',compact('loaisp'));
    }

    public function postSuaLoai(Request $req){ 
        $this->validate($req,
        [
            'ten'=>'required',
        ],
        [
            'ten.required' => 'Vui lòng nhập tên sản phẩm.',
        ]);
        // dd($req->ten);
        loaisp::where('id',$req->id)->update(['ten'=>$req->ten]);   
        return redirect()->back()->with('suathanhcong','Sửa tên thành công!');
    }

    // Xoa loai khoi database
    public function getXoaloai($id){
        loaisp::destroy($id);
        return redirect()->back();
    }

 //--------------------- Trang admin San pham-----------------------------------------------------------------------------------------
    public function getSanPham(){
        $ssp = sanpham::where('unit','Ly')->get();
        $sp = sanpham::where('unit','Ly')->paginate(5);
        return view('admin.sanpham',compact('sp','ssp'));
    }

 
    
    //Xoa san pham
    public function getXoaSanPham($id){
        sanpham::destroy($id);
        return redirect()->back();
    }
    //THem san pham
    public function getThemSanPham(){
        $loai = DB::table('loaisp')->select('ten')->get();
        return view('admin.themSanPham',compact('loai'));
    }        
    //Post them san pham

    public function postThemSanPham(AddProductRequest $req){

        $filename = $req->image->getClientOriginalName();
        $sanpham = new sanpham;
        $sanpham->ten = $req ->ten;
        $sanpham->id_loai = $req ->loai;
        $sanpham->gia = $req ->gia;
        $sanpham->giakm = $req ->giakm;
        $sanpham->image = $filename;
        $sanpham->mota = $req->mota;
        $sanpham->new = $req->new;
        $sanpham->unit = "Ly";    
        $sanpham ->save();
        $s =$req->image->storeAs('public',$filename);
        //Storage::move( 'storage/app/anhSanPham/$s', 'public/source/image/product/$s' );
        //File::move($s, $new_path);
        //dd(($s));
        return redirect()->back()->with('themthanhcong','Thêm sản phẩm thành công!'); 

    }

    //Sua thong tin san pham
    public function getSuaSanPham( $id){   
        $sanpham =sanpham::where('id',$id)->get(); 
        $loai = DB::table('loaisp')->select('ten')->get();    
        return view('admin.suaSanPham',compact('sanpham','loai'));
    }

    public function postSuaSanPham(Request $req){ 
        $this->validate($req,
        [
            'ten'=>'required',
        ],
        [
            'ten.required' => 'Vui lòng nhập tên sản phẩm.',
        ]);

        sanpham::where('id',$req->id)->update([
            'ten'=>$req->ten,
            'id_loai'=>$req->loai,
            'mota'=>$req->mota,
            'gia'=>$req->gia,
            'giakm'=>$req->giakm,
            'unit'=>"Ly",
            'new'=>$req->new
            ]);   
        return redirect()->back()->with('suathanhcong','Sửa sản phẩm thành công!');
    }

    //Dat thoi gian khuyen mai
    public function getKhuyenMai( $id){   
        $sanpham =sanpham::where('id',$id)->get(); 
        $loai = DB::table('loaisp')->select('ten')->get();    
        return view('admin.sale',compact('sanpham','loai'));
    }

    public function postKhuyenMai(Request $req){
        $current = new Carbon();        
        sanpham::where('id',$req->id)->update([
            'ngaybd'=>$req->ngaybd,
            'ngaykt'=>$req->ngaykt,
            
            ]);
        $start = sanpham::select('ngaybd')->where('id',$req->id)->first(); 
        $end = sanpham::select('ngaykt')->where('id',$req->id)->first();
        // $kts = var_dump($current->between($start->ngaybd,  $end->ngaykt));
        $kts = $current->between($start->ngaybd,  $end->ngaykt);

        if($kts == true){
            sanpham::where('id',$req->id)->update(['sale'=>1]);
        }
        else{
            sanpham::where('id',$req->id)->update(['sale'=>0]);
        }     
        return redirect()->back()->with('datthanhcong','Đặt lịch khuyến mãi thành công!');
        

    }
    // //Xoa san pham khoi danh sach khuyen mai
    // public function getXoaKhuyenMai($id){
    //     $xacnhan3 = sanpham::where('id',$id)->update(['sale'=>'0']);
    //     return redirect()->back();
    // }




//-------------Trang quan ly khach hang-------------------------------------------------------------------------------------------
   
    public function getKhachHang(){
        $kh = khachhang::all();
        return view('admin.khachhang',compact('kh'));
    }

    //xoa khach hang
     public function getXoaKhachHang($id){
        khachhang::destroy($id);
        return redirect()->back();
    }

//--------------Trang quan ly don hang-----------------------------------------------------------------------------------------------------
    public function getQldh(){
        $sdh = hoadon::select('id')->get();
        $dh = DB::table('hoadon')
            ->join('khachhang','khachhang.id','hoadon.id_kh')
            ->select('hoadon.id as id','hoten','ngaydat','tongtien','httt','hoadon.ghichu as ghichu','trangthai','sdt','diachi')
            ->get();    
        // dd($dh);
        return view('admin.quanLyDonHang',compact('dh','sdh'));
    }
    //Xoa don hang
     public function getXoaDonHang($id){
        hoadon::destroy($id);
        DB::table('cthoadon')
            ->where('id_hd',$id)
            ->delete();
        return redirect()->back();
    }

    //Huy don hang

    public function getHuyDonHangAd($id){
        $xacnhan = hoadon::where('id',$id)->update(['trangthai'=>'Đã hủy','ghichu'=>'admin hủy đơn hàng']);
        return redirect()->back();
    }

    //Xem chi tiet don hang
    public function getXemDonHang($id){
        $cthd = cthoadon::where('id_hd',$id)
        ->join('sanpham','sanpham.id','cthoadon.id_sp')
        ->select('ten','soluong','cthoadon.gia as gia','image')->get();
        //dd($cthd);
        return view('admin.chiTietDonHang',compact('cthd'));
    }

    //Xac nhan van chuyen
    public function getXacNhanVanChuyen($id){
        $xacnhan = hoadon::where('id',$id)->update(['trangthai'=>'Đang vận chuyển']);
        return redirect()->back();
    }
    //Xaac nhan da giao hang
    public function getXacNhanDaGiao($id){
        $xacnhan = hoadon::where('id',$id)->update(['trangthai'=>'Giao hàng thành công']);
        return redirect()->back();
    }

    //xem don hang moi
    public function getDonHangMoi(){
        $dhm = DB::table('hoadon')
            ->join('khachhang','khachhang.id','hoadon.id_kh')
            ->where('trangthai','Chờ xử lý')
            ->select('hoadon.id as id','hoten','ngaydat','tongtien','httt','hoadon.ghichu as ghichu','trangthai','sdt','diachi')
            ->get();
        $sdh = hoadon::select('id')->where('trangthai','Chờ xử lý')->get();    
            
        return view('admin.donhangmoi',compact('dhm','sdh'));     
    }
    //Xem đơn hàng đang vận chuyển
    public function getDonHangDangVanChuyen(){
        $dhm = DB::table('hoadon')
        ->join('khachhang','khachhang.id','hoadon.id_kh')
        ->where('trangthai','Đang vận chuyển')
        ->select('hoadon.id as id','hoten','ngaydat','tongtien','httt','hoadon.ghichu as ghichu','trangthai','sdt','diachi')
        ->get();
        $sdh = hoadon::select('id')->where('trangthai','Đang vận chuyển')->get();    
        
    return view('admin.donhangdangvanchuyen',compact('dhm','sdh'));     
    }

    //XEm đơn hàng dã hủy
    public function getDonHangDaHuy(){
        $dhm = DB::table('hoadon')
        ->join('khachhang','khachhang.id','hoadon.id_kh')
        ->where('trangthai','Đã hủy')
        ->select('hoadon.id as id','hoten','ngaydat','tongtien','httt','hoadon.ghichu as ghichu','trangthai','sdt','diachi')
        ->get();
        $sdh = hoadon::select('id')->where('trangthai','Đã hủy')->get();    
        
    return view('admin.donhangdahuy',compact('dhm','sdh'));   
    }

    //Đơn hàng đã hoàn thành
    public function getDonHangDaDaHoanThanh(){
        $dhm = DB::table('hoadon')
        ->join('khachhang','khachhang.id','hoadon.id_kh')
        ->where('trangthai','Giao hàng thành công')
        ->select('hoadon.id as id','hoten','ngaydat','tongtien','httt','hoadon.ghichu as ghichu','trangthai','sdt','diachi')
        ->get();
        $sdh = hoadon::select('id')->where('trangthai','Giao hàng thành công')->get();    
        
    return view('admin.donhangdahoanthanh',compact('dhm','sdh'));   
    }
    
    //Sale--------------------------------------------------------------------------------
    public function getSale(){
        $skm = khuyenmai::all();
        $km = khuyenmai::all();
        return view('admin.sale',compact('skm','km'));
    }

    public function getThemSale(){
        return view('admin.themsale');
    }
    //Them ngay khuyen mai
    public function postThemSale(Request $req){      
        $khuyenmai =  new khuyenmai;
        $khuyenmai->tenkm = $req->tenkm;
        $khuyenmai->ngaybd  = $req->ngaybd;
        $khuyenmai->ngaykt  = $req->ngaykt; 
        $khuyenmai->giam  = $req->giam;  
        $khuyenmai->save();
        // dd($khuyenmai);
        return redirect()->back()->with('themthanhcong','Thêm thành công!'); 
    }

    //Xoa khuyen mai
    public function getXoaKhuyenMai($id){
        khuyenmai::destroy($id);
        return redirect()->back();
    }

     //Sua thong tin khuyen mai
     public function getSuaSale( $id){   
        $khuyenmai =khuyenmai::where('id',$id)->get();    
        return view('admin.suasale',compact('khuyenmai'));
    }

    public function postSuaSale(Request $req){ 
        $this->validate($req,
        [
            'tenkm'=>'required',
        ],
        [
            'tenkm.required' => 'Vui lòng nhập tên khuyen mai.',
        ]);

        khuyenmai::where('id',$req->id)->update([
            'tenkm'=>$req->tenkm,
            'ngaybd'=>$req->ngaybd,
            'ngaykt'=>$req->ngaykt,
            'giam'=>$req->giam,
            ]);   
        return redirect()->back()->with('suathanhcong','Sửa khuyến mãi thành công!');
    }
    // trang chi tiet sale
    public function getCtSale( $id){   
        $khuyenmai =khuyenmai::where('id',$id)->get();
        $sp = sanpham::where('sale',0)->paginate(5);  
        // $spkm sanpham::where('sale',1)->paginate(5);
        $idspkm = DB::table('ctkhuyenmai')
        ->select('id_sp')
        ->where('id_km','=', $id)
        ->get();  
 

        $mang = array();
        foreach($idspkm as $idspk){
            $mang[] = DB::table('sanpham')
            ->select('id','ten','giakm','image')
            ->where('id','=', $idspk->id_sp)
            ->first();  
        }
        //   dd($mang);


        return view('admin.chitietsale',compact('khuyenmai','sp','mang'));
    }
    // Button chuyen san pham sang SAN PHAM KHUYEN MAI---------
    public function postChuyenSpKm(Request $id){
        $idsp = last(request()->segments());  //co the dung| $new  = request()->segment(2);   get id cua san pham
        $urlKM =  url()->previous();             //"http://localhost:8000/admin-ctsale/4"
        $catchuoi = substr($urlKM, -1);
        $idkm = (int)$catchuoi;

        $sanpham = DB::table('sanpham') // lấy giá tiền của sản phẩm
             ->select('gia')
             ->where('id','=', $idsp)
             ->first();
        $khuyenmai = DB::table('khuyenmai') // lấy % giảm 
        ->select('giam')
        ->where('id','=', $idkm)
        ->first();

 

        $giakm = $sanpham->gia *(100 - $khuyenmai->giam) / 100  ;

      
        $ctkhuyenmai =  new ctkhuyenmai;
        $ctkhuyenmai->id_km = $idkm;
        $ctkhuyenmai->id_sp = $idsp;
        $ctkhuyenmai->giaskm = $giakm;
        $ctkhuyenmai->save();

        sanpham::where('id',$idsp)->update([
            'giakm'=>$giakm,
            'sale'=>1,
            ]);   

        return redirect()->back();
    }
    //Button chuyen san pham ve KHONG khuyen mai---------
    public function postChuyenSp(Request $id){

        $idsp = last(request()->segments());  //co the dung| $new  = request()->segment(2);   get id cua san pham
        $urlKM =  url()->previous();             //"http://localhost:8000/admin-ctsale/4"
        $catchuoi = substr($urlKM, -1);
        $idkm = (int)$catchuoi;

    
        DB::table('ctkhuyenmai')->where('id_sp', '=', $idsp)->delete();


        sanpham::where('id',$idsp)->update([
            'giakm'=>0,
            'sale'=>0,
        ]); 

        return redirect()->back();

    }

    
    

}
