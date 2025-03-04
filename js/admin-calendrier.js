document.addEventListener("DOMContentLoaded", () => {
    const calendrierForm = document.getElementById("calendrier-form")
    const calendrierTable = document.getElementById("calendrier-table").getElementsByTagName("tbody")[0]
    const evenements = []
  
    calendrierForm.addEventListener("submit", (e) => {
      e.preventDefault()
      const tournoi = document.getElementById("tournoi").value
      const date = document.getElementById("date").value
      const lieu = document.getElementById("lieu").value
      const description = document.getElementById("description").value
  
      const newEvenement = { tournoi, date, lieu, description }
      evenements.push(newEvenement)
      updateCalendrierTable()
      calendrierForm.reset()
    })
  
    function updateCalendrierTable() {
      calendrierTable.innerHTML = ""
      evenements.forEach((evenement, index) => {
        const row = calendrierTable.insertRow()
        row.innerHTML = `
                  <td>${evenement.tournoi}</td>
                  <td>${evenement.date}</td>
                  <td>${evenement.lieu}</td>
                  <td>${evenement.description}</td>
                  <td>
                      <button class="btn-edit" onclick="editEvenement(${index})">Modifier</button>
                      <button class="btn-delete" onclick="deleteEvenement(${index})">Supprimer</button>
                  </td>
              `
      })
    }
  
    window.editEvenement = (index) => {
      const evenement = evenements[index]
      document.getElementById("tournoi").value = evenement.tournoi
      document.getElementById("date").value = evenement.date
      document.getElementById("lieu").value = evenement.lieu
      document.getElementById("description").value = evenement.description
      evenements.splice(index, 1)
      updateCalendrierTable()
    }
  
    window.deleteEvenement = (index) => {
      if (confirm("Êtes-vous sûr de vouloir supprimer cet événement ?")) {
        evenements.splice(index, 1)
        updateCalendrierTable()
      }
    }
  })
  
  