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
                            <h2>PLANE LIST</h2>
                        </div>

                    <a href="{{asset('ad-addcompany')}}" class="primary-btn"><b>Add new company</b></a><p></p>

                    <table style="width: 100%;">
                        <tr>
                            <td><b>COMPANY ID</b></td>
                            <td><b>COMPANY NAME</b></td>
                        </tr>

                        @foreach($hang as $cp)
                            <tr style="height: 50px;">
                                <td>{{$cp->MaHang}}</td>
                                <td>{{$cp->TenHang}}</td>
                                <td><a href="{{asset('ad-editcompany')}}/{{$cp->MaHang}}" class="primary-btn"><b>Edit</b></a></td>
                                <td><a href="{{asset('ad-delcompany')}}/{{$cp->MaHang}}" class="primary-btn"><b>Delete</b></a></td>
                            </tr>
                        @endforeach
                    </table><p></p>
                    <div class="container-fluid" style=" height: 50px;text-align: center;">
                        {!! $hang->links() !!}
                    </div>

                    <a href="{{asset('ad-addflight')}}" class="primary-btn"><b>Add new plane</b></a><p></p>

                    <table style="width: 100%;">
                        <tr>
                            <td><b>PLANE ID</b></td>
                            <td><b>COMPANY</b></td>
                            <td><b>FROM</b></td>
                            <td><b>TO</b></td>
                            <td><b>FLIGHT DAY</b></td>
                            <td><b>STATUS</b></td>
                            <td><b>IMAGE</b></td>
                        </tr>

                        @foreach($maybay as $mb)
                            <tr style="height: 50px;">
                                <td>{{$mb->MaMB}}</td>
                                <td>{{$mb->TenHang}}</td>
                                <td>{{$mb->di}}</td>
                                <td>{{$mb->den}}</td>
                                <td>{{$mb->NgayBay}}</td>
                                <td>{{$mb->TinhTrang}}</td>
                                <td>
                                    <img src="{{asset('img')}}/flight/{{$mb->IMG}}" style="width: 100px;height: 100px;border: 1px solid"><br>
                                    {{$mb->IMG}}
                                </td>
                            </tr>
                            <tr style="height: 50px;">
                                <td><a href="{{asset('ad-flightprice')}}/{{$mb->MaMB}}" class="primary-btn"><b>Price</b></a></td>
                                <td><a href="{{asset('ad-editflight')}}/{{$mb->MaMB}}" class="primary-btn"><b>Edit</b></a></td>
                                <td><a href="{{asset('ad-delflight')}}/{{$mb->MaMB}}" class="primary-btn"><b>Delete</b></a></td>
                            </tr>
                        @endforeach

                    </table><p></p>
                    <div class="container-fluid" style=" height: 50px;text-align: center;">
                        {!! $maybay->links() !!}
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