<template>
  <div class="card">
    <div class="card-body">
      <h5>All Modules</h5>
      <hr />
      <div class="row">
        <div class="col-sm-12" v-show="modules.length==0" style="margin-top:50px;margin-bottom:50px">
          <div class="text-center">
            <p>
              No modules were found for this course.
            </p>
          </div>
        </div>
        <div class="col-sm-12" v-show="modules.length!=0">
          <table class="table table-hover table-striped">
            <thead>
              <tr>
                <th>#</th>
                <th>Course Name</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="(m, key) in modules">
                <td>{{key+1}}</td>
                <td>{{m.name}}</td>
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
    this.$root.$on('course-loaded', (data)=> {
      this.modules = data.modules;
    });
  },
  data() {
    return {
      modules: [],
    }
  },
  methods: {
  },
  props: ['course'],
}
</script>
