<template>
  <el-table
    :data="tableData"
    border
    style="width: 100%">
    <el-table-column
      prop="date"
      label="任务类型"
      width="180">
    </el-table-column>
    <el-table-column
      prop="name"
      label="旺旺/访问"
      width="旺旺/访问">
    </el-table-column>
    <el-table-column
      prop="price"
      label="单价/总价">
    </el-table-column>
    <el-table-column
      prop="发布量/剩余量"
      label="发布量/剩余量">
    </el-table-column>
      <el-table-column
      prop="处理状态"
      label="处理状态">
    </el-table-column>
    <el-table-column
      prop="发布时间"
      label="发布时间">
    </el-table-column>
     <el-table-column
      prop="执行日期"
      label="执行日期">
    </el-table-column>
     <el-table-column
      prop="备注/名称"
      label="备注/名称">
    </el-table-column>
     <el-table-column
      prop="操作"
      label="操作">
    </el-table-column>
  </el-table>
</template>

<script>
  export default {
    data() {
      return {
        tableData: [{
          date: '2016-05-02',
          name: '王小虎',
          address: '上海市普陀区金沙江路 1518 弄'
        }, {
          date: '2016-05-04',
          name: '王小虎',
          address: '上海市普陀区金沙江路 1517 弄'
        }, {
          date: '2016-05-01',
          name: '王小虎',
          address: '上海市普陀区金沙江路 1519 弄'
        }, {
          date: '2016-05-03',
          name: '王小虎',
          address: '上海市普陀区金沙江路 1516 弄'
        }]
      }
    },
    created:function(){
         this.$http.post("/customer/order/orderlist", {tel:"123"}).then(response => {
         
         }).catch(() => {         
        });
    }

  }
</script>