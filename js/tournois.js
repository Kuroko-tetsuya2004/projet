document.addEventListener("DOMContentLoaded", () => {
    // Données simulées des tournois
    const tournois = [
      { id: 4, nom: "Grand Slam de Judo", date: "2025-09-05", lieu: "Rio de Janeiro, Brésil" }, 
    ]
  
    const tournoisList = document.getElementById("tournois-list")
  
    // Fonction pour afficher les tournois
    function afficherTournois() {
      tournoisList.innerHTML = ""
      tournois.forEach((tournoi) => {
        const tournoisElement = document.createElement("div")
        tournoisElement.className = "tournoi-card"
        tournoisElement.innerHTML = `
                  <h2>${tournoi.nom}</h2>
                  <p class="date">Date: ${tournoi.date}</p>
                  <p class="lieu">Lieu: ${tournoi.lieu}</p>
                  <a href="tournoi-details.html?id=${tournoi.id}" class="btn btn-primary">Voir les détails</a>
              `
        tournoisList.appendChild(tournoisElement)
      })
    }
  
    // Appel de la fonction pour afficher les tournois
    afficherTournois()
  })
  
  