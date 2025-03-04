<?php
if($_SERVER['REQUEST_METHOD']==='POST'){
    $nom=htmlspecialchars(trim($_POST['nom']));
    $prenom=htmlspecialchars(trim($_POST['prenom']));
    $email=htmlspecialchars(trim($_POST['email']));
    $password=htmlspecialchars($_POST['password']);
    $conf_password=htmlspecialchars($_POST['conf_password']);
    
    require '../config.php';
    if (strcmp($password, $conf_password)==0){
        $hashed_password=password_hash($password, PASSWORD_DEFAULT);
        $sql="INSERT INTO administrateur (nom, prenom, email, mdp) VALUES (:nom, :prenom, :email, :mdp)";
        
        try {
            $stmt=$pdo->prepare($sql);
            $stmt->execute([
                'nom'=>$nom, 
                'prenom'=>$prenom, 
                'email' =>$email, 
                'mdp' => $hashed_password
            ]);
            header('Location: login_admin.html');
            exit();
        } catch(PDOException $e){
            die("Erreur lors de l'insertion des données: ".$e-> getMessage());
        }
    } 
} else {
    header('Location: inscription.html');
    exit();
}
?>