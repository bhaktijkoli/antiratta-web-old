<template>
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <EditModuleForm :module="module" />
      </div>
      <div class="col-sm-12">
        <TopicList :module="module" />
      </div>
      <div class="col-sm-12">
        <AddTopic :module="module" />
      </div>
    </div>
  </div>
</template>

<script>
import EditModuleForm from './EditModuleForm'
import TopicList from './../Topics/TopicList'
import AddTopic from './../Topics/AddTopic'
export default {
  components: {
    EditModuleForm, TopicList, AddTopic
  },
  data() {
    return {
      module: {},
    }
  },
  mounted() {
    this.doRefresh();
    this.$root.$on('refresh', ()=> {
      this.doRefresh();
    })
  },
  methods: {
    doRefresh: function() {
      var id = window.location.pathname.split("/").pop();
      axios.get(route.api('modules/get/') + id)
      .then(res=>{
        this.module = res.data;
        this.$root.$emit('module-loaded', res.data);
      })
    }
  }
}
</script>
