@extends('master')
@section('NoiDung')


    <!-- Search Filter Section Begin -->

        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <form action="{{asset('hotel')}}" class="check-form"  style="padding-top: 10%;">
                        <h4>Check Availability</h4>
                        <div class="room-selector">
                            <p>City</p>
                            <select class="suit-select" name="city">
                            	<option value="all">ALL</option>
                            	@foreach($thanhpho as $tp)
                            	<option value="{{ $tp->MaTP }}" <?php if($tpfind == $tp->MaTP) echo"selected=''" ?>>{{ $tp->TenTP}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="room-selector">
                            <p>Rate</p>
                            <select class="suit-select" name="rate">
                            	<option value="all" <?php if($ratefind == "all") echo"selected=''" ?>>ALL</option>
                                <option value="1" <?php if($ratefind == "1") echo"selected=''" ?>>1 Stars</option>
                                <option value="2" <?php if($ratefind == "2") echo"selected=''" ?>>2 Stars</option>
                                <option value="3" <?php if($ratefind == "3") echo"selected=''" ?>>3 Stars</option>
                                <option value="4" <?php if($ratefind == "4") echo"selected=''" ?>>4 Stars</option>
                                <option value="5" <?php if($ratefind == "5") echo"selected=''" ?>>5 Stars</option>
                            </select>
                        </div>
                        <div class="datepicker">
                            <p>From</p>
                            <input type="text" name="from" class="datepicker-1" placeholder="mm / dd / yyyy">
                            <img src="{{asset('img')}}/calendar.png" alt="">
                        </div>
                        <div class="datepicker">
                            <p>To</p>
                            <input type="text" name="to" class="datepicker-2" placeholder="mm / dd / yyyy">
                            <img src="{{asset('img')}}/calendar.png" alt="">
                        </div>
                        <button type="submit">Find</button>
                    </form>
                </div>
            </div>
        </div>

    <!-- Search Filter Section End -->

    @foreach($khachsan as $ks)
    <!-- Room Section Begin -->
    <div class="container">
    	<p>
            <div class="row" style="height: 300px;border-bottom: 1px solid">
                <div class="col-md-5">
                    <img src="{{asset('img')}}/hotel/{{ $ks->IMG}}" style="height: 100%;width: 100%;">
                </div>
                <div class="col-md-7">

                            <a href="{{asset('hoteldetail')}}/{{ $ks->MaKS }}"><h2>{{ $ks->TenKS}}</h2></a>

                            <div class="rating" style="color: orange;">
	                           	@for($x = 0; $x < $ks->Sao; $x++)
	                            	<i class="fa fa-star"></i>
	                            @endfor
                        	</div>

                        	<p>
                        	<i class="fa fa-globe"></i><i>LOCATE: {{ $ks->TenTP}}</i>	
                        	<p>
                        	<i class="fa fa-home"></i><i>ADDRESS: {{ $ks->DiaChi }}</i>	
                        	<p>
                        	<i class="fa fa-phone"></i><i>PHONE: {{ $ks->SDT }}</i>	
                        	<p>

							<a href="{{asset('hoteldetail')}}/{{ $ks->MaKS }}" class="primary-btn" style="position: absolute; bottom: 50%;right:0;">Detail</a>

                </div>
            </div>
    	<p>
    </div>
   <!-- Room Section End -->
   @endforeach
   <div class="container-fluid" style=" height: 50px;text-align: center;">
        {!! $khachsan->links() !!}
    </div>
@endsection