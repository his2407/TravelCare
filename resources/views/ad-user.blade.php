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
                            <h2>GUEST LIST</h2>
                        </div>

                    <table style="width: 100%;">
                        <tr>
                            <td><b>ID</b></td>
                            <td><b>AVATAR</b></td>
                            <td><b>NAME</b></td>
                            <td><b>DATE OF BIRTH</b></td>
                            <td><b>SEX</b></td>
                            <td><b>PHONE</b></td>
                            <td><b>ADDRESS</b></td>
                        </tr>

                        @foreach($khachhang as $kh)
                            <tr style="height: 50px;">
                                <td>{{$kh->MaKH}}</td>
                                <td>
                                    @if($kh->IMG == '')
                                        <img src="{{asset('img')}}/avatar-user/avadefault.jpg" style="width: 100px;height: 100px;border: 1px solid">
                                    @else
                                        <img src="{{asset('img')}}/avatar-user/{{$kh->IMG}}" style="width: 100px;height: 100px;border: 1px solid"><br>
                                    @endif
                                </td>
                                <td>{{$kh->TenKH}}</td>
                                <td>{{ date("d-m-Y", strtotime($kh->NgaySinh)) }}</td>
                                <td>{{$kh->GioiTinh}}</td>
                                <td>{{$kh->SDT}}</td>
                                <td>{{$kh->DiaChi}}</td>
                                <td><a href="{{asset('ad-editprofile')}}/{{$kh->MaKH }}" class="primary-btn"><b>Edit</b></a></td>
                                <td><a href="{{asset('ad-account')}}/{{$kh->MaKH}}" class="primary-btn"><b>Account</b></a></td>
                            </tr>
                        @endforeach

                    </table><p></p>
                    <div class="container-fluid" style=" height: 50px;text-align: center;">
                        {!! $khachhang->links() !!}
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