<?php

define('LINE_API',"https://notify-api.line.me/api/notify");

$ACCESS_TOKEN = 'O2rG9dgNlZSZKnQgE9Z2QE6rd7FXgUQogsymGh0FSwTnHPfgbp99ByQjYwiwVWp7L06+0FQEUepyzXn+q7U9OGZWiOx9A04OL4UfuywgTYjMR4XuMn1FX6cZg1HIxCSNkqTlhp4tYnaYZ8UWEmvTygdB04t89/1O/w1cDnyilFU='; 


$strAccessToken = $ACCESS_TOKEN;
 
$content = file_get_contents('php://input');
$arrJson = json_decode($content, true);

$strUrl = "https://api.line.me/v2/bot/message/reply";

$arrHeader = array();
$arrHeader[] = "Content-Type: application/json";
$arrHeader[] = "Authorization: Bearer {$strAccessToken}";

if($arrJson['events'][0]['message']['text'] == "Hello"){
  $arrPostData = array();
  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
  $arrPostData['messages'][0]['type'] = "text";
  $arrPostData['messages'][0]['text'] = "สวัสดีครับ มีอะไรให้ช่วยไหมครับ" . "\r\n" . "กด 1 แสดงการอัพเดท fullist (gatewaymonitor)" . "\r\n" . "กด 2 แสดงสถานะการเติมเงินจากภายนอก POS Bank". "\r\n" . "กด 3 แสดง OUTBOX และ INBOX ด่านบางจาก";

  //$arrPostData = array();
  //$arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
  //$arrPostData['messages'][0]['type'] = "text";
  //$arrPostData['messages'][0]['text'] = "สวัสดี ID คุณคือ ".$arrJson['events'][0]['source']['userId'];
}else if($arrJson['events'][0]['message']['text'] == "hello"){
  $arrPostData = array();
  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
  $arrPostData['messages'][0]['type'] = "text";
  $arrPostData['messages'][0]['text'] = "สวัสดีครับ มีอะไรให้ช่วยไหมครับ" . "\r\n" . "กด 1 แสดงการอัพเดท fullist (gatewaymonitor)" . "\r\n" . "กด 2 แสดงสถานะการเติมเงินจากภายนอก POS Bank". "\r\n" . "กด 3 แสดง OUTBOX และ INBOX ด่านบางจาก";
}else if($arrJson['events'][0]['message']['text'] == "ชื่ออะไร"){
  $arrPostData = array();
  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
  $arrPostData['messages'][0]['type'] = "text";
  $arrPostData['messages'][0]['text'] = "ฉันยังไม่มีชื่อนะ";
}else if($arrJson['events'][0]['message']['text'] == "ทำอะไรได้บ้าง"){
  $arrPostData = array();
  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
  $arrPostData['messages'][0]['type'] = "text";
  $arrPostData['messages'][0]['text'] = "ฉันทำอะไรไม่ได้เลย คุณต้องสอนฉันอีกเยอะ";
}else if($arrJson['events'][0]['message']['text'] == "1"){
  //include('bt_monitor\bt_monitor.php');
  }else if($arrJson['events'][0]['message']['text'] == "2"){
  //include('POS_monitor_BANK_line.php');

}else if($arrJson['events'][0]['message']['text'] == "3"){
  //include('monitor_bj_line.php');
}else{
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


?>
