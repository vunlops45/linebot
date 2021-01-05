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

if($arrJson['events'][0]['message']['text'] == "3"){
  $arrPostData = array();
  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
  $arrPostData['messages'][0]['type'] = "image";
  $arrPostData['messages'][0]['originalContentUrl'] = "https://www.img.in.th/images/8a18b38a19dcf39fc62334cba717863f.jpg";
 $arrPostData['messages'][0]['previewImageUrl'] = "https://www.img.in.th/images/8a18b38a19dcf39fc62334cba717863f.jpg";

}else if($arrJson['events'][0]['message']['text'] == "9"){
  $arrPostData = array();
  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
  $arrPostData['messages'][0]['type'] = "text";
  $arrPostData['messages'][0]['text'] = "https://www.goldtraders.or.th/";
}else if($arrJson['events'][0]['message']['text'] == "a" || $arrJson['events'][0]['message']['text'] == "A"){
  $arrPostData = array();
  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
  $arrPostData['messages'][0]['type'] = "text";
  $arrPostData['messages'][0]['text'] = "สวัสดีครับ มีอะไรให้ช่วยไหมครับ" . "\r\n" . "กด 1 ยอดผู้ป่วยโควิด-19" . "\r\n" . 
   "กด 2 การเตรียมตัวก่อน-หลังเดินทางการในยุค COVID-19". "\r\n" . 
   "กด 3 การปฏิบัติตัวเมื่อเดินทางจากพื้นที่ที่มีการระบาด";
}else if($arrJson['events'][0]['message']['text'] == "ทำอะไรได้บ้าง"){
  $arrPostData = array();
  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
  $arrPostData['messages'][0]['type'] = "text";
  $arrPostData['messages'][0]['text'] = "ฉันทำอะไรไม่ได้เลย คุณต้องสอนฉันอีกเยอะ";
}else if($arrJson['events'][0]['message']['text'] == "2"){
  $arrPostData = array();
  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
  $arrPostData['messages'][0]['type'] = "image";
  $arrPostData['messages'][0]['originalContentUrl'] = "https://www.img.in.th/images/24ff1031359f23f4b0e2fcb43daeaf9a.jpg";
 $arrPostData['messages'][0]['previewImageUrl'] = "https://www.img.in.th/images/24ff1031359f23f4b0e2fcb43daeaf9a.jpg";

  }else if($arrJson['events'][0]['message']['text'] == "1"){

 $json = file_get_contents('https://covid19.th-stat.com/api/open/today');
 
 //$json = '{"CustomerID":"C001","Name":"Weerachai Nukitram","Email":"win.weerachai@thaicreate.com","CountryCode":"TH","Budget":"1000000","Used":"600000"}';

$obj = json_decode($json);
  $arrPostData = array();
  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
  $arrPostData['messages'][0]['type'] = "text";
  $arrPostData['messages'][0]['text'] = "รายงานสถานะการณ์ Covid-19 ล่าสุด" . "\r\n" . "วันที่ " . $obj->{'UpdateDate'} . " น." . "\r\n" .
   "ผู้ป่วยยืนยันสะสม " . $obj->{'Confirmed'} . " ราย" . "\r\n" . "ผู้ป่วยรายใหม่วันนี้ " . $obj->{'NewConfirmed'} . " ราย"  . "\r\n" . 
   "รักษาหาย " . $obj->{'Recovered'} . " ราย" . "\r\n" . 
   "เสียชีวิต " . $obj->{'Deaths'} . " ราย". "\r\n" .
   "(ที่มา : กรมควบคุมโรค) ";

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
