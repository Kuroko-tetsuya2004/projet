<?php
if($_SERVER['REQUEST_METHOD']==='POST'){
    $nom=trim($_POST['nom']);
    $prenom=trim($_POST['prenom']);
    $email=trim($_POST['email']);
    $password=$_POST['password'];
    $conf_password=$_POST['conf_password'];

    if (strcmp($password, $conf_password)==0){
        //require 'config.php';
        $hashed_password=password_hash($password, PASSWORD_DEFAULT);
        $sql="INSERT INTO utilisateur (nom, prenom, email, mdp) VALUES (:nom, :prenom, :email, :mdp)";
        
        try {
            require '../config.php';
            $stmt=$pdo->prepare($sql);   
            $stmt->execute([
                'nom'=>$nom, 
                'prenom'=>$prenom, 
                'email' =>$email, 
                'mdp' => $hashed_password
            ]);
            header('Location: login.html');
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