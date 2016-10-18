@extends('welcome')

@section('title', 'Please register for an event')

@section('content')
	<form method="POST" action="{{ action('MarathonsController@addMarathons') }}" class="from-group">
		<div class="row">
			@foreach ($marathons as $marathon)
				{{ csrf_field() }}
				<div class="col-md-4">
					<div class="panel panel-default">
						<div class="panel-body">
							<img class="img-responsive" src="{{ url('/') }}/images/{{ $marathon->coverPhoto }}">
							<h2>{{ $marathon->name }}</h2>
							<div class="row margin-bottom-30">
								<div class="col-md-6">
									<p>Price: {{ round($marathon->price, 1) }}€/person</p>
								</div>
								<div class="col-md-6">
									<label for="attendees">Select Runner Count</label>
									<select class="form-control" name="attendees{{$marathon->id}}" id="attendees{{$marathon->id}}">
										<option>0</option>
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="4">4</option>
										<option value="5">5</option>
									</select>
								</div>
							</div>
						</div>
					</div>
				</div>
			@endforeach
		</div>
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<button type="submit" class="btn btn-success btn-block disabled" style="margin-bottom: 30px;" id="register">Registration <i class="icon wb-arrow-right"></i></button>
			</div>			
		</div>
	</form>
@stop

@section('scripts')
	<script src="{{ asset('js/register.js') }}"></script>
@stop