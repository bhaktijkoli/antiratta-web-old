<template>
  <div class="col-sm-3 col-course">
    <div class="course-card" @click="onCardClick()">
      <div class="course-card-top">
        <img src="/images/course.jpg" class="course-card-image"/>
        <div :class="'course-card-overlay ' + course.color"></div>
        <h3 class="course-card-title">{{course.name}}</h3>
      </div>
      <div class="course-card-body">
        <div class="course-card-information">
          <p>{{course.branch.name}}</p>
        </div>
        <div class="course-card-description">
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
        </div>
        <div class="my-rating"></div>
        <div class="course-card-price">
          <span>₹{{course.price}}</span>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  mounted() {
    $(".my-rating").starRating({
      initialRating: this.course.rating,
      strokeColor: '#894A00',
      strokeWidth: 10,
      starSize: 15,
      readOnly: true,
    });
  },
  methods: {
    onCardClick: function() {
      let params = {
        university: this.course.university.shortname.toLowerCase(),
        branch: this.course.branch.shortname.toLowerCase(),
        course: this.course.url.toLowerCase(),
      }
      this.$router.push({ name: 'course-details', params: params});
    },
  },
  props: ['course']
}
</script>

<style media="screen">

</style>
