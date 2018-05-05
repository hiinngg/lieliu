<?php
namespace app\customer\controller;

use think\Controller;
use GuzzleHttp\Pool;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
/* class  用户模块入口
 * ljq
 *  */

class Order extends  Controller{

    //查看任务
    public function  orderlist(){
        if($this->request->isAjax()){
            $post = $this->request->post();
            $base_uri = 'http://api.lieliu.com:1024/ll/task_list';
                $param = [
                    'username'         =>U_NAME,
                    'format'           =>'json',
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
            $success=0;
            $error=0;

            $client = new Client();
            $requests = function ($total)  use($params) {

                for ($i = 0; $i < $total; $i++) {
                    yield new Request('GET',$params[$i]);
                }
            };

            $pool = new Pool($client, $requests(count($params)), [
                'concurrency' =>5,
                'fulfilled' => function ($response, $index)  use(&$success,&$error){
                    $res = json_decode($response->getBody()->getContents(),true);
                    if($res['data']['status']==1){
                        //发布成功
                        return  $success+=1;
                    }else{
                        var_dump($res);
                        return   $error+=1;

                    }

                },
                'rejected' => function ($reason, $index)  use(&$error){
                    $error+=1;
                },
            ]);
            $promise = $pool->promise();
            $promise->wait();
            return [
                'total' =>count($params),
                'success'=>$success,
                'error'  =>$error
            ];

        }
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
}