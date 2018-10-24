import Vue from 'vue';
import VueRouter from 'vue-router'
Vue.use(VueRouter)
export default new VueRouter({
  routes: [
    {
      path: '/',
      name: 'home',
      component: require('./Home/HomeComponent.vue')
    },
    {
      path: '/courses',
      name: 'courses',
      component: require('./Courses/CoursesComponent.vue')
    },
    {
      path: '/jfk',
      name: 'jfk',
      component: require('./JFK/JFKComponent.vue')
    },
    {
      path: '/aboutus',
      name: 'aboutus',
      component: require('./Aboutus/AboutusComponent.vue')
    },
    {
      path: '/settings/personal-info',
      name: 'personal-info',
      component: require('./Settings/SettingsComponent.vue')
    },
    {
      path: '/settings/email',
      name: 'email',
      component: require('./Settings/SettingsComponent.vue')
    },
    {
      path: '/settings/password',
      name: 'password',
      component: require('./Settings/SettingsComponent.vue')
    },
    {
      path: '/login',
      name: 'login',
      component: require('./Login/LoginComponent.vue')
    },
  ],
  mode: 'history'
})
