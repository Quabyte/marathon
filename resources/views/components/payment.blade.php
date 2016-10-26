@extends('welcome')

{{-- @section('customCss')
	<link rel="stylesheet" type="text/css" href="{{ asset('css/card.min.css') }}">
@stop --}}

@section('title', 'Checkout')

@section('content')
	<div class="row">
		<div class="col-md-6">
			<div class="col-md-10 col-md-offset-2">
				<h4 style="margin-left: -15px;">Payment Details</h4>
			</div>
			@include('components.newCreditCard')
		</div>
		<div class="col-md-6">
			<div class="row">
				<div class="col-md-12">
					<h4>Extras</h4>
				</div>
				@include('components.extras')
			</div>
			<div class="row">
				<div class="col-md-12">
					<h4>Order Summary</h4>
				</div>
				<div class="col-md-12">
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
		</div>
	</div>
@stop

@section('scripts')
	<script src="{{ asset('js/jquery.card.js') }}"></script>
	<script src="{{ asset('js/card.min.js') }}"></script>
	{{-- <script src="{{ asset('js/jquery.formatter.min.js') }}"></script>
	<script src="{{ asset('js/formatter-js.min.js') }}"></script> --}}
@stop