<template>
  <form id="form_login" @submit="onSubmit">
    <h3>Sign in to your account</h3>
    <p>Your student account is your portal to all things your classroom, projects, forums, career resources, and more!</p>
    <div id="login_error" class="alert alert-danger alert-dismissible" style="display:none">
      The email address or password you entered is invalid.
    </div>
    <div class="form-group">
      <input type="text" class="form-control" id="email" name="email" placeholder="Email Address">
    </div>
    <div class="form-group">
      <input type="password" class="form-control" id="password" name="password" placeholder="Password">
    </div>
    <p>By clicking Sign In, you agree to our <a href="#">Terms of Use</a> and our <a href="">Privacy Policy.</a></p>
    <div class="form-group">
      <button type="submit" name="login" class="btn btn-primary btn-block">SIGN IN</button>
    </div>
    <div class="form-group">
      <a href="#" class="btn btn-link btn-block">Forgot your password?</a>
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
      $('#login_error').hide(100);
      var data = {
        email: $('#email').val(),
        password: $('#password').val()
      }
      axios.post('/api/user/login',data).then(res=>{
        window.location = "/authenticate";
      }).catch(res=>{
        let data = res.response.data;
        if(data.errors.email) {
          $('#login_error').html(data.errors.email)
        }
        fh.show_button();
        $("#login_error").show(100);
      })
    }
  }
}
</script>
