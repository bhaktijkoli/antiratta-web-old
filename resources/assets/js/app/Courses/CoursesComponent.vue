<template>
  <div class="wrapper">
    <Loading v-show="$store.state.loading"/>
    <Navbar/>
    <CourseList style="margin-top:100px"/>
  </div>
</template>

<script>
import Loading from './../Layout/Loading'
import Navbar from './../Layout/Navbar'

import CourseList from './CourseList'

export default {
  components: {
    Loading, Navbar, CourseList
  },
  mounted() {
    document.title = "Courses";
  },
  methods: {
  },
}
</script>
