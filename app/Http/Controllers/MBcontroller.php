<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon;
use Redirect;
use Session;

use DB;

class MBcontroller extends Controller
{
    public function flights(Request $req){
        $difind = $req->from;
        $denfind = $req->to;
        $ngayfind = $req->day;
        $hangfind = $req->company;
        if(isset($difind,$denfind,$hangfind) && $hangfind != "all"){
            $mb = DB::table('chuyenbay')
            ->join('hangmaybay', 'chuyenbay.Hang', '=', 'hangmaybay.MaHang')
            ->join(DB::raw('thanhpho as di'), 'chuyenbay.DiemDi', '=', 'di.MaTP')
            ->join(DB::raw('thanhpho as den'), 'chuyenbay.DiemDen', '=', 'den.MaTP')
            ->select('chuyenbay.*', 'hangmaybay.TenHang', DB::raw('di.TenTP as di'),DB::raw('den.TenTP as den'))
            ->where('chuyenbay.DiemDi','=',$difind)
            ->where('chuyenbay.DiemDen','=',$denfind)
            ->where('chuyenbay.Hang','=',$hangfind)
            ->simplePaginate(5);
        }elseif(isset($difind,$denfind,$hangfind) && $hangfind == "all"){
            $mb = DB::table('chuyenbay')
            ->join('hangmaybay', 'chuyenbay.Hang', '=', 'hangmaybay.MaHang')
            ->join(DB::raw('thanhpho as di'), 'chuyenbay.DiemDi', '=', 'di.MaTP')
            ->join(DB::raw('thanhpho as den'), 'chuyenbay.DiemDen', '=', 'den.MaTP')
            ->select('chuyenbay.*', 'hangmaybay.TenHang', DB::raw('di.TenTP as di'),DB::raw('den.TenTP as den'))
            ->where('chuyenbay.DiemDi','=',$difind)
            ->where('chuyenbay.DiemDen','=',$denfind)
            ->simplePaginate(5);
        }else{
            $mb = DB::table('chuyenbay')
            ->join('hangmaybay', 'chuyenbay.Hang', '=', 'hangmaybay.MaHang')
            ->join(DB::raw('thanhpho as di'), 'chuyenbay.DiemDi', '=', 'di.MaTP')
            ->join(DB::raw('thanhpho as den'), 'chuyenbay.DiemDen', '=', 'den.MaTP')
            ->select('chuyenbay.*', 'hangmaybay.TenHang', DB::raw('di.TenTP as di'),DB::raw('den.TenTP as den'))
            ->simplePaginate(5);
        }

        $tp = DB::table('thanhpho')
            ->get();
        $hang = DB::table('hangmaybay')
            ->get();
            return view('flights',['thanhpho'=> $tp, 'maybay' => $mb , 'hangmb' => $hang,'difind'=>$difind,'denfind'=>$denfind,'hangfind'=>$hangfind]);
    }
    public function flightdetail($x){
        
        $mamb = $x;

        $mbdt = DB::table('chuyenbay')
            ->join('hangmaybay', 'chuyenbay.Hang', '=', 'hangmaybay.MaHang')
            ->join(DB::raw('thanhpho as di'), 'chuyenbay.DiemDi', '=', 'di.MaTP')
            ->join(DB::raw('thanhpho as den'), 'chuyenbay.DiemDen', '=', 'den.MaTP')
            ->select('chuyenbay.*', 'hangmaybay.TenHang', DB::raw('di.TenTP as di'),DB::raw('den.TenTP as den'))
            ->where('MaMB','=',$mamb)
            ->first();
        $gia = DB::table('giave')
            ->where('MaMB','=',$mamb)
            ->orderby('LoaiVe', 'asc')
            ->get();
        $ve = DB::table('loaive')
            ->orderby('MaLV', 'asc')
            ->get();

            return view('flightdetail', ['maybay' => $mbdt, 'gia' => $gia,'loaive'=> $ve]);
    }
    public function purflight($x){
        $mamb = $x;

        $mb = DB::table('chuyenbay')
            ->join('hangmaybay', 'chuyenbay.Hang', '=', 'hangmaybay.MaHang')
            ->join(DB::raw('thanhpho as di'), 'chuyenbay.DiemDi', '=', 'di.MaTP')
            ->join(DB::raw('thanhpho as den'), 'chuyenbay.DiemDen', '=', 'den.MaTP')
            ->select('chuyenbay.*', 'hangmaybay.TenHang', DB::raw('di.TenTP as di'),DB::raw('den.TenTP as den'),DB::raw('di.MaTP as madi'),DB::raw('di.MaTP as maden'))
            ->where('MaMB','=',$mamb)
            ->first();
        $ghe = DB::table('hangghe')
            ->get();
        $ve = DB::table('loaive')
            ->get();

        if(Session::has('id'))
            return view('purflight',  ['maybay' => $mb,'hangghe' => $ghe, 'loaive' => $ve]);
        else
            return Redirect::back()->with('loginerror','');   
    }
    public function submitflight(Request $req){
        $now = Carbon\Carbon::now();
        $plane = $req->plane;
        $company = $req->company;
        $from = $req->from;
        $to = $req->to;
        $ticket = $req->tickettype;
        $go = $req->daygo;
        $back = $req->dayback;
        $class = $req->ticketclass;
        $quantity = $req->ticketquantity;
        $makh = Session('id');

        $khachhang = DB::table('khachhang')
            ->where('MaKH','=',$makh)
            ->first();
        $tickettype = DB::table('loaive')
            ->where('MaLV','=',$ticket)
            ->first();
        $ticketclass = DB::table('hangghe')
            ->where('MaHG','=',$class)
            ->first();
        $price = DB::table('giave')
            ->where('MaMB','=',$plane)
            ->where('LoaiVe','=',$ticket)
            ->where('HangGhe','=',$class)
            ->first();
        $total = $price->Gia * $quantity;
        $pay = $req->payment;

        //*CHECK TICKET*//
        if($ticket == "1")
            $db = "hidden=''";
        else
            $db = "";
        //*END CHECK TICKET*//


        if(($ticket == "1")&&($back != "")){
            return Redirect::back()->with('message', 'Day back ONLY for Round-trip Ticket !!');    
        }
        elseif((strtotime($go) == "")){
            return Redirect::back()->with('message', 'Please choose the days !!');     
        }elseif( strtotime($go) < strtotime($now) || strtotime($back) < strtotime($go) && (strtotime($back)!="")){
            return Redirect::back()->with('message', 'Date Error !! Please choose again !!');    
        }elseif($pay == ''){

            return Redirect::back()->with('message', 'Please choose payment method !!');     
        }
        else{
            return view('submitflight', ['plane'=>$plane,'company'=>$company,'from'=>$from,'to'=>$to,'type'=>$tickettype,'go'=>$go,'back'=>$back,'class'=>$ticketclass,'price'=>$price,'quantity'=>$quantity,'total'=>$total,'db' =>$db,'khachhang'=>$khachhang,'pay'=>$pay ]);
            }    
    }
    public function dealflight(Request $req){

        $mamb = $req->code;
        $from = DB::table('thanhpho')
                ->where('TenTP','=',$req->from)
                ->first();
        $to = DB::table('thanhpho')
                ->where('TenTP','=',$req->to)
                ->first();
        $type = $req->codetickettype;
        $class = $req->codeclass;
        $go = date("Y-m-d", strtotime($req->daygo));
        if(date("Y-m-d", strtotime($req->dayback))!="1970-01-01")
        $back = date("Y-m-d", strtotime($req->dayback));
        else
        $back = null;
        $quantity = $req->ticketquantity;
        $total = $req->total;
        $pay = $req->payment;

        $user = DB::table('hoadonbay')->insertGetId(
                [
                    'MaKH' => Session('id'),
                    'MaMB' => $mamb,
                    'DiemDi' => $from->MaTP,
                    'DiemDen' => $to->MaTP,
                    'LoaiVe' => $type,
                    'HangGhe' => $class,
                    'SoVe' => $quantity,
                    'NgayDi' => $go,
                    'NgayVe' => $back,
                    'TongTien' => $total,
                    'ThanhToan' => $pay,
                ]
            );

        return view('thanks');
    }
    public function deldealflight($x){
        DB::table('hoadonbay')->where('MaHD', '=', $x)->delete();
        return Redirect::back();
    }
    public function editdealflight($x){
        $mahd = $x;
        $hoadon = DB::table('hoadonbay')
            ->where('MaHD','=',$mahd)
            ->join('chuyenbay', 'chuyenbay.MaMB', '=', 'hoadonbay.MaMB')
            ->join('hangmaybay', 'chuyenbay.Hang', '=', 'hangmaybay.MaHang')
            ->join(DB::raw('thanhpho as di'), 'hoadonbay.DiemDi', '=', 'di.MaTP')
            ->join(DB::raw('thanhpho as den'), 'hoadonbay.DiemDen', '=', 'den.MaTP')
            ->select('hoadonbay.*', 'hangmaybay.TenHang', DB::raw('di.TenTP as di'),DB::raw('den.TenTP as den'))
            ->first();
        $ghe = DB::table('hangghe')
            ->get();
        $ve = DB::table('loaive')
            ->get();
        return view('editdealflight',['ghe'=>$ghe,'hd'=>$hoadon,'ve'=>$ve]);
    }
    public function submiteditdealflight(Request $req){
        $now = Carbon\Carbon::now();
        $mahd = $req->mahd;
        $ticket = $req->tickettype;
        $go = date("Y-m-d", strtotime($req->daygo));
        if(date("Y-m-d", strtotime($req->dayback))!="1970-01-01")
        $back = date("Y-m-d", strtotime($req->dayback));
        else
        $back = null;
        $class = $req->ticketclass;
        $quantity = $req->ticketquantity;
        $pay = $req->payment;

        $price = DB::table('giave')
            ->where('MaMB','=',$req->plane)
            ->where('LoaiVe','=',$ticket)
            ->where('HangGhe','=',$class)
            ->first();
        $total = $price->Gia * $quantity;

        if(($ticket == "1")&&($back != "")){
            return Redirect::back()->with('message', 'Day back ONLY for Round-trip Ticket !!');    
        }
        elseif((strtotime($go) == "") || (($ticket == "2")&&($back == ""))){
            return Redirect::back()->with('message', 'Please choose the days !!');     
        }elseif( strtotime($go) < strtotime($now) || strtotime($back) < strtotime($go) && (strtotime($back)!="")){
            return Redirect::back()->with('message', 'Date Error !! Please choose again !!');    
        }elseif($pay == ''){

            return Redirect::back()->with('message', 'Please choose payment method !!');     
        }
        else{
            $edit = DB::table('hoadonbay')
              ->where('MaHD','=', $mahd)
              ->update([
                    'LoaiVe' => $ticket,
                    'NgayDi' => $go,
                    'NgayVe' => $back,
                    'HangGhe' => $class,
                    'SoVe' => $quantity,
                    'TongTien' => $total,
                    'ThanhToan' =>$pay,
                ]);

            return redirect("history");
            }    
    }
}
