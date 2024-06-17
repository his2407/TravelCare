@extends('master')
@section('NoiDung')

<!-- Contact Section Begin -->
    <section class="contact-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="contact-title">
                        <div class="section-title">
                            <h2>Purchase your flight reservation</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8">
                    <form action="{{asset('dealflight')}}" method="post" class="contact-form">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12">
                                <p>Customer Name</p>
                                <input type="text" name="name" readonly="true" value="{{ $khachhang->TenKH }}">
                            </div>   
                            <div class="col-lg-12">
                                <p>Plane</p>
                                <input type="text" name="code" readonly="true" value="{{ $plane }}">
                            </div> 
                            <div class="col-lg-12">
                                <p>Company</p>
                                <input type="text" name="company" readonly="true" value="{{ $company }}">
                            </div>  
                            <div class="col-lg-12">
                            	<p>From</p>
                                <input type="text" name="from" readonly="true" value="{{ $from }}">
                            </div>         
                            <div class="col-lg-12">
                                <p>To</p>
                                <input type="text" name="to" readonly="true" value="{{ $to }}">
                            </div>   
                            <div class="col-lg-12">
                                <p>Ticket Type</p>
                                <input type="text" hidden="" name="codetickettype" readonly="true" value="{{ $type->MaLV }}">
                                <input type="text" name="tickettype" readonly="true" value="{{ $type->TenLV }}">
                            </div>   
                            <div class="col-lg-12">
                                <p>Go</p>
                                <input type="text" name="daygo" readonly="true" value="{{ $go }}">
                            </div>  
                            <div class="col-lg-12" {{ $db}}>
                                <p>Back</p>
                                <input type="text" name="dayback" readonly="true" value="{{ $back }}">
                            </div>
                            <div class="col-lg-12">
                                <p>Ticket Class</p>
                                <input type="text" hidden="" name="codeclass" readonly="true" value="{{ $class->MaHG }}">
                                <input type="text" name="class" readonly="true" value="{{ $class->TenHG }}">
                            </div>   
                            <div class="col-lg-12">
                                <p>Unit Price</p>
                                <input type="text" name="unitprice" readonly="true" value="{{ number_format($price->Gia) }}">
                            </div>   
                            <div class="col-lg-12">
                                <p>Ticket Quantity</p>
                                <input type="text" name="ticketquantity" readonly="true" value="{{ $quantity }}">
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