// Toggling the navbar on small screen

const navToggle = () => {
    let menuIcon = document.querySelector(".nav-icon");
    let sidebar = document.querySelector(".sidebar");

    menuIcon.addEventListener("click", () => {
        sidebar.classList.toggle("showSidebar");
    })

}

navToggle();