 /* eslint-disable */
<template>
<div id="#app" >
	
<el-menu    style="padding:0 240px;position:relative;display:flex;justify-content:flex-end;" :default-active="activeIndex" class="el-menu-demo"  background-color="#262930"  text-color="#ffffff" active-text-color="#d9363a" mode="horizontal" >
  <el-menu-item  index="5" class="hidden-sm-and-down" style="position:absolute;left:240px;"><img src="logo.png" alt="" /></el-menu-item>
  <el-menu-item index="1">处理中心</el-menu-item>
  <el-submenu index="2">
    <template slot="title">我的工作台</template>
    <el-menu-item index="2-1">选项1</el-menu-item>
    <el-menu-item index="2-2">选项2</el-menu-item>
    <el-menu-item index="2-3">选项3</el-menu-item>
    <el-submenu index="2-4">
      <template slot="title">选项4</template>
      <el-menu-item index="2-4-1">选项1</el-menu-item>
      <el-menu-item index="2-4-2">选项2</el-menu-item>
      <el-menu-item index="2-4-3">选项3</el-menu-item>
    </el-submenu>
  </el-submenu>
  <el-menu-item index="3" disabled>消息中心</el-menu-item>
  <el-menu-item index="4"><a href="https://www.ele.me" target="_blank">订单管理</a></el-menu-item>
</el-menu>
<el-main class="container">
	<el-row :gutter="20">
	  <el-col :md="{span: 4}" >
	  <div class="flex-column flex-align-center" >
	     <img src="avastar.png" alt="" />
	     <div>
	      <small>充值积分</small>
	      <small>赠送积分</small>
	      </div>
	   
	       <el-button type="primary">点击充值</el-button>
	  </div>
	  
	 
    <el-menu default-active="1" class="el-menu-vertical-demo" style="margin-top:30px;"  @select="myselect" text-color="#000000" active-text-color="#d9363a">

      <el-menu-item index="1">
        <i class="el-icon-menu"></i>
        <span slot="title">淘宝任务</span>
      </el-menu-item>
  
      <el-menu-item index="2">
        <i class="el-icon-setting"></i>
        <span slot="title">京东任务</span>
      </el-menu-item>
      <el-menu-item index="3">
        <i class="el-icon-setting"></i>
        <span slot="title">任务模板</span>
      </el-menu-item>
      <el-menu-item index="4">
        <i class="el-icon-setting"></i>
        <span slot="title">业务查询</span>
      </el-menu-item>
    </el-menu>
      </el-col>
	  <el-col :md="{span: 20}" >


<component v-bind:is="currentView">
  <!-- 组件在 vm.currentview 变化时改变！ -->
</component>


     </el-col>
	</el-row>
</el-main>
</div>
</template>

<script>
import HelloWorld from './components/HelloWorld.vue'
import Task from './components/Task.vue'
import Tb from './components/Tb.vue';
import Order from './components/Order.vue'



export default {
  name: 'app',
  data:function(){
  return {
         activeIndex: '1',
         currentView:Tb
  }
  },
  components: {
    HelloWorld,
    Order,
    Tb,
    Task
  },
  methods:{
   myselect:function(e){
    switch(e){
    case "1":
      this.currentView=Tb;
      break;
    case "4":
      this.currentView=Order;
      break;
    
    }
     

   
    }

  }
}
</script>

<style>


.container {
  padding-right: 15px;
  padding-left: 15px;
  margin-right: auto;
  margin-left: auto;
}
@media (min-width: 768px) {
  .container {
    width: 750px;
  }
}
@media (min-width: 992px) {
  .container {
    width: 970px;
  }
}
@media (min-width: 1200px) {
  .container {
    width: 1170px;
  }
}
#app {
  font-family: 'Avenir', Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}


.flex-column{
	display:flex;
	flex-direction:column;
}

.flex-align-center{

	align-items:center;
}


</style>
