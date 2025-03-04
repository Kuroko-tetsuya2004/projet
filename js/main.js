document.addEventListener("DOMContentLoaded", () => {
    // Gestion du menu mobile
    const navbarToggle = document.querySelector(".navbar-toggle")
    const navbarMenu = document.querySelector(".navbar-menu")
  
    if (navbarToggle && navbarMenu) {
      navbarToggle.addEventListener("click", function () {
        navbarMenu.classList.toggle("active")
        this.setAttribute("aria-expanded", this.getAttribute("aria-expanded") === "true" ? "false" : "true")
      })
    }
  
    // Gestion du scroll smooth pour les ancres
    document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
      anchor.addEventListener("click", function (e) {
        e.preventDefault()
  
        document.querySelector(this.getAttribute("href")).scrollIntoView({
          behavior: "smooth",
        })
      })
    })
  
    // Ajout de la classe active au lien de navigation courant
    const currentLocation = location.href
    const menuItems = document.querySelectorAll(".navbar-menu a")
    const menuLength = menuItems.length
    for (let i = 0; i < menuLength; i++) {
      if (menuItems[i].href === currentLocation) {
        menuItems[i].classList.add("active")
      }
    }
  })
  
  