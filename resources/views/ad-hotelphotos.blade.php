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
                            <h2>PHOTO LIST</h2>
                        </div>
                    <form action="{{asset('ad-hotelupphoto')}}" method="post" class="contact-form" enctype="multipart/form-data">
                        @csrf
                                <input type="text" hidden="" name="id" value="{{$id}}">
                                Upload new image:
                                <input type="file" name="upimg"><p></p>
                        <p></p><button type="submit" class="primary-btn"><b>Add new photo</b></button>
                    </form><p></p>

                    <table style="width: 100%;">
                        <tr>
                            <td><b>HOTEL ID</b></td>
                            <td><b>PHOTO NAME</b></td>
                            <td><b>PHOTO</b></td>
                        </tr>

                        @foreach($hinhanh as $pt)
                            <tr style="height: 50px;">
                                <td>{{$pt->MaKS}}</td>
                                <td>{{$pt->IMG}}</td>
                                <td>
                                    <img src="{{asset('img')}}/hotel/{{$pt->IMG}}">
                                </td>
                                <td><a href="{{asset('ad-delphoto')}}/{{$pt->ID}}" class="primary-btn"><b>Delete</b></a></td>
                            </tr>
                        @endforeach

                    </table><p></p>
                    <div class="container-fluid" style=" height: 50px;text-align: center;">
                        {!! $hinhanh->links() !!}
                    </div>
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