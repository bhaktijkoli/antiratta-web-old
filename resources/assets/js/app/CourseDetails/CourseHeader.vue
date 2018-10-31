<template>
  <section id="course-header">
    <div :class="'path-backdrop ' + color"></div>
    <img class="path-backdrop-image" src="/images/course.jpg"/>
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <h1 class="course-title">{{name}}</h1>
          <span class="course-subtitle">&bull;&nbsp;{{university}}&nbsp;&bull;&nbsp;{{branch}}&nbsp;&bull;&nbsp;{{sem}}</span>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-12">
          <div id="rating"></div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-12">
          <div class="course-hours">
            <span><i class="fa fa-clock-o" aria-hidden="true"></i>&nbsp;34 hours</span>
            <span><i class="fa fa-user-o" aria-hidden="true"></i>&nbsp;512 Students enrolled</span>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-12">
          <div class="course-price">
            <span>&#x20B9; {{price}}</span>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-12">
          <a ref="addToCart" class="btn btn-primary" @click="onAddToCart()">Buy Now</a>
          <router-link v-if="isInCart" class="btn btn-primary" :to="{name: 'cart'}">View cart</router-link>
          <router-link v-else-if="enrolled" class="btn btn-primary" :to="{name: 'continue'}">Continue Learning</router-link>
          <button v-else ref="addToCart" class="btn btn-primary" @click="onAddToCart()">Add to cart</button>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
export default {
  mounted() {
    this.$root.$on('course-loaded', ()=>{
      $('#rating').starRating({
        initialRating: 2,
        strokeColor: '#894A00',
        strokeWidth: 0,
        starSize: 25,
        readOnly: true,
      });
    });
  },
  methods: {
    onAddToCart: function() {
      axios.post(route.api('/cart/add'),{course:this.course.id})
      .then(res=> {
        this.$store.dispatch('getcart');
      }).catch(res=>fh.show_errorpage(res))
    }
  },
  props: ['course'],
  computed: {
    name() {
      if(this.course == null) return "";
      return this.course.name
    },
    university() {
      if(this.course == null) return "";
      return this.course.university.name
    },
    branch() {
      if(this.course == null) return "";
      return this.course.branch.name
    },
    sem() {
      if(this.course == null) return "";
      return "Semester " + this.course.sem;
    },
    price() {
      if(this.course == null) return "";
      return this.course.price_format;
    },
    color() {
      if(this.course == null) return "";
      return this.course.color;
    },
    enrolled() {
      if(this.course == null) return 0;
      return this.course.enrolled;
    },
    isInCart() {
      if(this.course == null) return false;
      if(this.$store.state.cart.includes(this.course.id)) return true;
      return false;
    }
  }
}
</script>
