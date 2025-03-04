<?php
require '../config.php'; 

if (isset($_GET['email'])) {
    $email = trim($_GET['email']);

    // Valider l'e-mail
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo json_encode(['status' => 'invalid']);
        exit();
    }

    
    $sql = "SELECT email FROM utilisateur WHERE email = :email";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['email' => $email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        echo json_encode(['status' => 'exists']);
    } else {
        echo json_encode(['status' => 'available']);
    }
} else {
    echo json_encode(['status' => 'error']);
}
?>