<?php 
    if ($_SERVER['REQUEST_METHOD']==='POST'){
        $judoka1=$_POST['judoka1'];
        $date=$_POST['date'];
        $heure=$_POST['heure'];
        $judoka2=$_POST['judoka2'];
        $categorie=$_POST['categorie'];

        require '../config.php';
        $sql="INSERT INTO calendrier (judoka1, date, heure, judoka2, categorie) VALUES (:judoka1, :date, :heure, :judoka2, :categorie)";
    
        try{
            $stmt=$pdo ->prepare($sql);
            $stmt-> execute([
                'judoka1'=> $judoka1,
                'date'=> $date,
                'heure'=> $heure,
                'judoka2'=> $judoka2,
                'categorie'=> $categorie
            ]);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
        header('Location: admin-classement.html');
    }
?>