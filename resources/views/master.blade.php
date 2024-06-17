<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <title>Travel Care</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat+Alternates:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/flaticon.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/jquery-ui.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/nice-select.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/magnific-popup.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/slicknav.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/style.css')}}" type="text/css">
</head>
<body>
<!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header Section Begin -->
    <header class="header-section" style="position: fixed;top:0;">
        <div class="container-fluid">
            <div class="inner-header">
                <div class="logo">
                    <a href="{{asset('index')}}"><img src="{{asset('img')}}/logo1.png" alt=""></a>
                </div>
                <div class="nav-right">

                    @if(Session::has('id'))
                    <nav class="main-menu mobile-menu">
                        <ul>
                            <li>
                                @if(isset($img) && $img != '')
                                    <img src="{{asset('img')}}/avatar-user/{{$img}}" style="height: 50px;width: 50px;border-radius: 50%;border: 1px solid">
                                @else
                                    <a class="fa fa-user-circle" style="color: white;font-size: 300%;margin-top: 10%"></a>
                                @endif
                                <ul class="drop-menu">
                                    <li><a href="{{asset('editprofile')}}">Edit Profile</a></li>
                                    <li><a href="{{asset('history')}}">History</a></li>
                                    <li><a href="{{asset('editpassword')}}">Change Password</a></li>
                                    <li><a href="{{asset('logout')}}">Log Out</a></li>
                                </ul>
                            </li>
                        </ul>
                    </nav>

                    @else

                        <a href="{{asset('login')}}" class="primary-btn">Login</a>

                    @endif

                </div>
                <nav class="main-menu mobile-menu">
                    <ul>
                        <li><a href="{{asset('index')}}">Home</a></li>                       
                        <li><a href="{{asset('hotel')}}">Hotels</a></li>
                        <li><a href="{{asset('flights')}}">Flights</a></li>
                        <li><a href="{{asset('contact')}}">Contact</a></li>
                        <li><a href="{{asset('aboutus')}}">About</a></li>
                        @if(Session::has('ad'))
                            <li><a href="{{asset('admin')}}">Admin</a></li>
                        @endif
                    </ul>
                </nav>
                <div id="mobile-menu-wrap"></div>
            </div>
        </div>
    </header>
    <!-- Header End -->



   


@yield('NoiDung')





<!-- Footer Section Begin -->
    <footer class="footer-section" style="bottom: 0;">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="footer-item">
                        <div class="footer-logo">
                            <a href="#"><img src="{{asset('img')}}/logo1.png" alt=""></a>
                        </div>
                        <p>A More Rewarding Way To Travel.</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="footer-item">
                        <h5>Newsletter</h5>
                        <div class="newslatter-form">
                            <input type="text" placeholder="Your Email Here">
                            <button type="submit">Subscribe</button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="footer-item">
                        <h5>Contact Info</h5>
                        <ul>
                            <li><img src="{{asset('img')}}/placeholder.png" alt="">123 Hoang Dieu St.,<br />Da Nang, Viet Nam</li>
                            <li><img src="{{asset('img')}}/phone.png" alt="">(+84)123-123</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright">
            <div class="container">
               
		<div class="row">
                    <div class="col-lg-12 ">
                        <div class="small text-white text-center">
						Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved </div>
                    </div>
                </div>

            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{asset('js/jquery-ui.min.js')}}"></script>
    <script src="{{asset('js/jquery.nice-select.min.js')}}"></script>
    <script src="{{asset('js/jquery.slicknav.js')}}"></script>
    <script src="{{asset('js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('js/main.js')}}"></script>
</body>
</html>