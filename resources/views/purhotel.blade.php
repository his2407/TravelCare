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
                            @if(session()->has('message'))
                                <div class="alert alert-danger">
                                    {{ session()->get('message') }}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8">
                    <form action="{{asset('submithotel')}}" method="post" class="contact-form">
                        @csrf
                        <div class="row">
                            
                            <div class="col-lg-12">
                            	<P>Hotel</P>
                                <input type="text" name="code" hidden="true" readonly="true" value="{{ $khachsan->MaKS}}">
                                <input type="text" name="name" readonly="true" value="{{ $khachsan->TenKS }}">
                                <p>Room Type<a style="color: red;">(*)</a></p>
                                <select name="roomtype" style="width: 100%;height: 50px;">
	                                @foreach($loaiphong as $lp)
                                    <option value="{{ $lp->MaLP }}">{{ $lp->TenLP }}</option>
                                    @endforeach
                            	</select><br>
	                                <p>Room Quantity<a style="color: red;">(*)</a></p>
									<input type="number" name="roomquantity" value="1">
                            </div>
                            <div class="col-lg-6">
                                <p>From<a style="color: red;">(*)</a></p>
                                <div class="datepicker">
                                    <input type="text" name="daystart" class="datepicker-1" placeholder="dd/mm/yyyy">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <p>To<a style="color: red;">(*)</a></p>
                                <div class="datepicker">
                                    <input type="text" name="dayend" class="datepicker-2" placeholder="dd/mm/yyyy">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <p>Select Payment Method<a style="color: red;">(*)</a></p>
                                <input type="radio" name="payment" value="Master Card" style="width: 20px;height: 20px;"><img src="{{asset('img')}}/pay/master.png" style="height: 80px;width: 80px;">Master Card
                                <input type="radio" name="payment" value="PayPal" style="width: 20px;height: 20px;margin-left: 50px;"><img src="{{asset('img')}}/pay/paypal.png" style="height: 80px;width: 80px;">PayPal
                                <input type="radio" name="payment" value="Visa" style="width: 20px;height: 20px;margin-left: 50px;"><img src="{{asset('img')}}/pay/visa.png" style="height: 80px;width: 80px;">Visa
                            </div><p></p>
                                <button type="submit" style="margin-top: 30px;">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
                
            </div>
        </div>
    </section>
    <!-- Contact Section End -->
    
@endsection