<?php
namespace app\customer\validate;

use think\Validate;
class  Order  extends   Validate{
    
    
    protected $rule = [
        'link|商品链接'=>'require',
        'date|开始时间'=>'require',
        'keywords|关键词搜索'=>'require|array',
        'viewtime|浏览时间'=>'require', 
        'mydeep|商品浏览深度'=>'require',
        'radio4|任务类型'=>'require',
        'checked|是否查看商品评价' =>'require|boolean',
        'totalint|总消耗积分'=> 'require|num',
        'totaltime|总浏览时间'=>'require|num'
    ];
    
    
}