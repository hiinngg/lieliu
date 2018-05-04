<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件
define("VUE_MOUDLE", "./customer/dist/index.html");
define("U_NAME","u_1668836");
define("KEY",'0080d94b1c127dc0f26bc898453f30b6');

function  orderid(){
    $time = date("YmdHis");

   return $time.createRandNum(6);

}
function createRandNum($length)
{

    $str = "";
    for ($i = 0; $i < $length; $i ++) {
        $str .=  mt_rand(0, 9);
    }
    return $str;
}
function gettime(){

    $res =  json_decode(httpGet("http://api.lieliu.com:1024/api/sys_now?format=json"),true);
    return $res['data']['time'];

}
function httpGet($url)
{

    $curl = curl_init();
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_TIMEOUT, 500);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($curl, CURLOPT_URL, $url);

    $res = curl_exec($curl);
    curl_close($curl);

    return $res;
}