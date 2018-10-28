<template>
  <div ref="item" class="cart-item">
    <div class="row">
      <div class="col-sm-2">
        <img src="/images/course.jpg" width="100" height="80"/>
      </div>
      <div class="col-sm-7">
        <h3 class="cart-item-title">{{course.name}}</h3>
        <span class="cart-item-subtitle">&bull;&nbsp;{{course.university.name}}&nbsp;&bull;&nbsp;{{course.branch.name}}&nbsp;&bull;&nbsp;{{course.sem}}</span>
      </div>
      <div class="col-sm-2">
        <span class="cart-item-price">&#x20B9; {{course.price_format}}&nbsp;<i class="fa fa-tag" aria-hidden="true"></i></span>
        <button class="btn btn-sm btn-danger" @click="onClickRemove(course.id)"><i class="fa fa-trash" aria-hidden="true"></i></button>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  components: {
  },
  methods: {
    onClickRemove: function(course) {
      axios.post(route.api('/cart/remove'),{course})
      .then(res=> {
        $(this.$refs.item).hide(100);
        $(this.$refs.item).remove();
        this.$store.dispatch('getcart');
      })
    }
  },
  props: ['course']
}
</script>

<style media="screen">
.cart-item {
  width: 100%;
  min-height: 100px;
  padding: 10px;
  margin-bottom: 10px;
  border: 1px solid #dcdada;
}
.cart-item-title {
  font-weight: 500;
  margin-top: 0px;
  margin-bottom: 0px;
}
.cart-item-subtitle {
}
.cart-item-price {
  font-weight: 600;
}
</style>
