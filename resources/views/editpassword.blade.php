@extends('master')
@section('NoiDung')

<!-- Contact Section Begin -->
    <section class="contact-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="contact-title">
                        <div class="section-title">
                            <h2>CHANGE YOUR PASSWORD</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12" >
                    <form action="{{asset('submitchangepass')}}" method="post" class="contact-form">
                        @csrf
                            <div class="row" align="center">
                                <div class="col-lg-12">
                                    @if(session('message2'))
                                        <div class="alert alert-danger">
                                            {{ session('message2') }}
                                        </div>
                                    @endif
                                    @if(session('message'))
                                        <div class="alert alert-success">
                                            {{ session('message') }}
                                        </div>
                                    @endif
                                    <p>PASSWORD<a style="color: red;">(*)</a></p>
                                    <input type="password" name="password" style="text-align: center;">
                                </div>   
                                <div class="col-lg-12">
                                	<p>NEW PASSWORD<a style="color: red;">(*)</a></p>
                                    <input type="password" name="newpass" style="text-align: center;">
                                </div> 
                                <div class="col-lg-12">
                                    <p>RE-TYPE NEW PASSWORD<a style="color: red;">(*)</a></p>
                                    <input type="password" name="renewpass" style="text-align: center;">
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