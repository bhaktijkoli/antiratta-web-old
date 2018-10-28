// Form Handler
window.fh = {
  set_success: function(element, message) {
    $(element).closest('.form-group').removeClass('has-error');
    $(element).closest('.form-group').addClass('has-success');
    $(element).closest('.form-group').find('.help-block').html(message);
  },
  set_multisuccess: function(data) {
    errors = data.messages;
    for(var key in errors) {
      this.set_success('#' + key, errors[key]);
    }
  },
  set_single_error: function(data) {
    $('#error-result').show(100);
    $('#error-result').html(data.messages);
  },
  set_error: function(element, error) {
    $(element).closest('.form-group').addClass('has-error');
    $(element).closest('.form-group').removeClass('has-success');
    $(element).closest('.form-group').find('.help-block').html(error);

  },

  remove_error: function(element) {
    $(element).closest('.form-group').removeClass('has-error');
    $(element).closest('.form-group').find('.help-block').html('');

  },

  remove_all_errros: function(element) {
    $(element).find('.form-group').removeClass('has-error');
    $(element).find('.form-group').find('.help-block').html('');
  },

  set_multierrors: function(data) {
    errors = data.messages;
    for(var key in errors) {
      this.set_error('#' + key, errors[key]);
    }
  },

  hide_element: function(element) {
    $(element).closest('.form-group').css("display", "none");
  },

  show_element: function(element) {
    $(element).closest('.form-group').css("display", "block");
  },

  is_success: function(data) {
    return data.success;
  },

  clear_all: function(element) {
    $(element).find("input, textarea").val("");
  },

  redirect: function(data) {
    window.location = data.redirect;
  },

  hide_button: function(){
    btn = $(document.activeElement);
    document.btntext = btn[0].innerHTML;
    btn[0].innerHTML = '<i class="fa fa-circle-o-notch fa-spin fa-fw"></i>';
    btn.prop('disabled', true);
    window.lastbutton = btn;
  },

  show_button: function() {
    var btn = window.lastbutton;
    btn[0].innerHTML = document.btntext;
    btn.prop('disabled', false);
  },

  show_errorpage: function(error) {
    if(error.response.status == 404) {
      document.title = "404 Page Not Found"
      $('#app').html(error404);
    }
    if(error.response.status == 500) {
      document.title = "An Error Occurred"
      $('#app').html(error500);
    }
  }
}

let error404 = `
<section id="error">
  <div class="backdrop-path"></div>
  <div class="container" style="margin-top:100px">
    <div class="col-sm-6 ml-auto mr-auto">
      <div class="card">
        <div class="card-body">
          <div class="text-center error-text">
            <i class="fa fa-frown-o fa-5x" aria-hidden="true"></i>
            <h1>404</h1>
            <h3>Page not found</h3>
            <p>
              The Page you are looking for doesn't exist or an other error occurred.
            </p>
            <a href="/" class="btn btn-info btn-wide"><i class="fa fa-home" aria-hidden="true"></i>&nbsp;&nbsp;Go home</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
`
let error500 = `
<section id="error">
  <div class="backdrop-path"></div>
  <div class="container" style="margin-top:100px">
    <div class="col-sm-6 ml-auto mr-auto">
      <div class="card">
        <div class="card-body">
          <div class="text-center error-text">
            <i class="fa fa-frown-o fa-5x" aria-hidden="true"></i>
            <h1>500</h1>
            <h3>There was an error</h3>
            <p>
            An error occurred and we're working to fix the problem!
            </p>
            <a href="/" class="btn btn-info btn-wide"><i class="fa fa-home" aria-hidden="true"></i>&nbsp;&nbsp;Go home</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
`
