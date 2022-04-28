@extends('web.layouts.app')
@section('content')
@include('web.layouts.slider')
{{-- section 1 --}}
@if ($offices->count())
<section class="features-area py-5 bg-gray">
    <div class="container-fluid">
        <div class="row">
            @foreach($mantralaya->where('is_main','1')->take(4) as $key => $data)
            <div class="col-md-3 col-sm-6">
                <div class="box">
                    <img src="{{ $data->document == null ? asset('images/logo.png') : asset('images/mantralaya') . '/' . $data->document  }}">
                    <div class="box-content">
                        <a href="">
                            <h5 class="title">{{$data->getUserDetail->name}}</h5>
                            <span class="post">{{$data->getUserDetail->address}}</span>
                        </a>
                    </div>
                    <ul class="icon">
                        <li><a href="{{$data->link}}" target="_blank"><img src="{{ asset('images/logo.png')}}"></a></li>
                    </ul>
                </div>
            </div>
            @endforeach

            {{-- @foreach($offices as $key => $data)
            <div class="col-md-3 col-sm-6">
                <div class="box">
                    <img src="{{ $data->thumbnail == null ? asset('images/logo.png') : asset('images/officethumbnail') . '/' . $data->thumbnail  }}">
                    <div class="box-content">
                        <a href="">
                            <h5 class="title">{{$data->name}}</h5>
                            <span class="post">{{$data->address}}</span>
                        </a>
                    </div>
                    <ul class="icon">
                        <li><a href="{{$data->website_link}}" target="_blank"><img src="{{ $data->logo == null ? asset('images/logo.png') : asset('images/officelogo') . '/' . $data->logo  }}"></a></li>
                    </ul>
                </div>
            </div>
            @endforeach --}}

            <!-- <div class="col-md-3 col-sm-6">
                <div class="box">
                    <img src="{{ url('/web') }}/img/bg-img/1.jpg">
                    <div class="box-content">
                        <a href="">
                            <h5 class="title">प्रदेश प्रमुखको कार्यालय</h5>
                            <span class="post">प्रदेश नं. १, विराटनगर</span>
                        </a>
                    </div>
                    <ul class="icon">
                        <li><a href="#"><img src="{{ url('web/img/nepal-gov-logo.png') }}"></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="box">
                    <img src="{{ url('/web') }}/img/bg-img/1.jpg">
                    <div class="box-content">
                        <a href="">
                            <h5 class="title">प्रदेश प्रमुखको कार्यालय</h5>
                            <span class="post">प्रदेश नं. १, विराटनगर</span>
                        </a>
                    </div>
                    <ul class="icon">
                        <li><a href="#"><img src="{{ url('web/img/nepal-gov-logo.png') }}"></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="box">
                    <img src="{{ url('/web') }}/img/bg-img/1.jpg">
                    <div class="box-content">
                        <a href="">
                            <h5 class="title">प्रदेश प्रमुखको कार्यालय</h5>
                            <span class="post">प्रदेश नं. १, विराटनगर</span>
                        </a>
                    </div>
                    <ul class="icon">
                        <li><a href="#"><img src="{{ url('web/img/nepal-gov-logo.png') }}"></a></li>
                    </ul>
                </div>
            </div> -->
        </div>
        {{-- <div class=" text-center">
            <a href="#" class="btn credit-btn box-shadow btn-2">See More</a>
        </div> --}}
    </div>
</section>
@endif
{{-- end section 1 --}}
{{-- section 2 --}}
<section class="features-area py-5 {{ $offices->count() ? '' : 'bg-light' }}">
    <div class="container-fluid">
        <div class="owl-carousel owl-carousel2 owl-theme">
            @foreach($mantralaya->where('is_main','0') as $key => $data)
            <div class="item">
                <a href="{{route('web.mantralaya.detail',$data->id)}}" class="card" style="width: 18rem;">
                    <img src="{{ $data->document == null ? asset('images/noimage.png') : asset('images/mantralaya') . '/' . $data->document }}" class="card-img-top" alt="Images">
                    {{-- <img src="{{ url('/web') }}/img/bg-img/1.jpg" class="card-img-top" alt="..."> --}}
                    <div class="card-body py-3 main-hover-card-text text-center">
                        <h6 class="card-title mb-0">{{$data->getUserDetail->name}}</h6>
                        <small class="post">{{$data->getUserDetail->address}}</small>
                    </div>
                </a>
            </div>
            @endforeach
          <!--   <div class="item">
                <a href="" class="card" style="width: 18rem;">
                    <img src="{{ url('/web') }}/img/bg-img/1.jpg" class="card-img-top" alt="...">
                    <div class="card-body py-3 main-hover-card-text text-center">
                        <h6 class="card-title mb-0">प्रदेश प्रमुखको कार्यालय</h6>
                        <small class="post">प्रदेश नं. १, विराटनगर</small>
                    </div>
                </a>
            </div>
            <div class="item">
                <a href="" class="card" style="width: 18rem;">
                    <img src="{{ url('/web') }}/img/bg-img/1.jpg" class="card-img-top" alt="...">
                    <div class="card-body py-3 main-hover-card-text text-center">
                        <h6 class="card-title mb-0">प्रदेश प्रमुखको कार्यालय</h6>
                        <small class="post">प्रदेश नं. १, विराटनगर</small>
                    </div>
                </a>
            </div>
            <div class="item">
                <a href="" class="card" style="width: 18rem;">
                    <img src="{{ url('/web') }}/img/bg-img/1.jpg" class="card-img-top" alt="...">
                    <div class="card-body py-3 main-hover-card-text text-center">
                        <h6 class="card-title mb-0">प्रदेश प्रमुखको कार्यालय</h6>
                        <small class="post">प्रदेश नं. १, विराटनगर</small>
                    </div>
                </a>
            </div>
            <div class="item">
                <a href="" class="card" style="width: 18rem;">
                    <img src="{{ url('/web') }}/img/bg-img/1.jpg" class="card-img-top" alt="...">
                    <div class="card-body py-3 main-hover-card-text text-center">
                        <h6 class="card-title mb-0">प्रदेश प्रमुखको कार्यालय</h6>
                        <small class="post">प्रदेश नं. १, विराटनगर</small>
                    </div>
                </a>
            </div>
            <div class="item">
                <a href="" class="card" style="width: 18rem;">
                    <img src="{{ url('/web') }}/img/bg-img/1.jpg" class="card-img-top" alt="...">
                    <div class="card-body py-3 main-hover-card-text text-center">
                        <h6 class="card-title mb-0">प्रदेश प्रमुखको कार्यालय</h6>
                        <small class="post">प्रदेश नं. १, विराटनगर</small>
                    </div>
                </a>
            </div>
            <div class="item">
                <a href="" class="card" style="width: 18rem;">
                    <img src="{{ url('/web') }}/img/bg-img/1.jpg" class="card-img-top" alt="...">
                    <div class="card-body py-3 main-hover-card-text text-center">
                        <h6 class="card-title mb-0">प्रदेश प्रमुखको कार्यालय</h6>
                        <small class="post">प्रदेश नं. १, विराटनगर</small>
                    </div>
                </a>
            </div> -->
        </div>
        <div class="mt-3 text-center">
            <a href="{{route('web.mantralaya.index')}}" class="btn credit-btn box-shadow btn-2">View All</a>
        </div>
    </div>
</section>
{{-- section 2 end --}}

{{-- section 3 --}}
<section class="cta-area d-flex flex-wrap">
    <!-- Cta Thumbnail -->
    @foreach($introductions as $data)
    <div class="cta-thumbnail bg-img jarallax" > <img src="{{ $data->document == null ? asset('images/no-image-user.png') : asset('images/introduction') . '/' . $data->document }}"></div>
    <!-- Cta Content -->
    <div class="cta-content bg-gray">
        <!-- Section Heading -->
        <div class="section-heading ">
            <h2>
                {{$data->title}}
                <!-- प्रदेश परिचय -->
            </h2>
        </div>
        <div class="">

            <p>
                {!! $data->description !!}
            </p>
            
        </div>
        {{-- <div class="d-flex flex-wrap mt-50">
            <div class="single-skils-area mb-70 mr-5">
                <div id="circle" class="circle" data-value="0.90">
                    <div class="skills-text">
                        <span>90%</span>
                    </div>
                </div>
                <p>Energy</p>
            </div>

            <div class="single-skils-area mb-70 mr-5">
                <div id="circle2" class="circle" data-value="0.75">
                    <div class="skills-text">
                        <span>75%</span>
                    </div>
                </div>
                <p>power</p>
            </div>

            <div class="single-skils-area mb-70">
                <div id="circle3" class="circle" data-value="0.97">
                    <div class="skills-text">
                        <span>97%</span>
                    </div>
                </div>
                <p>resource</p>
            </div>
        </div> --}}
        <a href="#" class="btn credit-btn box-shadow btn-2">Read More</a>
    </div>
    @endforeach
</section>
{{-- end section 3 --}}

{{-- section 4 --}}
<section class="cta-2-area wow fadeInUp" data-wow-delay="100ms">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- Cta Content -->
                <div class="cta-content d-flex flex-wrap align-items-center justify-content-between">
                    <div class="cta-text">
                        <h4>Get in touch with us.</h4>
                    </div>
                    <div class="cta-btn">
                        <a href="{{route('web.contactus.index')}}" class="btn credit-btn box-shadow">{{ __('language.contact')}}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
{{-- end section 4 --}}

{{-- section 5 --}}
{{-- <section class="services-area section-padding-100-0">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- Section Heading -->
                <div class="section-heading text-center mb-100 wow fadeInUp" data-wow-delay="100ms">
                    <div class="line"></div>
                    <p>Sub Title</p>
                    <h2>Demo Section</h2>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Single Service Area -->
            <div class="col-12 col-md-6 col-lg-4">
                <div class="single-service-area d-flex mb-100 wow fadeInUp" data-wow-delay="200ms">
                    <img src="{{ url('/web') }}/img/bg-img/1.jpg" class="img-fluid  icon-img mr-4">
                    <div class="text">
                        <h5>Some Title</h5>
                        <p>Morbi ut dapibus dui. Sed ut iaculis elit, quis varius mauris. Integer ut ultricies orci, lobortis egestas sem.</p>
                    </div>
                </div>
            </div>

            <!-- Single Service Area -->
            <div class="col-12 col-md-6 col-lg-4">
                <div class="single-service-area d-flex mb-100 wow fadeInUp" data-wow-delay="200ms">
                    <img src="{{ url('/web') }}/img/bg-img/2.jpg" class="img-fluid  icon-img mr-4">
                    <div class="text">
                        <h5>Some Title</h5>
                        <p>Morbi ut dapibus dui. Sed ut iaculis elit, quis varius mauris. Integer ut ultricies orci, lobortis egestas sem.</p>
                    </div>
                </div>
            </div>

            <!-- Single Service Area -->
            <div class="col-12 col-md-6 col-lg-4">
                <div class="single-service-area d-flex mb-100 wow fadeInUp" data-wow-delay="200ms">
                    <img src="{{ url('/web') }}/img/bg-img/3.jpg" class="img-fluid  icon-img mr-4">
                    <div class="text">
                        <h5>Some Title</h5>
                        <p>Morbi ut dapibus dui. Sed ut iaculis elit, quis varius mauris. Integer ut ultricies orci, lobortis egestas sem.</p>
                    </div>
                </div>
            </div>

            <!-- Single Service Area -->
            <div class="col-12 col-md-6 col-lg-4">
                <div class="single-service-area d-flex mb-100 wow fadeInUp" data-wow-delay="200ms">
                    <img src="{{ url('/web') }}/img/bg-img/4.jpg" class="img-fluid  icon-img mr-4">
                    <div class="text">
                        <h5>Some Title</h5>
                        <p>Morbi ut dapibus dui. Sed ut iaculis elit, quis varius mauris. Integer ut ultricies orci, lobortis egestas sem.</p>
                    </div>
                </div>
            </div>

            <!-- Single Service Area -->
            <div class="col-12 col-md-6 col-lg-4">
                <div class="single-service-area d-flex mb-100 wow fadeInUp" data-wow-delay="200ms">
                    <img src="{{ url('/web') }}/img/bg-img/5.jpg" class="img-fluid  icon-img mr-4">
                    <div class="text">
                        <h5>Some Title</h5>
                        <p>Morbi ut dapibus dui. Sed ut iaculis elit, quis varius mauris. Integer ut ultricies orci, lobortis egestas sem.</p>
                    </div>
                </div>
            </div>

            <!-- Single Service Area -->
            <div class="col-12 col-md-6 col-lg-4">
                <div class="single-service-area d-flex mb-100 wow fadeInUp" data-wow-delay="200ms">
                    <img src="{{ url('/web') }}/img/bg-img/1.jpg" class="img-fluid  icon-img mr-4">
                    <div class="text">
                        <h5>Some Title</h5>
                        <p>Morbi ut dapibus dui. Sed ut iaculis elit, quis varius mauris. Integer ut ultricies orci, lobortis egestas sem.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> --}}
{{-- end section 5 --}}

{{-- section 6 --}}
<section class="services-area bg-gray py-5">
    <div class="container-fluid px-5">
        <div class="row">
            <div class="col-md-3">
                <div class="list-item">
                    <div class="list-item-head">
                      <p>{{ __('language.notice')}}</p>
                  </div>

                  <div class="list-item-body">
                    @foreach($remote_notices as $remote_notice)
                    <a href="{{$remote_notice->url}}" target="_blank" class="list-item-body-content">
                        <i class="fa fa-angle-right"></i>
                        <span>
                            <span class="text-bluish">
                                {{$remote_notice->title}}
                            </span>
                            <small class="d-block w-100">
                                {{ $remote_notice->date_np ? '- '.$remote_notice->date_np : '' }} 
                                <span class="text-redish float-right">
                                    {{ $remote_notice->ministry ? '- '.$remote_notice->ministry : '' }}
                                </span>
                            </small>
                        </span>
                    </a>
                    @endforeach
                    <a href="{{route('web.detail.index',['type' => 'suchana'])}}" class="btn btn-sm bg-main-blue btn-hover-main float-right rounded-0">{{ __('language.see-more')}}</a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="list-item">
                <div class="list-item-head">
                    <p>{{ __('language.yearly-budget-program')}}</p>
                </div>

                <div class="list-item-body">
                    @foreach($remote_yearly_budgets as $budget)
                    <a href="{{$budget->url}}" target="_blank" class="list-item-body-content">
                        <i class="fa fa-angle-right"></i>
                        <span>
                            <span class="text-bluish">
                                {{$budget->title}}
                            </span>
                            <small class="d-block w-100">
                                {{ $budget->date_np ? '- '.$budget->date_np : '' }} 
                                <span class="text-redish float-right">
                                    {{ $budget->ministry ? '- '.$budget->ministry : '' }}
                                </span>
                            </small>
                        </span>
                    </a>
                    @endforeach

                    <a href="{{route('web.detail.index',['type' => 'yearly-budget'])}}" class="btn btn-sm bg-main-blue btn-hover-main float-right rounded-0">{{ __('language.see-more')}}</a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="list-item">
                <div class="list-item-head">
                    <p>{{ __('language.public-procurement-bidding')}}</p>
                </div>
                <div class="list-item-body">
                    @foreach($remote_kharid_bolpatras as $bolpatra)
                    <a href="{{$bolpatra->url}}" target="_blank" class="list-item-body-content">
                        <i class="fa fa-angle-right"></i>
                        <span>
                            <span class="text-bluish">
                                {{$bolpatra->title}}
                            </span>
                            <small class="d-block w-100">
                                {{ $bolpatra->date_np ? '- '.$bolpatra->date_np : '' }} 
                                <span class="text-redish float-right">
                                    {{ $bolpatra->ministry ? '- '.$bolpatra->ministry : '' }}
                                </span>
                            </small>
                        </span>
                    </a>
                    @endforeach

                    <a href="{{route('web.detail.index',['type' => 'kharid-bolpatra'])}}" class="btn btn-sm bg-main-blue btn-hover-main float-right rounded-0">{{ __('language.see-more')}}</a>
                </div>


            </div>
        </div>
        <div class="col-md-3">
            <div class="list-item">
                <div class="list-item-head">
                    <p>{{ __('language.acts-laws-rules')}}</p>
                </div>
                <div class="list-item-body">
                    @foreach($remote_ain_kanuns as $ainkanun)
                    <a href="{{$ainkanun->url}}" target="_blank" class="list-item-body-content">
                        <i class="fa fa-angle-right"></i>
                        <span>
                            <span class="text-bluish">
                                {{$ainkanun->title}}
                            </span>
                            <small class="d-block w-100">
                                {{ $ainkanun->date_np ? '- '.$ainkanun->date_np : '' }} 
                                <span class="text-redish float-right">
                                    {{ $ainkanun->ministry ? '- '.$ainkanun->ministry : '' }}
                                </span>
                            </small>
                        </span>
                    </a>
                    @endforeach
                    <a href="{{route('web.detail.index',['type' => 'ain-kanoon'])}}" class="btn btn-sm bg-main-blue btn-hover-main float-right rounded-0">{{ __('language.see-more')}}</a>
                </div>


            </div>
        </div>
    </div>
</div>
</section>
{{-- section 6 end --}}
{{-- section 7 --}}
<section class="miscellaneous-area section-padding-100-0">
    <div class="container-fluid px-5">
        <div class="row">
            <div class="col-md-3">
                <div class="list-item">
                    <div class="list-item-head">
                      <p>{{ __('language.services')}} </p>
                  </div>

                  <div class="list-item-body">
                    @foreach($remote_sewa_pravas as $sewaprava)
                    <a href="{{$sewaprava->url}}" target="_blank" class="list-item-body-content">
                        <i class="fa fa-angle-right"></i>
                        <span>
                            <span class="text-bluish">
                                {{$sewaprava->title}}
                            </span>
                            <small class="d-block w-100">
                                {{ $sewaprava->date_np ? '- '.$sewaprava->date_np : '' }} 
                                <span class="text-redish float-right">
                                    {{ $sewaprava->ministry ? '- '.$sewaprava->ministry : '' }}
                                </span>
                            </small>
                        </span>
                    </a>
                    @endforeach


                    <a href="{{route('web.detail.index',['type' => 'sewa-prava'])}}" class="btn btn-sm bg-main-blue btn-hover-main float-right rounded-0">{{ __('language.see-more')}}</a>
                </div>

            </div>
        </div>
        <div class="col-md-3">
            <div class="list-item">
                <div class="list-item-head">
                    <p>{{ __('language.form')}} </p>
                </div>

                <div class="list-item-body">
                    @foreach($remote_e_farums as $farum)
                    <a href="{{$farum->url}}" target="_blank" class="list-item-body-content">
                        <i class="fa fa-angle-right"></i>
                        <span>
                            <span class="text-bluish">
                                {{$farum->title}}
                            </span>
                            <small class="d-block w-100">
                                {{ $farum->date_np ? '- '.$farum->date_np : '' }} 
                                <span class="text-redish float-right">
                                    {{ $farum->ministry ? '- '.$farum->ministry : '' }}
                                </span>
                            </small>
                        </span>
                    </a>
                    @endforeach

                    <a href="{{route('web.detail.index',['type' => 'e-farum'])}}" class="btn btn-sm bg-main-blue btn-hover-main float-right rounded-0">{{ __('language.see-more')}}</a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="list-item">
                <div class="list-item-head">
                    <p>{{ __('language.report')}}</p>
                </div>

                <div class="list-item-body">
                    @foreach($remote_prativedans as $prativedan)
                    <a href="{{$prativedan->url}}" target="_blank" class="list-item-body-content">
                        <i class="fa fa-angle-right"></i>
                        <span>
                            <span class="text-bluish">
                                {{$prativedan->title}}
                            </span>
                            <small class="d-block w-100">
                                {{ $prativedan->date_np ? '- '.$prativedan->date_np : '' }} 
                                <span class="text-redish float-right">
                                    {{ $prativedan->ministry ? '- '.$prativedan->ministry : '' }}
                                </span>
                            </small>
                        </span>
                    </a>
                    @endforeach

                    <a href="{{route('web.detail.index',['type' => 'prativedan'])}}" class="btn btn-sm bg-main-blue btn-hover-main float-right rounded-0">{{ __('language.see-more')}}</a>
                </div>


            </div>
        </div>
        <div class="col-md-3">
            <div class="list-item">
                <div class="list-item-head">
                    <p>{{ __('language.publication')}}</p>
                </div>

                <div class="list-item-body">
                    @foreach($remote_publications as $publication)
                    <a href="{{$publication->url}}" target="_blank" class="list-item-body-content">
                        <i class="fa fa-angle-right"></i>
                        <span>
                            <span class="text-bluish">
                                {{$publication->title}}
                            </span>
                            <small class="d-block w-100">
                                {{ $publication->date_np ? '- '.$publication->date_np : '' }} 
                                <span class="text-redish float-right">
                                    {{ $publication->ministry ? '- '.$publication->ministry : '' }}
                                </span>
                            </small>
                        </span>
                    </a>
                    @endforeach

                    <a href="{{route('web.detail.index',['type' => 'publication'])}}" class="btn btn-sm bg-main-blue btn-hover-main float-right rounded-0">{{ __('language.see-more')}}</a>
                </div>


            </div>
        </div>
    </div>
</div>
</section>
{{-- section 7 end --}}
@endsection

@push('js')
<script src="{{ url('/web') }}/js/slider.main.js"></script>
<script type="text/javascript">
    $('.owl-carousel2').owlCarousel({
        loop:true,
        margin:10,
        nav:false,
        autoplay:true,
        autoplayTimeout:2000,
        autoplayHoverPause:true,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:3
            },
            1000:{
                items:4
            }
        }
    })
</script>
@endpush