document.addEventListener("DOMContentLoaded", () => {
    const classementForm = document.getElementById("classement-form")
    const classementTable = document.getElementById("classement-table").getElementsByTagName("tbody")[0]
    const classement = []
  
    classementForm.addEventListener("submit", (e) => {
      e.preventDefault()
      const categorie = document.getElementById("categorie").value
      const nom = document.getElementById("nom").value
      const points = document.getElementById("points").value
      const rang = document.getElementById("rang").value
  
      const newEntry = { categorie, nom, points, rang }
      classement.push(newEntry)
      updateClassementTable()
      classementForm.reset()
    })
  
    function updateClassementTable() {
      classementTable.innerHTML = ""
      classement.forEach((entry, index) => {
        const row = classementTable.insertRow()
        row.innerHTML = `
                  <td>${entry.categorie}</td>
                  <td>${entry.rang}</td>
                  <td>${entry.nom}</td>
                  <td>${entry.points}</td>
                  <td>
                      <button class="btn-edit" onclick="editClassement(${index})">Modifier</button>
                      <button class="btn-delete" onclick="deleteClassement(${index})">Supprimer</button>
                  </td>
              `
      })
    }
  
    window.editClassement = (index) => {
      const entry = classement[index]
      document.getElementById("categorie").value = entry.categorie
      document.getElementById("nom").value = entry.nom
      document.getElementById("points").value = entry.points
      document.getElementById("rang").value = entry.rang
      classement.splice(index, 1)
      updateClassementTable()
    }
  
    window.deleteClassement = (index) => {
      if (confirm("Êtes-vous sûr de vouloir supprimer cette entrée ?")) {
        classement.splice(index, 1)
        updateClassementTable()
      }
    }
  })
  
  