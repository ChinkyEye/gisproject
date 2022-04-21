@extends('web.layouts.app')
@push('tab_title')
About | 
@endpush
@push('css')
@endpush
@section('content')

<section class="breadcrumb-main my-4">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-4">
				<div class="card main-card p-3 shadow-sm">
					<div class="d-flex align-items-center">
						<div class="image"> 
							<img src="{{ url('/web') }}/img/bg-img/1.jpg" class="rounded" width="155"> 
						</div>
						<div class="ml-3 w-100">
							<h4 class="mb-0 mt-0">Alex Morrision</h4> <span>Senior Journalist</span>
							<div class="p-2 mt-2 bg-primary d-flex justify-content-between rounded text-white main-stats">
								<div class="d-flex flex-column"> <span class="main-articles">Articles</span> <span class="main-number1">38</span> </div>
								<div class="d-flex flex-column"> <span class="main-followers">Followers</span> <span class="number2">980</span> </div>
								<div class="d-flex flex-column"> <span class="main-rating">Rating</span> <span class="main-number3">8.9</span> </div>
							</div>
							<div class="button mt-2 d-flex flex-row align-items-center"> <button class="btn btn-sm btn-outline-primary w-100">Chat</button> <button class="btn btn-sm btn-primary w-100 ml-2">Follow</button> </div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="card mb-3">
				  <div class="row no-gutters">
				    <div class="col-md-4">
				    	<img src="{{ url('/web') }}/img/bg-img/1.jpg" class="img-fluid">
				    </div>
				    <div class="col-md-8">
				    	<div class="d-flex flex-column">
				    		<div class="card-body">
					    		<h5 class="card-title">
						    		Card title
						    	</h5>
					    		<p class="card-text">
					    			<small class="text-muted">Last updated 3 mins ago</small>
					    		</p>
				    		</div>
				    		<div class="card-body bg-gray">
					    		<h5 class="card-title">
						    		Card title
						    	</h5>
					    		<p class="card-text">
					    			<small class="text-muted">Last updated 3 mins ago</small>
					    		</p>
				    		</div>
				    		{{-- <p class="card-text">
					    		This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.
					    	</p> --}}
				    	</div>
				    </div>
				  </div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection
@push('js')
@endpush