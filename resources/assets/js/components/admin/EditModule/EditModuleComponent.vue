<template>
  <div class="container">
    <div class="row">
      <EditModuleForm :module="module" />
    </div>
  </div>
</template>

<script>
import EditModuleForm from './EditModuleForm'
export default {
  components: {
    EditModuleForm,
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
