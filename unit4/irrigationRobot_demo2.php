<?php
/**
 * PHP   使用socket实现简单的灌水机器人
 * @since     2017/2/10
 * @author    bbr
 */
$data = array(
    'mes[title]'=>'小机器人来灌水', 
    'mes[miaoshu]'=>'我是小机器人派来执行任务的O(∩_∩)O', 
    'mes[name]'=>'施命者', 
    'mes[tel]'=>'18626359866', 
    'mes[qy_name]'=>'11111111',
    'mes[address]'=>'11111111@qq.com',
    'mes[type]'=>2,
    'dosubmit'=>'yes'
);

$data = http_build_query($data);

//$fp = fsockopen('127.0.0.1', 80, $errno, $errstr, 5);                     //scoket执行
$fp = stream_socket_client("tcp://127.0.0.1:80", $errno, $errstr, 3);       //stream_scoket执行

$out  = "POST http://127.0.0.1/xingnuo/ajax.php HTTP/1.1\r\n";
$out .= "Host: 127.0.0.1\r\n";
$out .= "Content-Type: application/x-www-form-urlencoded; charset=UTF-8\r\n";
$out .= "Content-Length: " . strlen($data) . "\r\n";
$out .= "User-Agent: Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.101 Safari/537.36\r\n";
$out .= "Referer: http://127.0.0.1/xingnuo/message.php?big_id=712&cat_id=740\r\n";
$out .= "Cookie: PHPSESSID=u35oe23psjeptsarjamct1i916\r\n";
$out .= "Connection: keep-alive\r\n\r\n";
$out .= $data . "\r\n\r\n";

fwrite($fp, $out);
while(!feof($fp)){                   //测试文件指针是否到了文件结束的位置
    echo fgets($fp, 1280);           
}

fclose($fp);
?>