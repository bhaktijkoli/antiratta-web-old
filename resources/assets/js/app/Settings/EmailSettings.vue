<template>
  <div class="card">
    <div class="card-body">
      <form ref="email_form" @submit.prevent="onChangeEmail">
        <h5>Email</h5>
        <hr />
        <div class="row">
          <div class="col-sm-12">
            <div class="form-group">
              <label>Email</label>
              <input type="email" class="form-control" v-model="email" disabled>
              <p class="help-block"></p>
            </div>
          </div>
          <div class="col-sm-12">
            <div class="form-group">
              <label for="new_email">New Email</label>
              <input type="email" class="form-control" id="new_email" name="new_email" placeholder="Enter your new email here" v-model="new_email">
              <p class="help-block"></p>
            </div>
          </div>
          <div class="col-sm-3" v-show="new_email.length > 3">
            <div class="form-group">
              <button type="submit" class="btn btn-primary btn-block">Change</button>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</template>

<script>
export default {
  mounted() {
    if(this.auth) {
      this.email = this.auth.email;
    }
  },
  data() {
    return {
      email: '',
      new_email: '',
    }
  },
  methods: {
    onChangeEmail: function() {
      fh.hide_button();
      fh.remove_all_errros(this.$refs.email_form);
      let data = {new_email:this.new_email};
      axios.post(route.api('/user/change/email'), data).then(res=>{
        let data = res.data;
        if(fh.is_success(data)) {
          
        } else {
          fh.set_multierrors(data);
          fh.show_button();
        }
      }).catch(res=>fh.show_errorpage(res))
    }
  },
  watch: {
    auth(auth) {
      if(auth) {
        this.email = auth.email;
      }
    }
  },
  props: ['auth']
}
</script>
