document.addEventListener("DOMContentLoaded", cargar);
let mensajeError1;

function cargar() {
  mensajeError1 = document.getElementById("mensajeErrorLogin");
  let modalHidden = document.querySelector(".modal.modalHidden");
  let modalClose = document.querySelector(".modal .icon-close");
  const wrapper = document.querySelector(".wrapper");
  let botonAceptar = document.querySelector(".botonAceptar");

  modalClose.addEventListener("click", () => {
    modalHidden.classList.add("modalHidden");

    wrapper.classList.add("active-popup");
    wrapper.classList.add("active");
  });
  botonAceptar.addEventListener("click", () => {
    modalHidden.classList.add("modalHidden");

    wrapper.classList.add("active-popup");
    wrapper.classList.add("active");
  });

  const loginLink = document.querySelector(".login-link");
  const registerLink = document.querySelector(".register-link");
  const btnPopup = document.querySelector(".btnLogin-popup");
  const iconClose = document.querySelector(".icon-close");

  registerLink.addEventListener("click", () => {
    wrapper.classList.add("active");
    mensajeError1.innerHTML = "";
  });

  loginLink.addEventListener("click", () => {
    wrapper.classList.remove("active");
  });

  btnPopup.addEventListener("click", () => {
    wrapper.classList.add("active-popup");
  });

  iconClose.addEventListener("click", () => {
    wrapper.classList.remove("active-popup");
  });

  // Obtener el mensaje de error de la URL
  const urlParams = new URLSearchParams(window.location.search);
  const mensajeErrorLogin = urlParams.get("mensajeErrorLogin");
  const mensajeErrorRegistro = urlParams.get("mensajeErrorRegistro");

  // Establecer el mensaje de error del login si existe
  if (mensajeErrorLogin) {
    mensajeError1.innerHTML = mensajeErrorLogin;
  } else {
    console.log(mensajeErrorLogin);
  }

  // Establecer el mensaje de error del registro si existe (ya existe el usuario a)
  if (mensajeErrorRegistro) {
    wrapper.classList.remove("active-popup");

    setTimeout(function () {
      modalHidden.classList.remove("modalHidden");
    }, 500);
  } else {
    console.log(mensajeErrorRegistro);
  }
}
