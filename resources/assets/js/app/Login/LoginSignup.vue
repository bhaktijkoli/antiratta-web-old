<template>
  <section>
    <div class="container">
      <div class="row">
        <div class="col-sm-6 ml-auto mr-auto">
          <div class="card card-nav-tabs">
            <div class="card-header card-header-primary">
              <div class="nav-tabs-navigation">
                <div class="nav-tabs-wrapper">
                  <ul class="nav nav-tabs nav-fill" data-tabs="tabs">
                    <li class="nav-item">
                      <a class="nav-link active" href="#signin" data-toggle="tab">Sign In</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#signup" data-toggle="tab">Sign Up</a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="card-body">
              <div class="tab-content">
                <div class="tab-pane active" id="signin">
                  <LoginForm/>
                </div>
                <div class="tab-pane" id="signup">
                  <SignupForm/>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
import LoginForm from './LoginForm';
import SignupForm from './SignupForm';
export default {
  components: {
    LoginForm,
    SignupForm
  },
  mounted() {
  }
}
</script>
