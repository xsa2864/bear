<?php
class common_ext
{
    /**
	* 对象 转 数组
	*
	* @param object $obj 对象
	* @return array
	*/
	public static function toArray($obj){
	   $obj = (array)$obj;
	   foreach ($obj as $k => $v) {
	       if (gettype($v) == 'resource') {
	           return;
	       }
	       if (gettype($v) == 'object' || gettype($v) == 'array') {
	           $obj[$k] = (array)self::toArray($v);
	       }
	   }
	
	   return $obj;
	}

	/**
	 * 数组 转 对象
	 *
	 * @param array $arr 数组
	 * @return object
	 */
	public static function array_to_object($arr) {
	    if (gettype($arr) != 'array') {
	        return;
	    }
	    foreach ($arr as $k => $v) {
	        if (gettype($v) == 'array' || getType($v) == 'object') {
	            $arr[$k] = (object)self::array_to_object($v);
	        }
	    }
	 
	    return (object)$arr;
	}
	//取图片相对路径（入库用）
    public static function getsimpicurl($url=''){
        if(!empty($url)){
            if(strstr($url,input::site())){
                $pic = str_replace(input::site(),'',$url);
            }else{
                $pic = $url;
            }
        }else{
            $pic = '';
        }
        return $pic;
    }
}