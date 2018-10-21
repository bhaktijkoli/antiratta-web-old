<template>
  <div class="card first-card">
    <div class="card-body">
      <h5>Edit Topic</h5>
      <hr />
      <form @submit="onSubmit">
        <input type="hidden" name="topic" :value="topic.id">
        <div class="row">
          <div class="col-sm-9">
            <div class="form-group">
              <label>Name</label>
              <input type="text" class="form-control" id="topic_name" name="topic_name" placeholder="Enter topic name" :value="topic.name">
              <p class="help-block"></p>
            </div>
          </div>
          <div class="col-sm-9">
            <div class="form-group">
              <label>Theory</label>
              <textarea class="form-control" id="topic_description" name="topic_description">{{topic.description}}</textarea>
              <p class="help-block"></p>
            </div>
          </div>
          <div class="col-sm-12">
            <div class="form-group">
              <button type="submit" name="button" class="btn btn-primary btn-inline-form">Save</button>
            </div>
          </div>
        </div>
        <div class="col-sm-12">
          <label>Updated by {{topic.updated_by}}, {{topic.updated_at}}</label>
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
      fsh.post(route.api('admin/topics/edit'), form, (success, data)=>{
        if(success == true) this.$root.$emit("refresh");
      });
    },
  },
  props: ['topic']
}
</script>
