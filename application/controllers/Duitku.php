<?php 

class Duitku extends CI_Controller{

    public static function Request($itemDetails,$user_info, $paymentMethod,$merchantOrderId,$additionalParam,$merchantUserInfo){
    $amont=array();
    foreach($itemDetails as $key => $data){
        $amount[$key]=$data['price'];
    }
    
    $merchantCode = env('merchantCode'); 
    $merchantKey = env('merchantKey');
    $paymentAmount =array_sum($amount);
    $productDetails = 'Test Pay with duitku';
    $signature = md5($merchantCode . $merchantOrderId . $paymentAmount . $merchantKey);
    $params = array(
        'merchantCode' => $merchantCode,
        'paymentAmount' => $paymentAmount,
        'paymentMethod' => $paymentMethod,
        'merchantOrderId' => $merchantOrderId,
        'productDetails' => $productDetails,
        'additionalParam' => $additionalParam,
        'merchantUserInfo' => $merchantUserInfo,
        'email' => $user_info['email'],
        'phoneNumber' => $user_info['phoneNumber'],
        'itemDetails' => $itemDetails,
        'callbackUrl' => env('URL_CALLBACK'),
        'returnUrl' => env('URL_RETURN'),
        'signature' => $signature
    );

    $params_string = json_encode($params);
        if(env('PRODUCTION_MODE')){
            $url="https://passport.duitku.com/webapi/api/merchant/inquiry";
        }else{
             $url="http://sandbox.duitku.com/webapi/api/merchant/inquiry";
        }
      
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url); 
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
    curl_setopt($ch, CURLOPT_POSTFIELDS, $params_string);                                                                  
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
        'Content-Type: application/json',                                                                                
        'Content-Length: ' . strlen($params_string))                                                                       
    );   
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    $request = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    if($httpCode == 200)
    {
       
        $result = json_decode($request, true);
        $result['status']='200';
        return $result;
    }
    else{
       
         $result = json_decode($request, true);
         $result['status']=$httpCode;
        return $result;
        
    }
   
    }
    
    
    
    public static function Callback($params){
    $apiKey = env('merchantKey');
    $merchantCode = isset($params->merchantCode) ? $params->merchantCode : null; 
    $amount = isset($params->amount) ? $params->amount : null; 
    $merchantOrderId = isset($params->merchantOrderId) ? $params->merchantOrderId : null; 
    $productDetail = isset($params->productDetail) ? $params->productDetail : null; 
    $additionalParam = isset($params->additionalParam) ? $params->additionalParam : null; 
    $paymentMethod = isset($params->paymentCode) ? $params->paymentCode : null; 
    $resultCode = isset($params->resultCode) ? $params->resultCode : null; 
    $merchantUserId = isset($params->merchantUserId) ? $params->merchantUserId : null; 
    $reference = isset($params->reference) ? $params->reference : null; 
    $signature = isset($params->signature) ? $params->signature : null; 
    $issuer_name = isset($params->issuer_name) ? $params->issuer_name : null; // Hanya untuk ATM Bersama
    $issuer_bank = isset($params->issuer_bank) ? $params->issuer_bank : null; // Hanya untuk ATM Bersama

    if(!empty($merchantCode) && !empty($amount) && !empty($merchantOrderId) && !empty($signature))
    {
       $params = $merchantCode . $amount . $merchantOrderId . $apiKey;
       $calcSignature = md5($params);
    
       if($signature == $calcSignature)
       {
           $txt=[
               'merchantCode'=>$merchantCode,
               'amount'=>$amount,
               'merchantOrderId'=>$merchantOrderId,
               'productDetail'=>$productDetail,
               'additionalParam'=>$additionalParam,
               'paymentMethod '=>$paymentMethod ,
               'resultCode'=>$resultCode,
               'merchantUserId'=>$merchantUserId,
               'reference'=>$reference,
               'signature'=>$signature,
               'issuer_name'=>$issuer_name,
               'issuer_bank'=>$issuer_bank
               ];
          
           self::LogsData($txt);
           return $txt;

       }
       else
       {
       
           self::LogsData("Band Signatur");
       }
    }
    else
    {
         self::LogsData("Band Params");
    }
    }
    
    
    
    
    public static function Chechk($merchantOrderId){
    $merchantCode = env('merchantCode'); 
    $merchantKey = env('merchantKey');
   

    $signature = md5($merchantCode . $merchantOrderId . $merchantKey);

    $params = array(
        'merchantCode' => $merchantCode,
        'merchantOrderId' => $merchantOrderId,
        'signature' => $signature
    );

    $params_string = json_encode($params);
    if(env('PRODUCTION_MODE')){
            $url="https://passport.duitku.com/webapi/api/merchant/transactionStatus";
        }else{
             $url="http://sandbox.duitku.com/webapi/api/merchant/transactionStatus";
        }
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $url); 
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
    curl_setopt($ch, CURLOPT_POSTFIELDS, $params_string);                                                                  
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
        'Content-Type: application/json',                                                                                
        'Content-Length: ' . strlen($params_string))                                                                       
    );   
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

    //execute post
    $request = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    if($httpCode == 200)
    {
       $result = json_decode($request, true);
        $result['status']='200';
        return $result;
    }
    else
        $result = json_decode($request, true);
        $result['status']=$httpCode;
        return $result;
    }
    
    public static function Testlog(){
        date_default_timezone_set(env('LOGS_TIEMZONE'));
        $timestamp = time();
        $date_time = date("d-m-Y (D) H:i:s", $timestamp);
        $line1=  "-----------------------------".$date_time."----------------------\n";
        $txt=$line1;
        $myfile = file_put_contents( storage_path('logs').'/DuitkuLogs.txt', $txt.PHP_EOL , FILE_APPEND | LOCK_EX);
       
    }public static function LogsData($line3){
        date_default_timezone_set(env('LOGS_TIEMZONE'));
        $timestamp = time();
        $date_time = date("d-m-Y (D) H:i:s", $timestamp);
        $line1=  "-----------------------------".$date_time."----------------------\n";
        $line2= "FROM : ".$_SERVER['REMOTE_ADDR']."\n";
        $txt=$line1.$line2.implode(' ', $line3);
        $myfile = file_put_contents( storage_path('logs').'/DuitkuLogs.txt', $txt.PHP_EOL , FILE_APPEND | LOCK_EX); 
    }
}