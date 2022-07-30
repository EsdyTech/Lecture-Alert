<?php
//sending mail or sms
function sendSMS($message, $to){
  //Authentication Token
  $token = "sendchamp_live_$2y$10{char}MTFGdh1Mmb8.wybrfee9LeoUydQBCPaCuQN/rTnfJtWMhIxfxcEve";
  $token = str_replace("{char}", "$",$token);

  $data = array(
    'to' => $to,
    'message' => $message,
    'sender_name'   => "Sendchamp",
    'route'   => "dnd",
  );
  
  $payload = json_encode($data);
  //var_dump($payload);


  $curl = curl_init();
  curl_setopt_array($curl, [
    CURLOPT_URL => "https://api.sendchamp.com/api/v1/sms/send",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 60,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    //CURLOPT_SSL_VERIFYPEER => false,    // Disabled SSL Cert checks
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => $payload,
    CURLOPT_HTTPHEADER => [
      "Accept: application/json",
      "Authorization: Bearer ".$token."",
      "Content-Type: application/json"
    ],
  ]);
  
  $response = curl_exec($curl);
  $err = curl_error($curl);
  
  curl_close($curl);
  
  //log file
  $fp = fopen('logger.txt', 'a');
  if ($err) {
    echo "cURL Error #:" . $err;
    fwrite($fp, 'Error Response => '.$err.''.PHP_EOL);
  } else {
    echo "Response => " . $response;
    fwrite($fp, 'Response => '.$response.''.PHP_EOL);
    
   fclose($fp);
  }
}
