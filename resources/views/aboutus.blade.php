@extends('master')
@section('NoiDung')

<!-- About Us Section Begin -->
    <section class="about-us spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="about-left">
                        <div class="section-title">
                            <span>a memorable holliday</span>
                            <h2>A great stay in a <br />lovely hotel.</h2>
                        </div>
                        <p class="second-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida.
                            Risus commodo viverra maecenas. Donec in sodales dui, a blandit nunc. Pellentesque id eros
                            venenatis, sollicitudin neque sodales, vehicula nibh. Nam massa odio, porttitor vitae
                            efficitur non, ultricies volutpat tellus.</p>
                        <p>Dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                            dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra.</p>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="row">
                        <div class="col-lg-7 col-md-7">
                            <div class="about-img">
                                <img src="{{asset('img')}}/about/about-1.jpg" alt="">
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-5">
                            <div class="about-img second-img">
                                <img src="{{asset('img')}}/about/about-2.jpg" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-5 col-md-5">
                            <div class="about-img third-img">
                                <img src="{{asset('img')}}/about/about-3.jpg" alt="">
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-7">
                            <div class="about-img">
                                <img src="{{asset('img')}}/about/about-4.jpg" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About Us Section End -->

    <!-- Milestone Counter Section Begin -->
    <section class="milestone-counter spad set-bg" data-setbg="img/about/milestone-bg.jpg">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="mc-item">
                        <div class="mc-num">
                            <span class="counter">25</span>
                        </div>
                        <div class="mc-text">
                            <h3>Luxury Suites</h3>
                            <p>From $399</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mc-item">
                        <div class="mc-num">
                            <span class="counter">35</span>
                            <strong>K</strong>
                        </div>
                        <div class="mc-text">
                            <h3>Happy Clients</h3>
                            <p>all year long</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mc-item">
                        <div class="mc-num">
                            <span class="counter">365</span>
                        </div>
                        <div class="mc-text">
                            <h3>Days/ Year</h3>
                            <p>From $399</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Milestone Counter Section End -->

    <!-- Award Section Begin -->
    <section class="award-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Our Awards</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-sm-6">
                    <div class="award-item">
                        <img src="{{asset('img')}}/about/award-img.png" alt="">
                        <h5>2011</h5>
                        <h4>Best Website Booking Hotel</h4>
                        <span>Elite Hotel award</span>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiselit. Vivamus libero mauris, bibendum eget
                            sapien ac, ultrices rhoncus ipsum. Donec nec sapien in urna.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="award-item">
                        <img src="{{asset('img')}}/about/award-img.png" alt="">
                        <h5>2012</h5>
                        <h4>Best Services</h4>
                        <span>Elite Hotel award</span>
                        <p>Ipsum dolor sit amet, consectetur adipiselit. Vivamus libero mauris, bibendum eget sapien ac,
                            ultrices rhoncus ipsum. Donec nec sapien in urna fermentum ornare.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="award-item">
                        <img src="{{asset('img')}}/about/award-img.png" alt="">
                        <h5>2014</h5>
                        <h4>Best Website Booking Flight</h4>
                        <span>Elite Hotel award</span>
                        <p>Dolor sit amet, consectetur adipiselit. Vivamus libero mauris, bibendum eget sapien ac,
                            ultrices rhoncus ipsum. Donec nec sapien in urna fermentum ornare. </p>
                    </div>
                </div>
                
            </div>
        </div>
    </section>
    <!-- Award Section End -->
    
@endsection