<?php

define('LINE_API',"https://notify-api.line.me/api/notify");

$ACCESS_TOKEN = 'ftsoY52+xbkCiMsxsIhyCqANP+8FIj5wpINM/PaLsH4Kel0eanJHOFbFfqdzkJ9OBBOf3XIPppGsENtJ+ZV9cJTGZyBt0ymPE3lSjHZoNQifx2wKIN98Rutz7dyl0Nknt4fWstSJulo7OOh2QYTy4gdB04t89/1O/w1cDnyilFU='; 


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
  $arrPostData['messages'][0]['text'] = "สวัสดีครับ มีอะไรให้ช่วยไหมครับ" . "\r\n" . "กด 1 ตรวจสอบหวยล่าสุด" . "\r\n" . "กด 2 ดูราคาทองล่าสุด". "\r\n" . "กด 3 Covid-19";
}else if($arrJson['events'][0]['message']['text'] == "ทำอะไรได้บ้าง"){
  $arrPostData = array();
  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
  $arrPostData['messages'][0]['type'] = "text";
  $arrPostData['messages'][0]['text'] = "ฉันทำอะไรไม่ได้เลย คุณต้องสอนฉันอีกเยอะ";
}else if($arrJson['events'][0]['message']['text'] == "3"){
  $arrPostData = array();
  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
  $arrPostData['messages'][0]['type'] = "image";
  $arrPostData['messages'][0]['originalContentUrl'] = "https://static.posttoday.com/media/content/2020/02/12/FBB2680F4455161950EA941678A25F76.jpg";
 $arrPostData['messages'][0]['previewImageUrl'] = "https://static.posttoday.com/media/content/2020/02/12/FBB2680F4455161950EA941678A25F76.jpg";

  }else if($arrJson['events'][0]['message']['text'] == "4"){

 $json = file_get_contents('https://covid19.th-stat.com/api/open/today');
 
 //$json = '{"CustomerID":"C001","Name":"Weerachai Nukitram","Email":"win.weerachai@thaicreate.com","CountryCode":"TH","Budget":"1000000","Used":"600000"}';

$obj = json_decode($json);
  $arrPostData = array();
  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
  $arrPostData['messages'][0]['type'] = "text";
  $arrPostData['messages'][0]['text'] = "รายงานสถานะการณ์ Covid-19 ล่าสุด" . "\r\n" . "วันที่ " . $obj->{'UpdateDate'} . " น." . "\r\n" .
   "ติดเชื้อสะสม " . $obj->{'Confirmed'} . " ราย" . "\r\n" . "เพิ่มขึ้น " . $obj->{'NewConfirmed'} . " ราย"  . "\r\n" . 
   "รักษาหายแล้ว " . $obj->{'Recovered'} . " ราย" . "\r\n" . 
   "ตาย " . $obj->{'Deaths'} . " ราย";

}else if($arrJson['events'][0]['message']['text'] == "5"){
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
