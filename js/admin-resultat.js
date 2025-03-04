document.addEventListener("DOMContentLoaded", () => {
    const resultatForm = document.getElementById("resultat-form")
    const resultatsTable = document.getElementById("resultats-table").getElementsByTagName("tbody")[0]
    const resultats = []
  
    resultatForm.addEventListener("submit", (e) => {
      e.preventDefault()
      const tournoi = document.getElementById("tournoi").value
      const categorie = document.getElementById("categorie").value
      const phase = document.getElementById("phase").value
      const judoka1 = document.getElementById("judoka1").value
      const judoka2 = document.getElementById("judoka2").value
      const score = document.getElementById("score").value
      const gagnant = document.getElementById("gagnant").value
  
      const newResultat = { tournoi, categorie, phase, judoka1, judoka2, score, gagnant }
      resultats.push(newResultat)
      updateResultatsTable()
      resultatForm.reset()
    })
  
    function updateResultatsTable() {
      resultatsTable.innerHTML = ""
      resultats.forEach((resultat, index) => {
        const row = resultatsTable.insertRow()
        row.innerHTML = `
                  <td>${resultat.tournoi}</td>
                  <td>${resultat.categorie}</td>
                  <td>${resultat.phase}</td>
                  <td>${resultat.judoka1}</td>
                  <td>${resultat.judoka2}</td>
                  <td>${resultat.score}</td>
                  <td>${resultat.gagnant}</td>
                  <td>
                      <button class="btn-edit" onclick="editResultat(${index})">Modifier</button>
                      <button class="btn-delete" onclick="deleteResultat(${index})">Supprimer</button>
                  </td>
              `
      })
    }
  
    window.editResultat = (index) => {
      const resultat = resultats[index]
      document.getElementById("tournoi").value = resultat.tournoi
      document.getElementById("categorie").value = resultat.categorie
      document.getElementById("phase").value = resultat.phase
      document.getElementById("judoka1").value = resultat.judoka1
      document.getElementById("judoka2").value = resultat.judoka2
      document.getElementById("score").value = resultat.score
      document.getElementById("gagnant").value = resultat.gagnant
      resultats.splice(index, 1)
      updateResultatsTable()
    }
  
    window.deleteResultat = (index) => {
      if (confirm("Êtes-vous sûr de vouloir supprimer ce résultat ?")) {
        resultats.splice(index, 1)
        updateResultatsTable()
      }
    }
  })
  
  