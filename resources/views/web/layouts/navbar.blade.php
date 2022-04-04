<div class="credit-main-menu" id="sticker">
    <div class="classy-nav-container breakpoint-off">
        <div class="container">
            <!-- Menu -->
            <nav class="classy-navbar justify-content-between" id="creditNav">

                <!-- Navbar Toggler -->
                <div class="classy-navbar-toggler">
                    <span class="navbarToggler"><span></span><span></span><span></span></span>
                </div>

                <!-- Menu -->
                <div class="classy-menu">

                    <!-- Close Button -->
                    <div class="classycloseIcon">
                        <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                    </div>

                    <!-- Nav Start -->
                    <div class="classynav">
                        <ul>
                            <li><a href="{{ route('web.home') }}">{{ __('language.home') }}</a></li>
                            <li><a href="{{ route('web.home') }}">{{ __('language.about-us') }}</a></li>
                            <li><a href="{{ route('web.home') }}">{{ __('language.ministries-bodies') }}</a></li>
                            <li><a href="#">{{ __('language.acts-laws-rules') }}</a>
                                <ul class="dropdown">
                                    <li><a href="{{ route('web.home') }}">{{ __('language.acts') }}</a></li>
                                    <li><a href="{{ route('web.home') }}">{{ __('language.rules') }} Us</a></li>
                                    <li><a href="{{ route('web.home') }}">{{ __('language.procedure') }}</a></li>
                                    <li><a href="{{ route('web.home') }}">{{ __('language.directory') }}</a></li>
                                </ul>
                            </li>
                            <li><a href="#">{{ __('language.publications') }}</a>
                                <ul class="dropdown">
                                    <li><a href="{{ route('web.home') }}">{{ __('language.policies-and-programs') }}</a></li>
                                    <li><a href="{{ route('web.home') }}">{{ __('language.major-achievements') }} Us</a></li>
                                    <li><a href="{{ route('web.home') }}">{{ __('language.state-profile') }}</a></li>
                                    <li><a href="{{ route('web.home') }}">{{ __('language.org-development-program') }}</a></li>
                                </ul>
                            </li>
                            <li></li>
                            <li><a href="{{ route('web.home') }}">{{ __('language.state-gazette') }}</a></li>
                            <li><a href="{{ route('web.home') }}">{{ __('language.contact') }}</a></li>
                        </ul>
                    </div>
                    <!-- Nav End -->
                </div>

                <!-- Contact -->
                {{-- <div class="contact">
                    <a href="#"><img src="{{ url('/web') }}/img/core-img/call2.png" alt=""> +800 49 900 900</a>
                </div> --}}
            </nav>
        </div>
    </div>
</div>