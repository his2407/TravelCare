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
                            <h2>FLIGHT RESERVATION LIST</h2>
                        </div>

                    <a href="{{asset('ad-addflightorder')}}" class="primary-btn"><b>Add new reservation</b></a><p></p>


                    <table style="width: 100%;">
                        <tr>
                            <td><b>ID</b></td>
                            <td><b>GUEST</b></td>
                            <td><b>COMPANY</b></td>
                            <td><b>PLANE</b></td>
                            <td><b>FROM</b></td>
                            <td><b>TO</b></td>
                            <td><b>TICKET TYPE</b></td>
                            <td><b>DAY GO</b></td>
                            <td><b>DAY BACk</b></td>
                            <td><b>CLASS</b></td>
                            <td><b>QUANTITY</b></td>
                            <td><b>TOTAL</b></td>
                            <td><b>PAYMENT METHOD</b></td>
                            <td><b>BOOK TIME</b></td>
                        </tr>

                        @foreach($flight as $fl)
                            <tr style="height: 50px;">
                                <td>{{$fl->MaHD}}</td>
                                <td>{{$fl->TenKH}}</td>
                                <td>{{$fl->TenHang}}</td>
                                <td>{{$fl->MaMB}}</td>
                                <td>{{$fl->di}}</td>
                                <td>{{$fl->den}}</td>
                                <td>{{$fl->TenLV}}</td>
                                <td>{{ date("d-m-Y", strtotime($fl->NgayDi)) }}</td>
                                <td><?php if($fl->NgayVe == null) echo 'X'; else echo date("d-m-Y", strtotime($fl->NgayVe)) ?></td>
                                <td>{{$fl->TenHG}}</td>
                                <td>{{$fl->SoVe}}</td>
                                <td>{{ number_format($fl->TongTien) }}</td>
                                <td>{{$fl->ThanhToan}}</td>
                                <td>{{ date("d-m-Y", strtotime($fl->BillTime)) }}</td>
                            </tr>
                            <tr style="height: 50px;">
                                <td><a href="{{asset('ad-editflightorder')}}/{{$fl->MaHD}}" class="primary-btn"><b>Edit</b></a></td>
                                <td><a href="{{asset('ad-delflightorder')}}/{{$fl->MaHD}}" class="primary-btn"><b>Delete</b></a></td>
                            </tr>
                        @endforeach

                    </table><p></p>
                    <div class="container-fluid" style=" height: 50px;text-align: center;">
                        {!! $flight->links() !!}
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