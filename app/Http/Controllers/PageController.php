<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\BillDetail;
use App\Models\Cart;
use App\Models\Customer;
use App\Models\Product;
use App\Models\ProductType;
use App\Models\Slide;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class PageController extends Controller
{
    public function getIndex(){
        $slide = Slide::all();
        $new_product = Product::where('new',1)->orderBy('id', 'desc')->paginate(4);
        $sanpham_khuyenmai = Product::where('promotion_price','<>',0)->paginate(8);
//        var_dump($sanpham_khuyenmai);exit();
        return view('page.trangchu',['slide'=>$slide,'new_product'=>$new_product,'sanpham_khuyenmai'=>$sanpham_khuyenmai]);
    }

    public function getLoaiSanPham($type){
        $sp_theoloai = Product::where('id_type',$type)->get();
        $sp_khac = Product::where('id_type','<>',$type)->paginate(3);
        $loai =ProductType::all();
        $ten_sp = ProductType::where('id',$type)->first();
        return view('page.loai_sanpham',compact('sp_theoloai','sp_khac','loai','ten_sp'));
    }

    public function getChiTietSanPham(Request $req){
        $sanpham = Product::where('id',$req->id)->first();
        $sp_tuongduong = Product::where('id_type',$sanpham->id_type)->paginate(3);
        return view('page.chitiet_sanpham',compact('sanpham','sp_tuongduong'));
    }

    public function getLienHe(){
        return view('page.lienhe');
    }

    public function getGioiThieu(){
        return view('page.gioithieu');
    }

    public function getAddtoCart(Request $req,$id){
        $product = Product::find($id);
        $oldCart = Session('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->add($product,$id);
//        var_dump($cart);exit();
        $req->Session()->put('cart',$cart);
        return redirect()->back();
    }

    public function getDeleteCart($id){
        $oldCart = Session::has('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);

        if (count($cart->items)>0){
            Session::put('cart',$cart);
        }
        else{
            Session::forget('cart');
        }
        return redirect()->back();
    }

    public function getCheckout(){
        return view('page.dat_hang');
    }
    public function postCheckout(Request $req){
        $cart = Session::get('cart');
        $customer = new Customer;
        $customer->name = $req->name;
        $customer->gender = $req->gender;
        $customer->email = $req->email;
        $customer->address = $req->address;
        $customer->phone_number = $req->phone;
        $customer->note = $req->notes;
        $customer->save();

        $bill = new Bill;
        $bill->id_customer = $customer->id;
        $bill->date_order = date('Y-m-d');
        $bill->total = $cart->totalPrice;
        $bill->payment = $req->payment_method;
        $bill->note = $req->notes;
        $bill->save();

        foreach ($cart->items as $key => $value) {
            $bill_detail = new BillDetail;
            $bill_detail->id_bill = $bill->id;
            $bill_detail->id_product = $key;
            $bill_detail->quantity = $value['qty'];
            $bill_detail->unit_price = ($value['price']/$value['qty']);
            $bill_detail->save();
        }
        Session::forget('cart');
        return redirect()->back()->with('thongbao','Đặt hàng thành công');;
    }

    public function getLogin(){
        return view('page.login');
    }
    public function getDangKy()
    {
        return view('page.dang_ky');
    }
    public function postDangKy(Request $req){
        $this->validate($req,
            [
                'email'=>'required|email|unique:user,email',
                'password'=>'required|min:6|max:100',
                'fullname'=>'required',
                're_password'=>'required|same:password',
            ],
            [
                'email.required'=>'vui lòng nhập email',
                'email.email'=>'vui lòng nhập đúng định dạng email',
                'email.unique'=>'email đã có người sử dụng',
                'password.required'=>'vui lòng nhập mật khẩu',
                'password.min'=>'vui lòng nhập mật khẩu dài hơn 6 ký tự',
                'password.max'=>'vui lòng nhập mật khẩu ít hơn 100 ký tự',
                're_password.same'=>'vui lòng nhập đúng mật khẩu',
            ]);

        $user = new User();
        //$user->DB = $req->name trong view
        $user->full_name = $req->fullname;
        $user->email = $req->email;
        $user->password = Hash::make($req->password);
        $user->address = $req->address;
        $user->phone = $req->phone;
        $user->save();
        return redirect()->back()->with('thanhcong','Tạo tài khoản thành công');
    }

    public function postLogin(Request $req){
        $this->validate($req,
            [
                'password' => 'required|min:6',
                'email' => 'required|email'
            ],[
                'password.required' => 'yêu cầu nhập password',
                'password.min' => 'password ít nhất có 6 kí tự',
                'email.required' => 'yêu cầu nhập email',
                'email.email' => 'nhập đúng định dạng email'
            ]);

        //chứng thực người dùng
        $chungthuc = array('email'=>$req->email, 'password'=>$req->password);
        if (Auth::attempt($chungthuc)){
            return redirect('trang-chu');
//            return redirect()->back()->with(['flag'=> 'danger','message'=>'đăng nhập thành công']);
        }
        else{
            return redirect()->back()->with(['flag'=> 'danger','message'=>'đăng nhập không thành công']);

        }
    }

    public function getLogout(){
        Auth::logout();
        return redirect('dang-nhap');
    }

    public function getSearch(Request $req){
        $product = Product::where('name','like','%'.$req->keysearch.'%')
            ->orWhere('unit_price',$req->keysearch)
            ->get();
        return view('page.search',compact('product'));
    }

}
