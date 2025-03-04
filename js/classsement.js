document.addEventListener("DOMContentLoaded", () => {
    // Données simulées des judokas
  
    const tableBody = document.querySelector("#classement-table tbody")
    const categorieSelect = document.getElementById("categorie")
    const sexeSelect = document.getElementById("sexe")
  
    function afficherClassement(judokasAfficher) {
      tableBody.innerHTML = ""
      judokasAfficher.forEach((judoka) => {
        const tr = document.createElement("tr")
        tr.innerHTML = `
                  <td>${judoka.rang}</td>
                  <td>${judoka.nom}</td>
                  <td>${judoka.categorie}</td>
                  <td>${judoka.points}</td>
                  <td>${judoka.victoires}</td>
                  <td>${judoka.defaites}</td>
              `
        tableBody.appendChild(tr)
      })
    }
  
    function filtrerClassement() {
      const categorieSelectionnee = categorieSelect.value
      const sexeSelectionne = sexeSelect.value
  
      const judokasFiltres = judokas.filter((judoka) => {
        return (
          (categorieSelectionnee === "all" || judoka.categorie === categorieSelectionnee) &&
          (sexeSelectionne === "all" || judoka.sexe === sexeSelectionne)
        )
      })
  
      afficherClassement(judokasFiltres)
    }
  
    categorieSelect.addEventListener("change", filtrerClassement)
    sexeSelect.addEventListener("change", filtrerClassement)
  
    // Afficher le classement initial
    afficherClassement(judokas)
  })
  
  