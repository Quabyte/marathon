<div class="col-md-12">
	<form action="{{ action('FinansbankController@prepare') }}" method="POST">
		{{ csrf_field() }}
		<div class="form-group">
			<label for="pan">Credit Card Number</label>
			<input type="text" name="pan" size="20" class="form-control">
		</div>
		
		<div class="row">
			<div class="col-md-3">
				<div class="form-group">
					<label for="cv2">Security Code</label>
					<input type="password" name="cv2" size="4" class="form-control">
				</div>
			</div>

			<div class="col-md-3">
				<div class="form-group">
					<label for="Ecom_Payment_Card_ExpDate_Month">Expire Month</label>
					<select class="form-control" name="Ecom_Payment_Card_ExpDate_Month">
						<option>Select Month</option>
						<option value="01">01</option>
						<option value="02">02</option>
						<option value="03">03</option>
						<option value="04">04</option>
						<option value="05">05</option>
						<option value="06">06</option>
						<option value="07">07</option>
						<option value="08">08</option>
						<option value="09">09</option>
						<option value="10">10</option>
						<option value="11">11</option>
						<option value="12">12</option>
					</select>
				</div>
			</div>

			<div class="col-md-3">
				<div class="form-group">
					<label for="Ecom_Payment_Card_ExpDate_Year">Expire Year</label>
					<select class="form-control" name="Ecom_Payment_Card_ExpDate_Year">
						<option>Select Year</option>
						<option value="2016">2016</option>
						<option value="2017">2017</option>
						<option value="2018">2018</option>
						<option value="2019">2019</option>
						<option value="2020">2020</option>
						<option value="2021">2021</option>
						<option value="2022">2022</option>
						<option value="2023">2023</option>
						<option value="2022">2024</option>
						<option value="2023">2025</option>
					</select>
				</div>
			</div>

			<div class="col-md-3">
				<div class="form-group">
					<label for="cardType">Card Type</label>
					<select class="form-control" name="cardType">
						<option value="1">Visa</option>
						<option value="2">MasterCard</option>
					</select>
				</div>
			</div>
		</div>

		<div class="col-md-6 col-md-offset-3">
			<button type="submit" class="btn btn-success btn-block" style="margin-bottom: 30px;">Pay Now</button>
		</div>
	</form>
</div>