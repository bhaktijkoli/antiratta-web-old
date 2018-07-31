$( "#form_signup" ).on( "submit", ( event ) => {
  event.preventDefault();
  fh.hide_button();
  fh.remove_all_errros('#form_signup');
  axios.post('/api/user/signup', $('#form_signup').serialize()).then(res=>{
    let data = res.data;
    if(fh.is_success(data)) {
      fh.redirect(data);
    } else {
      fh.set_multierrors(data);
      fh.show_button();
    }
  }).catch(res=>{

  })
});

$('#form_login').on("submit", event => {
  event.preventDefault();
  fh.hide_button();
  $('#login_error').hide(100);
  axios.post('/api/user/login', $('#form_login').serialize()).then(res=>{
    window.location = "/authenticate";
  }).catch(res=>{
    let data = res.response.data;
    if(data.errors.email) {
      $('#login_error').html(data.errors.email)
    }
    fh.show_button();
    $("#login_error").show(100);
  })
})
