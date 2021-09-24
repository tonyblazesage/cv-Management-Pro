$("#password").password('toggle');
function myFunction() {
  var x = document.getElementById("password");
  var y = document.getElementById("pwdi");
  if (x.type === "password") {
    x.type = "text";
    y.className = "fa fa-eye";
  } else {
    x.type = "password";
    y.className = "fa fa-eye-slash";
  }
}


if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}

$("#testButton").click(function() {
  $("#buyerForm").clone().appendTo("#wrapper");
});



(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Get the forms we want to add validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
