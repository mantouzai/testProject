<?php
/**
 * CURL伪造手机头访问web页面
 */
@header("Content-type: text/html; charset: utf-8");

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, "http://3g.qq.com");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

$header = array(
    "HTTP_VIA: HTTP/1.1 SNXA-PS-WAP-GW21 (infoX-WISG, Huawei Twchnologies)",
    "HTTP_ACCEPT: application/vnd.wap.wmlscriptc, text/vnd.wap.wml, application/vnd.wap.xhtml+xml, application/xhtml+xml, text/html, text/html, multipart/mixes, */*",
    "HTTP_ACCEPT_CHARSET: ISO-8859-1, US-ASCII, UTF-8; Q=0.8, ISO-8859-15; Q=0.8, ISO-10646-UCS-2; Q=0.6, UTF-16; Q=0.6"
);

curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
$output = curl_exec($ch);
curl_close($ch);

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, "http://info50.3g.qq.com/g/s?aid=index&s_it=3&g_from=3gindex&g_f=1283");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, $header);

$output = curl_exec($ch);
curl_close($ch);
echo $output;
?>