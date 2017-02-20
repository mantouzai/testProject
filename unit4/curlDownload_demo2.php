<?php
/**
 * 通过抓包下载网易云音乐
 */
//header("Content-type: audio/mpeg");
 
$url = "http://m10.music.126.net/20170214173100/61f410c1850388729859c2a6366d627f/ymusic/4d74/9a47/83ba/712ba65776c20bdeeb6023c4fcf6ab07.mp3";
$header_data = array(
    "Host: m10.music.126.net",
    "User-Agent: Mozilla/5.0 (Windows NT 10.0; WOW64; rv:51.0) Gecko/20100101 Firefox/51.0 FirePHP/0.7.4",
    "Referer: http://music.163.com/",
    "Connection: keep-alive"
);
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HEADER, $header_data);

$data = curl_exec($ch);
$info = curl_getinfo($ch);

curl_error($ch);
curl_close($ch);
print_r($info);
file_put_contents("C:/Users/Administrator/Desktop/1111.mp3", $data);
?>