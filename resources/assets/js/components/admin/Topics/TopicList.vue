<template>
  <div class="card">
    <div class="card-body">
      <h5>All Topics</h5>
      <hr />
      <div class="row">
        <div class="col-sm-12" v-show="topics.length==0" style="margin-top:50px;margin-bottom:50px">
          <div class="text-center">
            <p>
              No topics were found for this module.
            </p>
          </div>
        </div>
        <div class="col-sm-12" v-show="topics.length!=0">
          <table class="table table-hover table-striped">
            <thead>
              <tr>
                <th>#</th>
                <th>Topic Name</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="(m, key) in topics">
                <td>{{key+1}}</td>
                <td>{{m.name}}</td>
                <td>
                  <a class="btn btn-warning btn-sm" @click="onClickEdit(m)"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                  <!-- <a class="btn btn-danger btn-sm" @click="doClickRemove(m)"><i class="fa fa-trash" aria-hidden="true"></i></a> -->
                </td>
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
    this.$root.$on('module-loaded', (data)=> {
      this.topics = data.topics;
    });
  },
  data() {
    return {
      topics: [],
    }
  },
  methods: {
    onClickEdit: function(m) {
      window.location = route.admin('topics/edit/'+m.id);
    },
    doClickRemove: function(m) {
      if(confirm("Are you sure to remove " + m.name +"?")) {
        axios.post(route.api('admin/topics/remove'), {module:m.id})
        .then(res=> {
          if(fh.is_success(res.data)) this.$root.$emit("refresh");
        })
      }
    }
  },
  props: ['course'],
}
</script>
