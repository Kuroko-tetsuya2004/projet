<?php
require 'vendor/autoload.php'; // Inclure l'autoload de Composer
use Smalot\PdfParser\Parser; // Importer la classe Parser de Smalot PDF Parser

// Connexion à la base de données
$host = 'localhost';
$dbname = 'projet';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}

// Chemin vers le fichier PDF
$pdfFilePath = 'chemin/vers/votre/fichier.pdf';

// Initialiser le parseur PDF
$parser = new Parser();
$pdf = $parser->parseFile($pdfFilePath);

// Extraire le texte du PDF
$text = $pdf->getText();

// Traiter le texte extrait pour obtenir les données structurées
// (Cette partie dépend de la structure de votre PDF)
$lines = explode("\n", $text); // Diviser le texte en lignes

// Exemple de traitement pour un PDF structuré
foreach ($lines as $line) {
    // Supposons que chaque ligne contient des données séparées par des espaces ou des virgules
    $data = preg_split('/\s+/', $line); // Diviser la ligne en colonnes

    // Exemple de structure de données attendue : Nom, Pays, Catégorie, Classement
    if (count($data) >= 4) {
        $nom = $data[0];
        $pays = $data[1];
        $categorie = $data[2];
        $classement = $data[3];

        // Insérer les données dans la base de données
        $sql = "INSERT INTO judoka (nom, pays, categorie, classement) VALUES (:nom, :pays, :categorie, :classement)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':nom' => $nom,
            ':pays' => $pays,
            ':categorie' => $categorie,
            ':classement' => $classement
        ]);

        echo "Données insérées : $nom, $pays, $categorie, $classement<br>";
    }
}

echo "Extraction et insertion terminées.";