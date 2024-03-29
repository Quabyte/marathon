<div class="col-md-8 col-md-offset-2" style="padding:15px 25px; background: #eee; border-radius: 5px; border: 1px solid #e1e1e1;">
	<form method="post" action="https://www.fbwebpos.com/fim/est3Dgate">
			{{ csrf_field() }}
			<div class="row">
				<div class="col-md-12">
					<div class="form-group">
                        <label for="pan">Credit Card Number</label>
                        <input type="text" name="pan" size="20" class="form-control"/>
                	</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
                        <label for="Ecom_Payment_Card_ExpDate_Year">Expiry Year</label>
                        <select name="Ecom_Payment_Card_ExpDate_Year" class="form-control">
                        	<option value="2016">2016</option>
                        	<option value="2017">2017</option>
                        	<option value="2018">2018</option>
                        	<option value="2019">2019</option>
                        	<option value="2020">2020</option>
                        	<option value="2021">2021</option>
                        	<option value="2022">2022</option>
                        	<option value="2023">2023</option>
                        	<option value="2024">2024</option>
                        	<option value="2025">2025</option>
                        </select>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
	                    <label for="Ecom_Payment_Card_ExpDate_Month">Expiry Month</label>
	                    <select name="Ecom_Payment_Card_ExpDate_Month" class="form-control">
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
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label for="cardType">Payment Method</label>
                        <select name="cardType" class="form-control">
                            <option value="1">Visa</option>
                            <option value="2">MasterCard</option>
                        </select>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
                        <label for="cv2">Security Code</label>
	                    <input type="password" name="cv2" size="4" value="" class="form-control"/>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div>
                    	<i class="icon fa-cc-mastercard" style="font-size: 32px;"></i>
				    	<i class="icon fa-cc-visa" style="font-size: 32px;"></i>
				    	<i class="icon fa-cc-amex" style="font-size: 32px;"></i>
                    </div>
				</div>
				<div class="col-md-6">
                    <input type="submit" value="Pay Now" class="btn btn-block btn-danger" style="margin-top: 10px;" />
				</div>
			</div>
            <input type="hidden" name="clientid" value="601117211">
    
            <input type="hidden" name="amount" value="{!! $total !!}">
            <input type="hidden" name="oid" value="{!! $reference !!}">    
            <input type="hidden" name="okUrl" value="https://istanbulmarathon.co/handle3D">
            <input type="hidden" name="failUrl" value="https://istanbulmarathon.co/handle3D">
            <input type="hidden" name="rnd" value="{!! $rnd !!}" >
            <input type="hidden" name="hash" value="{!! $hash !!}" >
            
            <input type="hidden" name="storetype" value="3d" >      
            <input type="hidden" name="lang" value="tr">
            <input type="hidden" name="currency" value="949">
            <input type="hidden" name="email" value="{{ $email }}">
    </form>
    <div class="col-md-3 col-md-offset-6">
    </div>
</div>