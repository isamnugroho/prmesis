// Once all content has been loaded, the function check if there is at least 1 container with class 'progress' and at least 1 child with 'data-progress' attribute inside the container
window.onload = function () {
  if (
    document.querySelectorAll(".progress").length > 0 &&
    document.querySelectorAll(".progress [data-progress]").length > 0
  ) {
    // Get all elements with 'data-progress' attribute and run the 'AnimateProgress' funcion with each one
    document
      .querySelectorAll(".progress [data-progress]")
      .forEach((x) => AnimateProgress(x));
  }
};

function AnimateProgress(el) {
  // Get the element that came as parameter and add the class 'animated-progress' on it
  el.className = "animate-progress";
  // Set the attribute 'style' of this element with the custom attribute '--animate-progress' and the value of 'data-progress' as the width value
  el.setAttribute(
    "style",
    `--animate-progress:${el.getAttribute("data-progress")}%;`
  );
  // After this the CSS make its magic
}