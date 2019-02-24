import Vue from 'vue'
import Vuex from 'vuex'

import user from './user'
import preferences from './preferences'

Vue.use(Vuex)

const store = new Vuex.Store({
  modules: {
    user,
    preferences
  }
})

export default store
