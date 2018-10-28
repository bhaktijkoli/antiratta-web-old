<template>
  <div class="wrapper">
    <Loading v-show="$store.state.loading"/>
    <Navbar/>
    <CartList />
  </div>
</template>

<script>
import Loading from './../Layout/Loading'
import Navbar from './../Layout/Navbar'
import CartList from './CartList'

export default {
  components: {
    Loading, Navbar, CartList
  },
  mounted() {
    document.title = "Your Cart";
    $(window).scrollTop(0);
  },
}
</script>
