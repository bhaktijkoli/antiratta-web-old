<template>
  <form id="form_signup" @submit="onSubmit">
  <h3>Create your student account</h3>
  <p>Your student account is your portal to all things your classroom, projects, forums, career resources, and more!</p>
    <div class="row">
      <div class="col-sm-6">
        <div class="form-group">
          <input type="text" class="form-control" id="signup_firstname" name="signup_firstname" placeholder="First Name">
          <p class="help-block"></p>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="form-group">
          <input type="text" class="form-control" id="signup_lastname" name="signup_lastname" placeholder="Last Name">
          <p class="help-block"></p>
        </div>
      </div>
      <div class="col-sm-12">
        <div class="form-group">
          <input type="email" class="form-control" id="signup_email" name="signup_email" placeholder="Email Address">
          <p class="help-block"></p>
        </div>
      </div>
      <div class="col-sm-12">
        <div class="form-group">
          <input type="password" class="form-control" id="signup_password" name="signup_password" placeholder="Password">
          <p class="help-block"></p>
        </div>
      </div>
      <div class="col-sm-12">
        <p>By clicking Sign Up, you agree to our <a href="#">Terms of Use</a> and our <a href="#">Privacy Policy.</a></p>
        <div class="form-group">
          <button type="submit" name="login" class="btn btn-primary btn-block">SIGN UP</button>
        </div>
      </div>
    </div>
    <hr class="hr-text" data-content="OR">
    <div class="text-center">
      <a href="/login/facebook" class="btn btn-fab btn-round btn-facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a>
      <a href="/login/google" class="btn btn-fab btn-round btn-google"><i class="fa fa-google" aria-hidden="true"></i></a>
      <a href="/login/twitter" class="btn btn-fab btn-round btn-twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a>
    </div>
  </form>

</template>

<script>
export default {
  methods: {
    onSubmit: function(e) {
      e.preventDefault();
      fh.hide_button();
      fh.remove_all_errros('#form_signup');
      var data = {
        signup_firstname: $('#signup_firstname').val(),
        signup_lastname: $('#signup_lastname').val(),
        signup_email: $('#signup_email').val(),
        signup_password: $('#signup_password').val(),
      }
      axios.post('/api/user/signup', data).then(res=>{
        let data = res.data;
        if(fh.is_success(data)) {
          fh.redirect(data);
        } else {
          fh.set_multierrors(data);
          fh.show_button();
        }
      }).catch(res=>fh.show_errorpage(res))
    }
  }
}
</script>
