<?php

define('LINE_API',"https://notify-api.line.me/api/notify");

$ACCESS_TOKEN = 'O2rG9dgNlZSZKnQgE9Z2QE6rd7FXgUQogsymGh0FSwTnHPfgbp99ByQjYwiwVWp7L06+0FQEUepyzXn+q7U9OGZWiOx9A04OL4UfuywgTYjMR4XuMn1FX6cZg1HIxCSNkqTlhp4tYnaYZ8UWEmvTygdB04t89/1O/w1cDnyilFU='; 


$strAccessToken = $ACCESS_TOKEN;
 
$content = file_get_contents('php://input');
$arrJson = json_decode($content, true);
 $content2 = file_get_contents('http://www.thaigold.info/RealTimeDataV2/gtdata_.txt');
 $arrJson2 = json_decode($content2, true);

$strUrl = "https://api.line.me/v2/bot/message/reply";

$arrHeader = array();
$arrHeader[] = "Content-Type: application/json";
$arrHeader[] = "Authorization: Bearer {$strAccessToken}";

if($arrJson['events'][0]['message']['text'] == "1"){
  $arrPostData = array();
  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
  $arrPostData['messages'][0]['type'] = "text";
  $arrPostData['messages'][0]['text'] = "ตรวจสอบหวยล่าสุด" . "\r\n" . "ผลสลากรางวัลหลัก https://www.lottery.co.th/show" . "\r\n" . "กรอกหมายเลขสลาก https://www.lottery.co.th/numbers";

  //$arrPostData = array();
  //$arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
  //$arrPostData['messages'][0]['type'] = "text";
  //$arrPostData['messages'][0]['text'] = "สวัสดี ID คุณคือ ".$arrJson['events'][0]['source']['userId'];
}else if($arrJson['events'][0]['message']['text'] == "2"){
  $arrPostData = array();
  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
  $arrPostData['messages'][0]['type'] = "text";
  $arrPostData['messages'][0]['text'] = "https://www.goldtraders.or.th/";
}else if($arrJson['events'][0]['message']['text'] == "a" || $arrJson['events'][0]['message']['text'] == "A"){
  $arrPostData = array();
  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
  $arrPostData['messages'][0]['type'] = "text";
  $arrPostData['messages'][0]['text'] = "สวัสดีครับ มีอะไรให้ช่วยไหมครับ" . "\r\n" . "กด 1 ตรวจสอบหวยล่าสุด" . "\r\n" . "กด 2 ดูราคาทองล่าสุด". "\r\n" . "กด 3 ดูหนังโป๊". "\r\n" . "กด 4 น้องบอสเมา". "\r\n" . "กด 5 พี่เอกับสาวๆ";
}else if($arrJson['events'][0]['message']['text'] == "ทำอะไรได้บ้าง"){
  $arrPostData = array();
  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
  $arrPostData['messages'][0]['type'] = "text";
  $arrPostData['messages'][0]['text'] = "ฉันทำอะไรไม่ได้เลย คุณต้องสอนฉันอีกเยอะ";
}else if($arrJson['events'][0]['message']['text'] == "3"){
  $arrPostData = array();
  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
  $arrPostData['messages'][0]['type'] = "text";
  $arrPostData['messages'][0]['text'] = "ขอให้มีความสุขในการรับชมนะครับ" . "\r\n" . "https://hpjav.tv" . "\r\n" . "https://xhamster.one" . "\r\n" . "https://www.xnxx.com" . "\r\n" . "https://www.av-th.net";

  }else if($arrJson['events'][0]['message']['text'] == "4"){
  $arrPostData = array();
  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
  $arrPostData['messages'][0]['type'] = "image";
  $arrPostData['messages'][0]['originalContentUrl'] = "https://www.img.in.th/images/97c2ff71d6e8ca6445c64c89136b6df4.jpg";
 $arrPostData['messages'][0]['previewImageUrl'] = "https://www.img.in.th/images/97c2ff71d6e8ca6445c64c89136b6df4.jpg";
}else if($arrJson['events'][0]['message']['text'] == "5"){
  $arrPostData = array();
  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
  $arrPostData['messages'][0]['type'] = "image";
  $arrPostData['messages'][0]['originalContentUrl'] = "https://www.img.in.th/images/d46d9656320100d0538615b11fffdeda.jpg";
 $arrPostData['messages'][0]['previewImageUrl'] = "https://www.img.in.th/images/d46d9656320100d0538615b11fffdeda.jpg";
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
