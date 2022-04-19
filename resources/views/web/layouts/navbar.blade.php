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
                            <li>
                                <a href="{{route('web.survey.index')}}">Survey</a></li>
                            @foreach($total_menu as $key => $data)
                            <li>
                                @if($data->parent_id == '0')
                                <a href="{{ $data->is_main == '0' ? route('web.home.link',$data->link) : '#' }}">
                                    {{ $data->name }}
                                </a>
                                @endif
                                @if($data->parent()->count())
                                <ul class="dropdown">
                                    @foreach($data->parent()->get() as $d)
                                        <li>
                                            <a href="{{ route('web.home.link',$d->link) }}">
                                                {{ $d->name }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                                @endif
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <!-- Nav End -->
                </div>
            </nav>
        </div>
    </div>
</div>