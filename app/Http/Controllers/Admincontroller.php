<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use Carbon;

use Session;

use Redirect;

use DB;

class Admincontroller extends Controller
{
    public function main(){
        return view('admin');
    }
    public function account($x){
    	$tk = DB::table('users')
            ->where('MaTK','=',$x)
            ->first();
        return view('ad-account',['tk'=>$tk]);
    }
    public function editaccount(Request $req){
        $id = $req->id;
        $name = $req->username;
        $pass = $req->password;

            $edit = DB::table('users')
              ->where('MaTK','=', $id)
              ->update([
              	'username' => $name,
                'password' => bcrypt($pass),
                ]);
            return redirect("ad-user");
    }
    public function delaccount($x){
    		DB::table('users')->where('MaTK', '=', $x)->delete();
            return redirect::back();
    }
    public function user(){
    	$kh = DB::table('khachhang')
            ->simplePaginate(5);
        return view('ad-user',['khachhang'=>$kh]);
    }
    public function hotel(){
    	$ks = DB::table('khachsan')
            ->join('thanhpho', 'khachsan.ThanhPho', '=', 'thanhpho.MaTP')
            ->select('khachsan.*', 'thanhpho.TenTP')
            ->simplePaginate(5);
        return view('ad-hotel',['khachsan'=>$ks]);
    }
    public function addhotel(){
    	$tp = DB::table('thanhpho')
            ->get();
        return view('ad-edithotel',['thanhpho'=>$tp]);
    }
    public function submitaddhotel(Request $req){
    	$ks = DB::table('khachsan')
            ->where('MaKS','=',$req->id)
            ->first();

    	if(isset($ks->MaKS)){
            return Redirect::back()->with('message', 'This hotel ID has already exist !!');   
        }
        else{
	    	if ($req->hasFile('upimg')) {
			        $image = $req->file('upimg');
			        $imgname = $image->getClientOriginalName();
			        $destinationPath = public_path('/img/hotel');
			        $image->move($destinationPath, $imgname);
			    }
			    else
			    	$imgname = '';

	    	$edit = DB::table('khachsan')
	              ->insert([
	              	'MaKS' => $req->id,
	                'TenKS' => $req->name,
	                'DiaChi' => $req->address,
	                'ThanhPho' => $req->city,
	                'SDT' => $req->phone,
	                'MoCua' => $req->open,
	                'DongCua' => $req->close,
	                'Sao' => $req->star,
	                'MoTa' => $req->decription,
	                'IMG' => $imgname,
	                ]);
	        return redirect("ad-hotel");
        }

    }
    public function edithotel($x){
    	$ks = DB::table('khachsan')
            ->where('MaKS','=', $x)
            ->first();
        $tp = DB::table('thanhpho')
            ->get();
        return view('ad-edithotel',['ks'=>$ks,'thanhpho'=>$tp]);
    }
    public function submitedithotel(Request $req){
    	$ks = DB::table('khachsan')
            ->where('MaKS','=',$req->id)
            ->first();

    	if(isset($ks->MaKS) && $ks->MaKS != $req->oldid){
            return Redirect::back()->with('message', 'This hotel ID has already exist !!');   
        }
        else{

    		if ($req->hasFile('upimg')) {
			        $image = $req->file('upimg');
			        $imgname = $image->getClientOriginalName();
			        $destinationPath = public_path('/img/hotel');
			        $image->move($destinationPath, $imgname);
			    }
			    else
			    	$imgname = $req->img;

    	
            $edit = DB::table('khachsan')
              ->where('MaKS','=', $req->oldid)
              ->update([
              	'MaKS' => $req->id,
                'TenKS' => $req->name,
                'DiaChi' => $req->address,
                'ThanhPho' => $req->city,
                'SDT' => $req->phone,
                'MoCua' => $req->open,
                'DongCua' => $req->close,
                'Sao' => $req->star,
                'MoTa' => $req->decription,
                'IMG' => $imgname,
                ]);
        	return redirect("ad-hotel");
        }
    }
    public function delhotel($x){
    		DB::table('khachsan')->where('MaKS', '=', $x)->delete();
            return Redirect::back();
    }
    public function hotelphotos($x){
    	$pt = DB::table('anhkhachsan')
            ->where('MaKS','=', $x)
            ->simplePaginate(10);
            return view("ad-hotelphotos",['hinhanh'=>$pt,'id'=>$x]);
    }
    public function hotelupphoto(Request $req){
    	if ($req->hasFile('upimg')) {
		        $image = $req->file('upimg');
		        $imgname = $image->getClientOriginalName();
		        $destinationPath = public_path('/img/hotel');
		        $image->move($destinationPath, $imgname);
		    }
		    else
		    	$imgname = '';

    	$edit = DB::table('anhkhachsan')
              ->insertGetId([
              	'MaKS' => $req->id,
                'IMG' => $imgname,
                ]);
            return Redirect::back();
    }
    public function delphoto($x){
    		DB::table('anhkhachsan')->where('ID', '=', $x)->delete();
            return Redirect::back();
    }
    public function hotelrooms($x){
    	$check = DB::table('thongtinphong')
            ->where('MaKS','=', $x)
            ->first();
		if (isset($check->MaKS)) {
			$sin = DB::table('thongtinphong')
	            ->where('MaKS','=', $x)
	            ->where('LoaiPhong','=', 'SIN')
	            ->first();
	        $dou = DB::table('thongtinphong')
	            ->where('MaKS','=', $x)
	            ->where('LoaiPhong','=', 'DOU')
	            ->first();
	        $vip = DB::table('thongtinphong')
	            ->where('MaKS','=', $x)
	            ->where('LoaiPhong','=', 'VIP')
	            ->first();
	            return view("ad-hotelrooms",['sin'=>$sin,'dou'=>$dou,'vip'=>$vip,'id'=>$x]);
			
		}
		else{
	    	return view("ad-hotelrooms",['id'=>$x]);
	        }
    }
    public function editroom(Request $req){
    	$check = DB::table('thongtinphong')
            ->where('MaKS','=', $req->id)
            ->first();
		if (isset($check->MaKS)) {
			$edit = DB::table('thongtinphong')
              ->where('MaKS','=', $req->id)
              ->where('LoaiPhong','=', 'SIN')
              ->update([
              	'SoLuong' => $req->sintotal,
                'ConLai' => $req->sinleft,
                'Gia' => $req->sinprice,
                ]);
            $edit2 = DB::table('thongtinphong')
              ->where('MaKS','=', $req->id)
              ->where('LoaiPhong','=', 'DOU')
              ->update([
              	'SoLuong' => $req->doutotal,
                'ConLai' => $req->douleft,
                'Gia' => $req->douprice,
                ]);
            $edit3 = DB::table('thongtinphong')
              ->where('MaKS','=', $req->id)
              ->where('LoaiPhong','=', 'VIP')
              ->update([
              	'SoLuong' => $req->viptotal,
                'ConLai' => $req->vipleft,
                'Gia' => $req->vipprice,
                ]);
		}
		else{
            $room = DB::table('thongtinphong')->insertGetId(
                [
                    'MaKS' => $req->id,
                    'LoaiPhong' => 'SIN',
                    'SoLuong' => $req->sintotal,
                    'ConLai' => $req->sinleft,
                    'Gia' => $req->sinprice,
                ]
            );
            $room2 = DB::table('thongtinphong')->insertGetId(
                [
                    'MaKS' => $req->id,
                    'LoaiPhong' => 'DOU',
                    'SoLuong' => $req->doutotal,
                    'ConLai' => $req->douleft,
                    'Gia' => $req->douprice,
                ]
            );
            $room3 = DB::table('thongtinphong')->insertGetId(
                [
                    'MaKS' => $req->id,
                    'LoaiPhong' => 'VIP',
                    'SoLuong' => $req->viptotal,
                    'ConLai' => $req->vipleft,
                    'Gia' => $req->vipprice,
                ]
            );

		}

        return redirect::back();

    }
    public function hotelservice($x){
    	$service = DB::table('dichvukhachsan')
            ->where('MaKS','=', $x)
            ->first();
        if(isset($service->MaKS))
        	return view('ad-hotelservice',['sv'=>$service,'id'=>$x]);
        else
        	return view('ad-hotelservice',['id'=>$x]);
    }
    public function submiteditservice(Request $req){
    	$service = DB::table('dichvukhachsan')
            ->where('MaKS','=', $req->id)
            ->first();
        if($req->tv == '' || $req->wf == '' || $req->ac == '' || $req->pk == '' || $req->po == '' )
        	 return Redirect::back()->with('message', 'Please choose all option !!');
        elseif(isset($service->MaKS)){
        	$edit = DB::table('dichvukhachsan')
              ->where('MaKS','=', $req->id)
              ->update([
              	'TV' => $req->tv,
                'Wifi' => $req->wf,
                'AC' => $req->ac,
                'Parking' => $req->pk,
                'Pool' => $req->po,
                ]);
            return Redirect::back();
        }
        else{
        	$add = DB::table('dichvukhachsan')
              ->insertGetId([
              	'MaKS' => $req->id,
              	'TV' => $req->tv,
                'Wifi' => $req->wf,
                'AC' => $req->ac,
                'Parking' => $req->pk,
                'Pool' => $req->po,
                ]);
            return Redirect::back();
        }
        	
    }


    public function flight(){
    	$mb = DB::table('chuyenbay')
            ->join('hangmaybay', 'chuyenbay.Hang', '=', 'hangmaybay.MaHang')
            ->join(DB::raw('thanhpho as di'), 'chuyenbay.DiemDi', '=', 'di.MaTP')
            ->join(DB::raw('thanhpho as den'), 'chuyenbay.DiemDen', '=', 'den.MaTP')
            ->select('chuyenbay.*', 'hangmaybay.TenHang', DB::raw('di.TenTP as di'),DB::raw('den.TenTP as den'))
            ->simplePaginate(5);
        $cp = DB::table('hangmaybay')
            ->simplePaginate(5);
        return view('ad-flight',['maybay'=>$mb,'hang'=>$cp]);
    }
    public function addflight(){
    	$cp = DB::table('hangmaybay')
            ->get();
        $ct = DB::table('thanhpho')
            ->get();
        return view('ad-editflight',['company'=>$cp,'city'=>$ct]);
    }
    public function submitaddflight(Request $req){
    	$mb = DB::table('chuyenbay')
            ->where('MaMB','=',$req->id)
            ->first();

    	if(isset($mb->MaMB)){
            return Redirect::back()->with('message', 'This plane ID has already exist !!');   
        }
        else{
	    	if ($req->hasFile('upimg')) {
			        $image = $req->file('upimg');
			        $imgname = $image->getClientOriginalName();
			        $destinationPath = public_path('/img/flight');
			        $image->move($destinationPath, $imgname);
			    }
			    else
			    	$imgname = '';

	    	$edit = DB::table('chuyenbay')
	              ->insert([
	              	'MaMB' => $req->id,
	                'Hang' => $req->company,
	                'DiemDi' => $req->from,
	                'DiemDen' => $req->to,
	                'NgayBay' => $req->day,
	                'TinhTrang' => $req->status,
	                'IMG' => $imgname,
	                ]);
	        return redirect("ad-flight");
	    }
    }
    public function editflight($x){
    	$mb = DB::table('chuyenbay')
            ->where('MaMB','=', $x)
            ->first();
        $cp = DB::table('hangmaybay')
            ->get();
        $ct = DB::table('thanhpho')
            ->get();
        return view('ad-editflight',['company'=>$cp,'mb'=>$mb,'city'=>$ct]);
    }
    public function submiteditflight(Request $req){
    	$mb = DB::table('chuyenbay')
            ->where('MaMB','=',$req->id)
            ->first();

    	if(isset($mb->MaMB) && $mb->MaMB != $req->oldid){
            return Redirect::back()->with('message', 'This plane ID has already exist !!');   
        }
        else{
	    	if ($req->hasFile('upimg')) {
				        $image = $req->file('upimg');
				        $imgname = $image->getClientOriginalName();
				        $destinationPath = public_path('/img/flight');
				        $image->move($destinationPath, $imgname);
				    }
				    else
				    	$imgname = $req->img;

	    	
	            $edit = DB::table('chuyenbay')
	              ->where('MaMB','=', $req->oldid)
	              ->update([
	              	'MaMB' => $req->id,
	                'Hang' => $req->company,
	                'DiemDi' => $req->from,
	                'DiemDen' => $req->to,
	                'NgayBay' => $req->day,
	                'TinhTrang' => $req->status,
	                'IMG' => $imgname,
	                ]);
	        return redirect("ad-flight");
	    }
    }
    public function delflight($x){
    	DB::table('chuyenbay')->where('MaMB', '=', $x)->delete();
            return Redirect::back();
    }    
    public function addcompany(){
        return view('ad-editcompany');
    }
    public function submitaddcompany(Request $req){
    	$add = DB::table('hangmaybay')
              ->insert([
              	'MaHang' => $req->id,
                'TenHang' => $req->name,
                ]);
    	return redirect('ad-flight');
    }
    public function editcompany($x){
    	$info = DB::table('hangmaybay')
	            ->where('MaHang','=', $x)
	            ->first();
        return view('ad-editcompany',['hang'=>$info]);
    }
    public function submiteditcompany(Request $req){
    	$edit = DB::table('hangmaybay')
	    		->where('MaHang','=', $req->oldid)
	            ->Update([
	              	'MaHang' => $req->id,
	                'TenHang' => $req->name,
	                ]);
    	return redirect('ad-flight');
    }
	public function delcompany($x){
    	DB::table('hangmaybay')->where('MaHang', '=', $x)->delete();
            return Redirect::back();
    }    
    public function flightprice($x){
    	$check = DB::table('giave')
            ->where('MaMB','=', $x)
            ->first();
		if (isset($check->MaMB)) {
			$bus1 = DB::table('giave')
	            ->where('MaMB','=', $x)
	            ->where('LoaiVe','=', '1')
	            ->where('HangGhe','=', 'BUS')
	            ->first();
	        $bus2 = DB::table('giave')
	            ->where('MaMB','=', $x)
	            ->where('LoaiVe','=', '2')
	            ->where('HangGhe','=', 'BUS')
	            ->first();
	        $eco1 = DB::table('giave')
	            ->where('MaMB','=', $x)
	            ->where('LoaiVe','=', '1')
	            ->where('HangGhe','=', 'ECO')
	            ->first();
	        $eco2 = DB::table('giave')
	            ->where('MaMB','=', $x)
	            ->where('LoaiVe','=', '2')
	            ->where('HangGhe','=', 'ECO')
	            ->first();

	            return view("ad-flightprice",['bus1'=>$bus1,'bus2'=>$bus2,'eco1'=>$eco1,'eco2'=>$eco2,'id'=>$x]);
			
		}
		else{
	    	return view("ad-flightprice",['id'=>$x]);
	        }
    }
    public function editflightprice(Request $req){
    	$check = DB::table('giave')
            ->where('MaMB','=', $req->id)
            ->first();
		if (isset($check->MaMB)) {
			$edit1 = DB::table('giave')
              ->where('MaMB','=', $req->id)
              ->where('LoaiVe','=', '1')
              ->where('HangGhe','=', 'ECO')
              ->update([
                'Gia' => $req->eco1,
                ]);
            $edit2 = DB::table('giave')
              ->where('MaMB','=', $req->id)
              ->where('LoaiVe','=', '2')
              ->where('HangGhe','=', 'ECO')
              ->update([
                'Gia' => $req->eco2,
                ]);
            $edit3 = DB::table('giave')
              ->where('MaMB','=', $req->id)
              ->where('LoaiVe','=', '1')
              ->where('HangGhe','=', 'BUS')
              ->update([
                'Gia' => $req->bus1,
                ]);
            $edit4 = DB::table('giave')
              ->where('MaMB','=', $req->id)
              ->where('LoaiVe','=', '2')
              ->where('HangGhe','=', 'BUS')
              ->update([
                'Gia' => $req->bus2,
                ]);
		}
		else{
            $add1 = DB::table('giave')->insertGetId(
                [
                    'MaMB' => $req->id,
                    'LoaiVe' => '1',
                    'HangGhe' => 'ECO',
                    'Gia' => $req->eco1,
                ]
            );
            $add2 = DB::table('giave')->insertGetId(
                [
                    'MaMB' => $req->id,
                    'LoaiVe' => '2',
                    'HangGhe' => 'ECO',
                    'Gia' => $req->eco2,
                ]
            );
            $add3 = DB::table('giave')->insertGetId(
                [
                    'MaMB' => $req->id,
                    'LoaiVe' => '1',
                    'HangGhe' => 'BUS',
                    'Gia' => $req->bus1,
                ]
            );
            $add4 = DB::table('giave')->insertGetId(
                [
                    'MaMB' => $req->id,
                    'LoaiVe' => '2',
                    'HangGhe' => 'BUS',
                    'Gia' => $req->bus2,
                ]
            );


		}

        return redirect::back();

    }

    public function hotelorder(){
    	$hotel = DB::table('hoadonphong')
            ->join('khachsan', 'khachsan.MaKS', '=', 'hoadonphong.MaKS')
            ->join('khachhang', 'khachhang.MaKH', '=', 'hoadonphong.MaKH')
            ->join('loaiphong', 'hoadonphong.LoaiPhong', '=', 'loaiphong.MaLP')
            ->orderBy('hoadonphong.MaHD','asc')
            ->simplePaginate(5);
        return view('ad-hotelorder',['hotel'=>$hotel]);
    }
    public function addhotelorder(){
    	$kh = DB::table('khachhang')
            ->get();
        $ks = DB::table('khachsan')
            ->get();
        $lp = DB::table('loaiphong')
            ->get();

        return view('ad-edithotelorder',['khachhang'=>$kh,'khachsan'=>$ks,'loaiphong'=>$lp]);
    }
    public function submitaddhotelorder(Request $req){
        $now = Carbon\Carbon::now();
        $guest = $req->guest;
        $hotel = $req->hotel;
        $start = $req->checkin;
        $end = $req->checkout;
        $from = date("Y-m-d", strtotime($start));
        $to = date("Y-m-d", strtotime($end));
        $songay = (strtotime($end) - strtotime($start))/86400;
        $room = DB::table('loaiphong')
            ->where('MaLP','=',$req->roomtype)
            ->first();
        $quantity = $req->quantity;
        $pay = $req->payment;
        
        //*CHECK ROOM*//
        $soluong = DB::table('thongtinphong')
            ->where('MaKS','=',$hotel)
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
            $add = DB::table('hoadonphong')
              ->insertGetId([
              	'MaKH' => $guest,
                'MaKS' => $hotel,
                'NgayNhan' => $from,
                'NgayTra' => $to,
                'LoaiPhong' => $req->roomtype,
                'SoLuong' => $quantity,
                'TongTien' => $total,
                'ThanhToan' => $pay,
                ]);
            $cal = DB::table('thongtinphong')
	            ->where('MaKS','=',$hotel)
	            ->where('LoaiPhong','=',$req->roomtype)
	            ->first();
        	$edit2 = DB::table('thongtinphong')
	            ->where('MaKS','=',$hotel)
	            ->where('LoaiPhong','=',$req->roomtype)
	            ->update([
                    'ConLai' => $cal->ConLai - $quantity,
                ]);

            return redirect("ad-hotelorder");
        }
    }
    public function edithotelorder($x){
    	$hd = DB::table('hoadonphong')
	            ->where('MaHD','=',$x)
	            ->first();
    	$kh = DB::table('khachhang')
            ->get();
        $ks = DB::table('khachsan')
            ->get();
        $lp = DB::table('loaiphong')
            ->get();

        return view('ad-edithotelorder',['hd'=>$hd,'khachhang'=>$kh,'khachsan'=>$ks,'loaiphong'=>$lp]);
    }
    public function submitedithotelorder(Request $req){
        $now = Carbon\Carbon::now();
        $guest = $req->guest;
        $hotel = $req->hotel;
        $start = $req->checkin;
        $end = $req->checkout;
        $from = date("Y-m-d", strtotime($start));
        $to = date("Y-m-d", strtotime($end));
        $songay = (strtotime($end) - strtotime($start))/86400;
        $room = DB::table('loaiphong')
            ->where('MaLP','=',$req->roomtype)
            ->first();
        $quantity = $req->quantity;
        $pay = $req->payment;
        
        //*CHECK ROOM*//
        $soluong = DB::table('thongtinphong')
            ->where('MaKS','=',$hotel)
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
            	->where('MaHD','=',$req->id)
              	->Update([
	              	'MaKH' => $guest,
	                'MaKS' => $hotel,
	                'NgayNhan' => $from,
	                'NgayTra' => $to,
	                'LoaiPhong' => $req->roomtype,
	                'SoLuong' => $quantity,
	                'TongTien' => $total,
	                'ThanhToan' => $pay,
                ]);
            $cal = DB::table('thongtinphong')
                ->where('MaKS','=',$hotel)
                ->where('LoaiPhong','=',$req->roomtype)
                ->first();
            $edit2 = DB::table('thongtinphong')
                ->where('MaKS','=',$hotel)
                ->where('LoaiPhong','=',$req->roomtype)
                ->update([
                    'ConLai' => $cal->ConLai - ($quantity - $req->oldquantity),
                ]);

            return redirect("ad-hotelorder");
        }
    }
    public function delhotelorder($x){
        
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
    public function flightorder(){
    	$flight = DB::table('hoadonbay')
    		->join('khachhang', 'hoadonbay.MaKH', '=', 'khachhang.MaKH')
            ->join('chuyenbay', 'hoadonbay.MaMB', '=', 'chuyenbay.MaMB')
            ->join('hangmaybay', 'chuyenbay.Hang', '=', 'hangmaybay.MaHang')
            ->join(DB::raw('thanhpho as di'), 'hoadonbay.DiemDi', '=', 'di.MaTP')
            ->join(DB::raw('thanhpho as den'), 'hoadonbay.DiemDen', '=', 'den.MaTP')
            ->join('loaive', 'hoadonbay.LoaiVe', '=', 'loaive.MaLV')
            ->join('hangghe', 'hoadonbay.HangGhe', '=', 'hangghe.MaHG')
            ->select('hoadonbay.*','khachhang.TenKH','hangmaybay.TenHang',DB::raw('di.TenTP as di'),DB::raw('den.TenTP as den'),'loaive.TenLV','hangghe.TenHG')
            ->orderBy('hoadonbay.MaHD','asc')
            ->simplePaginate(5);
        return view('ad-flightorder',['flight'=>$flight]);
    }
    public function addflightorder(){
    	$mb = DB::table('chuyenbay')
            ->join('hangmaybay', 'chuyenbay.Hang', '=', 'hangmaybay.MaHang')
            ->join(DB::raw('thanhpho as di'), 'chuyenbay.DiemDi', '=', 'di.MaTP')
            ->join(DB::raw('thanhpho as den'), 'chuyenbay.DiemDen', '=', 'den.MaTP')
            ->select('chuyenbay.*', 'hangmaybay.TenHang', DB::raw('di.TenTP as di'),DB::raw('den.TenTP as den'),DB::raw('di.MaTP as madi'),DB::raw('di.MaTP as maden'))
            ->get();
        $ghe = DB::table('hangghe')
            ->get();
        $ve = DB::table('loaive')
            ->get();
        $kh = DB::table('khachhang')
            ->get();
        return view('ad-editflightorder',['khachhang'=>$kh,'maybay'=>$mb,'hangghe'=>$ghe,'loaive'=>$ve]);
    }
    public function submitaddflightorder(Request $req){
    	$now = Carbon\Carbon::now();
    	$mb = DB::table('chuyenbay')
    		->where('MaMB','=',$req->plane)
            ->first();
        $ticket = $req->type;
        $go = date("Y-m-d", strtotime($req->go));
        if(date("Y-m-d", strtotime($req->back))!="1970-01-01")
        $back = date("Y-m-d", strtotime($req->back));
        else
        $back = null;
        $class = $req->class;
        $quantity = $req->quantity;
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
        } elseif($pay == ''){

            return Redirect::back()->with('message', 'Please choose payment method !!');     
        }
        else{
            $user = DB::table('hoadonbay')->insertGetId(
                [
                    'MaKH' => $req->guest,
                    'MaMB' => $req->plane,
                    'DiemDi' => $mb->DiemDi,
                    'DiemDen' => $mb->DiemDen,
                    'LoaiVe' => $req->type,
                    'HangGhe' => $class,
                    'SoVe' => $quantity,
                    'NgayDi' => $go,
                    'NgayVe' => $back,
                    'TongTien' => $total,
                    'ThanhToan' => $pay,
                ]
            );

            return redirect("ad-flightorder");
            }    
    }
    public function editflightorder($x){
    	$hd = DB::table('hoadonbay')
    		->where('MaHD','=',$x)
            ->first();
    	$mb = DB::table('chuyenbay')
            ->join('hangmaybay', 'chuyenbay.Hang', '=', 'hangmaybay.MaHang')
            ->join(DB::raw('thanhpho as di'), 'chuyenbay.DiemDi', '=', 'di.MaTP')
            ->join(DB::raw('thanhpho as den'), 'chuyenbay.DiemDen', '=', 'den.MaTP')
            ->select('chuyenbay.*', 'hangmaybay.TenHang', DB::raw('di.TenTP as di'),DB::raw('den.TenTP as den'),DB::raw('di.MaTP as madi'),DB::raw('di.MaTP as maden'))
            ->get();
        $ghe = DB::table('hangghe')
            ->get();
        $ve = DB::table('loaive')
            ->get();
        $kh = DB::table('khachhang')
            ->get();
        return view('ad-editflightorder',['hd'=>$hd,'khachhang'=>$kh,'maybay'=>$mb,'hangghe'=>$ghe,'loaive'=>$ve]);
    }
    public function submiteditflightorder(Request $req){
    	$now = Carbon\Carbon::now();
    	$mb = DB::table('chuyenbay')
    		->where('MaMB','=',$req->plane)
            ->first();
        $ticket = $req->type;
        $go = date("Y-m-d", strtotime($req->go));
        if(date("Y-m-d", strtotime($req->back))!="1970-01-01")
        $back = date("Y-m-d", strtotime($req->back));
        else
        $back = null;
        $class = $req->class;
        $quantity = $req->quantity;
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
        } elseif($pay == ''){

            return Redirect::back()->with('message', 'Please choose payment method !!');     
        }
        else{
            $user = DB::table('hoadonbay')
            	->where('MaHD','=', $req->id)
            	->update([
                    'MaKH' => $req->guest,
                    'MaMB' => $req->plane,
                    'DiemDi' => $mb->DiemDi,
                    'DiemDen' => $mb->DiemDen,
                    'LoaiVe' => $req->type,
                    'HangGhe' => $class,
                    'SoVe' => $quantity,
                    'NgayDi' => $go,
                    'NgayVe' => $back,
                    'TongTien' => $total,
                    'ThanhToan' => $pay,
                ]
            );

            return redirect("ad-flightorder");
            }    
    }
    public function delflightorder($x){
        DB::table('hoadonbay')->where('MaHD', '=', $x)->delete();
        return redirect("ad-flightorder");
    }

    public function admineditprofile($x){

        $makh = $x;

        $kh = DB::table('khachhang')
            ->where('MaKH','=',$makh)
            ->first();
        $birth = date("d-m-Y", strtotime($kh->NgaySinh));
        return view('editprofile',['khachhang'=>$kh,'birth'=>$birth]);
    }
}
