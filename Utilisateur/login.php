<?php
    if($_SERVER['REQUEST_METHOD']==='POST'){
        if(isset($_POST['email'], $_POST['password']) ){
           
            $email = trim($_POST['email']);
            $mdp=$_POST['password'];
           
            require '../config.php'; //inclure le fichier de configuration de la base de données
           
            $sql="SELECT email, mdp FROM utilisateur WHERE email=:email";
            $stmt=$pdo->prepare($sql);
           
            try {
                $stmt->execute([
                    'email' =>$email
                ]);
                
                $user=$stmt->fetch(PDO::FETCH_ASSOC);
                
                if($user && password_verify($mdp, $user['mdp'])) {
                    //Connexion réussie
                    header('Location: index.html');
                    exit();
                } else {
                    $_SESSION['error']="Identifiant ou mot de passe incorrect"; //Message d'erreur si le mail ou le mot de passe est incorrect 
                    header('Location: login.html'); //Redirection vers login.html 
                    exit();
                }
           
            }catch(PDOException $e) {
               $_SESSION['error']= "Une erreur s'est produite.veuillez réessayer plus tard "; 
               header('Location: login.html'); 
               exit();
            }

        }
    } else {
        header('Location: login.html');
        exit();
    }
?>