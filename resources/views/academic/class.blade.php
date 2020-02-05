@extends('templates.app')
@section('header')
Academic - Class
@endsection
@section('content')
<div class="row">
	@foreach($classes as $class)
	<div class="col-lg-3">
		<a href="{{ url('class/'.$class->name.'/materi')}}">
			<div class="card" style="width: 14rem;">
				<img src="{{ asset('storage/img/class.jpeg') }}" class="card-img-top" alt="card image cap">
				<div class="card-body">
					<p class="card-text">
						<h5>{{ $class->name }}</h5>
					</p>
				</div>
			</div>
		</a>
	</div>
	@endforeach
</div>
@endsection