@extends('master')
@section('NoiDung')

<!-- Contact Section Begin -->
    <section class="contact-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="contact-title">
                        <div class="section-title">
                            <h2>Edit Profile</h2>
                            @if(session()->has('message'))
                                <div class="alert alert-success"    >
                                    {{ session()->get('message') }}
                                </div>
                            @endif
                            @if(session()->has('message2'))
                                <div class="alert alert-danger">
                                    {{ session()->get('message2') }}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8">
                    <form action="{{asset('submitprofile')}}" method="post" class="contact-form" enctype="multipart/form-data">
                        @csrf
                            <div class="row">
                            
                                <div class="col-lg-12">
                                	<P>Name<a style="color: red;">(*)</a></P>
                                    <input type="text" name="id" hidden="" readonly="true" value="{{$khachhang->MaKH}}">
                                    <input type="text" name="name" value="{{$khachhang->TenKH}}">
                                    <p>Date of Birth<a style="color: red;">(*)</a></p>
                                    <div class="datepicker">
                                        <input type="text" name="dateofbirth" class="datepicker-1" placeholder="dd/mm/yyyy" value="{{ $birth}}">
                                    </div>
                                    <p>Sex<a style="color: red;">(*)</a></p>
                                    <select name="sex" style="width: 100%;height: 50px;">
                                        <option <?php if($khachhang->GioiTinh == "Male") echo"selected=''" ?>value="Male">Male</option>
                                        <option <?php if($khachhang->GioiTinh == "Female") echo"selected=''" ?> value="Female">Female</option>
                                	</select><br>
                                    <p>Phone</p>
    								<input type="number" name="phone" value="{{ $khachhang->SDT}}">
                                    <p>Address</p>
                                    <input type="text" name="address" value="{{ $khachhang->DiaChi}}">
                                    <p>Avatar</p>
                                    @if($khachhang->IMG == '')
                                        <img src="{{asset('img')}}/avatar-user/avadefault.jpg" style="width: 300px;height: 300px;border: 1px solid">
                                        <input type="text" name="img" hidden="" value=""><p></p><br>
                                    @else
                                        <img src="{{asset('img')}}/avatar-user/{{$khachhang->IMG}}" style="width: 300px;height: 300px;border: 1px solid">
                                        <input type="text" name="img" hidden="" value="{{$khachhang->IMG}}"><p></p><br>
                                    @endif
                                    Change your avatar:
                                    <input type="file" name="upimg"><p></p>
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