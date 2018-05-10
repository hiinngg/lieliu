<template>

  <el-form-item label="任务时段">
    <el-radio-group v-model="periodShow" size="medium">
      <el-radio :label="false">自动当天完成</el-radio>
      <el-radio :label="true">手动指定时段</el-radio>
    </el-radio-group>



    <div  v-if="periodShow"   class="cf" style="width:100%;padding:15px 80px;box-sizing:border-box;line-height:2;">
    <el-row>

       <el-col :md="{span: 2}" :xs="{span:4}" v-for="n in 24" :key="n">
           <div class="item">
             <div class="header">{{n-1}}:00</div>
             <div>{{percent[n-1]}}%</div>
             <el-input v-model.number.lazy="period[n-1]" type="number"  min=0 class="noborder" size="small" @change="myperiod($event,n)"  ></el-input>
           </div>
       </el-col>

    </el-row>
   <el-radio-group v-model="periodType" size="small" style="float:right;"    >
      <el-radio-button label="today">当天完成</el-radio-button>
      <el-radio-button label="curve">模拟流量</el-radio-button>
      <el-radio-button label="self">自定义</el-radio-button>
  </el-radio-group>




<el-dialog
  title="提示"
  :visible.sync="dialogVisible"
  width="30%">
  <span>{{dialogMsg}}</span>
  <span slot="footer" class="dialog-footer">
    <el-button type="primary" @click="dialogVisible = false">确 定</el-button>
  </span>
</el-dialog>
    </div>
  
  </el-form-item>






   
  
</template>

<script>
export default {
  data(){
      return {
        keyword:"",
        periodType:"today",
        periodShow:false,
        period:this.setTaskCount(100,"today"),
        percent:[],
        weight:false,
        dialogVisible:false,
        dialogMsg:"发生错误了，请重试"
      }
   
  },
props:['keywordlistLength','mykey','num'],
created:function(){
  this.percentChange()
},
computed:{

},
watch:{
  num:function(newnum,oldnum){
  if(!newnum||newnum==""||newnum==0){
  //防止用户不正当输入
  return this.$emit('updatenum',1);
 }
/*    this.period  = this.setTaskCount(newnum,this.periodType,this.weight)
    this.percentChange()
    this.$emit('mynum',newnum-oldnum)*/

 this.period  = this.setTaskCount(newnum,this.periodType,this.weight)
 this.percentChange()

  },
  periodType:function(p){
    if(p&&p!==""){
     this.period =  this.setTaskCount(this.num,p)
     this.percentChange()
    }
    
  },
  periodShow:function(newp){
    console.log(newp)
    if(newp===false){
       this.periodType =  "today"
       this.period  = this.setTaskCount(this.num,  this.periodType)
       this.percentChange()
    }
  }
},
methods:{
   myperiod:function(e,n){    //用户输入时间段时触发
     if(e==""||e=='0'||e==0){  
       //防止用户不正当输入
         this.period[n-1]=0
     }
    
    var len = this.period.length;
    var num = 0;
      for(var i=0;i<len;i++){
          num += this.period[i]

      }
     this.periodType = ''
     this.weight = this.percentChange();
     this.$emit('updatenum',num)
   

   },


   percentChange:function(){ //计算各时间段所占百分比
     var num  = this.num
      this.percent = this.period.map(function(v){
         return  Math.ceil(parseFloat(v/num) * 1000) / 10
     })

     return this.percent;

   },
    taskdec:function(index){ //减少关键词
       this.$emit('mynum',(0-this.num))
       this.$emit('mydec',index)
     },
    taskinc:function(){  //增加关键词

  if(this.keywordlistLength==10){
        this.showInfo("最多只能设置10个关键词")
        return false;
    }
         this.$emit('mynum',100)
         this.$emit('myinc')
       
      
      },
     showInfo:function(msg){
       this.dialogVisible = true;
       this.dialogMsg = msg

    }


}
}
</script>
<style>
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
}
input[type="number"]{
  -moz-appearance: textfield;
}
</style>
