@extends('superadmin.main.app')
@push('style')
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" rel="stylesheet"/>
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <style>
    #draggable { 
        width: 150px;
        height: 150px;
        padding: 0.5em;
    }
  </style>
@endpush
@section('content')
<?php $page = substr((Route::currentRouteName()), 11, strpos(str_replace('superadmin.','',Route::currentRouteName()), ".")); ?>
<div class="container">
  <div class="row">
    <div class="col-md-12">
        <h2 class="text-center pb-3 pt-1">Learning drag and dropable - CodeCheef</h2>
        <div class="row">
            <div class="col-md-5 p-3  offset-md-1">
                <ul class="list-group shadow-lg connectedSortable" id="padding-item-drop">
                  @if(!empty($menuhasdropdowns) && $menuhasdropdowns->count())
                    @foreach($menuhasdropdowns as $key => $value)
                      <li class="list-group-item" item-id="{{ $value->id }}">{{ $value->name }}</li>
                    @endforeach
                  @endif
                </ul>
            </div>
            {{-- <div class="col-md-5 p-3  offset-md-1 shadow-lg complete-item">
                <ul class="list-group  connectedSortable" id="complete-item-drop">
                  @if(!empty($menuhasdropdowns) && $menuhasdropdowns->count())
                    @foreach($menuhasdropdowns as $key => $value)
                      <li class="list-group-item " item-id="{{ $value->id }}">{{ $value->name }}</li>
                    @endforeach
                  @endif
                </ul>
            </div> --}}
        </div>
    </div>
  </div>
</div>
@endsection
@push('javascript')
 <script src="https://code.jquery.com/jquery-3.6.0.min.js" defer></script>
 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
 <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" defer></script>
 <script>
  $( function() {
    $( "#padding-item-drop, #complete-item-drop" ).sortable({
      connectWith: ".connectedSortable",
      opacity: 0.5,
    });
    $( ".connectedSortable" ).on( "sortupdate", function( event, ui ) {
      var pending = [];
      var accept = [];
      $("#padding-item-drop li").each(function( index ) {
        if($(this).attr('item-id')){
          pending[index] = $(this).attr('item-id');
        }
      });
      // $("#complete-item-drop li").each(function( index ) {
      //   accept[index] = $(this).attr('item-id');
      // });
      $.ajax({
        url: "{{ route('superadmin.update.items') }}",
        method: 'POST',
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {pending:pending},
        success: function(data) {
          console.log('success');
        }
      });

    });
  });
</script>
<script>
  function myFunction(el) {
    const url = $(el).attr('data_url');
      var token = $('meta[name="csrf-token"]').attr('content');
      swal({
        title: 'Are you sure?',
        text: 'This record and it`s details will be permanantly deleted!',
        icon: 'warning',
        buttons: ["Cancel", "Yes!"],
        dangerMode: true,
        closeOnClickOutside: false,
      }).then(function(value) {
        if(value == true){
          $.ajax({
            url: url,
            type: "POST",
            data: {
              _token: token,
              '_method': 'DELETE',
            },
            success: function (data) {
              swal({
                title: "Success!",
                type: "success",
                text: "Click OK",
                icon: "success",
                showConfirmButton: false,
              }).then(location.reload(true));
              
            },
            error: function (data) {
              swal({
                title: 'Opps...',
                text: "Please refresh your page",
                type: 'error',
                timer: '1500'
              });
            }
          });
        }else{
          swal({
            title: 'Cancel',
            text: "Data is safe.",
            icon: "success",
            type: 'info',
            timer: '1500'
          });
        }
      });
  }
</script>

@endpush
