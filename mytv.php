<?php

$id = $_GET["id"];
$url = "https://webapi.mytv.vn/api/v1/channel/$id/play?&uuid=0f465d0f8225c4e3f68cfb57dcf81e12&time=2022y07m27d_17h39m58s337ms";

$ch = curl_init();
 curl_setopt($ch, CURLOPT_URL, $url);
 curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
 curl_setopt($ch, CURLOPT_POST, 1);
 $headers = array();
 $headers[] = 'Authorization: Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ0eXBlIjowLCJpcCI6IjExNS43OC4xMzAuMTM4IiwibWFudWZhY3R1cmVyX2lkIjoiNmVmNGQ3ZTFkNTVlYzQ4ODY1NzdjZDNhM2U2MTg3OTEiLCJleHBpcmUiOjE2NTU4MjQyNTQsImJvZHkiOiJCMkMtLUVDTy0tMjMyNTUxNzEtLTZlZjRkN2UxZDU1ZWM0ODg2NTc3Y2QzYTNlNjE4NzkxIiwiaWF0IjoxNjU1NzM3ODU0fQ.8shsHw97n6Yne3hkcVbI2jgMyJR3x3Qvv0NdU21RHKY';
 $headers[] = 'Macaddress: c5f3207a97ff4eb10480c5623cb6bca5';
 $headers[] = 'User-Agent: Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) SamsungBrowser/17.0 Chrome/96.0.4664.104 Safari/537.36';
 $headers[] = 'Content-Type: application/json';
 curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
 $result = curl_exec($ch);
 if (curl_errno($ch)) { 
 echo 'Error:' . curl_error($ch);
 }
 curl_close($ch);
 preg_match('/"url":"(.*?)"/', $result, $link);
 $output = $link[1];
 
 
$chatluong = $_GET["cl"];
if(isset($chatluong)){

$links = str_replace("q=auto", "q=$chatluong", $output);

header("Location: " .$links, 302);
}
else {
header("Location: " .$output, 302);
}
 

?>
