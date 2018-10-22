<template>
  <div class="wrapper">
    <Loading v-show="$store.state.loading"/>
    <Navbar/>
  </div>
</template>

<script>
import Loading from './../Layout/Loading'
import Navbar from './../Layout/Navbar'

export default {
  components: {
    Loading, Navbar
  },
  mounted() {
    window.title = "Login";
  },
  methods: {
  },
}
</script>
