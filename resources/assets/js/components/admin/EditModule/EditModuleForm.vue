<template>
  <div class="card first-card">
    <div class="card-body">
      <h5>Add Module</h5>
      <hr />
      <form @submit="onSubmit">
        <input type="hidden" name="module" :value="module.id">
        <div class="row">
          <div class="col-sm-9">
            <div class="form-group">
              <label>Name</label>
              <input type="text" class="form-control" id="module_name" name="module_name" placeholder="Enter module name" :value="module.name">
              <p class="help-block"></p>
            </div>
          </div>
          <div class="col-sm-9">
            <div class="form-group">
              <label>Description</label>
              <textarea class="form-control" id="module_description" name="module_description">{{module.description}}</textarea>
              <p class="help-block"></p>
            </div>
          </div>
          <div class="col-sm-12">
            <div class="form-group">
              <button type="submit" name="button" class="btn btn-primary btn-inline-form">Save</button>
            </div>
          </div>
          <div class="col-sm-12">
            <label>Updated by {{module.updated_by}}, {{module.updated_at}}</label>
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
  methods: {
    onSubmit: function(e) {
      e.preventDefault();
      var form = $(e.target);
      fsh.post(route.api('admin/modules/edit'), form, (success, data)=>{
        if(success == true) this.$root.$emit("refresh");
      });
    },
  },
  props: ['module']
}
</script>
