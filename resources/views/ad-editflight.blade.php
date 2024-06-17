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
                            <h2>PLANE</h2>
                            @if(session()->has('message'))
                                <div class="alert alert-danger">
                                    {{ session()->get('message') }}
                                </div>
                            @endif
                        </div>
                    @if(isset($mb->MaMB))
                        <form action="{{asset('ad-submiteditflight')}}" method="post" class="contact-form" enctype="multipart/form-data">
                            @csrf
                            <P>Plane ID<a style="color: red;">(*)</a></P>
                                    <input type="text" name="oldid" hidden="" value="{{$mb->MaMB}}"><p></p>
                                    <input type="text" name="id" value="{{$mb->MaMB}}"><p></p>
                            <P>Company<a style="color: red;">(*)</a></P>
                                    <select name="company" style="width: 100%;height: 50px;">
                                        @foreach($company as $cp)
                                            <option <?php if($mb->Hang == $cp->MaHang) echo"selected=''" ?> value="{{$cp->MaHang}}">{{$cp->TenHang}}</option>
                                        @endforeach
                                    </select><br><p></p>
                            <P>From<a style="color: red;">(*)</a></P>
                                    <select name="from" style="width: 100%;height: 50px;">
                                        @foreach($city as $tp)
                                            <option <?php if($mb->DiemDi == $tp->MaTP) echo"selected=''" ?> value="{{$tp->MaTP}}">{{$tp->TenTP}}</option>
                                        @endforeach
                                    </select><br><p></p>
                            <P>To<a style="color: red;">(*)</a></P>
                                    <select name="to" style="width: 100%;height: 50px;">
                                        @foreach($city as $tp)
                                            <option <?php if($mb->DiemDen == $tp->MaTP) echo"selected=''" ?> value="{{$tp->MaTP}}">{{$tp->TenTP}}</option>
                                        @endforeach
                                    </select><br><p></p>
                            <P>Flight Day<a style="color: red;">(*)</a></P>
                                    <input type="text" name="day" value="{{$mb->NgayBay}}"><p></p>
                            <P>Status<a style="color: red;">(*)</a></P>
                                    <input type="text" name="status" value="{{$mb->TinhTrang}}"><p></p>
                            <P>Image<a style="color: red;">(*)</a></P>
                                    <img src="{{asset('img')}}/flight/{{$mb->IMG}}" style="width: 300px;height: 300px;">
                                    <input type="text" name="img" hidden="" value="{{$mb->IMG}}"><p></p><br>
                                    Upload new image:
                                    <input type="file" name="upimg"><p></p>
                            <p></p><button type="submit">Save</button>
                        </form>

                    @else

                    <form action="{{asset('ad-submitaddflight')}}" method="post" class="contact-form" enctype="multipart/form-data">
                        @csrf
                        <P>Plane ID<a style="color: red;">(*)</a></P>
                                <input type="text" name="id"><p></p>
                        <P>Company<a style="color: red;">(*)</a></P>
                                <select name="company" style="width: 100%;height: 50px;">
                                    @foreach($company as $cp)
                                        <option value="{{$cp->MaHang}}">{{$cp->TenHang}}</option>
                                    @endforeach
                                </select><br><p></p>
                        <P>From<a style="color: red;">(*)</a></P>
                                <select name="from" style="width: 100%;height: 50px;">
                                    @foreach($city as $tp)
                                        <option value="{{$tp->MaTP}}">{{$tp->TenTP}}</option>
                                    @endforeach
                                </select><br><p></p>
                        <P>To<a style="color: red;">(*)</a></P>
                                <select name="to" style="width: 100%;height: 50px;">
                                    @foreach($city as $tp)
                                        <option value="{{$tp->MaTP}}">{{$tp->TenTP}}</option>
                                    @endforeach
                                </select><br><p></p>
                        <P>Flight Day<a style="color: red;">(*)</a></P>
                                <input type="text" name="day"><p></p>
                        <P>Status<a style="color: red;">(*)</a></P>
                                <input type="text" name="status"><p></p>
                        <P>Image<a style="color: red;">(*)</a></P>
                                <input type="file" name="upimg"><p></p>
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