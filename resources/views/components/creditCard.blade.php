{{-- <div class="col-lg-12 form-group">
  <div class="example-responsive example form-group">
    <div class="col-lg-12 col-md-6 clearfix form-group">
      <div class="card-wrapper" id="cardContainer"></div>
    </div>
  </div>
  <div class="col-lg-12 col-md-6">
    <div class="example-wrap">
      <form class="card" data-plugin="card" data-target="#cardContainer">
        <div class="form-group">
          <label class="control-label margin-bottom-15" for="inputCardNumber">Card Number</label>
          <input type="text" class="form-control" id="inputCardNumber" name="number" placeholder="Card number">
        </div>
        <div class="form-group">
          <label class="control-label margin-bottom-15" for="inputFullName">Full Name</label>
          <input type="text" class="form-control" id="inputFullName" name="name" placeholder="Full name">
        </div>
        <div class="form-group">
          <label class="control-label margin-bottom-15" for="inputExpiry">Expiry</label>
          <input type="text" class="form-control" id="inputExpiry" name="expiry" placeholder="MM/YY">
        </div>
        <div class="form-group">
          <label class="control-label margin-bottom-15" for="inputCVC">CVC</label>
          <input type="text" class="form-control" id="inputCVC" name="cvc" placeholder="CVC">
        </div>
        <button type="submit" class="btn btn-block btn-success"><i class="icon wb-payment"></i> Pay Now</button>
      </form>
    </div>
    <div class="col-md-6 col-md-offset-3">
    	<i class="icon fa-cc-mastercard" aria-hidden="true" style="font-size: 46px;"></i>
		<i class="icon fa-cc-visa" aria-hidden="true" style="font-size: 46px;"></i>
		<i class="icon fa-cc-amex" aria-hidden="true" style="font-size: 46px;"></i>
    </div>
    
  </div>
</div> --}}
<div class="col-md-6 col-md-offset-3">
  <a href="{{ action('PaymentController@send') }}" class="btn btn-block btn-success"><i class="icon wb-payment"></i> Pay Now</a>
</div>