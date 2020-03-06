import Vue from 'vue'
import Home from './Admin/Home'
import VueRouter from 'vue-router'
import routes from './Admin/routes/routes'
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'
import { FormPlugin } from 'bootstrap-vue'
import VueLazyload from 'vue-lazyload'
Vue.use(VueLazyload, {
  preLoad: 1.3,
  error: '/images/error.png',
  loading: '/images/loading-spin.gif',
  attempt: 1,
  listenEvents: [ 'scroll' ]
})
Vue.use(FormPlugin)
Vue.use(VueRouter)

// eslint-disable-next-line no-new

const router = new VueRouter({
  routes
})

router.beforeEach((to, from, next) => {
  //NProgress.start();
  // eslint-disable-next-line eqeqeq
  if (to.path == '/login') {
    localStorage.removeItem('adminUser');
  }
  let user = JSON.parse(localStorage.getItem('adminUser'));
  if (!user && to.path != '/login') {
    next({ path: '/login' })
  } else {
    next()
  }
})

new Vue({
  el: '#admin',
  router,
  render: h => h(Home)
// eslint-disable-next-line eol-last
})