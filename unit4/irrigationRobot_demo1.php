<?php
/**
 * PHP实现简单的灌水机器人
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

$data = http_build_query($data);                    //生成 URL-encode 之后的请求字符串

$header_data = array(
    'http' => array(
        'method'  => 'POST',
        'header'  => 'Content-Type: application/x-www-form-urlencoded; charset=UTF-8\r\n' . 
                     'Host: 127.0.0.1\r\n' . 
                     'Content-Length: ' . strlen($data) . '\r\n' . 
                     'Connection: keep-alive' . 
                     'Cookie: PHPSESSID=0vbjup40bjg24ftt1v4nb03oq6\r\n' . 
                     'User-Agent: Mozilla/5.0 (Windows NT 10.0; WOW64; rv:51.0) Gecko/20100101 Firefox/51.0 FirePHP/0.7.4\r\n' .
                     'Referer: http://127.0.0.1/xingnuo/message.php?big_id=712&cat_id=740\r\n' . 
                     'X-Requested-With: XMLHttpRequest\r\n' . 
                     'content: ' . $data,
        'content' => $data
    )
);
$context = stream_context_create($header_data);      //创建资源流上下文

$url = "http://127.0.0.1/xingnuo/ajax.php";
$file = file_get_contents($url, false, $context);    //将整个文件读入一个字符串

echo $file;
?> 