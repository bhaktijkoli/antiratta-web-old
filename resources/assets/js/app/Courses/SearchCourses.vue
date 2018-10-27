<template>
  <section id="courses">
    <div class="container">
      <div class="row justify-content-md-center search-box">
        <div class="col-sm-6">
          <div class="input-group">
            <input ref="name" type="text" class="form-control form-control-lg" placeholder="Search for Courses" @keyup.enter="doSearch()">
            <div class="search-icon">
              <i class="fa fa-search" aria-hidden="true"></i>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <CourseCard v-for="(course, key) in courses" :key="key" :course="course"/>
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
    this.doSearch();
  },
  data() {
    return {
      courses: [],
    }
  },
  methods: {
    doSearch: function() {
      this.courses = [];
      let data = {
        name: $(this.$refs.name).val(),
      }
      axios.post(route.api('/search/courses'), data)
      .then(res=> {
        this.courses = res.data;
      })
    }
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
