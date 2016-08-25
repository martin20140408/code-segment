<?php
//暂时不使用缓存，凑合着用吧
$category = isset($_GET['r'])?$_GET['r']:'yii2.x';
$folder = scandir(VIEW_PATH);
$allFolder = [];
foreach($folder as $v){
	if($v != '.' && $v != '..'){
		$allFolder[] = $v;
	}		
}	
$newFolders = [];
//var_dump($_POST);
$folder = scandir(VIEW_PATH.$category);
if(isset($_POST['search'])){
	foreach($folder as $v){
		if($v != '.' && $v != '..'){
			$content = file_get_contents(realpath(VIEW_PATH.$category).'/'.$v);
			$keywords = explode(' ',$_POST['search']);
			foreach($keywords as $k=>$keyword){
				if(stripos($content,$keyword) !== false){
					$newFolders[] = $v;
				}
			}		
		}		
	}
}else{
	foreach($folder as $v){
		if($v != '.' && $v != '..'){
			$newFolders[] = $v;
		}		
	}	
}

return ['folders'=>$allFolder,'files'=>array_unique($newFolders),'category'=>$category];