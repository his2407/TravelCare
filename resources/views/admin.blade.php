@extends('master')
@section('NoiDung')

<!-- Contact Section Begin -->
    <section class="contact-section spad">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-2" style="border-right: 3px solid #999999;height: 500px;">

                	<ul style="margin-left: 20px;font-size: 25px;">
					  <li><a href="{{asset('ad-user')}}" style="color: black;"><u>Guest</u></a></li><p></p>
					  <li><a href="{{asset('ad-hotel')}}" style="color: black;"><u>Hotel</u></a></li><p></p>
					  <li><a href="{{asset('ad-flight')}}" style="color: black;"><u>Plane</u></a></li><p></p>
					  <li><a href="{{asset('ad-hotelorder')}}" style="color: black;"><u>Hotel Reservation</u></a></li><p></p>
					  <li><a href="{{asset('ad-flightorder')}}" style="color: black;"><u>Flight Reservation</u></a></li><p></p>
					</ul>

                </div>
                <div class="col-lg-10" >

                 	<p style="text-align: center; font-size: 100px;">ADMIN PAGE</p>

                </div>
            </div>
        </div>
    </section>
    
@endsection