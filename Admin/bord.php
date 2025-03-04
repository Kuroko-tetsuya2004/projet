<?php

// Vérifier si l'utilisateur est connecté et est un administrateur
/*if (!isset($_SESSION['admin']) || $_SESSION['admin'] !== true) {
    header("Location: login.html"); // Rediriger vers la page de connexion
    exit();
}
*/
// Connexion à la base de données
$host = "localhost";
$dbname = "projet";
$username = "root";
$password = "";


require '../config.php';
// Récupérer la liste des utilisateurs
$query = "SELECT id_utilisateur, nom, prenom, email FROM utilisateur";
$stmt = $pdo->prepare($query);
$stmt->execute();
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de bord administrateur - Tournois de Judo</title>
    <link rel="stylesheet" href="../css/admin.css">
    <link rel="stylesheet" href="../css/style.css">
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
                    <li><a href="classement.html">Classement</a></li>
                    <li><a href="calendrier.html">Calendrier</a></li>
                    <li><a href="resultats.html" class="active">Résultats</a></li>
                    <li><a href="Déconnexion.php">Déconnexion</a></li>
                </ul>
            </div>
        </nav>
    </header>

    <main>
        <h1 style="text-align: center;">Tableau de bord administrateur</h1>
        <table class="admin-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($user['id_utilisateur']); ?></td>
                        <td><?php echo htmlspecialchars($user['nom']); ?></td>
                        <td><?php echo htmlspecialchars($user['prenom']); ?></td>
                        <td><?php echo htmlspecialchars($user['email']); ?></td>
                    </tr>
                <?php endforeach; ?>
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
</body>
</html>