<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Classement - Tournois de Judo</title>
    <link rel="stylesheet" href="../css/classement.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <header>
        <nav>
            <a href="index.html" class="logo">
                <i class="fas fa-trophy"></i> Tournois de Judo
            </a>
            <ul class="navbar-menu">
                <li><a href="https://www.ijf.org/calendar?age=all">Classement</a></li>
                <li><a href="calendrier.html">Calendrier</a></li>
                <li><a href="resultat.html">Resultats</a></li>
                <li><a href="login.html" >Connexion</a></li>                   
            </ul>
        </nav>
    </header>

    <main>
        <h1>Classement des Judokas</h1>

        <div class="filters">
            <div class="filter-group">
                <label for="categorie">Catégorie :</label>
                <select id="categorie">
                    <option value="all">Toutes</option>
                    <option value="-60kg">-60kg</option>
                    <option value="-66kg">-66kg</option>
                    <option value="-73kg">-73kg</option>
                    <option value="-81kg">-81kg</option>
                    <option value="-90kg">-90kg</option>
                    <option value="-100kg">-100kg</option>
                    <option value="+100kg">+100kg</option>
                </select>
            </div>
            <div class="filter-group">
                <label for="sexe">Sexe :</label>
                <select id="sexe">
                    <option value="all">Tous</option>
                    <option value="homme">Homme</option>
                    <option value="femme">Femme</option>
                </select>
            </div>
        </div>

        <table id="classement-table">
            <thead>
                <tr>
                    <th>Rang</th>
                    <th>Nom</th>
                    <th>Catégorie</th>
                    <th>Points</th>
                    <th>Victoires</th>
                    <th>Défaites</th>
                </tr>
            </thead>
            <tbody>
                <!-- Les données seront insérées ici par JavaScript -->
            </tbody>
        </table>
    </main>

    <footer>
        <div class="footer-content">
            <p>&copy; 2025 Gestion de Tournoi de Judo</p>
            <nav>
                <a href="about.html">À propos</a>
                <a href="contact.html">Contact</a>
                <a href="privacy.html">Politique de confidentialité</a>
            </nav>
        </div>
    </footer>

    <script src="js/classsement.js"></script>
</body>
</html>
