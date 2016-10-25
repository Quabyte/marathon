@extends('welcome')

@section('title', 'Please select your hotel')

@section('content')
	@foreach ($hotels as $hotel)
		<div class="col-md-6">
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="row">
						<div class="hotel-image">
							<div class="fotorama"
								 data-nav="thumbs"
								 data-keyboard="true"
								 data-loop="true">
								<img class="img-responsive" src="{{ url('/') }}/images/{{ $hotel->coverPhoto }}/1.jpg">
								<img class="img-responsive" src="{{ url('/') }}/images/{{ $hotel->coverPhoto }}/2.jpg">
								<img class="img-responsive" src="{{ url('/') }}/images/{{ $hotel->coverPhoto }}/3.jpg">
								<img class="img-responsive" src="{{ url('/') }}/images/{{ $hotel->coverPhoto }}/4.jpg">
								<img class="img-responsive" src="{{ url('/') }}/images/{{ $hotel->coverPhoto }}/5.jpg">
								<img class="img-responsive" src="{{ url('/') }}/images/{{ $hotel->coverPhoto }}/6.jpg">
								<img class="img-responsive" src="{{ url('/') }}/images/{{ $hotel->coverPhoto }}/7.jpg">
								<img class="img-responsive" src="{{ url('/') }}/images/{{ $hotel->coverPhoto }}/8.jpg">
								<img class="img-responsive" src="{{ url('/') }}/images/{{ $hotel->coverPhoto }}/9.jpg">
								<img class="img-responsive" src="{{ url('/') }}/images/{{ $hotel->coverPhoto }}/10.jpg">
							</div>
							<div class="hotel-point">{{round($hotel->rate , 1)}}/10</div>
						</div>
					</div>
					
					<div class="row bordered">
						<div class="col-md-12">
							<h2 style="margin-top:20px;">{{ $hotel->name }}</h2>
						</div>
						<div class="col-md-12">
							<form method="POST" action="{{ action('HotelsController@addHotel', ['id' => $hotel->id]) }}" class="form-group">
								{{ csrf_field() }}
								<div class="row">
									<div class="col-md-3">
									    <label for="checkIn">Check In</label>
										<select class="form-control" name="checkIn">
											<option value="">CheckIn</option>
											<option value="10">Nov 10</option>
											<option value="11">Nov 11</option>
										</select>
									</div>
									<div class="col-md-3">
										<label for="checkOut">Check Out</label>
										<select class="form-control" name="checkOut">
											<option value="">CheckOut</option>
											<option value="14">Nov 14</option>
											<option value="15">Nov 15</option>
										</select>
									</div>
									<div class="col-md-4">
										<label for="roomType">Room Type</label>
										<select class="form-control" name="roomType" id="rooms{{$hotel->id}}">
											<option value="">Room Type</option>
											<option value="1">Single Room</option>
											<option value="2">Double Room</option>
											{{-- <option value="Triple Room">Triple Room</option> --}}
										</select>
									</div>
									<div class="col-md-2">
										<label for="roomQty">Quantity</label>
										<select class="form-control" name="roomQty">
											<option value="1">1</option>
											<option value="2">2</option>
											<option value="3">3</option>
											<option value="4">4</option>
											<option value="5">5</option>
										</select>
									</div>
								</div>	
								<hr>
								<ul class="list-group">
									@foreach ($hotel->rooms as $room)
										<li class="list-group-item">
											<div class="row">
												<div class="col-md-6">{{ $room->name }}</div>
												<div class="col-md-6">{{ $room->price }} €/per night</div>
											</div>
										</li>
									@endforeach
								</ul>
								<button type="submit" href="{{ action('MarathonsController@index') }}" class="btn btn-block btn-success disabled" id="proceed{{$hotel->id}}">Select Your Run <i class="icon wb-arrow-right"></i></button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	@endforeach
@stop

@section('scripts')
	<script src="{{ asset('js/custom.js') }}"></script>
	<link  href="https://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.min.css" rel="stylesheet">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.min.js"></script>
@stop