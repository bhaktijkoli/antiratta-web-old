<template>
  <div class="col-sm-3">
    <div class="my-course-card">
      <div class="my-course-card-header">
        <img src="/images/course.jpg" class="my-course-card-image"/>
      </div>
      <div class="my-course-card-body">
        <h3 class="my-course-card-title">{{course.name}}</h3>
      </div>
      <div class="my-course-card-footer">
        <button class="btn btn-info btn-block">Start Learning</button>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  mounted() {
  },
  methods: {
  },
  props: ['course']
}
</script>

<style media="screen">

</style>
