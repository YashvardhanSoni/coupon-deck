<?php

require __DIR__.'/../dbconfig.php';
$sqlDB = new Database();

function activeCountries($region = ''){
    global $sqlDB;
    if($region != ''){
        $query = "SELECT code,country from countries where status = 1 AND code = '".$region."'";
        $result = $sqlDB->queryRow($query);
        $result = $result['country'];
    }else{
        $query = "SELECT code,country from countries where status = 1";
        $result = $sqlDB->queryAll($query);
    }
    return $result;
}

function updateUserRegion($region = '', $userid = ''){
    global $sqlDB;
    if($region != '' && $userid != ''){
        $query = "UPDATE users set region = '".$region."' where id = $userid";
        $result = $sqlDB->execute($query);
    }
}

?>
