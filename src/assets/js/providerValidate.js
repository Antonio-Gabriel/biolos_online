alert("oi");

const form = document.querySelector(".needs-validation");

// Contact
const contactValidate = document.querySelector("#contact-validate input");
const contacValidateError = document.querySelector(
  "#contact-validate .invalid-feedback"
);

// Password
const passwordValidate = document.querySelector("#pass-validate input");
const conformPasswordValidate = document.querySelector(
  "#confirm-validate input"
);
const passValidateError = document.querySelector(
  "#pass-validate .invalid-feedback"
);
const passValidateError = document.querySelector(
  "#confirm-validate .invalid-feedback"
);

// Expretions
const contactRegEx = /^(?:(\+244|00244))?(9)(1|2|3|4|9)([\d]{7,7})$/;
const passwordRegEx =
  /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;

const emailRegEx =
  /^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/;

form.addEventListener("submit", function () {
  alert("oi");
  return false;
});

//   function validateProviderForm() {
//     if (!contactRegEx.exec(contactValidate.value) || !contactValidate.value) {
//       contacValidateError.style.display = "block";

//       return false;
//     }

//     // if (!passwordValidate.value || !conformPasswordValidate.value) {
//     //   passValidateError.style.display = "block";

//     //   return false;
//     // }

//     // if (passwordValidate.value !== conformPasswordValidate.value) {
//     //   passValidateError.style.display = "block";
//     //   passValidateError.innerHTML = "Password diferente";

//     //   return false;
//     // }
//   }
