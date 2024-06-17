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
                            <h2>HOTEL RESERVATION LIST</h2>
                        </div>

                    <a href="{{asset('ad-addhotelorder')}}" class="primary-btn"><b>Add new reservation</b></a><p></p>


                    <table style="width: 100%;">
                        <tr>
                            <td><b>ID</b></td>
                            <td><b>GUEST</b></td>
                            <td><b>HOTEL</b></td>
                            <td><b>CHECK-IN</b></td>
                            <td><b>CHECK-OUT</b></td>
                            <td><b>ROOM TYPE</b></td>
                            <td><b>QUANTITY</b></td>
                            <td><b>TOTAL</b></td>
                            <td><b>PAYMENT METHOD</b></td>
                            <td><b>BILL TIME</b></td>
                        </tr>

                        @foreach($hotel as $ht)
                            <tr style="height: 50px;">
                                <td>{{$ht->MaHD}}</td>
                                <td>{{$ht->TenKH}}</td>
                                <td>{{$ht->TenKS}}</td>
                                <td>{{ date("d-m-Y", strtotime($ht->NgayNhan)) }}</td>
                                <td>{{ date("d-m-Y", strtotime($ht->NgayTra)) }}</td>
                                <td>{{$ht->TenLP}}</td>
                                <td>{{$ht->SoLuong}}</td>
                                <td>{{ number_format($ht->TongTien) }}</td>
                                <td>{{$ht->ThanhToan}}</td>
                                <td>{{ date("d-m-Y", strtotime($ht->BillTime)) }}</td>
                            </tr>
                            <tr style="height: 50px;">
                                <td><a href="{{asset('ad-edithotelorder')}}/{{$ht->MaHD}}" class="primary-btn"><b>Edit</b></a></td>
                                <td><a href="{{asset('ad-delhotelorder')}}/{{$ht->MaHD}}" class="primary-btn"><b>Delete</b></a></td>
                            </tr>
                        @endforeach

                    </table><p></p>
                    <div class="container-fluid" style=" height: 50px;text-align: center;">
                        {!! $hotel->links() !!}
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