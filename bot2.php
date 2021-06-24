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
  $arrPostData['messages'][0]['originalContentUrl'] = "https://www.img.in.th/images/a54900abca14659523008ba972934324.jpg";
 $arrPostData['messages'][0]['previewImageUrl'] = "https://www.img.in.th/images/a54900abca14659523008ba972934324.jpg";
}else if($arrJson['events'][0]['message']['text'] == "4"){
   $arrPostData = array();
  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
  $arrPostData['messages'][0]['type'] = "image";
  $arrPostData['messages'][0]['originalContentUrl'] = "https://www.img.in.th/images/92f62c71529005e59e225c313c734245.png";
 $arrPostData['messages'][0]['previewImageUrl'] = "https://www.img.in.th/images/92f62c71529005e59e225c313c734245.png";
}else if($arrJson['events'][0]['message']['text'] == "โควิด" || $arrJson['events'][0]['message']['text'] == "ช่วย" || $arrJson['events'][0]['message']['text'] == "ช่วยเหลือ" || $arrJson['events'][0]['message']['text'] == "ขอข้อมูล" || $arrJson['events'][0]['message']['text'] == "สวัสดี"){
  $arrPostData = array();
  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
  $arrPostData['messages'][0]['type'] = "text";
  $arrPostData['messages'][0]['text'] = "สวัสดีครับ มีอะไรให้ช่วยไหมครับ" . "\r\n" . "กด 1 ยอดผู้ติดเชื้อประจำวัน" . "\r\n" . 
   "กด 2 พื้นที่เสี่ยงในประเทศ". "\r\n" . 
   "กด 3 การป้องกันตนเองจากโควิด-19". "\r\n" .
   "กด 4 อาการของโควิด-19". "\r\n" .
   "กด 5 การปฏิบัติตนเมื่อสัมผัสผู้ติดเชื้อ [QUARRANTINE]". "\r\n" .
   "กด 6 วัคซีนป้องกันโควิด-19";
}else if($arrJson['events'][0]['message']['text'] == "2"){
  $arrPostData = array();
  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
  $arrPostData['messages'][0]['type'] = "text";
  $arrPostData['messages'][0]['text'] = "https://covid19.th-stat.com/th/share/map";
}else if($arrJson['events'][0]['message']['text'] == "5"){
  $arrPostData = array();
  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
   $arrPostData['messages'][0]['type'] = "text";
  $arrPostData['messages'][0]['text'] = "การปฏิบัติตนเมื่อสัมผัสผู้ติดเชื้อ [QUARRANTINE]" . "\r\n" . "กด 5.1 วิธีการกักตัว 14 วัน" . "\r\n" . 
   "กด 5.2 การปฏิบัติตนสำหรับผู้ร่วมบ้าน";
}else if($arrJson['events'][0]['message']['text'] == "5.1"){
   $arrPostData = array();
  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
  $arrPostData['messages'][0]['type'] = "image";
  $arrPostData['messages'][0]['originalContentUrl'] = "https://www.img.in.th/images/18aa829ea6dba6edd04f72547440ba87.jpg";
 $arrPostData['messages'][0]['previewImageUrl'] = "https://www.img.in.th/images/18aa829ea6dba6edd04f72547440ba87.jpg";
 }else if($arrJson['events'][0]['message']['text'] == "5.2"){
   $arrPostData = array();
  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
  $arrPostData['messages'][0]['type'] = "image";
  $arrPostData['messages'][0]['originalContentUrl'] = "https://www.img.in.th/images/e0367285b4dc01e6acfa24814b5fbe5e.png";
 $arrPostData['messages'][0]['previewImageUrl'] = "https://www.img.in.th/images/e0367285b4dc01e6acfa24814b5fbe5e.png";
 }else if($arrJson['events'][0]['message']['text'] == "6"){
  $arrPostData = array();
  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
   $arrPostData['messages'][0]['type'] = "text";
  $arrPostData['messages'][0]['text'] = "วัคซีนโควิด-19" . "\r\n" . "กด 6.1 ประเภทของวัคซีนโควิด-19" . "\r\n" . 
   "กด 6.2 อาการไม่พึงประสงค์หลังจากรับวัคซีนโควิด-19";
 }else if($arrJson['events'][0]['message']['text'] == "6.1"){
    $arrPostData = array();
  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
  $arrPostData['messages'][0]['type'] = "image";
  $arrPostData['messages'][0]['originalContentUrl'] = "https://www.img.in.th/images/4bc0832107803a474bd6d60a2f027295.jpg";
 $arrPostData['messages'][0]['previewImageUrl'] = "https://www.img.in.th/images/4bc0832107803a474bd6d60a2f027295.jpg";
 }else if($arrJson['events'][0]['message']['text'] == "6.2"){
$arrPostData = array();
  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
  $arrPostData['messages'][0]['type'] = "image";
  $arrPostData['messages'][0]['originalContentUrl'] = "https://www.img.in.th/images/b84d364f9f80f88f875659c772c78c69.jpg";
 $arrPostData['messages'][0]['previewImageUrl'] = "https://www.img.in.th/images/b84d364f9f80f88f875659c772c78c69.jpg";
  }else if($arrJson['events'][0]['message']['text'] == "1"){

 //$json = file_get_contents('https://covid19.th-stat.com/json/covid19v2/getTodayCases.json');
  $json = file_get_contents('https://corona.lmao.ninja/v2/countries/TH');
 //$json = curl_get_contents('https://covid19.th-stat.com/json/covid19v2/getTodayCases.json');
 
 //$json ='{"Confirmed":225365,"Recovered":187836,"Hospitalized":35836,"Deaths":1693,"NewConfirmed":4059,"NewRecovered":2047,"NewHospitalized":1977,"NewDeaths":35,"UpdateDate":"22\/06\/2021 16:59","DevBy":"https:\/\/www.kidkarnmai.com\/"}';

 
 //$json = '{"CustomerID":"C001","Name":"Weerachai Nukitram","Email":"win.weerachai@thaicreate.com","CountryCode":"TH","Budget":"1000000","Used":"600000"}';

$obj = json_decode($json);
  $arrPostData = array();
  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
  $arrPostData['messages'][0]['type'] = "text";
 $arrPostData['messages'][0]['text'] = $obj->{'Updated'};
  /*$arrPostData['messages'][0]['text'] = "รายงานสถานะการณ์ Covid-19 ล่าสุด" . "\r\n" . "วันที่ " . $obj->{'UpdateDate'} . " น." . "\r\n" .
   "ผู้ป่วยยืนยันสะสม " . $obj->{'Confirmed'} . " ราย" . "\r\n" . "ผู้ป่วยรายใหม่วันนี้ " . $obj->{'NewConfirmed'} . " ราย"  . "\r\n" . 
   "รักษาอยู่ใน ร.พ. " . $obj->{'Hospitalized'} . " ราย" . "\r\n" .
   "รักษาอยู่ใน ร.พ. เพิ่มขึ้นวันนี้ " . $obj->{'NewHospitalized'} . " ราย" . "\r\n" .
   "รักษาหาย " . $obj->{'Recovered'} . " ราย" . "\r\n" .
   "รักษาหายวันนี้ " . $obj->{'NewRecovered'} . " ราย" . "\r\n" .
   "เสียชีวิต " . $obj->{'Deaths'} . " ราย". "\r\n" .
   "เสียชีวิตวันนี้ " . $obj->{'NewDeaths'} . " ราย". "\r\n" .
   "(ที่มา : กรมควบคุมโรค) ";*/

}else if($arrJson['events'][0]['message']['text'] == "xczcxzzczxcz"){
   $json2 = file_get_contents('https://covid19.th-stat.com/api/open/cases/sum');

$obj2 = json_decode($json2, true);

  $arrPostData = array();
  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
  $arrPostData['messages'][0]['type'] = "text";
  //$arrPostData['messages'][0]['text'] = $obj2['Province']['Bangkok'];
  $arrPostData['messages'][0]['text'] = $obj2['Nation']['Thailand'];

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

function curl_get_contents($url)
{
    $ch=curl_init();

    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_URL, $url);

    $data=curl_exec($ch);
    curl_close($ch);

    return $data;
}
?>
