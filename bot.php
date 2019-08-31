<?php
//echo "I am bot";
$access_token = 'Sxcc5EMw/0QsXJ06vAk17jrnUNP7Q4F1xK+YT/1H5O3nfTe3Jq8cIfZLJQQbcdQVApiYbLQWyYFmm5bMcieltXDrsQyCC5J3tEvt1iX7VE+7UWO1Nij2m+Naxkp33Doyq6FEFXasZO10VGTqVTyn2AdB04t89/1O/w1cDnyilFU=';

// Get Post body content
$content = file_get_contents('php://input');
// Paser Json
$events = json_decode($content, true);
// Validate parsed JSON data
if(!is_null($events['events'])){
    // Loop through each event
    foreach($events['events'] as $event){
        // Reply only when message sent is in 'text' format
	if($event['type'] == 'message' && $event['message']['type'] == 'text'){
	    // Get text sent
	    $text = $event['message']['text'];
	    // Get reply token
	    $replyToken = $event['replyToken'];

	    // Build message to reply back
	    $messages = [
	        'type' => 'text',
		'text' => $text
	    ];

	    // Make a POSt Request to messaging API to reply to sender
	    $url = 'https://api.line.me/v2/bot/message/reply';
	    $data = [
	    	'replyToken' => $replyToken,
		'messages' => [$messages]
	    ];
	    $post = json_encode($data);
	    $headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);

	    $ch = curl_init($url);
	    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	    curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
	    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
	    $result = curl_exec($ch);
	    curl_close($ch);

	    echo $result . "\r\n";

			    // Make a POSt Request to messaging API to reply to sender
	    $url = 'http://203.150.199.91:8080/poona-webapp/webapi/myresource';
	    $data = [
	    	'replyToken' => $replyToken,
		'messages' => [$messages],
		 'content' => $content,
	    ];
	    $post = json_encode($data);
	    $headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);

	    $ch = curl_init($url);
	    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	    curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
	    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
	    $result = curl_exec($ch);
	    curl_close($ch);
	
	}
    }
}
echo "OK";
