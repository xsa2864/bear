<?php defined('KING_PATH') or die('访问被拒绝.');
class Index_Controller extends Template_Controller
{
   // 首页
   public function index(){
     $this->template = new View('admin/index/index_view');
     $this->template->render();
   }
   // 欢迎页面
   public function welcome(){
      $this->template = new View('admin/index/welcome_view');
      $this->template->render();
   }
   // 网站菜单栏
   public function menu(){
      $this->template = new View('admin/index/menu_view');
      $this->template->render();
   }
}