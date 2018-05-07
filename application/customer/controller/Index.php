<?php
namespace app\customer\controller;

use think\Controller;
use think\Session;
use think\Db;
use GuzzleHttp\Pool;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
/* class  用户模块入口
 * ljq
 *  */

class Index extends  Controller{



    protected $tran = ['app'=>0,'pc'=>1,'view'=>3];


    public function _initialize(){

    }


    public function index(){

      return $this->fetch(VUE_MOUDLE);    
        
    }
/*
获取积分

*/
    public function getintegrate(){
        if(!Session::has("userid")){
            return "您还没有登录，请先登录";
            die();
         }else{
            $userid = Session::get("userid");
         }
         $info = Db::name("user")->where("userid",$userid)->find();
         return [
          'status'=>1,
          'tel'   =>$info['tel'],
          'integrate'=>$info['integrate']
         ];

    }

    //检测登录态
    public function usercheck(){
      if(Session::has('userid')){
        $tel = Db::name("user")->where("userid",Session::get("userid"))->value("tel");
        return ['status'=>1,'tel'=>$tel];
      }else{
        return ['status'=>0];
      }
    }


    //用户退出登录
    public function logout(){
        Session::delete("userid");
        return 1;
    }
    
    //发布任务
    public function  addorder(){

       if($this->request->isAjax()){
         if(!Session::has("userid")){
            return "您还没有登录，请先登录";
            die();
         }else{
            $userid = Session::get("userid");
         }

         $post = $this->request->post();
         //查看客人够不够积分进行发布
         if(!$this->isenough($userid,$post['totalint'])){
            return "您的积分不足以发布任务，请联系系统管理员进行充值。";
         }
        

    	
            $base_uri = 'http://api.lieliu.com:1024/ll/task_add';
            $params = [];
            $orderids = [];
            foreach( $post['keywords'] as $k=>$v){
                $param = [];
                $param = [
                    'username'         =>U_NAME,
                    'id'               =>orderid(),
                    'count'            =>$v['num'],
                    'hour'             =>implode(",",$v['period']),
                    'begin_time'       =>date("Y-m-d",$post['date']),
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
                array_push($orderids,$param['id']);
                array_push($params,$str);
            }
    		//请求第三方接口
            $success=0;
            $error=0;
            $insert=[];  //记录要录入数据库的任务
            $client = new Client();
            $requests = function ($total)  use($params) {

                for ($i = 0; $i < $total; $i++) {
                    yield new Request('GET',$params[$i]);
                }
            };

            $pool = new Pool($client, $requests(count($params)), [
                'concurrency' =>5,
                'fulfilled' => function ($response, $index)  use(&$success,&$error,$orderids,&$insert,$userid){
                  $res = json_decode($response->getBody()->getContents(),true);
                  if($res['data']['status']==1){
                      //发布成功
                    array_push($insert,[
                        'third_task_id'=>$orderids[$index],
                        'createtime'=>date("Y-m-d H:i:s"),
                        'status'=>1,
                        'userid'=>$userid
                    ]);
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



            //扣除相应积分
             
            //将其记录进数据库


          if(Db::name("task")->insertAll($insert)&&Db::name("user")->where("userid",$userid)->setDec("integrate",$post['totalint'])){
               return [
             'total' =>count($params),
             'success'=>$success,
             'error'  =>$error,
             'status' =>1
            ];
          }else{
               return "发布失败";
          }
         
    		
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
    判断积分是否足够
    
    */
    public function isenough($userid,$need){
      $integrate  = Db::name("user")->where("userid",$userid)->value("integrate");
      if($integrate >= $need){
        return true;
      }else{
        return false;
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