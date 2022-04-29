<div class="items">
  <div class="items-body">
    @foreach($left_menu as $key => $data)
    @if($data->link_type == 0)
    <a href="{{ route('web.home.sidelink',$data->link) }}" class="items-body-content">
      <span>
        <i class="fa fa-briefcase mr-2"></i>
        @if(app()->getLocale() == 'en')
        {{$data->name}}
        @else
        {{$data->name_np}}
        @endif
      </span>
    </a>
    @else
    <a href="{{ $data->link }}" class="items-body-content" target="_blank">
      <span>
        <i class="fa fa-briefcase mr-2"></i>
        @if(app()->getLocale() == 'en')
        {{$data->name}}
        @else
        {{$data->name_np}}
        @endif
      </span>
    </a>
    @endif
    @endforeach
  </div>
</div>