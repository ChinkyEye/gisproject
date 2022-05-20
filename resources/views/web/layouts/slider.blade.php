<div class="row mx-0 mt-1">
    <div class="col-md-3 px-0">
        @include('web.layouts.left-menu')
    </div>
    <div class="col-md-6 px-0">
        <div class="hero-area">
            <div class="hero-slideshow owl-carousel">
                @foreach($sliders as $slider)
                <div class="single-slide bg-img">
                    <div class="slide-bg-img bg-img bg-overlay">  
                        <img src="{{ asset('images/slider/') . '/' . $slider->document }}" alt="" class="img-fluid">
                    </div>
                    <div class="container-fluid h-100">
                        <div class="row h-100 align-items-center justify-content-center">
                            <div class="col-12">
                                <div class="welcome-text text-center">
                                    {{-- <h2 data-animation="fadeInUp" data-delay="300ms">{{$slider->name}}</h2> --}}
                                    <p class="bg-light py-1 mx-3">{{$slider->name}}</p>
                                    {{-- <p class="bg-light py-1 mx-3">प्रदेश नं. १ सरकारको आधिकारिक पोर्टल</p> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="slide-du-indicator"></div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="col-md p-0 pl-2">
        <div class="list-item-parent">
            <div class="list-item-top">
                <div class="list-item-head-top">
                    <p class="px-3">
                        <i class="fa fa-building"></i> 
                        {{ __('language.mantralayaharu')}}
                        <!-- मन्त्रालयहरु  -->
                    </p>
                </div>
                @foreach($mantralaya ->where('is_side','1')->take(13) as $key => $data)
                <div class="list-item-body-top">
                    <a href="{{$data->link}}" target="_blank" class="list-item-body-content-top w-100">
                        <span class="text-dark">
                           {{$data->getUserDetail->name}}
                       </span>
                   </a>
               </div>

               @endforeach
           </div>
       </div>
    </div>
</div>
