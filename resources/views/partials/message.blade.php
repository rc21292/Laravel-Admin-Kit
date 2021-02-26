<div class="mb-3">
	@if(session()->has('primary'))
	<div class="alert alert-primary alert-outline-coloured alert-dismissible" role="alert">
		<button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
		<div class="alert-icon">
			<i class="far fa-fw fa-bell"></i>
		</div>
		<div class="alert-message">
			<strong>{{ session()->get('primary') }}</strong> 
		</div>
	</div>
	@endif
	@if(session()->has('secondary'))
	<div class="alert alert-secondary alert-outline-coloured alert-dismissible" role="alert">
		<button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
		<div class="alert-icon">
			<i class="far fa-fw fa-bell"></i>
		</div>
		<div class="alert-message">
			<strong>{{ session()->get('secondary') }}</strong> 
		</div>
	</div>
	@endif
	@if(session()->has('success'))
	<div class="alert alert-success alert-outline-coloured alert-dismissible" role="alert">
		<button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
		<div class="alert-icon">
			<i class="far fa-fw fa-bell"></i>
		</div>
		<div class="alert-message">
			<strong>{{ session()->get('success') }}</strong> 
		</div>
	</div>
	@endif
	@if(session()->has('danger'))
	<div class="alert alert-danger alert-outline-coloured alert-dismissible" role="alert">
		<button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
		<div class="alert-icon">
			<i class="far fa-fw fa-bell"></i>
		</div>
		<div class="alert-message">
			<strong>{{ session()->get('danger') }}</strong> 
		</div>
	</div>
	@endif
	@if(session()->has('warning'))
	<div class="alert alert-warning alert-outline-coloured alert-dismissible" role="alert">
		<button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
		<div class="alert-icon">
			<i class="far fa-fw fa-bell"></i>
		</div>
		<div class="alert-message">
			<strong>Hello there!</strong> A simple warning alert—check it out!
		</div>
	</div>
	@endif
	@if(session()->has('info'))
	<div class="alert alert-info alert-outline-coloured alert-dismissible" role="alert">
		<button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
		<div class="alert-icon">
			<i class="far fa-fw fa-bell"></i>
		</div>
		<div class="alert-message">
			<strong>Hello there!</strong> A simple info alert—check it out!
		</div>
	</div>
	@endif
</div>