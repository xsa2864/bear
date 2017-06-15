<?php defined('KING_PATH') or die('访问被拒绝.');
class Siteconfig_Controller extends Template_Controller
{
   // 首页
   public function config(){
      $result = M("web_config")->where("id=1")->execute();
      $data['list'] = $result[0];
      $this->template = new View('admin/siteconfig/config_view',$data);
      $this->template->render();
   }

   // 保存配置
   public function configSave(){
      $id = P("id",'');
      $re_msg['success'] = 0;
      $re_msg['msg'] = '保存失败';
      $url = P("logo",'');
      $data['name'] = P("name",'');
      $data['logo'] = empty($url)?'':common_ext::getsimpicurl($url);
      $data['discript'] = P("discript",'');
      $data['icp'] = P("icp",'');
      $data['copyright'] = P("copyright",'');
      $rs = 0;
      if(empty($id)){
         $rs = M("web_config")->insert($data);
      }else{
         $rs = M("web_config")->update($data,"id=$id");
      }
      if($rs){
         $re_msg['success'] = 1;
         $re_msg['msg'] = '保存成功';
      }
      echo json_encode($re_msg);
   }
   
   // 权限列表
   public function power(){
     $this->template->content = new View('admin/siteconfig/power_view');
     $this->template->render();
   }
   // 获取权限列表内容
   public function getPower()
   {
      $page = P("page",1);
      $pagesize = P("pagesize",20);
      $snum = ($page-1)*$pagesize;
      //广告位列表     
      $sql = "select * from tf_group order by addtime desc limit ".$snum.",".$pagesize."";
      $result = M()->query($sql);
      // $result = M('advert_position')->where(array('status'=>1))->orderby('addtime desc')->limit($snum,$pagesize)->execute();
      foreach($result as $value)
      {
          $value->addtime = date("Y-m-d H:i:s",$value->addtime);
      }
      
      $data['Rows'] = $result;
      $data['Total'] = M("group")->getAllCount();
      echo json_encode($data);
   }
   // 保存权限组
   public function savePower(){
      $id = P("id",'');
      $data = array();
      $data['groupName'] = P("groupName");
      $data['other'] = P("other");
      $rs = 0;
      if(empty($id)){
         $data['addtime'] = time();
         $rs = M("group")->insert($data);
      }else{
         $rs = M("group")->update($data,"id=$id");
      }
      echo $rs;
   }
   // 设置权限
   public function setPower(){
      $id = G("id",'');
      $data['list'] = M("group")->getOneData(array('id'=>$id));
      $this->template->content = new View('admin/siteconfig/setpower_view',$data);
      $this->template->render();
   }
   // 保存权限组
   public function saveGroup(){
      $id = P("id");
      $re_msg['success'] = 0;
      $re_msg['msg'] = '保存失败';
      $data['modPower'] = P("group");
      $rs = 0;
      if(!empty($id)){
         $rs = M("group")->update($data,"id='$id'");
         if($rs){
            $re_msg['success'] = 1;
            $re_msg['msg'] = '保存成功';
         }
      }
      echo json_encode($re_msg);
   }
   // 删除权限
   public function delPower(){
      $id = P("id",'');
      $rs = 0;
      if(!empty($id)){
         $rs = M("group")->delete("id=$id");
      }
      echo $rs;
   }

   // 修改密码页面
   public function password(){
      $this->template->content = new View('admin/siteconfig/password_view');
      $this->template->render();
   }
   // 更新密码
   public function savePwd(){
      $old_pwd = P("old_pwd",'');
      $new_pwd = P("new_pwd",'');
      $again_pwd = P("again_pwd",'');
      $re_msg['success'] = 0;
      $re_msg['msg'] = '';
      if(empty($old_pwd) || empty($new_pwd) || empty($again_pwd)){
         $re_msg['msg'] = '输入的密码不能为空';
      }else{
         if(strlen($new_pwd) < 6){
            $re_msg['msg'] = '密码长度要大等于6';
         }else if($new_pwd == $again_pwd){
            $old_password = md5($GLOBALS['config']['md5Key'].$old_pwd);
            $aid = M("account")->getFieldData("id","password='$old_password' and username='{$_SESSION['userName']}'");
            if($aid>0){
               $data['passwd'] = md5($GLOBALS['config']['md5Key'].$new_pwd);
               $rs  = M("account")->update($data,array('id'=>$id));
               if($rs){
                  $re_msg['success'] = 1;
                  $re_msg['msg'] = '密码更新成功';
               }
            }else{
               $re_msg['msg'] = '没有此账户';
            }
         }else{
            $re_msg['msg'] = '两次输入的密码不一致';
         }
      }
      echo json_encode($re_msg);
   }

}