<template>
  <div class="wrapper">
    <Loading v-show="$store.state.loading"/>
    <Navbar/>
    <Team style="margin-top:100px"/>
  </div>
</template>

<script>
import Loading from './../Layout/Loading'
import Navbar from './../Layout/Navbar'

import Team from './Team'

export default {
  components: {
    Loading, Navbar, Team
  },
  mounted() {
    document.title = "About Us";
  },
  methods: {
  },
}
</script>
