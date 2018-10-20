<template>
  <div class="card first-card">
    <div class="card-body">
      <h5>Edit Course&nbsp;&nbsp;<small>{{course.name}}</small></h5>
      <hr />
      <form @submit="onFormSumit">
        <input type="hidden" name="course" :value="course.id">
        <div class="row">
          <div class="col-sm-12">
            <div class="form-group">
              <label for="">Name</label>
              <input type="text" class="form-control" id="course_name" name="course_name" placeholder="Enter course name" :value="course.name">
              <p class="help-block"></p>
            </div>
          </div>
          <div class="col-sm-12">
            <div class="form-group">
              <label for="">Short name</label>
              <input type="text" class="form-control" id="course_shortname" name="course_shortname" placeholder="Enter course shortname" :value="course.shortname">
              <p class="help-block"></p>
            </div>
          </div>
          <div class="col-sm-12">
            <div class="form-group">
              <label for="">Price</label>
              <input type="text" class="form-control" id="course_price" name="course_price" placeholder="Enter price" :value="course.price">
              <p class="help-block"></p>
            </div>
          </div>
          <div class="col-sm-12">
            <div class="form-group">
              <button type="submit" name="button" class="btn btn-primary btn-inline-form">Save</button>
            </div>
          </div>
          <div class="col-sm-12">
            <label>Updated by {{course.updated_by}}, {{course.updated_at}}</label>
          </div>
        </div>
      </form>
    </div>
  </div>
</template>

<script>
export default {
  mounted() {
  },
  data() {
    return {

    }
  },
  methods: {
    onFormSumit: function(e) {
      e.preventDefault();
      var form = $(e.target);
      fsh.post(route.api('admin/courses/edit'), form, null, false);
    }
  },
  props: ['course'],
}
</script>
