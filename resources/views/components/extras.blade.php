@foreach ($extras as $extra)
	<div class="col-md-4">
		<div class="media media-lg">
	        <div class="media-left">
	          <a href="javascript:void(0)">
	            <img class="media-object" src="/images/extras/{{ $extra->coverPhoto }}">
	          </a>
	        </div>
	        	
	        <div class="media-body">
	        	<form action="{{ action('ApplicationController@addExtra', ['id' => $extra->id]) }}" method="POST">
		        	{{ csrf_field() }}
	          		<h4 class="media-heading">{{ $extra->name }}</h4>
	          		<p>Price: {{ $extra->price * session('attendeeQty') }}€</p>
	          		<button type="submit" class="btn btn-success">Add to Cart</button>
          		</form>
	        </div>
	        
      	</div>
	</div>
@endforeach