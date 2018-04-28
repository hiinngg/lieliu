<?php
namespace app\customer\controller;

use think\Controller;

/* class  用户模块入口
 * ljq
 *  */

class Index extends  Controller{
    
    public function index(){
        
    return $this->fetch(VUE_MOUDLE);    
        
    }
    
    
}