<div class="top-header-area">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12 d-flex justify-content-between">
                <!-- Logo Area -->
                @foreach($header as $data)
                {{-- <div class="logo"> --}}
                    <a href="{{ route('web.home') }}" class="d-flex align-items-center">
                        <img src="{{ asset('images/logo') . '/' . $data->document  }}" alt="" class="img-fluid logo-main">
                    </a>
                    <a href="{{ route('web.home') }}">
                        <div class="text-center ml-2">
                            <h5 class="logo-color">{{$data->slogan}}</h5>
                            <h5 class="logo-color m-0">
                                {{$data->name}}
                            </h5>
                        </div>
                    </a>
                    {{-- </div> --}}

                    <div class="top-contact-info d-flex align-items-center">
                        <img src="{{ url('/web') }}/img/flag.gif" alt="" class="img-fluid flag-main">
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>