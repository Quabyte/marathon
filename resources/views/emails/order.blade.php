<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>38. Vodafone Istanbul Marathon</title>
        
        <!--- STYLES -->
        <link rel="stylesheet" href="https://istanbulmarathon.co/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="https://istanbulmarathon.co/css/bootstrap-extend.min.css">
        <link rel="stylesheet" type="text/css" href="https://istanbulmarathon.co/css/custom.css">
        
        <!-- PLUGINS -->
        <link rel="stylesheet" type="text/css" href="https://istanbulmarathon.co/css/animsition.min.css">
        <link rel="stylesheet" type="text/css" href="https://istanbulmarathon.co/css/asScrollable.min.css">
        	<link rel="stylesheet" type="text/css" href="https://istanbulmarathon.co/css/invoice.min.css">
        
        <!-- FONTS -->
        <link rel="stylesheet" type="text/css" href="https://istanbulmarathon.co/fonts/web-icons/web-icons.min.css">
        <link rel="stylesheet" type="text/css" href="https://istanbulmarathon.co/fonts/font-awesome/font-awesome.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,300italic">

        <!-- SCRIPTS -->
        <script src="https://istanbulmarathon.co/js/modernizr.min.js"></script>
        <script src="https://istanbulmarathon.co/js/breakpoints.min.js"></script>
        <script>
            Breakpoints();
        </script>
</head>
<body>
	<div class="panel">
		<div class="panel-body">

			<div class="row">
				<div class="col-md-4">
					<h4>
						<img src="{{ $message->embed('https://istanbulmarathon.co/images/detur_logo.png') }}" class="margin-right-10">
					</h4>
					<address>
						Büyükdere Cad. Özsezen İş Merkezi<br>
						C Blok Esentepe 34394 İSTANBUL/TÜRKİYE<br> 
						<abbr title="Mail">Email:</abbr> info@detur.com <br>
						<abbr title="Phone">Phone:</abbr> +90 212 217 77 60 <br>
						<abbr title="Fax">Fax:</abbr> +90 212 217 77 40
					</address>
				</div>

				<div class="col-md-4 col-md-offset-4 text-right">
					<h4>Invoice Info</h4>
					<a class="font-size-26" href="javascript:void(0)">#{{ $order->reference }}</a><br>
					To:
					<p class="font-size-20">{{ $user->name }}</p>
					<span>Invoice Date: {{ $order->created_at }}</span>
				</div>
			</div>

			<div class="row">
				<table class="table table-responsive table-hover">
					<thead>
						<tr>
							<th>Description</th>
							<th class="text-center">Quantity</th>
							<th class="text-right">Unit Cost</th>
							<th class="text-right">Total</th>
						</tr>
					</thead>
					<tbody>
						@foreach (Cart::content() as $row)
							<tr>
								<td>{{ $row->name }}</td>
								<td class="text-center">{{ $row->qty }}</td>
								<td class="text-right">{{ $row->price }}€</td>
								<td class="text-right">{{ $row->total }}€</td>
							</tr>							
						@endforeach
					</tbody>					
				</table>
			</div>

			<div class="row">
				<div class="text-right clearfix">
					<div class="pull-right">
						<p class="page-invoice-amount">TOTAL: <span>{{ Cart::total() }}€</span></p>
					</div>
				</div>
			</div>

		</div>
	</div>

	<script src="https://istanbulmarathon.co/js/jquery.min.js"></script>
	<script src="https://istanbulmarathon.co/js/bootstrap.min.js"></script>
</body>
</html>