<template>
  <div class="card">
    <div class="card-body">
      <h5>Add Module</h5>
      <hr />
      <form @submit="onSubmit">
        <input type="hidden" name="module_course" :value="course.id">
        <div class="row">
          <div class="col-sm-9">
            <div class="form-group">
              <label>Name</label>
              <input type="text" class="form-control" id="module_name" name="module_name" placeholder="Enter module name">
              <p class="help-block"></p>
            </div>
          </div>
          <div class="col-sm-9">
            <div class="form-group">
              <label>Description</label>
              <textarea class="form-control" id="module_description" name="module_description"></textarea>
              <p class="help-block"></p>
            </div>
          </div>
          <div class="col-sm-12">
            <div class="form-group">
              <button type="submit" name="button" class="btn btn-primary btn-inline-form">Add</button>
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
  },
  methods: {
    onSubmit: function(e) {
      e.preventDefault();
      var form = $(e.target);
      fsh.post(route.api('admin/modules/add'), form, (success, data)=>{
        if(success == true) this.$root.$emit("refresh");
      });
    },
  },
  props: ['course']
}
</script>
