<template>
  <div class="col-sm-3 col-course">
    <div class="course-card">
      <div class="course-card-top">
        <img src="/images/course.jpg" class="course-card-image"/>
        <div :class="'course-card-overlay ' + color"></div>
        <h3 class="course-card-title">{{title}}</h3>
      </div>
    </div>
    <div class="card-body">
    </div>
  </div>
</template>

<script>
export default {
  props: ['title','color']
}
</script>
