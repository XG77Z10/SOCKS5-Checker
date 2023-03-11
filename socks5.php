<?php
error_reporting(0);
set_time_limit();

$fgt = file_get_contents("list.txt");
$type = array(
    'CURLPROXY_SOCKS5'
);
// Windows /r/n
$pro = explode("\r\n", $fgt);
foreach ($pro as $key => $proxy) {
        foreach ($type as $kexxy => $tipe) {
            $cURL = curl_init();
            curl_setopt($cURL, CURLOPT_URL, "http://ip-api.com/json");
            curl_setopt($cURL, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($cURL, CURLOPT_CONNECTTIMEOUT ,0);
            curl_setopt($cURL, CURLOPT_TIMEOUT, 10); // Timeout Sec
            curl_setopt($cURL, CURLOPT_PROXYTYPE, $tipe);
            curl_setopt($cURL, CURLOPT_PROXY, $proxy);
            $data = json_decode(curl_exec($cURL),true);
            if( $data['status'] ){
                echo $proxy."\r\n";
            }
        }
}
?>
