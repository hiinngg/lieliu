import Vue from 'vue'
import ElementUI from 'element-ui';
import 'element-ui/lib/theme-chalk/index.css';
import 'element-ui/lib/theme-chalk/display.css';
import './scss/element-variables.scss';
import  VueRouter from 'vue-router';
import routes from './router/router.js'
import setTaskCount from './js/setTaskCount.js';
import VueResource  from 'vue-resource';
import App from './App.vue'

Vue.config.productionTip = false
Vue.use(ElementUI);
Vue.use(VueResource);
Vue.use(setTaskCount);
Vue.use(VueRouter);

const router = new VueRouter({
	routes
})

new Vue({
	router,
  render: h => h(App)
}).$mount('#app')
