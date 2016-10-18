@for ($i = 1; $i <= $cartQty; $i++)
	<div class="col-md-6">
		<h3>{{ 'Attendee ' . $i . ' Information' }}</h3>
		
		<div class="form-group">
			<label for="identity{{ $i }}">Passport Number</label>
			<input type="text" name="identity{{$i}}" class="form-control">
		</div>

		<div class="form-group">
			<label for="name{{ $i }}">Name</label>
			<input type="text" name="name{{ $i }}" class="form-control">
		</div>

		<div class="form-group">
			<label for="surname{{ $i }}">Surname</label>
			<input type="text" name="surname{{ $i }}" class="form-control">
		</div>

		<div class="form-group">
			<label for="birthdate{{$i}}">BirthDate</label>
			<input type="text" name="birthdate{{$i}}" class="form-control">
		</div>
		
		<div class="form-group">
			<label for="gender{{$i}}">Gender</label>
			<select class="form-control" name="gender{{$i}}">
				<option value="male">Male</option>
				<option value="female">Female</option>
			</select>
		</div>

		<div class="form-group">
			<label for="country{{$i}}">Country</label>
			<input type="text" name="country{{$i}}" class="form-control">
		</div>

		<div class="form-group">
			<label for="city{{$i}}">City</label>
			<input type="text" name="city{{$i}}" class="form-control">
		</div>

		<div class="form-group">
			<label for="phone{{$i}}">Phone</label>
			<input type="text" name="phone{{$i}}" class="form-control">
		</div>

		<div class="form-group">
			<label for="email{{$i}}">Email</label>
			<input type="email" name="email{{$i}}" class="form-control">
		</div>
	</div>
@endfor