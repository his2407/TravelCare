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
                    <form action="{{asset('submitflight')}}" method="post" class="contact-form">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6">
                            	<p>From</p>
                                <input type="text" name="from" readonly="true" value="{{ $maybay->di}}">
                            </div>
                            <div class="col-lg-6">
                            	<p>To</p>
                                <input type="text" name="to" readonly="true" value="{{ $maybay->den}}">
                            </div>
                            <div class="col-lg-12">
                            	<P>Plane</P>
                                <input type="text" name="plane" readonly="true" value="{{ $maybay->MaMB}}">
                                <P>Company</P>
                                <input type="text" name="company" readonly="true" value="{{ $maybay->TenHang}}">
                                <p>Ticket Type<a style="color: red;">(*)</a></p>
                                <select name="tickettype" style="width: 100%;height: 50px;">
	                                @foreach($loaive as $lv)
                                    <option value="{{ $lv->MaLV}}">{{ $lv->TenLV}}</option>
                                    @endforeach
                            	</select><br>
                            	<p>Go<a style="color: red;">(*)</a></p>
                                <div class="datepicker">
		                            <input type="text" name="daygo" class="datepicker-1" placeholder="dd/mm/yyyy">
		                        </div>
                                Back (Only for Round-trip Ticket, skip if you choose OneWay)
                                <div class="datepicker">
		                            <input type="text" name="dayback" class="datepicker-2" placeholder="dd/mm/yyyy">
		                        </div>
		                        <p>Ticket Class<a style="color: red;">(*)</a></p>
                                <select name="ticketclass" style="width: 100%; height: 50px;">
	                                @foreach($hangghe as $ghe)
                                    <option value="{{ $ghe->MaHG}}">{{ $ghe->TenHG}}</option>
                                    @endforeach
                            	</select><br><p>
	                                <p>Ticket Quantity<a style="color: red;">(*)</a></p>
									<input type="number" name="ticketquantity" value="1"></div>
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