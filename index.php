<?php


$API_URL = 'https://api.line.me/v2/bot/message';
$ACCESS_TOKEN = 'Yj5DQD1eT6DmR1/NScA39PtOfKYcxNntn+oPl1+HOWozB6FkvBRTWhTV3Dn7ABJQ7hOQ+bFrUWQ8hUU9KR6Dtov9o5UrrteKJx3uwnyVerfXC5BXUcX4ax1E/s3Ctde4SKzQIhca8Z/0HPHU6/cO9wdB04t89/1O/w1cDnyilFU='; 
$channelSecret = 'b38962b72e4646841bb4d4fccadf5c52';


$POST_HEADER = array('Content-Type: application/json', 'Authorization: Bearer ' . $ACCESS_TOKEN);

$request = file_get_contents('php://input');   // Get request content
$request_array = json_decode($request, true);   // Decode JSON to Array



if ( sizeof($request_array['events']) > 0 ) {

    foreach ($request_array['events'] as $event) {

        $reply_message = '';
        $reply_token = $event['replyToken'];


        //$data = [
        //    'replyToken' => $reply_token,
        //    'messages' => [['type' => 'text', 'text' => json_encode($request_array)]]
        //];
        $arr = array('a' => 1, 'b' => 2, 'c' => 3, 'd' => 4, 'e' => 5);

        $post_body = json_encode($arr);
    // $post_body = json_encode($data, JSON_UNESCAPED_UNICODE);
     
        //$post_body = 'สวัสดี';
        $send_result = send_reply_message($API_URL.'/reply', $POST_HEADER, $post_body);

        echo "Result: ".$send_result."\r\n";
        
    }
}

echo "OK";




function send_reply_message($url, $post_header, $post_body)
{
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $post_header);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post_body);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    $result = curl_exec($ch);
    curl_close($ch);

    return $result;
}

?>
