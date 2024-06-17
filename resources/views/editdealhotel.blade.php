@extends('master')
@section('NoiDung')

<!-- Contact Section Begin -->
    <section class="contact-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="contact-title">
                        <div class="section-title">
                            <h2>Edit your hotel reservation</h2>
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
                    <form action="{{asset('submiteditdealhotel')}}" method="post" class="contact-form">
                        @csrf
                        <div class="row">
                            
                            <div class="col-lg-12">
                                <input type="text" name="mahd" hidden="true" readonly="true" value="{{ $hd->MaHD}}">
                            	<P>Hotel</P>
                                <input type="text" name="code" hidden="true" readonly="true" value="{{ $hd->MaKS}}">
                                <input type="text" name="name" readonly="true" value="{{ $hd->TenKS}}">
                                <p>Room Type<a style="color: red;">(*)</a></p>
                                <select name="roomtype" style="width: 100%;height: 50px;">
	                                @foreach($lp as $lp)
                                    <option value="{{ $lp->MaLP}}" <?php if($hd->LoaiPhong == $lp->MaLP) echo"selected=''" ?>>{{ $lp->TenLP}}</option>
                                    @endforeach
                            	</select><br>
	                                <p>Room Quantity<a style="color: red;">(*)</a></p>
                                    <input type="text" name="oldroomquantity" hidden="true" readonly="true" value="{{ $hd->SoLuong}}">
									<input type="number" name="roomquantity" value="{{ $hd->SoLuong}}">
                            </div>
                            <div class="col-lg-6">
                                <p>From<a style="color: red;">(*)</a></p>
                                <div class="datepicker">
                                    <input type="text" name="daystart" class="datepicker-1" placeholder="dd/mm/yyyy" value="{{ date('d-m-Y', strtotime($hd->NgayNhan))}}">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <p>To<a style="color: red;">(*)</a></p>
                                <div class="datepicker">
                                    <input type="text" name="dayend" class="datepicker-2" placeholder="dd/mm/yyyy" value="{{ date('d-m-Y', strtotime($hd->NgayTra))}}">
                                </div>
                            </div>
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