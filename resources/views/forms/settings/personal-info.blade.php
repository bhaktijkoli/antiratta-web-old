<div class="card">
  <div class="card-body">
    <form id="form_personal-info">
      <h5>Basic Information</h5>
      <hr />
      <div class="row">
        <div class="col-sm-12">
          <div class="form-group">
            <input type="text" class="form-control" id="signup_firstname" name="signup_firstname" placeholder="First Name" value="{{$user->firstname}}">
            <p class="help-block"></p>
          </div>
        </div>
        <div class="col-sm-12">
          <div class="form-group">
            <input type="text" class="form-control" id="signup_lastname" name="signup_lastname" placeholder="Last Name" value="{{$user->lastname}}">
            <p class="help-block"></p>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="form-group">
            <button type="submit" name="login" class="btn btn-primary btn-block">Save</button>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="form-group">
            <button type="submit" name="login" class="btn btn-default btn-block">Cancel</button>
          </div>
        </div>
      </div>
    </form>

  </div>
</div>
