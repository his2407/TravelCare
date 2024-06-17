<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use Session;

use Redirect;

use DB;

class Maincontroller extends Controller
{
    public function index(){
        return view('index');
    }
    public function contact(){
        return view('contact');
    }
    public function aboutus(){
        return view('aboutus');
    }
    public function login(){
        return view('login');
    }
    public function session(Request $req){
        $name = $req['username'];
        $pass = $req['password'];

        if(Auth::attempt(['username'=>$name,'password'=>$pass])){
            $kh = DB::table('users')
            ->where('username','=',$name)
            ->first();
            Session::put('id',$kh->MaTK);
            if($kh->Admin == 1)
            Session::put('ad',$kh->Admin);
            return redirect('index');
        }
        else
            return Redirect::back()->with('message', 'Login Fail !! Wrong Username or Password !!');     
    }
    public function logout(){
        Auth::logout();
        Session::flush();
        return view('index');
    }
    public function signup(){
        return view('signup');
    }
    public function submitsignup(Request $req){
        $username = $req->username;
        $pass = $req->pass;
        $repass = $req->repass;
        $name = $req->name;
        $date = date("Y-m-d", strtotime($req->dateofbirth));
        $sex = $req->sex;
        $phone = $req->phone;
        $address = $req->address;

        $checkname = DB::table('users')
            ->where('username','=',$username)
            ->first();

        if(($username == "")||($pass == "")||($repass == "")||($name == "")||($date == "")||($sex == "")){
            return Redirect::back()->with('message', 'Please fill the form !!');
        }elseif($pass != $repass){
            return Redirect::back()->with('message', 'Re-type password is wrong !!');
        }elseif($checkname != ""){
            return Redirect::back()->with('message', 'This username has already exist !!');
        }else{
            $user = DB::table('users')->insertGetId(
                [
                    'username' => $username,
                    'password' => bcrypt($pass),
                    'admin' => 0,
                ]
            );
            $info = DB::table('users')
            ->where('username','=',$username)
            ->first();
            $infouser = DB::table('khachhang')->insert(
                [
                    'MaKH' => $info->MaTK,
                    'TenKH' => $name,
                    'NgaySinh' => $date,
                    'GioiTinh' => $sex,
                    'SDT' => $phone,
                    'DiaChi' => $address,
                ]
            );
            return Redirect::back()->with('message2', 'SignUp Success !!');
        }

        
    }
    public function editprofile(){

            $makh = Session('id');

        $kh = DB::table('khachhang')
            ->where('MaKH','=',$makh)
            ->first();
        $birth = date("d-m-Y", strtotime($kh->NgaySinh));
        return view('editprofile',['khachhang'=>$kh,'birth'=>$birth]);
    }
    public function submitprofile(Request $req){

        $name = $req->name;
        $date = date("Y-m-d", strtotime($req->dateofbirth));
        $sex = $req->sex;
        $phone = $req->phone;
        $address = $req->address;
        if ($req->hasFile('upimg')) {
                    $image = $req->file('upimg');
                    $imgname = $image->getClientOriginalName();
                    $destinationPath = public_path('/img/avatar-user');
                    $image->move($destinationPath, $imgname);
                }
                else
                    $imgname = $req->img;

        if($req->name == "")
            return Redirect::back()->with('message2', 'Please enter your name !!');
        else{
            $edit = DB::table('khachhang')
              ->where('MaKH','=', $req->id)
              ->update([
                'TenKH' => $name,
                'NgaySinh' => $date,
                'GioiTinh' => $sex,
                'SDT' => $phone,
                'DiaChi' => $address,
                'IMG' => $imgname,
                ]);
            if(Session::has('ad'))
                return redirect("ad-user");
            else
                return Redirect::back()->with('message', 'Saved !!');
        }
    }
    public function editpassword(){
        return view('editpassword');
    }
    public function submitchangepass(Request $req){
        $pass = $req->password;
        $newpass = $req->newpass;
        $renew = $req->renewpass;
        $user = DB::table('users')
            ->where('MaTK','=',Session('id'))
            ->first();


        if(($pass == "") || ($newpass == "") || ($renew == ""))
            return Redirect::back()->with('message2', 'Please fill the form !!');
        elseif($newpass != $renew)
            return Redirect::back()->with('message2', 'Please Re-type your new password !!');
        elseif(Auth::attempt(['username'=>$user->username,'password'=>$pass])){
            $edit = DB::table('users')
              ->where('MaTK','=', Session('id'))
              ->update([
                'password' => bcrypt($newpass),
                ]);
            return Redirect::back()->with('message', 'Success !!');
        }
        else
            return Redirect::back()->with('message2', 'Wrong Password !!');
    }
    public function history(){

        $hotel = DB::table('hoadonphong')
            ->where('MaKH','=',Session('id'))
            ->join('khachsan', 'khachsan.MaKS', '=', 'hoadonphong.MaKS')
            ->join('loaiphong', 'hoadonphong.LoaiPhong', '=', 'loaiphong.MaLP')
            ->orderBy('hoadonphong.MaHD','asc')
            ->simplePaginate(5);

        $flight = DB::table('hoadonbay')
            ->where('MaKH','=',Session('id'))
            ->join('chuyenbay', 'hoadonbay.MaMB', '=', 'chuyenbay.MaMB')
            ->join('hangmaybay', 'chuyenbay.Hang', '=', 'hangmaybay.MaHang')
            ->join(DB::raw('thanhpho as di'), 'hoadonbay.DiemDi', '=', 'di.MaTP')
            ->join(DB::raw('thanhpho as den'), 'hoadonbay.DiemDen', '=', 'den.MaTP')
            ->join('loaive', 'hoadonbay.LoaiVe', '=', 'loaive.MaLV')
            ->join('hangghe', 'hoadonbay.HangGhe', '=', 'hangghe.MaHG')
            ->select('hoadonbay.*','hangmaybay.TenHang',DB::raw('di.TenTP as di'),DB::raw('den.TenTP as den'),'loaive.TenLV','hangghe.TenHG')
            ->orderBy('hoadonbay.MaHD','asc')
            ->simplePaginate(5);

        return view('history',['ht'=>$hotel,'fl'=>$flight]);
    }
}
