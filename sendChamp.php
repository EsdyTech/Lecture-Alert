<?php
//sending mail or sms
function sendEmail($toEmail, $messageBody, $subject){
  //Authentication Token
  $token = "sendchamp_live_$2y$10{char}MTFGdh1Mmb8.wybrfee9LeoUydQBCPaCuQN/rTnfJtWMhIxfxcEve";
  $token = str_replace("{char}", "$",$token);

  $frmObject = new stdClass();
  $frmObject->email = 'Sawdykdevtest@gmail.com';
  $frmObject->name = 'Lecture Alert System';

  $toObject = new stdClass();
  $toObject->email = $toEmail;
  $toObject->name = $toEmail;

  $msgObject = new stdClass();
  $msgObject->type = 'text/html';
  $msgObject->value = $messageBody;

  $toData = array(
   $toObject,
  );

  $data = array(
    'subject' => $subject,
    'to' => $toData,
    'from'   => $frmObject,
    'message_body'   => $msgObject,
  );
  
  $payload = json_encode($data);
  //var_dump($payload);


  $curl = curl_init();
  curl_setopt_array($curl, [
    CURLOPT_URL => "https://api.sendchamp.com/api/v1/email/send",
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
