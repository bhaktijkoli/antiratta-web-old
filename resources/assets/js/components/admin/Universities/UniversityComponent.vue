<template>
  <div class="container">
    <div class="card" style="margin-top:60px">
      <div class="card-body">
        <form id="formAdminUniverstiy">
          <h5>Universities</h5>
          <hr />
          <div class="row">
            <div class="col-sm-12">
              <label>Select university</label>
            </div>
            <div class="col-sm-12">
              <div class="form-group">
                <select class="form-control" name="" v-on:change="onChangeUniversity">
                  <option v-for="(un, index) in universities" :value="index">
                    {{un.name}}
                  </option>
                </select>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
    <div class="card">
      <form ref="formAdminAddBranch">
        <input type="hidden" name="branch_university" v-model="university"/>
        <div class="card-body">
          <h5>Branches</h5>
          <hr />
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
          <div class="row">
            <div class="col-sm-12">
              <label>Add Branch</label>
            </div>
            <div class="col-sm-9">
              <div class="form-group">
                <input type="text" class="form-control" id="branch_name" name="branch_name" placeholder="Name">
                <p class="help-block"></p>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="col-sm-3">
              <div class="form-group">
                <button type="submit" name="button" class="btn btn-primary btn-inline-form" v-on:click="onAddBranchSubmit">Add</button>
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
    var comp = this;
    axios.get(route.api('universities/get')).then(res=>{
      comp.universities = res.data;
      comp.changeUniverstiy(1);
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
    onChangeUniversity: function(e) {
      this.changeUniverstiy(e.target.value);
    },
    onAddBranchSubmit: function(e) {
      e.preventDefault();
      var form = $(this.$refs.formAdminAddBranch);
      let comp = this;
      fh.hide_button();
      fh.remove_all_errros(form);
      axios.post(route.api('admin/branches/add'), form.serialize()).then(res=>{
        let data = res.data;
        if(fh.is_success(data)) {
          this.changeUniverstiy(this.university)
          fh.clear_all(form);
        } else {
          fh.set_multierrors(data);
        }
        fh.show_button();
      }).catch(res=>{
        show_errorpage(res);
      })
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
}
</script>
