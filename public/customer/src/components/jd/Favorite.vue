  
<template>
<el-form class="cf" ref="form" :model="form" label-width="100px">
  <el-form-item label="任务类型">
      <el-radio-group v-model="radio4" size="medium"  @change="changetype">
      <el-radio-button label="search" >搜索收藏</el-radio-button>
      <el-radio-button label="jdproduct">直接收藏</el-radio-button>
    </el-radio-group>
  <el-form-item label="显示高级设置" style="float:right;">
    <el-switch  v-model="form.delivery"></el-switch>
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
    <el-input v-model="taskname" placeholder="输入任务名称(可不填)" ></el-input>
  </el-form-item>
  <el-form-item label="链接" >
    <el-input  v-if="radio4!='shop'" v-model="link" placeholder="输入商品链接（或淘口令)" ></el-input>
    <el-input  v-else   v-model="link" placeholder="输入店铺链接" ></el-input>
  </el-form-item>




<template v-if="radio4=='search'"   >
  <Task     ref="task"  v-for="(k,index) in keywordlist"  :keywordlistLength="keywordlist.length" v-on:myinc="inc" v-on:mynum="mynum"  v-on:mydec="dec"  :key="k"  :mykey="index"></Task>
  </template>
<template v-else>
<el-form-item label="每日任务数量">
    <el-input-number v-model="totalnum"  :min="1"  label="描述文字"></el-input-number>
</el-form-item>
</template>


<div v-show="form.delivery">
  
 <div v-show="radio4=='search'">
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
 </div>

<LiveTask  v-show="radio4!='search'"  ref="livetask" :num="totalnum"   v-on:updatenum="updatenum"  v-on:myinc="inc" v-on:mynum="mynum"  v-on:mydec="dec"></LiveTask>





  
</div>



<el-dialog
  title="提示"
  :visible.sync="dialogVisible"
  width="30%">
  <span>{{dialogMsg}}</span>
  <span slot="footer" class="dialog-footer">
    <el-button type="primary" @click="dialogVisible = false">确 定</el-button>
  </span>
</el-dialog>


<el-card class="box-card cf" style="margin-top:30px;">
    <p>任务耗时：<span class="num">{{totaltime}}</span>秒&nbsp;&nbsp;单次消费：<span class="num">{{perint}}</span>积分&nbsp;&nbsp;合计消费：<span class="num">{{totalint}}</span>积分</p>
    <el-button  @click="submit" style="float:right;" type="danger">发布任务</el-button>
  </el-card>

</el-form>





</template>

<script type="text/javascript">
import Task from '../Task.vue'
import LiveTask from '../LiveTask.vue'
export default {
    data() {
      return {
           form:{
            delivery:false
           },
           taskname:"",     //任务名称，可不填
           link:"",         //商品链接 必填
           radio4: 'search',   //任务类型
           totalnum:100,    //每天任务量
           date:[Date.now(),Date.now()],         //日期
           day:1,           //天数
           checked:false,   //是否查看宝贝评价
           viewnum:100,     //任务类型为直访时
           keywordlist:[0], //关键词列表
           deeptime:30,     //商品深度的浏览时间
           viewtime:30,     //商品的浏览时间
           truedeeptime:0,   //真正要加上去的时间
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
           },
           dialogVisible:false,
           dialogMsg:"发生错误了，请重试"
      }
    },
    props:[],
    components:{
     Task,
     LiveTask
    },
    computed:{
      totaltask:function(){    //总任务量
        return this.day*this.totalnum
      },
      totaltime:function(){
        switch(this.radio4){
          
       case "search":
           return this.viewtime+this.truedeeptime;
       case "jdproduct" :
          return 30; 
       }
     
    },
     perint:function(){
       switch(this.radio4){
          
       case "search":
         if(this.totaltime>100){
             return 10+Math.round((this.totaltime-100)/50)+75;
       }else{
            return 85;
       }
         
       case "jdproduct" :
          return 75; 
       }
    },
    totalint:function(){
       return  this.totaltask*this.perint;
    }
 
    },
    watch:{
     mydeep:function(d){
      if(d!=0){
    
         this.truedeeptime = this.trandeeptime()
      }else{
         this.truedeeptime = 0
      }
     },
     totalnum:function(nv,ov){
       this.totalnum = nv
     }
    },

    methods: {
      genkeywordlist(){
       var tasks = this.$refs.task;
       var len = tasks.length;
       var keywords = []
         for(var i=0;i<len;i++){
          if(tasks[i].keyword==""){
          this.showInfo("请输入搜索的关键字")
          return false;
          }
          keywords.push({
            keyword:tasks[i].keyword,
            num:tasks[i].num,
            period:tasks[i].period
          })
        }
        return keywords;
      },



      subdata() {
      
    
        if(this.link==""){
          this.showInfo("请输入商品链接")
          return false;
        }
        var keywords = [];
        switch(this.radio4){
          case "search":
            keywords  = this.genkeywordlist();
            if(!keywords){
              return false;
            }
            break;
          case "jdproduct":
            keywords = false;
            this.myviewtime = 30;
            this.mydeep = 0;
            break;
        }    

        var mydate = new Date(this.date[0]);
        return {
         link:this.link,
         date: (mydate.getTime())/1000,
         keywords:keywords?keywords:this.$refs.livetask.period,
         deeptime:this.deeptime,     
         viewtime:this.viewtime,     
         mydeep:this.mydeep,
         radio4:this.radio4,
         checked:this.checked,
         taskname:this.taskname
        }
      },
      submit:function(){

    this.$confirm('一键发布任务，是否继续？', '提示', {
          confirmButtonText: '确定',
          cancelButtonText: '取消',
          type: 'warning'
        }).then(() => {


      var res =  this.subdata()

      if(!res){
        return;
      }
      res['surl']      = "https://www.jd.com/";  //入口
      res['totalnum'] = this.totalnum;  //每天任务量
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

  
   
     },
      mynum(num){
         this.totalnum += num;

      },
      updatenum(num){
        this.totalnum = num;
      },
    //  myviewtime(time){
    //    this.$emit("addviewtime",time)
    //  },
      mydeeptime(time){
        if(this.mydeep!="0"){
        this.truedeeptime = this.trandeeptime()
        }
     },
      changetype(type){
        if(type=="search"){

          this.rnum()
        }
       //  this.$emit("changetype",type)
        
      },
      datechange(date){     //选择日期后触发计算天数  date:array (min,max)
      console.log(date)
        var  dateSpan = date[1] - date[0];
       // var  dateSpan = Math.abs(dateSpan);
        var  iDays = Math.floor(dateSpan / (24 * 3600 * 1000));
        this.day = iDays+1      //当天也算一天
      },
      dec:function(index){ //减少关键词
        this.keywordlist.splice(index,1)
      },
      inc:function(){  //增加关键词

       this.keywordlist.push(this.keywordlist.length)
       return true;
      },
      trandeeptime:function(){  //计算商品深度真正时间  具体请看data的deep数组

          switch(this.mydeep){
            case "1":
                 return Math.ceil((1/2)*this.deeptime);
            case "2":
                 return Math.ceil((2/2)*this.deeptime);
            case "3":
                 return Math.ceil((3/2)*this.deeptime);       
            case "4":
                 return Math.ceil(1*this.deeptime); 
            case "5":
                 return Math.ceil(2*this.deeptime); 
            case "6":
                 return Math.ceil(3*this.deeptime);                                                
          }

      },
    showInfo:function(msg){
       this.dialogVisible = true;
       this.dialogMsg = msg

    },

    
    rnum:function(){   //重新统计各关键词的数量
      var list =  this.$refs.task
  
      var num =0;
      var len = list.length

      for(var i=0;i<len;i++){
        num += list[i].num
      }
  
      this.totalnum = num 
    }
      
    }
  };

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
