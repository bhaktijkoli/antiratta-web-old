<template>
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <EditTopic :topic="topic" />
      </div>
    </div>
  </div>
</template>

<script>
import EditTopic from './EditTopic'
export default {
  components: {
    EditTopic
  },
  data() {
    return {
      topic: {},
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
      axios.get(route.api('topics/get/') + id)
      .then(res=>{
        this.topic = res.data;
        this.$root.$emit('topic-loaded', res.data);
      })
    }
  }
}
</script>
