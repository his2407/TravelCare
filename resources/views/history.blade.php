@extends('master')
@section('NoiDung')

<!-- Contact Section Begin -->
    <section class="contact-section spad">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="contact-title">
                        <div class="section-title">
                            <h2>YOUR BOOKING HISTORY</h2>
                        </div>
                    </div>

                    <h2>HOTELS</h2>
                    <table style="width: 100%;">
                        <tr>
                            <td><b>ID</b></td>
                            <td><b>HOTEL</b></td>
                            <td><b>FROM</b></td>
                            <td><b>TO</b></td>
                            <td><b>ROOM TYPE</b></td>
                            <td><b>QUANTITY</b></td>
                            <td><b>TOTAL</b></td>
                            <td><b>PAYMENT METHOD</b></td>
                            <td><b>BOOK TIME</b></td>
                        </tr>
                        @foreach($ht as $hotel)
                        <tr>
                            <td>{{ $hotel->MaHD}}</td>
                            <td>{{ $hotel->TenKS}}</td>
                            <td>{{ date("d-m-Y", strtotime($hotel->NgayNhan))}}</td>
                            <td>{{ date("d-m-Y", strtotime($hotel->NgayTra))}}</td>
                            <td>{{ $hotel->TenLP}}</td>
                            <td>{{ $hotel->SoLuong }}</td>
                            <td>{{ number_format($hotel->TongTien) }}</td>
                            <td>{{ $hotel->ThanhToan}}</td>
                            <td>{{ date("d-m-Y", strtotime($hotel->BillTime))}}</td>
                            <td><a href="{{asset('editdealhotel')}}/{{ $hotel->MaHD }}" class="primary-btn"><b>Edit</b></a></td>
                            <td><a href="{{asset('deldealhotel')}}/{{ $hotel->MaHD }}" class="primary-btn"><b>Delete</b></a></td>
                        </tr>
                        @endforeach
                    </table><p></p>
                    <div class="container-fluid" style=" height: 50px;text-align: center;">
                        {!! $ht->links() !!}
                    </div>

                    <h2>FLIGHTS</h2>
                    <table style="width: 100%;">
                        <tr>
                            <td><b>ID</b></td>
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
                        @foreach($fl as $flight)
                        <tr>
                            <td>{{ $flight->MaHD }}</td>
                            <td>{{ $flight->TenHang }}</td>
                            <td>{{ $flight->MaMB }}</td>
                            <td>{{ $flight->di }}</td>
                            <td>{{ $flight->den }}</td>
                            <td>{{ $flight->TenLV }}</td>
                            <td>{{ date("d-m-Y", strtotime($flight->NgayDi)) }}</td>
                            <td><?php if($flight->NgayVe == null) echo 'X'; else echo date("d-m-Y", strtotime($flight->NgayVe)) ?></td>
                            <td>{{ $flight->TenHG }}</td>
                            <td>{{ $flight->SoVe }}</td>
                            <td>{{ number_format($flight->TongTien) }}</td>
                            <td>{{ $flight->ThanhToan}}</td>
                            <td>{{ date("d-m-Y", strtotime($flight->BillTime))}}</td>
                            <td><a href="{{asset('editdealflight')}}/{{ $flight->MaHD }}" class="primary-btn"><b>Edit</b></a></td>
                            <td><a href="{{asset('deldealflight')}}/{{ $flight->MaHD }}" class="primary-btn"><b>Delete</b></a></td>
                        </tr>
                        @endforeach
                    </table><p></p>
                    <div class="container-fluid" style=" height: 50px;text-align: center;">
                        {!! $fl->links() !!}
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