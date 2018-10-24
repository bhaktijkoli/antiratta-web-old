<template>
  <div class="wrapper">
    <Loading v-show="$store.state.loading"/>
    <Navbar/>
    <SettingsSection style="margin-top:100px"/>
  </div>
</template>

<script>
import Loading from './../Layout/Loading'
import Navbar from './../Layout/Navbar'

import SettingsSection from './SettingsSection'

export default {
  components: {
    Loading, Navbar, SettingsSection
  },
  mounted() {
    window.title = "Courses";
  },
  methods: {
  },
}
</script>
