<div id="col-md-6">
	<div class="form-group" >
	  <label for="imgInp"> This is for Image<span class="text-danger">*</span></label>
	  <div class="input-group" id="main-entry">
	    {{-- <input type="file" name="image" class="myfrm form-control"> --}}

	    <div class="input-group-btn"> 
	      {{-- <button type="button" name="add" id="add_more" class="btn btn-xs btn-outline-primary"><i class="fas fa-plus"></i></button> --}}
	    </div>
	  </div>
	  @error('image')
	  <span class="text-danger font-italic" role="alert">
	    <strong>{{ $message }}</strong>
	  </span>
	  @enderror
	</div>
	
</div>



