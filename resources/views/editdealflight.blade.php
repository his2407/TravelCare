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
                    <form action="{{asset('submiteditdealflight')}}" method="post" class="contact-form">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6">
                                <input type="text" name="mahd" hidden="true" readonly="true" value="{{ $hd->MaHD }}">
                            	<p>From</p>
                                <input type="text" name="from" readonly="true" value="{{ $hd->di }}">
                            </div>
                            <div class="col-lg-6">
                            	<p>To</p>
                                <input type="text" name="to" readonly="true" value="{{ $hd->den }}">
                            </div>
                            <div class="col-lg-12">
                            	<P>Plane</P>
                                <input type="text" name="plane" readonly="true" value="{{ $hd->MaMB}}">
                                <P>Company</P>
                                <input type="text" name="company" readonly="true" value="{{ $hd->TenHang}}">
                                <p>Ticket Type<a style="color: red;">(*)</a></p>
                                <select name="tickettype" style="width: 100%;height: 50px;">
	                                @foreach($ve as $lv)
                                    <option value="{{ $lv->MaLV}}" <?php if($hd->LoaiVe == $lv->MaLV) echo"selected=''" ?>>{{ $lv->TenLV}}</option>
                                    @endforeach
                            	</select><br>
                            	<p>Go<a style="color: red;">(*)</a></p>
                                <div class="datepicker">
		                            <input type="text" name="daygo" class="datepicker-1" placeholder="dd/mm/yyyy" value="{{ date('d-m-Y', strtotime($hd->NgayDi)) }}">
		                        </div>
                                Back (Only for Round-trip Ticket, skip if you choose OneWay)
                                <div class="datepicker">
		                            <input type="text" name="dayback" class="datepicker-2" placeholder="dd/mm/yyyy" value="<?php if($hd->NgayVe == null) echo ''; else echo date("d-m-Y", strtotime($hd->NgayVe)) ?>">
		                        </div>
		                        <p>Ticket Class<a style="color: red;">(*)</a></p>
                                <select name="ticketclass" style="width: 100%; height: 50px;">
	                                @foreach($ghe as $hg)
                                    <option value="{{ $hg->MaHG}}" <?php if($hd->HangGhe == $hg->MaHG) echo"selected=''" ?>>{{ $hg->TenHG}}</option>
                                    @endforeach
                            	</select><br><p>
	                                <p>Ticket Quantity<a style="color: red;">(*)</a></p>
									<input type="number" name="ticketquantity" value="{{ $hd->SoVe}}"></div>
                                <div class="col-lg-12">
                                    <p>Select Payment Method<a style="color: red;">(*)</a></p>
                                    <input type="radio" name="payment" <?php if($hd->ThanhToan == 'Master Card') echo"checked=''" ?> value="Master Card" style="width: 20px;height: 20px;"><img src="{{asset('img')}}/pay/master.png" style="height: 80px;width: 80px;">Master Card
                                    <input type="radio" name="payment" <?php if($hd->ThanhToan == 'PayPal') echo"checked=''" ?> value="PayPal" style="width: 20px;height: 20px;margin-left: 50px;"><img src="{{asset('img')}}/pay/paypal.png" style="height: 80px;width: 80px;">PayPal
                                    <input type="radio" name="payment" <?php if($hd->ThanhToan == 'Visa') echo"checked=''" ?> value="Visa" style="width: 20px;height: 20px;margin-left: 50px;"><img src="{{asset('img')}}/pay/visa.png" style="height: 80px;width: 80px;">Visa
                                </div>
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