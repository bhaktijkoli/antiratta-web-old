<template>
  <div class="card">
    <div class="card-body">
      <form ref="password_form" @submit.prevent="onChangePassword">
        <h5>Change your password</h5>
        <hr />
        <div class="row">
          <div class="col-sm-12">
            <div class="form-group">
              <label for="new_email">New Password</label>
              <input type="password" class="form-control" id="new_password" name="new_password" placeholder="Enter your new password" v-model="new_password">
              <p class="help-block"></p>
            </div>
          </div>
          <div class="col-sm-12">
            <div class="form-group">
              <label for="new_email">Confirm New Password</label>
              <input type="password" class="form-control" id="new_password_confirmation" name="new_password_confirmation" placeholder="Confirm your new password" v-model="new_password_confirmation">
              <p class="help-block"></p>
            </div>
          </div>
          <div class="col-sm-3" v-show="new_password.length > 3">
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
  },
  data() {
    return {
      new_password: '',
      new_password_confirmation: '',
    }
  },
  methods: {
    onChangePassword: function() {
      fh.hide_button();
      fh.remove_all_errros(this.$refs.password_form);
      let data = {new_password:this.new_password, new_password_confirmation: this.new_password_confirmation};
      axios.post(route.api('/user/change/password'), data).then(res=>{
        let data = res.data;
        if(fh.is_success(data)) {
          modal.showModalDefault("Password changed", `Your password has been updated.`, 'Ok', ()=>{
            this.$router.push({name:'home'});
          })
        } else {
          fh.set_multierrors(data);
          fh.show_button();
        }
      }).catch(res=>fh.show_errorpage(res))
    }
  },
  props: ['auth']
}
</script>
