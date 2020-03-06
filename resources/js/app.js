import Vue from 'vue'
import store from '~/store'
import router from '~/router'
import i18n from '~/plugins/i18n'
import App from '~/components/App'
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'
import { TabsPlugin, FormInputPlugin, CardPlugin } from 'bootstrap-vue'
import * as VueGoogleMaps from 'vue2-google-maps'
import '~/plugins'
import '~/components'
import VueLazyload from 'vue-lazyload'

Vue.use(TabsPlugin)
Vue.use(FormInputPlugin)
Vue.use(CardPlugin)
Vue.use(VueGoogleMaps, {
  load: {
    key: 'AIzaSyBexNK1id7ZmiC1xWPIwpU5EVkp9Mc82RU',
    libraries: 'places'
  }
})

Vue.config.productionTip = false

Vue.use(VueLazyload, {
  preLoad: 1.3,
  error: '/images/error.png',
  loading: '/images/loading-spin.gif',
  attempt: 1,
  listenEvents: [ 'scroll' ]
})

/* eslint-disable no-new */
new Vue({
  i18n,
  store,
  router,
  ...App
})
