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
        if(res.data != '') {
          context.commit('auth', res.data);
          if(res.data.verified == 0) {
            modal.showModalDefault("Verify your Email Address", "An email has been send to you plz verify it", "ok");
          }
        }
        context.commit('loading', false);
      }).catch(res=>fh.show_errorpage(res))
    },
    getcart: (context) => {
      axios.get(route.api('/cart/get')).then(res=>{
        context.commit('cart', res.data);
      }).catch(res=>fh.show_errorpage(res))
    }
  }
});
