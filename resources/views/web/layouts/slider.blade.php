{{-- <div class="container"> --}}
    <div class="row mx-0">
        <div class="col-md-3 px-0">
            @include('web.layouts.left-menu')
        </div>
        <div class="col-md-6 px-0">
            <div class="hero-area">
                <div class="hero-slideshow owl-carousel">
                    <div class="single-slide bg-img">
                        <div class="slide-bg-img bg-img bg-overlay" style="background-image: url({{ url('/web') }}/img/slider.jpg);"></div>
                        <div class="container h-100">
                            <div class="row h-100 align-items-center justify-content-center">
                                <div class="col-12 col-lg-9">
                                    <div class="welcome-text text-center">
                                        {{-- <h6 data-animation="fadeInUp" data-delay="100ms">2 years interest</h6> --}}
                                        <h2 data-animation="fadeInUp" data-delay="300ms">विश्वको सर्वोच्च  <span>शिखर सगरमाथा</span></h2>
                                        {{-- <p data-animation="fadeInUp" data-delay="500ms">विश्वको सर्वोच्च शिखर सगरमाथा</p> --}}
                                        {{-- <a href="#" class="btn credit-btn mt-50" data-animation="fadeInUp" data-delay="700ms">Discover</a> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="slide-du-indicator"></div>
                    </div>

                    <!-- Single Slide -->
                    <div class="single-slide bg-img">
                        <div class="slide-bg-img bg-img bg-overlay" style="background-image: url({{ url('/web') }}/img/slider1.jpg);"></div>
                        <div class="container h-100">
                            <div class="row h-100 align-items-center justify-content-center">
                                <div class="col-12 col-lg-9">
                                    <div class="welcome-text text-center">
                                        {{-- <h6 data-animation="fadeInDown" data-delay="100ms">2 years interest</h6> --}}
                                        <h2 data-animation="fadeInDown" data-delay="300ms">मनमोहक पर्यटकिय <span>गन्तव्य इलाम</span> </h2>
                                        {{-- <p data-animation="fadeInDown" data-delay="500ms">मनमोहक पर्यटकिय गन्तव्य इलाम</p> --}}
                                        {{-- <a href="#" class="btn credit-btn mt-50" data-animation="fadeInDown" data-delay="700ms">Discover</a> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="slide-du-indicator"></div>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-md">
            <div class="profile-main text-center">
                <div class="border-0 my-4">
                  <img src="{{ url('/') }}/web/img/mantri.jpg" class="card-img-top main-card-img text-center" alt="...">
                  <div class="card-body px-0 py-1">
                    <h5 class="card-title my-2">मा. राजेन्द्र कुमार राई</h5>
                    <p class="card-text">मुख्यमन्त्री</p>
                    <div class="template-demo text-center"> 
                        <a href="" class="btn btn-social-icon btn-facebook btn-rounded">
                            <i class="fa fa-facebook"></i>
                        </a> 
                        <a href="" class="btn btn-social-icon btn-twitter btn-rounded">
                            <i class="fa fa-twitter"></i>
                        </a> 
                        <a href="" class="btn btn-social-icon btn-linkedin btn-rounded">
                            <i class="fa fa-linkedin"></i>
                        </a> 
                        <a href="" class="btn btn-social-icon btn-instagram btn-rounded">
                            <i class="fa fa-instagram"></i>
                        </a> 
                    </div>
                  </div>
                </div>
                {{-- <div class="border-0 text-center">
                  <img src="{{ url('/') }}/web/img/mantri.jpg" class="card-img-top main-card-img text-center" alt="...">
                  <div class="card-body px-0 py-1">
                    <h5 class="card-title my-0">मा. राजेन्द्र कुमार राई</h5>
                    <p class="card-text">मुख्यमन्त्री</p>
                  </div>
                </div> --}}
                
            </div>
        </div>
    </div>
{{-- </div> --}}