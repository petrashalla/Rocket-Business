// Slider
const swiper = new Swiper(".swiper", {
    pagination: {
      el: ".swiper-pagination",
      type: "fraction",
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
  });


// Mobile version menu
const menuBtn = document.querySelector('.menu__btn')
const menu = document.querySelector('.menu__list')

menuBtn.addEventListener('click', () => {
  menu.classList.toggle('menu__list--active');
  document.body.classList.toggle('no-scroll'); 
})

menuBtn.addEventListener('click', () => {
  menuBtn.classList.toggle('open');
})


// Pop-up form for sending an email
  document.querySelectorAll(".btn-open-popup").forEach(el => {
    el.addEventListener("click", ()=>{document.getElementById('popupOverlay').classList.toggle('show')})
})


// Send an email message
async function send() {
  let data = {
    name: document.getElementById("name").value,
    email: document.getElementById("email").value
  }

  let response = await fetch("./html/index.php", {
    method: "POST",
    body: JSON.stringify(data),
    headers: {
      "Content-Type": "application/json; charset=UTF-8"
    }
  })

  let result = await response.text()
  alert(result)
}