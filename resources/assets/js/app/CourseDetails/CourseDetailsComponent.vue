<template>
  <div class="wrapper">
    <Loading v-show="$store.state.loading && course==null"/>
    <Navbar transparent/>
    <CourseHeader :course="course"/>
    <CourseDescription :course="course"/>
  </div>
</template>

<script>
import Loading from './../Layout/Loading'
import Navbar from './../Layout/Navbar'

import CourseHeader from './CourseHeader'
import CourseDescription from './CourseDescription'

export default {
  components: {
    Loading, Navbar, CourseHeader, CourseDescription
  },
  mounted() {
    $(window).scrollTop(0);
    let university = this.$route.params.university;
    let branch = this.$route.params.branch;
    let course = this.$route.params.course;
    axios.post(route.api('courses/get/details'), {university, branch, course})
    .then(res=> {
      this.course = res.data;
      document.title = res.data.name;
      this.$root.$emit('course-loaded');
    })
  },
  data() {
    return {
      course: null,
    }
  },
  methods: {
  },
}
</script>
