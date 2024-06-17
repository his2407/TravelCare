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
                            <h2>SERVICES</h2>
                            @if(session()->has('message'))
                                <div class="alert alert-danger">
                                    {{ session()->get('message') }}
                                </div>
                            @endif
                        </div>

                        <form action="{{asset('ad-submiteditservice')}}" method="post" class="contact-form">
                            <input type="text" hidden="" name="id" value="{{$id}}">
                            @csrf
                            <P><h3>TV<a style="color: red;">(*)</a></h3></P>
                                <input type="radio" <?php if(isset($sv->TV) && $sv->TV == 1) echo"checked=''" ?>  name="tv" value="1">
                                YES
                                <input type="radio" <?php if(isset($sv->TV) && $sv->TV == 0) echo"checked=''" ?>  name="tv" value="0">
                                NO
                                <p></p>
                            <P><h3>WiFi<a style="color: red;">(*)</a></h3></P>
                                <input type="radio" <?php if(isset($sv->Wifi) && $sv->Wifi == 1) echo"checked=''" ?> name="wf" value="1">
                                YES
                                <input type="radio" <?php if(isset($sv->Wifi) && $sv->Wifi == 0) echo"checked=''" ?>  name="wf" value="0">
                                NO
                                <p></p> 
                            <P><h3>Air Conditioner<a style="color: red;">(*)</a></h3></P>
                                <input type="radio" <?php if(isset($sv->AC) && $sv->AC == 1) echo"checked=''" ?>  name="ac" value="1">
                                YES
                                <input type="radio" <?php if(isset($sv->AC) && $sv->AC == 0) echo"checked=''" ?>  name="ac" value="0">
                                NO
                                <p></p> 
                            <P><h3>Parking<a style="color: red;">(*)</a></h3></P>
                                <input type="radio" <?php if(isset($sv->Parking) && $sv->Parking == 1) echo"checked=''" ?> name="pk" value="1">
                                YES
                                <input type="radio" <?php if(isset($sv->Parking) && $sv->Parking == 0) echo"checked=''" ?>  name="pk" value="0">
                                NO
                                <p></p> 
                            <P><h3>Pool<a style="color: red;">(*)</a></h3></P>
                                <input type="radio" <?php if(isset($sv->Pool) && $sv->Pool == 1) echo"checked=''" ?>  name="po" value="1">
                                YES
                                <input type="radio" <?php if(isset($sv->Pool) && $sv->Pool == 0) echo"checked=''" ?>  name="po" value="0">
                                NO
                                <p></p> 
                            <p></p><button type="submit">Save</button>
                        </form>

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
    input[type=radio]{
        width: 30px;
        height: 30px;
    }
</style>
    
@endsection