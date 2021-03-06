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
                            @foreach($total_menu as $key => $data)
                            @if($data->parent_id == '0')
                            <li>
                                <a href="{{ $data->is_main == '0' ? route('web.home.link',$data->link) : '#' }}">
                                    @if(app()->getLocale() == 'en')
                                    {{ $data->name }}
                                    @else
                                    {{ $data->name_np }}
                                    @endif
                                </a>
                                @if($data->parent()->count())
                                <ul class="dropdown">
                                    @foreach($data->parent()->get() as $d)
                                        <li>
                                            <a href="{{ route('web.home.link',$d->link) }}">
                                                @if(app()->getLocale() == 'en')
                                                {{ $d->name }}
                                                @else
                                                {{$d->name_np}}
                                                @endif
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                                @endif
                            </li>
                            @endif
                            @endforeach
                            <li>
                                <a href="{{route('web.survey.index')}}">{{ __('language.survey')}}</a>
                            </li>
                        </ul>
                    </div>
                    <!-- Nav End -->
                </div>
            </nav>
        </div>
    </div>
</div>