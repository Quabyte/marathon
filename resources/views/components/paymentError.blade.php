@extends('welcome')

@section('title', 'Some Error Occured!')

@section('content')
	<div class="row">
		<div class="col-md-12">
			<p>Some error occured! {{ $error }}</p>
		</div>
	</div>
@stop