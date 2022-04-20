<div class="row">
	<div class="col-md-12 row radio-entry-table" id="radio-entry-table">
			<div class="form-group col-md" id="radio-main-entry">
				<label for="radioquestion">Question</label>
				<input  type="text" class="form-control max" id="radioquestion" placeholder="Enter radioquestion" name="radioquestion" autocomplete="off" autofocus value="{{ old('question') }}">
			</div>
			{{-- <div class="input-group-btn col-md-1 my-auto"> 
			</div> --}}
				<button type="button" name="radio" id="radio_more" class="btn btn-xs btn-outline-primary radio_more"><i class="fas fa-plus"></i></button>
				<button type="button" name="radio" id="radio_remove" class="btn btn-xs btn-outline-danger radio_remove"><i class="fas fa-minus"></i></button>
	</div>
</div>