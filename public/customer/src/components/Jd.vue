  
<template>
	<el-main>

  <el-tabs  v-model="activeName"  @tab-click="tabchange">
    <el-tab-pane label="流量任务" name="flow">
     <Flow  ref="flow"    ></Flow>
    </el-tab-pane>
    <el-tab-pane label="收藏任务" name="second"> <Favorite ref="favorite"  v-on:addviewtime="addviewtime"  v-on:adddeeptime="adddeeptime"   v-on:changetype="changetype"  v-on:changeint="changeint"   ></Favorite></el-tab-pane>
    <el-tab-pane label="加购任务" name="third">
      <Cart ref="cart"  v-on:addviewtime="addviewtime"  v-on:adddeeptime="adddeeptime"   v-on:changetype="changetype"  v-on:changeint="changeint"   ></Cart>

    </el-tab-pane>
    <el-tab-pane label="店铺关注" name="fourth">
      
       <Live ref="live"  v-on:addviewtime="addviewtime"  v-on:adddeeptime="adddeeptime"   v-on:changetype="changetype"  v-on:changeint="changeint"   ></Live>
    </el-tab-pane>
  </el-tabs>
 
	

<el-dialog
  title="提示"
  :visible.sync="dialogVisible"
  width="30%">
  <span>{{dialogMsg}}</span>
  <span slot="footer" class="dialog-footer">
    <el-button type="primary" @click="dialogVisible = false">确 定</el-button>
  </span>
</el-dialog>

</el-main>
</template>
<script type="text/javascript">
import Flow from './jd/Flow.vue'
import Favorite from './jd/Favorite.vue'
import Cart from './jd/Cart.vue'
import Live from './jd/Live.vue'
export default {

  data:function(){
	return {
	   activeName:'flow',
     viewtime:30,
     deeptime:0,
     tasktype:"app",
     totaltask:100,
     dialogVisible:false,
     dialogMsg:"发生错误了，请重试"
	}
  },
   components: {
    Flow,
    Favorite,
    Cart,
    Live
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
    totalint:function(){
       return  this.totaltask*this.perint;
    }
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
     },
     showInfo:function(msg){
       this.dialogVisible = true;
       this.dialogMsg = msg

    },
     submit:function(){

    this.$confirm('一键发布任务，是否继续？', '提示', {
          confirmButtonText: '确定',
          cancelButtonText: '取消',
          type: 'warning'
        }).then(() => {


      var res =  this.$refs.flow.submit()

      if(!res){
        return;
      }
      res['totaltime'] =  this.totaltime;
      res['totalint']  =  this.totalint;
      const loading = this.$loading({    //放 loading
          text: 'Loading',
          spinner: 'el-icon-loading',
          background: 'rgba(0, 0, 0, 0.7)'
        });

        this.$http.post("/customer/index/addorder", res).then(response => {
          var res = response.body;
          loading.close();
          if(res.status==1){
              this.$alert("本次共发布"+res.total+"个任务，成功"+res.success+"个，失败"+res.error+"个。详情请看业务查询板块", '提示', {
          confirmButtonText: '确定',
          callback: action => {
            this.$router.push({ path: '/order' })
          }
         });
        }else{
          this.$message({message:res,type:"error"})
        }
      
         }, response => {
          // error callback
         });
        

        }).catch(() => { 
         loading.close();        
        });

  
   
     }


     }

  

};

</script>

<style type="text/css">
	
.cf:before,.cf:after { content:""; display:table; } .cf:after { clear:both; }

.num{
	font-size:18px;
	color: #d9363a;
	font-weight: bold;
}
</style>
