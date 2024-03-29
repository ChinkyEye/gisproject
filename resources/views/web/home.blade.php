@extends('web.layouts.app')
@section('content')
@include('web.layouts.slider')
{{-- section 1 --}}
@if ($mantralaya->count())
<section class="features-area py-4 bg-gray">
    <div class="container-fluid">
        <div class="row">
            @foreach($mantralaya->where('is_main','1')->take(4) as $key => $data)
            <div class="col-md-3 col-sm-6">
                <div class="card rounded-0 border-0">
                    <a href="{{$data->link}}" target="_blank" class="section-2-area">
                        <img src="{{ $data->document == null ? asset('images/noimage.png') : asset('images/mantralaya') . '/' . $data->document  }}" class="card-img-top  rounded-0 section-main-2">
                        <div class="card-body card-main-body py-2">
                            <h5 class="title m-0">{{$data->getUserDetail->name}}</h5>
                            <span class="post">{{$data->getUserDetail->address}}</span>
                        </div>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif
{{-- end section 1 --}}

{{-- section 2 --}}
<section class="services-area bg-gray">
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
                                <span class="text-bluish" title="{{$remote_notice->title}}">
                                    {{ Str::limit($remote_notice->title,50)}}
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
            <!-- <div class="col-md-3">
                <div class="list-item">
                    <div class="list-item-head">
                        <p>{{ __('language.yearly-budget-program')}}</p>
                    </div>

                    <div class="list-item-body">
                        @foreach($remote_yearly_budgets as $budget)
                        <a href="{{$budget->url}}" target="_blank" class="list-item-body-content">
                            <i class="fa fa-angle-right"></i>
                            <span>
                                <span class="text-bluish" title="{{$budget->title}}">
                                    {{Str::limit($budget->title,50)}}
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
            </div> -->
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
                                <span class="text-bluish" title="{{$bolpatra->title}}">
                                    {{Str::limit($bolpatra->title,50)}}
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
                                <span class="text-bluish" title="{{$ainkanun->title}}">
                                    {{Str::limit($ainkanun->title,50)}}
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
            <div class="col-md-3">
                <div class="list-item">
                    <div class="list-item-head">
                        <p>{{ __('language.procedure-directory')}}</p>
                    </div>
                    <div class="list-item-body">
                        @foreach($procedures as $procedure)
                        <a href="{{$procedure->url}}" target="_blank" class="list-item-body-content">
                            <i class="fa fa-angle-right"></i>
                            <span>
                                <span class="text-bluish" title="{{$procedure->title}}">
                                    {{Str::limit($procedure->title,50)}}
                                </span>
                                <small class="d-block w-100">
                                    {{ $procedure->date_np ? '- '.$procedure->date_np : '' }} 
                                    <span class="text-redish float-right">
                                        {{ $procedure->ministry ? '- '.$procedure->ministry : '' }}
                                    </span>
                                </small>
                            </span>
                        </a>
                        @endforeach
                        <a href="{{route('web.detail.index',['type' => 'procedure'])}}" class="btn btn-sm bg-main-blue btn-hover-main float-right rounded-0">{{ __('language.see-more')}}</a>
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
                {{ __('language.gis_title')}}
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md">
                <iframe src="https://gis.p1.gov.np/iframe" width="100%" height="330" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <div class="col-md">
                <div class="row align-content-stretch">
                    @foreach($isthaniya as $data)
                    <div class="col-md-3 p-0 gis-block-main blue">
                        <div class="text-center py-1">
                            <i class="fa fa-building"></i>
                            <h4 class="text-white m-0">{{$data->metropolitan == null ? '0' : $data->metropolitan }}</h4>
                            <small>{{ __('language.metropolitan')}}</small>
                        </div>
                    </div>  
                    <div class="col-md-3 p-0 gis-block-main green">
                        <div class="text-center py-1">
                            <i class="fa fa-building"></i>
                            <h4 class="text-white m-0">{{$data->sub_metropolitan == null ? '0' : $data->sub_metropolitan }}</h4>
                            <small>{{ __('language.sub_metropolitan')}}</small>
                        </div>
                    </div>
                    <div class="col-md-3 p-0 gis-block-main cadetblue">
                        <div class="text-center py-1">
                            <i class="fa fa-building"></i>
                            <h4 class="text-white m-0">{{$data->municipalities == null ? '0' : $data->municipalities }}</h4>
                            <small>{{ __('language.municipalities')}}</small>
                        </div>
                    </div>
                    <div class="col-md-3 p-0 gis-block-main blue">
                        <div class="text-center py-1">
                            <!-- <i class="fa fa-building"></i> -->
                            <i class="fa fa-tree"></i>
                            <h4 class="text-white m-0">{{$data->forest_area == null ? '0' : $data->forest_area }}</h4>
                            <small>{{ __('language.forest_area')}}</small>
                        </div>
                    </div>
                    <div class="col-md-3 p-0 gis-block-main green">
                        <div class="text-center py-1">
                            <!-- <i class="fa fa-building"></i> -->
                            <i class="fa fa-users"></i>
                            <h4 class="text-white m-0">{{$data->population == null ? '0' : $data->population }}</h4>
                            <small>{{ __('language.population')}}</small>
                        </div>
                    </div>
                    <div class="col-md-3 p-0 gis-block-main cadetblue">
                        <div class="text-center py-1">
                           <i class="fa fa-lightbulb-o" aria-hidden="true"></i>
                            <h4 class="text-white m-0">{{$data->electricity_dev == null ? '0' : $data->electricity_dev }}</h4>
                            <small style="font-size:12px;">{{ __('language.electricity_dev')}}</small>
                        </div>
                    </div>
                    <div class="col-md-3 p-0 gis-block-main yellow">
                        <div class="text-center py-1">
                           <!--  <i class="fa fa-building"></i> -->
                           <i class="fa fa-pagelines"></i>
                            <h4 class="text-white m-0">{{$data->agricultural_land == null ? '0' : $data->agricultural_land }}</h4>
                            <small>{{ __('language.agricultural_land')}} </small>
                        </div>
                    </div>
                    <div class="col-md-3 p-0 gis-block-main green">
                        <div class="text-center py-1">
                            <i class="fa fa-camera"></i>
                            <h4 class="text-white m-0">{{$data->tourists_site == null ? '0' : $data->tourists_site }}</h4>
                            <small>{{ __('language.tourists_site')}}</small>
                        </div>
                    </div>
                    <div class="col-md-3 p-0 gis-block-main yellow">
                        <div class="text-center py-1">
                            <i class="fa fa-building-o" aria-hidden="true"></i>
                            <h4 class="text-white m-0">{{$data->rural_municipalities == null ? '0' : $data->rural_municipalities }}</h4>
                            <small>{{ __('language.rural_municipalities')}}</small>
                        </div>
                    </div>
                    <div class="col-md-3 p-0 gis-block-main silver">
                        <div class="text-center py-1">
                            <i class="fa fa-university" aria-hidden="true"></i>
                            <h4 class="text-white m-0">{{$data->district == null ? '0' : $data->district }}</h4>
                            <small>{{ __('language.district')}}</small>
                        </div>
                    </div>
                    <div class="col-md-3 p-0 gis-block-main green">
                        <div class="text-center py-1">
                            <i class="fa fa-home" aria-hidden="true"></i>
                            <h4 class="text-white m-0">{{$data->wada  == null ? '0' : $data->wada }}</h4>
                            <small>{{ __('language.wada')}} </small>
                        </div>
                    </div>
                    <div class="col-md-3 p-0 gis-block-main silver">
                        <div class="text-center py-1">
                            <i class="fa fa-industry" aria-hidden="true"></i>
                            <h4 class="text-white m-0">{{$data->industries == null ? '0' : $data->industries  }}</h4>
                            <small>{{ __('language.industry')}} </small>
                        </div>
                    </div>
                    @endforeach
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
                {{ __('language.gunaso-title')}}
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <!-- <div class="row align-items-stretch"> -->
        <div class="row">
            <div class="col-md">
                <div class="container-fluid">
                    <h5>{{ __('language.gunaso-sunne')}}</h5>
                    <div class="row align-content-stretch">
                        @foreach($remotehellocm as $key=>$hellocm)
                        {{-- <?php var_dump($hellocm);?> --}}
                        {{-- @foreach($hellocm as $hello) --}}
                        @if($key==0)
                        <div class="col-md-4 p-1  quest-block-main blue ">
                            <div class="text-center">
                                <i class="fa fa-check"></i>
                                <h5 class="text-white m-0">{{$hellocm[1]}}</h5>
                                <small>{{$hellocm[0]}}</small>
                            </div>
                        </div>
                        @elseif($key==1)
                        <div class="col-md-4 p-1  quest-block-main red ">
                            <div class="text-center">
                                <i class="fa fa-spinner"></i>
                                <h5 class="text-white m-0">{{$hellocm[1]}}</h5>
                                <small>{{$hellocm[0]}}</small>
                            </div>
                        </div>
                        @elseif($key==2)
                        <div class="col-md-4 p-1  quest-block-main yellow ">
                            <div class="text-center">
                                <i class="fa fa-eye"></i>
                                <h5 class="text-white m-0">{{$hellocm[1]}}</h5>
                                <small>{{$hellocm[0]}}</small>
                            </div>
                        </div>
                        @elseif($key==3)
                        <div class="col-md-4 p-1  quest-block-main green ">
                            <div class="text-center">
                                <i class="fa fa-eye-slash"></i>
                                <h5 class="text-white m-0">{{$hellocm[1]}}</h5>
                                <small>{{$hellocm[0]}}</small>
                            </div>
                        </div>
                        @elseif($key==4)
                        <div class="col-md-4 p-1  quest-block-main blue ">
                            <div class="text-center">
                                <i class="fa fa-pencil"></i>
                                <h5 class="text-white m-0">{{$hellocm[1]}}</h5>
                                <small>{{$hellocm[0]}}</small>
                            </div>
                        </div>
                        <div class="col-md-4 p-1  quest-block-main purple ">
                            <div class="text-center">
                                <i class="fa fa-info"></i>
                                <h5 class="text-white m-0">{{$hellocm[1]}}</h5>
                                <small>कुल दर्ता गुनासो</small>
                            </div>
                        </div>
                        @endif
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-md bg-white px-2 mx-2" id="barchart_material"></div>
            <div class="col-md bg-white p-1" id="piechart"></div>
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
                            <span class="text-bluish" title="{{$sewaprava->title}}">
                                {{Str::limit($sewaprava->title,50)}}
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
                            <span class="text-bluish" title="{{$farum->title}}">
                                {{Str::limit($farum->title,50)}}
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
                            <span class="text-bluish" title="{{$prativedan->title}}">
                                {{Str::limit($prativedan->title,50)}}
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
                            <span class="text-bluish" title="{{$publication->title}}">
                                {{Str::limit($publication->title,50)}}
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
                {{ __('language.mantralya_scroll_title')}}
            </div>
            <a href="{{route('web.mantralaya.index')}}" class="float-right btn-title-stlye d-flex">
                <i class="fa fa-play"></i>
                {{ __('language.see-more')}}
            </a>
        </div>
    </div>

    <div class="container-fluid">
        <div class="owl-carousel owl-carousel2 owl-theme d-flex">
            @foreach($except_locallevel as $key => $data)
            <div class="item align-self-stretch">
                <a href="{{route('web.mantralaya.detail',$data->id)}}" class="card">
                    <img src="{{ $data->document == null ? asset('images/noimage.png') : asset('images/mantralaya') . '/' . $data->document }}" class="img-fluid card-img-top section-main-2" alt="{{$data->getUserDetail->name}}">
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
        {{-- <div class="mt-3 text-center">
            <a href="{{route('web.mantralaya.index')}}" class="btn credit-btn box-shadow btn-2">View All</a>
        </div> --}}
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
        nav:true,
        autoHeight:true,
        autoplay:true,
        autoplayTimeout:2000,
        autoplayHoverPause:true,
        navText:["<div class='nav-btn prev-slide'></div>","<div class='nav-btn next-slide'></div>"],
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
    });
    // $(".owl-carousel2>.owl-nav.disabled").removeClass("disabled");
</script>
{{-- <script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {

        var data = google.visualization.arrayToDataTable([
            ['Municipalities', 'Sub Metropolitan', 'Municipalities'],

            @php
            foreach($isthaniya as $isthaniyas) {
                echo "['".$isthaniyas->metropolitan."', ".$isthaniyas->sub_metropolitan.", ".$isthaniyas->municipalities."],";
            }
            @endphp
            ]);

        var options = {
            title: 'Pie Charts',
            is3D: false,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));
          // console.log(data, options);
          chart.draw(data, options);
      }
</script> --}}

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
            // ['Task', 'Hours per Day'],
            // ['Work',     11],
            // ['Eat',      2],
            // ['Commute',  2],
            // ['Watch TV', 2],
            // ['Sleep',    7]



            ['Sthaniya', 'Number'],
            @php
            foreach($remotehellocm as $remotehello ) {
                echo "['.$remotehello[0].', ".$remotehello[1]."],";
                // echo "['.$remotehello[0].',  ".($remotehello[1] == 0 ? '2' : $remotehello[1] )."],";

            }
            @endphp

            ]);

        var options = {
          title: 'Pie chart'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
    <script type="text/javascript">

      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([

            // ['','फर्छ्यौट भएको', 'अनुसन्धान गरिदै','हेरिएको','नहेरिएको','जम्मा'],
            @php
              // foreach($isthaniya as $order) {
              //   dd($isthaniya);
              //     echo "['".'0'."','".'0'."',".$order->metropolitan.",".$order->municipalities.", ".$order->rural_municipalities.",".$order->rural_municipalities."],";



              // }
            $arraybar = [];
            $arraybarname = [];
            foreach($remotehellocm as $key => $remotehello) {
                $arraybar[] = $remotehello[1];
                $arraybarname[] = $remotehello[0];
              }
              // dd($arraybar);
              echo "['','$arraybarname[0]','$arraybarname[1]', '$arraybarname[2]','$arraybarname[3]','$arraybarname[4]'],";
              echo "['bar',".$arraybar[0].",".$arraybar[1].", ".$arraybar[2].",".$arraybar[3].",".$arraybar[4]."],";
            @endphp
        ]);

        var options = {
          chart: {
            title: 'Bar Graph',
            // subtitle: 'Municipalities, and Sub Municipalities',
          },
          bars: 'vertical'
        };
        var chart = new google.charts.Bar(document.getElementById('barchart_material'));
        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>



@endpush