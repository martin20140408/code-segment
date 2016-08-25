<?php
$folder = scandir("views");
$newFolders = [];
//var_dump($_POST);
if(isset($_POST['search'])){
	foreach($folder as $v){
		if($v != '.' && $v != '..'){
			$content = file_get_contents(realpath(__DIR__).'/views/'.$v);
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

return array_unique($newFolders);