<template>
  <div class="card">
    <form ref="formAdminAddBranch">
      <div class="card-body">
        <h5>Add Branch</h5>
        <hr />
        <div class="row">
          <div class="col-sm-9">
            <div class="form-group">
              <label>Name</label>
              <input type="text" class="form-control" id="branch_name" name="branch_name" placeholder="Enter branch name">
              <p class="help-block"></p>
            </div>
          </div>
          <div class="col-sm-9">
            <div class="form-group">
              <label>Shortname</label>
              <input type="text" class="form-control" id="branch_shortname" name="branch_shortname" placeholder="Enter shortname">
              <p class="help-block"></p>
            </div>
          </div>
          <div class="col-sm-9">
            <div class="form-group">
              <label>Select university</label>
              <select class="form-control" id="branch_university" name="branch_university">
                <option v-for="(un, index) in universities" :value="index+1">
                  {{un.name}}
                </option>
              </select>
            </div>
          </div>
          <div class="col-sm-12">
            <div class="form-group">
              <button type="submit" name="button" class="btn btn-primary btn-inline-form" v-on:click="onAddBranchSubmit">Add</button>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
</template>

<script>
export default {
  mounted() {
  },
  methods: {
    onAddBranchSubmit: function(e) {
      e.preventDefault();
      var form = $(this.$refs.formAdminAddBranch);
      fh.hide_button();
      fh.remove_all_errros(form);
      axios.post(route.api('admin/branches/add'), form.serialize()).then(res=>{
        let data = res.data;
        if(fh.is_success(data)) {
          this.$root.$emit("refresh-list");
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
  props: ['universities'],
}
</script>
