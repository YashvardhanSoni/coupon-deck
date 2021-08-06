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

// function CallAPI($method, $url, $data = false)
// {   
//     $curl = curl_init();
//     switch ($method){
//         case "POST":
//             curl_setopt($curl, CURLOPT_POST, 1);
//             if ($data)
//                 curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
//             break;
//         case "PUT":
//             curl_setopt($curl, CURLOPT_PUT, 1);
//             break;
//         default:
//             if ($data)
//                 $url = sprintf("%s?%s", $url, http_build_query($data));
//     }
//     curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
//     // curl_setopt($curl, CURLOPT_USERPWD, "username:password");
//     curl_setopt($curl, CURLOPT_URL, $url);
//     curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
//     $result = curl_exec($curl);
//     curl_close($curl);
//     return $result;
// }




?>