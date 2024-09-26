let timer1, timer2;
toast = document.querySelector(".toast");
console.log(toast);
if (toast != null) {
  let progress = document.querySelector(".progress");
  let BeforePro = document.querySelector(".progress", "::before");
  let check = document.querySelector(".check");
  let color = document.querySelector(".colortext").textContent;
  toast.classList.add("active");
  progress.classList.add("active");
  check.style.backgroundColor = color;
  BeforePro.style.backgroundColor = color;
  timer1 = setTimeout(() => {
    toast.classList.remove("active");
  }, 3000); //1s = 1000 milliseconds

  timer2 = setTimeout(() => {
    progress.classList.remove("active");
  }, 3000);
}
