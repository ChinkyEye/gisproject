<div class="items">
  <div class="items-body">
    @foreach($left_menu as $key => $data)
    @if($data->link_type == 0)
    <a href="{{ route('web.home.sidelink',$data->link) }}" class="items-body-content">
      <span>
        @if($key == 0)
        <i class="fa fa-briefcase mr-2"></i>
        @elseif($key == 1)
        <i class="fa fa-users mr-2"></i>    
        @elseif($key == 2)
        <i class="fa fa-building-columns mr-2"></i>
        @elseif($key == 3)
        <i class="fa fa-building mr-2"></i>
        @elseif($key == 4)
        <i class="fa fa-user-circle mr-2"></i>
        @elseif($key == 6)
        <i class="fa fa-cog mr-2"></i> 
        @elseif($key == 7)
        <i class="fa fa-user mr-2"></i>
        @elseif($key == 9)
        <i class="fa fa-globe mr-2"></i>
        @else
        <i class="fa fa-briefcase mr-2"></i>
        @endif
        {{-- आयोग --}}
        @if(app()->getLocale() == 'en')
        {{$data->name}}
        @else
        {{$data->name_np}}
        @endif
        <i class="float-right fa fa-caret-right mr-2"></i>
        {{-- @if(app()->getLocale() == 'en')
        {{$data->name}}
        @else
        {{$data->name_np}}
        @endif --}}
      </span>
    </a>
    @else
    <a href="{{ $data->link }}" class="items-body-content" target="_blank">
      <span>
        @if($key == 8)
        <i class="fa fa-map-marker mr-2"></i>
        @elseif($key == 5)
        <i class="fa fa-university mr-2"></i>
        @endif
        {{-- <i class="fa fa-briefcase mr-2"></i> --}}
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