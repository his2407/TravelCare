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
                            <h2>HOTEL LIST</h2>
                        </div>

                    <a href="{{asset('ad-addhotel')}}" class="primary-btn"><b>Add new hotel</b></a><p></p>

                    <table style="width: 100%;">
                        <tr>
                            <td><b>ID</b></td>
                            <td><b>NAME</b></td>
                            <td><b>ADDRESS</b></td>
                            <td><b>CITY</b></td>
                            <td><b>PHONE</b></td>
                            <td><b>OPEN</b></td>
                            <td><b>CLOSE</b></td>
                            <td><b>STARS</b></td>
                            <td><b>DECRIPTION</b></td>
                            <td><b>IMAGE</b></td>
                        </tr>

                        @foreach($khachsan as $ks)
                            <tr style="height: 50px;">
                                <td>{{$ks->MaKS}}</td>
                                <td>{{$ks->TenKS}}</td>
                                <td>{{$ks->DiaChi}}</td>
                                <td>{{$ks->TenTP}}</td>
                                <td>{{$ks->SDT}}</td>
                                <td>{{$ks->MoCua}}</td>
                                <td>{{$ks->DongCua}}</td>
                                <td>{{$ks->Sao}}</td>
                                <td>{{$ks->MoTa}}</td>
                                <td>
                                    <img src="{{asset('img')}}/hotel/{{$ks->IMG}}" style="width: 100px;height: 100px;border: 1px solid"><br>
                                    {{$ks->IMG}}
                                </td>
                            </tr>
                            <tr style="height: 50px;">
                                <td><a href="{{asset('ad-edithotel')}}/{{$ks->MaKS}}" class="primary-btn" style="font-size: 13px;"><b>Edit</b></a></td>
                                <td><a href="{{asset('ad-hotelrooms')}}/{{$ks->MaKS}}" class="primary-btn" style="font-size: 13px;"><b>Room</b></a></td>
                                <td><a href="{{asset('ad-hotelservice')}}/{{$ks->MaKS}}" class="primary-btn" style="font-size: 13px;"><b>Service</b></a></td>
                                <td><a href="{{asset('ad-hotelphotos')}}/{{$ks->MaKS}}" class="primary-btn" style="font-size: 13px;"><b>Photos</b></a></td>
                                <td><a href="{{asset('ad-delhotel')}}/{{$ks->MaKS}}" class="primary-btn" style="font-size: 13px;"><b>Delete</b></a></td>
                            </tr>
                        @endforeach

                    </table><p></p>
                    <div class="container-fluid" style=" height: 50px;text-align: center;">
                        {!! $khachsan->links() !!}
                    </div>
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