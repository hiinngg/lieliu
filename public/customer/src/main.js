import Vue from 'vue'
import ElementUI from 'element-ui';
import 'element-ui/lib/theme-chalk/index.css';
import 'element-ui/lib/theme-chalk/display.css';
import './scss/element-variables.scss';
import setTaskCount from './js/setTaskCount.js';

import App from './App.vue'

Vue.config.productionTip = false
Vue.use(ElementUI);
Vue.use(setTaskCount);

new Vue({
  render: h => h(App)
}).$mount('#app')
