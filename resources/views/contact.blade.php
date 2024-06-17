@extends('master')
@section('NoiDung')

<!-- Contact Section Begin -->
    <section class="contact-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="contact-title">
                        <div class="section-title">
                            <span>a memorable holliday</span>
                            <h2>Located in the center of <br />Da Nang</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8">
                    <form action="#" class="contact-form">
                        <div class="row">
                            <div class="col-lg-6">
                                <input type="text" placeholder="Your name">
                            </div>
                            <div class="col-lg-6">
                                <input type="email" placeholder="Your email">
                            </div>
                            <div class="col-lg-12">
                                <input type="text" class="subject" placeholder="Subject">
                                <textarea placeholder="Message"></textarea>
                                <button type="submit">Send Message</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-4">
                    <div class="info-box">
                        <ul>
                            <li>123 Hoang Dieu St. <br />Da Nang, Viet Nam</li>
                            <li>(+84)123-123</li>
                            <li>travelcare@gmail.com</li>
                            <li>Everyday: 06:00 -22:00</li>
                        </ul>
                        <div class="social-links">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa fa-linkedin"></i></a>
                            <a href="#"><i class="fa fa-pinterest"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-youtube-play"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Section End -->

    <!-- Map Section Begin -->
    <div class="map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3834.053891673932!2d108.21567831522415!3d16.062692988885086!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x314219cb17105ee3%3A0x58f0b67fbbdedd1!2zMTIzIEhvw6BuZyBEaeG7h3UsIFBoxrDhu5tjIE5pbmgsIFEuIEjhuqNpIENow6J1LCDEkMOgIE7hurVuZyA1NTAwMDAsIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1602412134518!5m2!1svi!2s" width="100%" height="100%" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
    </div>
    <!-- Map Section End -->
    
@endsection