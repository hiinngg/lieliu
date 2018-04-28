<?php
namespace app\admin\controller;
use \think\Db;
/**
 *
 * @author Administrator
 *         后台首页
 */
class Index extends Common
{

    public function index()
    {
     
        return $this->fetch();
    }

 
}