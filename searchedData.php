<?php
require __DIR__.'/api/helper.php';

$category = $_POST['category'];
$search_value = $_POST['search_value'];
$pageid = $_POST['pageid'];

if(!empty($category) && !empty($search_value)){
    $method = 'GET';
    $url = 'https://api-mtrack.affise.com/3.0/partner/offers?api-key=9a5057e1103b54ea0bb5f4f16cbe1a62';
    $data = getDataThroughCurl($method, $url);
    $return = array();
    $html = '';
    if($data['status'] == 200){
        $i = 0;
        foreach($data['data']['offers'] as $index){
            if(!empty($index['categories']) && $category == $index['categories'][0] && strpos($index['title'], $search_value) !== false){
                if($pageid != 'brands'){
                    $return[$i]['id'] = $index['id']; 
                    $return[$i]['title'] = $index['title']; 
                    $return[$i]['description_lang'] = $index['description_lang']['en']; 
                    $return[$i]['preview_url'] = $index['link']; 
                    $return[$i]['logo'] = $index['logo']; 
                    $return[$i]['kpi'] = $index['kpi']['en']; 
                }else{
                    $return[$i]['title'] = $index['title']; 
                    $return[$i]['logo'] = $index['logo']; 
                    
                }
                $i++;
                
            }
        }

        if(!empty($return)){
            $i = 1;
            if($pageid == 'coupon'){
                foreach($return as $index){
                    $html .= '<div class="col mar-bottom-xs" id ="p'.($i - 1).'"><div class="header">
                    <div class="c-logo" style="width: 200px;min-height: 195px;float: left;margin: 0 0px 0 0;"><img src="'.$index['logo'].'" alt="logo" class="img-responsive"></div>
                    </div><span class="sub-title"><b>'.$index['title'].'</b></span><div class="text-center">
                    <a href="coupon-detail.php#popup'.$i.'" target="_blank" class="btn-primary text-center text-uppercase md-round">view details</a>
                    </div></div>';
                    $i++;
                }
            }else if($pageid == 'index'){
                foreach($return as $index){
					$desc = getFirstPara($index['description_lang']);
                    $html .= '<div class="col mar-bottom-xs health"><div class="header">
                    <div class="c-logo" style="width: 200px;min-height: 125px;float: left;margin: 0 0px 0 0;"><img src="'.$index['logo'].'" alt="logo" class="img-responsive"></div>
                    </div><strong class="heading6">Name: '.$index['title'].'</strong>
                    <p><strong class="heading6"> </strong>'.$desc.'</p><div class="text-center">
                    <a href="coupon-detail.php#popup'.$i.'" target="_blank" class="btn-primary text-center text-uppercase md-round">view details</a>
                    </div></div>';
                    $i++;
                }
            }else if($pageid == 'brands'){
                // $return = multi_unique($return);
                foreach($return as $index){
                    $html .= '<li><p><b>'.$index['title'].'</b></p><a href="offers.php?brand='.$index['title'].'"><img src="'.$index['logo'].'" style="padding:25px;" alt="'.$index['title'].'" class="img-responsive"></a></li>
                    ';
                }
                
            }
            
        }

        echo $html;
    }

}
?>