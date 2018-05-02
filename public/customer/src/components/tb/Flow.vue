  
<template>
<el-form class="cf" ref="form" :model="form" label-width="100px">
  <el-form-item label="任务类型">
      <el-radio-group v-model="radio4" size="medium">
      <el-radio-button label="app" >APP流量</el-radio-button>
      <el-radio-button label="pc">PC流量</el-radio-button>
      <el-radio-button label="view">直访流量</el-radio-button>
    </el-radio-group>
  <el-form-item label="显示高级设置" style="float:right;">
    <el-switch v-model="form.delivery"></el-switch>
  </el-form-item>

  </el-form-item>
  <el-form-item label="任务日期">

    <el-col :span="16">
    <el-col :span="7">
      <el-date-picker type="date" placeholder="选择日期" v-model="form.date1" style="width: 100%;"></el-date-picker>
    </el-col>
    <el-col class="line" :span="2"  style="text-align:center;" ><span>-</span></el-col>
    <el-col :span="7">
      <el-date-picker type="date" placeholder="选择日期" v-model="form.date2" style="width: 100%;"></el-date-picker>
    </el-col>
  </el-col>
 <el-col :span="8">
 <el-select v-model="value" placeholder="请选择">
    <el-option
      v-for="item in options"
      :key="item.value"
      :label="item.label"
      :value="item.value">

    </el-option>
  </el-select>
 </el-col>
 <p>任务耗时：<span class="num">30</span>秒&nbsp;&nbsp;单次消费：<span class="num">56</span>积分&nbsp;&nbsp;合计消费：<span class="num">5,600</span>积分</p>
  </el-form-item>
  <el-form-item label="任务名称">
    <el-input v-model="form.name" placeholder="输入任务名称" ></el-input>
  </el-form-item>
    <el-form-item label="链接">
    <el-input v-model="form.name" placeholder="输入商品链接（或淘口令）" ></el-input>
  </el-form-item>

  <template v-for="k in keywordlist">
  <Task :keywordlist="keywordlist"  v-on:myinc="inc"  :key="k"></Task>
  </template>


  
<template >
<el-form-item label="每日任务数量">
    <el-input-number v-model="viewnum" @change="handleChange" :min="1"  label="描述文字"></el-input-number>
</el-form-item>
  
</template>


<template v-if="form.delivery">
  

 <el-form-item label="浏览时间">
    <el-input-number v-model="num1" @change="handleChange" :min="1" :max="10" label="描述文字"></el-input-number>
    <el-checkbox style="margin-left:15px;" v-model="checked">查看宝贝评价</el-checkbox>
</el-form-item>

  
 <el-form-item label="商品浏览深度" class='cf'>
   <el-select v-model="value" placeholder="请选择" >
    <el-option
      v-for="item in options"
      :key="item.value"
      :label="item.label"
      :value="item.value">
    </el-option>
  </el-select>
  <span style="float:right;">秒</span>
 <el-input-number  style="float:right;" v-model="num1" @change="handleChange" :min="1" :max="10" label="描述文字"></el-input-number>

</el-form-item>
  
</template>

</el-form>

</template>

<script type="text/javascript">
import Task from '../Task.vue'
export default {
    data() {
      return {
        form: {
          name: '',
          region: '',
          date1: '',
          date2: '',
          delivery: false,
          type: [],
          resource: '',
          desc: '',
          time:false
        },
           radio4: 'app',
           radio5:'当天完成',
           num:1,
           checked:false,
           viewnum:100,
           keywordlist:1,
           options:[
            {
              label:"1天",
              value:"1",
            },
                        {
              label:"3天",
              value:"3",
            },
                        {
              label:"7天",
              value:"7",
            },
                        {
              label:"10天",
              value:"10",
            },
                        {
              label:"15天",
              value:"15",
            },
                        {
              label:"30天",
              value:"30",
            },
           ]
      }
    },
    components:{
     Task
    },
    methods: {
    
      onSubmit() {
        console.log('submit!');
      },
      handleChange(value) {
        console.log(value);
      },

     periodType:function(e,index){    //切换分配的方式
       if(e=="self"){
         //调用用户自定义的时间
       }else{
         this.keywordlist[index].period = this.setTaskCount( this.keywordlist[index].num,e);
       }  
     },
      dec:function(index){ //减少关键词
        this.keywordlist.splice(index,1)
      },
      inc:function(){  //增加关键词
      this.keywordlist +=1;
      }
    }
  }

</script>

<style type="text/css">
.item{

text-align: center;
border-right:1px solid #eee;
border-bottom:1px solid #eee;

}
.header{
  background: #8feade;
  color: #fff;
}
.noborder input{
  border:0;
  text-align: center;
  padding:0;
}
.cf:before,.cf:after { content:""; display:table; } .cf:after { clear:both; }


</style>
