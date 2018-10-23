<template>
  <div class="wrapper">
    <Loading v-show="$store.state.loading"/>
    <Navbar/>
    <LoginSignup style="margin-top:100px;"/>
  </div>
</template>

<script>
import Loading from './../Layout/Loading'
import Navbar from './../Layout/Navbar'

import LoginSignup from './LoginSignup'

export default {
  components: {
    Loading, Navbar, LoginSignup
  },
  mounted() {
    window.title = "Login";
  },
  methods: {
  },
}
</script>
