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
                    <form action="{{asset('ad-editroom')}}" method="post" class="contact-form" style="width: 100%;">
                         @csrf
                         <input type="text" name="id" hidden="" value="{{$id}}"><p></p>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="section-title">
                                        <h2>SINGLE ROOM</h2>
                                    </div>              
                                    <P>Total</P>
                                            <input type="number" name="sintotal" value="<?php if (isset($sin->SoLuong)) echo $sin->SoLuong; else echo '0' ; ?>"><p></p>
                                    <P>Left</P>
                                            <input type="number" name="sinleft" value="<?php if (isset($sin->ConLai)) echo $sin->ConLai; else echo '0' ; ?>"><p></p>
                                    <P>Price</P>
                                            <input type="number" name="sinprice" value="<?php if (isset($sin->Gia)) echo $sin->Gia; else echo '0' ; ?>"><p></p>
                                </div>
                                <div class="col-lg-4" style="border-left: 3px solid #999999;height: 100%;">
                                    <div class="section-title">
                                        <h2>DOUBLE ROOM</h2>
                                    </div>              
                                    <P>Total</P>
                                            <input type="number" name="doutotal" value="<?php if (isset($dou->SoLuong)) echo $dou->SoLuong; else echo '0' ; ?>"><p></p>
                                    <P>Left</P>
                                            <input type="number" name="douleft" value="<?php if (isset($dou->ConLai)) echo $dou->ConLai; else echo '0' ; ?>"><p></p>
                                    <P>Price</P>
                                            <input type="number" name="douprice" value="<?php if (isset($dou->Gia)) echo $dou->Gia; else echo '0' ; ?>"><p></p>
                                </div>
                                <div class="col-lg-4" style="border-left: 3px solid #999999;height: 100%;">
                                    <div class="section-title">
                                        <h2>VIP ROOM</h2>
                                    </div>              
                                    <P>Total</P>
                                            <input type="number" name="viptotal" value="<?php if (isset($vip->SoLuong)) echo $vip->SoLuong; else echo '0' ; ?>"><p></p>
                                    <P>Left</P>
                                            <input type="number" name="vipleft" value="<?php if (isset($vip->ConLai)) echo $vip->ConLai; else echo '0' ; ?>"><p></p>
                                    <P>Price</P>
                                            <input type="number" name="vipprice" value="<?php if (isset($vip->Gia)) echo $vip->Gia; else echo '0' ; ?>"><p></p>
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