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
                    @if(isset($ks->MaKS))
                    <form action="{{asset('ad-submitedithotel')}}" method="post" class="contact-form" enctype="multipart/form-data">
                        @csrf
                        <P>Hotel ID<a style="color: red;">(*)</a></P>
                                <input type="text" name="oldid" hidden="" value="{{$ks->MaKS}}"><p></p>
                                <input type="text" name="id" value="{{$ks->MaKS}}"><p></p>
                        <P>Name<a style="color: red;">(*)</a></P>
                                <input type="text" name="name" value="{{$ks->TenKS}}"><p></p>
                        <P>Address<a style="color: red;">(*)</a></P>
                                <input type="text" name="address" value="{{$ks->DiaChi}}"><p></p>
                        <P>City<a style="color: red;">(*)</a></P>
                                <select name="city" style="width: 100%;height: 50px;">
                                    @foreach($thanhpho as $tp)
                                        <option <?php if($ks->ThanhPho == $tp->MaTP) echo"selected=''" ?>value="{{$tp->MaTP}}">{{$tp->TenTP}}</option>
                                    @endforeach
                                </select><br><p></p>
                        <P>Phone<a style="color: red;">(*)</a></P>
                                <input type="number" name="phone" value="{{$ks->SDT}}"><p></p>
                        <P>Open Time<a style="color: red;">(*)</a></P>
                                <input type="number" name="open" value="{{$ks->MoCua}}"><p></p>
                        <P>Close Time<a style="color: red;">(*)</a></P>
                                <input type="number" name="close" value="{{$ks->DongCua}}"><p></p>
                        <P>Star<a style="color: red;">(*)</a></P>
                                <select name="star" style="width: 100%;height: 50px;">
                                        <option <?php if($ks->Sao == '1') echo"selected=''" ?>value="1">1</option>
                                        <option <?php if($ks->Sao == '2') echo"selected=''" ?>value="2">2</option>
                                        <option <?php if($ks->Sao == '3') echo"selected=''" ?>value="3">3</option>
                                        <option <?php if($ks->Sao == '4') echo"selected=''" ?>value="4">4</option>
                                        <option <?php if($ks->Sao == '5') echo"selected=''" ?>value="5">5</option>
                                </select><br><p></p>
                        <P>Decription</P>
                                <input type="text" name="decription" value="{{$ks->MoTa}}"><p></p>
                        <P>Image<a style="color: red;">(*)</a></P>
                                <img src="{{asset('img')}}/hotel/{{$ks->IMG}}" style="width: 300px;height: 300px;border: 1px solid">
                                <input type="text" name="img" hidden="" value="{{$ks->IMG}}"><p></p><br>
                                Upload new image:
                                <input type="file" name="upimg"><p></p>
                        <p></p><button type="submit">Save</button>
                    </form>

                    @else

                    <form action="{{asset('ad-submitaddhotel')}}" method="post" class="contact-form" enctype="multipart/form-data">
                        @csrf
                        <P>Hotel ID<a style="color: red;">(*)</a></P>
                                <input type="text" name="id"><p></p>
                        <P>Name<a style="color: red;">(*)</a></P>
                                <input type="text" name="name"><p></p>
                        <P>Address<a style="color: red;">(*)</a></P>
                                <input type="text" name="address"><p></p>
                        <P>City<a style="color: red;">(*)</a></P>
                                <select name="city" style="width: 100%;height: 50px;">
                                    @foreach($thanhpho as $tp)
                                        <option value="{{$tp->MaTP}}">{{$tp->TenTP}}</option>
                                    @endforeach
                                </select><br><p></p>
                        <P>Phone<a style="color: red;">(*)</a></P>
                                <input type="number" name="phone"><p></p>
                        <P>Open Time<a style="color: red;">(*)</a></P>
                                <input type="number" name="open"><p></p>
                        <P>Close Time<a style="color: red;">(*)</a></P>
                                <input type="number" name="close"><p></p>
                        <P>Star<a style="color: red;">(*)</a></P>
                                <select name="star" style="width: 100%;height: 50px;">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                </select><br><p></p>
                        <P>Decription</P>
                                <input type="text" name="decription"><p></p>
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