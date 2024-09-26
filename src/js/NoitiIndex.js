function showN() {
  toast = document.querySelector(".toast");
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

function setMessenger(color, title, message) {
  document.querySelector(".colortext").innerHTML = color;
  document.querySelector(".text-1").innerHTML = title;
  document.querySelector(".text-2").innerHTML = message;
  showN();
}

function AddCart(masach) {
  var check = document.querySelector("#check").value;

  if (check == 1) {
    $.ajax({
      type: "GET",
      url: "../Controller/CartHandle.php?IdBook=" + masach,
      success: function (kq) {
        let count = document.querySelector(".countCart");
        count.innerHTML = Number(count.textContent.trim()) + 1;
        setMessenger("green", "success", " Đã thêm sách ");
      },
    });
  } else {
    setMessenger("red", "Failed", "Cần phải đăng nhập");
  }
}
