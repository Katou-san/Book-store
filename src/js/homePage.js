document.getElementById("Next").onclick = function () {
  let lists = document.querySelectorAll(".ItemBookS");
  document.querySelector(".slider").appendChild(lists[0]);
};

document.getElementById("Prev").onclick = function () {
  let lists = document.querySelectorAll(".ItemBookS");
  document.querySelector(".slider").prepend(lists[lists.length - 1]);
};

function showFormCart() {
  const Formcart = document.querySelector(".cartForm");
  Formcart.classList.toggle("showCart");
}
