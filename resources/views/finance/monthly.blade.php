@extends('templates.app')
@section('header')
Finance - Cash Flow - Monthly Report
@endsection
@section('content')
<div class="row">
	<div class="card col-8 text-center">
		<div class="card-body" id="category">
		</div>
	</div>
	<div class="col-2 mr-0 pr-0">
		<select class="form-control btn-sm" required name="Category" id="month">
			<option selected value="1" class="d-none">Jan</option>
			<option selected value="2"  class="d-none">Feb</option>
			<option selected value="3"  class="d-none">Mar</option>
			<option selected value="4" class="d-none">Apr</option>
			<option selected value="5" class="d-none">Mei</option>
			<option selected value="6" class="d-none">Jun</option>
			<option selected value="7" class="d-none">Jul</option>
			<option selected value="8" class="d-none">Agust</option>
			<option selected value="9" class="d-none">Sep</option>
			<option selected value="10" class="d-none">Okt</option>
			<option selected value="11" class="d-none">Nov</option>
			<option selected value="12" class="d-none">Des</option>
		</select>
	</div>

	<div class="col-2">
		<select class="form-control btn-sm" required name="Category" id="year">
			@foreach($years as $year)
			<option selected value="{{$year->year}}">{{$year->year}}</option>
			@endforeach
		</select>
	</div>
</div>
<br>
<div class="row">
	<div class="card col-8">
		<div class="card-body">
			<canvas id="Monthly"></canvas>
		</div>
	</div>
	<div class="card col-3 ml-5">
		<div class="card-body" id="detailMonthly">
			<hr>
			<span id="totalMonthly">Total </span>
		</div>
	</div>
</div>
@endsection