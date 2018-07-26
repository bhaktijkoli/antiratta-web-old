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
    }
    fh.show_button();
  }).catch(res=>{
    
  })
});
