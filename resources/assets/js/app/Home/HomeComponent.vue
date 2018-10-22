<template>
  <div class="wrapper">
    <Loading v-show="$store.state.loading"/>
    <Navbar transparent/>
    <IntroVideo />
    <Welcome />
    <Stutor />
    <Counter />
  </div>
</template>

<script>
import Loading from './../Layout/Loading'
import Navbar from './../Layout/Navbar'
import IntroVideo from './IntroVideo'
import Welcome from './Welcome'
import Stutor from './Stutor'
import Counter from './Counter'

export default {
  components: {
    Loading, Navbar, IntroVideo, Welcome, Stutor, Counter
  },
  mounted() {
    window.title = "Welcome to AntiRatta";
  },
  methods: {
  },
}
</script>
