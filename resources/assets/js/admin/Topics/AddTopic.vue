<template>
  <div class="card">
    <div class="card-body">
      <h5>Add Topic</h5>
      <hr />
      <form @submit="onSubmit">
        <input type="hidden" name="topic_module" :value="module.id">
        <div class="row">
          <div class="col-sm-9">
            <div class="form-group">
              <label>Name</label>
              <input type="text" class="form-control" id="topic_name" name="topic_name" placeholder="Enter topic name">
              <p class="help-block"></p>
            </div>
          </div>
          <div class="col-sm-9">
            <div class="form-group">
              <label>Theory</label>
              <textarea class="form-control" id="topic_description" name="topic_description"></textarea>
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
    $(()=>{
      $('#topic_description').richText();
    })
  },
  methods: {
    onSubmit: function(e) {
      e.preventDefault();
      var form = $(e.target);
      fsh.post(route.api('admin/topics/add'), form, (success, data)=>{
        if(success == true) this.$root.$emit("refresh");
      });
    },
  },
  props: ['module']
}
</script>
