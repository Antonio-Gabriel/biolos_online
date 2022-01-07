"use strict";

var forms = document.getElementsByClassName("needs-validation");

const password = document.querySelector("input[name='password']");
const isVilible = document.getElementById("visibility");

// Loop over them and prevent submission
var validation = Array.prototype.filter.call(forms, function (form) {
  form.addEventListener(
    "submit",
    function (event) {
      if (form.checkValidity() === false) {
        event.preventDefault();
        event.stopPropagation();
      }
      form.classList.add("was-validated");
    },
    false
  );
});

isVilible.addEventListener("click", () => {
  if (isVilible.checked) {
    password.type = "text";
  } else {
    password.type = "password";
  }
});
