<template>
  <div class="wrapper">
    <Loading v-show="$store.state.loading"/>
    <Navbar/>
    <Header title="Cart"/>
    <CartList />
  </div>
</template>

<script>
import Loading from './../Layout/Loading'
import Navbar from './../Layout/Navbar'
import Header from './../Layout/Header'
import CartList from './CartList'

export default {
  components: {
    Loading, Navbar, Header, CartList
  },
  mounted() {
    document.title = "Your Cart";
    $(window).scrollTop(0);
  },
}
</script>
