@for ($i = 1; $i <= $cartQty; $i++)
	<div class="col-md-6">
		<h3>{{ 'Attendee ' . $i . ' Information' }}</h3>

		<div class="form-group {{ $errors->has('identity'. $i) ? ' has-error' : '' }}">
			<label for="identity{{ $i }}">Passport Number</label>
			<input type="text" name="identity{{$i}}" class="form-control" required>
			@if ($errors->has('identity' . $i))
                <span class="help-block">
                    <strong>{{ $errors->first('identity' . $i) }}</strong>
                </span>
            @endif
		</div>

		<div class="form-group {{ $errors->has('name'. $i) ? ' has-error' : '' }}">
			<label for="name{{ $i }}">Name</label>
			<input type="text" name="name{{ $i }}" class="form-control" required>
			@if ($errors->has('name' . $i))
                <span class="help-block">
                    <strong>{{ $errors->first('name' . $i) }}</strong>
                </span>
            @endif
		</div>

		<div class="form-group {{ $errors->has('surname'. $i) ? ' has-error' : '' }}">
			<label for="surname{{ $i }}">Surname</label>
			<input type="text" name="surname{{ $i }}" class="form-control" required>
			@if ($errors->has('surname' . $i))
                <span class="help-block">
                    <strong>{{ $errors->first('surname' . $i) }}</strong>
                </span>
            @endif
		</div>

		<div class="form-group {{ $errors->has('birthdate'. $i) ? ' has-error' : '' }}">
			<label for="birthdate{{$i}}">BirthDate</label>
			<input type="text" name="birthdate{{$i}}" class="form-control" data-plugin="formatter" data-pattern="[[99]]/[[99]]/[[9999]]" required>
			@if ($errors->has('birthdate' . $i))
                <span class="help-block">
                    <strong>{{ $errors->first('birthdate' . $i) }}</strong>
                </span>
            @endif
		</div>
		
		<div class="form-group {{ $errors->has('gender'. $i) ? ' has-error' : '' }}">
			<label for="gender{{$i}}">Gender</label>
			<select class="form-control" name="gender{{$i}}">
				<option value="male">Male</option>
				<option value="female">Female</option>
			</select>
			@if ($errors->has('gender' . $i))
                <span class="help-block">
                    <strong>{{ $errors->first('gender' . $i) }}</strong>
                </span>
            @endif
		</div>

		<div class="form-group {{ $errors->has('country'. $i) ? ' has-error' : '' }}">
			<label for="country{{$i}}">Country</label>
			<input type="text" name="country{{$i}}" class="form-control" required>
			@if ($errors->has('country' . $i))
                <span class="help-block">
                    <strong>{{ $errors->first('country' . $i) }}</strong>
                </span>
            @endif
		</div>

		<div class="form-group {{ $errors->has('city'. $i) ? ' has-error' : '' }}">
			<label for="city{{$i}}">City</label>
			<input type="text" name="city{{$i}}" class="form-control" required>
			@if ($errors->has('city' . $i))
                <span class="help-block">
                    <strong>{{ $errors->first('city' . $i) }}</strong>
                </span>
            @endif
		</div>

		<div class="form-group {{ $errors->has('phone'. $i) ? ' has-error' : '' }}">
			<label for="phone{{$i}}">Phone</label>
			<input type="text" name="phone{{$i}}" class="form-control" data-plugin="formatter" data-pattern="([[999]]) [[999]]-[[9999]]" required>
			@if ($errors->has('phone' . $i))
                <span class="help-block">
                    <strong>{{ $errors->first('phone' . $i) }}</strong>
                </span>
            @endif
		</div>

		<div class="form-group {{ $errors->has('email'. $i) ? ' has-error' : '' }}">
			<label for="email{{$i}}">Email</label>
			<input type="email" name="email{{$i}}" class="form-control" required>
			@if ($errors->has('email' . $i))
                <span class="help-block">
                    <strong>{{ $errors->first('email' . $i) }}</strong>
                </span>
            @endif
		</div>
	</div>
@endfor