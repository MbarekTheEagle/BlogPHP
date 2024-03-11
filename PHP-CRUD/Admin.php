<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" type="image/x-icon" href="assets/img/icons8-pen-64.png" />
    <title> Al Anamil الأنامل</title>
</head>
<body>
    <div class="container">
        <a href="index.php" class="back_btn"><img  src="images/back.png"> الأنامل </a>
        <a href="ajouter.php" class="Btn_add"> <img src="images/plus.png"> Ajouter </a>
       
        <table>
            <tr id="items">
            <th>title</th>
            <th>subtitle</th>
            <th>id</th>
            <th>idwriter</th>
            <th>Modifier</th>
            <th>Afficher</th>
            <th>Supprimer</th>
            </tr>
            <?php 
                //inclure la page de connexion
                include_once "connection.php";
                //requête pour afficher la liste des employés
                $req = mysqli_query($con , "SELECT * FROM employe");
                if(mysqli_num_rows($req) == 0){
                    //s'il n'existe pas d'employé dans la base de donné , alors on affiche ce message :
                    echo "Il n'y a pas encore d'employé ajouter !" ;
                    
                }else {
                    //si non , affichons la liste de tous les employés
                    while($row=mysqli_fetch_assoc($req)){
                        ?>
                        <tr>
                            <td><?=$row['title']?></td>
                            <td><?=$row['subtitle']?></td>
                            <td><?=$row['id']?></td>
                            <td><?=$row['idwriter']?></td>
                            <!--Nous alons mettre l'id de chaque employé dans ce lien -->
                            <td><a href="modifier.php?id=<?=$row['id']?>"><img src="images/pen.png"></a></td>
                            <td><a href="afficher.php?id=<?=$row['id']?>"><img src="images/pen.png"></a></td>
                            <td><a href="supprimer.php?id=<?=$row['id']?>"><img src="images/trash.png"></a></td>
                        </tr>
                        <?php
                    }
                    
                }
            ?>
      
         
        </table>

    </div>
</body>
</html>