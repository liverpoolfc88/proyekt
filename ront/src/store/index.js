import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

export default new Vuex.Store({
  state: {
    backend_url: 'http://lava.loc',
    // backend_url: 'http://wb.uzautomotors.com/',
    // access_token: Cookies.get('access_token') || "null",
    // user: null,
    // permissions: null,
    // locale: Cookies.get('locale') || 'ru',
    // errors: []
  },
  mutations: {
  },
  actions: {
  },
  modules: {
  }
})
