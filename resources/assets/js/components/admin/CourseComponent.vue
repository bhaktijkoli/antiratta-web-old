<template>
  <div class="container">
    <div class="card" style="margin-top:60px">
      <form ref="formAddCourse">
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
export default {
  mounted() {
    axios.get(route.api('universities/get')).then(res=>{
      this.universities = res.data;
      this.changeUniverstiy(1);
    });
  },
  data() {
    return {
      universities: [],
      branches: [],
      university: 0,
    }
  },
  methods: {
    changeUniverstiy: function(value) {
      this.university = value;
      axios.get(route.api('branches/get/')+value).then(res=>{
        this.branches = res.data;
      });
    },
    onAddCourseSubmit: function(e) {
      e.preventDefault();
      var form = $(this.$refs.formAddCourse);
      fh.hide_button();
      fh.remove_all_errros(form);
      axios.post(route.api('admin/courses/add'), form.serialize()).then(res=>{
        let data = res.data;
        if(fh.is_success(data)) {
          fh.clear_all(form);
        } else {
          fh.set_multierrors(data);
        }
        fh.show_button();
      }).catch(res=>{
        show_errorpage(res);
      })
    },
  },
}
</script>
