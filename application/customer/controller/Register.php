<?php
namespace app\customer\controller;

use think\Controller;
use think\Session;
use think\Db;

/* class  用户注册
 * ljq
 *  */

class Register extends  Controller{

    public function sendsns(){     //发送短信
        $post = $this->request->post();
        $result = $this->validate([
            'telphone' => $post['tel'],
        ], [
            'telphone' => "require|length:11|unique:user,tel"
        ],['telphone.length'=>"请输入有效的手机号码",'tel.unique'=>"手机已经被注册"]);
        if (true !== $result) {
            return $result;
        }

        $num=createRandNum(6);
        /*       Session::init([
                  'expire'=>60
            ]); */
        Session::set("smscode",$num);
        // return $num;
        $text= '【三板斧】感谢您注册三板斧，您的验证码是'.$num;
        $str = "action=send&userid=884&account=".U_SNS."&password=".P_SNS."&mobile=".$post['tel']."&content=".$text."&sendTime=&extno=";
        $url="http://183.61.109.238:8888/sms.aspx";
        $res = httpGet($url."?".$str);
        $xobj = simplexml_load_string($res);
        if($xobj->returnstatus=="Success"){  //发送成功
           return 1;
        }else{
          return "系统错误，请稍后再试";
        }
        


        /*object(Result)#10 (5) { ["success"]=> bool(false) ["statusCode"]=> int(400) ["requestData"]=> array(3) { ["mobile"]=> string(11) "13620383256" ["text"]=> string(71) "【遇见offer】感谢您注册小猫招聘，您的验证码是671896" ["apikey"]=> string(32) "0acb7f520c75626028c39d88cb652084" } ["responseData"]=> array(4) { ["http_status_code"]=> int(400) ["code"]=> int(-3) ["msg"]=> string(14) "IP没有权限" ["detail"]=> string(96) "IP 113.117.224.141 未加入白名单,可在后台‘系统设置->IP白名单设置’里添加" } ["error"]=> NULL }  */


    }

    public function userRegister()
    {
        $post = $this->request->post();
        $result = $this->validate([
            'telphone' => $post['tel'],
            'signpwd' =>$post['pwd'],
            'signpwd2'=>$post['pwd2']
        ], [
            'telphone' => "length:11|unique:user,tel",
            'signpwd' => "require|confirm:signpwd2",
            'signpwd2' => "require|confirm:signpwd",
        ],[
            'telphone.length'=>"请输入有效的手机号码",
            'telphone.unique'=>"手机已经被注册",
            'signpwd.confirm'=>'密码两次输入不一致',
            'signpwd2.confirm'=>"密码两次输入不一致",
            'signpwd.require'=>'密码不能为空',
            'signpwd2.require'=>'密码不能为空'
        ]);
        if (true !== $result) {
            return $result;
        }



        //验证短信验证码
        if(!Session::has("smscode")){
            return '短信验证码错误';
        }


        if($post['code']!=Session::get("smscode")){
             return '短信验证码错误';
        }


        //验证成功
        $data = [
            'tel' => $post['tel'],
            'userpass'=>md5($post['pwd']),
            'status' => 1,
            'createtime' => date("Y-m-d H:i:s")
        ];
        if (Db::name("user")->insert($data) == 1) {
        /*    $userid=Db::name('user')->getLastInsID();
            Session::set("userid",$userid);*/
            return 1;
        }else{
            return "系统错误";
        }
    }




}