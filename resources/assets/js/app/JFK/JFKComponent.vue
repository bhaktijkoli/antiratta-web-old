<template>
  <div class="wrapper">
    <Loading v-show="$store.state.loading"/>
    <Navbar/>
    <Splitview/>
  </div>
</template>

<script>
import Loading from './../Layout/Loading'
import Navbar from './../Layout/Navbar'

import Splitview from './Splitview'

export default {
  components: {
    Loading, Navbar, Splitview
  },
  mounted() {
    document.title = "JFK";
  },
  methods: {
  },
}
</script>
