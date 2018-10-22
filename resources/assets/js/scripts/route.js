window.route = {
  api: function(url) {
    if(url.startsWith('/')) {
      return '/api'+url;
    }
    return '/api/'+url;
  },
  site: function(url) {
    if(url.startsWith('/')) {
      return window.location.origin + url;
    }
    return window.location.origin + url;
  },
  admin: function(url) {
    return '/admin/'+url;
  }
}
