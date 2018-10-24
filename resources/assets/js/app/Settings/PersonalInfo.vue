<template>
  <div class="card">
    <div class="card-body">
      <form id="form_personal-info">
        <h5>Basic Information</h5>
        <hr />
        <div class="row">
          <div class="col-sm-12">
            <div class="form-group">
              <input type="text" class="form-control" id="firstname" name="firstname" placeholder="First Name" v-model="firstname">
              <p class="help-block"></p>
            </div>
          </div>
          <div class="col-sm-12">
            <div class="form-group">
              <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Last Name" v-model="lastname">
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
                <option v-for="(u, key) in universities" :value="key+1">{{u.name}}</option>
              </select>
              <p class="help-block"></p>
            </div>
          </div>
          <div class="col-sm-12">
            <div class="form-group">
              <select class="form-control" id="branch" name="branch">
                <option value="0">None</option>
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
</template>

<script>
export default {
  mounted() {
    if(this.auth) {
      this.firstname = this.auth.firstname;
      this.lastname = this.auth.lastname;
    }
    axios.get(route.api('/universities/get')).then(res=>{
      this.universities = res.data;
    })
  },
  data() {
    return {
      firstname: '',
      lastname: '',
      university: 0,
      universities: [],
    }
  },
  methods: {
  },
  watch: {
    auth(auth) {
      if(auth) {
        this.firstname = auth.firstname;
        this.lastname = auth.lastname;
      }
    }
  },
  props: ['auth']
}
</script>
