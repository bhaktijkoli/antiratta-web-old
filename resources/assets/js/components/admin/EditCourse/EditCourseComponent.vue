<template>
  <div class="container">
    <div class="row">
      <div class="col-sm-9">
        <EditCourseForm :course="course"/>
      </div>
    </div>
  </div>
</template>

<script>
import EditCourseForm from './EditCourseForm'
export default {
  components: {
    EditCourseForm
  },
  data() {
    return {
      course: {},
    }
  },
  mounted() {
    var id = window.location.pathname.split("/").pop();
    axios.get(route.api('courses/get/') + id)
    .then(res=>{
      this.course = res.data;
      this.$root.$emit('course-loaded');
    })
  },
}
</script>
