<template>
  <div class="card" style="margin-top:60px">
    <div class="card-body">
      <h5>All Branches</h5>
      <hr />
      <div class="row">
        <div class="col-sm-12">
          <div class="form-group">
            <label>Select university</label>
            <select class="form-control" @change="onChangeUniversity" v-model="university">
              <option v-for="(un, index) in universities" :value="index+1" :selected="index==0">
                {{un.name}}
              </option>
            </select>
          </div>
        </div>
      </div>
      <div class="row" style="margin-top:50px;margin-bottom:50px;" v-show="branches.length==0">
        <div class="col-sm-12">
          <div class="text-center">
            <p>
              No branches found for the selected university.
            </p>
          </div>
        </div>
      </div>
      <div class="row" v-show="branches.length > 0">
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
    this.$root.$on('refresh-list', ()=> {
      this.onChangeUniversity();
    })
  },
  data() {
    return {
      branches: [],
      university: 0,
    }
  },
  methods: {
    onChangeUniversity: function() {
      axios.get(route.api('branches/get/'), {params:{university:this.university}}).then(res=>{
        this.branches = res.data;
      });
    },
    onRemoveBranch: function(branch) {
      if(confirm("Do you want to remove " + branch.name + "?")) {
        axios.post(route.api('admin/branches/remove'), {id:branch.id}).then(res=>{
          this.onChangeUniversity();
        })
      }
    },
    changeUniverstiy: function(value) {

    }
  },
  props: ['universities'],
}
</script>
