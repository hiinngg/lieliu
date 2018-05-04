import App from '../App'

export default [{
    path: '/',
    component: App,
    children: [{
        path: '/tb',
        component: r => require.ensure([], () => r(require('../component/tb')), 'tb')
    }, {
        path: '/order',
        component: r => require.ensure([], () => r(require('../component/order')), 'order')
    }]
}]