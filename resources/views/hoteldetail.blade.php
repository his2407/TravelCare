@extends('master')
@section('NoiDung')

@if(session()->has('loginerror'))

        <script>alert("Please LogIn first !!");</script>

@endif
    <!-- Room Section Begin -->
    <p>
    <section class="room-section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <div class="ri-slider-item">
                        <div class="ri-sliders owl-carousel">
                            @foreach($anh as $img)
                            <div class="single-img set-bg" data-setbg="{{asset('img')}}/hotel/{{ $img->IMG}}" style="border: 1px solid"></div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="ri-text">
                        <div class="section-title">
                            <div class="section-title">
                                <a><h2>{{ $khachsan->TenKS }}</h2></a>
                            </div>
                            <div class="rating" style="color: orange;">
                                @for($x = 0; $x < $khachsan->Sao; $x++)
                                    <i class="fa fa-star"></i>
                                @endfor
                            </div>

                            <i class="fa fa-home"></i><i><b>ADDRESS:</b> {{ $khachsan->DiaChi }}></i> 
                            <br>
                            <i class="fa fa-globe"></i><i><b>LOCATE:</b> {{ $khachsan->TenTP}}</i>
                            <br>
                            <i class="fa fa-hourglass-half"></i><i><b>OPEN:</b> {{ $khachsan->MoCua }}H</i>---</i><i><b>CLOSE</b>: {{ $khachsan->DongCua }}H</i>
                            <br>
                            <i class="fa fa-sticky-note"></i><i><b>DESCRIPTION:</b> {{ $khachsan->MoTa }}</i> 
                            <br>

                            <table style="width: 100%;margin-top: 20px;">
                                <tr>
                                    <td></td>
                                    @foreach($loai as $lp)
                                    <td><b>{{ $lp->TenLP }}</b></td>
                                    @endforeach
                                </tr>
                                <tr>
                                    <td><b>TOTAL ROOM</b></td>
                                    @foreach($phong as $slphong)
                                    <td>{{ $slphong->SoLuong }}</td>
                                    @endforeach
                                </tr>
                                <tr>
                                    <td><b>ROOM LEFT</b></td>
                                    @foreach($phong as $slphong)
                                    <td>{{ $slphong->ConLai}}</td>
                                    @endforeach
                                </tr>
                                <tr>
                                    <td><b>PRICE</b></td>
                                    @foreach($phong as $slphong)
                                    <td>{{ number_format($slphong->Gia) }}</td>
                                    @endforeach
                                </tr>
                            </table><p></p>


                            <div style="position: absolute; bottom: 0;">
                                <div class="ri-features" style="margin-bottom: 0;">
                                    @if($dichvu->TV == 1)
                                    <div class="ri-info">
                                        <i class="flaticon-019-television"></i>
                                        <p>Smart TV</p>
                                    </div>
                                    @endif
                                    @if($dichvu->Wifi == 1)
                                    <div class="ri-info">
                                        <i class="flaticon-029-wifi"></i>
                                        <p>High Wi-fi</p>
                                    </div>
                                    @endif
                                    @if($dichvu->AC == 1)
                                    <div class="ri-info">
                                        <i class="flaticon-003-air-conditioner"></i>
                                        <p>AC</p>
                                    </div>
                                    @endif
                                    @if($dichvu->Parking == 1)
                                    <div class="ri-info">
                                        <i class="flaticon-036-parking"></i>
                                        <p>Parking</p>
                                    </div>
                                    @endif
                                    @if($dichvu->Pool == 1)
                                    <div class="ri-info">
                                        <i class="flaticon-007-swimming-pool"></i>
                                        <p>Pool</p>
                                    </div>
                                    @endif
                                </div>
                                <a href="{{asset('purhotel')}}/{{ $khachsan->MaKS }}" class="primary-btn" style="margin-bottom: 50px;">Make a Reservation</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container" style="margin-top: 100px;margin-bottom: 100px;">
            @if(Session::has('id'))
                <div class="row" style="border-bottom: 1px solid;margin-bottom: 20px;">
                    <h3>Write your comment here :</h3><br>
                </div>
                <div class="row" style="margin-bottom: 20px;">
                        <div class="col-lg-1">
                            @if(isset($kh->IMG) && $kh->IMG != '')
                                <img src="{{asset('img')}}/avatar-user/{{$kh->IMG}}" style="width: 70px;height: 70px; border-radius: 50%; border: 1px solid">
                            @else
                                <img src="{{asset('img')}}/avatar-user/avadefault.jpg" style="width: 70px;height: 70px; border-radius: 50%; border: 1px solid">
                            @endif
                        </div>
                        <div class="col-lg-11">
                            <form action="{{asset('postcomment')}}" method="post" style="width: 100%;" class="contact-form">
                                @csrf
                                <input type="text" name="maks" hidden="" value="{{$khachsan->MaKS}}">
                                <textarea name="cmt" style="width: 100%; height: 90px; resize: none;"></textarea>
                                <button type="submit">Comment</button>
                            </form><br>
                            @if(session('message'))
                                <div class="alert alert-danger">
                                    {{ session('message') }}
                                </div>
                            @endif
                        </div>
                       
                </div>
            @endif
            <div class="row" style="border-bottom: 1px solid;margin-bottom: 20px;">
                <h3>Comments about this hotel :</h3><br>
            </div>
            @foreach($comment as $cmt)
                <div class="row" style="border-bottom: 1px solid;margin-bottom: 20px;">
                    <div class="col-lg-1">
                            @if(isset($cmt->IMG) && $cmt->IMG != '')
                                <img src="{{asset('img')}}/avatar-user/{{$cmt->IMG}}" style="width: 70px;height: 70px; border-radius: 50%; border: 1px solid">
                            @else
                                <img src="{{asset('img')}}/avatar-user/avadefault.jpg" style="width: 70px;height: 70px; border-radius: 50%; border: 1px solid">
                            @endif
                        </div>
                    <div class="col-lg-11">
                        <h3><b>{{$cmt->TenKH}}</b></h3>
                        <u>{{date("d-m-Y", strtotime($cmt->Time))}}</u>
                        <textarea name="cmt" readonly="" style="width: 100%; height: 70px; border: 0; resize: none;">{{$cmt->BinhLuan}}</textarea>
                        @if(Session::has('id') && Session('id') == $cmt->MaKH)
                        <a href="{{asset('delcomment')}}/{{ $cmt->IDcmt }}" style="color: red;"><u>Delete</u></a>
                        @endif
                    </div>
                </div>
            @endforeach
            <div class="container-fluid" style=" height: 50px;text-align: center;">
                {!! $comment->links() !!}
            </div>
        </div>
    </section>
    <!-- Room Section End -->
<style>
    td {
        border:3px solid #999999;
        text-align: center;
        width: 100px;
    }
</style>


@endsection