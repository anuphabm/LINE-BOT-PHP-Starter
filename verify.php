<?php
//echo "I am bot";
$access_token = 'Sxcc5EMw/0QsXJ06vAk17jrnUNP7Q4F1xK+YT/1H5O3nfTe3Jq8cIfZLJQQbcdQVApiYbLQWyYFmm5bMcieltXDrsQyCC5J3tEvt1iX7VE+7UWO1Nij2m+Naxkp33Doyq6FEFXasZO10VGTqVTyn2AdB04t89/1O/w1cDnyilFU=';

$url = 'https://api.line.me/v1/oauth/verify';

$header = array('Authorization: Bearer '. $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;
