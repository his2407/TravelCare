@extends('master')
@section('NoiDung')

<!-- Contact Section Begin -->
    <section class="contact-section spad">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-2">

                    <ul style="margin-left: 20px;font-size: 25px;">
                      <li><a href="{{asset('ad-user')}}" style="color: black;"><u>Guest</u></a></li><p></p>
                      <li><a href="{{asset('ad-hotel')}}" style="color: black;"><u>Hotel</u></a></li><p></p>
                      <li><a href="{{asset('ad-flight')}}" style="color: black;"><u>Plane</u></a></li><p></p>
                      <li><a href="{{asset('ad-hotelorder')}}" style="color: black;"><u>Hotel Reservation</u></a></li><p></p>
                      <li><a href="{{asset('ad-flightorder')}}" style="color: black;"><u>Flight Reservation</u></a></li><p></p>
                    </ul>

                </div>
                <div class="col-lg-10"  style="border-left: 3px solid #999999;height: 100%;">

                        <div class="section-title">
                            <h2>HOTEL</h2>
                            @if(session()->has('message'))
                                <div class="alert alert-danger">
                                    {{ session()->get('message') }}
                                </div>
                            @endif
                        </div>
                    @if(isset($hd->MaHD))
                    <form action="{{asset('ad-submitedithotelorder')}}" method="post" class="contact-form">
                        @csrf
                        <P>ID<a style="color: red;">(*)</a></P>
                                <input type="text" readonly="true" name="id" value="{{$hd->MaHD}}"><p></p>
                        <P>Guest<a style="color: red;">(*)</a></P>
                                <select name="guest" style="width: 100%;height: 50px;">
                                    @foreach($khachhang as $kh)
                                        <option <?php if($hd->MaKH == $kh->MaKH) echo"selected=''" ?>value="{{$kh->MaKH}}">{{$kh->TenKH}}</option>
                                    @endforeach
                                </select><br><p></p>
                        <P>Hotel<a style="color: red;">(*)</a></P>
                                <select name="hotel" style="width: 100%;height: 50px;">
                                    @foreach($khachsan as $ks)
                                        <option <?php if($hd->MaKS == $ks->MaKS) echo"selected=''" ?>value="{{$ks->MaKS}}">{{$ks->TenKS}}</option>
                                    @endforeach
                                </select><br><p></p>
                        <P>Check-In<a style="color: red;">(*)</a></P>
                                <input type="text" name="checkin" class="datepicker-1" placeholder="dd/mm/yyyy" value="{{ date('d-m-Y', strtotime($hd->NgayNhan)) }}">
                        <P>Check-Out<a style="color: red;">(*)</a></P>
                                <input type="text" name="checkout" class="datepicker-1" placeholder="dd/mm/yyyy" value="{{ date('d-m-Y', strtotime($hd->NgayTra)) }}">
                        <P>Room Type<a style="color: red;">(*)</a></P>
                                <select name="roomtype" style="width: 100%;height: 50px;">
                                    @foreach($loaiphong as $lp)
                                        <option value="{{$lp->MaLP}}">{{$lp->TenLP}}</option>
                                    @endforeach
                                </select><br><p></p>
                        <P>Quantity<a style="color: red;">(*)</a></P>
                                <input type="number" name="oldquantity" hidden="" value="{{$hd->SoLuong}}"><p></p>
                                <input type="number" name="quantity" value="{{$hd->SoLuong}}"><p></p>
                        <p>Select Payment Method<a style="color: red;">(*)</a></p>
                                <input type="radio" name="payment" <?php if($hd->ThanhToan == 'Master Card') echo"checked=''" ?> value="Master Card" style="width: 20px;height: 20px;"><img src="{{asset('img')}}/pay/master.png" style="height: 80px;width: 80px;">Master Card
                                <input type="radio" name="payment" <?php if($hd->ThanhToan == 'PayPal') echo"checked=''" ?> value="PayPal" style="width: 20px;height: 20px;margin-left: 50px;"><img src="{{asset('img')}}/pay/paypal.png" style="height: 80px;width: 80px;">PayPal
                                <input type="radio" name="payment" <?php if($hd->ThanhToan == 'Visa') echo"checked=''" ?> value="Visa" style="width: 20px;height: 20px;margin-left: 50px;"><img src="{{asset('img')}}/pay/visa.png" style="height: 80px;width: 80px;">Visa
                        <p></p><button type="submit">Save</button>
                    </form>

                    @else

                    <form action="{{asset('ad-submitaddhotelorder')}}" method="post" class="contact-form">
                        @csrf
                        <P>ID<a style="color: red;">(*)</a></P>
                                <input type="text" readonly="true" name="id"><p></p>
                        <P>Guest<a style="color: red;">(*)</a></P>
                                <select name="guest" style="width: 100%;height: 50px;">
                                    @foreach($khachhang as $kh)
                                        <option value="{{$kh->MaKH}}">{{$kh->TenKH}}</option>
                                    @endforeach
                                </select><br><p></p>
                        <P>Hotel<a style="color: red;">(*)</a></P>
                                <select name="hotel" style="width: 100%;height: 50px;">
                                    @foreach($khachsan as $ks)
                                        <option value="{{$ks->MaKS}}">{{$ks->TenKS}}</option>
                                    @endforeach
                                </select><br><p></p>
                        <P>Check-In<a style="color: red;">(*)</a></P>
                                <input type="text" name="checkin" class="datepicker-1" placeholder="dd/mm/yyyy">
                        <P>Check-Out<a style="color: red;">(*)</a></P>
                                <input type="text" name="checkout" class="datepicker-1" placeholder="dd/mm/yyyy">
                        <P>Room Type<a style="color: red;">(*)</a></P>
                                <select name="roomtype" style="width: 100%;height: 50px;">
                                    @foreach($loaiphong as $lp)
                                        <option value="{{$lp->MaLP}}">{{$lp->TenLP}}</option>
                                    @endforeach
                                </select><br><p></p>
                        <P>Quantity<a style="color: red;">(*)</a></P>
                                <input type="number" name="quantity"><p></p>
                        <p>Select Payment Method<a style="color: red;">(*)</a></p>
                                <input type="radio" name="payment" value="Master Card" style="width: 20px;height: 20px;"><img src="{{asset('img')}}/pay/master.png" style="height: 80px;width: 80px;">Master Card
                                <input type="radio" name="payment" value="PayPal" style="width: 20px;height: 20px;margin-left: 50px;"><img src="{{asset('img')}}/pay/paypal.png" style="height: 80px;width: 80px;">PayPal
                                <input type="radio" name="payment" value="Visa" style="width: 20px;height: 20px;margin-left: 50px;"><img src="{{asset('img')}}/pay/visa.png" style="height: 80px;width: 80px;">Visa
                        <p></p><button type="submit">Add</button>
                    </form>
                    @endif
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Section End -->
<style>
    td {
        border:3px solid #999999;
        border-color: orange;
        text-align: center;
        width: 100px;
    }
</style>
    
@endsection