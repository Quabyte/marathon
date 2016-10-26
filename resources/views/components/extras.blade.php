@foreach ($extras as $extra)
	<div class="col-md-12">
		<div class="media media" style="margin-bottom: 15px;">
	        <div class="media-left">
	          <a href="javascript:void(0)">
	            <img class="media-object" src="/images/extras/{{ $extra->coverPhoto }}" style="width: 100px;">
	          </a>
	        </div>
	        	
	        <div class="media-body">
	        	<form action="{{ action('ApplicationController@addExtra', ['id' => $extra->id]) }}" method="POST">
		        	{{ csrf_field() }}
		        	<div class="col-md-6">
						<h4 class="media-heading">{{ $extra->name }}</h4>
	          			<p>Price: {{ $extra->price * session('attendeeQty') }}€</p>		        		
		        	</div>
		        	<div class="col-md-6">
		        		<a href="#" class="btn btn-default btn-outline btn-sm">Details</a>
	          			<button type="submit" class="btn btn-success btn-sm">Add to Cart</button>
		        	</div>
          		</form>
	        </div>
	        
      	</div>
	</div>
@endforeach