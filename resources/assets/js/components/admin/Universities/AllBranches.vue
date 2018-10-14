<template>
  <div class="card" style="margin-top:60px">
    <div class="card-body">
      <h5>All Branches</h5>
      <hr />
      <div class="row">
        <div class="col-sm-12">
          <div class="form-group">
            <label>Select university</label>
            <select class="form-control" name="" v-on:change="onChangeUniversity">
              <option v-for="(un, index) in universities" :value="index">
                {{un.name}}
              </option>
            </select>
          </div>
        </div>
      </div>
      <div class="row">
        <table class="table table-hover table-striped">
          <thead>
            <tr>
              <th>#</th>
              <th>Branch Name</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="(branch, index) in branches">
              <td>{{index+1}}</td>
              <td>{{branch.name}}</td>
              <td><button type="button" class="btn btn-danger btn-sm" @click="onRemoveBranch(branch)"><i class="fa fa-trash" aria-hidden="true"></i></button></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  mounted() {
  },
  data() {
    return {
      branches: [],
      university: 0,
    }
  },
  methods: {
    onChangeUniversity: function(e) {
      changeUniverstiy(e.target.value)
    },
    onRemoveBranch: function(branch) {
      if(confirm("Do you want to remove " + branch.name + "?")) {
        axios.post(route.api('admin/branches/remove'), {id:branch.id}).then(res=>{
          this.changeUniverstiy(this.university);
        })
      }
    },
    changeUniverstiy: function(value) {
      this.university = value;
      axios.get(route.api('branches/get/'), {params:{university:value}}).then(res=>{
        this.branches = res.data;
      });
    }
  },
  props: ['universities'],
}
</script>
