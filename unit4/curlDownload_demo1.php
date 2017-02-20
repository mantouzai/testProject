<?php
/**
 * curl下载图片
 */
 //@header("Content-type: image/png");
 
 $url = "http://www.baidu.com/img/logo_76bcbf7d7c327b5f29dd98aa4d6e9a1e.png";
 $ch  = curl_init();
 
 curl_setopt($ch, CURLOPT_URL, $url);
 curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
 @curl_setopt($ch, CURLLOP_HEADER, 1);
 
 $output = curl_exec($ch);
 $info = curl_getinfo($ch);
 curl_error($ch);
 curl_close($ch);
 
file_put_contents("C:/Users/Administrator/Desktop/download.png", $output);
$size = filesize("C:/Users/Administrator/Desktop/download.png");
if($size != $info['size_download']){
    echo "下载数据不够完整！";
}else{
    echo "下载成功！";
}
?>