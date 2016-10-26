@extends('welcome')

@section('title', 'Thank You!')

@section('customCss')
	<link rel="stylesheet" type="text/css" href="{{ asset('css/invoice.min.css') }}">
@stop

@section('bodyClass', 'page-invoice')

@section('content')
	<div class="panel">
		<div class="panel-body">

			<div class="row">
				<div class="col-md-6 col-md-offset-3">
					<div class="alert dark alert-icon alert-success" role="alert">
						<i class="icon wb-check"></i>
						<p>Your order successfully received!</p>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-md-4">
					<h4>
						<img src="{{ asset('images/detur_logo.png') }}" class="margin-right-10">
					</h4>
					<address>
						Büyükdere Cad. Özsezen İş Merkezi C Blok Asmakat Detur <br>
						<abbr title="Mail">Email:</abbr> info@detur.com <br>
						<abbr title="Phone">Phone:</abbr> +90 212 217 77 60 <br>
						<abbr title="Fax">Fax:</abbr> +90 212 217 77 40
					</address>
				</div>

				<div class="col-md-4 col-md-offset-4 text-right">
					<h4>Invoice Info</h4>
					<a class="font-size-26" href="javascript:void(0)">#{{ $order->reference }}</a><br>
					<span>Invoice Date: {{ $time }}</span>
				</div>
			</div>

			<div class="row">
				<table class="table table-responsive table-hover">
					<thead>
						<tr>
							<th>Description</th>
							<th>Quantity</th>
							<th>Unit Cost</th>
							<th>Total</th>
						</tr>
					</thead>
					<tbody>
						@foreach (Cart::content() as $row)
							<td>{{ $row->name }}</td>
							<td>{{ $row->qty }}</td>
							<td class="text-right">{{ $row->price }}€</td>
							<td class="text-right">{{ $row->total }}€</td>
						@endforeach
					</tbody>					
				</table>
			</div>

			<div class="row">
				<div class="text-right clearfix">
					<div class="pull-right">
						<p class="page-invoice-amount">TOTAL: <span>{{ Cart::total() }}€</span></p>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="text-right clearfix">
					<div class="pull-right">
						<button type="button" class="btn btn-primary btn-outline" onclick="javascript:window.print()">
							<span>
								<i class="icon wb-print" aria-hidden="true"></i>
								Print
							</span>
						</button>
					</div>
				</div>
			</div>
			
			<div class="row">
				<div class="col-md-6 col-md-offset-3 text-center">
					<a id="inputStyleDanger" data-target="#termsConditions" data-toggle="modal">Terms & Conditions</a>					
				</div>
			</div>
		</div>
	</div>

	@include('components.termsConditions')
@stop