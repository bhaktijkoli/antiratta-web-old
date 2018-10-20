<template>
  <div class="card first-card">
    <div class="card-body">
      <h5>All Courses</h5>
      <hr />
      <div class="row">
        <div class="col-sm-4">
          <div class="form-group">
            <label for="">Select university</label>
            <select class="form-control" v-model="university" @change="onChangeUniverstiy">
              <option v-for="(un, key) in universities" :value="key+1">{{un.name}}</option>
            </select>
            <p class="help-block"></p>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="form-group">
            <label for="">Select branch</label>
            <select class="form-control" v-model="branch">
              <option v-for="(branch, key) in branches" :value="branch.id">{{branch.name}}</option>
            </select>
            <p class="help-block"></p>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="form-group">
            <button type="submit" name="button" class="btn btn-primary btn-inline-form" style="margin-top:30px" @click="onGetClick">Get</button>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-12" v-show="loading" style="margin-top:50px;margin-bottom:50px">
          <div class="text-center">
            <i class="fa fa-circle-o-notch fa-spin fa-3x fa-fw"></i>
            <span class="sr-only">Loading...</span>
          </div>
        </div>
        <div class="col-sm-12" v-show="courses.length==0 && first==false" style="margin-top:50px;margin-bottom:50px">
          <div class="text-center">
            <p>
              No courses were found for the selected branch and university.
            </p>
          </div>
        </div>
        <div class="col-sm-12" v-show="courses.length!=0">
          <table class="table table-hover table-striped">
            <thead>
              <tr>
                <th>#</th>
                <th>Course Name</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="(course, key) in courses">
                <td>{{key+1}}</td>
                <td>{{course.name}}</td>
                <td>
                  <a class="btn btn-warning btn-sm" @click="onClickEdit(course)"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                  <a class="btn btn-danger btn-sm" @click="onRemoveCourse(course)"><i class="fa fa-trash" aria-hidden="true"></i></a>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  mounted() {
    this.$root.$on('universities-loaded', ()=> {
      this.university = 1;
      this.onChangeUniverstiy();
    })
  },
  data() {
    return {
      university: 0,
      branch: -1,
      first: true,
      branches: [],
      courses: [],
      loading: false,
    }
  },
  methods: {
    onChangeUniverstiy: function() {
      axios.get(route.api('branches/get/'), {params:{university:this.university}}).then(res=>{
        this.branches = res.data;
        this.branch = 0;
      });
    },
    onGetClick: function() {
      this.first = false;
      this.courses = [];
      this.loading = true;
      axios.get(route.api('courses/get/'), {params:{branch:this.branch}}).then(res=>{
        this.courses = res.data;
        this.loading = false;
      });
    },
    onClickEdit: function(course) {
      window.location = route.admin('courses/edit/'+course.id);
    },
    onRemoveCourse: function(course) {
      if(confirm("Do you want to remove " + course.name + "?")) {
        axios.post(route.api('admin/courses/remove'), {course:course.id}).then(res=>{
          this.onGetClick();
        })
      }
    }
  },
  props: ['universities'],
}
</script>
