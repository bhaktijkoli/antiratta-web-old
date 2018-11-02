<template>
  <div class="wrapper">
    <Loading v-show="$store.state.loading"/>
    <Navbar/>
    <Header title="My Courses"/>
    <div class="container">
      <div class="row">
        <CourseCard v-for="(c, key) in courses" :key="key" :course="c"/>
      </div>
    </div>
  </div>
</template>

<script>
import Loading from './../Layout/Loading'
import Navbar from './../Layout/Navbar'
import Header from './../Layout/Header'

import CourseCard from './CourseCard'

export default {
  components: {
    Loading, Navbar, Header, CourseCard
  },
  mounted() {
    document.title = "My Courses";
    $(window).scrollTop(0);
    this.getMyCourses();
  },
  data() {
    return {
      courses: [],
    }
  },
  methods: {
    getMyCourses: function() {
      axios.post(route.api('user/courses/get')).then(res=>{
        this.courses = res.data;
      }).catch(res=>fh.show_errorpage(res))
    }
  },
}
</script>
