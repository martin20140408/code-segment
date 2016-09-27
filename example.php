<?php
define('BASEURL', dirname($_SERVER['SCRIPT_NAME']));
define('VIEW_PATH',dirname('.').'/example/');
$layout = file_get_contents(dirname('.').'/web/layout.html');
$sidebar = '';

$category = isset($_GET['r'])?$_GET['r']:'code_online';
$file = isset($_GET['f'])?$_GET['f']:'js.html';
$folder = scandir(VIEW_PATH);
foreach($folder as $v){
    if($v != '.' && $v != '..'){
        $class = ($category == $v) ?'class="active-top-link"':'';
        $sidebar .= '<li> <a '.$class.' href="'.BASEURL.'/example.php?r='.$v.'">'.str_replace('_', ' ', $v).' </a></li>';
    }       
}   
//var_dump($_POST);
$folder = scandir(VIEW_PATH.$category);
$subsidebar = '';

foreach($folder as $v){
    if($v != '.' && $v != '..'){
        $subsidebar .= '<li><a href="'.BASEURL.'/example.php?r='.$category.'&f='.$v.'" data-name="'.$v.'">'.$v.'</a></li>';
    }       
} 
$filepath = dirname('.').'/example/'.$category.'/'.$file;
$content = file_exists($filepath)?file_get_contents($filepath):'file not exists';
$pretystart = '<pre class="prettyprint lang-php">';
$pretyend = '</pre>';
$preg = preg_match_all('/`{3}([^`]+)`{2}/',$content, $matches);
if($preg){
     array_walk($matches[0], function($value,$key) use (&$content){
        $pad = str_pad('', 30,'-');
        $content = str_replace($value, $pad.'result'.$pad.str_replace('`', '', $value).$pad.'code'.$pad.htmlspecialchars($value), $content);
    });   
}
$html = str_replace(['{{baseurl}}','{{content}}','{{sidebar}}','{{subsidebar}}','```','``'], [BASEURL,$content,$sidebar,$subsidebar, $pretystart,$pretyend],$layout);
echo $html;
