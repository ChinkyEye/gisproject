<div class="items">
  <div class="items-body">
    @foreach($left_menu as $key => $data)
    @if($data->link_type == 0)
    <a href="{{ route('web.home.sidelink',$data->link) }}" class="items-body-content">
      <span>{{$data->name}}</span>
    </a>
    @else
    <a href="{{ $data->link }}" class="items-body-content" target="_blank">
      <span>{{$data->name}}</span>
    </a>
    @endif
    @endforeach
  </div>
</div>