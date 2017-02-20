<?php
/**
 * curl灌水
 */
$url = "http://127.0.0.1/xingnuo/ajax.php";
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
 
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_TIMEOUT, 2);

$info = curl_exec($ch);
$info_data = curl_getinfo($ch);

curl_error($ch);
curl_close($ch);
print_r($info);
//print_r($info_data);
?>