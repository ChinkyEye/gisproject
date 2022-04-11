@extends('web.layouts.app')
@section('content')
@include('web.layouts.slider')
{{-- section 1 --}}
<section class="features-area py-5 bg-gray">
    <div class="container-fluid">
        <div class="row">
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
            </div>
        </div>
        {{-- <div class=" text-center">
            <a href="#" class="btn credit-btn box-shadow btn-2">See More</a>
        </div> --}}
    </div>
</section>
{{-- end section 1 --}}
{{-- section 2 --}}
<section class="features-area py-5">
    <div class="container-fluid">
        <div class="owl-carousel owl-carousel2 owl-theme">
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
        </div>
        {{-- <div class=" text-center">
            <a href="#" class="btn credit-btn box-shadow btn-2">See More</a>
        </div> --}}
    </div>
</section>
{{-- <section class="features-area section-padding-100-0">
    <div class="container">
        <div class="row align-items-end">
            <div class="col-12 col-sm-6 col-lg-3">
                <div class="single-features-area mb-100 wow fadeInUp" data-wow-delay="100ms">
                    <div class="section-heading">
                        <div class="line"></div>
                        <p>We are</p>
                        <h2>प्रदेश परिचय</h2>
                    </div>
                    <h6>
                        {!! substr('
                            <p>हिमाल, पहाड र तराईसम्म फैलिएको यस प्रदेश नं. १ मा झापा, इलाम, पाँचथर, ताप्लेजुङ, संखुवासभा, तेह्रथुम, भोजपुर, धनकुटा, खोटाङ, सुनसरी, मोरङ, सोलुखुम्बु, ओखलढुङ्गा र उदयपुर गरी जम्मा १४ वटा जिल्ला पर्दछन् । यस प्रदेशको पूर्वतर्फ भारतको पश्चिम बङ्गाल राज्य र दक्षिणतर्फ बिहार राज्य पर्दछन् । यसै गरी उत्तरतर्फ चीनको स्वशासित क्षेत्र तिब्बत र पश्चिमतर्फ प्रदेश नं. २ र प्रदेश नं. ३ पर्दछन् । यो प्रदेश ८६ डिग्री १ मिनेटदेखि ८८ डिग्री ३ मिनेट पूर्वी देशान्तर र २८ डिग्री २ मिनेटदेखि २६ डिग्री ३ मिनेट उत्तर देशान्तरको बीचमा रहेको छ । यस प्रदेशको कूल क्षेत्रफल २५९०५ वर्ग कि. मि. तथा कूल जनसङ्ख्या ४५३४९४३ रहेको छ ।</p>

                            <p>जातीय तथा भाषिक विविधता रहेको यस प्रदेशमा मुख्य रुपमा ब्राम्हण, क्षेत्री, राई, लिम्बू, थारू, लेप्चा, मुस्लिम, तामाङ, गुरुङ, मेचे, कोचे, यादव, राजवंशीलगायतका जातिहरूको बसोबास रहेको छ भने नेपाली, मैथिली, किराँती, तामाङ, लिम्बू, गुरुङ, लेप्चा, मुस्लिम, मगर र थारू भाषा मुख्य रुपमा बोलिन्छन् । विश्वकै सर्वाेच्च शिखर सगरमाथालगायत कञ्चनजङ्घा, मकालु, चोयु, ल्होत्से, जन्नु आदि हिमालहरूको अवस्थितिले मित्रराष्ट्र चीनसँग प्राकृतिक सीमाको काम गरेको छ ।</p>'
                            ,0,300) !!}
                        </h6>
                    <a href="#" class="btn credit-btn mt-50">Discover</a>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-lg-3">
                <div class="single-features-area mb-100 wow fadeInUp" data-wow-delay="300ms">
                    <img src="{{ url('/web') }}/img/bg-img/2.jpg" alt="">
                    <h5>We take care of you</h5>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-lg-3">
                <div class="single-features-area mb-100 wow fadeInUp" data-wow-delay="500ms">
                    <img src="{{ url('/web') }}/img/bg-img/3.jpg" alt="">
                    <h5>No documents needed</h5>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-lg-3">
                <div class="single-features-area mb-100 wow fadeInUp" data-wow-delay="700ms">
                    <img src="{{ url('/web') }}/img/bg-img/4.jpg" alt="">
                    <h5>Fast &amp; easy loans</h5>
                </div>
            </div>
        </div>
    </div>
</section> --}}
{{-- section 2 end --}}

{{-- section 3 --}}
<section class="cta-area d-flex flex-wrap">
    <!-- Cta Thumbnail -->
    <div class="cta-thumbnail bg-img jarallax" style="background-image: url({{ url('/web') }}/img/bg-img/5.jpg);"></div>

    <!-- Cta Content -->
    <div class="cta-content bg-gray">
        <!-- Section Heading -->
        <div class="section-heading ">
            <div class="line"></div>
            <p>Title</p>
            <h2>प्रदेश परिचय</h2>
        </div>
        <div class="">
            
            {!! substr('
            <p>हिमाल, पहाड र तराईसम्म फैलिएको यस प्रदेश नं. १ मा झापा, इलाम, पाँचथर, ताप्लेजुङ, संखुवासभा, तेह्रथुम, भोजपुर, धनकुटा, खोटाङ, सुनसरी, मोरङ, सोलुखुम्बु, ओखलढुङ्गा र उदयपुर गरी जम्मा १४ वटा जिल्ला पर्दछन् । यस प्रदेशको पूर्वतर्फ भारतको पश्चिम बङ्गाल राज्य र दक्षिणतर्फ बिहार राज्य पर्दछन् । यसै गरी उत्तरतर्फ चीनको स्वशासित क्षेत्र तिब्बत र पश्चिमतर्फ प्रदेश नं. २ र प्रदेश नं. ३ पर्दछन् । यो प्रदेश ८६ डिग्री १ मिनेटदेखि ८८ डिग्री ३ मिनेट पूर्वी देशान्तर र २८ डिग्री २ मिनेटदेखि २६ डिग्री ३ मिनेट उत्तर देशान्तरको बीचमा रहेको छ । यस प्रदेशको कूल क्षेत्रफल २५९०५ वर्ग कि. मि. तथा कूल जनसङ्ख्या ४५३४९४३ रहेको छ ।</p>

            <p>जातीय तथा भाषिक विविधता रहेको यस प्रदेशमा मुख्य रुपमा ब्राम्हण, क्षेत्री, राई, लिम्बू, थारू, लेप्चा, मुस्लिम, तामाङ, गुरुङ, मेचे, कोचे, यादव, राजवंशीलगायतका जातिहरूको बसोबास रहेको छ भने नेपाली, मैथिली, किराँती, तामाङ, लिम्बू, गुरुङ, लेप्चा, मुस्लिम, मगर र थारू भाषा मुख्य रुपमा बोलिन्छन् । विश्वकै सर्वाेच्च शिखर सगरमाथालगायत कञ्चनजङ्घा, मकालु, चोयु, ल्होत्से, जन्नु आदि हिमालहरूको अवस्थितिले मित्रराष्ट्र चीनसँग प्राकृतिक सीमाको काम गरेको छ ।</p>'
            ,0,1200) !!}
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
                        <a href="#" class="btn credit-btn box-shadow">Contact</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
{{-- end section 4 --}}

{{-- section 5 --}}
<section class="services-area section-padding-100-0">
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
</section>
{{-- end section 5 --}}

{{-- section 6 --}}
<section class="services-area bg-gray py-5">
    <div class="container-fluid px-5">
        <div class="row">
            <div class="col-md-3">
                    <div class="list-item">
                        <div class="list-item-head">
                          <p>सूचना/जानकारी</p>
                        </div>
                      
                      <div class="list-item-body">
                        @foreach($remote_notices as $remote_notice)
                        <div class="list-item-body-content">
                            <a href="">
                                <i class="fa fa-angle-right"></i>
                                <span>
                                    <span class="text-bluish">{{$remote_notice->title}}</span>
                                    <small class="d-block w-100">- {{$remote_notice->created_at_np}} <span class="text-redish float-right">- {{$remote_notice->server}}</span></small>
                                </span>
                            </a>    
                        </div>
                        @endforeach
                    <a href="{{route('web.detail.index',['type' => 'suchana'])}}" class="btn btn-sm bg-main-blue btn-hover-main float-right rounded-0">See more</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="list-item">
                    <div class="list-item-head">
                        <p>बार्षिक बजेट / कार्यक्रम</p>
                    </div>

                    <div class="list-item-body">
                        @foreach($remote_yearly_budgets as $budget)
                        <div class="list-item-body-content">
                            <a href="">
                                <i class="fa fa-angle-right"></i>
                                <span>
                                    <span class="text-bluish">{{$budget->title}}</span>
                                    <small class="d-block w-100">- {{$budget->created_at_np}} <span class="text-redish float-right">- {{$budget->server}}</span></small>
                                </span>
                            </a>    
                        </div>
                        @endforeach
                    <a href="{{route('web.detail.index',['type' => 'yearly-budget'])}}" class="btn btn-sm bg-main-blue btn-hover-main float-right rounded-0">See more</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="list-item">
                    <div class="list-item-head">
                        <p>सार्वजनिक खरिद/बोलपत्र</p>
                    </div>

                    <div class="list-item-body">
                        <div class="list-item-body-content">
                            <i class="fa fa-angle-right"></i>
                            <span>
                                <span class="text-bluish">List Title here</span>
                                <small class="d-block w-100">- 2078-12-25 <span class="text-redish float-right">- Sumit Pradhan</span></small>
                            </span>
                        </div>
                        <div class="list-item-body-content">
                            <i class="fa fa-angle-right"></i>
                            <span>
                                <span class="text-bluish">List Title here</span>
                                <small class="d-block w-100">- 2078-12-25 <span class="text-redish float-right">- Sumit Pradhan</span></small>
                            </span>
                        </div>
                        <div class="list-item-body-content">
                            <i class="fa fa-angle-right"></i>
                            <span>
                                <span class="text-bluish">List Title here</span>
                                <small class="d-block w-100">- 2078-12-25 <span class="text-redish float-right">- Sumit Pradhan</span></small>
                            </span>
                        </div>
                        <div class="list-item-body-content">
                            <i class="fa fa-angle-right"></i>
                            <span>
                                <span class="text-bluish">List Title here</span>
                                <small class="d-block w-100">- 2078-12-25 <span class="text-redish float-right">- Sumit Pradhan</span></small>
                            </span>
                        </div>
                    <a href="" class="btn btn-sm bg-main-blue btn-hover-main float-right rounded-0">See more</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="list-item">
                    <div class="list-item-head">
                        <p>ऐन/कानून संग्रह</p>
                    </div>

                    <div class="list-item-body">
                        <div class="list-item-body-content">
                            <i class="fa fa-angle-right"></i>
                            <span>
                                <span class="text-bluish">List Title here</span>
                                <small class="d-block w-100">- 2078-12-25 <span class="text-redish float-right">- Sumit Pradhan</span></small>
                            </span>
                        </div>
                        <div class="list-item-body-content">
                            <i class="fa fa-angle-right"></i>
                            <span>
                                <span class="text-bluish">List Title here</span>
                                <small class="d-block w-100">- 2078-12-25 <span class="text-redish float-right">- Sumit Pradhan</span></small>
                            </span>
                        </div>
                        <div class="list-item-body-content">
                            <i class="fa fa-angle-right"></i>
                            <span>
                                <span class="text-bluish">List Title here</span>
                                <small class="d-block w-100">- 2078-12-25 <span class="text-redish float-right">- Sumit Pradhan</span></small>
                            </span>
                        </div>
                        <div class="list-item-body-content">
                            <i class="fa fa-angle-right"></i>
                            <span>
                                <span class="text-bluish">List Title here</span>
                                <small class="d-block w-100">- 2078-12-25 <span class="text-redish float-right">- Sumit Pradhan</span></small>
                            </span>
                        </div>
                    <a href="" class="btn btn-sm bg-main-blue btn-hover-main float-right rounded-0">See more</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
{{--  --}}
<section class="miscellaneous-area section-padding-100-0">
    <div class="container-fluid px-5">
        <div class="row">
            <div class="col-md-3">
                    <div class="list-item">
                        <div class="list-item-head">
                          <p>सेवा प्रवाह </p>
                      </div>
                      
                      <div class="list-item-body">
                        <div class="list-item-body-content">
                            <i class="fa fa-angle-right"></i>
                            <span>
                                <span class="text-bluish">List Title here</span>
                                <small class="d-block w-100">- 2078-12-25 <span class="text-redish float-right">- Sumit Pradhan</span></small>
                            </span>
                        </div>
                        <div class="list-item-body-content">
                            <i class="fa fa-angle-right"></i>
                            <span>
                                <span class="text-bluish">List Title here</span>
                                <small class="d-block w-100">- 2078-12-25 <span class="text-redish float-right">- Sumit Pradhan</span></small>
                            </span>
                        </div>
                        <div class="list-item-body-content">
                            <i class="fa fa-angle-right"></i>
                            <span>
                                <span class="text-bluish">List Title here</span>
                                <small class="d-block w-100">- 2078-12-25 <span class="text-redish float-right">- Sumit Pradhan</span></small>
                            </span>
                        </div>
                        <div class="list-item-body-content">
                            <i class="fa fa-angle-right"></i>
                            <span>
                                <span class="text-bluish">List Title here</span>
                                <small class="d-block w-100">- 2078-12-25 <span class="text-redish float-right">- Sumit Pradhan</span></small>
                            </span>
                        </div>
                    <a href="" class="btn btn-sm bg-main-blue btn-hover-main float-right rounded-0">See more</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="list-item">
                    <div class="list-item-head">
                        <p>इ-फारम </p>
                    </div>

                    <div class="list-item-body">
                        <div class="list-item-body-content">
                            <i class="fa fa-angle-right"></i>
                            <span>
                                <span class="text-bluish">List Title here</span>
                                <small class="d-block w-100">- 2078-12-25 <span class="text-redish float-right">- Sumit Pradhan</span></small>
                            </span>
                        </div>
                        <div class="list-item-body-content">
                            <i class="fa fa-angle-right"></i>
                            <span>
                                <span class="text-bluish">List Title here</span>
                                <small class="d-block w-100">- 2078-12-25 <span class="text-redish float-right">- Sumit Pradhan</span></small>
                            </span>
                        </div>
                        <div class="list-item-body-content">
                            <i class="fa fa-angle-right"></i>
                            <span>
                                <span class="text-bluish">List Title here</span>
                                <small class="d-block w-100">- 2078-12-25 <span class="text-redish float-right">- Sumit Pradhan</span></small>
                            </span>
                        </div>
                        <div class="list-item-body-content">
                            <i class="fa fa-angle-right"></i>
                            <span>
                                <span class="text-bluish">List Title here</span>
                                <small class="d-block w-100">- 2078-12-25 <span class="text-redish float-right">- Sumit Pradhan</span></small>
                            </span>
                        </div>
                    <a href="" class="btn btn-sm bg-main-blue btn-hover-main float-right rounded-0">See more</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="list-item">
                    <div class="list-item-head">
                        <p>प्रतिवेदन/रिपोर्ट </p>
                    </div>

                    <div class="list-item-body">
                        <div class="list-item-body-content">
                            <i class="fa fa-angle-right"></i>
                            <span>
                                <span class="text-bluish">List Title here</span>
                                <small class="d-block w-100">- 2078-12-25 <span class="text-redish float-right">- Sumit Pradhan</span></small>
                            </span>
                        </div>
                        <div class="list-item-body-content">
                            <i class="fa fa-angle-right"></i>
                            <span>
                                <span class="text-bluish">List Title here</span>
                                <small class="d-block w-100">- 2078-12-25 <span class="text-redish float-right">- Sumit Pradhan</span></small>
                            </span>
                        </div>
                        <div class="list-item-body-content">
                            <i class="fa fa-angle-right"></i>
                            <span>
                                <span class="text-bluish">List Title here</span>
                                <small class="d-block w-100">- 2078-12-25 <span class="text-redish float-right">- Sumit Pradhan</span></small>
                            </span>
                        </div>
                        <div class="list-item-body-content">
                            <i class="fa fa-angle-right"></i>
                            <span>
                                <span class="text-bluish">List Title here</span>
                                <small class="d-block w-100">- 2078-12-25 <span class="text-redish float-right">- Sumit Pradhan</span></small>
                            </span>
                        </div>
                    <a href="" class="btn btn-sm bg-main-blue btn-hover-main float-right rounded-0">See more</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="list-item">
                    <div class="list-item-head">
                        <p>सूचना/जानकारी </p>
                    </div>

                    <div class="list-item-body">
                        <div class="list-item-body-content">
                            <i class="fa fa-angle-right"></i>
                            <span>
                                <span class="text-bluish">List Title here</span>
                                <small class="d-block w-100">- 2078-12-25 <span class="text-redish float-right">- Sumit Pradhan</span></small>
                            </span>
                        </div>
                        <div class="list-item-body-content">
                            <i class="fa fa-angle-right"></i>
                            <span>
                                <span class="text-bluish">List Title here</span>
                                <small class="d-block w-100">- 2078-12-25 <span class="text-redish float-right">- Sumit Pradhan</span></small>
                            </span>
                        </div>
                        <div class="list-item-body-content">
                            <i class="fa fa-angle-right"></i>
                            <span>
                                <span class="text-bluish">List Title here</span>
                                <small class="d-block w-100">- 2078-12-25 <span class="text-redish float-right">- Sumit Pradhan</span></small>
                            </span>
                        </div>
                        <div class="list-item-body-content">
                            <i class="fa fa-angle-right"></i>
                            <span>
                                <span class="text-bluish">List Title here</span>
                                <small class="d-block w-100">- 2078-12-25 <span class="text-redish float-right">- Sumit Pradhan</span></small>
                            </span>
                        </div>
                    <a href="" class="btn btn-sm bg-main-blue btn-hover-main float-right rounded-0">See more</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
{{-- <section class="miscellaneous-area section-padding-100-0">
    <div class="sheader">
        <div class="container py-4">
            <div class="row">
                <div class="col-md-3">
                    <div class="nav flex-column nav-pills nav-pills-custom" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <a class="nav-link mb-3 p-3 shadow active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">
                            <i class="fa fa-user-circle-o mr-2"></i>
                            <span class="font-weight-bold small text-uppercase">सूचना/जानकारी </span></a>

                        <a class="nav-link mb-3 p-3 shadow" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">
                            <i class="fa fa-calendar-minus-o mr-2"></i>
                            <span class="font-weight-bold small text-uppercase">बार्षिक बजेट / कार्यक्रम</span></a>

                        <a class="nav-link mb-3 p-3 shadow" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">
                            <i class="fa fa-star mr-2"></i>
                            <span class="font-weight-bold small text-uppercase">सार्वजनिक खरिद/बोलपत्र </span></a>

                        <a class="nav-link mb-3 p-3 shadow" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">
                            <i class="fa fa-check mr-2"></i>
                            <span class="font-weight-bold small text-uppercase">ऐन/कानून संग्रह </span></a>
                        </div>
                </div>


                <div class="col-md-9">
                    <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade shadow rounded bg-white show active p-5" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                            <h4 class="font-italic mb-4">सूचना/जानकारी </h4>
                            <ul class="list-group list-group-flush">
                              <li class="list-group-item">An item</li>
                              <li class="list-group-item">A second item</li>
                              <li class="list-group-item">A third item</li>
                              <li class="list-group-item">A fourth item</li>
                              <li class="list-group-item">And a fifth one</li>
                            </ul>
                        </div>
                        
                        <div class="tab-pane fade shadow rounded bg-white p-5" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                            <h4 class="font-italic mb-4">बार्षिक बजेट / कार्यक्रम</h4>
                            <p class="font-italic text-muted mb-2">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                        </div>
                        
                        <div class="tab-pane fade shadow rounded bg-white p-5" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                            <h4 class="font-italic mb-4">सार्वजनिक खरिद/बोलपत्र </h4>
                            <p class="font-italic text-muted mb-2">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                        </div>
                        
                        <div class="tab-pane fade shadow rounded bg-white p-5" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                            <h4 class="font-italic mb-4">ऐन/कानून संग्रह </h4>
                            <p class="font-italic text-muted mb-2">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> --}}
{{-- <section class="miscellaneous-area bg-gray section-padding-100-0">
    <div class="container">
        <div class="row align-items-end justify-content-center">
            <div class="col-12 col-md-6 col-lg-4">
                <div class="add-area mb-100 wow fadeInUp" data-wow-delay="100ms">
                    <a href="#"><img src="{{ url('/web') }}/img/bg-img/add.png" alt=""></a>
                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-4">
                <div class="contact--area mb-100 wow fadeInUp" data-wow-delay="300ms">
                    <div class="section-heading mb-50">
                        <div class="line"></div>
                        <h2>Get in touch</h2>
                    </div>
                    <div class="contact-content">
                        <div class="single-contact-content d-flex align-items-center">
                            <div class="icon">
                                <img src="{{ url('/web') }}/img/core-img/location.png" alt="">
                            </div>
                            <div class="text">
                                <p>3007 Sarah Drive <br> Franklin, LA 70538</p>
                            </div>
                        </div>
                        <div class="single-contact-content d-flex align-items-center">
                            <div class="icon">
                                <img src="{{ url('/web') }}/img/core-img/call.png" alt="">
                            </div>
                            <div class="text">
                                <p>337-413-9538</p>
                                <span>mon-fri , 08.am - 17.pm</span>
                            </div>
                        </div>
                        <div class="single-contact-content d-flex align-items-center">
                            <div class="icon">
                                <img src="{{ url('/web') }}/img/core-img/message2.png" alt="">
                            </div>
                            <div class="text">
                                <p>contact@yourbusiness.com</p>
                                <span>we reply in 24 hrs</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-4">
                <div class="news--area mb-100 wow fadeInUp" data-wow-delay="500ms">
                    <div class="section-heading mb-50">
                        <div class="line"></div>
                        <h2>The news</h2>
                    </div>

                    <div class="single-news-area d-flex align-items-center">
                        <div class="news-thumbnail">
                            <img src="{{ url('/web') }}/img/bg-img/10.jpg" alt="">
                        </div>
                        <div class="news-content">
                            <span>July 18, 2018</span>
                            <a href="#">How to get the best loan online</a>
                            <div class="news-meta">
                                <a href="#" class="post-author"><img src="{{ url('/web') }}/img/core-img/pencil.png" alt=""> Jane Smith</a>
                                <a href="#" class="post-date"><img src="{{ url('/web') }}/img/core-img/calendar.png" alt=""> April 26</a>
                            </div>
                        </div>
                    </div>

                    <div class="single-news-area d-flex align-items-center">
                        <div class="news-thumbnail">
                            <img src="{{ url('/web') }}/img/bg-img/11.jpg" alt="">
                        </div>
                        <div class="news-content">
                            <span>July 18, 2018</span>
                            <a href="#">A new way to finance your dream home</a>
                            <div class="news-meta">
                                <a href="#" class="post-author"><img src="{{ url('/web') }}/img/core-img/pencil.png" alt=""> Jane Smith</a>
                                <a href="#" class="post-date"><img src="{{ url('/web') }}/img/core-img/calendar.png" alt=""> April 26</a>
                            </div>
                        </div>
                    </div>

                    <!-- Single News Area -->
                    <div class="single-news-area d-flex align-items-center">
                        <div class="news-thumbnail">
                            <img src="{{ url('/web') }}/img/bg-img/12.jpg" alt="">
                        </div>
                        <div class="news-content">
                            <span>July 18, 2018</span>
                            <a href="#">10 tips to get the best loan for you</a>
                            <div class="news-meta">
                                <a href="#" class="post-author"><img src="{{ url('/web') }}/img/core-img/pencil.png" alt=""> Jane Smith</a>
                                <a href="#" class="post-date"><img src="{{ url('/web') }}/img/core-img/calendar.png" alt=""> April 26</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> --}}
{{-- end section 5 --}}

{{-- section 6 --}}
{{-- <section class="newsletter-area section-padding-100 bg-img jarallax" style="background-image: url({{ url('/web') }}/img/bg-img/6.jpg);">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-sm-10 col-lg-8">
                <div class="nl-content text-center">
                    <h2>Subscribe to our newsletter</h2>
                    <form action="#" method="post">
                        <input type="email" name="nl-email" id="nlemail" placeholder="Your e-mail">
                        <button type="submit">Subscribe</button>
                    </form>
                    <p>Curabitur elit turpis, maximus quis ullamcorper sed, maximus eu neque. Cras ultrices erat nec auctor blandit.</p>
                </div>
            </div>
        </div>
    </div>
</section> --}}
{{-- end section 6 --}}
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