const reader = new FileReader();
const fileInput = document.querySelector("#foto");
const image = document.querySelector("#image");

reader.onload = (e) => {
  image.src = e.target.result;
};

fileInput.addEventListener("change", (event) => {
  const f = event.target.files[0];
  reader.readAsDataURL(f);
});
