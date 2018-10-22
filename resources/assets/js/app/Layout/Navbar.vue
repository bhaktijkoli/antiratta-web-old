<template>
  <nav ref="nav" class="navbar fixed-top navbar-expand-lg bg-dark">
    <div class="container">
      <div class="navbar-translate">
        <a class="navbar-brand" href="/">AntiRatta</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="sr-only">Toggle navigation</span>
          <span class="navbar-toggler-icon"></span>
          <span class="navbar-toggler-icon"></span>
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>
      <div class="collapse navbar-collapse">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <router-link class="nav-link" :to="{ name: 'home' }">Home</router-link>
          </li>
          <li class="nav-item">
            <router-link class="nav-link" :to="{ name: 'courses' }">Courses</router-link>
          </li>
          <li class="nav-item">
            <router-link class="nav-link" :to="{ name: 'jfk' }">JFK</router-link>
          </li>
          <li class="nav-item">
            <router-link class="nav-link" :to="{ name: 'aboutus' }">About Us</router-link>
          </li>
          <li class="nav-divider"></li>
          <li class="nav-item">
            <router-link class="nav-link" :to="{ name: 'login' }">Login</router-link>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</template>

<script>
export default {
  mounted() {
    if(this.transparent) {
      $(this.$refs.nav).addClass("navbar-transparent");
      $(window).scroll(event => {
        if($(window).scrollTop()>70) {
          $(this.$refs.nav).removeClass("navbar-transparent");
        } else {
          $(this.$refs.nav).addClass("navbar-transparent");
        }
      });
    }
  },
  props: {
    transparent: {
      default: false,
      type: Boolean,
    }
  }
}
</script>
