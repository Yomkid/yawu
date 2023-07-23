
// Toggling the navbar on small screen

const navToggle = () =>{
    let menuIcon = document.querySelector(".menu-icon");
    let navLinks = document.querySelector(".nav-links");

    menuIcon.addEventListener("click", () => {
        navLinks.classList.toggle("showNav");
    })
}

navToggle();