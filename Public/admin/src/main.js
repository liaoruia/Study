// The following line loads the standalone build of Vue instead of the runtime-only build,
// so you don't have to do: import Vue from 'vue/dist/vue'
// This is done with the browser options. For the config, see package.json
import Vue from 'vue'
import VueRouter from 'vue-router';
import Vuex from 'vuex';
import {default as Vuedals} from 'vuedals'

Vue.use(VueRouter);
Vue.use(Vuex);
Vue.use(Vuedals);

import router from './router.js';
import store from './store/store';
import user from './config.js';

window.v = new Vue({ // eslint-disable-line no-new
  router,
  store
}).$mount('#app')