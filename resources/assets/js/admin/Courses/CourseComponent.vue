<template>
  <div class="container">
    <AllCourses :universities="universities"/>
    <div class="card">
      <form ref="formAddCourse" enctype="multipart/form-data">
        <div class="card-body">
          <h5>Add Course</h5>
          <hr />
          <div class="row">
            <div class="col-sm-9">
              <div class="form-group">
                <label for="">Name</label>
                <input type="text" class="form-control" id="course_name" name="course_name" placeholder="Enter course name">
                <p class="help-block"></p>
              </div>
            </div>
            <div class="col-sm-9">
              <div class="form-group">
                <label for="">Short name</label>
                <input type="text" class="form-control" id="course_shortname" name="course_shortname" placeholder="Enter course shortname">
                <p class="help-block"></p>
              </div>
            </div>
            <div class="col-sm-9">
              <div class="form-group">
                <label for="">Price</label>
                <input type="text" class="form-control" id="course_price" name="course_price" placeholder="Enter price">
                <p class="help-block"></p>
              </div>
            </div>
            <div class="col-sm-9">
              <div class="form-group">
                <label for="">University</label>
                <select class="form-control" id="course_university" name="course_university" @change="changeUniverstiy">
                  <option v-for="(un, key) in universities" :value="key">{{un.name}}</option>
                </select>
                <p class="help-block"></p>
              </div>
            </div>
            <div class="col-sm-9">
              <div class="form-group">
                <label for="">Branch</label>
                <select class="form-control" id="course_branch" name="course_branch">
                  <option v-for="(branch, key) in branches" :value="branch.id">{{branch.name}}</option>
                </select>
                <p class="help-block"></p>
              </div>
            </div>
            <div class="col-sm-9">
              <div class="form-group">
              <label for="">Semester</label>
                <select class="form-control" id="course_sem" name="course_sem">
                  <option v-for="(sem, key) in sems" :value="sem">{{sem}}</option>
                </select>
                <p class="help-block"></p>
              </div>
            </div>
            <div class="col-sm-9">
              <div class="form-group">
              <label for="">Course Cover Image</label>
                <input type="file" class="form-control" id="course_image" name="course_image">
                <p class="help-block"></p>
              </div>
            </div>
            <div class="col-sm-12">
              <div class="form-group">
                <button type="submit" name="button" class="btn btn-primary btn-inline-form" v-on:click="onAddCourseSubmit">Add</button>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</template>

<script>
import AllCourses from './AllCoursesComponent'
export default {
  components: {
    AllCourses
  },
  mounted() {
    axios.get(route.api('universities/get')).then(res=>{
      this.universities = res.data;
      this.changeUniverstiy(1);
      this.$root.$emit('universities-loaded');
    });
  },
  data() {
    return {
      universities: [],
      branches: [],
      sems: [1,2,3,4,5,6,7,8],
      university: 0,
    }
  },
  methods: {
    changeUniverstiy: function(value) {
      this.university = value;
      axios.get(route.api('branches/get/'), {params:{university:value}}).then(res=>{
        this.branches = res.data;
      });
    },
    onAddCourseSubmit: function(e) {
      e.preventDefault();
      var form = $(this.$refs.formAddCourse);
      fsh.post(route.api('admin/courses/add'), form, (success, data)=>{
        if(success == true) this.$root.$emit('courses-refresh');
      });
    },
  },
}
</script>
