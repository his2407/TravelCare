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
                    <form action="{{asset('ad-submiteditflightorder')}}" method="post" class="contact-form">
                        @csrf
                        <P>ID<a style="color: red;">(*)</a></P>
                                <input type="text" readonly="true" name="id" value="{{$hd->MaHD}}"><p></p>
                        <P>Guest<a style="color: red;">(*)</a></P>
                                <select name="guest" style="width: 100%;height: 50px;">
                                    @foreach($khachhang as $kh)
                                        <option <?php if($hd->MaKH == $kh->MaKH) echo"selected=''" ?> value="{{$kh->MaKH}}">{{$kh->TenKH}}</option>
                                    @endforeach
                                </select><br><p></p>
                        <P>Plane<a style="color: red;">(*)</a></P>
                                <select name="plane" style="width: 100%;height: 50px;">
                                    @foreach($maybay as $mb)
                                        <option <?php if($hd->MaMB == $mb->MaMB) echo"selected=''" ?> value="{{$mb->MaMB}}">{{$mb->TenHang}} - {{$mb->MaMB}} | {{$mb->di}} -> {{$mb->den}}</option>
                                    @endforeach
                                </select><br><p></p>
                        <P>Go<a style="color: red;">(*)</a></P>
                                <input type="text" name="go" class="datepicker-1" placeholder="dd/mm/yyyy" value="{{ date('d-m-Y', strtotime($hd->NgayDi)) }}">
                        <P>Back (Only for Round-trip Ticket, skip if you choose OneWay)</P>
                                <input type="text" name="back" class="datepicker-1" placeholder="dd/mm/yyyy" value="<?php if($hd->NgayVe == null) echo ''; else echo date("d-m-Y", strtotime($hd->NgayVe)) ?>">
                        <P>Ticket Type<a style="color: red;">(*)</a></P>
                                <select name="type" style="width: 100%;height: 50px;">
                                    @foreach($loaive as $lv)
                                        <option <?php if($hd->LoaiVe == $lv->MaLV) echo"selected=''" ?> value="{{$lv->MaLV}}">{{$lv->TenLV}}</option>
                                    @endforeach
                                </select><br><p></p>
                        <P>Ticket Class<a style="color: red;">(*)</a></P>
                                <select name="class" style="width: 100%;height: 50px;">
                                    @foreach($hangghe as $hg)
                                        <option <?php if($hd->HangGhe == $hg->MaHG) echo"selected=''" ?> value="{{$hg->MaHG}}">{{$hg->TenHG}}</option>
                                    @endforeach
                                </select><br><p></p>
                        <P>Quantity<a style="color: red;">(*)</a></P>
                                <input type="number" name="quantity" value="{{$hd->SoVe}}"><p></p>
                        <p>Select Payment Method<a style="color: red;">(*)</a></p>
                                <input type="radio" name="payment" <?php if($hd->ThanhToan == 'Master Card') echo"checked=''" ?> value="Master Card" style="width: 20px;height: 20px;"><img src="{{asset('img')}}/pay/master.png" style="height: 80px;width: 80px;">Master Card
                                <input type="radio" name="payment" <?php if($hd->ThanhToan == 'PayPal') echo"checked=''" ?> value="PayPal" style="width: 20px;height: 20px;margin-left: 50px;"><img src="{{asset('img')}}/pay/paypal.png" style="height: 80px;width: 80px;">PayPal
                                <input type="radio" name="payment" <?php if($hd->ThanhToan == 'Visa') echo"checked=''" ?> value="Visa" style="width: 20px;height: 20px;margin-left: 50px;"><img src="{{asset('img')}}/pay/visa.png" style="height: 80px;width: 80px;">Visa
                        <p></p><button type="submit">Save</button>
                    </form>

                    @else

                    <form action="{{asset('ad-submitaddflightorder')}}" method="post" class="contact-form">
                        @csrf
                        <P>ID<a style="color: red;">(*)</a></P>
                                <input type="text" readonly="true" name="id"><p></p>
                        <P>Guest<a style="color: red;">(*)</a></P>
                                <select name="guest" style="width: 100%;height: 50px;">
                                    @foreach($khachhang as $kh)
                                        <option value="{{$kh->MaKH}}">{{$kh->TenKH}}</option>
                                    @endforeach
                                </select><br><p></p>
                        <P>Plane<a style="color: red;">(*)</a></P>
                                <select name="plane" style="width: 100%;height: 50px;">
                                    @foreach($maybay as $mb)
                                        <option value="{{$mb->MaMB}}">{{$mb->TenHang}} - {{$mb->MaMB}} | {{$mb->di}} -> {{$mb->den}}</option>
                                    @endforeach
                                </select><br><p></p>
                        <P>Go<a style="color: red;">(*)</a></P>
                                <input type="text" name="go" class="datepicker-1" placeholder="dd/mm/yyyy">
                        <P>Back (Only for Round-trip Ticket, skip if you choose OneWay)</P>
                                <input type="text" name="back" class="datepicker-1" placeholder="dd/mm/yyyy">
                        <P>Ticket Type<a style="color: red;">(*)</a></P>
                                <select name="type" style="width: 100%;height: 50px;">
                                    @foreach($loaive as $lv)
                                        <option value="{{$lv->MaLV}}">{{$lv->TenLV}}</option>
                                    @endforeach
                                </select><br><p></p>
                        <P>Ticket Class<a style="color: red;">(*)</a></P>
                                <select name="class" style="width: 100%;height: 50px;">
                                    @foreach($hangghe as $hg)
                                        <option value="{{$hg->MaHG}}">{{$hg->TenHG}}</option>
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