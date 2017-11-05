<?php

$strAccessToken = "+TkxCe1XWrovYMBRHu1PmlG9frhyaoeORlzBnVTIVxgIOMW541kbLJkiq+XvJjPc6Ay/ekPpm/xAMtJwSwFAuC2+LepcVxezOTjONjWOHjNR4dwSN/yaKoMEnPtO66fife/VTUeIWEaMQXn1Gk/qmwdB04t89/1O/w1cDnyilFU=";
$strUrl = "https://api.line.me/v2/bot/message/reply";
$_msg = $arrJson['events'][0]['message']['text'];
$content = file_get_contents('php://input');
$arrJson = json_decode($content, true);
$arrHeader = array();
$arrHeader[] = "Content-Type: application/json";
$arrHeader[] = "Authorization: Bearer {$strAccessToken}";

$filename = 'text.txt';
if (file_exists($filename)) {
  $myfile = fopen('text.txt', "w+") or die("Unable to open file!");
  fwrite($myfile, $_msg);
  fclose($myfile);
} else {
  $myfile = fopen('text.txt', "x+") or die("Unable to open file!");
  fwrite($myfile, $_msg);
  fclose($myfile);
}

if($arrJson['events'][0]['message']['text'] == "สวัสดี"){
  $arrPostData = array();
  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
  $arrPostData['messages'][0]['type'] = "text";
  $arrPostData['messages'][0]['text'] = "ฉันไม่เข้าใจคำสั่ง";
}else if($arrJson['events'][0]['message']['text'] == "ทำอะไรได้บ้าง"){
  $arrPostData = array();
  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
  $arrPostData['messages'][0]['type'] = "text";
  $arrPostData['messages'][0]['text'] = "ฉันทำอะไรไม่ได้เลย คุณต้องสอนฉันอีกเยอะ";
}else{
  $arrPostData = array();
  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
  $arrPostData['messages'][0]['type'] = "text";
  $arrPostData['messages'][0]['text'] = "ฉันไม่เข้าใจคำสั่ง";
}
 
 
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$strUrl);
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $arrHeader);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($arrPostData));
curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$result = curl_exec($ch);
curl_close ($ch);

sleep(5);
  $myfile = fopen('text.txt', "w+") or die("Unable to open file!");
  fwrite($myfile, $_msg1);
  fclose($myfile);

?>
