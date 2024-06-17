@extends('master')
@section('NoiDung')

    <!-- Hero Area Section Begin -->
    <section class="hero-area set-bg" data-setbg="img/hero-bg.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="hero-text">
                        <h1>We Care Your Journey</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Area Section End -->
    <!-- Facilities Section Begin -->
    <section class="facilities-section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <div class="facilities-item set-bg" data-setbg="img/hotel/hotel.jpg">
                        <div class="fi-title">
                            <h2>Luxury Hotel</h2>
                            <p>Best Choice</p>
                        </div>
                        <div class="fi-features">
                            <div class="fi-info">
                                <i class="flaticon-019-television"></i>
                                <p>Smart TV</p>
                            </div>
                            <div class="fi-info">
                                <i class="flaticon-029-wifi"></i>
                                <p>High Wi-fii</p>
                            </div>
                            <div class="fi-info">
                                <i class="flaticon-003-air-conditioner"></i>
                                <p>AC</p>
                            </div>
                            <div class="fi-info">
                                <i class="flaticon-036-parking"></i>
                                <p>Parking</p>
                            </div>
                            <div class="fi-info">
                                <i class="flaticon-007-swimming-pool"></i>
                                <p>Pool</p>
                            </div>
                        </div>
                        <a href="hotel" class="primary-btn">Detail</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="facilities-item set-bg fi-right" data-setbg="img/flight/plane1.jpg" >
                        <div class="fi-title">
                            <h2>Safe Flights</h2>
                            <p>For all our guests</p>
                        </div>
                        <a href="flights" class="primary-btn">Detail</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Facilities Section End -->

    <!-- Testimonial Section Begin -->
    <section class="testimonial-section spad">
        <div class="container">
            <div class="row">
                <div class="section-title">
                    <h2>Guestbook</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="testimonial-item">
                        <div class="ti-time">
                            02 / 02 / 2019
                        </div>
                        <h4>We loved our stay</h4>
                        <div class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiselit. Vivamus libero mauris, bibendum eget
                            sapien ac, ultrices rhoncus ipsum. Donec nec sapien in urna fermentum ornare.</p>
                        <div class="ti-author">
                            <div class="author-pic">
                                <img src="{{asset('img')}}/avatar-user/user1.jpg" alt="">
                            </div>
                            <div class="author-text">
                                <h6>JOHN DOE <span>Madrid</span></h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="testimonial-item">
                        <div class="ti-time">
                            02 / 02 / 2019
                        </div>
                        <h4>I will come back again</h4>
                        <div class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                        <p>Ipsum dolor sit amet, consectetur adipiselit. Vivamus libero mauris, bibendum eget sapien ac,
                            ultrices rhoncus ipsum. Donec nec sapien in urna fermentum ornare.</p>
                        <div class="ti-author">
                            <div class="author-pic">
                                <img src="{{asset('img')}}/avatar-user/user2.jpg" alt="">
                            </div>
                            <div class="author-text">
                                <h6>Maria Smith <span>Madrid</span></h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Testimonial Section End -->

@endsection