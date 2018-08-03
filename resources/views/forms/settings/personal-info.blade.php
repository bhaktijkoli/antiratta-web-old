<div class="card">
  <div class="card-body">
    <form id="form_personal-info">
      <h5>Basic Information</h5>
      <hr />
      <div class="row">
        <div class="col-sm-12">
          <div class="form-group">
            <input type="text" class="form-control" id="firstname" name="firstname" placeholder="First Name" value="{{$user->firstname}}">
            <p class="help-block"></p>
          </div>
        </div>
        <div class="col-sm-12">
          <div class="form-group">
            <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Last Name" value="{{$user->lastname}}">
            <p class="help-block"></p>
          </div>
        </div>
      </div>
      <h5>University Information</h5>
      <hr />
      <div class="row">
        <div class="col-sm-12">
          <div class="form-group">
            <select class="form-control" id="university" name="university">
              @php
                $no = 0;
              @endphp
              @foreach (App\University::getNames() as $university)
                <option value="{{$no++}}">{{$university}}</option>
              @endforeach
            </select>
            <p class="help-block"></p>
          </div>
        </div>
        <div class="col-sm-12">
          <div class="form-group">
            <select class="form-control" id="branch" name="branch">
              <option value="0">None</option>
              @foreach (App\Branch::all() as $branch)
                <option value="{{$branch->id}}">{{$branch->name}}</option>
              @endforeach
            </select>
            <p class="help-block"></p>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="form-group">
            <button type="submit" name="login" class="btn btn-info btn-block">Save</button>
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
