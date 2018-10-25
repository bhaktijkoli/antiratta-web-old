<template>
  <div class="card first-card">
    <div class="card-body">
      <h5>Edit Course&nbsp;&nbsp;<small>{{course.name}}</small></h5>
      <hr />
      <form @submit="onFormSumit" enctype="multipart/form-data">
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
            <label for="">Semester</label>
              <select class="form-control" id="course_sem" name="course_sem" v-model="course.sem">
                <option v-for="(sem, key) in sems" :value="sem">{{sem}}</option>
              </select>
              <p class="help-block"></p>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <label for="">Update Cover Image</label>
              <input type="file" class="form-control" id="course_image" name="course_image">
              <p class="help-block"></p>
            </div>
          </div>
          <div class="col-sm-3">
            <div class="form-group">
              <label for="">Cover Overlay Color</label>
              <select class="form-control" id="course_color" name="course_color" v-model="course.color">
                <option v-for="c in colors" :value="c">{{c}}</option>
              </select>
              <p class="help-block"></p>
            </div>
          </div>
          <div class="col-sm-12">
            <div class="form-group">
              <label for="">Description</label>
              <textarea class="form-control" id="course_description" name="course_description" placeholder="Enter Description">
              </textarea>
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
      sems: [1,2,3,4,5,6,7,8],
      colors: ['red','blue','green','yellow','orange'],
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
