<?php
namespace app\customer\controller;
/*
登录
*/

use think\Controller;
use think\Session;
use think\Db;

class Login extends Controller{


	public function logincheck(){
        $post = $this->request->post();
        $result = $this->validate([
            'telphone' => $post['tel'],
            'pwd'      => $post['pwd']
        ], [
            'telphone|手机号码' => "require|length:11",
            'pwd|密码'      => "require"
        ]);
        if (true !== $result) {
            return $result;
        }
        if($userid = Db::name("user")->where([
             'tel'=>$post['tel'],
             'userpass'=>md5($post['pwd'])
        ])->value("userid")){

        	Session::set("userid",$userid);
        	return 1;
        }else{
        	return "用户名或密码错误";
        }


	}
}