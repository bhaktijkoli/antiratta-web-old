<template>
  <div class="col-sm-3 col-course">
    <div class="course-card">
      <div class="course-card-top">
        <img src="/images/course.jpg" class="course-card-image"/>
        <div :class="'course-card-overlay ' + color"></div>
        <h3 class="course-card-title">{{title}}</h3>
      </div>
      <div class="course-card-body">
        <div class="course-card-information">
          <p>Information Technology</p>
        </div>
        <div class="course-card-description">
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
        </div>
        <div class="my-rating"></div>
        <div class="course-card-price">
          <span>₹770</span>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  mounted() {
    $(".my-rating").starRating({
      initialRating: 4,
      strokeColor: '#894A00',
      strokeWidth: 10,
      starSize: 15,
      readOnly: true,
    });
  },
  props: ['title','color']
}
</script>

<style media="screen">

</style>
