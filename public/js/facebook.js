// This is called with the results from from FB.getLoginStatus().
function memeStatusChangeCallback(response) {
  console.log('statusChangeCallback');
  console.log(response);
  // The response object is returned with a status field that lets the
  // app know the current login status of the person.
  // Full docs on the response object can be found in the documentation
  // for FB.getLoginStatus().
  if (response.status === 'connected') {
    // Update the hidden input form fields and submit
    submitMeme();
  } else {
    // The person is logged into Facebook, but not your app.
    FB.login(function(response){
      if (response.status === 'connected') {
        updateAndSubmit();
      } else if (response.status === 'not_authorized') {
        document.getElementById('status').innerHTML = 'You must log in to use this app.';
        document.getElementById('status').className = 'alert alert-danger';
      } else {
        document.getElementById('status').innerHTML = 'You must log in with Facebook to use this app.';
        document.getElementById('status').className = 'alert alert-danger';
      } 
    }, {scope: 'public_profile, email'});
  }
}

// This is called with the results from from FB.getLoginStatus().
function loginStatusChangeCallback(response) {
  console.log('statusChangeCallback');
  console.log(response);
  // The response object is returned with a status field that lets the
  // app know the current login status of the person.
  // Full docs on the response object can be found in the documentation
  // for FB.getLoginStatus().
  if (response.status === 'connected') {
    submitForm();
  } else {
    // The person is logged into Facebook, but not your app.
    FB.login(function(response){
      if (response.status === 'connected') {
        submitForm();
      } else {
        location.reload();
      } 
    }, {scope: 'public_profile, email'});
  }
}

window.fbAsyncInit = function() {
FB.init({
  appId      : '436270626522542',
  cookie     : true,  // enable cookies to allow the server to access 
                      // the session
  xfbml      : true,  // parse social plugins on this page
  version    : 'v2.2' // use version 2.2
});

// Now that we've initialized the JavaScript SDK, we call 
// FB.getLoginStatus().  This function gets the state of the
// person visiting this page and can return one of three states to
// the callback you provide.  They can be:
//
// 1. Logged into your app ('connected')
// 2. Logged into Facebook, but not your app ('not_authorized')
// 3. Not logged into Facebook and can't tell if they are logged into
//    your app or not.
//
// These three cases are handled in the callback function.

$('#submit-form').click(function() {
  FB.getLoginStatus(function(response) {
    memeStatusChangeCallback(response);
  }, {scope: 'email,user_likes'});
});

$('#login_btn').click(function() {
  FB.getLoginStatus(function(response) {
    loginStatusChangeCallback(response);
  }, {scope: 'email,user_likes'});
});



};

// Load the SDK asynchronously
(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));

// Get facebook identificaton, update meme input fields and submit
function submitMeme() {
  console.log('Welcome!  Fetching your information.... ');
  FB.api('/me', function(response) {
    console.log(response);
    document.getElementById('name').value = response.name;
    document.getElementById('email').value = response.email;
    document.getElementById('facebook_id').value = response.id;
    var canvas = document.getElementById('canvas');
    var url = canvas.toDataURL('image/jpeg');
    $('#imagedata').val(url);
    document.getElementById("customize-form").submit();
  });
}

// Get facebook identificaton, update meme input fields and submit
function submitForm() {
  console.log('Welcome!  Fetching your information.... ');
  FB.api('/me', function(response) {
    console.log(response);
    document.getElementById('name').value = response.name;
    document.getElementById('email').value = response.email;
    document.getElementById('facebook_id').value = response.id;
    document.getElementById("facebook_login").submit();
  });
}