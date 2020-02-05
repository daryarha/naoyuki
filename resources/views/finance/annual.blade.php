@extends('templates.app')
@section('header')
Finance - Cash Flow - Annual Report
@endsection
@section('content')
<div class="row">
	<div class="card col-8">
		<div class="card-body">
			<canvas id="Annual"></canvas>
		</div>
	</div>
	<div class="card col-3 ml-5">
		<div class="card-body" id="detailAnnual">
		 	<hr>
		<span id="totalAnnual" >Total </span><br>
		</div>
	</div>
</div>
@endsection