<?php

require __DIR__.'/api/helper.php';
// require __DIR__.'/dbconfig.php';
// $sqlDB = new Database();

function getOffersList($method, $url, $brand = '', $category = ''){
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
                    $return[$i]['preview_url'] = $index['preview_url'];
                    $return[$i]['logo'] = $index['logo'];
                    $return[$i]['kpi'] = $index['kpi']['en'];
                }
            }else if($category != ''){
                // print_r(rawurldecode($category));
                $category = (strpos($category, '%20') != false)? str_ireplace("%20"," ",$category): $category;
                if(urldecode($category) == $index['categories'][0]){
                    $return[$i]['id'] = $index['id'];
                    $return[$i]['title'] = $index['title'];
                    $return[$i]['description_lang'] = $index['description_lang']['en'];
                    $return[$i]['preview_url'] = $index['preview_url'];
                    $return[$i]['logo'] = $index['logo'];
                    $return[$i]['kpi'] = $index['kpi']['en'];
                }
            }else{
                $return[$i]['id'] = $index['id'];
                $return[$i]['title'] = $index['title'];
                $return[$i]['description_lang'] = $index['description_lang']['en'];
                $return[$i]['preview_url'] = $index['preview_url'];
                $return[$i]['logo'] = $index['logo'];
                $return[$i]['kpi'] = $index['kpi']['en'];
            }

            $i++;
        }
        // exit;
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

function activeCategories($method, $url){
    $data = getDataThroughCurl($method, $url);
    $return = array();
    if($data['status'] == 200){
        $i = 0;
        foreach($data['data']['offers'] as $index){
            if(!empty($index['categories'])){
                // $return[$i]['category'] = $index['categories'][0];
                // $return[$i]['logo'] = $index['logo'];
                // $i++;
                $return[$index['categories'][0]] = $index['logo'];
            }
        }
        // foreach($return as $index){
        //     if($index[])
        // }
        // echo '<pre>';print_r($return);exit;
        $return = multi_unique($return);
    }
    return $return;
}

function activeRegion($method, $url){
    global $sqlDB;
    $data = getDataThroughCurl($method, $url);
    $return = array();
    $activeCountries = array();
    if($data['status'] == 200){
        $i = 0;
        foreach($data['data']['offers'] as $index){
            if(!empty($index['countries'])){
                $activeCountries[] = $index['countries'][0];
            }
        }
        if(!empty($activeCountries)){
            $activeCountries = multi_unique($activeCountries);
            $active_region = implode(',', $activeCountries);
            $query = "SELECT code,country from countries where  code in ('".$active_region."')";
            $return = $sqlDB->queryAll($query);
        }

    }
    return $return;
}

function getCategoryName($name=''){
    global $sqlDB;
    $category_name = '';
    if($name != ''){
        $query = "SELECT category_name from categories where category_name like '".$name."%'";
        $result = $sqlDB->queryRow($query);
        if(!empty($result)){
            $category_name = $result['category_name'];
        }
    }
    return $category_name;

}
?>
