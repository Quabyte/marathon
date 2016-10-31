<?php

namespace App\Http\Controllers;

use App\User;
use App\Order;
use App\OrderItem;
use Carbon\Carbon;
use App\Http\Requests;
use GuzzleHttp\Client;
use App\Mail\OrderShipped;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Request as Requestor;

class FinansbankController extends Controller
{
	public $userForm;

    public function handle3D(Request $request)
    {
    	$hashparams = $_POST["HASHPARAMS"];
	 	$hashparamsval = $_POST["HASHPARAMSVAL"];
	 	$hashparam = $_POST["HASH"];
        $storekey="TRPS7211";
        $paramsval="";
        $index1=0;
	 	$index2=0;

	 while($index1 < strlen($hashparams))
	 {
   		$index2 = strpos($hashparams,":",$index1);
		$vl = $_POST[substr($hashparams,$index1,$index2- $index1)];
		if($vl == null)
		$vl = "";
 		$paramsval = $paramsval . $vl; 
		$index1 = $index2 + 1;
	}
	$storekey = "TRPS7211";
	$hashval = $paramsval.$storekey;


	

	$hash = base64_encode(pack('H*',sha1($hashval)));
	
	if($paramsval != $hashparamsval || $hashparam != $hash) 	
		echo "<h4>Güvenlik Uyarisi. Sayisal Imza Geçerli Degil</h4>";







//             ÖDEME ISLEMI ALANLARI


$name="MARATHON";       		//is yeri kullanic adi
$password="CPGKhrs7V";    		//Is yeri sifresi
$clientid=$_POST["clientid"];  		//Is yeri numarasi

$mode = "P";                            //P olursa gerçek islem, T olursa test islemi yapar
$type="Auth";   			//Auth: Satýþ PreAuth: Ön Otorizasyon
$expires = $_POST["Ecom_Payment_Card_ExpDate_Month"]."/".$_POST["Ecom_Payment_Card_ExpDate_Year"]; //Kredi Karti son kullanim tarihi mm/yy formatindan olmali                    //Kart guvenlik kodu
$tutar=$_POST["amount"];                // Islem tutari
$taksit="";           			//Taksit sayisi Pesin satislarda bos gonderilmelidir, "0" gecerli sayilmaz.
$oid= $_POST['oid'];			//Siparis numarasy her islem icin farkli olmalidir ,
                                        //bos gonderilirse sistem bir siparis numarasi üretir.






$lip=Requestor::ip();  	//Son kullanici IP adresi
$email="";  				//Email



                                    //Provizyon alinamadigi durumda taksit sayisi degistirilirse sipari numarasininda
                                    //degistirilmesi gerekir.
$mdStatus=$_POST['mdStatus'];       // 3d Secure iþleminin sonucu mdStatus 1,2,3,4 ise baþarýlý 5,6,7,8,9,0 baþarýsýzdýr
                                    // 3d Decure iþleminin sonucu baþarýsýz ise iþlemi provizyona göndermeyiniz (XML göndermeyiniz).
$xid=$_POST['xid'];                 // 3d Secure özel alani PayerTxnId
$eci=$_POST['eci'];                 // 3d Secure özel alani PayerSecurityLevel
$cavv=$_POST['cavv'];               // 3d Secure özel alani PayerAuthenticationCode
$md=$_POST['md'];                   // Eðer 3D iþlembaþarýlýsya provizyona kart numarasý yerine md deðeri gönderilir.
                                    // Son kullanma tarihi ve cvv2 gönderilmez.


if($mdStatus =="1" || $mdStatus == "2" || $mdStatus == "3" || $mdStatus == "4")
{ 	
	echo "<h5>3D Islemi Basarili</h5><br/>";

	// XML request sablonu
	$request= "DATA=<?xml version=\"1.0\" encoding=\"ISO-8859-9\"?>".
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


      $request=str_replace("{NAME}",$name,$request);


      $request=str_replace("{PASSWORD}",$password,$request);
      $request=str_replace("{CLIENTID}",$clientid,$request);
      $request=str_replace("{IP}",$lip,$request);
      $request=str_replace("{OID}",$oid,$request);
      $request=str_replace("{TYPE}",$type,$request);
      $request=str_replace("{XID}",$xid,$request);
      $request=str_replace("{ECI}",$eci,$request);
      $request=str_replace("{CAVV}",$cavv,$request);
      $request=str_replace("{MD}",$md,$request);
      $request=str_replace("{TUTAR}",$tutar,$request);
      $request=str_replace("{TAKSIT}",$taksit,$request);


     

	// Sanal pos adresine baglanti kurulmasi
	
        $url = "https://entegrasyon.asseco-see.com.tr/fim/api";  //TEST
        $ch = curl_init();
        
		curl_setopt($ch, CURLOPT_URL,$url); // set url to post to
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt ($ch, CURLOPT_HEADER, FALSE);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER,1); // return into a variable
		curl_setopt($ch, CURLOPT_TIMEOUT, 90); // times out after 90s
		curl_setopt($ch, CURLOPT_POSTFIELDS, $request); // add POST fields



        // Buraya mdStatusa göre bir kontrol koymalisiniz.
        // 3d Secure iþleminin sonucu mdStatus 1,2,3,4 ise baþarýlý 5,6,7,8,9,0 baþarýsýzdýr
        // 3d Decure iþleminin sonucu baþarýsýz ise iþlemi provizyona göndermeyiniz (XML göndermeyiniz).

		$result = curl_exec($ch); // run the whole process
//echo htmlspecialchars($result);
echo "<br>";

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


//echo $Response;
//echo $ProcReturnCode;


			if ( $Response === "Approved")
			{
				$order = Order::where('reference', '=', $_POST['oid'])->firstOrFail();

		  		return redirect()->action('FinansbankController@thankYou', ['orderRef' => $order->reference]);
	  		}
			else
			{
		        return redirect()->action('FinansbankController@error')->withErrors($ErrMsg);
			}
  		}
    }

    public function thankYou($orderRef)
    {
    	$order = Order::where('reference', '=', $orderRef)->firstOrFail();
    	$order->status = 'confirmed';
    	$order->updated_at = Carbon::now('Europe/Istanbul');
    	$userID = $order->user_id;
    	$orderItems = OrderItem::where('order_id', '=', $order->id)->get();
    	$user = User::findOrFail($userID);
    	$time = Carbon::now('Europe/Istanbul');
    	Mail::to($user->email)->send(new OrderShipped($order));
    	session()->forget('orderRef');
    	$order->save();
    	return view('thankyou', compact('order', 'time', 'user', 'orderItems'));
    }
}
