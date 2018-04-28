<?php
namespace app\admin\controller;

use think\Controller;
use think\Db;
use think\Session;


class Login extends Controller
{



    /**
     * 后台登陆界面
     */
    public function login()
    {


        $adminId = session('adminId');

        if (!empty($adminId)) {//已经登录
            return redirect(url("admin/Index/index"));
        }else{

            return $this->fetch();
        }


    }

    public function doLogin()
    {
            
            $post = $this->request->post();

            $adminInfo = Db::name('admin')->where(['adminuser' => $post["username"]])->find();

            if(!empty($adminInfo)){
                if($adminInfo["adminpass"]==md5($post['password'])){    //登录成功
                    session("adminId", $adminInfo["adminid"]);
                    session("adminUserName", $adminInfo["adminuser"]);
                    return 1;
                }else{  //登录失败
                    return "密码错误";
                }
            }else{
                return "用户名不正确";

            }
        
    }

    
    public function logout()
    {
        session(null);
        return redirect(url("admin/Login/login"));
    }
}