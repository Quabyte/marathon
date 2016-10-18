@extends('welcome')

@section('title', 'Your Order')

@section('content')
	<div class="col-md-12">
		<table class="table">
			<thead>
				<tr>
					<th>Product</th>
					<th>Qty</th>
					<th>Price</th>
					<th>Subtotal</th>
				</tr>
			</thead>

			<tbody>
				@foreach (Cart::content() as $row)
					<tr>
						<td>{{ $row->name }}</td>
						<td>{{ $row->qty }}</td>
						<td>{{ $row->price }} €</td>
						<td>{{ $row->total }} €</td>
					</tr>
				@endforeach
			</tbody>

			<tfoot>
				<tr>
					<td colspan="2">&nbsp;</td>
					<td>Total</td>
					<td>{{ Cart::total() }} €</td>
				</tr>
			</tfoot>
		</table>
		<a class="btn btn-danger" href="{{ action('ShoppingCartController@destroy') }}">Remove All Items</a>
	</div>
	<form action="{{ action('AttendeesController@create') }}" method="POST">
		{{ csrf_field() }}
		@include('components.attendees')
		<div class="col-md-6 col-md-offset-3" style="margin-bottom: 30px; margin-top: 30px;">
			<button type="submit" class="btn btn-block btn-success">Check Out <i class="icon wb-arrow-right"></i></a>		
		</div>
	</form>
@stop