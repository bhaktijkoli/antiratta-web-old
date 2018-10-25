<template>
  <div class="wrapper">
    <Loading v-show="$store.state.loading"/>
    <Navbar/>
    <SearchCourses style="margin-top:100px"/>
  </div>
</template>

<script>
import Loading from './../Layout/Loading'
import Navbar from './../Layout/Navbar'

import SearchCourses from './SearchCourses'

export default {
  components: {
    Loading, Navbar, SearchCourses
  },
  mounted() {
    document.title = "Courses";
  },
  methods: {
  },
}
</script>
