<?php
namespace app\admin\controller;

use think\Controller;
class Question extends  Controller{

public function index($page="",$limit=""){
    
       if ($this->request->isAjax()) {
           $result = Db::name("param")->page($page, $limit)->select();
           
           return json([
               'code' => 0,
               'msg' => "",
               "count" => $count,
               "data" => $result
           ]);
       }
     return $this->fetch();
}

}
 