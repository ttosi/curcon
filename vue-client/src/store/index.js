import Vuex from 'vuex'
import Vue from 'vue'

Vue.use(Vuex)

export default new Vuex.Store({
  state: {
    userId: 0,
    token: localStorage.getItem("token") || false
  },
  mutations: {
    setToken(state, token) {
      state.token = token
    },
    setUserId(state, id) {
      state.userId = id
    }
  },
  actions: {
    setToken(context, token) {
      context.commit("setToken", token)
    },
    setUserId(context, id) {
      context.commit("setUserId", id)
    }
  }
})