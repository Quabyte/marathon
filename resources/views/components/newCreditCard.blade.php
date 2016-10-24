<div class="col-md-12">
	{{-- <form method="post" action="https://entegrasyon.asseco-see.com.tr/fim/est3Dgate">
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

		<input type="hidden" name="clientid" value="600100000">
		<input type="hidden" name="oid" value="{{ $reference }}">
		<input type="hidden" name="amount" value="{{ $total }}">
		<input type="hidden" name="okUrl" value="http://marathon.dev/handle3D">
		<input type="hidden" name="failUrl" value="http://marathon.dev/handle3D">
		<input type="hidden" name="storetype" value="3d">
		<input type="hidden" name="rnd" value="{{ $rnd }}">
		<input type="hidden" name="hash" value="{{ $hash }}">

		<div class="col-md-6 col-md-offset-3">
			<button type="submit" class="btn btn-success btn-block" style="margin-bottom: 30px;">Pay Now</button>
		</div>
	</form> --}}

	<form method="post" action="https://entegrasyon.asseco-see.com.tr/fim/est3Dgate">
		{{ csrf_field() }}
                <table>
                    <tr>
                        <td>Kredi Kart Numarasi:</td>
                        <td><input type="text" name="pan" size="20"/>
                    </tr>
                    
                    <tr>
                        <td>Güvenlik Kodu:</td>
                        <td><input type="text" name="cv2" size="4" value=""/></td>
                    </tr>
                    
                    <tr>
                        <td>Son Kullanma Yili:</td>
                        <td><input type="text" name="Ecom_Payment_Card_ExpDate_Year" value=""/></td>
                    </tr>
                    
                    <tr>
                        <td>Son Kullanma Ayi:</td>
                        <td><input type="text" name="Ecom_Payment_Card_ExpDate_Month" value=""/></td>
                    </tr>
                    
                    <tr>
                        <td>Visa/MC secimi</td>
                        <td><select name="cardType">
                            <option value="1">Visa</option>
                            <option value="2">MasterCard</option>
                        </select>
                    </tr>
                    
                    <tr>
                        <td align="center" colspan="2">
                            <input type="submit" value="Ödemeyi Tamamla"/>
                        </td>
                    </tr>
                    
                </table>
                <input type="hidden" name="clientid" value="600100000">
        
                <input type="hidden" name="amount" value="{!! $total !!}">
                <input type="hidden" name="oid" value="{!! $reference !!}">    
                <input type="hidden" name="okUrl" value="https://test.trewout.com/handle3D">
                <input type="hidden" name="failUrl" value="https://test.trewout.com/handle3D">
                <input type="hidden" name="rnd" value="{!! $rnd !!}" >
                <input type="hidden" name="hash" value="{!! $hash !!}" >
                
                <input type="hidden" name="storetype" value="3d" >      
                <input type="hidden" name="lang" value="tr">
                <input type="hidden" name="currency" value="949">
                
               
            </form>
</div>