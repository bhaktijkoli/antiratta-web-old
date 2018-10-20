window.fsh = {
  post: function(url, form, callback=null) {
    fh.hide_button();
    fh.remove_all_errros(form);
    axios.post(url, form.serialize()).then(res=>{
      let data = res.data;
      if(fh.is_success(data)) {
        fh.clear_all(form);
        if(typeof callback == 'function' ) callback(true, res.data);
      } else {
        fh.set_multierrors(data);
        if(typeof callback == 'function' ) callback(false, res.data);
      }
      fh.show_button();
    }).catch(res=>{
      show_errorpage(res);
    });
  }
}
