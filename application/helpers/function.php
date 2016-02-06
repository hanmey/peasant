<?php
/**
 * 上传文件到远程文件服务器
 * @param $name
 * @return mixed
 */
function upload_file($file_path)
{
    header('content-type:text/html;charset=utf8');
    $curl = curl_init();
    $data = array('file' => '@' . dirname(__FILE__) .$file_path);
    curl_setopt($curl, CURLOPT_URL, "/upload_file.php");
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
    $result = curl_exec($curl);
    curl_close($curl);
    return json_decode($result, true);
}
