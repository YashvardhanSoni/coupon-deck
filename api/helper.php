<?php
require __DIR__.'/../config.php';

function getDataThroughCurl($method, $url) {
    $curl = curl_init();
    if (!$curl) {
        die("Couldn't initialize a cURL handle");
    }
    // $headers  = array("Content-Type:multipart/form-data");
    $options = array(
        CURLOPT_URL => $url,
        CURLOPT_HEADER => false,
        // CURLOPT_HTTPHEADER => $headers,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_SSL_VERIFYPEER => false
    );
    curl_setopt_array($curl, $options);
    $result = curl_exec($curl);
    $data_set = json_decode($result,true) ;
    if (curl_errno($curl)){
        $res['status'] = 400;
	    $res['msg'] = curl_error($curl);
    }
    else{
        $res['status'] = 200;
        $res['msg'] = 'Data Found.';
        $res['data'] = $data_set;
    }
    curl_close($curl);
    return $res;
}

function multi_unique($src){
    $output = array_map("unserialize",
    array_unique(array_map("serialize", $src)));
  return $output;
}

function getFirstPara($string){
    $string = substr($string,0, strpos($string, "</p>")+4);
    if (strlen($string) > 100){
        $string = substr($string, 0, 100) . '...';
    }
    return $string;
}



?>
