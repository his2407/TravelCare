@extends('master')
@section('NoiDung')

@if(session()->has('loginerror'))

        <script>alert("Please LogIn first !!");</script>

@endif
    <!-- Room Section Begin -->
    <p>
    <section class="room-section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <div class="ri-slider-item">
                        <div class="ri-sliders owl-carousel">
                            <div class="single-img set-bg" data-setbg="{{asset('img')}}/flight/{{ $maybay->IMG }}" style="border: 1px solid"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="ri-text">
                        <div class="section-title">
                            <div class="section-title">
                                <a><h2>{{ $maybay->TenHang }}</h2></a>
                            </div>

                            <i class="fa fa-plane"></i><i><b>PLANE:</b> {{ $maybay->MaMB }}</i> 
                            <br>
                            <i class="fa fa-location-arrow"></i><i><b>FROM:</b> {{ $maybay->di}}</i>
                            <br>
                            <i class="fa fa-map-marker"></i><i><b>TO:</b> {{ $maybay->den }}</i>
                            <br>
                            <table style="width: 100%;margin-top: 20px;">
                                <tr>
                                    <td><b>PRICE</b></td>
                                    @foreach($loaive as $lv)
                                    <td><b>{{ $lv->TenLV}}</b></td>
                                    @endforeach
                                </tr>
                                <tr>
                                    <td><b>ECONOMY</b></td>
                                    @foreach($gia as $giave)
                                    <?php if($giave->HangGhe == "ECO") echo "<td>".number_format($giave->Gia)."</td>" ?>
                                    @endforeach
                                </tr>
                                <tr>
                                    <td><b>BUSSINESS</b></td>
                                    @foreach($gia as $giave)
                                    <?php if($giave->HangGhe == "BUS") echo "<td>".number_format($giave->Gia)."</td>" ?>
                                    @endforeach
                                </tr>
                            </table><p></p>


                                <a href="{{asset('purflight')}}/{{ $maybay->MaMB }}" class="primary-btn" style="margin-bottom: 50px;">Make a Reservation</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Room Section End -->
<style>
    td {
        border:3px solid #999999;
        text-align: center;
        width: 100px;
    }
</style>

@endsection