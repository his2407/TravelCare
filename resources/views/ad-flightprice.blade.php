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
                    <form action="{{asset('ad-editflightprice')}}" method="post" class="contact-form" style="width: 100%;">
                         @csrf
                         <input type="text" name="id" hidden="" value="{{$id}}"><p></p>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="section-title">
                                        <h2>ECONOMY CLASS</h2>
                                    </div>              
                                    <P>One-way</P>
                                            <input type="number" name="eco1" value="<?php if (isset($eco1->Gia)) echo $eco1->Gia; else echo '0' ; ?>"><p></p>
                                    <P>Round-trip</P>
                                            <input type="number" name="eco2" value="<?php if (isset($eco2->Gia)) echo $eco2->Gia; else echo '0' ; ?>"><p></p>
                                </div>
                                <div class="col-lg-6" style="border-left: 3px solid #999999;height: 100%;">
                                    <div class="section-title">
                                        <h2>BUSSINESS CLASS</h2>
                                    </div>              
                                    <P>One-way</P>
                                            <input type="number" name="bus1" value="<?php if (isset($bus1->Gia)) echo $bus1->Gia; else echo '0' ; ?>"><p></p>
                                    <P>Round-trip</P>
                                            <input type="number" name="bus2" value="<?php if (isset($bus2->Gia)) echo $bus2->Gia; else echo '0' ; ?>"><p></p>
                                </div>
                            </div>
                        </div>


                        <p></p><button type="submit">Save</button> 
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Section End -->
    
@endsection