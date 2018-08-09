<template>
  <div class="container">
    <div class="card" style="margin-top:60px">
      <div class="card-body">
        <form id="formAdminUniverstiy">
          <h5>Universities</h5>
          <hr />
          <div class="row">
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
      <form id="formAdminAddBranch">
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
                </tr>
              </thead>
              <tbody>
                <tr v-for="(branch, index) in branches">
                  <td>{{index+1}}</td>
                  <td>{{branch.name}}</td>
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
      let comp = this;
      fh.hide_button();
      fh.remove_all_errros('#formAdminAddBranch');
      axios.post('/api/admin/branches/add', $('#formAdminAddBranch').serialize()).then(res=>{
        let data = res.data;
        if(fh.is_success(data)) {
          comp.changeUniverstiy(comp.university)
        } else {
          fh.set_multierrors(data);
        }
        fh.show_button();
      }).catch(res=>{

      })
    },
    changeUniverstiy: function(value) {
      var comp = this;
      comp.university = value;
      axios.get(route.api('branches/get/')+value).then(res=>{
        comp.branches = res.data;
      });
    }
  },
}
</script>
