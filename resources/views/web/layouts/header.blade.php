<div class="top-header-area">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12 d-flex justify-content-between">
                <!-- Logo Area -->
                @foreach($header as $data)
                <div class="logo">
                    <a href="{{ route('web.home') }}" class="d-flex align-items-center">
                        <img src="{{ asset('images/logo') . '/' . $data->document  }}" alt="" class="img-fluid logo-main">
                        <div class="align-self-center ml-2">
                            {{-- <h6></h6> --}}
                            <h4>
                                {{$data->name}}

                                <!-- प्रदेश नं. १ सरकारको आधिकारिक पोर्टल --></h4>
                                <h6 class="text-redish">{{$data->slogan}}</h6>
                            </div>
                        </a>
                    </div>

                    <div class="top-contact-info d-flex align-items-center">
                        <img src="{{ url('/web') }}/img/flag.gif" alt="" class="img-fluid logo-main" style="max-height: 75%;">
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>