  
<template>
<el-form class="cf" ref="form" :model="form" label-width="100px">
  <el-form-item label="任务类型">
      <el-radio-group v-model="radio4" size="medium"  @change="changetype">
      <el-radio-button label="app" >APP流量</el-radio-button>
      <el-radio-button label="pc">PC流量</el-radio-button>
      <el-radio-button label="view">直访流量</el-radio-button>
    </el-radio-group>
  <el-form-item label="显示高级设置" style="float:right;">
    <el-switch v-model="form.delivery"></el-switch>
  </el-form-item>

  </el-form-item>
  <el-form-item label="任务日期">
     <el-date-picker
      v-model.lazy="date"
      :editable="false"
      :clearable="false"
      @change="datechange"
      type="daterange"
      :picker-options="pickerOpt"
      range-separator="至"
      start-placeholder="开始日期"
      end-placeholder="结束日期">
    </el-date-picker>

 <p>任务时长：<span class="num">{{day}}</span>天&nbsp;&nbsp;每天发布：<span class="num">{{totalnum}}</span>个任务量&nbsp;&nbsp;此次合计发布：<span class="num">{{totaltask}}</span>个任务</p>
  </el-form-item>

  <el-form-item label="任务名称">
    <el-input v-model="form.name" placeholder="输入任务名称" ></el-input>
  </el-form-item>
    <el-form-item label="链接">
    <el-input v-model="form.name" placeholder="输入商品链接（或淘口令）" ></el-input>
  </el-form-item>




  <template v-if="radio4!='view'"   >
  <Task     ref="task"  v-for="(k,index) in keywordlist"  :keywordlistLength="keywordlist.length" v-on:myinc="inc" v-on:mynum="mynum"  v-on:mydec="dec"  :key="k"  :mykey="index"></Task>
  </template>
<template v-else>
<el-form-item label="每日任务数量">
    <el-input-number v-model="viewnum"  :min="1"  label="描述文字"></el-input-number>
</el-form-item>
</template>


<template v-if="form.delivery">
  

 <el-form-item label="浏览时间">
    <el-input-number v-model="viewtime"   @change="myviewtime"  :min="30"  :step="10" label="描述文字"></el-input-number>
    <el-checkbox style="margin-left:15px;" v-model="checked">查看宝贝评价</el-checkbox>
</el-form-item>

  
 <el-form-item label="商品浏览深度" class='cf'>
   <el-select v-model="mydeep" placeholder="请选择"  >
    <el-option
      v-for="item in deep"
      :key="item.value"
      :label="item.label"
      :value="item.value">
    </el-option>
  </el-select>
  <span style="float:right;">秒</span>
 <el-input-number  style="float:right;" v-model="deeptime"  @change="mydeeptime"  :min="30" :step="10" label="描述文字"></el-input-number>

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
           radio4: 'app',   //任务类型
           totalnum:100,      //每天任务量
           date:[Date.now(),Date.now()],         //日期
           day:1,           //天数
           checked:false,   //是否查看宝贝评价
           viewnum:100,     //任务类型为直访时
           keywordlist:[0], //关键词列表
           deeptime:30,     //商品深度的浏览时间
           viewtime:30,     //商品的浏览时间
           mydeep:"0",      //商品浏览深度
           deep:[
            {
              label:"不浏览其它商品", 
              value:"0",
            },
                        {
              label:"随机浏览0~1个商品（30秒不收费）",
              value:"1",
            },
                        {
              label:"随机浏览0~2个商品（约24积分）",
              value:"2",
            },
                        {
              label:"随机浏览0~3个商品（约36积分）",
              value:"3",
            },
                        {
              label:"固定浏览1个商品（30秒不收费）",
              value:"4",
            },
                        {
              label:"固定浏览2个商品（约48积分）",
              value:"5",
            },
            {
              label:"固定浏览3个商品（约72积分）",
              value:"6",
            },
           ],
           pickerOpt:{
            disabledDate:function(date){
              var  today = new Date();
              today.setHours(0);
              today.setMinutes(0);
              today.setSeconds(0);
              today.setMilliseconds(0);
               if(date.getTime()-today.getTime()>(24*3600*1000*31)||date.getTime()-today.getTime()< 0){
                return true;
               }else{
                return false;
               }
            }
           }
      }
    },
    props:[],
    components:{
     Task
    },
    computed:{
      totaltask:function(){    //总任务量
        return this.day*this.totalnum
      },

    },
    watch:{
     mydeep:function(d){
      if(d!=0){
          this.$emit("adddeeptime",this.deeptime)
      }else{
         this.$emit("adddeeptime",0)
      }
     },
     totaltask:function(){
         this.$emit("addviewtime",time)
     }
    },

    methods: {
    
      onSubmit() {
     

      },
      mynum(num){
         this.totalnum +=num;

      },
      myviewtime(time){
        this.$emit("addviewtime",time)
      },
      mydeeptime(time){
        if(this.mydeep!="0"){
          this.$emit("adddeeptime",time)
        }
        
      },
      changetype(type){
          this.$emit("changetype",type)
        
      },
      datechange(date){     //选择日期后触发计算天数  date:array (min,max)
        var  dateSpan = Date.parse(date[1]) - Date.parse(date[0]);
       // var  dateSpan = Math.abs(dateSpan);
        var  iDays = Math.floor(dateSpan / (24 * 3600 * 1000));
        this.day = iDays+1      //当天也算一天
      },
      dec:function(index){ //减少关键词
        this.keywordlist.splice(index,1)
      },
      inc:function(){  //增加关键词
       this.keywordlist.push(this.keywordlist.length)
      },
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
