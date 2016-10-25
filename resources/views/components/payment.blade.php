@extends('welcome')

@section('customCss')
	<link rel="stylesheet" type="text/css" href="{{ asset('css/card.min.css') }}">
@stop

@section('title', 'Checkout')

@section('content')
	<div class="row" style="margin-bottom: 30px;">
		<div class="col-md-12">
			<h2>You can purchase extras!</h2>
			@include('components.extras')
		</div>
	</div>
	<div class="row" style="margin-bottom: 30px;">
		<div class="col-md-8">
			@include('components.newCreditCard')
		</div>
		<div class="col-md-4">
			<table class="table">
				<thead>
					<tr>
						<th>Product</th>
						<th>Qty</th>
						<th>Price</th>
					</tr>
				</thead>
				<tbody>
					@foreach (Cart::content() as $row)
						<tr>
							<td>{{ $row->name }}</td>
							<td>{{ $row->qty }}</td>
							<td>{{ $row->subtotal }}€</td>
						</tr>
					@endforeach
				</tbody>
				<tfoot>
					<tr>
						<td colspan="1"></td>
						<td>Total</td>
						<td>{{ Cart::total() }}€</td>
					</tr>
				</tfoot>
			</table>
		</div>		
	</div>
@stop

@section('scripts')
	{{-- <script src="{{ asset('js/jquery.card.js') }}"></script>
	<script src="{{ asset('js/card.min.js') }}"></script> --}}
	{{-- <script src="{{ asset('js/jquery.formatter.min.js') }}"></script>
	<script src="{{ asset('js/formatter-js.min.js') }}"></script> --}}
@stop