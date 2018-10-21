<template>
  <div class="container">
    <AllBranches :universities="universities"/>
    <AddBranch :universities="universities"/>
  </div>
</template>

<script>
import AllBranches from './AllBranches';
import AddBranch from './AddBranch';

export default {
  components: {
    AllBranches, AddBranch
  },
  mounted() {
    axios.get(route.api('universities/get')).then(res=>{
      this.universities = res.data;
    });
  },
  data() {
    return {
      universities: [],
    }
  },
}
</script>
