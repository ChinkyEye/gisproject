<div class="row">
	<div class="col-md-12 row radio-entry-table mb-1" id="radio-entry-table">
		<div class="input-group col-md">
		  <div class="input-group-prepend">
		    <div class="input-group-text">
		      <input type="radio"  checked>
		    </div>
		  </div>
		  <input type="text" class="form-control form-control-border" placeholder="Enter Op" name="radiooption[]">
		</div>
			{{-- <div class="form-group col-md" id="radio-main-entry">
				<label for="radioquestion">Question</label>
				<input  type="text" class="form-control form-control-border" id="radioquestion" placeholder="Enter radioquestion" name="radioquestion" autocomplete="off" autofocus value="{{ old('question') }}">
			</div> --}}
			{{-- <div class="input-group-btn col-md-1 my-auto"> 
			</div> --}}
		<button type="button" name="radio" id="radio_more" class="btn btn-xs btn-outline-primary radio_more"><i class="fas fa-plus"></i></button>
		<button type="button" name="radio" id="radio_remove" class="btn btn-xs btn-outline-danger radio_remove"><i class="fas fa-minus"></i></button>
	</div>
</div>