<?php

require __DIR__.'/api/helper.php';
// require __DIR__.'/dbconfig.php';
// $sqlDB = new Database();

function index(){
    echo 'hi';
}

function getOffersList($method, $url, $brand = '', $category = '', $id = ''){
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
            }else if($category != ''){
                if(!empty($index['categories']) && $category == $index['categories'][0]){
                    $return[$i]['id'] = $index['id']; 
                    $return[$i]['title'] = $index['title']; 
                    $return[$i]['description_lang'] = $index['description_lang']['en']; 
                    $return[$i]['preview_url'] = $index['link']; 
                    $return[$i]['logo'] = $index['logo']; 
                    $return[$i]['kpi'] = $index['kpi']['en']; 
                }
            }else if($id != ''){
                if($index['id'] == $id){
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
        // exit;
    }
    return $return;
}


function activeBrands($method, $url, $category = '', $title=''){
    $data = getDataThroughCurl($method, $url);
    $return = array();
    if($data['status'] == 200){
        $i = 0;
        if($category != ''){
            foreach($data['data']['offers'] as $index){
                if($category != 'nill'){
                    if(!empty($index['categories']) && $category == $index['categories'][0] && $title != $index['title']){
                        $return[$index['title']] = $index['logo']; 
                    }
                }else{
                    $return[$index['title']] = $index['logo']; 
                }
            }
        }else{
            foreach($data['data']['offers'] as $index){
                $return[$i]['title'] = $index['title']; 
                $return[$i]['logo'] = $index['logo']; 
                $i++;
            }
            $return = multi_unique($return);
        }
        
    }
    return $return;
}

function activeCategories($method, $url){
    $data = getDataThroughCurl($method, $url);
    $return = array();
    if($data['status'] == 200){
        $i = 0;
        foreach($data['data']['offers'] as $index){
            if(!empty($index['categories']) && $index['categories'][0] != 'Hot Offers'){
                $return[$index['categories'][0]] = 'categories/'.getCategoryImage($index['categories'][0]);
            }
        }   
    }
    return $return;
}

function getCategoryImage($category_name = ''){
    global $sqlDB;
    $query = "SELECT image from categories where category_name = '".$category_name."'";
    $return = $sqlDB->queryRow($query);
    return $return['image'];

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

function getCategoryName($url, $name='', $brand_name = ''){
    global $sqlDB;
    $category_name = '';
    if($name != ''){
        $query = "SELECT category_name from categories where category_name like '".$name."%'";
        $result = $sqlDB->queryRow($query);
        if(!empty($result)){
            $category_name = $result['category_name'];
        }
    }else if($brand_name != ''){
        $category_name = 'nill';
        $data = getDataThroughCurl('GET', $url);
        $return = array();
        if($data['status'] == 200){
            $i = 0;
            foreach($data['data']['offers'] as $index){
                if(!empty($index['categories']) && $brand_name == $index['title']){
                    $category_name = $index['categories'][0];
                    break;
                }
            }
        }
    }
    return $category_name;
    
}


function hotOffers($method, $url){
    $data = getDataThroughCurl($method, $url);
    $return = array();
    if($data['status'] == 200){
        $i = 0;
        foreach($data['data']['offers'] as $index){
            if(!empty($index['categories']) && in_array('Hot Offers', $index['categories'])){
                $return[$i]['id'] = $index['id'];
                $return[$i]['title'] = $index['title'];
                $return[$i]['logo'] = $index['logo'];
                $return[$i]['description_lang'] = $index['description_lang']['en']; 
                // $return[$index['id']] = $index['logo'];
                $i++;
            }
        }  
    }
    return $return;
}

?>