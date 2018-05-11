<template>
  <div>
      <el-button type="primary" style="margin-bottom:30px;" @click="refresh">刷新</el-button>
    <el-table
    :data="tableData"
    border
    style="width: 100%">
    <el-table-column
      prop="a"
      label="旺旺/宝贝id/店铺id"
      width="200"
      >
    </el-table-column>
      <el-table-column
      prop="k"
      label="搜索的关键词"
      width="200"
      >
    </el-table-column>
    <el-table-column
      prop="integrate"
      label="消耗积分">
    </el-table-column>
    <el-table-column
      prop="c"
      label="发布量">
    </el-table-column>
      <el-table-column
      prop="m"
      label="处理状态">
    </el-table-column>
    <el-table-column
      prop="t"
       sortable
      label="发布时间">
    </el-table-column>
     <el-table-column
      prop="b"
      label="执行日期">
    </el-table-column>
     <el-table-column
      prop="oper"
      label="操作">
    </el-table-column>
  </el-table>

  <el-pagination
  :page-size="20"
  :pager-count="11"
  layout="prev, pager, next"
  :total="1000">
  </el-pagination>
  </div>
  
</template>

<script>
  export default {
    data() {
      return {
        tableData: ""
      }
    },
    created:function(){
       this.loaddata();
    },
    methods:{
      refresh:function(){
        this.loaddata();
      },
      loaddata:function(){
         const loading = this.$loading({    //放 loading
          text: 'Loading',
          spinner: 'el-icon-loading',
          background: 'rgba(0, 0, 0, 0.7)'
        });
         this.$http.post("/customer/order/orderlist", {tel:"123"}).then(response => {
            var res = response.body;
             loading.close();
             if(res.status==1){
              this.$message('获取成功');
               this.tableData = res.data;
             }else{
              this.$message({message:res,type:"error"});
             }
         }).catch(() => {
          loading.close();         
        });
      }
    }

  }
</script>