<?php
class menu_ext
{
    /**
	* 拼接数组
	*
	* @param $id $name 变量
	* @return array
	*/
	public static function toArray($menuID,$id,$name){
	    if(!empty($menuID)&& !empty($id) && !empty($name)){
	    	$parr['id'] 	= $id;
        	$parr['name'] 	= $name;
        	$datas[] = $parr;
        	$result = M("index_menu")->getOneData("id='$menuID'");
        	$flag = true;
           	if(empty($result->child_menu)){           		
           		$data['child_menu'] = json_encode($datas);           	  	
           	}else{
           		$oldarr = json_decode($result->child_menu,1);
           		foreach ($oldarr as $key => $value) {
           			if(in_array($id, $value)){
           				$flag = false;
           			}
           		}
           		$new_arr = array_merge($oldarr,$datas);

           		$data['child_menu'] = json_encode($new_arr);
           	}           
           	if($flag){
           		$rs = M("index_menu")->update($data,"id='$menuID'");
           	}
	    }
	}

}