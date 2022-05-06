@extends('web.layouts.app')
@push('tab_title')
Contact-Us | 
@endpush
@push('css')
<style type="text/css">
  iframe{
    width: 100%;
  }
</style>
@endpush
@section('content')
<nav class="breadcrumb-main mt-4">
  <div class="container">
    <ol class="breadcrumb bg-light align-content-center">
      <li class="breadcrumb-item my-auto">
        <a href="{{ route('web.home') }}">
          <i class="fa fa-home fa-2x"></i>
        </a>
      </li>
      <li class="breadcrumb-item my-auto">
        <a href="#">
          {{ __('language.Contact-us')}}
        </a>
      </li>
    </ol>
  </div>
</nav>
<section class="breadcrumb-main my-4">
  <div class="container">
    @foreach($datas as $data)
    <div class="row">
      <div class="col-md-6">
        {!! $data->iframe !!}
      </div>
      <div class="col-md-6">
        <div class="section-heading wow fadeInUp" data-wow-delay="100ms">
          <h2> {{ __('language.Contact-us')}}</h2>
          <div class="line"></div>
        </div>
        <div class="single-contact-content d-flex align-items-center mb-4">
            <div class="mr-3 icon-font">
                <i class="fa fa-map-marker"></i>
            </div>
            <div class="text">
               {{$data->address}}
            </div>
        </div>
        <div class="single-contact-content d-flex align-items-center mb-4">
            <div class="mr-3 icon-font">
                <i class="fa fa-envelope-o"></i>
            </div>
            <div class="text">
               {{$data->email}}
            </div>
        </div>
        <div class="single-contact-content d-flex align-items-center mb-4">
            <div class="mr-3 icon-font">
                <i class="fa fa-phone"></i>
            </div>
            <div class="text">
               {{$data->phone}}
            </div>
        </div>
        <div class="template-demo text-center text-md-left"> 
            <a href="//{{$data->facebook}}" class="btn btn-social-icon btn-facebook btn-rounded" target="_blank">
                <i class="fa fa-facebook"></i>
            </a> 
            <a href="//{{$data->youtube}}" class="btn btn-social-icon btn-youtube btn-rounded" target="_blank">
                <i class="fa fa-youtube"></i>
            </a> 
            <a href="//{{$data->twitter}}" class="btn btn-social-icon btn-twitter btn-rounded" target="_blank">
                <i class="fa fa-twitter"></i>
            </a> 
        </div>
      </div>
    </div>
    @endforeach
  </div>
</section>
@endsection
@push('js')
@endpush