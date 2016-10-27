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
		        		<button data-target="#{{ $extra->id }}" data-toggle="modal" class="btn btn-default btn-outline btn-sm" type="button">Details</button>
	          			<button type="submit" class="btn btn-success btn-sm">Add to Cart</button>
		        	</div>
          		</form>
	        </div>
	        
      	</div>
	</div>

	<div class="modal" id="{{ $extra->id }}" aria-hidden="true" aria-labelledby="{{ $extra->name }}" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	                    <span aria-hidden="true">×</span>
                  	</button>
                  	<h4 class="modal-title">{{ $extra->name }}</h4>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-md-6">
							<img src="/images/extras/{{ $extra->coverPhoto }}" class="img-responsive">
						</div>

						<div class="col-md-6">
							<h4>Price: <small>{{ $extra->price }}€/person</small></h4>
							<h4>Includes</h4>
							<p>{{ $extra->includes }}</p>

							<h4>Excludes</h4>
							<p>{{ $extra->excludes }}</p>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<h4>Terms</h4>
							<p>{{ $extra->terms }}</p>
						</div>
					</div>
				</div>
				<div class="modal-footer">
                  	<button type="button" class="btn btn-default margin-0" data-dismiss="modal">Close</button>
                </div>
			</div>
		</div>
	</div>
@endforeach