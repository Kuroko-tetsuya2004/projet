<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tournois de Judo</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/admin.css">
    <style>
        h2{
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            background-color: white;
            border: 1px solid #ddd;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f8f9fa;
            color: #333; 
            font-weight: bold;
        }

        tr:hover {
            background-color: #f1f1f1; 
        }

        .section-title {
            background-color:  #004080; 
            color: white;
            padding: 8px;
            margin-top: 20px;
            margin-bottom: 10px;
            border-radius: 5px;
        }

        .category-title {
            background-color: #004080; 
            color: white;
            padding: 6px;
            margin-top: 15px;
            margin-bottom: 10px;
            border-radius: 5px;
            text-align: center;
        }
    </style>
    <script src="https://kit.fontawesome.com/your-fontawesome-kit.js" crossorigin="anonymous"></script>
</head>
<body>
    <header>
        <nav class="navbar">
            <div class="container">
                <a href="index.html" class="logo">
                    <i class="fas fa-trophy"></i> Tournois de Judo
                </a>
                <button class="navbar-toggle" aria-label="Toggle navigation">
                    <span class="navbar-toggle-icon"></span>
                </button>
                <ul class="navbar-menu">
                    <li><a href="classement.php">Classement</a></li>
                    <li><a href="calendrier.html">Calendrier</a></li>
                    <li><a href="resultat.html">Résultats</a></li>
                    <li><a href="login.html">Connexion</a></li>                   
                </ul>
            </div>
        </nav>
    </header>
    <main class="container">

        <?php
            require '../config.php';

            // Définir les catégories pour hommes et femmes
            $categoriesHommes = ['-60 kg', '-66 kg', '-73 kg', '-81 kg', '-90 kg', '-100 kg', '+100 kg'];
            $categoriesFemmes = ['-48 kg', '-52 kg', '-57 kg', '-63 kg', '-70 kg', '-78 kg', '+78 kg'];

            // Fonction pour afficher les judokas d'une catégorie
            function afficherJudokas($pdo, $categorie) {
                $sql = 'SELECT nom, pays, categorie, classement FROM judoka WHERE categorie = :categorie ORDER BY classement';
                    $result = $pdo->prepare($sql);
                    $result->execute(['categorie' => $categorie]);
                    $judokas = $result->fetchAll(PDO::FETCH_ASSOC);

                    if (!empty($judokas)) {
                        echo "<div class='category-title'>";
                        echo "<h3>Classement dans la catégorie : " . htmlspecialchars($categorie) . "</h3>";
                        echo "</div>";
                        echo "<table>";
                        echo "<thead>";
                        echo "<tr>";
                        echo "<th>Nom</th>";
                        echo "<th>Pays</th>";
                        echo "<th>Catégorie</th>";
                        echo "<th>Classement</th>";
                        echo "</tr>";
                        echo "</thead>";
                        echo "<tbody>";

                        foreach ($judokas as $judoka) {
                            echo "<tr>";
                            echo "<td>" . htmlspecialchars($judoka['nom']) . "</td>";
                            echo "<td>" . htmlspecialchars($judoka['pays']) . "</td>";
                            echo "<td>" . htmlspecialchars($judoka['categorie']) . "</td>";
                            echo "<td>" . htmlspecialchars($judoka['classement']) . "</td>";
                            echo "</tr>";
                        }

                        echo "</tbody>";
                        echo "</table>";
                    } else {
                        echo "<p>Aucun judoka trouvé dans la catégorie " . htmlspecialchars($categorie) . ".</p>";
                    }
                
            }

            // Afficher les catégories pour hommes
            echo "<div class='section-title'>";
            echo "<h2>Classement des Hommes</h2>";
            echo "</div>";
            foreach ($categoriesHommes as $categorie) {
                afficherJudokas($pdo, $categorie);
            }

            
            echo "<div class='section-title'>";
            echo "<h2>Classement des Femmes</h2>";
            echo "</div>";
            foreach ($categoriesFemmes as $categorie) {
                afficherJudokas($pdo, $categorie);
            }
        ?>
    </main>
    <footer>
        <div class="container">
            <p>&copy; 2025 Gestion de Tournoi de Judo</p>
            <nav class="footer-nav">
                <a href="about.html">À propos</a>
                <a href="contact.html">Contact</a>
                <a href="privacy.html">Politique de confidentialité</a>
            </nav>
        </div>
    </footer>

    <script src="js/main.js"></script>
    <script src="js/tournois.js"></script>
</body>
</html>