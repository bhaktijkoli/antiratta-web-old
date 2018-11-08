<template>
  <div class="wrapper">
    <Loading v-show="$store.state.loading"/>
    <Navbar transparent/>
    <HomeHero />
    <Welcome />
    <Stutor />
    <Counter />
  </div>
</template>

<script>
import Loading from './../Layout/Loading'
import Navbar from './../Layout/Navbar'
import HomeHero from './HomeHero'
import Welcome from './Welcome'
import Stutor from './Stutor'
import Counter from './Counter'

export default {
  components: {
    Loading, Navbar, HomeHero, Welcome, Stutor, Counter
  },
  mounted() {
    document.title = "Welcome to AntiRatta";
  },
  methods: {
  },
}
</script>
