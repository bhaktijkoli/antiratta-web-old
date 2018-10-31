<template>
  <section id="cart">
    <div class="container">
      <div class="row">
        <div class="col-sm-9">
          <div class="card">
            <div class="card-body">
              <h3 class="card-title">Shoping Cart</h3>
              <p class="card-subtitle">{{$store.state.cart.length}} Courses in Cart</p>
              <div class="cart-list">
                <CartItem v-for="(course, key) in courses" :key="key" :course="course"/>
              </div>
              <div class="cart-list-empty" v-show="$store.state.cart.length==0">
                <i class="fa fa-shopping-cart fa-5x" aria-hidden="true"></i>
                <p>Your cart is empty. Keep shopping to find a course!</p>
                <router-link class="btn btn-primary" :to="{name:'courses'}">Keep shoping</router-link>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-3" v-show="$store.state.cart.length">
          <div class="card">
            <div class="card-body">
              <h3 class="card-title">Total</h3>
              <span class="cart-total-price">&#x20B9; {{total}}</span>
              <button class="btn btn-primary cart-checkout-btn btn-block" @click="onCheckoutClick">Checkout</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
import CartItem from './CartItem'
export default {
  components: {
    CartItem
  },
  mounted() {
    this.$root.$on('cart-refresh', ()=>{
      this.getCoursesDetails();
    })
    this.getCoursesDetails();
  },
  data() {
    return {
      courses: [],
      total: 0,
    }
  },
  methods: {
    getCoursesDetails: function() {
      axios.get(route.api('/cart/get?details=1')).then(res=>{
        this.courses = res.data.courses;
        this.total = res.data.total;
      }).catch(res=>fh.show_errorpage(res))
    },
    onCheckoutClick: function() {
      if(!this.$store.state.auth) this.$router.push({name:'login'})
      axios.post(route.api('/cart/checkout')).then(res=>{
        this.$router.push({name:'home'});
      }).catch(res=>fh.show_errorpage(res))
    }
  },
}
</script>
