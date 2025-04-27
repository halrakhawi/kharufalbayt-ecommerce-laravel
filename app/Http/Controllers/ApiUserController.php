<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Order;
use App\Models\OrderDetails;
use Auth;
use Mail;
use Validator;
use App\helpers;

class ApiUserController extends Controller
{
    public function __construct(){
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
    public function login(){
        return view('front.login');
    }
    public function signup(){
        //dd(url()->previous().'#signup');
        return redirect(url()->previous() .'#signup');
    
    }
    public function postlogin(Request $request){
        
        $user=User::where('email',$request->get('email'))->first();
        //dd(Hash::check($request->input("password"),$user->password));

        $request->validate([
            'password' => 'required|string|min:6',
            'email' => 'required|max:10',
        ]);
        if($request->get('email') != $user->mobile) {
            \Session::put('errors', 'Your mobile number not match in our system..!!');
           // return back();
		   return $this->sendFailedLoginResponse($request);
        }  
        \Auth::login($user);
        //return redirect()->route('allproducts');
		return response()->json([
            'data' => $user->toArray(),
        ]);    
       

    }

	public function loginapi(Request $request){
		$loginstatus="no";
		$user=User::where('email',$request->input('email'))->first();
		if(User::where('email', $request->input('email'))->exists()){
			if(Hash::check($request->input("password"),$user->password)){
				$loginstatus="yes";
		return response()->json([
			'data' => $user->toArray(),
			'status'=>$loginstatus
		]);
			}else
			{
				return response()->json([
					'msg' => 'كلمة المرور خاطئة',
					'status'=>'no'
				]);
			}
			
		}else{
			return response()->json([
				'msg' => 'البريد الالكتروني خاطئ',
				'status'=>'no'
			]);
		}
        
		
	
	}
	
	public function postlogin1(Request $request){
        
        $user=User::where('email',$request->get('email'))->first();
        //dd(Hash::check($request->input("password"),$user->password));

        $request->validate([
            'password' => 'required|string|min:6',
            'email' => 'required|max:14',
        ]);
        if($request->get('email') != $user->email) {
            \Session::put('errors', 'Your mobile number not match in our system..!!');
            return back();
        }  
        \Auth::login($user);
       
    }

    public function username(){
        return 'mobile';
    }

	public function quick(){
        return view('front.quicksighnup');
    }
    public function quickpost(Request $request){
        $user=User::where('mobile',$request['phone'])->first();
        if(!isset($user)){
        $user=User::create([
            'name' => $request['name'],
            'email' => 'info@kharufalbayt.com.sa',
            'mobile' => $request['phone'],
            'password'=>bcrypt(Str::random(9)),
            'activate_code'=>random_int(10000, 99999),
            'status'=>0
        ]);
    }else{
        $user->activate_code=random_int(10000, 99999);
		$user->name=$request['name'];
        $user->save();
    }
    $UserName="bnader204930";
    $Password="dreamto5";
    $Name="KHARUFALBYT";
    $Mobiles=$user->mobile;
    $Mobiles = '966'.ltrim($Mobiles, '0');
    $SMS_Msg="Activation Code: ".$user->activate_code;

    $this->setInfo($UserName, $Password, 'UTF-8');
    $this->Send_SMS($Mobiles,$Name,$SMS_Msg);

        session(['user_id' => $user->id]);
       // return view('front.active');
	   return response()->json([
		'data' => $user->toArray(),
	]); 
    }

	public function postforgotpassword(Request $request){
		$user=User::where('email',$request->email)->first();
		if(isset($user)){
		$user->activate_code=random_int(10000, 99999);
        $user->save();
		$token = Str::random(64);
		$data = [
			'token' => $token,
			'code'=>$user->activate_code
		];
		Mail::send('front.resetpassword', $data, function($message) use($request){
			$message->to($request->email);
			$message->subject('Reset Password');
		});
		return response()->json([
			'data' => $user->toArray(),
			'status'=>'yes'
		]); 
	}else{
		return response()->json([
			'status'=>'no'
		]); 	}
		
    }
	public function resetpass(Request $request){ 
		$user=User::where('email',$request['email'])->first();
		if($request['vcode']==$user['activate_code']){
		$user->password=bcrypt($request['newpassord']);
        $user->save();
		return response()->json([
			'data' => $user->toArray(),
			'status'=>'yes'
		]);
	}else{
		return response()->json([
			'status'=>'no'
		]); 	}
		
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $validator = Validator::make($request->all(),[
        //     'name'=>'required',
        //     'email'=>'required|email|unique:users',
        //     'password'=>'required|min:6|max:12',
        //     'mobile'=>'required|unique:users',
        //     'confirmpassword'=>'required_with:password|same:password'
        // ],[
        //     'name.required'=>'الاسم مطلوب',
        //     'email.required'=>'البريد الالكتروني مطلوب',
        //     'email.email'=>'القيمة المدخلة يجب ان تكون ايميل',
        //     'email.unique'=>'الايميل المدخل موجود مسبقا',
        //     'password.required'=>' كلمة المرور مطلوب',
        //     'password.min'=>'يجب ان تكون كلمة المرور على الاقل 5 احرف',
        //     'password.max'=>'يجب ان تكون كلمة المرور على الاكثر 12 احرف',
        //     'mobile.required'=>'رقم الجوال مطلوب',
        //     'mobile.unique'=>'رقم الجوال موجود مسبقا',
        //     'confirmpassword.same'=>'كلمة المرور غير مطابقة'
        // ]);
    

        // if(!$validator->passes()){
        //     return response()->json(['status'=>0,'error'=>$validator->errors()->toArray()]);
        //     //return redirect()->back()->withErrors($validator);//->withInput();()->json(['status'=>0, 'error'=>$validator->errors()->toArray()]);
        // }else{
        //     $values = [
        //          'name'=>$request->name,
        //          'email'=>$request->email,
        //          'password'=>Hash::make($request->password),
        //          'mobile'=>$request->mobile
        //     ];
		if(User::where('mobile',$request->mobile)->exists()){
			return response()->json(['status'=>0, 'msg'=>'الجوال موجود مسبقا']);
		}elseif (User::where('email',$request->email)->exists()) {
			return response()->json(['status'=>0, 'msg'=>'الايميل موجود مسبقا']);
		}else{
           $user=User::create([
                'name' => $request['name'],
                'email' => $request['email'],
                'mobile' => $request['mobile'],
                'password'=>bcrypt($request['password']),
                'activate_code'=>random_int(10000, 99999),
                'status'=>0
            ]);

            // $UserName="bnader204930";
            // $Password="dreamto5";
            // $Name="KHARUFALBYT";
            // $Mobiles=$user->mobile;
			// $Mobiles = '966'.ltrim($Mobiles, '0');
            // $SMS_Msg="Activation Code: ".$user->activate_code;
    
            // $this->setInfo($UserName, $Password, 'UTF-8');
            // $this->Send_SMS($Mobiles,$Name,$SMS_Msg);
            // session(['user_id' => $user->id]);
            if( isset($user) ){   
                return response()->json(['status'=>1, 'msg'=>'New User has been successfully registered']);
            }
		
        }
        
        
        
    }
    public function myorders(){
        return view('front.myOrders');
   }
   
   public function myordersdata(){
       
       
        $myid=auth('user')->user()->id;
       $myorders=Order::where('user_id',$myid)->get();
       $array=$myorders->toArray();
       $dataset = array(
   "echo" => 1,
   "totalrecords" => count($array),
   "totaldisplayrecords" => count($array),
   "data" => $array
);


   return response()->json($dataset);
  
   }
   
public function orderdetails($id){
       $orderid=$id;

        return view('front.orderDetails',compact('orderid'));
   } 
   
   public function orderdetailsdata($id){
       

       //$orderdetails=OrderDetails::where('order_id',$id)->get();
       
       $orderdetails = OrderDetails::join('packages', 'order_details.pack', '=', 'packages.id')
             ->join('segmentations', 'order_details.cut_type', '=', 'segmentations.id')
              ->where('order_details.order_id',$id)
             ->get(['order_details.*', 'segmentations.name as segmentname', 'packages.name as packname']);
       
       
       $array=$orderdetails->toArray();
       $dataset = array(
   "echo" => 1,
   "totalrecords" => count($array),
   "totaldisplayrecords" => count($array),
   "data" => $array
);


   return response()->json($dataset);
  
   }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function activate(){
        return view('front.active');
    }

    public function sendactivation(Request $request){
		$loginstatus="no";
		$user=User::where('mobile',$request['phone'])->first();
		if($user->activate_code==$request['vcode'])
		$loginstatus="yes";

		return $loginstatus;
        
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

 /* function Send_SMS($Mobiles,$Sender,$Msg){
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

	} */
	
	
	function Send_SMS($Mobiles,$Sender,$Msg){
		
		$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, "https://www.msegat.com/gw/sendsms.php");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_HEADER, TRUE);

curl_setopt($ch, CURLOPT_POST, TRUE);



$fields = <<<EOT
{
  "userName": "Bander1435", 
			  
  "numbers": "$Mobiles",
  "userSender": "KHARUFALBYT", 
  "apiKey": "a16748e00a081818ce6282aa66a55c13",
  "msg": "$Msg",
  "msgEncoding":"windows-1256"
}
EOT;
curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);

curl_setopt($ch, CURLOPT_HTTPHEADER, array(
  "Content-Type: application/json",));

$response = curl_exec($ch);

//dd($response);
curl_close($ch);

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

	    $URL = $URLGateway_Sender."?code=2&username=".UserName."&password=".Password."&newsender=".$Name;

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
