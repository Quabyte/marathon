<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as Requestor;

class FinansbankController extends Controller
{
	private $userForm;

    public function prepare(Request $request)
    {
    	$this->userForm = [
    		'pan' => $request->pan,
    		'cv2' => $request->cv2,
    		'Ecom_Payment_Card_ExpDate_Year' => $request->Ecom_Payment_Card_ExpDate_Year,
    		'Ecom_Payment_Card_ExpDate_Month' => $request->Ecom_Payment_Card_ExpDate_Month,
    		'cardType' => $request->cardType,
    		'clientid' => '600100000',
    		'oid' => session('orderRef'),
    		'amount' => Cart::total(),
    		'okUrl' => 'http://test.trewout.com/handle3D',
    		'failUrl' => 'http://test.trewout.com/handle3D',
    		'storetype' => '3d',
    		'rnd' => Carbon::now('Europe/Istanbul'),
    	];

    	$storeKey = '123456';

    	$hashStr = $this->userForm['clientid'] . $this->userForm['oid'] . $this->userForm['amount'] . $this->userForm['okUrl'] . $this->userForm['failUrl'] . $this->userForm['rnd'] . $storeKey;

    	$hash = base64_encode(pack('H*',sha1($hashstr)));

    	$this->userForm['hash'] = $hash;

    	$ch = curl_init();

    	$url = 'https://entegrasyon.asseco-see.com.tr/fim/est3Dgate';
    	curl_setopt($ch, CURLOPT_URL,$url); 
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST,1);
		curl_setopt($ch, CURLOPT_SSLVERSION, 3);
		
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,0);
		
		curl_setopt($ch, CURLOPT_RETURNTRANSFER,1); 
		curl_setopt($ch, CURLOPT_TIMEOUT, 90); 
		curl_setopt($ch, CURLOPT_POSTFIELDS, $this->userForm);

		$result = curl_exec($ch);

		if (curl_errno($ch)) {
           print curl_error($ch);
       	} else {
           curl_close($ch);
       	}
    }

    public function handle3D(Request $request)
    {
    	$hashParams = $request->HASHPARAMS;
    	$hashParamsVal = $request->HASHPARAMSVAL;
    	$hashParam = $request->HASH;
    	$storeKey = '123456';
    	$paramsVal = '';
    	$index1 = 0;
    	$index2 = 0;

    	while ($index1 < strlen($hashParams)) {
    		$index2 = strpos($hashParams, ':', $index1);
    		$vl = $request->substr($hashparams,$index1,$index2- $index1);
    		if ($vl == null) {
    			$vl = '';
    			$paramsVal = $paramsVal . $vl;
    			$index1 = $index2 + 1;
    		}
    	}

    	$storeKey = '12345';
    	$hashVal = $paramsVal . $storeKey;

    	$hash = base64_encode(pack('H*',sha1($hashval)));

    	if($paramsval != $hashparamsval || $hashparam != $hash) {
    		echo "<h4>Güvenlik Uyarisi. Sayisal Imza Geçerli Degil</h4>";
    	}

    	$name = 'FINANSAPI';
    	$password = 'FINANS';
    	$clientid = $request->clientid;
    	$mode = 'P';
    	$type = 'Auth';
    	$expires = $request->Ecom_Payment_Card_ExpDate_Month . '/' . $request->Ecom_Payment_Card_ExpDate_Year;
    	$cv2 = $request->cv2;
    	$amount = $request->amount;
    	$taksit = '';
    	$oid = $request->oid;
    	$lip = Requestor::ip();
    	$email = '';
    	$mdStatus = $request->mdStatus;
    	$xid = $request->xid;
    	$eci = $request->eci;
    	$cavv = $request->cavv;
    	$md = $request->md;

    	if($mdStatus =="1" || $mdStatus == "2" || $mdStatus == "3" || $mdStatus == "4")
		{ 	
			echo "<h5>3D Islemi Basarili</h5><br/>";

		// XML request sablonu
		$xml= "DATA=<?xml version=\"1.0\" encoding=\"ISO-8859-9\"?>".
		"<CC5Request>".
		"<Name>{NAME}</Name>".
		"<Password>{PASSWORD}</Password>".
		"<ClientId>{CLIENTID}</ClientId>".
		"<IPAddress>{IP}</IPAddress>".
		"<Email>{EMAIL}</Email>".
		"<Mode>P</Mode>".
		"<OrderId>{OID}</OrderId>".
		"<GroupId></GroupId>".
		"<TransId></TransId>".
		"<UserId></UserId>".
		"<Type>{TYPE}</Type>".
		"<Number>{MD}</Number>".
		"<Expires></Expires>".
		"<Cvv2Val></Cvv2Val>".
		"<Total>{TUTAR}</Total>".
		"<Currency>949</Currency>".
		"<Taksit>{TAKSIT}</Taksit>".
		"<PayerTxnId>{XID}</PayerTxnId>".
		"<PayerSecurityLevel>{ECI}</PayerSecurityLevel>".
		"<PayerAuthenticationCode>{CAVV}</PayerAuthenticationCode>".
		"<CardholderPresentCode>13</CardholderPresentCode>".
		"<BillTo>".
		"<Name></Name>".
		"<Street1></Street1>".
		"<Street2></Street2>".
		"<Street3></Street3>".
		"<City></City>".
		"<StateProv></StateProv>".
		"<PostalCode></PostalCode>".
		"<Country></Country>".
		"<Company></Company>".
		"<TelVoice></TelVoice>".
		"</BillTo>".
		"<ShipTo>".
		"<Name></Name>".
		"<Street1></Street1>".
		"<Street2></Street2>".
		"<Street3></Street3>".
		"<City></City>".
		"<StateProv></StateProv>".
		"<PostalCode></PostalCode>".
		"<Country></Country>".
		"</ShipTo>".
		"<Extra></Extra>".
		"</CC5Request>";


	      $xml=str_replace("{NAME}",$name,$xml);


	      $xml=str_replace("{PASSWORD}",$password,$xml);
	      $xml=str_replace("{CLIENTID}",$clientid,$xml);
	      $xml=str_replace("{IP}",$lip,$xml);
	      $xml=str_replace("{OID}",$oid,$xml);
	      $xml=str_replace("{TYPE}",$type,$xml);
	      $xml=str_replace("{XID}",$xid,$xml);
	      $xml=str_replace("{ECI}",$eci,$xml);
	      $xml=str_replace("{CAVV}",$cavv,$xml);
	      $xml=str_replace("{MD}",$md,$xml);
	      $xml=str_replace("{TUTAR}",$amount,$xml);
	      $xml=str_replace("{TAKSIT}",$taksit,$xml);

	      $url = "https://entegrasyon.asseco-see.com.tr/fim/api";  //TEST

			$ch = curl_init();    
			
			curl_setopt($ch, CURLOPT_URL,$url); 
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST,1);
			curl_setopt($ch, CURLOPT_SSLVERSION, 3);
			
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,0);
			
			curl_setopt($ch, CURLOPT_RETURNTRANSFER,1); 
			curl_setopt($ch, CURLOPT_TIMEOUT, 90); 
			curl_setopt($ch, CURLOPT_POSTFIELDS, $xml);

			$result = curl_exec($ch);
  		}

  		if (curl_errno($ch)) {
           print curl_error($ch);
       	} else {
           curl_close($ch);
       	}

       	$Response ="";
	 	$OrderId ="";
	 	$AuthCode  ="";
	 	$ProcReturnCode    ="";
	 	$ErrMsg  ="";
	 	$HOSTMSG  ="";
	 	$HostRefNum = "";
	 	$TransId="";

		$response_tag="Response";
		$posf = strpos (  $result, ("<" . $response_tag . ">") );
		$posl = strpos (  $result, ("</" . $response_tag . ">") ) ;
		$posf = $posf+ strlen($response_tag) +2 ;
		$Response = substr (  $result, $posf, $posl - $posf) ;

		$response_tag="OrderId";
		$posf = strpos (  $result, ("<" . $response_tag . ">") );
		$posl = strpos (  $result, ("</" . $response_tag . ">") ) ;
		$posf = $posf+ strlen($response_tag) +2 ;
		$OrderId = substr (  $result, $posf , $posl - $posf   ) ;

		$response_tag="AuthCode";
		$posf = strpos (  $result, "<" . $response_tag . ">" );
		$posl = strpos (  $result, "</" . $response_tag . ">" ) ;
		$posf = $posf+ strlen($response_tag) +2 ;
		$AuthCode = substr (  $result, $posf , $posl - $posf   ) ;

		$response_tag="ProcReturnCode";
		$posf = strpos (  $result, "<" . $response_tag . ">" );
		$posl = strpos (  $result, "</" . $response_tag . ">" ) ;
		$posf = $posf+ strlen($response_tag) +2 ;
		$ProcReturnCode = substr (  $result, $posf , $posl - $posf   ) ;

		$response_tag="ErrMsg";
		$posf = strpos (  $result, "<" . $response_tag . ">" );
		$posl = strpos (  $result, "</" . $response_tag . ">" ) ;
		$posf = $posf+ strlen($response_tag) +2 ;
		$ErrMsg = substr (  $result, $posf , $posl - $posf   ) ;

		$response_tag="HostRefNum";
		$posf = strpos (  $result, "<" . $response_tag . ">" );
		$posl = strpos (  $result, "</" . $response_tag . ">" ) ;
		$posf = $posf+ strlen($response_tag) +2 ;
		$HostRefNum = substr (  $result, $posf , $posl - $posf   ) ;

		$response_tag="TransId";
		$posf = strpos (  $result, "<" . $response_tag . ">" );
		$posl = strpos (  $result, "</" . $response_tag . ">" ) ;
		$posf = $posf+ strlen($response_tag) +2 ;
		$$TransId = substr (  $result, $posf , $posl - $posf   ) ;

		if ( $Response === "Approved")
		{
	  		echo "Ödeme isleminiz basariyla gerçeklestirildi";
  		}
		else
		{
	        echo "Ödeme isleminiz basariyla gerçeklestirilmedi.Hata=".$ErrMsg;
		}
    }
}
