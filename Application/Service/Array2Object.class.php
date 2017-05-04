<?php
namespace Service;
/**
* 
*/
class Array2Object {
	//得到对象
    public static function parse($e){ 
        if(gettype($e)!='array') return; 
        foreach($e as $k=>$v){ 
            if(gettype($v)=='array' || getType($v)=='object') 
                $e[$k]=self::parse($v); 
            } 
        return (object)$e; 
    } 
}