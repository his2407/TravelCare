@extends('master')
@section('NoiDung')

<!-- Contact Section Begin -->
    <section class="contact-section spad">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-2">

                    <ul style="margin-left: 20px;font-size: 25px;">
                      <li><a href="{{asset('ad-user')}}" style="color: black;"><u>Guest</u></a></li><p></p>
                      <li><a href="{{asset('ad-hotel')}}" style="color: black;"><u>Hotel</u></a></li><p></p>
                      <li><a href="{{asset('ad-flight')}}" style="color: black;"><u>Plane</u></a></li><p></p>
                      <li><a href="{{asset('ad-hotelorder')}}" style="color: black;"><u>Hotel Reservation</u></a></li><p></p>
                      <li><a href="{{asset('ad-flightorder')}}" style="color: black;"><u>Flight Reservation</u></a></li><p></p>
                    </ul>

                </div>
                <div class="col-lg-10"  style="border-left: 3px solid #999999;height: 100%;">

                        <div class="section-title">
                            <h2>COMPANY</h2>
                        </div>
                @if(isset($hang->MaHang))
                    <form action="{{asset('ad-submiteditcompany')}}" method="post" class="contact-form">
                        @csrf
                        <P>ID<a style="color: red;">(*)</a></P>
                                <input type="text" name="oldid" hidden="" value="{{$hang->MaHang}}"><p></p>
                                <input type="text" name="id" value="{{$hang->MaHang}}"><p></p>
                        <P>Name<a style="color: red;">(*)</a></P>
                                <input type="text" name="name" value="{{$hang->TenHang}}"><p></p>
                        <p></p><button type="submit">Save</button>
                    </form>
                @else
                    <form action="{{asset('ad-submitaddcompany')}}" method="post" class="contact-form">
                        @csrf
                        <P>ID<a style="color: red;">(*)</a></P>
                                <input type="text" name="id"><p></p>
                        <P>Name<a style="color: red;">(*)</a></P>
                                <input type="text" name="name"><p></p>
                        <p></p><button type="submit">Add</button>  
                    </form>
                @endif
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Section End -->
<style>
    td {
        border:3px solid #999999;
        border-color: orange;
        text-align: center;
        width: 100px;
    }
</style>
    
@endsection