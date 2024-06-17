@extends('master')
@section('NoiDung')

<!-- Contact Section Begin -->
    <section class="contact-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="contact-title">
                        <div class="section-title">
                            <h2>Purchase your hotel reservation</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8">
                    <form action="{{asset('dealhotel')}}" method="post" class="contact-form">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12">
                                <p>Customer Name</p>
                                <input type="text" name="name" readonly="true" value="{{ $khachhang->TenKH }}">
                            </div>   
                            <div class="col-lg-12">
                                <p>Hotel</p>
                                <input type="text" name="hotelcode" hidden="" readonly="true" value="{{ $hotelcode }}">
                                <input type="text" name="hotelname" readonly="true" value="{{ $hotelname }}">
                            </div>   
                            <div class="col-lg-12">
                            	<p>From</p>
                                <input type="text" name="from" readonly="true" value="{{ $start }}">
                            </div>         
                            <div class="col-lg-12">
                                <p>To</p>
                                <input type="text" name="to" readonly="true" value="{{ $end }}">
                            </div>   
                            <div class="col-lg-12">
                                <p>Room Type</p>
                                <input type="text" hidden="" name="coderoomtype" readonly="true" value="{{ $room->MaLP }}">
                                <input type="text" name="roomtype" readonly="true" value="{{ $room->TenLP }}">
                            </div>      
                            <div class="col-lg-12">
                                <p>Unit Price</p>
                                <input type="text" name="unitprice" readonly="true" value="{{ number_format($sl->Gia) }}">
                            </div>   
                            <div class="col-lg-12">
                                <p>Room Quantity</p>
                                <input type="text" name="roomquantity" readonly="true" value="{{ $quantity }}">
                            </div>   
                            <div class="col-lg-12">
                                <p>Total Price</p>
                                <input type="text" name="total" hidden="" readonly="true" value="{{ $total }}">
                                <input type="text" name="total2" readonly="true" value="{{ number_format($total) }}">
                            </div>   
                            <div class="col-lg-12">
                                <p>Payment Method</p>
                                <input type="text" name="payment" readonly="true" value="{{ $pay }}">
                            </div>      
                                <button type="submit">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
                
            </div>
        </div>
    </section>
    <!-- Contact Section End -->
    
@endsection