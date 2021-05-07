function dd_intialize() {
    // Whatever instruction you want to run instantly after the page loads goes here
    console.log("This page is now active");
}

// Every other instructions, variables, functions that will run later goes below
console.log("hello");
var button = document.querySelector("#button");
button.addEventListener("click", e => {
  document.querySelector(".element").classList.toggle("flip-scale-down-diag-2")
})