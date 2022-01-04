const display = document.getElementById("input");

// Increment and decrement quantity
const increment = document.querySelector(".add");
const decrement = document.querySelector(".ren");

// price and total calc
const price = document.querySelector(".price");
const total = document.querySelector(".total");

window.addEventListener("load", () => {
  price.innerHTML = NumberFormat(price.innerHTML);
  total.innerHTML = price.innerHTML;
});

increment.addEventListener("click", (event) => {
  event.preventDefault();

  if (Number(display.value) > 0 && Number(display.value) < 10) {
    display.value = Number(display.value) + 1;
  }
});

decrement.addEventListener("click", (event) => {
  event.preventDefault();

  if (Number(display.value) > 1) {
    display.value = Number(display.value) - 1;
  }
});

function NumberFormat($value) {
  return new Intl.NumberFormat("de-DE", {
    style: "currency",
    currency: "AOA",
  }).format($value);
}
