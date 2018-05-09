 /* eslint-disable */

<template>
<div id="#app" >
	
<el-menu    style="padding:0 240px;position:relative;display:flex;justify-content:flex-end;" :default-active="activeIndex" class="el-menu-demo"  background-color="#ffffff"  text-color="#000" active-text-color="#d9363a" mode="horizontal" >
  <el-menu-item  index="5" class="hidden-sm-and-down" style="position:absolute;left:240px;"><img src="/static/images/logo.png" alt="" width="71px" height="71px"/></el-menu-item>
  <template v-if="!isvalid">
   <el-menu-item  index="6" @click="login"  class="hidden-sm-and-down"> <el-button type="primary" size="small">登录</el-button></el-menu-item>
   <el-menu-item index="7"   @click="register" class="hidden-sm-and-down"> <el-button type="primary" size="small" plain>注册</el-button></el-menu-item>
  </template>
  <el-submenu  v-else index="2">
    <template slot="title">{{tel}}</template>
    <el-menu-item index="2-1"  @click="logout">退出</el-menu-item>

  </el-submenu>
</el-menu>
<el-main class="container">
	<el-row :gutter="20">
	  <el-col :md="{span: 4}" >
	  <div class="flex-column flex-align-center" >
	     <img src="/static/images/avastar.png" alt="" />
	     <p style="font-size:12px;">
        <strong>积分：</strong>
        <span>{{integrate}}</span>
       </p>
	   
	       <el-button @click="recharge"  type="primary">点击充值</el-button>
	  </div>
	  
	 
    <el-menu default-active="1" class="el-menu-vertical-demo" style="margin-top:30px;"  @select="myselect" text-color="#000000" active-text-color="#d9363a">

   <router-link to="/tb">
      <el-menu-item index="1">
        <i class="el-icon-menu"></i>
        <span slot="title">淘宝任务</span>
      </el-menu-item>
    </router-link> 
   <router-link to="/jd">
      <el-menu-item index="2">
        <i class="el-icon-setting"></i>
        <router-link to="/jd" slot="title">京东任务</router-link>
      </el-menu-item>
   </router-link>
   <router-link to="/order">
      <el-menu-item index="4">
        <i class="el-icon-setting"></i>
        <router-link to="/order" slot="title">业务查询</router-link>
      </el-menu-item>
   </router-link>
    </el-menu>
      </el-col>
	  <el-col :md="{span: 20}" >


<router-view>
</router-view>


     </el-col>
	</el-row>
</el-main>

<el-dialog
  title="登录"
  :visible.sync="dialogVisible"
:close-on-click-modal ="false"
:close-on-press-escape="false"
  width="30%">
 <el-form ref="loginform"  :rules="loginrules" :model="loginform" label-width="80px">
  <el-form-item label="手机号" prop="tel">
    <el-input   v-model="loginform.tel"  ></el-input>
  </el-form-item>
    <el-form-item label="密码" prop="pwd">
    <el-input type="password" v-model="loginform.pwd" ></el-input>
  </el-form-item>
  <el-form-item>
    <el-button type="primary" :loading="loginloading"  @click="loginSubmit('loginform')">登录</el-button>
    <p>还没有账号？<span @click="register"  style="cursor:pointer;"  >立即注册</span> </p>
  </el-form-item>
</el-form>
</el-dialog>


<el-dialog
  title="充值"
:visible.sync="payVisible"
:close-on-click-modal ="false"
:close-on-press-escape="false"
  >
   <div style="display:flex;align-item:center;justify-content:center;">
     <img src="wxpay.jpg" height="550" width="400" style="margin-right:15px;">
     <img src="alipay.jpg" height="550" width="400">
   </div>
</el-dialog>


<el-dialog
  title="注册"
  :visible.sync="dialogVisible1"
  :close-on-click-modal ="false"
:close-on-press-escape="false"
  width="30%">
 <el-form ref="regform"  :rules="regrules"  :model="regform" label-width="80px">
  <el-form-item label="手机号" prop="tel">
    <el-input placeholder="请输入手机号" v-model="regform.tel" ></el-input>
  </el-form-item>

   <el-form-item label="验证码" prop="code">
   <el-input placeholder="请输入验证码" v-model="regform.code"   class="input-with-select">
    <el-button slot="append"  @click="sendcode"  :disabled="cansendcode" >{{codetext}}</el-button>
  </el-input>
  </el-form-item>
 
    <el-form-item label="密码" prop="pwd">
    <el-input type="password"  placeholder="请输入密码"  v-model="regform.pwd"></el-input>
  </el-form-item>

    <el-form-item label="确认密码" prop="pwd2">
    <el-input  type="password" placeholder="请输入密码"   v-model="regform.pwd2"></el-input>
  </el-form-item>
  <el-form-item>
    <el-button type="primary" @click="regSubmit('regform')">注册</el-button>
    <p>还没有账号？<span @click="login"  style="cursor:pointer;" >立即登录</span> </p>
  </el-form-item>
</el-form>
</el-dialog>
</div>
</template>

<script>
import HelloWorld from './components/HelloWorld.vue'
import Task from './components/Task.vue'
import Tb from './components/Tb.vue';
import Order from './components/Order.vue'
import Jd    from './components/Jd.vue'



export default {
  name: 'app',
  data:function(){
     var validatePass = (rule, value, callback) => {
        if (value === '') {
          callback(new Error('请输入密码'));
        } else {
          if (this.regform.pwd2 !== '') {
            this.$refs.regform.validateField('pwd2');
          }
          callback();
        }
      };
      var validatePass2 = (rule, value, callback) => {
        if (value === '') {
          callback(new Error('请再次输入密码'));
        } else if (value !== this.regform.pwd) {
          callback(new Error('两次输入密码不一致!'));
        } else {
          callback();
        }
      };


  return {
       isvalid:false,
       tel:"",
       integrate:"",
       loginloading:false,
       loginform:{
         tel:"",
         pwd:""

       },
         regform:{
         tel:"",
         pwd:"",
         code:"",
         pwd2:""

       },
        loginrules:{
          tel:[
            { required: true, message: '请输入有效的手机号', trigger:'change' },
          ],
           pwd:[
            { required: true, message: '请输入密码', trigger:'change' },
          ],
        },
        regrules:{
         tel:[
            { required: true, len:11, message: '请输入有效的手机号',  trigger:'change'},
          ],
            code:[
            { required: true,  message: '请输入验证码',  trigger:'change'},
          ],
            pwd:[
            { required: true,  message: '请输入密码',  trigger:'change'},
            { validator: validatePass,  trigger: 'blur' }
          ],
           pwd2:[
            { required: true,  message: '请再次输入密码',  trigger:'change'},
            { validator: validatePass2,  trigger: 'blur' }
          ],
        },

         activeIndex: '1',
         currentView:Tb,
         cansendcode:false,
         codetext:"发送验证码",
         time:60,
         dialogVisible: false,
         dialogVisible1: false,
         payVisible:false
  }
  },

  components: {
    HelloWorld,
    Order,
    Tb,
    Task
  },
  watch:{
     isvalid:function(newid){
       if(newid){
        this.$http.get("/customer/index/getintegrate").then(response => {
        var res = response.body;
     if(res.status==1){
         this.tel = res.tel; 
          this.integrate =  res.integrate;  
        }else{
          this.$message({message:res,type:"error"});
        }
       
           //this.sendtime();
         }).catch(() => {         
        });
       }else{
          this.tel = ""; 
          this.intefrate = "";        
    
       }
     }

  },
 created:function(){
    this.$http.get("/customer/index/usercheck").then(response => {
        var res = response.body;
        if(res.status!=1){
          return ;
        }else{ 
          this.isvalid = true;
        }
           //this.sendtime();
         }).catch(() => {         
        });
 },
  methods:{
    login(){
      this.dialogVisible1= false
      this.dialogVisible= true

    },
    register(){
      this.dialogVisible= false
      this.dialogVisible1= true
    },
    logout(){
        this.$http.get("/customer/index/logout").then(response => {
        var res = response.body;
        if(res!=1){
          return ;
        }else{ 
          this.isvalid = false;
        }
           //this.sendtime();
         }).catch(() => {         
        });
    },
    recharge:function(){
      this.payVisible = true;
    },
    loginSubmit(formName){

      this.$refs[formName].validate((valid) => {
          if (valid) {
       this.loginloading=true;
        this.$http.post("/customer/login/logincheck", this.loginform).then(response => {
        var res = response.body;
       this.loginloading=false;
        if(res!=1){
           this.$message({message:res,type:"error"});
        }else{
           this.$message({message:"登录成功！",type:"success"});
           this.dialogVisible= false;
           this.isvalid= true;
        }
           //this.sendtime();
         }).catch(() => {         
        });


          } else {
           
            return false;
          }
        });
    },
    regSubmit(formName){
      this.$refs[formName].validate((valid) => {
          if (valid) {
           
        //注册用户
        this.$http.post("/customer/register/userRegister", this.regform).then(response => {
        var res = response.body;
        if(res!=1){
           this.$message({message:res,type:"error"});
        }else{
           this.$message({message:"注册成功！",type:"success"});
           this.login();
        }
           //this.sendtime();
         }).catch(() => {         
        });


          } else {
           
            return false;
          }
        });
    },
    sendcode(){
      if(this.regform.tel==""){
        this.$message({message:"手机号不能为空",type:"error"});
        return;
      }
       this.$http.post("/customer/register/sendsns", {tel:this.regform.tel}).then(response => {
        var res = response.body;
        if(res!=1){
           this.$message({message:res,type:"error"});
        }else{
           this.$message({message:"验证码已经发送成功，请及时查看手机",type:"success"});
           this.sendtime();
        }
           //this.sendtime();
         }).catch(() => {         
        });
    },
    sendtime(){
    
    if (this.time == 0) { 
        this.cansendcode=false
        this.codetext="发送验证码" 
        this.time = 60; 
        return;
    } else { 
        this.cansendcode=true
        this.codetext=this.time
        this.time--; 
    } 
  setTimeout(()=>{ 
    this.sendtime() }
    ,1000) 
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
a { text-decoration: none;color:black;} 



</style>
