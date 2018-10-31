<template>
  <div class="wrapper">
    <Loading v-show="$store.state.loading"/>
    <Navbar/>
    <Header title="My Courses"/>
  </div>
</template>

<script>
import Loading from './../Layout/Loading'
import Navbar from './../Layout/Navbar'
import Header from './../Layout/Header'

export default {
  components: {
    Loading, Navbar, Header
  },
  mounted() {
    document.title = "My Courses";
    $(window).scrollTop(0);
  },
  methods: {
  },
}
</script>
