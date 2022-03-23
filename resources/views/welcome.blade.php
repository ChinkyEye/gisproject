<!doctype html>
<html>
<head>
    <title>DDDS</title>
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="codetomake.com">
    <link type="text/css" rel="stylesheet" href="{{asset('frontend/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/font-awesome-4.7.0/css/font-awesome.min.css')}}">
</head>
<body>
    <header class="header">
        <div class="top">

            <div class="social">
                <a href="#"><i class="fa fa-facebook-square fa-2x" aria-hidden="true"></i></a>
                <a href="#"><i class="fa fa-twitter-square fa-2x" aria-hidden="true"></i></a>
                <a href="#"><i class="fa fa-pinterest-square fa-2x" aria-hidden="true"></i></a>
                <a href="#"><i class="fa fa-google-plus-square fa-2x" aria-hidden="true"></i></a>
                <a href="#"><i class="fa fa-linkedin-square fa-2x" aria-hidden="true"></i></a>
            </div>

            <div class="search">
                <form method="post">
                    <input type="text" name="keyword" placeholder="Search...">
                    <input type="submit" value="search">
                </form>
            </div>

        </div>
        <div class="head">
            <a href="#" class="logo" alt="codetomake.com" title="codetomake.com">
                <em>Codetomake.com</em>
            </a>
            <a href="https://codetomake.com" class="top-banner" alt="codetomake.com" title="codetomake.com">
                <img src="{{asset('frontend/img/banner-468-60.jpg')}}" width="468" height="60" alt="codetomake.com" title="codetomake.com">
            </a>
        </div>
        <nav>
            <ul>
                <li><a href="index.html" class="active">Home</a></li>
                <li><a href="portfolio.html">Portfolio</a></li>
                <li><a href="articles.html">Articles</a></li>
                <li><a href="contact.html">Contact</a></li>
                <li><a href="full-width.html">Full width</a></li>
                <li class="dropdown"><a href="#">Drop down</a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Item 1</a></li>
                        <li><a href="#">Item 2</a></li>
                        <li><a href="#">Item 3</a></li>
                    </ul>
                </li>
                <li>

                    @if (Route::has('login'))

                    @auth
                    <a href="{{ url('/home') }}">Home</a>
                    @else
                    <a href="{{ route('login') }}">Login</a>

                    @if (Route::has('register'))
                    <a href="{{ route('register') }}">Register</a>
                    @endif
                    @endauth

                    @endif


                </li>
            </ul>
        </nav>
    </header>

    <section class="slider">
        <div class="inner">
            <img src="{{asset('frontend/img/slider1.jpg')}}" width="960" height="171" alt="codetomake.com" title="codetomake.com">
        </div>
    </section>

    <div class="main">
        <section class="col-main">
            <h1>Main content</h1>

            <p contentEditable="true">
                <b>Apple web 1</b>" released for free under a "<a rel="license" href="http://creativecommons.org/licenses/by/4.0/">Creative Commons Attribution 4.0 International License</a>" Which states that you are free for modifying and/or redistributing this work under the following terms: <b>1.</b> You must attribute the work by linking back to "<a href="https://codetomake.com">codetomake.com</a>". <b>2.</b> For any reuse or distribution, you must make clear to others the license terms of this work. <b>3.</b> Any of these conditions can be waived if you get permission from "codetomake.com".
                If you intend to use this template I would be so proud if you let me know.
            </p>

            <div class="float-left">
                <ul>
                    <li><a href="#">Lorem ipsum dolor sit amet</a></li>
                    <li><a href="#">Consectetur adipiscing elit</a></li>
                    <li><a href="#">Maecenas sit amet pretium urna</a></li>
                    <li><a href="#">Purus leo tincidunt eros</a></li>
                    <li><a href="#">Vivamus venenatis velit nec</a></li>
                </ul>
            </div>

            <div class="float-left">
                <ul>
                    <li><a href="#">Maecenas sit amet pretium urna</a></li>
                    <li><a href="#">Vivamus venenatis velit nec</a></li>
                    <li><a href="#">Consectetur adipiscing elit</a></li>
                    <li><a href="#">Lorem ipsum dolor sit amet</a></li>
                    <li><a href="#">Purus leo tincidunt eros</a></li>
                </ul>
            </div>

            <div class="clear"></div>

            <hr>
            <h2>Praesent scelerisque tortor sed accumsan convallis. </h2>
            <hr>
            <img class="thumb_medium" src="{{asset('frontend/img/thumb/demo-img-250-130.jpg')}}" alt="">
            <img class="thumb_medium" src="{{asset('frontend/img/thumb/demo-img-250-130.jpg')}}" alt="">
            <img class="thumb_medium" src="{{asset('frontend/img/thumb/demo-img-250-130.jpg')}}" alt="">

        </section>
        <aside class="col-right">
            <div class="box">
                <h2>Lorem ipsum dolor</h2>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas sit amet pretium urna. Vivamus venenatis velit nec neque ultricies, eget elementum magna tristique.
            </div>

            <div class="box">
                <h2>Lorem ipsum dolor</h2>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas sit amet pretium urna. Vivamus venenatis.

                <hr>

                <h2>Social</h2>
                <div class="font-awesome">
                    <a href="#"><i class="fa fa-facebook-square fa-2x" aria-hidden="true"></i></a>
                    <a href="#"><i class="fa fa-twitter-square fa-2x" aria-hidden="true"></i></a>
                    <a href="#"><i class="fa fa-pinterest-square fa-2x" aria-hidden="true"></i></a>
                    <a href="#"><i class="fa fa-google-plus-square fa-2x" aria-hidden="true"></i></a>
                    <a href="#"><i class="fa fa-linkedin-square fa-2x" aria-hidden="true"></i></a>
                    <a href="#"><i class="fa fa-tumblr-square  fa-2x" aria-hidden="true"></i></a>
                </div>
                <hr>
                <div class="font-awesome">
                    <a href="#"><i class="fa fa-cc-mastercard fa-2x" aria-hidden="true"></i></a>
                    <a href="#"><i class="fa fa-cc-visa fa-2x" aria-hidden="true"></i></a>
                    <a href="#"><i class="fa fa-cc-discover fa-2x" aria-hidden="true"></i></a>
                    <a href="#"><i class="fa fa-cc-paypal fa-2x" aria-hidden="true"></i></a>
                </div>
            </div>
        </aside>
    </div>
    <footer>
        <div class="ftop">
            Copyright &copy; 2017 - All rights reserved <a href="https://codetomake.com">codetomake.com</a>
            <br>
            Fully compatible for all major browsers. - <a href="#">About Us</a> | <a href="#">Contact Us</a> | <a href="#">Terms & Conditions</a>
        </div>
        <div class="fbottom">
            <small>Template by <a href="https://codetomake.com">codetomake.com</a> / Font Awesome by Dave Gandy - <a href="http://fontawesome.io">fontawesome.io</a></small>
        </div>
    </footer>
</body>
</html>