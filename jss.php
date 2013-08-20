<?
require 'jsmin.php';

define(DIR_CACHE, './cache/'); //cache files dir
define(DIR_JS, './jss/');//jss files dir

header("Content-Type: text/javascript; charset=UTF-8");

$params=trim($_GET['jss']);//get js file list
$list=explode(',',$params);
foreach ($list as $key => &$value) {
	if (!trim($value)) {
		unset($list[$key]);
	}else{
		$value=eregi_replace('\.+/', '', $value);
	}
}

$product=md5(json_encode($list)).'.js';//create product file name for cache

$path=DIR_CACHE.$product;
if (file_exists($path)) {//if exist product cache
	$contents=file_get_contents($path);
	echo $contents;
}else{
	$contents='';
	foreach ($list as $file) {
		$path=DIR_CACHE.md5($file).'.js';
		if (file_exists($path)) {//if exist file cache
			$contents.=file_get_contents($path);
		}else{
			$path=DIR_JS.$file;
			if(file_exists($path)){
				$temp=JSMin::minify(file_get_contents($path));
				write2cache($temp,$file);
				$contents.=$temp;
			}
		}
	}
	if ($contents) {
		write2cache($contents,$product);
		echo $contents;
	}
}


function write2cache($contents,$name){
	$name=md5($name).'.js';
	$fh=fopen(DIR_CACHE.$name,"w");
	if ($fh) {
		fwrite($fh, trim($contents));
		fclose($fh);
		return true;
	}
	return false;
}