  
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
<div v-for="(k,index) in keywordlist"   v-if="radio4!='view'"  :key="index" >
  <el-form-item label="搜素关键词" class="cf" >
  <el-row>
   <el-col :md="{span: 12}"  :xs="{span:24}" >
    <el-input placeholder="请输入关键词" style="width:50%;" v-model="k.keyword"></el-input>
   </el-col>
     <el-col :md="{span: 12}"  :xs="{span:24}" >
       <div >
     <span>数量&nbsp;&nbsp;</span>
     <el-input-number style="margin-right:15px;" v-model="k.num" @change="handleChange" :min="1" label="描述文字"></el-input-number>
     <el-form-item label="时段设置" style="display:inline-block;margin-right:10px;"   >
    <el-switch   v-model="k.periodShow"></el-switch>
    </el-form-item>
      <el-button  v-if="keywordlist.length>1" class="el-icon-minus" @click="dec(index)"  type="danger" circle ></el-button>
     <el-button  class="el-icon-plus"  @click="inc" type="success" circle ></el-button>
      </div>
   </el-col>

    </el-row>



    <div  v-if="k.periodShow"   class="cf" style="width:100%;padding:15px 80px;box-sizing:border-box;line-height:2;">
    <el-row>

       <el-col :md="{span: 2}" :xs="{span:4}" v-for="n in 24" :key="n">
           <div class="item">
             <div class="header">{{n-1}}:00</div>
             <div>0.0%</div>
             <el-input v-model="input " class="noborder" size="small"   ></el-input>
           </div>
       </el-col>

    </el-row>
   <el-radio-group v-model="radio5" size="small" style="float:right;">
      <el-radio-button label="当天完成"></el-radio-button>
      <el-radio-button label="模拟流量"></el-radio-button>
      <el-radio-button label="自定义"></el-radio-button>
  </el-radio-group>
    </div>
  
  </el-form-item>
</div>

<template v-else>
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
           keywordlist:[{
               keyword:"",
               num:100,
               period:[],
               periodShow:false
           }],
           options:[
            {
              label:"1天",
              value:"1",
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
    methods: {
      onSubmit() {
        console.log('submit!');
      },
      handleChange(value) {
        console.log(value);
      },
      dec:function(index){ //减少关键词
        this.keywordlist.splice(index,1)
      },
      inc:function(){  //增加关键词
         this.keywordlist.push({
               keyword:"",
               num:100,
               period:[],
               periodShow:false
           })
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
}
.cf:before,.cf:after { content:""; display:table; } .cf:after { clear:both; }


</style>
