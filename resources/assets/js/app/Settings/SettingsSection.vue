<template>
  <section id="settings">
    <div class="container">
      <div class="row">
        <div class="col-sm-4">
          <div class="card">
            <div class="card-body">
              <h4>Account Settings</h4>
              <hr />
              <ul class="nav nav-pills nav-pills-primary flex-column">
                <li class="nav-item" v-for="(l, key) in links"><router-link :class="isActive(l)" :to="{name: l}">{{names[key]}}</router-link></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-sm-8">
          <PersonalInfo v-if="$route.name=='personal-info'" :auth="$store.state.auth"/>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
import PersonalInfo from './PersonalInfo'
export default {
  components: {
    PersonalInfo,
  },
  mounted() {
    document.title = this.names[this.links.indexOf(this.$route.name)];
  },
  data() {
    return{
      links: ['personal-info', 'email', 'password'],
      names: ['Personal Information', 'Email', 'Password'],
    }
  },
  methods: {
    isActive(l) {
      if(l == this.$route.name) return "nav-link active"
      return "nav-link"
    }
  },
  watch: {
    '$route' (to, from) {
      document.title = this.names[this.links.indexOf(this.$route.name)];
    }
  }
}
</script>
