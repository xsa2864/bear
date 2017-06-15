<?php defined('KING_PATH') or die('访问被拒绝.');
class Advert_Controller extends Template_Controller
{
   // 广告位列表
   public function adList(){
     $this->template->content = new View('admin/advert/adlist_view');
     $this->template->render();
   }
   // 获取广告位列表内容
   public function getAdlist()
   {
      $page = P("page",1);
      $pagesize = P("pagesize",10);
      $snum = ($page-1)*$pagesize;
      //广告位列表     
      $sql = "select * from tf_advert_position where status=1 order by addtime desc limit ".$snum.",".$pagesize."";
      $result = M()->query($sql);
      // $result = M('advert_position')->where(array('status'=>1))->orderby('addtime desc')->limit($snum,$pagesize)->execute();
      foreach($result as $value)
      {
          $value->addtime = date("Y-m-d H:i:s",$value->addtime);
      }
      
      $data['Rows'] = $result;
      $data['Total'] = M("advert_position")->getAllCount(array('status'=>1));
      echo json_encode($data);
   }
   // 保存广告位
   public function saveAdvert(){
      $id = P("id",'');
      $data = array();
      $data['name'] = P("name");
      $data['adtype'] = P("adtype");
      $data['width'] = P("width");
      $data['height'] = P("height");
      $rs = 0;
      if(empty($id)){
         $data['addtime'] = time();
         $rs = M("advert_position")->insert($data);
      }else{
         $rs = M("advert_position")->update($data,"id=$id");
      }
      echo $rs;
   }
   // 删除广告位
   public function delAdvert(){
      $id = P("id",'');
      $data = array();
      $data['status'] = -1;
      $rs = 0;
      if(!empty($id)){
         $rs = M("advert_position")->update($data,"id=$id");
      }
      echo $rs;
   }
   // 广告位详情
   public function advertDetail(){
      $id = G("id",1);      
      
      $result = M('advert_detail d')->select("d.*,p.name as pname")->join('advert_position p',"d.pid=p.id")->where(array('d.pid'=>$id,'d.status'=>1))->execute();    //当前广告位信息
      foreach ($result as $key => $value) {
         if(!empty($value->pics)){
            $value->pics = json_decode($value->pics);
         }
      }

      $data['list'] = $result[0];
      $this->template->content = new View('admin/advert/advertDetail_view',$data);
      $this->template->render();
   }
   public function adSave(){
      $id = P("id",'');
      $re_msg['success'] = 0;
      $re_msg['msg'] = '保存失败';
      if($id>0){
         $data['name'] = P("name",'');
         $imgUrl = P('imgUrl');
         $text = P('text');
         $url = P('url');
         foreach ($imgUrl as $key => $value) {
            $pic = array();
            $pic['imgUrl'] = common_ext::getsimpicurl($value);
            $pic['text'] = $text[$key];
            $pic['url'] = $url[$key];
            $datas[] = $pic;
         }
         $data['pics'] = json_encode($datas);
         $rs = M("advert_detail")->update($data,"id=$id");
         if($rs){
            $re_msg['success'] = 1;
            $re_msg['msg'] = '保存成功';
         }
      }
      echo json_encode($re_msg);

   }
   // 上传文件
   public function upload(){   
      $re_msg['success'] = 0;
      $re_msg['msg'] = '';
      $upload = upload::getClass();
      if(isset($_FILES['file']['name'])){
         $fileName = time().'.'.file_ext::getExt($_FILES['file']['name']);
         $url = $upload->save(1,'file',$fileName,'upload/'.date("Ymd",time()));
         if($url == false){
            $re_msg['msg'] = $upload->getError();
         }else{            
            $re_msg['success'] = 1;
            $re_msg['msg'] = input::site($url);
         }
      }
      echo json_encode($re_msg);
   }
}