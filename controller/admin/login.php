<?php defined('KING_PATH') or die('访问被拒绝.');
class Login_Controller extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->mod = M('account');
    }

    public function index()
    {
        session_start();
        if (isset($_SESSION['uid'])){
            echo "<script type=\"text/javascript\" chartset=\"utf-8\">location.href= '".input::site('admin/index')."';</script>";
        }
        else
        {
            $capt         = captcha::getClass();
            $data['capt'] = $capt;
            $view = new View('admin/login_view', $data);
            $view->render();
        }
    }

    public function checkLogin()
    {
        $user = preg_replace('/[^\w]+/', '', P('user'));
        $pass = md5(P('pass')); //$GLOBALS['config']['md5Key'].
        $capt = captcha::getClass();
        if ($capt->valid(P('captcha')))
        {
            $userinfo = $this->mod->getOneData(array('username'=>$user,'password'=>$pass),'id,project,username,gid');

            if (!$userinfo)
            {
                echo json_encode(array('success'=>0, 'msg'=>'用户名密码错误！'));
                return;
            }
            else
            {
                $_SESSION['userName'] = $userinfo->username;
                $_SESSION['project']  = $userinfo->project;
                $_SESSION['uid']    = $userinfo->id;
                $_SESSION['gid']    = $userinfo->gid;
                $_SESSION['modPower'] = $this->mod->getFieldData('modPower',array('id'=>$userinfo->gid),'group');
                echo json_encode(array('success'=>1));
                return;
            }
        }
        else
        {
            echo json_encode(array('success'=>0, 'msg'=>'验证码错误！'));
            return;
        }
    }
    // 退出登录
    public function loginOut(){
        session_start();
        session_unset();
        session_destroy();
        input::redirect('admin/login');
    }
}