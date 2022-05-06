<div class="header-holder p-0">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-10 col-sm-10 notice-block">
        <div class="position-relative">
            <div class="row">
              <div class="col-md-1 flash-box">
                <p class="title text-white">{{ __('language.notice')}}</p>
              </div>
              <div class="col-md-11">
                <div class="marquee overflow-hidden">
                  <ul class="list-inline m-0">
                    @foreach($notice as $notices)
                    <li class="list-inline-item mr-4">
                      <small><i class="fa fa-bullhorn mr-2 text-warning"></i></small>
                      <a class="text-light" href="{{ route('web.noticescroll',$notices->id)}}">
                       {{$notices->title}} :: {{$notices->description}}
                     </a>
                   </li>
                   @endforeach
                 </ul>
                </div>
              </div>
            </div>
        </div>
      </div>
      <div class="col-md-2 col-sm-2 d-flex main-d-sm-none top-header p-0">
        <ul class="list-unstyled pl-2">
          <li class="list-inline-item">
            <a href="{{ route('web.LangChange','en') }}" class="text-light lang" id="en">
              En
            </a>
          </li>
          <li  class="list-inline-item">
            <a href="{{ route('web.LangChange','ne') }}" class="text-light lang" id="ne">
              Ne
            </a>
          </li>
        </ul>
        <div class="d-flex px-2"> 
            <a href="" class="btn btn-sm btn-social-icon btn-facebook rounded-0 ">
                <i class="fa fa-facebook"></i>
            </a> 
            <a href="" class="btn btn-sm btn-social-icon btn-youtube rounded-0 ">
                <i class="fa fa-youtube"></i>
            </a> 
            <a href="" class="btn btn-sm btn-social-icon btn-twitter rounded-0 ">
                <i class="fa fa-twitter"></i>
            </a> {{-- 
            <a href="" class="btn btn-sm btn-social-icon btn-linkedin rounded-0 ">
                <i class="fa fa-linkedin"></i>
            </a>  --}}
            <a href="" class="btn btn-sm btn-social-icon btn-instagram rounded-0 ">
                <i class="fa fa-instagram"></i>
            </a> 
        </div>
        
      </div>
    </div>
  </div>
</div>
@push('js')
<script type="text/javascript">
  $('.marquee').marquee({
    duration: 15000,
    gap: 30,
    delayBeforeStart: 0,
    direction: 'left',
    duplicated: true,
    pauseOnHover: true,
    delayBeforeStart: 0,
  });
</script>
@endpush