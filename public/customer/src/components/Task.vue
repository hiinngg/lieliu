<template>
    <el-form-item label="搜素关键词" class="cf" >
  <el-row :gutter="10">
   <el-col :md="{span:11}"   >
    <el-input placeholder="请输入关键词"  v-model="keyword"></el-input>
   </el-col>
     <el-col  :md="{span:6}"    > 
     <el-input-number  v-model="num" @change="handleChange" :min="1" label="描述文字"></el-input-number>
     </el-col>
     <el-col  :md="{span:2}"   > 
     <el-checkbox v-model="periodShow">时段</el-checkbox>
    </el-col> 
    <el-col :md="{span:3}"  >
      <el-button  v-if="keywordlist.length>1" class="el-icon-minus" @click="taskdec(key)" size="mini"  type="danger" circle ></el-button>
     <el-button  class="el-icon-plus"  @click="taskinc" type="success" circle  size="mini" ></el-button>
     </el-col>


    </el-row>

    <div  v-if="periodShow"   class="cf" style="width:100%;padding:15px 80px;box-sizing:border-box;line-height:2;">
    <el-row>

       <el-col :md="{span: 2}" :xs="{span:4}" v-for="n in 24" :key="n">
           <div class="item">
             <div class="header">{{n-1}}:00</div>
             <div>{{percent[n-1]}}%</div>
             <el-input v-model.number.lazy="period[n-1]" type="number"  minlength=1 class="noborder" size="small" @change="myperiod($event,n)"  ></el-input>
           </div>
       </el-col>

    </el-row>
   <el-radio-group v-model="periodType" size="small" style="float:right;"  @change="periodType"  >
      <el-radio-button label="today">当天完成</el-radio-button>
      <el-radio-button label="curve">模拟流量</el-radio-button>
      <el-radio-button label="self">自定义</el-radio-button>
  </el-radio-group>
    </div>
  
  </el-form-item>
</template>

<script>
export default {
  data(){
      return {
        keyword:"",
        num : 100,
        periodType:"today",
        periodShow:false,
        period:this.setTaskCount(100,"today"),
        percent:[],
        weight:[]
      }
   
  },
props:['keywordlist','key'],
created:function(){
  this.percentChange()
},
watch:{
  num:function(newnum){
 
    this.period  = this.setTaskCount(newnum,"curve",this.weight)
    this.percentChange()
  },
  periodType:function(p){
    if(p!="self"){
     this.period =  this.setTaskCount(this.num,p)
     this.percentChange()
    }
    
  }
},
methods:{
   myperiod:function(e,n){    //用户输入时间段时触发
     console.log(typeof e)
    var len = this.period.length;
    var num = 0;
      for(var i=0;i<len;i++){
          num += this.period[i]

      }
     this.periodType = 'self'
     this.weight = this.percentChange();
     this.num = num
   

   },
   percentChange:function(){ //计算各时间段所占百分比
     var num  = this.num
      this.percent = this.period.map(function(v){
         return  Math.ceil(parseFloat(v/num) * 1000) / 10
     })
     return this.percent;

   },
    taskdec:function(index){ //减少关键词
      console.log(index)
      },
    taskinc:function(){  //增加关键词
    console.log("123")
       this.$emit('myinc')
      }


}
}
</script>
<style>

</style>
