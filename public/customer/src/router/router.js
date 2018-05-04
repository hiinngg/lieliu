import App from '../App.vue';
import Tb from '../components/Tb.vue';
import Order from '../components/Order.vue';
import Flow from '../components/tb/Flow.vue';

export default [

    { path: '/tb',
      alias: '/',
    // You could also have named views at tho top
    component:Tb,
  },
    { path: '/order',
      // You could also have named views at tho top
      component:Order,
    }
  ]