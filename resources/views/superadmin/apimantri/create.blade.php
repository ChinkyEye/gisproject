 @extends('superadmin.main.app')
 @section('content')
 <section class="content-header">
 	<div class="container-fluid">
 		<div class="row mb-2">
 			<div class="col-sm-6 pl-1">
 				<h1 class="text-capitalize">Add Mantri</h1>
 			</div>
 			<div class="col-sm-6">
 				<ol class="breadcrumb float-sm-right">
 					<li class="breadcrumb-item"><a href="{{route('superadmin.home')}}">Home</a></li>
 					<li class="breadcrumb-item active text-capitalize">Mantri Page</li>
 				</ol>
 			</div>
 		</div>
 	</div>
 </section>
 <section class="content">
 	<div class="card card-info">
 		<form role="form" method="POST" action="{{route('superadmin.apimantri.store')}}" class="signup" id="signup" enctype="multipart/form-data">
 			<div class="card-body">
 				@csrf
 				<div class="form-group">
 					<label for="name">Name<span class="text-danger">*</span></label>
 					<input type="text"  class="form-control max" id="name" placeholder="Enter name" name="name" autocomplete="off" autofocus value="{{ old('name') }}">
 					@error('name')
 					<span class="text-danger font-italic" role="alert">
 						<strong>{{ $message }}</strong>
 					</span>
 					@enderror
 				</div>
            <div class="form-group">
               <label for="mantralaya_id">Ministry<span class="text-danger">*</span></label>
               <select class="form-control max" id="mantralaya_id" name="mantralaya_id">
                  <option value="" selected disabled>--Please choose one--</option>
                  @foreach($mantralayas as $data)
                  <option value="{{$data->id}}">{{$data->getUserDetail->name}}</option>
                  @endforeach
               </select>
               @error('mantralaya_id')
               <span class="text-danger font-italic" role="alert">
                  <strong>{{ $message }}</strong>
               </span>
               @enderror
            </div>
            <div class="form-group">
               <label for="post">Post<span class="text-danger">*</span></label>
               <input type="text"  class="form-control max" id="post" placeholder="Enter post" name="post" autocomplete="off" autofocus value="{{ old('post') }}">
               @error('post')
               <span class="text-danger font-italic" role="alert">
                  <strong>{{ $message }}</strong>
               </span>
               @enderror
            </div>
            <div class="form-group">
               <label for="link">Link<span class="text-danger">*</span></label>
               <input type="text"  class="form-control max" id="link" placeholder="Enter link" name="link" autocomplete="off" autofocus value="{{ old('link') }}">
               @error('link')
               <span class="text-danger font-italic" role="alert">
                  <strong>{{ $message }}</strong>
               </span>
               @enderror
            </div>
            <div class="form-group">
               <label for="phone">Phone No.<span class="text-danger">*</span></label>
               <input type="text"  class="form-control max" id="phone" placeholder="Enter phone no" name="phone" autocomplete="off" autofocus value="{{ old('phone') }}">
               @error('phone')
               <span class="text-danger font-italic" role="alert">
                  <strong>{{ $message }}</strong>
               </span>
               @enderror
            </div>
 				{{-- <div class="form-group">
 					<label for="description">Description<span class="text-danger">*</span></label>
 					<textarea  type="text"  class="form-control max" id="description" placeholder="Enter description" name="description" autocomplete="off" autofocus value="{{ old('description') }}"></textarea>
 					@error('description')
 					<span class="text-danger font-italic" role="alert">
 						<strong>{{ $message }}</strong>
 					</span>
 					@enderror
 				</div> --}}
 				<div class="form-group">
 					<label for="image">Image</label>
 					<div class="input-group">
 						<input type="file" class="form-control d-none" id="image" name="image" value="{{ old('image') }}">
 						<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQl1xtOkMGh312RKiJXUPbwyODQ7hdHgHFqYR5RwBGHiKaKz9eO&s" id="profile-img-tag" width="200px" onclick="document.getElementById('image').click();" alt="your image" class="img-thumbnail img-fluid editback-gallery-img center-block"  />
 					</div>
 					@error('image')
 					<span class="text-danger font-italic" role="alert">
 						<strong>{{ $message }}</strong>
 					</span>
 					@enderror
 				</div>


 			</div>
 			<div class="card-footer justify-content-between">
 				<button type="submit" class="btn btn-info text-capitalize">Save</button>
 			</div>
 		</form>
 	</div>
 </section>
 @endsection
 @push('javascript')
 <script src="https://cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>
 <script>
 	$(function () {
 		CKEDITOR.replace('description');
 		CKEDITOR.config.removeButtons = 'Anchor';
 		CKEDITOR.config.removePlugins = 'stylescombo,link,sourcearea,maximize,image,about,tabletools,scayt';
 	});
 </script>
 <script type="text/javascript">
 	function readURL(input) {
 		if (input.files && input.files[0]) {
 			var reader = new FileReader();
 			reader.onload = function (e) {
 				$('#profile-img-tag').attr('src', e.target.result);
 			}
 			reader.readAsDataURL(input.files[0]);
 		}
 	}
 	$("#image").change(function(){
    // alert("milan");
    readURL(this);
});
</script>
@endpush