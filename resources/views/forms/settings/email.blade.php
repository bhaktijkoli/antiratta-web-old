<div class="card">
  <div class="card-body">
    <form id="form_personal-info">
      <h5>Email</h5>
      <hr />
      <div class="row">
        <div class="col-sm-12">
          <div class="form-group">
            <input type="email" class="form-control" id="email" name="email" value="{{$user->email}}" disabled>
            <p class="help-block"></p>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="form-group">
            <button type="submit" name="login" class="btn btn-primary btn-block">Change</button>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>
