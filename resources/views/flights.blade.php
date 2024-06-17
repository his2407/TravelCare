@extends('master')
@section('NoiDung')

    <!-- Search Filter Section Begin -->

        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <form action="" class="check-form" style="padding-top: 10%;">
                        <h4>Check Availability</h4>
                        <div class="room-selector">
                            <p>From</p>
                            <select class="suit-select" name="from">
                                @foreach($thanhpho as $tp)
                                <option value="{{ $tp->MaTP}}" <?php if($difind == $tp->MaTP) echo"selected=''" ?>>{{ $tp->TenTP}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="room-selector">
                            <p>To</p>
                            <select class="suit-select"  name="to">
                                @foreach($thanhpho as $tp)
                                <option value="{{ $tp->MaTP}}" <?php if($denfind == $tp->MaTP) echo"selected=''" ?>>{{ $tp->TenTP}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="datepicker">
                            <p>Departure</p>
                            <input type="text" name="day" class="datepicker-1" placeholder="mm / dd / yyyy">
                            <img src="{{asset('img')}}/calendar.png" alt="">
                        </div>
                        <div class="room-selector" style="width: 20%;">
                            <p>Company</p>
                            <select class="suit-select"  name="company">
                                <option value="all">ALL</option>
                                @foreach($hangmb as $hang)
                                <option value="{{ $hang->MaHang}}" <?php if($hangfind == $hang->MaHang) echo"selected=''" ?>>{{ $hang->TenHang}}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit">Find</button>
                    </form>
                </div>
            </div>
        </div>

    <!-- Search Filter Section End -->
    
    @foreach($maybay as $mb)
        <!-- Room Section Begin -->
        <p>
        <div class="container">
            <div class="row" style="border-bottom: 1px solid">
                <div class="col-lg-5">
                    <img src="{{asset('img')}}/flight/{{ $mb->IMG}}" style="width: 100%; height: 100%;">
                </div>
                <div class="col-lg-7">

                            <a href="{{asset('flightdetail')}}/{{ $mb->MaMB}}"><h2>{{ $mb->TenHang}}</h2></a>

                            <p><i class="fa fa-plane">&nbsp</i>PLANE:{{ "  ".$mb->MaMB}}</p>
                            <p><i class="fa fa-location-arrow">&nbsp</i>FROM:{{ "  ".$mb->di}}</p>
                            <p><i class="fa fa-map-marker">&nbsp</i>TO:{{ "  ".$mb->den}}</p>
                            <a href="{{asset('flightdetail')}}/{{ $mb->MaMB}}" class="primary-btn" style="position: absolute; bottom: 50%;right:0;">Detail</a>

                </div>
            </div>
        </div>
        <p>
    <!-- Room Section End -->
    @endforeach
    <div class="container-fluid" style=" height: 50px;text-align: center;">
        {!! $maybay->links() !!}
    </div>
@endsection