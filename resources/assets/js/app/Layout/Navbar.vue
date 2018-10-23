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
          <li class="nav-item" v-if="auth==null">
            <router-link class="nav-link" :to="{ name: 'login' }">Login</router-link>
          </li>
          <li class="dropdown nav-item" v-else>
            <a href="#" class="profile-photo dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false">
              <div class="profile-photo-small">
                <img src="http://via.placeholder.com/60x60&text=Avatar" alt="Circle Image" class="rounded-circle img-fluid">
              </div>
              <div class="ripple-container"></div></a>
              <div class="dropdown-menu dropdown-menu-right">
                <h6 class="dropdown-header">{{auth.firstname + " " + auth.lastname}}</h6>
                <a href="/admin" class="dropdown-item" v-if="auth.role > 0">Admin Dashboard</a>
                <div class="dropdown-divider" v-if="auth.role > 0"></div>
                <a href="" class="dropdown-item">My Courses</a>
                <a href="" class="dropdown-item">Settings</a>
                <div class="dropdown-divider"></div>
                <a href="" class="dropdown-item">Sign out</a>
              </div>
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
    },
    computed: {
      auth() {
        return this.$store.state.auth;
      }
    }
  }
  </script>
