<?php

require __DIR__.'/api/helper.php';

function getOffersList($method, $url, $brand = ''){
    $data = getDataThroughCurl($method, $url);
    $return = array();
    if($data['status'] == 200){
        $i = 0;
        foreach($data['data']['offers'] as $index){
            if($brand != ''){
                if($brand == $index['title']){
                    $return[$i]['id'] = $index['id'];
                    $return[$i]['title'] = $index['title'];
                    $return[$i]['description_lang'] = $index['description_lang']['en'];
                    $return[$i]['preview_url'] = $index['link'];
                    $return[$i]['logo'] = $index['logo'];
                    $return[$i]['kpi'] = $index['kpi']['en'];
                }
            }else{
                $return[$i]['id'] = $index['id'];
                $return[$i]['title'] = $index['title'];
                $return[$i]['description_lang'] = $index['description_lang']['en'];
                $return[$i]['preview_url'] = $index['link'];
                $return[$i]['logo'] = $index['logo'];
                $return[$i]['kpi'] = $index['kpi']['en'];
            }

            $i++;
        }
    }
    return $return;
}


function activeBrands($method, $url){
    $data = getDataThroughCurl($method, $url);
    $return = array();
    if($data['status'] == 200){
        $i = 0;
        foreach($data['data']['offers'] as $index){
            $return[$i]['title'] = $index['title'];
            $return[$i]['logo'] = $index['logo'];
            $i++;
        }
        $return = multi_unique($return);
    }
    return $return;
}


?>
