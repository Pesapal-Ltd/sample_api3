<?php
class pesapalV30Helper {
  public $url;

  /**
   * $api param can either be demo or live. 
   * Defaulted to demo
   */
  public function __construct($api) { 
    $this->url = ( $api == "demo" ) ?  "https://cybqa.pesapal.com/pesapalv3" : "https://pay.pesapal.com/v3";
  }

  /**
   * $consumer_key - register business account on www.pesapal.com or demo.pesapal.com 
   * $consumer_secret - register business account on www.pesapal.com or demo.pesapal.com 
   * Please ensure you register on the correct link. 
   * Live API = www.pesapal.com
   * Demo API = demo.pesapal.com
   */
  public function getAccessToken($consumer_key, $consumer_secret){
    $headers = array();
    $headers['accept'] = 'text/plain';
    $headers['content-type'] = 'application/json';

    $postData = array();
    $postData['consumer_key'] = $consumer_key;
    $postData['consumer_secret'] = $consumer_secret;
    $endPoint = $this->url.'/api/Auth/RequestToken';
    $response = $this->curlRequest($endPoint, $headers, $postData);
    
    return $response;

    // $response = wp_remote_post($endPoint, $headers, $postData);

    // return $response;
  }

    /**
    * Function to check if the IPN url already exist, if it does, fetch the IPN id.
    * $access_token  = Token you received from calling getAccessToken()
   */
  public function getRegisteredIpn($access_token){
    $headers = array();
    $headers['accept'] = 'text/plain';
    $headers['content-type'] = 'application/json';
    $headers['authorization'] = 'Bearer '.$access_token;

    $endPoint = $this->url.'/api/URLSetup/GetIpnList';
    $response = $this->curlRequest($endPoint, $headers);
    
    return $response;
  }
    /**
    * Function to generate IPN Notification Id
    * $access_token  = Token you received from calling getAccessToken()
   */
  public function getNotificationId($access_token, $callback_url){
    $headers = array();
    $headers['accept'] = 'text/plain';
    $headers['content-type'] = 'application/json';
    $headers['authorization'] = 'Bearer '.$access_token;

    $postData = array();
    // use either GET or POST
    // This is the http request method Pesapal will use when triggering the IPN alert.
    $postData['ipn_notification_type'] = 'GET';
    // The notification url Pesapal with send a status alert to.
    $postData['url'] = $callback_url;

    $endPoint = $this->url.'/api/URLSetup/RegisterIPN';
    $response = $this->curlRequest($endPoint, $headers, $postData);
    
    return $response;
  }

  /**
   * $request = An object from your system
   * $access_token  = Token you received from calling getAccessToken()
   */
  public function getMerchertOrderURL($request, $access_token){
    $headers = array();
    $headers['accept'] = 'text/plain';
    $headers['content-type'] = 'application/json';
    $headers['authorization'] = 'Bearer '.$access_token;

    $postData = array();
    $postData["language"] = $request["language"];
    $postData["currency"] = $request["currency"];
    $postData["amount"] = $request["amount"];
    $postData["id"] = $request["id"];
    $postData["description"] = $request["description"];
    $postData["billing_address"]["phone_number"] = $request["phone_number"];
    $postData["billing_address"]["email_address"] = $request["email_address"];
    $postData["billing_address"]["country_code"] = $request["country_code"];
    $postData["billing_address"]["first_name"] = $request["first_name"];
    $postData["billing_address"]["middle_name"] = $request["middle_name"];
    $postData["billing_address"]["last_name"] = $request["last_name"];
    $postData["billing_address"]["line_1"] = $request["line_1"];
    $postData["billing_address"]["line_2"] = $request["line_2"];
    $postData["billing_address"]["city"] = $request["city"];
    $postData["billing_address"]["state"] = (strlen(trim($request["state"])) > 3) ? "" : trim($request["state"]);
    $postData["billing_address"]["postal_code"] = (strlen(trim($request["postal_code"])) > 10) ? "" : trim($request["postal_code"]);
    $postData["billing_address"]["zip_code"] = (strlen(trim($request["zip_code"])) > 10) ? "" : trim($request["zip_code"]);
    $postData["callback_url"] = $request["callback_url"];
    $postData["notification_id"] = $request["notification_id"];
    $postData["terms_and_conditions_id"] = $request["terms_and_conditions_id"];
    
    $endPoint = $this->url.'/api/Transactions/SubmitOrderRequest';
    $response = $this->curlRequest($endPoint, $headers, $postData);
    
    return $response;
  }

  /**
   * $orderTrackingId - Guid you received from calling getMerchertOrderURL()
   * $access_token  = Token you received from calling getAccessToken()
   */
  public function getTransactionStatus($orderTrackingId, $access_token){
    //echo "Token: ".$access_token;
    $headers = array();
    $headers['accept'] = 'text/plain';
    $headers['content-type'] = 'application/json';
    $headers['authorization'] = 'Bearer '.$access_token;
    
    $endPoint = $this->url.'/api/Transactions/GetTransactionStatus?orderTrackingId='.$orderTrackingId;
    $response = $this->curlRequest($endPoint, $headers);
    
    return $response;
  }

  public function curlRequest($url, $headers = null, $postData=null){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
    curl_setopt($ch, CURLOPT_TIMEOUT,30);
    if(defined('CURL_PROXY_REQUIRED')) {
      if (CURL_PROXY_REQUIRED == 'True'){
        $proxy_tunnel_flag = (
          defined('CURL_PROXY_TUNNEL_FLAG') 
          && strtoupper(CURL_PROXY_TUNNEL_FLAG) == 'FALSE'
        ) ? false : true;
        curl_setopt ($ch, CURLOPT_HTTPPROXYTUNNEL, $proxy_tunnel_flag);
        curl_setopt ($ch, CURLOPT_PROXYTYPE, CURLPROXY_HTTP);
        curl_setopt ($ch, CURLOPT_PROXY, CURL_PROXY_SERVER_DETAILS);
      }
    }
    
    $headerArray = array();
    if(isset($headers['accept']) && $headers['accept']) $headerArray[] = "Accept: ".$headers['accept'];
    if(isset($headers['content-type']) && $headers['content-type']) $headerArray[] = "Content-Type: ".$headers['content-type'];
    if(isset($headers['authorization']) && $headers['authorization']) $headerArray[] = "Authorization: ".$headers['authorization']; 
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headerArray);

    if($postData && count($postData)) {
      $postDataJson = json_encode($postData);
      curl_setopt($ch, CURLOPT_POSTFIELDS, $postDataJson);
    }

    $response = curl_exec($ch);
  
    $response = json_decode($response);
    curl_close($ch);
   
    return $response;
  }
}