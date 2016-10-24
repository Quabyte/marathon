@extends('welcome')

@section('customCss')
	<link rel="stylesheet" type="text/css" href="{{ asset('css/card.min.css') }}">
@stop

@section('title', 'Checkout')

@section('content')
	<div class="row" style="margin-bottom: 30px;">
		<h2>You can purchase extras!</h2>
		@include('components.extras')
	</div>
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			@include('components.newCreditCard')
		</div>
		<div class="col-md-3">
			<div class="alert alert-alt alert-primary alert-dismissible" role="alert">
	          Total Amount to Pay: <a class="alert-link" href="#">{{ Cart::total() }}€</a>
	        </div>
		</div>		
	</div>
@stop

@section('scripts')
	<script src="{{ asset('js/jquery.card.js') }}"></script>
	<script src="{{ asset('js/card.min.js') }}"></script>
@stop