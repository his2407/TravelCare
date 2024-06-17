@extends('master')
@section('NoiDung')

<!-- Contact Section Begin -->
    <section class="contact-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="contact-title">
                        <div class="section-title">
                            <h2>LOGIN</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12" >
                    <form action="session" method="post" class="contact-form">
                    	@csrf
                            <div class="row" align="center">
                                <div class="col-lg-12">
                                	@if(session()->has('message'))
		                                <div class="alert alert-danger">
		                                    {{ session()->get('message') }}
		                                </div>
		                            @endif
                                    <p>USERNAME<a style="color: red;">(*)</a></p>
                                    <input type="text" name="username" style="text-align: center;">
                                </div>   
                                <div class="col-lg-12">
                                	<p>PASSWORD<a style="color: red;">(*)</a></p>
                                    <input type="password" name="password" style="text-align: center;">
                                </div> 
                                    <button type="submit">Sign In</button>
                                    <a href="{{asset('signup')}}" class="primary-btn" style="background-color: gray;position: absolute; right: 0; bottom: 0;">Sign Up</a>
                            </div>
                        </div>
                    </form>


                </div>
                
            </div>
        </div>
    </section>
    <!-- Contact Section End -->
    
@endsection