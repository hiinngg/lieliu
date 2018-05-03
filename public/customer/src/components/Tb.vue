  
<template>
	<el-main>

  <el-tabs  v-model="activeName" @tab-click="handleClick">
    <el-tab-pane label="流量任务" name="first">
     <Flow  v-on:addviewtime="addviewtime"  v-on:adddeeptime="adddeeptime"   v-on:changetype="changetype"  v-on:changeint="changeint"   ></Flow>
    </el-tab-pane>
    <el-tab-pane label="收藏任务" name="second">收藏任务</el-tab-pane>
    <el-tab-pane label="加购任务" name="third">加购任务</el-tab-pane>
    <el-tab-pane label="淘宝直播" name="fourth">淘宝直播</el-tab-pane>
  </el-tabs>
 
	<el-card class="box-card cf" style="margin-top:30px;">
	  <p>任务耗时：<span class="num">{{totaltime}}</span>秒&nbsp;&nbsp;单次消费：<span class="num">{{perint}}</span>积分&nbsp;&nbsp;合计消费：<span class="num">{{totalint}}</span>积分</p>
	  <el-button style="float:right;" type="danger">发布任务</el-button>
	</el-card>
</el-main>
</template>
<script type="text/javascript">
import Flow from './tb/Flow.vue'
export default {

  data:function(){
	return {
	   activeName:'first',
     viewtime:30,
     deeptime:0,
     tasktype:"app",
     totaltask:100
	}
  },
   components: {
    Flow
  },
  computed:{
    totaltime:function(){
      return this.viewtime+this.deeptime
    },
    perint:function(){
       switch(this.tasktype){
          
       case "app":
          return Math.round((this.totaltime/5)*2.5*0.3);
       case "pc" :
          return Math.round((this.totaltime/5)*2.5*0.7); 
       case "view" :
          return Math.round((this.totaltime/5)*2.5*0.7); 
       }
    },
/*    totalint:function(){
       return  this.totaltask*this.totalint;
    }*/
  },

  methods:{
     addviewtime:function(time){
        this.viewtime = time
     },
     adddeeptime:function(time){
        this.deeptime =  time
     },
     changetype:function(type){
        this.tasktype = type 
     },
     changeint:function(num){
        this.totaltask= num
     }

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
