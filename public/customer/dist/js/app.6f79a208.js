webpackJsonp([1],{0:function(t,e,a){t.exports=a("NHnr")},1:function(t,e){},"4gih":function(t,e){},"7xXH":function(t,e){},AN8w:function(t,e){},NHnr:function(t,e,a){"use strict";Object.defineProperty(e,"__esModule",{value:!0});var i=a("i8gr"),n=a("UM93"),s=a.n(n),l=(a("bTWF"),a("RzFn"),a("4gih"),a("8Koo"),function(t,e,a){a=a||[5,4,2,1,2,3,4,5,6,7,8,9,10,11,12,13,12,11,10,9,8,7,6,5];var i=function(t,e){var i=0;return a.forEach(function(a,n){n>=t&&n<=e&&(i+=a)}),i},n=[0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0],s=0,l=0,r=23;switch(e){case"clear":return n;case"today":var o=new Date,c=o.getHours();l=o.getMinutes()>40?c+1:c;break;case"day":l=8,r=18;break;case"curve":break}var u=t/i(l,r),d=[];n.forEach(function(e,i){if(i<24&&i>=l&&i<=r){var o=Math.floor(a[i]*u);s<t&&(o=o>t-s?t-s:o,n[i]=o,s+=o),d.push({index:i,value:a[i]})}else n[i]=0});var m=t-s;if(m>0){d.sort(function(t,e){return t.value>e.value?-1:1});var p=0;while(p<m)d[p]&&(n[d[p].index]+=1),p++}return n}),r={install:function(t){t.mixin({methods:{setTaskCount:l}})}},o=a("LyPZ"),c={name:"HelloWorld",props:{msg:String}},u=function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("div",{staticClass:"hello"},[a("h1",[t._v(t._s(t.msg))]),t._m(0),a("h3",[t._v("Installed CLI Plugins")]),t._m(1),a("h3",[t._v("Essential Links")]),t._m(2),a("h3",[t._v("Ecosystem")]),t._m(3)])},d=[function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("p",[t._v("\n    For guide and recipes on how to configure / customize this project,"),a("br"),t._v("\n    check out the\n    "),a("a",{attrs:{href:"https://github.com/vuejs/vue-cli/tree/dev/docs",target:"_blank"}},[t._v("vue-cli documentation")]),t._v(".\n  ")])},function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("ul",[a("li",[a("a",{attrs:{href:"https://github.com/vuejs/vue-cli/tree/dev/packages/%40vue/cli-plugin-babel",target:"_blank"}},[t._v("babel")])]),a("li",[a("a",{attrs:{href:"https://github.com/vuejs/vue-cli/tree/dev/packages/%40vue/cli-plugin-eslint",target:"_blank"}},[t._v("eslint")])])])},function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("ul",[a("li",[a("a",{attrs:{href:"https://vuejs.org",target:"_blank"}},[t._v("Core Docs")])]),a("li",[a("a",{attrs:{href:"https://forum.vuejs.org",target:"_blank"}},[t._v("Forum")])]),a("li",[a("a",{attrs:{href:"https://chat.vuejs.org",target:"_blank"}},[t._v("Community Chat")])]),a("li",[a("a",{attrs:{href:"https://twitter.com/vuejs",target:"_blank"}},[t._v("Twitter")])])])},function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("ul",[a("li",[a("a",{attrs:{href:"https://router.vuejs.org/en/essentials/getting-started.html",target:"_blank"}},[t._v("vue-router")])]),a("li",[a("a",{attrs:{href:"https://vuex.vuejs.org/en/intro.html",target:"_blank"}},[t._v("vuex")])]),a("li",[a("a",{attrs:{href:"https://github.com/vuejs/vue-devtools#vue-devtools",target:"_blank"}},[t._v("vue-devtools")])]),a("li",[a("a",{attrs:{href:"https://vue-loader.vuejs.org/en",target:"_blank"}},[t._v("vue-loader")])]),a("li",[a("a",{attrs:{href:"https://github.com/vuejs/awesome-vue",target:"_blank"}},[t._v("awesome-vue")])])])}],m=a("18Nq");function p(t){a("7xXH")}var h=!1,v=p,f="data-v-5e6fe888",b=null,g=Object(m["a"])(c,u,d,h,v,f,b),_=g.exports,k={data:function(){return{keyword:"",num:100,periodType:"today",periodShow:!1,period:this.setTaskCount(100,"today"),percent:[],weight:!1,dialogVisible:!1,dialogMsg:"发生错误了，请重试"}},props:["keywordlistLength","mykey"],created:function(){this.percentChange()},watch:{num:function(t,e){if(!t||""==t||0==t)return this.num=1;this.period=this.setTaskCount(t,this.periodType,this.weight),this.percentChange(),this.$emit("mynum",t-e)},periodType:function(t){t&&""!==t&&(this.period=this.setTaskCount(this.num,t),this.percentChange())}},methods:{myperiod:function(t,e){""!=t&&"0"!=t&&0!=t||(this.period[e-1]=0);for(var a=this.period.length,i=0,n=0;n<a;n++)i+=this.period[n];this.periodType="",this.weight=this.percentChange(),this.num=i},percentChange:function(){var t=this.num;return this.percent=this.period.map(function(e){return Math.ceil(1e3*parseFloat(e/t))/10}),this.percent},taskdec:function(t){this.$emit("mynum",0-this.num),this.$emit("mydec",t)},taskinc:function(){if(10==this.keywordlistLength)return this.showInfo("最多只能设置10个关键词"),!1;this.$emit("mynum",this.num),this.$emit("myinc")},showInfo:function(t){this.dialogVisible=!0,this.dialogMsg=t}}},y=function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("el-form-item",{staticClass:"cf",attrs:{label:"搜素关键词"}},[a("el-row",{attrs:{gutter:10}},[a("el-col",{attrs:{md:{span:11}}},[a("el-input",{attrs:{placeholder:"请输入关键词"},model:{value:t.keyword,callback:function(e){t.keyword=e},expression:"keyword"}})],1),a("el-col",{attrs:{md:{span:6}}},[a("el-input-number",{attrs:{min:1,label:"描述文字"},model:{value:t.num,callback:function(e){t.num=e},expression:"num"}})],1),a("el-col",{attrs:{md:{span:2}}},[a("el-checkbox",{model:{value:t.periodShow,callback:function(e){t.periodShow=e},expression:"periodShow"}},[t._v("时段")])],1),a("el-col",{attrs:{md:{span:3}}},[t.keywordlistLength>1?a("el-button",{staticClass:"el-icon-minus",attrs:{size:"mini",type:"danger",circle:""},on:{click:function(e){t.taskdec(t.mykey)}}}):t._e(),a("el-button",{staticClass:"el-icon-plus",attrs:{type:"success",circle:"",size:"mini"},on:{click:t.taskinc}})],1)],1),t.periodShow?a("div",{staticClass:"cf",staticStyle:{width:"100%",padding:"15px 80px","box-sizing":"border-box","line-height":"2"}},[a("el-row",t._l(24,function(e){return a("el-col",{key:e,attrs:{md:{span:2},xs:{span:4}}},[a("div",{staticClass:"item"},[a("div",{staticClass:"header"},[t._v(t._s(e-1)+":00")]),a("div",[t._v(t._s(t.percent[e-1])+"%")]),a("el-input",{staticClass:"noborder",attrs:{type:"number",min:"0",size:"small"},on:{change:function(a){t.myperiod(a,e)}},model:{value:t.period[e-1],callback:function(a){t.$set(t.period,e-1,t._n(a))},expression:"period[n-1]"}})],1)])})),a("el-radio-group",{staticStyle:{float:"right"},attrs:{size:"small"},model:{value:t.periodType,callback:function(e){t.periodType=e},expression:"periodType"}},[a("el-radio-button",{attrs:{label:"today"}},[t._v("当天完成")]),a("el-radio-button",{attrs:{label:"curve"}},[t._v("模拟流量")]),a("el-radio-button",{attrs:{label:"self"}},[t._v("自定义")])],1)],1):t._e(),a("el-dialog",{attrs:{title:"提示",visible:t.dialogVisible,width:"30%"},on:{"update:visible":function(e){t.dialogVisible=e}}},[a("span",[t._v(t._s(t.dialogMsg))]),a("span",{staticClass:"dialog-footer",attrs:{slot:"footer"},slot:"footer"},[a("el-button",{attrs:{type:"primary"},on:{click:function(e){t.dialogVisible=!1}}},[t._v("确 定")])],1)])],1)},w=[];function x(t){a("AN8w")}var C=!1,$=x,M=null,T=null,j=Object(m["a"])(k,y,w,C,$,M,T),S=j.exports,E={data:function(){return{form:{},taskname:"",link:"",radio4:"app",totalnum:100,date:[Date.now(),Date.now()],day:1,checked:!1,viewnum:100,keywordlist:[0],deeptime:30,viewtime:30,mydeep:"0",deep:[{label:"不浏览其它商品",value:"0"},{label:"随机浏览0~1个商品（30秒不收费）",value:"1"},{label:"随机浏览0~2个商品（约24积分）",value:"2"},{label:"随机浏览0~3个商品（约36积分）",value:"3"},{label:"固定浏览1个商品（30秒不收费）",value:"4"},{label:"固定浏览2个商品（约48积分）",value:"5"},{label:"固定浏览3个商品（约72积分）",value:"6"}],pickerOpt:{disabledDate:function(t){var e=new Date;return e.setHours(0),e.setMinutes(0),e.setSeconds(0),e.setMilliseconds(0),t.getTime()-e.getTime()>26784e5||t.getTime()-e.getTime()<0}},dialogVisible:!1,dialogMsg:"发生错误了，请重试"}},props:[],components:{Task:S},computed:{totaltask:function(){return this.day*this.totalnum}},watch:{mydeep:function(t){0!=t?this.$emit("adddeeptime",this.truedeeptime()):this.$emit("adddeeptime",0)},totaltask:function(t){this.$emit("changeint",t)},radio4:function(t,e){}},methods:{submit:function(){var t=this.$refs.task,e=t.length,a=[];if(""==this.link)return this.showInfo("请输入商品链接"),!1;for(var i=0;i<e;i++){if(""==t[i].keyword)return this.showInfo("请输入搜索的关键字"),!1;a.push({keyword:t[i].keyword,num:t[i].num,period:t[i].period})}return{link:this.link,date:this.date[0],keywords:a,deeptime:this.deeptime,viewtime:this.viewtime,mydeep:this.mydeep,radio4:this.radio4,checked:this.checked,taskname:this.taskname}},mynum:function(t){this.totalnum+=t},myviewtime:function(t){this.$emit("addviewtime",t)},mydeeptime:function(t){"0"!=this.mydeep&&this.$emit("adddeeptime",this.truedeeptime())},changetype:function(t){"view"!=t&&this.rnum(),this.$emit("changetype",t)},datechange:function(t){console.log(t);var e=t[1]-t[0],a=Math.floor(e/864e5);this.day=a+1},dec:function(t){this.keywordlist.splice(t,1)},inc:function(){return this.keywordlist.push(this.keywordlist.length),!0},truedeeptime:function(){switch(this.mydeep){case"1":return Math.ceil(.5*this.deeptime);case"2":return Math.ceil(1*this.deeptime);case"3":return Math.ceil(1.5*this.deeptime);case"4":return Math.ceil(1*this.deeptime);case"5":return Math.ceil(2*this.deeptime);case"6":return Math.ceil(3*this.deeptime)}},showInfo:function(t){this.dialogVisible=!0,this.dialogMsg=t},rnum:function(){for(var t=this.$refs.task,e=0,a=t.length,i=0;i<a;i++)e+=t[i].num;this.totalnum=e}}},V=function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("el-form",{ref:"form",staticClass:"cf",attrs:{model:t.form,"label-width":"100px"}},[a("el-form-item",{attrs:{label:"任务类型"}},[a("el-radio-group",{attrs:{size:"medium"},on:{change:t.changetype},model:{value:t.radio4,callback:function(e){t.radio4=e},expression:"radio4"}},[a("el-radio-button",{attrs:{label:"app"}},[t._v("APP流量")]),a("el-radio-button",{attrs:{label:"pc"}},[t._v("PC流量")]),a("el-radio-button",{attrs:{label:"view"}},[t._v("直访流量")])],1),a("el-form-item",{staticStyle:{float:"right"},attrs:{label:"显示高级设置"}},[a("el-switch",{model:{value:t.form.delivery,callback:function(e){t.$set(t.form,"delivery",e)},expression:"form.delivery"}})],1)],1),a("el-form-item",{attrs:{label:"任务日期"}},[a("el-date-picker",{attrs:{editable:!1,clearable:!1,type:"daterange","picker-options":t.pickerOpt,"range-separator":"至","start-placeholder":"开始日期","end-placeholder":"结束日期"},on:{change:t.datechange},model:{value:t.date,callback:function(e){t.date=e},expression:"date"}}),a("p",[t._v("任务时长："),a("span",{staticClass:"num"},[t._v(t._s(t.day))]),t._v("天  每天发布："),a("span",{staticClass:"num"},[t._v(t._s(t.totalnum))]),t._v("个任务量  此次合计发布："),a("span",{staticClass:"num"},[t._v(t._s(t.totaltask))]),t._v("个任务")])],1),a("el-form-item",{attrs:{label:"任务名称"}},[a("el-input",{attrs:{placeholder:"输入任务名称(可不填)"},model:{value:t.taskname,callback:function(e){t.taskname=e},expression:"taskname"}})],1),a("el-form-item",{attrs:{label:"链接"}},[a("el-input",{attrs:{placeholder:"输入商品链接（或淘口令）"},model:{value:t.link,callback:function(e){t.link=e},expression:"link"}})],1),"view"!=t.radio4?t._l(t.keywordlist,function(e,i){return a("Task",{key:e,ref:"task",refInFor:!0,attrs:{keywordlistLength:t.keywordlist.length,mykey:i},on:{myinc:t.inc,mynum:t.mynum,mydec:t.dec}})}):[a("el-form-item",{attrs:{label:"每日任务数量"}},[a("el-input-number",{attrs:{min:1,label:"描述文字"},model:{value:t.totalnum,callback:function(e){t.totalnum=e},expression:"totalnum"}})],1)],t.form.delivery?[a("el-form-item",{attrs:{label:"浏览时间"}},[a("el-input-number",{attrs:{min:30,step:10,label:"描述文字"},on:{change:t.myviewtime},model:{value:t.viewtime,callback:function(e){t.viewtime=e},expression:"viewtime"}}),a("el-checkbox",{staticStyle:{"margin-left":"15px"},model:{value:t.checked,callback:function(e){t.checked=e},expression:"checked"}},[t._v("查看宝贝评价")])],1),a("el-form-item",{staticClass:"cf",attrs:{label:"商品浏览深度"}},[a("el-select",{attrs:{placeholder:"请选择"},model:{value:t.mydeep,callback:function(e){t.mydeep=e},expression:"mydeep"}},t._l(t.deep,function(t){return a("el-option",{key:t.value,attrs:{label:t.label,value:t.value}})})),a("span",{staticStyle:{float:"right"}},[t._v("秒")]),a("el-input-number",{staticStyle:{float:"right"},attrs:{min:30,step:10,label:"描述文字"},on:{change:t.mydeeptime},model:{value:t.deeptime,callback:function(e){t.deeptime=e},expression:"deeptime"}})],1)]:t._e(),a("el-dialog",{attrs:{title:"提示",visible:t.dialogVisible,width:"30%"},on:{"update:visible":function(e){t.dialogVisible=e}}},[a("span",[t._v(t._s(t.dialogMsg))]),a("span",{staticClass:"dialog-footer",attrs:{slot:"footer"},slot:"footer"},[a("el-button",{attrs:{type:"primary"},on:{click:function(e){t.dialogVisible=!1}}},[t._v("确 定")])],1)])],2)},O=[];function z(t){a("xEec")}var F=!1,I=z,N=null,D=null,H=Object(m["a"])(E,V,O,F,I,N,D),L=H.exports,P={data:function(){return{activeName:"first",viewtime:30,deeptime:0,tasktype:"app",totaltask:100}},components:{Flow:L},computed:{totaltime:function(){return this.viewtime+this.deeptime},perint:function(){switch(this.tasktype){case"app":return Math.round(this.totaltime/5*2.5*.3);case"pc":return Math.round(this.totaltime/5*2.5*.7);case"view":return Math.round(this.totaltime/5*2.5*.7)}},totalint:function(){return this.totaltask*this.perint}},methods:{addviewtime:function(t){this.viewtime=t},adddeeptime:function(t){this.deeptime=t},changetype:function(t){this.tasktype=t},changeint:function(t){this.totaltask=t},submit:function(){var t=this.$refs.flow.submit();t&&this.$http.post("{:url('addorder')}",t).then(function(t){console.log(t.body)},function(t){})}}},W=function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("el-main",[a("el-tabs",{model:{value:t.activeName,callback:function(e){t.activeName=e},expression:"activeName"}},[a("el-tab-pane",{attrs:{label:"流量任务",name:"first"}},[a("Flow",{ref:"flow",on:{addviewtime:t.addviewtime,adddeeptime:t.adddeeptime,changetype:t.changetype,changeint:t.changeint}})],1),a("el-tab-pane",{attrs:{label:"收藏任务",name:"second"}},[t._v("收藏任务")]),a("el-tab-pane",{attrs:{label:"加购任务",name:"third"}},[t._v("加购任务")]),a("el-tab-pane",{attrs:{label:"淘宝直播",name:"fourth"}},[t._v("淘宝直播")])],1),a("el-card",{staticClass:"box-card cf",staticStyle:{"margin-top":"30px"}},[a("p",[t._v("任务耗时："),a("span",{staticClass:"num"},[t._v(t._s(t.totaltime))]),t._v("秒  单次消费："),a("span",{staticClass:"num"},[t._v(t._s(t.perint))]),t._v("积分  合计消费："),a("span",{staticClass:"num"},[t._v(t._s(t.totalint))]),t._v("积分")]),a("el-button",{staticStyle:{float:"right"},attrs:{type:"danger"},on:{click:t.submit}},[t._v("发布任务")])],1)],1)},A=[];function R(t){a("WA62")}var X=!1,q=R,J=null,K=null,U=Object(m["a"])(P,W,A,X,q,J,K),Z=U.exports,B={data:function(){return{tableData:[{date:"2016-05-02",name:"王小虎",address:"上海市普陀区金沙江路 1518 弄"},{date:"2016-05-04",name:"王小虎",address:"上海市普陀区金沙江路 1517 弄"},{date:"2016-05-01",name:"王小虎",address:"上海市普陀区金沙江路 1519 弄"},{date:"2016-05-03",name:"王小虎",address:"上海市普陀区金沙江路 1516 弄"}]}}},G=function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("el-table",{staticStyle:{width:"100%"},attrs:{data:t.tableData,border:""}},[a("el-table-column",{attrs:{prop:"date",label:"日期",width:"180"}}),a("el-table-column",{attrs:{prop:"name",label:"姓名",width:"180"}}),a("el-table-column",{attrs:{prop:"address",label:"地址"}})],1)},Q=[],Y=!1,tt=null,et=null,at=null,it=Object(m["a"])(B,G,Q,Y,tt,et,at),nt=it.exports,st={name:"app",data:function(){return{activeIndex:"1",currentView:Z}},components:{HelloWorld:_,Order:nt,Tb:Z,Task:S},methods:{myselect:function(t){switch(t){case"1":this.currentView=Z;break;case"4":this.currentView=nt;break}}}},lt=function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("div",{attrs:{id:"#app"}},[a("el-menu",{staticClass:"el-menu-demo",staticStyle:{padding:"0 240px",position:"relative",display:"flex","justify-content":"flex-end"},attrs:{"default-active":t.activeIndex,"background-color":"#262930","text-color":"#ffffff","active-text-color":"#d9363a",mode:"horizontal"}},[a("el-menu-item",{staticClass:"hidden-sm-and-down",staticStyle:{position:"absolute",left:"240px"},attrs:{index:"5"}},[a("img",{attrs:{src:"logo.png",alt:""}})]),a("el-menu-item",{attrs:{index:"1"}},[t._v("处理中心")]),a("el-submenu",{attrs:{index:"2"}},[a("template",{slot:"title"},[t._v("我的工作台")]),a("el-menu-item",{attrs:{index:"2-1"}},[t._v("选项1")]),a("el-menu-item",{attrs:{index:"2-2"}},[t._v("选项2")]),a("el-menu-item",{attrs:{index:"2-3"}},[t._v("选项3")]),a("el-submenu",{attrs:{index:"2-4"}},[a("template",{slot:"title"},[t._v("选项4")]),a("el-menu-item",{attrs:{index:"2-4-1"}},[t._v("选项1")]),a("el-menu-item",{attrs:{index:"2-4-2"}},[t._v("选项2")]),a("el-menu-item",{attrs:{index:"2-4-3"}},[t._v("选项3")])],2)],2),a("el-menu-item",{attrs:{index:"3",disabled:""}},[t._v("消息中心")]),a("el-menu-item",{attrs:{index:"4"}},[a("a",{attrs:{href:"https://www.ele.me",target:"_blank"}},[t._v("订单管理")])])],1),a("el-main",{staticClass:"container"},[a("el-row",{attrs:{gutter:20}},[a("el-col",{attrs:{md:{span:4}}},[a("div",{staticClass:"flex-column flex-align-center"},[a("img",{attrs:{src:"avastar.png",alt:""}}),a("div",[a("small",[t._v("充值积分")]),a("small",[t._v("赠送积分")])]),a("el-button",{attrs:{type:"primary"}},[t._v("点击充值")])],1),a("el-menu",{staticClass:"el-menu-vertical-demo",staticStyle:{"margin-top":"30px"},attrs:{"default-active":"1","text-color":"#000000","active-text-color":"#d9363a"},on:{select:t.myselect}},[a("el-menu-item",{attrs:{index:"1"}},[a("i",{staticClass:"el-icon-menu"}),a("span",{attrs:{slot:"title"},slot:"title"},[t._v("淘宝任务")])]),a("el-menu-item",{attrs:{index:"2"}},[a("i",{staticClass:"el-icon-setting"}),a("span",{attrs:{slot:"title"},slot:"title"},[t._v("京东任务")])]),a("el-menu-item",{attrs:{index:"3"}},[a("i",{staticClass:"el-icon-setting"}),a("span",{attrs:{slot:"title"},slot:"title"},[t._v("任务模板")])]),a("el-menu-item",{attrs:{index:"4"}},[a("i",{staticClass:"el-icon-setting"}),a("span",{attrs:{slot:"title"},slot:"title"},[t._v("业务查询")])])],1)],1),a("el-col",{attrs:{md:{span:20}}},[a(t.currentView,{tag:"component"})],1)],1)],1)],1)},rt=[];function ot(t){a("hvOk")}var ct=!1,ut=ot,dt=null,mt=null,pt=Object(m["a"])(st,lt,rt,ct,ut,dt,mt),ht=pt.exports;i["default"].config.productionTip=!1,i["default"].use(s.a),i["default"].use(o["a"]),i["default"].use(r),new i["default"]({render:function(t){return t(ht)}}).$mount("#app")},RzFn:function(t,e){},WA62:function(t,e){},bTWF:function(t,e){},hvOk:function(t,e){},xEec:function(t,e){}},[0]);
//# sourceMappingURL=app.6f79a208.js.map