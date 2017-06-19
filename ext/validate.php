<?php
class validate_ext
{
   /**
	* 验证手机号
	*
	* @param $mobile
	* @return boole
	*/
	public static function valiMobile($mobile){
   	if (!is_numeric($mobile)) {
         return false;
      }
      return preg_match('/^1[\d]{10}$/', $mobile) ? true : false;
	}

}