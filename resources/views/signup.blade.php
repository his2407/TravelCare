@extends('master')
@section('NoiDung')

<!-- Contact Section Begin -->
    <section class="contact-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="contact-title">
                        <div class="section-title">
                            <h2>SIGN UP</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12" >
                    <form action="{{asset('submitsignup')}}" method="post" class="contact-form">
                        @csrf
                            <div class="row" align="center">
                                <div class="col-lg-12">
                                    @if(session('message'))
                                        <div class="alert alert-danger">
                                            {{ session('message') }}
                                        </div>
                                    @endif
                                    @if(session('message2'))
                                        <div class="alert alert-success">
                                            {{ session('message2') }}
                                        </div>
                                    @endif
                                    <p>USERNAME<a style="color: red;">(*)</a></p>
                                    <input type="text" name="username" style="text-align: center;">
                                </div>   
                                <div class="col-lg-12">
                                	<p>PASSWORD<a style="color: red;">(*)</a></p>
                                    <input type="password" name="pass" style="text-align: center;">
                                </div> 
                                <div class="col-lg-12">
                                    <p>RE-TYPE PASSWORD<a style="color: red;">(*)</a></p>
                                    <input type="password" name="repass" style="text-align: center;">
                                </div> 
                                <div class="col-lg-12">
                                    <P>Name<a style="color: red;">(*)</a></P>
                                    <input type="text" name="name">
                                    <p>Date of Birth<a style="color: red;">(*)</a></p>
                                    <div class="datepicker">
                                        <input type="text" name="dateofbirth" class="datepicker-1" placeholder="dd/mm/yyyy">
                                    </div>
                                    <p>Sex<a style="color: red;">(*)</a></p>
                                    <select name="sex" style="width: 100%;height: 50px;">
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select><br>
                                    <p>Phone</p>
                                    <input type="text" name="phone">
                                    <p>Address</p>
                                    <input type="text" name="address">
                                </div>
                                    <button type="submit">Sign Up</button>
                            </div>
                        </div>
                    </form>
                </div>
                
            </div>
        </div>
    </section>
    <!-- Contact Section End -->
    
@endsection