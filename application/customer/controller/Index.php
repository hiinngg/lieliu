<?php
namespace app\customer\controller;

use think\Controller;
use GuzzleHttp\Pool;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
/* class  用户模块入口
 * ljq
 *  */

class Index extends  Controller{


    protected $tran = ['app'=>0,'pc'=>1,'view'=>3];

    public function index(){

      return $this->fetch(VUE_MOUDLE);    
        
    }
    
    //发布任务
    public function  addorder(){
    	if($this->request->isAjax()){
    		$post = $this->request->post();
            $base_uri = 'http://api.lieliu.com:1024/ll/task_add';
            $params = [];
            foreach( $post['keywords'] as $k=>$v){
                $param = [];
                $param = [
                    'username'         =>U_NAME,
                    'id'               =>orderid(),
                    'count'            =>$v['num'],
                    'hour'             =>implode(",",$v['period']),
                    'begin_time'       =>date("Y-m-d"),
                    'type'             =>$this->tran[$post['radio4']],
                    'target'           =>$post['link'],
                    'keyword'          =>$v['keyword'],
                    'sUrl'             =>'https://www.taobao.com',
                    'goodsBrowsingTime'=>$post['viewtime'],
                    'format'           =>'json',
                    'timestamp'        =>strtotime(date("Y-m-d H:i:s")),
                    'ver'              =>4

                ];
                $param  =  $this->adddeeptime($param,$post);
                ksort($param);
                $str = $base_uri."?";
                foreach( $param as $j=>$k){
                    $str.=$j."=".urlencode($k)."&";
                }
                $str.="signkey=". $this->signkey('/ll/task_add',$param);
                array_push($params,$str);
            }
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
     * 处理deeptime
     * */

    public  function  adddeeptime($arr,$post){
        $deep = (int)$post['mydeep'];
        if($deep =="0"){
             return $arr;
        }
        if($deep <= 3){
            $arr['ri'] = $deep;
            $arr['shopVisitTime'] = $post['deeptime'];
        }else if($deep > 3){
            $arr['shopVisitCount'] = $deep;
            $arr['shopVisitTime'] = $post['deeptime'];
        }
        return $arr;
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