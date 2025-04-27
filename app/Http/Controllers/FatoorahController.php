<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\Transaction;
use App\Http\Services\FatoorahService;
use Illuminate\Support\Facades\Http;
use Mail;
//use Illuminate\Http\Client\Request;
use Redirect;


class FatoorahController extends Controller
{

    private $fatoorahservice;
    public function __construct(FatoorahService $fatoorahservice){
        $this->fatoorahservice=$fatoorahservice;
        $TextEncode = 'UTF-8';
    
        // UserName & Password
         $UserName="bnader204930";
         $Password="dreamto5";
    
        // Main URL for Server on HTTPS only
         static $URLGateway = "https://sms.malath.net.sa";
        // Url 4 Send SMS
         static $URLGateway_Send = "/httpSmsProvider.aspx";
        // Url 4 Get Balance
         static $URLGateway_Credit = "/api/getBalance.aspx";
        // Url 4 Get & ADD Sender Names
         static $URLGateway_Sender = "/apis/users.aspx";
    
        // Number of Mobile Numbers That Will Send Every Request .
         $NUM_Send_Per_Req = 120;
    }
    // private $apiURL = 'https://apitest.myfatoorah.com';
    // private $apiKey = 'rLtt6JWvbUHDDhsZnfpAhpYk4dxYDQkbcPTyGaKp2TYqQgG7FGZ5Th_WD53Oq8Ebz6A53njUoo1w3pjU1D4vs_ZMqFiz_j0urb_BH9Oq9VZoKFoJEDAbRZepGcQanImyYrry7Kt6MnMdgfG5jn4HngWoRdKduNNyP4kzcp3mRv7x00ahkm9LAK7ZRieg7k1PDAnBIOG3EyVSJ5kK4WLMvYr7sCwHbHcu4A5WwelxYK0GMJy37bNAarSJDFQsJ2ZvJjvMDmfWwDVFEVe_5tOomfVNt6bOg9mexbGjMrnHBnKnZR1vQbBtQieDlQepzTZMuQrSuKn-t5XZM7V6fCW7oP-uXGX-sMOajeX65JOf6XVpk29DP6ro8WTAflCDANC193yof8-f5_EYY-3hXhJj7RBXmizDpneEQDSaSz5sFk0sV5qPcARJ9zGG73vuGFyenjPPmtDtXtpx35A-BVcOSBYVIWe9kndG3nclfefjKEuZ3m4jL9Gg1h2JBvmXSMYiZtp9MR5I6pvbvylU_PP5xJFSjVTIz7IQSjcVGO41npnwIxRXNRxFOdIUHn0tjQ-7LwvEcTXyPsHXcMD8WtgBh-wxR8aKX7WPSsT1O8d8reb2aR7K3rkV3K82K_0OgawImEpwSvp9MNKynEAJQS6ZHe_J_l77652xwPNxMRTMASk1ZsJL';
    public function pay(Request $request){
        $order=Order::create([
            'user_id' => auth('user')->user()->id,
            
            'net_price'=>\Cart::session(auth('user')->user()->mobile)->getTotal(),
            'tax'=>\Cart::session(auth('user')->user()->mobile)->getTotal()*0.15,
            'total_price'=>((\Cart::session(auth('user')->user()->mobile)->getTotal())*0.15)+\Cart::session(auth('user')->user()->mobile)->getTotal(),
            'discount'=>0,
            'package_cost'=>0,
            'coupon'=>'',
            'latitude'=>$request->lat,
            'longitude'=>$request->lon,
            'status'=>0,
            'payment_method'=>$request->payment_method,
            'ddate'=>$request->ddate,
            'dtime'=>$request->dtime
            
        ]);
        $cartitems=\Cart::session(auth('user')->user()->mobile)->getContent()->toArray();
        foreach($cartitems as $item){
            OrderDetails::create([
                 'order_id'=>$order->id,
                'item_name'=>$item['name'],
                'quantity'=>$item['quantity'],
                'cut_type'=>$item['attributes']['segm'],
                'pack'=>$item['attributes']['pack'],
                'internal'=>$item['attributes']['with'],
                'stamp'=>$item['attributes']['withstamp'],
                'ahead'=>$item['attributes']['withhead'],
                'comment'=>$item['attributes']['notes']
             ]);
         }
         
       
            if($request['payment_method']=='الدفع بالانترنت'){
        
       $user=auth('user')->user();
       $total=((\Cart::session(auth('user')->user()->mobile)->getTotal())*0.15)+\Cart::session(auth('user')->user()->mobile)->getTotal();
       //dd($total); 
       $invoiceItems[] = [
            'ItemName'  => $order->id, //ISBAN, or SKU
            'Quantity'  => '1', //Item's quantity
            'UnitPrice' => $total, //Price per item
            ];
            $data = [
            //Fill required data
            'NotificationOption' => 'Lnk', //'SMS', 'EML', or 'ALL'
            'InvoiceValue'       => $total,
            'CustomerName'       => $user->name,
                //Fill optional data
                'DisplayCurrencyIso' => 'SAR',
                'MobileCountryCode'  => '+965',
                'CustomerMobile'     => $user->mobile,
                'Tax Number'=> '3110440546',
                'CustomerEmail'      => $user->email,
                'CallBackUrl'        => route('fatoorah.callback'),
                'ErrorUrl'           => route('onlineerror'), //or 'https://example.com/error.php'
                'InvoiceItems'       => $invoiceItems,
        ];
          //dd('test');
          
       return $this->fatoorahservice->sendPayment($data);
    }else{
        $UserName="bnader204930";
        $Password="dreamto5";
        $Name="KHARUFALBYT";
        $Mobiles=auth('user')->user()->mobile;
        $Mobiles = '966'.ltrim($Mobiles, '0');
        
        $SMS_Msg="شكرا لطلبكم من خروف البيت  اطلع على الفاتورة من خلال هذا الرابط :https://www.kharufalbayt.com.sa/report/".$order->id;
        
        $this->setInfo($UserName, $Password, 'UTF-8');
        $this->Send_SMS($Mobiles,$Name,$SMS_Msg);
		Mail::send('front.mail',['order_id' => $order->id,'method'=>$request->payment_method], function ($m) {
            $m->from('kharufalbyt@gmail.com', 'Kharoufalbayt');

            $m->to('info@kharufalbayt.com.sa')->subject('تم اضافة طلب جديد');
             });
    \Cart::session(auth('user')->user()->mobile)->clear();
    return view('front.completepayment');
    }
    }
    
    public function paymentcallback(Request $request){
        $keyId   = $request->paymentId;
        $KeyType = 'paymentId';
        $postFields = [
            'Key'     => $keyId,
            'KeyType' => $KeyType
        ];
        $response = Http::withHeaders([
            'Content-Type'=>'application/json',
            'authorization'=>'Bearer '. env('fatoorah_token')
        ])->post('https://api-sa.myfatoorah.com/v2/getPaymentStatus',$postFields);

         $orderId=$response['Data']['InvoiceItems'][0]['ItemName'];
         $paymentGetway=$response['Data']['InvoiceTransactions'][0]['PaymentGateway'];
          
         $transaction=Transaction::create([
            'payment_id'=>$request->paymentId,
            'payment_getway'=>$paymentGetway,
            'order_id'=>$orderId
         ]);
        $order = Order::find($orderId);
        $order->status=1;
        $order->save();
        return redirect()->route('onlinesuccess');
        //dd($response['Data']);
    }

    // Text Encode that will send ( Your Page or PHP File Encode ) -> ( WINDOWS-1256 || UTF-8 );


/**************************************************************************************
 * #################### Construct #####################
**************************************************************************************/
	function setInfo($User,$Pass,$TextEncode){
		$this->setUserName($User);
		$this->setPassword($Pass);
		$this->setTextEncode($TextEncode);
	}
/**************************************************************************************
 * #################### Send SMS #####################
**************************************************************************************/

 function Send_SMS($Mobiles,$Sender,$Msg){
    $UserName="bnader204930";
    $Password="dreamto5";
    static $URLGateway = "https://sms.malath.net.sa";
	// Url 4 Send SMS
	 static $URLGateway_Send = "/httpSmsProvider.aspx";
	// Url 4 Get Balance
	 static $URLGateway_Credit = "/api/getBalance.aspx";
	// Url 4 Get & ADD Sender Names
	 static $URLGateway_Sender = "/apis/users.aspx";
    $NUM_Send_Per_Req=120;
    $TextEncode ='UTF-8';
        $MSG_Length = strlen($Msg);
        $MSG_Count = $this->Count_MSG($Msg);
        
        // 1010 -> SMS Text Grater that 6 part .
        if($MSG_Count>6){
          return 1010;
        }

        if($TextEncode ==='UTF-8')
            $Msg = iconv('UTF-8','WINDOWS-1256',$Msg);

		if($this->IsItUnicode($Msg)){
			$Msg = ToUnicode($Msg);
			$UC = 'U';
		}else{
			$UC = 'E';
		}

		$Msg = urlencode($Msg);
        

		try {
			$Result = -1;
    		$_EX_Num = explode(',',$Mobiles);
    		$EX_Num_Count = count($_EX_Num);
    		$_Qesmh = ceil($EX_Num_Count/$NUM_Send_Per_Req);
    		$counter = 0;
			$COUNT_OK = $COUNT_FAIL = 0;
			$SEND_OK = $SEND_FAIL = 0;
			$MOB_OK = $MOB_FAIL = '';

			  for ($i=1; $i<=$_Qesmh; $i++)  {
			        $slice = array_slice($_EX_Num, $counter, $NUM_Send_Per_Req);

			        $Numr = '';
			        foreach($slice as $_Numr){
			            if( $this->IsMobile($_Numr) && !in_array($_Numr,explode(',',$Numr)) ){
					        $Numr .= $_Numr.',';
			            }
			        }

			        $Numr = substr($Numr,0,-1);
			        if(substr($Numr,0,-1)==',')
			            $Numr = substr($Numr,0,-1);

			        $_Count_Num = count(explode(',',$Numr));

					$URL = $URLGateway_Send."?username=".$UserName."&password=".$Password."&mobile=".$Numr."&sender=".$Sender."&message=".$Msg."&unicode=".$UC;

                    $_url = $URLGateway.$URL;
                    $curl = curl_init();
                    curl_setopt($curl, CURLOPT_URL, $_url);
                    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($curl, CURLOPT_HEADER, false);

                    // execute and return string (this should be an empty string '')
                    $Result = curl_exec($curl);
                    curl_close($curl);

	    			//$Result = DT_URLGetData($this::$URLGateway,$URL);
	    			$Result = (integer)str_replace(" ","",$Result);

	    			// -1 -> Something Wrong !!
					// 0 -> Your Message has Sent successfully.
					// 101 -> Parameter are missing.
					// 104 -> Either user name or password are missing or your Account is on hold.
					// 105 -> Credit are not available.
					// 106 -> Wrong Unicode.
					// 107 -> Blocked Sender Name.
					// 108 -> Missing Sender name.
					// 1010 -> SMS Text Grater that 6 part .
					// ELSE -> Unknown Error !.

	    			if($Result==0){
	    				$COUNT_OK += $_Count_Num;
	    				$SEND_OK = 'OK';
	    				$MOB_OK .= $Numr.',';
	    			}else{
	    				$COUNT_FAIL += $_Count_Num;
	    				$SEND_FAIL = 'FAIL';
	    				$MOB_FAIL .= $Numr.',';
	    			}
			        $counter += $NUM_Send_Per_Req;
			  }


            $SUB_CREDIT = $MSG_Count * $COUNT_OK;

			$SendReply = array(
							'RESULT'	=>$Result,
							'SEND_OK'	=>$SEND_OK,
							'SEND_FAIL'	=>$SEND_FAIL,
							'COUNT_OK'	=>$COUNT_OK,
							'COUNT_FAIL'=>$COUNT_FAIL,
							'MOB_OK'	=>substr($MOB_OK,0,-1),
							'MOB_FAIL'	=>substr($MOB_FAIL,0,-1),
							'MSG_Length'=>$MSG_Length,
							'MSG_Count'	=>$MSG_Count,
							'SUB_CREDIT'=>$SUB_CREDIT
						);

			return $SendReply;

		} catch (\Exception $e) {
			return $e->getMessage();
		}

	}

/**************************************************************************************
 * #################### Check User Name and Password #####################
**************************************************************************************/


	 function CheckUserPassword(){

	    $URL = $URLGateway_Sender."?code=1&username=".UserName."&password=".Password;

	    $Result = DT_URLGetData($URLGateway,$URL);

		if($Result){
			$Result = (integer)str_replace(" ","",$Result);
			// 3101 -> Success.
			// 3102 -> Wrong Password.
			// 3103 -> User Name Don’t Exist.
			// 3104 -> Account Inactive .
			// 3105 -> Missing Parameter .
			// ELSE -> Unknown Error !.
			$Result = array(
							'RESULT'	=>$Result,
						);
			return $Result;
		}else{
			return 'Connection Error';
		}

	}


/**************************************************************************************
 * #################### Get Sender Names #####################
**************************************************************************************/


	 function GetSenders(){

	    $URL = $URLGateway_Sender."?code=9&username=".UserName."&password=".Password;

	    $Result = DT_URLGetData($URLGateway,$URL,1024);

		if($Result){
			// Review senders -> Success.
			// 3102 -> Wrong Password.
			// 3103 -> User Name Don’t Exist.
			// 3104 -> Account Inactive.
			// 3105 -> Missing Parameter.
			// 3405 -> Time Out Operation.
			// ELSE -> Unknown Error !.
			$Result = str_replace('New SMS','1',$Result);
			$Result = explode(",",$Result);
    		return $Result;
		}else{
			return 'Connection Error';
		}

	}


/**************************************************************************************
 * #################### Get Your Credits #####################
**************************************************************************************/


	 function GetCredits(){

	    $URL = $URLGateway_Credit."?username=".UserName."&password=".Password;

	    $Result = DT_URLGetData($URLGateway,$URL);

		if($Result){
			$Result = (integer)str_replace(" ","",$Result);
			return $Result;
		}else{
			return 'Connection Error';
		}

	}

/**************************************************************************************
 * #################### ADD Sender Name #####################
**************************************************************************************/


	 function AddSender($Name){

	    $URL = $URLGateway_Sender."?code=2&username=".$UserName."&password=".$Password."&newsender=".$Name;

	    $Result = DT_URLGetData($URLGateway,$URL);

		if($Result){
			$Result = (integer)str_replace(" ","",$Result);
			// 143 -> Your Sender Name has been received.
			// 3102 -> Wrong Password.
			// 3103 -> User Name Don’t Exist.
			// 3104 -> Parameter are missing.
			// 443 -> Sender Name Violation Rule.
			// 444 -> Sender Name exist.
			// 3105 -> Missing Parameter.
			// ELSE -> Unknown Error !.
			$Result = array(
							'RESULT'	=>$Result,
						);
			return $Result;
		}else{
			return 'Connection Error';
		}

	}


/**************************************************************************************
 * #################### String Length #####################
**************************************************************************************/


	//  function strlen($Text){

    //     if(TextEncode=='UTF-8')
    //         $Text = iconv('UTF-8','WINDOWS-1256',$Text);

    //     return strlen($Text);

    // }

/**************************************************************************************
 * #################### Count MSG #####################
**************************************************************************************/


	 function Count_MSG($Text){

        $strlen = strlen($Text);
        $MSG_Num = 0;

        if($this->IsItUnicode($Text)){
            if($strlen>70){
                while($strlen>0){
                  $strlen -= 67;
                  $MSG_Num++;
                }
            }else{
                $MSG_Num++;
            }
        }else{
            if($strlen>160){
                while($strlen>0){
                  $strlen -= 134;
                  $MSG_Num++;
                }
            }else{
                $MSG_Num++;
            }
        }

        return $MSG_Num;
}
/**************************************************************************************
 * #################### IsIt Unicode #####################
**************************************************************************************/

	 function IsItUnicode($Text){

		$unicode=false;
  		$str = "ÏÌÍÎåÚÛÝÞËÕÖØßãäÊÇáÈíÓÔÙÒæÉìáÇÑÄÁÆÅáÅÃáÃÂáÂ¡º¿ÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÝÞßáãäå'©®÷×§æìíÜðñòóõöøú";

	  	for($i=0;$i<=strlen($str);$i++){
	    	$strResult= substr($str,$i,1);

	      	for($R=0;$R<=strlen($Text);$R++){
	        	$msgResult= substr($Text,$R,1);

	            if($strResult==$msgResult && $strResult)
	            	$unicode=true;
	           	}
		}

		return $unicode;
	}

/**************************************************************************************
 * #################### Setter & Getter -> $TextEncode #####################
**************************************************************************************/


	 function setTextEncode($TextEncode) {
		$TextEncode = $TextEncode;
	}
	 function getTextEncode() {
		return TextEncode;
	}

/**************************************************************************************
 * #################### Setter & Getter -> $UserName #####################
**************************************************************************************/


	 function setUserName($User) {
		$UserName = $User;
	}
	 function getUserName() {
		return $UserName;
	}

/**************************************************************************************
 * #################### Setter & Getter -> $Password #####################
**************************************************************************************/


	 function setPassword($Pass) {
		$Password = $Pass;
	}
	 function getPassword() {
		return $Password;
	}


/**************************************************************************************
 * #################### Get Data from URL #####################
**************************************************************************************/


	// "http://www.dt-live.com","/folder/file.php","120"
	 function DT_URLGetData($URL,$File,$Length=120,$case='curl'){
	    switch($case){
			case 'curl':
	            if(extension_loaded('curl') && function_exists('curl_init') && function_exists('curl_exec')){
	                $init = curl_init();
	                if(!$init){
	                    return DT_URLGetData($URL,$File,$Length,'fopen');
	                }
                    curl_setopt($init, CURLOPT_URL, $URL.$File);
	                curl_setopt($init, CURLOPT_HEADER, 0);
	                curl_setopt($init, CURLOPT_RETURNTRANSFER, 1);

	                if($result = curl_exec($init)){
	                    curl_close($init);
	                    return $result;
	                }else{
	                    return DT_URLGetData($URL,$File,$Length,'fopen');
	                }
	            }else{
	                return DT_URLGetData($URL,$File,$Length,'fopen');
	            }
	        break;
	/*------------------------------------------------------------------*/
	        case 'fopen':
	            if(@ini_get('allow_url_fopen') && @function_exists('fopen')){
	                $link   = @fopen($URL.$File,'r');
	                if(!$link){
	                    return DT_URLGetData($URL,$File,$Length,'fsockopen');
	                }
	                $result = @fread($link, $Length);
	                @fclose($link);
	                return $result;
	            }else{
	                    return DT_URLGetData($URL,$File,$Length,'fsockopen');
	            }
	        break;
	/*------------------------------------------------------------------*/
	        case 'fsockopen':
	            if(@function_exists('fsockopen')){
	                $URL2 = substr($URL, 7);
	                $link  = @fsockopen($URL2, 80, $errno, $errstr, 8);
	                if(!$link){
	                    return false;
	                }
	                $send  = "GET ".$File." HTTP/1.1\r\n";
	                $send .= "Host: ".$URL2."\r\n";
	                $send .= "User-Agent: MalathSMS \r\n";
	                $send .= "Referer: ".$_SERVER["SERVER_NAME"]."\r\n";
	                $send .= "Accept: text/xml,application/xml,application/xhtml+xml,";
	                $send .= "text/html;q=0.9,text/plain;q=0.8,video/x-mng,image/png,";
	                $send .= "Accept-Language: en-us, en;q=0.50\r\n";
	                $send .= "Accept-Encoding: gzip, deflate, compress;q=0.9\r\n";
	                $send .= "Connection: Close\r\n\r\n";
	                @fputs ( $link, $send );
	                $send = '';
	                do{$send .= @fgets ($link); } while ( @strpos ( $send, "\r\n\r\n" ) === false );
	                if(!$send){
	                    return false;
	                }
	                $info = @decode_header ( $send );
	                $send = '';
	                while ( ! @feof ( $link ) ) { $send .= @fread ( $link, $Length ); }
	                @fclose ( $link );
	                $send = @decode_body ( $info, $send );
	                return $send;
	            }else{
	                return false;
	            }
	        break;

	    }
	}

/**************************************************************************************
 * #################### Convert To Unicode #####################
**************************************************************************************/

 function ToUnicode($Text) {

		$Backslash = "\ ";
		$Backslash = trim($Backslash);

		$UniCode = Array
		(
		    "¡" => "060C",
		    "º" => "061B",
		    "¿" => "061F",
		    "Á" => "0621",
		    "Â" => "0622",
		    "Ã" => "0623",
		    "Ä" => "0624",
		    "Å" => "0625",
		    "Æ" => "0626",
		    "Ç" => "0627",
		    "È" => "0628",
		    "É" => "0629",
		    "Ê" => "062A",
		    "Ë" => "062B",
		    "Ì" => "062C",
		    "Í" => "062D",
		    "Î" => "062E",
		    "Ï" => "062F",
		    "Ð" => "0630",
		    "Ñ" => "0631",
		    "Ò" => "0632",
		    "Ó" => "0633",
		    "Ô" => "0634",
		    "Õ" => "0635",
		    "Ö" => "0636",
		    "Ø" => "0637",
		    "Ù" => "0638",
		    "Ú" => "0639",
		    "Û" => "063A",
		    "Ý" => "0641",
		    "Þ" => "0642",
		    "ß" => "0643",
		    "á" => "0644",
		    "ã" => "0645",
		    "ä" => "0646",
		    "å" => "0647",
		    "æ" => "0648",
		    "ì" => "0649",
		    "í" => "064A",
		    "Ü" => "0640",
		    "ð" => "064B",
		    "ñ" => "064C",
		    "ò" => "064D",
		    "ó" => "064E",
		    "õ" => "064F",
		    "ö" => "0650",
		    "ø" => "0651",
		    "ú" => "0652",
		    "!" => "0021",
		    '"' => "0022",
		    "#" => "0023",
		    "$" => "0024",
		    "%" => "0025",
		    "&" => "0026",
		    "'" => "0027",
		    "(" => "0028",
		    ")" => "0029",
		    "*" => "002A",
		    "+" => "002B",
		    "," => "002C",
		    "-" => "002D",
		    "." => "002E",
		    "/" => "002F",
		    "0" => "0030",
		    "1" => "0031",
		    "2" => "0032",
		    "3" => "0033",
		    "4" => "0034",
		    "5" => "0035",
		    "6" => "0036",
		    "7" => "0037",
		    "8" => "0038",
		    "9" => "0039",
		    ":" => "003A",
		    ";" => "003B",
		    "<" => "003C",
		    "=" => "003D",
		    ">" => "003E",
		    "?" => "003F",
		    "@" => "0040",
		    "A" => "0041",
		    "B" => "0042",
		    "C" => "0043",
		    "D" => "0044",
		    "E" => "0045",
		    "F" => "0046",
		    "G" => "0047",
		    "H" => "0048",
		    "I" => "0049",
		    "J" => "004A",
		    "K" => "004B",
		    "L" => "004C",
		    "M" => "004D",
		    "N" => "004E",
		    "O" => "004F",
		    "P" => "0050",
		    "Q" => "0051",
		    "R" => "0052",
		    "S" => "0053",
		    "T" => "0054",
		    "U" => "0055",
		    "V" => "0056",
		    "W" => "0057",
		    "X" => "0058",
		    "Y" => "0059",
		    "Z" => "005A",
		    "[" => "005B",
		    $Backslash => "005C",
		    "]" => "005D",
		    "^" => "005E",
		    "_" => "005F",
		    "`" => "0060",
		    "a" => "0061",
		    "b" => "0062",
		    "c" => "0063",
		    "d" => "0064",
		    "e" => "0065",
		    "f" => "0066",
		    "g" => "0067",
		    "h" => "0068",
		    "i" => "0069",
		    "j" => "006A",
		    "k" => "006B",
		    "l" => "006C",
		    "m" => "006D",
		    "n" => "006E",
		    "o" => "006F",
		    "p" => "0070",
		    "q" => "0071",
		    "r" => "0072",
		    "s" => "0073",
		    "t" => "0074",
		    "u" => "0075",
		    "v" => "0076",
		    "w" => "0077",
		    "x" => "0078",
		    "y" => "0079",
		    "z" => "007A",
		    "{" => "007B",
		    "|" => "007C",
		    "}" => "007D",
		    "~" => "007E",
		    "©" => "00A9",
		    "®" => "00AE",
		    "÷" => "00F7",
		    "×" => "00F7",
		    "§" => "00A7",
		    " " => "0020",
		    "\n" => "000D",
			"\r" => "000A",
		    "\t" => "0009",
		    "é" => "00E9",
		    "ç" => "00E7",
		    "à" => "00E0",
		    "ù" => "00F9",
		    "µ" => "00B5",
		    "è" => "00E8"
		);

		$Result="";
		$strlen = strlen($Text);
		for($i=0;$i<$strlen;$i++){

			$currect_char =mb_substr($Text,$i,1);

			if(array_key_exists($currect_char,$UniCode)){
				$Result .= $UniCode[$currect_char];
			}

		}

	 	return $Result;

	}

/**************************************************************************************
 * #################### FSockOpen Header #####################
**************************************************************************************/

	 function IsMobile(&$M){
	    $count = strlen($M);
	    $New = '';
	    $ARRAY_NUM = array('0','1','2','3','4','5','6','7','8','9');
	    for($x=0;$x<=$count;$x++){
	    if(in_array(substr($M, $x, 1),$ARRAY_NUM)){
	            $New .= substr($M, $x, 1);
	        }
	    }
	    $M = $New;
	    if(substr($New, 0, 2)=="00" || substr($New, 0, 1)=="0"){
	        return false;
	    }else{
	        if(substr($New, 0, 3)=="966"){
	            if(substr($New, 3, 1)=="0" || strlen($New)!="12"){
	                return false;
	            }else{
	                return true;
	            }
	        }else{
	            return true;
	        }
	    }
	}
/**************************************************************************************
 * #################### FSockOpen Header #####################
**************************************************************************************/

	#+++++++++++++++++++++++++++++ Start fsockopen ++++++++++++++++++++++++++++++++#
	 function decode_header ( $str )
	{
	    $part = preg_split ( "/\r?\n/", $str, -1, PREG_SPLIT_NO_EMPTY );

	    $out = array ();

	    for ( $h = 0; $h < sizeof ( $part ); $h++ )
	    {
	        if ( $h != 0 )
	        {
	            $pos = strpos ( $part[$h], ':' );

	            $k = strtolower ( str_replace ( ' ', '', substr ( $part[$h], 0, $pos ) ) );

	            $v = trim ( substr ( $part[$h], ( $pos + 1 ) ) );
	        }
	        else
	        {
	            $k = 'status';

	            $v = explode ( ' ', $part[$h] );

	            $v = $v[1];
	        }

	        if ( $k == 'set-cookie' )
	        {
	                $out['cookies'][] = $v;
	        }
	        else if ( $k == 'content-type' )
	        {
	            if ( ( $cs = strpos ( $v, ';' ) ) !== false )
	            {
	                $out[$k] = substr ( $v, 0, $cs );
	            }
	            else
	            {
	                $out[$k] = $v;
	            }
	        }
	        else
	        {
	            $out[$k] = $v;
	        }
	    }

	    return $out;
	}

	 function decode_body ( $info, $str, $eol = "\r\n" )
	{
	    $tmp = $str;

	    $add = strlen ( $eol );

	    $str = '';

	    if ( isset ( $info['transfer-encoding'] ) && $info['transfer-encoding'] == 'chunked' )
	    {
	        do
	        {
	            $tmp = ltrim ( $tmp );

	            $pos = strpos ( $tmp, $eol );

	            $len = hexdec ( substr ( $tmp, 0, $pos ) );

	            if ( isset ( $info['content-encoding'] ) )
	            {
	                $str .= gzinflate ( substr ( $tmp, ( $pos + $add + 10 ), $len ) );
	            }
	            else
	            {
	                $str .= substr ( $tmp, ( $pos + $add ), $len );
	            }

	            $tmp = substr ( $tmp, ( $len + $pos + $add ) );

	            $check = trim ( $tmp );

	        } while ( ! empty ( $check ) );
	    }
	    else if ( isset ( $info['content-encoding'] ) )
	    {
	        $str = gzinflate ( substr ( $tmp, 10 ) );
	    }

	    return $str;
	}
}
