<template>
  <section id="courses">
    <div class="container">
      <div class="row justify-content-md-center search-box">
        <div class="col-sm-6">
          <div class="input-group">
            <input type="text" class="form-control form-control-lg" placeholder="Search for Courses">
            <div class="search-icon">
              <i class="fa fa-search" aria-hidden="true"></i>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <CourseCard title="Applied Mathematics 3" color="blue"/>
        <CourseCard title="Applied Mathematics 4" color="yellow"/>
        <CourseCard title="Data Structures" color="green"/>
        <CourseCard title="Basic Electronics" color="red"/>
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
.search-box {
  margin-top: 150px;
  margin-bottom: 100px;
}
.search-box .form-control {
  border-radius: 8px !important;
  padding-inline-end: 50px;
  background-color: #ffffffe3;
  -moz-box-shadow: 5px 5px 25px 0 rgba(46,61,73,.2);
  -webkit-box-shadow: 5px 5px 25px 0 rgba(46,61,73,.2);
  box-shadow: 5px 5px 25px 0 rgba(46,61,73,.2);
}
.search-box .form-control:focus {
  background-color: #ffffffe3;
}
.input-group .search-icon {
  position: absolute;
  top: 12px;
  right: 15px;
  z-index: 1000;
}
.input-group .search-icon .fa{
  font-size: 24px;
}
</style>
