import Vue from 'vue';
import Vuex from 'vuex';
Vue.use(Vuex);
export default new Vuex.Store({
  state: {
    loading: true,
    auth: null,
    cart: [],
  },
  mutations: {
    loading: (state, val) => {
      state.loading = val;
    },
    auth: (state, auth) => {
      state.auth = auth;
    },
    cart: (state, cart) => {
      state.cart = cart;
    },
  },
  actions: {
    getauth: (context) => {
      axios.get(route.api('/auth')).then(res=>{
        if(res.data != '') context.commit('auth', res.data);
        context.commit('loading', false);
      })
    },
    getcart: (context) => {
      axios.get(route.api('/cart/get')).then(res=>{
        context.commit('cart', res.data);
      })
    }
  }
});
