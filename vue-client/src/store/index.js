import Vuex from "vuex";
import Vue from "vue";

Vue.use(Vuex);

export default new Vuex.Store({
  state: {
    userId: localStorage.getItem("userId") || 0,
    token: localStorage.getItem("token") || false,
  },
  mutations: {
    setUser(state, user) {
      state.userId = user.id;
      state.token = user.auth_token;
    }
  },
  actions: {
    setUser(context, user) {
      // persist the user authentiction
      localStorage.setItem("userId", user.id);
      localStorage.setItem("token", user.auth_token);
      context.commit("setUser", user);
    }
  }
});
