<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon;
use Session;

use Redirect;

use DB;

class KScontroller extends Controller
{
    public function hotel(Request $req){
        $tpfind = $req->city;
        $ratefind = $req->rate;

        if(isset($tpfind,$ratefind) && $tpfind != "all" && $ratefind != "all"){
        $ks = DB::table('khachsan')
            ->join('thanhpho', 'khachsan.ThanhPho', '=', 'thanhpho.MaTP')
            ->select('khachsan.*', 'thanhpho.TenTP')          
            ->where('khachsan.ThanhPho', '=', $tpfind )
            ->where('khachsan.Sao', '=', $ratefind )
            ->simplePaginate(5);

        }elseif(isset($tpfind,$ratefind) && $tpfind=="all" && $ratefind != "all"){
        $ks = DB::table('khachsan')
            ->join('thanhpho', 'khachsan.ThanhPho', '=', 'thanhpho.MaTP')
            ->select('khachsan.*', 'thanhpho.TenTP')          
            ->where('khachsan.Sao', '=', $ratefind )
            ->simplePaginate(5);

        }elseif(isset($tpfind,$ratefind) && $tpfind != "all" && $ratefind=="all"){
        $ks = DB::table('khachsan')
            ->join('thanhpho', 'khachsan.ThanhPho', '=', 'thanhpho.MaTP')
            ->select('khachsan.*', 'thanhpho.TenTP')          
            ->where('khachsan.ThanhPho', '=', $tpfind )
            ->simplePaginate(5);

        }
        else{
            $ks = DB::table('khachsan')
            ->join('thanhpho', 'khachsan.ThanhPho', '=', 'thanhpho.MaTP')
            ->select('khachsan.*', 'thanhpho.TenTP')
            ->simplePaginate(5);
        }    
        $tp = DB::table('thanhpho')
            ->get();
            return view('hotel', ['khachsan' => $ks,'thanhpho' => $tp,'tpfind'=>$tpfind,'ratefind'=>$ratefind]);
    }

    public function hoteldetail($x){
        
        $maks = $x;

        $ksdt = DB::table('khachsan')
            ->join('thanhpho', 'khachsan.ThanhPho', '=', 'thanhpho.MaTP')
            ->select('khachsan.*', 'thanhpho.TenTP')
            ->where('MaKS','=',$maks)
            ->first();
        $dvks = DB::table('dichvukhachsan')
            ->where('MaKS','=',$maks)
            ->first();
        $loai = DB::table('loaiphong')
            ->orderBy('MaLP','asc')
            ->get();
        $phong = DB::table('thongtinphong')
            ->where('MaKS','=',$maks)
            ->orderBy('LoaiPhong','asc')
            ->get();
        $anh = DB::table('anhkhachsan')
            ->where('MaKS','=',$maks)
            ->get();
        $cmt = DB::table('danhgia')
            ->join('khachhang', 'khachhang.MaKH', '=', 'danhgia.MaKH')
            ->select('danhgia.*','khachhang.*', DB::raw('danhgia.ID as IDcmt'))
            ->where('MaKS','=',$maks)
            ->simplePaginate(5);;
        $khachhang = DB::table('khachhang')
            ->where('MaKH','=',Session('id'))
            ->first();


            return view('hoteldetail', ['dichvu'=>$dvks,'khachsan' => $ksdt, 'phong' => $phong, 'anh' => $anh,'loai' =>$loai,'comment'=>$cmt,'kh'=>$khachhang]);
    }
    public function postcomment(Request $req){
        if($req->cmt == '')
            return Redirect::back()->with('message', 'Please write your comment !!');
        else{
            $cmt = DB::table('danhgia')->insertGetId(
                    [
                        'MaKH' => Session('id'),
                        'MaKS' => $req->maks,
                        'BinhLuan' => $req->cmt,
                    ]
                );
            return Redirect::back();
            }
    }
    public function delcomment($x){
        DB::table('danhgia')->where('ID', '=', $x)->delete();
        return Redirect::back();
    }

    public function purhotel($x){
        $maks = $x;
        $ks = DB::table('khachsan')
            ->where('MaKS','=',$maks)
            ->first();
        $loaiphong = DB::table('loaiphong')
            ->get();
        if(Session::has('id'))
            return view('purhotel' , ['khachsan'=> $ks, 'loaiphong' => $loaiphong]);
        else
            return Redirect::back()->with('loginerror','');   
    }

    public function submithotel(Request $req){
        $now = Carbon\Carbon::now();
        $code = $req->code;
        $name = $req->name;
        $start = $req->daystart;
        $end = $req->dayend;
        $songay = (strtotime($end) - strtotime($start))/86400;
        $room = DB::table('loaiphong')
            ->where('MaLP','=',$req->roomtype)
            ->first();
        $quantity = $req->roomquantity;
        $pay = $req->payment;
        
        //*CHECK ROOM*//
        $soluong = DB::table('thongtinphong')
            ->where('MaKS','=',$code)
            ->where('LoaiPhong','=',$req->roomtype)
            ->first();
        //*END CHECK ROOM*//
        
        $total = $soluong->Gia * $songay * $quantity;
        $makh = Session('id');

        $khachhang = DB::table('khachhang')
            ->where('MaKH','=',$makh)
            ->first();
        
        if($soluong->ConLai < $quantity){

            return Redirect::back()->with('message', 'Quantity Error !! '.$room->TenLP.' Room Left : '.$soluong->ConLai);   
        }elseif((strtotime($end) == "") || (strtotime($start) == "")){

            return Redirect::back()->with('message', 'Please choose the days !!');     
        }elseif((strtotime($end) <= strtotime($start)) || (strtotime($start) < strtotime($now)) || (strtotime($end) <= strtotime($now))){

            return Redirect::back()->with('message', 'Date Error !! Please choose again !!');     
        }elseif($pay == ''){

            return Redirect::back()->with('message', 'Please choose payment method !!');     
        }
        else{
            return view('submithotel',['hotelcode'=>$code,'hotelname'=>$name,'start'=>$start,'end'=>$end,'room'=>$room,'quantity'=>$quantity,'total'=>$total,'khachhang'=>$khachhang,'sl'=>$soluong,'pay'=>$pay]);
        }
    }
    public function dealhotel(Request $req){
        $maks = $req->hotelcode;
        $from = date("Y-m-d", strtotime($req->from));
        $to = date("Y-m-d", strtotime($req->to));
        $type = $req->coderoomtype;
        $quantity = $req->roomquantity;
        $total = $req->total;
        $pay = $req->payment;

        $user = DB::table('hoadonphong')->insertGetId(
                [
                    'MaKH' => Session('id'),
                    'MaKS' => $maks,
                    'NgayNhan' => $from,
                    'NgayTra' => $to,
                    'LoaiPhong' => $type,
                    'SoLuong' => $quantity,
                    'TongTien' => $total,
                    'ThanhToan' => $pay,
                ]
            );
        $cal = DB::table('thongtinphong')
            ->where('MaKS','=',$maks)
            ->where('LoaiPhong','=',$type)
            ->first();
        $edit = DB::table('thongtinphong')
              ->where('MaKS','=',$maks)
              ->where('LoaiPhong','=',$type)
              ->update([
                    'ConLai' => $cal->ConLai - $quantity,
                ]);

        return view('thanks');
    }
    public function deldealhotel($x){
        
        $hd = DB::table('hoadonphong')
            ->where('MaHD','=',$x)
            ->first();
        $cal = DB::table('thongtinphong')
            ->where('MaKS','=',$hd->MaKS)
            ->where('LoaiPhong','=',$hd->LoaiPhong)
            ->first();
        $edit = DB::table('thongtinphong')
              ->where('MaKS','=',$hd->MaKS)
              ->where('LoaiPhong','=',$hd->LoaiPhong)
              ->update([
                    'ConLai' => $cal->ConLai + $hd->SoLuong,
                ]);
        DB::table('hoadonphong')->where('MaHD', '=', $x)->delete();
        return Redirect::back();
    }
    public function editdealhotel($x){
        $mahd = $x;
        $hoadon = DB::table('hoadonphong')
            ->where('MaHD','=',$mahd)
            ->join('khachsan', 'khachsan.MaKS', '=', 'hoadonphong.MaKS')
            ->first();
        $loaiphong = DB::table('loaiphong')
            ->get();
        return view('editdealhotel',['lp'=>$loaiphong,'hd'=>$hoadon]);
    }
    public function submiteditdealhotel(Request $req){
        $now = Carbon\Carbon::now();
        $mahd = $req->mahd;
        $code = $req->code;
        $name = $req->name;
        $start = $req->daystart;
        $end = $req->dayend;
        $from = date("Y-m-d", strtotime($start));
        $to = date("Y-m-d", strtotime($end));
        $songay = (strtotime($end) - strtotime($start))/86400;
        $room = DB::table('loaiphong')
            ->where('MaLP','=',$req->roomtype)
            ->first();
        $oldquantity = $req->oldroomquantity;
        $quantity = $req->roomquantity;
        $pay = $req->payment;
        
        //*CHECK ROOM*//
        $soluong = DB::table('thongtinphong')
            ->where('MaKS','=',$code)
            ->where('LoaiPhong','=',$req->roomtype)
            ->first();
        //*END CHECK ROOM*//
        $total = $soluong->Gia * $songay * $quantity;

        if($soluong->ConLai < $quantity){

            return Redirect::back()->with('message', 'Quantity Error !! '.$room->TenLP.' Room Left : '.$soluong->ConLai);   
        }elseif((strtotime($end) == "") || (strtotime($start) == "")){

            return Redirect::back()->with('message', 'Please choose the days !!');     
        }elseif((strtotime($end) <= strtotime($start)) || (strtotime($start) < strtotime($now)) || (strtotime($end) <= strtotime($now))){

            return Redirect::back()->with('message', 'Date Error !! Please choose again !!');     
        }elseif($pay == ''){

            return Redirect::back()->with('message', 'Please choose payment method !!');     
        }
        else{
            $edit = DB::table('hoadonphong')
              ->where('MaHD','=', $mahd)
              ->update([
                    'NgayNhan' => $from,
                    'NgayTra' => $to,
                    'LoaiPhong' => $req->roomtype,
                    'SoLuong' => $quantity,
                    'TongTien' => $total,
                    'ThanhToan' => $pay,
                ]);
            $cal = DB::table('thongtinphong')
                ->where('MaKS','=',$code)
                ->where('LoaiPhong','=',$req->roomtype)
                ->first();
            $edit2 = DB::table('thongtinphong')
                ->where('MaKS','=',$code)
                ->where('LoaiPhong','=',$req->roomtype)
                ->update([
                    'ConLai' => $cal->ConLai - ($quantity - $oldquantity),
                ]);
            return redirect("history");
        }
    }
}
