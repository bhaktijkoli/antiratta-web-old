<template>
  <section id="course-content">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="card">
            <div class="card-body">
              <h3 class="card-title">Course Content</h3>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
export default {
  mounted() {
    this.$root.$on('course-loaded', ()=>{
    });
  },
  props: ['course'],
  computed: {
    description() {
      if(this.course == null) return "";
      return this.course.description
    },
  }
}
</script>
