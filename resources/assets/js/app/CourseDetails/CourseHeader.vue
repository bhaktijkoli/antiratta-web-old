<template>
  <section id="course-header">
    <div :class="'path-backdrop ' + color"></div>
    <img class="path-backdrop-image" src="/images/course.jpg"/>
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <h1 class="course-title">{{name}}</h1>
          <span class="course-subtitle">&bull;&nbsp;{{university}}&nbsp;&bull;&nbsp;{{branch}}&nbsp;&bull;&nbsp;{{sem}}</span>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-12">
          <div id="rating"></div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-12">
          <div class="course-hours">
            <span><i class="fa fa-clock-o" aria-hidden="true"></i>&nbsp;14 hours</span>
            <span><i class="fa fa-user-o" aria-hidden="true"></i>&nbsp;512 Students enrolled</span>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-12">
          <div class="course-price">
            <span>&#x20B9; {{price}}</span>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-12">
          <button class="btn btn-primary">Add to chart</button>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
export default {
  mounted() {
    this.$root.$on('course-loaded', ()=>{
      $('#rating').starRating({
        initialRating: 2,
        strokeColor: '#894A00',
        strokeWidth: 0,
        starSize: 25,
        readOnly: true,
      });
    });
  },
  props: ['course'],
  computed: {
    name() {
      if(this.course == null) return "";
      return this.course.name
    },
    university() {
      if(this.course == null) return "";
      return this.course.university.name
    },
    branch() {
      if(this.course == null) return "";
      return this.course.branch.name
    },
    sem() {
      if(this.course == null) return "";
      return "Semester " + this.course.sem;
    },
    price() {
      if(this.course == null) return "";
      return this.course.price;
    },
    color() {
      if(this.course == null) return "";
      return this.course.color;
    }
  }
}
</script>
