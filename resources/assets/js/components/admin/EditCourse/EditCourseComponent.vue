<template>
  <div class="container">
    <div class="row">
      <div class="col-sm-9">
        <EditCourseForm :course="course"/>
      </div>
      <div class="col-sm-12">
        <ModuleList :course="course"/>
      </div>
      <div class="col-sm-12">
        <AddModule :course="course"/>
      </div>
    </div>
  </div>
</template>

<script>
import EditCourseForm from './EditCourseForm'
import ModuleList from './../Modules/ModuleList'
import AddModule from './../Modules/AddModule'
export default {
  components: {
    EditCourseForm, ModuleList, AddModule
  },
  data() {
    return {
      course: {},
    }
  },
  mounted() {
    this.doRefresh();
    this.$root.$on('refresh', ()=> {
      this.doRefresh();
    })
  },
  methods: {
    doRefresh: function() {
      var id = window.location.pathname.split("/").pop();
      axios.get(route.api('courses/get/') + id)
      .then(res=>{
        this.course = res.data;
        this.$root.$emit('course-loaded', res.data);
      })
    }
  }
}
</script>
