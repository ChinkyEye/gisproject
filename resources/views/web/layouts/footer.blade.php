<div class="footer-border"></div>
<footer class="footer-area pt-5">
    <div class="container">
        <div class="row">

            <!-- Single Footer Widget -->
   {{--        <div class="col-12 col-sm-6 col-lg-5">
                <div class="single-footer-widget mb-70 text-white">
                    <h5 class="widget-title font-weight-bold">{{ __('language.about-us')}}</h5>
                    @foreach($aboutus as $data)
                    <p>{!! $data->description !!} </p>
                    @endforeach
                    <a href="" class="text-footer-danger hover-icon">Read more <i class="fa fa-arrow-right"></i></a>
                </div>
            </div>  --}}
            <div class="col-md-4">
                <div class="single-footer-widget mb-70 text-white">
                    <h5 class="widget-title font-weight-bold">{{ __('language.useful-link')}}</h5>
                    @foreach($usefullink as $key => $data)
                    <div class="single-latest-news-area d-flex align-items-center">
                        <div class="news-content">
                            <span class="text-light icon-foot">
                                <i class="fa fa-angle-right"></i>
                            </span>
                            <a href="//{{$data->website_link}}" target="_blank" class="d-inline-block">{{$data->name}}</a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>  
            <div class="col-md-4">
                <div class="single-footer-widget mb-70">
                    <h5 class="widget-title font-weight-bold">{{ __('language.quick_menu')}}</h5>
                    @foreach($quick_menu->where('is_main','0')->where('parent_id','0') as $key => $data)
                    <div class="single-latest-news-area d-flex align-items-center">
                        <div class="news-content">
                            <span class="text-light icon-foot">
                                <i class="fa fa-angle-right"></i>
                            </span>
                            <a href="{{ $data->is_main == '0' ? route('web.home.link',$data->link) : '#' }}" target="_blank" class="d-inline-block">
                                @if(app()->getLocale() == 'en')
                                {{ $data->name }}
                                @else
                                {{ $data->name_np }}
                                @endif
                            </a> 
                           </div>
                       </div>
                       @endforeach
                   </div>
               </div>
            <!-- Single Footer Widget -->
            <div class="col-md-4">
                <div class="single-footer-widget mb-70">
                    <h5 class="widget-title font-weight-bold">{{ __('language.contact')}}</h5>
                    @foreach($contact as $data)
                    <div class="single-contact-content d-flex align-items-center text-white mb-4">
                        <div class="mr-3 icon-font">
                            <i class="fa fa-map-marker"></i>
                        </div>
                        <div class="text">
                           <!--  Birtnagar, Morang, Nepal -->
                           {{$data->address}}
                        </div>
                    </div>
                    <div class="single-contact-content d-flex align-items-center text-white mb-4">
                        <div class="mr-3 icon-font">
                            <i class="fa fa-envelope-o"></i>
                        </div>
                        <div class="text">
                          <!--   info@p1.com.np -->
                          {{$data->email}}
                        </div>
                    </div>
                    <div class="single-contact-content d-flex align-items-center text-white mb-4">
                        <div class="mr-3 icon-font">
                            <i class="fa fa-phone"></i>
                        </div>
                        <div class="text">
                            {{$data->phone}}
                        </div>
                    </div>
                    <div class="template-demo text-center text-md-left"> 
                        <a href="{{$data->facebook}}" class="btn btn-social-icon btn-facebook btn-rounded" target="_blank">
                            <i class="fa fa-facebook"></i>
                        </a> 
                        <a href="{{$data->youtube}}" class="btn btn-social-icon btn-youtube btn-rounded" target="_blank">
                            <i class="fa fa-youtube"></i>
                        </a> 
                        <a href="{{$data->twitter}}" class="btn btn-social-icon btn-twitter btn-rounded" target="_blank">
                            <i class="fa fa-twitter"></i>
                        </a> 
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <!-- Copywrite Area -->
    {{-- <div class="copywrite-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="copywrite-content d-flex flex-wrap justify-content-center justify-content-md-between align-items-center">
                        <span class="footer-logo">
                            <img src="{{ url('/web') }}/img/core-img/logo.png" alt="" class="img-fluid foot-logo-main mr-2">
                            <img src="{{ url('/web') }}/img/flag.gif" alt="" class="img-fluid foot-logo-main">
                        </span>

                        <p class="copywrite-text text-white text-center text-md-right">
                            <a href="javascript:void(0)" class="text-white">
                                सर्वाधिकार सुरक्षित &copy; <script>document.write(new Date().getFullYear());</script>  <a href="https://techware.com.np" target="_blank">मुख्यमन्त्री तथा मन्त्रिपरिषद्को कार्यालय
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <div class="copywrite-area py-3">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="copywrite-content">
                        <ul class="list-inline text-center">
                            <li class="list-inline-item">
                                <a href="" class="text-white">
                                    <i class="fa fa-facebook"></i>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="" class="text-white">
                                    <i class="fa fa-twitter"></i>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="" class="text-white">
                                    <i class="fa fa-google-plus"></i>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="" class="text-white">
                                    <i class="fa fa-youtube-play"></i>
                                </a>
                            </li>
                        </ul>
                        <p class="copywrite-text text-white text-center">
                            <a href="javascript:void(0)" class="text-white">
                                सर्वाधिकार सुरक्षित 
                                &copy; 
                                <script>document.write(new Date().getFullYear());</script>  
                                |@foreach($footer as $data)
                                <a href="{{ route('web.home') }}" target="_blank">{{$data->name}}
                            </a>
                            @endforeach
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>