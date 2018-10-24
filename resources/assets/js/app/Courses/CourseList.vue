<template>
  <section id="courses">
    <div class="container">
      <div class="row">
        <CourseCard/>
        <CourseCard/>
        <CourseCard/>
        <CourseCard/>
      </div>
    </div>
  </div>
</section>
</template>

<script>
import CourseCard from './CourseCard'
export default {
  components: {
    CourseCard,
  },
  mounted() {
  },
  methods: {
  },
}
</script>

<style media="screen">

.course-card {
  position: relative;
  overflow: hidden;
  margin-bottom: 30px;
  border-radius: 6px;
  color: rgba(0, 0, 0, 0.87);
  background: #fff;
  min-height: 300px;
  width: 100%;
  -webkit-box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.14), 0 3px 1px -2px rgba(0, 0, 0, 0.2), 0 1px 5px 0 rgba(0, 0, 0, 0.12);
  box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.14), 0 3px 1px -2px rgba(0, 0, 0, 0.2), 0 1px 5px 0 rgba(0, 0, 0, 0.12);
}
.course-card-top {
  height: 120px;
  width: 100%;
  position: relative;
  overflow: hidden;
}
.course-card-image {
  height: 120px;
  width: 100%;
  border-top-left-radius: 8px;
  border-top-right-radius: 8px;
  -webkit-transition: all .5s;
  transition: all .5s;
}
.course-card:hover .course-card-image {
  transform: scale(1.2);
}
.course-card .course-card-overlay {
  position: absolute;
  top: 0px;
  left: 0px;
  height: 120px;
  width: 100%;
  background-color: #50b13078;
  border-top-left-radius: 8px;
  border-top-right-radius: 8px;
}
.course-card-title {
  
}
</style>
