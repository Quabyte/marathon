<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

    <style type="text/css" rel="stylesheet" media="all">
        /* Media Queries */
        @media only screen and (max-width: 500px) {
            .button {
                width: 100% !important;
            }
        }
    </style>
</head>

<?php
$style = [
	'body' => 'margin: 0; padding: 0; width: 100%; background-color: #fff;',
	'panel' => 'position: relative; margin-bottom: 30px; border-width: 0; background-color: #fff; border: 1px solid transparent; border-radius: 4px; box-shadow: 0 1px 1px rgba(0,0,0,.05);',
	'panel-body' => 'position: relative; padding: 30px 30px;',
	'row' => 'margin-right: -15px; margin-left: -15px; display: block;',
	'col-md-4' => 'width: 33%; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;',
	'h4' => 'font-size: 18px; margin-bottom: 11px;',
	'margin-right-10' => 'margin-right: 10px;',
	'col-md-offset-4' => 'width: 33%; margin-left: 33%; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;',
	'font-size-26' => 'font-size: 26px;',
	'font-size-20' => 'font-size: 20px;',
	'table' => 'width: 100%; color: #76838f; margin-bottom: 22px;',
	'thead' => 'display: table-header-group; vertical-align: middle; border-color: inherit;',
	'tbody' => 'display: table-row-group; vertical-align: middle; border-color: inherit;',
	'tr' => 'display: table-row; vertical-align: inherit;',
	'th' => 'padding: 15px 8px; font-weight: 400; color: #526069; vertical-align: bottom; line-height: 1.5;',
	'td' => 'padding: 15px 8px; line-height: 1.5; vertical-align: top; border-top: 1px solid #e4eaec;',
	'text-center' => 'text-align: center !important;',
	'text-right' => 'text-align: right !important;',
	'pull-right' => 'float: right !important;',
	'amount' => 'padding-top: 10px; margin-bottom: 40px; font-size: 20px; border-top: 1px solid #e4eaec;',
];

?>

<body style="{{ $style['body'] }}">
	<p>Dear Customer, thank you for your purchase!</p>
	<div style="{{ $style['panel'] }}">
		<div style="{{ $style['panel-body'] }}">

			<div style="{{ $style['row'] }}">
				<div style="{{  $style['col-md-4'] }}">
					<h4 style="{{ $style['h4'] }}">
						<img src="{{ $message->embed('https://istanbulmarathon.co/images/detur_logo.png') }}">
					</h4>
					<address>
						Büyükdere Cad. Özsezen İş Merkezi<br>
						C Blok Esentepe 34394 İSTANBUL/TÜRKİYE<br> 
						<abbr title="Mail">Email:</abbr> info@detur.com <br>
						<abbr title="Phone">Phone:</abbr> +90 212 217 77 60 <br>
						<abbr title="Fax">Fax:</abbr> +90 212 217 77 40
					</address>
				</div>

				<div style="{{ $style['col-md-offset-4']  }}">
					<h4 style="{{ $style['h4']  }}">Invoice Info</h4>
					<a style="{{ $style['font-size-26'] }}" href="javascript:void(0)">#{{ $order->reference }}</a><br>
					To:
					<p style="{{ $style['font-size-20'] }}">{{ $user->name }}</p>
					<span>Invoice Date: {{ $order->created_at }}</span>
				</div>
			</div>

			<div style="{{ $style['row'] }}">
				<table style="{{ $style['table'] }}">
					<thead style="{{ $style['thead'] }}">
						<tr style="{{ $style['tr'] }}">
							<th style="{{ $style['th'] }}">Description</th>
							<th style="{{ $style['th'] . $style['text-center'] }}">Quantity</th>
							<th style="{{ $style['th'] . $style['text-right'] }}">Unit Cost</th>
							<th style="{{ $style['th'] . $style['text-right'] }}">Total</th>
						</tr>
					</thead>
					<tbody style="{{ $style['tbody'] }}">
						@foreach (Cart::content() as $row)
							<tr style="{{ $style['tr'] }}">
								<td style="{{ $style['td'] }}">{{ $row->name }}</td>
								<td style="{{ $style['td'] . $style['text-center'] }}">{{ $row->qty }}</td>
								<td style="{{ $style['td'] . $style['text-right'] }}">{{ $row->price }}€</td>
								<td style="{{ $style['td'] . $style['text-right'] }}">{{ $row->total }}€</td>
							</tr>							
						@endforeach
					</tbody>					
				</table>
			</div>

			<div style="{{ $style['row'] }}">
				<div style="{{ $style['text-right'] }}">
					<div style="{{ $style['pull-right'] }}">
						<p style="{{ $style['amount'] }}">TOTAL: <span>{{ Cart::total() }}€</span></p>
					</div>
				</div>
			</div>

		</div>
	</div>
</body>
</html>