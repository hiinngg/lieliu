<?php
namespace app\customer\controller;

use think\Controller;
use GuzzleHttp\Pool;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use think\Session;
use think\Db;

/* class  用户模块入口
 * ljq
 *  */

class Order extends  Controller{
    //查看任务
    public function  orderlist(){
        if($this->request->isAjax()){


         if(!Session::has("userid")){
            return "您还没有登录，请先登录";
            die();
         }else{
            $userid = Session::get("userid");
         }

         //获取客人已发布的任务
           $tasks =  $this->checkout($userid);
           if(empty($tasks)){
            return [
                    'status'=>1,
                    'data'=>[]
                ];
           }

             $taskids = array_map(function($v){
                return $v['third_task_id'];
             },$tasks);

             $id = implode(",", $taskids);
            $post = $this->request->post();
            $base_uri = 'http://api.lieliu.com:1024/ll/task_list';
                $param = [
                    'username'         =>U_NAME,
                    'format'           =>'json',
                    'id'               =>$id,
                    'begin_time'       =>date("Y-m-d"),
                    'timestamp'        =>strtotime(date("Y-m-d H:i:s")),
                    'ver'              =>4

                ];
                ksort($param);
                $str = $base_uri."?";
                foreach( $param as $j=>$k){
                    $str.=$j."=".urlencode($k)."&";
                }
                $str.="signkey=". $this->signkey('/ll/task_list',$param);

            //请求第三方接口
            $client = new Client();
            $request = new Request('GET', $str);
            $response = $client->send($request);
            $res = json_decode($response->getBody()->getContents(),true);
            
            

            if($res['data']['status']==1){
                return [
                    'status'=>1,
                    'data'=>$res['data']['list']['l']
                ];
            }else{
                var_dump($res);
                return '获取失败';
            }
        }
    }

    /*
    获取客人已发布的任务
    */
     public function checkout($userid){
        return Db::name("task")->where("userid",$userid)->select();
     }


    /*
 * 签名
 * */
    public function  signkey($url,$arr){

        ksort($arr);
        $param="";
        foreach($arr as $k=>$v){
            $param.=$k."=".$v."&";
        }
        return md5(urlencode( $url."?".$param.KEY)) ;
    }

    public function  ads(){
        
    }
}