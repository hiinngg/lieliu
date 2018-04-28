  
<template>
	<el-main>

  <el-tabs  v-model="activeName" @tab-click="handleClick">
    <el-tab-pane label="流量任务" name="first">
     <Flow></Flow>
    </el-tab-pane>
    <el-tab-pane label="收藏任务" name="second">收藏任务</el-tab-pane>
    <el-tab-pane label="加购任务" name="third">加购任务</el-tab-pane>
    <el-tab-pane label="淘宝直播" name="fourth">淘宝直播</el-tab-pane>
  </el-tabs>
 
	<el-card class="box-card cf" style="margin-top:30px;">
	  <p>任务耗时：<span class="num">30</span>秒&nbsp;&nbsp;单次消费：<span class="num">56</span>积分&nbsp;&nbsp;合计消费：<span class="num">5,600</span>积分</p>
	  <el-button style="float:right;" type="danger">发布任务</el-button>
	</el-card>
</el-main>
</template>
<script type="text/javascript">
import Flow from './tb/Flow.vue'
export default {

  data:function(){
	return {
	   activeName:'first'
	}
  },
   components: {
    Flow
  }
}

</script>

<style type="text/css">
	
.cf:before,.cf:after { content:""; display:table; } .cf:after { clear:both; }

.num{
	font-size:18px;
	color: #d9363a;
	font-weight: bold;
}
</style>
