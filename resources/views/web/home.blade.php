@extends('web.layouts.app')
@section('content')
@include('web.layouts.slider')
{{-- section 1 --}}
@if ($mantralaya->count())
<section class="features-area py-4 bg-gray">
    <div class="container-fluid">
        <div class="row">
            @foreach($mantralaya->take(4) as $key => $data)
            <div class="col-md-3 col-sm-6">
                <div class="card rounded-0 border-0">
                    <a href="{{$data->link}}">
                        <img src="{{ $data->document == null ? asset('images/noimage.png') : asset('images/mantralaya') . '/' . $data->document  }}" class="card-img-top  rounded-0">
                        <div class="card-body card-main-body">
                            <h5 class="title">{{$data->getUserDetail->name}}</h5>
                            <span class="post">{{$data->getUserDetail->address}}</span>
                        </div>
                    </a>
                </div>
                {{-- <div class="box">
                    <a href="{{$data->link}}">
                    <img src="{{ $data->document == null ? asset('images/logo.png') : asset('images/mantralaya') . '/' . $data->document  }}">
                    <div class="box-content">
                        <a href="{{$data->link}}">
                            <h5 class="title">{{$data->getUserDetail->name}}</h5>
                            <span class="post">{{$data->getUserDetail->address}}</span>
                        </a>
                    </div>
                    <ul class="icon">
                        <li><a href="{{$data->link}}" target="_blank"><img src="{{ asset('images/logo.png')}}"></a></li>
                    </ul>
                    </a>
                </div> --}}
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif
{{-- end section 1 --}}

{{-- section 2 --}}
<section class="services-area bg-gray pb-4">
    <div class="container-fluid">
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
{{-- section 2 end --}}

{{-- section 3 --}}
<section class="features-area pt-4 bg-light">
    <div class="mb-3">
        <div class="title-head-main px-3 py-2 d-flex justify-content-between">
            <div>
                <span class="fa fa-map-o"></span>
                GIS of Province No. 1
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d114311.47785866004!2d87.20176636713276!3d26.448195378359042!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39ef744704331cc5%3A0x6d9a85e45c54b3fc!2sBiratnagar%2056613!5e0!3m2!1sen!2snp!4v1651335343227!5m2!1sen!2snp" width="100%" height="330" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <div class="col-md">
                <div class="row">
                    <div class="col-md-3 p-0">
                        <div class="text-center gis-block-main blue">
                            <i class="fa fa-building"></i>
                            <h4 class="text-white m-0">१</h4>
                            <small>म.न.पा</small>
                        </div>
                    </div>
                    <div class="col-md-3 p-0">
                        <div class="text-center gis-block-main green">
                            <i class="fa fa-building"></i>
                            <h4 class="text-white m-0">२</h4>
                            <small>म.न.पा</small>
                        </div>
                    </div>
                    <div class="col-md-3 p-0">
                        <div class="text-center gis-block-main cadetblue">
                            <i class="fa fa-building"></i>
                            <h4 class="text-white m-0">२</h4>
                            <small>म.न.पा</small>
                        </div>
                    </div>
                    <div class="col-md-3 p-0">
                        <div class="text-center gis-block-main blue">
                            <i class="fa fa-building"></i>
                            <h4 class="text-white m-0">२</h4>
                            <small>म.न.पा</small>
                        </div>
                    </div>
                    <div class="col-md-3 p-0">
                        <div class="text-center gis-block-main green">
                            <i class="fa fa-building"></i>
                            <h4 class="text-white m-0">२</h4>
                            <small>म.न.पा</small>
                        </div>
                    </div>
                    <div class="col-md-3 p-0">
                        <div class="text-center gis-block-main cadetblue">
                            <i class="fa fa-building"></i>
                            <h4 class="text-white m-0">२</h4>
                            <small>म.न.पा</small>
                        </div>
                    </div>
                    <div class="col-md-3 p-0">
                        <div class="text-center gis-block-main yellow">
                            <i class="fa fa-building"></i>
                            <h4 class="text-white m-0">२</h4>
                            <small>म.न.पा</small>
                        </div>
                    </div>
                    <div class="col-md-3 p-0">
                        <div class="text-center gis-block-main green">
                            <i class="fa fa-building"></i>
                            <h4 class="text-white m-0">२</h4>
                            <small>म.न.पा</small>
                        </div>
                    </div>
                    <div class="col-md-3 p-0">
                        <div class="text-center gis-block-main yellow">
                            <i class="fa fa-building"></i>
                            <h4 class="text-white m-0">२</h4>
                            <small>म.न.पा</small>
                        </div>
                    </div>
                    <div class="col-md-3 p-0">
                        <div class="text-center gis-block-main silver">
                            <i class="fa fa-building"></i>
                            <h4 class="text-white m-0">२</h4>
                            <small>म.न.पा</small>
                        </div>
                    </div>
                    <div class="col-md-3 p-0">
                        <div class="text-center gis-block-main green">
                            <i class="fa fa-building"></i>
                            <h4 class="text-white m-0">२</h4>
                            <small>म.न.पा</small>
                        </div>
                    </div>
                    <div class="col-md-3 p-0">
                        <div class="text-center gis-block-main silver">
                            <i class="fa fa-building"></i>
                            <h4 class="text-white m-0">२</h4>
                            <small>म.न.पा</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
{{-- end section 3 --}}

{{-- section 4 --}}
<section class="features-area pt-4 bg-light">
    <div class="mb-3">
        <div class="title-head-main px-3 py-2 d-flex justify-content-between">
            <div>
                <span class="fa fa-comments-o"></span>
                प्रदेश नं. १ सरकारको आधिकारिक पोर्टल
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row align-items-stretch">
            <div class="col-md-5">
                <div class="container-fluid">
                    <h5>Title here</h5>
                    <div class="row">
                        <div class="col-md-4 p-1">
                            <div class="text-center quest-block-main blue">
                                <i class="fa fa-pencil"></i>
                                <h5 class="text-white m-0">१</h5>
                                <small>म.न.पा</small>
                            </div>
                        </div>
                        <div class="col-md-4 p-1">
                            <div class="text-center quest-block-main red">
                                <i class="fa fa-building"></i>
                                <h4 class="text-white m-0">२</h4>
                                <small>म.न.पा</small>
                            </div>
                        </div>
                        <div class="col-md-4 p-1">
                            <div class="text-center quest-block-main green">
                                <i class="fa fa-building"></i>
                                <h4 class="text-white m-0">२</h4>
                                <small>म.न.पा</small>
                            </div>
                        </div>
                        <div class="col-md-4 p-1">
                            <div class="text-center quest-block-main yellow">
                                <i class="fa fa-building"></i>
                                <h4 class="text-white m-0">२</h4>
                                <small>म.न.पा</small>
                            </div>
                        </div>
                        <div class="col-md-4 p-1">
                            <div class="text-center quest-block-main blue">
                                <i class="fa fa-building"></i>
                                <h4 class="text-white m-0">२</h4>
                                <small>म.न.पा</small>
                            </div>
                        </div>
                        <div class="col-md-4 p-1">
                            <div class="text-center quest-block-main purple">
                                <i class="fa fa-building"></i>
                                <h4 class="text-white m-0">२</h4>
                                <small>म.न.पा</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md bg-white px-2 mx-2">
                <div class=" d-flex flex-column p-2">
                    <div class="mb-1">
                        <a href="" class="btn-graph">
                            नया गुनासोको दर्ता गर्नुहोस 
                            <i class="fa fa-plus"></i>
                        </a>
                    </div>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores distinctio delectus aperiam blanditiis ipsa. Veniam dolorem, laudantium? Harum culpa, provident iure, rerum minima corporis molestias esse voluptatibus cumque. Ipsa, earum.</p>
                </div>
            </div>
            <div class="col-md bg-white p-1">
                <div class="d-flex flex-column p-2">
                    <div class="mb-1">
                        <span class="font-weight-bold">तत्यांक तथा विवरणहरु</span>
                    </div>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores distinctio delectus aperiam blanditiis ipsa. Veniam dolorem, laudantium? Harum culpa, provident iure, rerum minima corporis molestias esse voluptatibus cumque. Ipsa, earum.</p>
                </div>
            </div>
        </div>
    </div>
</section>
{{-- end section 4 --}}

{{-- section 7 --}}
<section class="miscellaneous-area pt-4 bg-light">
    <div class="container-fluid">
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

{{-- section 6 --}}
<section class="features-area pt-4 {{ $mantralaya->count() ? '' : 'bg-light' }}">
    <div class="mb-3">
        <div class="title-head-main px-3 py-2 d-flex justify-content-between">
            <div>
                <span class="fa fa-university"></span>
                प्रदेश नं. १ सरकारको आधिकारिक पोर्टल
            </div>
            <a href="" class="float-right btn-title-stlye d-flex">
                <i class="fa fa-play"></i>
                अझ धेरै
            </a>
        </div>
    </div>

    <div class="container-fluid">
        <div class="owl-carousel owl-carousel2 owl-theme d-flex">
            @foreach($mantralaya->where('is_main','0') as $key => $data)
            <div class="item align-self-stretch">
                <a href="{{route('web.mantralaya.detail',$data->id)}}" class="card">
                    <img src="{{ $data->document == null ? asset('images/noimage.png') : asset('images/mantralaya') . '/' . $data->document }}" class="img-fluid card-img-top" alt="{{$data->getUserDetail->name}}">
                   <!--  <img src="{{ url('/web') }}/img/bg-img/1.jpg" class="card-img-top" alt="..."> -->
                    <div class="card-body py-3 main-hover-card-text text-center position-absolute w-100">
                        <div>
                            <h6 class="card-title mb-0">{{$data->getUserDetail->name}}</h6>
                            <small class="post ">{{$data->getUserDetail->address}}</small>
                        </div>

                    </div>
                </a>
            </div>
            @endforeach
        </div>
        <div class="mt-3 text-center">
            <a href="{{route('web.mantralaya.index')}}" class="btn credit-btn box-shadow btn-2">View All</a>
        </div>
    </div>
</section>
{{-- section 6 end --}}
@endsection

@push('js')
<script src="{{ url('/web') }}/js/slider.main.js"></script>
<script type="text/javascript">
    $('.owl-carousel2').owlCarousel({
        loop:true,
        margin:30,
        nav:false,
        autoHeight:true,
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