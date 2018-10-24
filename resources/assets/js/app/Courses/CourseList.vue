<template>
  <section id="courses">
    <div class="container">
      <div class="row">
        <CourseCard title="Applied Mathematics 3" color="blue"/>
        <CourseCard title="Applied Mathematics 4" color="yellow"/>
        <CourseCard title="Data Structures" color="green"/>
        <CourseCard title="Basic Electronics" color="red"/>
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
</style>
