<?php defined('KING_PATH') or die('访问被拒绝.');
class Menu_Controller extends Controller
{   
   // 获取列表
   public function getMenu(){
      $result = M('mod m')->select("m.id,m.bid,m.modName,m.url,m.app,m.orderNum")->where('m.visible=1')->orderby('m.bid asc,m.orderNum asc')->execute();
      $array = common_ext::toArray($result);
      $arrTree = $this->getTree($array);
      echo json_encode($arrTree);
     
   }
   // array 递归
   public function getTree($array,$pid=0){      
      foreach ($array as $key => $value) {         
         if($value['bid'] == $pid && ($pid == 0 || empty($value['url']))){
            $data['text']       = $value['modName'];
            $data['isexpand']   = 'false';
            $data['children']   = $this->getTree($array,$value['id']);
            $arr[] = $data;
            unset($data);
         }else if($value['bid'] == $pid){            
            $data['url']        = input::site($value['app'].'/'.$value['url']);                    
            $data['text']       = $value['modName'];
            $data['children']   = $this->getTree($array,$value['id']);
            $arr[] = $data;
            unset($data);
         }
      }
      return $arr;
   }

   // 获取权限组相应数据列表
   public function getPower(){
      $id = P("id");
      $checked = M("group")->getFieldData("modPower","id='$id'");
      $array = explode(',', trim($checked,','));
      $result = M('mod m')->select("m.id,m.bid,m.modName")->join("mod d","d.bid=m.id")->where('(d.visible=1 and d.bid!=0) or m.visible=1')->groupby("m.id")->orderby('m.bid asc,m.orderNum asc')->execute();
      foreach ($result as $key => $value) {
         if(in_array($value->id, $array)){
            $value->ischecked = true;
         }
      }
      echo json_encode($result);     
   }
  
   // object 递归
   public function getObjTree($obj,$pid=0){ 
      $arr = array();
      foreach ($obj as $key => $value) {    
         if($value->bid == $pid && ($pid == 0 || empty($value->url))){
            $arr->text       = $value->modName;
            $arr->isexpand   = 'false';
            $arr->children   = $this->getObjTree($obj,$value->id);
         }else if($value->bid == $pid){
            $arr->url   = $value->app.'/'.$value->url;
            $arr->text  = $value->modName;
            $arr->children   = $this->getObjTree($obj,$value->id);
         }
      }
      return $arr;
   }
}