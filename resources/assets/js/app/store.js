import Vue from 'vue';
import Vuex from 'vuex';
Vue.use(Vuex);
export default new Vuex.Store({
  state: {
    loading: true,
    auth: null,
  },
  mutations: {
    loading: (state, val) => {
      state.loading = val;
    },
    auth: (state, auth) => {
      state.auth = auth;
    },
  },
  actions: {
    getauth: (context) => {
      axios.get(route.api('/auth')).then(res=>{
        context.commit('auth', res.data);
        context.commit('loading', false);
      })
    },
  }
});
