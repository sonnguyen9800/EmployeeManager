<?php
// Important Functions
function error_500(){
    header($_SERVER["SERVER_PROTOCOL"] . " 500 Internal Error");
    exit();
}

function error_404(){
    header($_SERVER["SERVER_PROTOCOL"] . " 404");
    exit();
    
}



function u($string="") {
  return urlencode($string);
}


function raw_u($string="") {
  return rawurlencode($string);
}

function h($string="") {
  return htmlspecialchars($string);
}

function url_for($script_path){
    if($script_path[0] != '/'){
        $script_path = "/" . $script_path;
    }
    return ROOT . $script_path;
}

function redirect($location_path){
    header("Location: ".$location_path);
    exit();
}

function redirect_after_post($location_path, $mess){
    header("Location: ".$location_path ."?status=".$mess);
    exit();
}

function is_post_request(){
    return $_SERVER['REQUEST_METHOD'] == 'POST';
    
}

function is_get_request(){
    return $_SERVER['REQUEST_METHOD'] == 'GET';
    
}

?>
