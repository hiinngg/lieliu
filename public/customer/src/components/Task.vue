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
     <el-checkbox v-model="k.periodShow">时段</el-checkbox>
    </el-col> 
    <el-col :md="{span:3}"  >
      <el-button  v-if="keywordlist.length>1" class="el-icon-minus" @click="dec(index)" size="mini"  type="danger" circle ></el-button>
     <el-button  class="el-icon-plus"  @click="inc" type="success" circle  size="mini" ></el-button>
     </el-col>


    </el-row>



    <div  v-if="k.periodShow"   class="cf" style="width:100%;padding:15px 80px;box-sizing:border-box;line-height:2;">
    <el-row>

       <el-col :md="{span: 2}" :xs="{span:4}" v-for="n in 24" :key="n">
           <div class="item">
             <div class="header">{{n-1}}:00</div>
             <div>0.0%</div>
             <el-input v-model="weight[n-1]" class="noborder" size="small"   ></el-input>
           </div>
       </el-col>

    </el-row>
   <el-radio-group v-model="periodType" size="small" style="float:right;"  @change="periodType($event,index)"  >
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
        weight:[]
      }
   
  },
computed:{
   period:{
         // getter
    get: function () {
      return  this.setTaskCount( this.num,this.periodType,this.weight)
    },
    // setter
    set: function (newValue) {
        
    }   
},
  },
watch:{
      weight:function (newWeight,oldWeight){
        var len = newWeight.length;
        var num;
        for( var i =0 ;i<len;i++){
            num += newWeight[i]
        }
        var num =  newWeight.map(function(v){
            


        })

      }
 }



}
</script>
<style>

</style>
