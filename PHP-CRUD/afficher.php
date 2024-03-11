<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Al Anamil الأنامل</title>
    <link rel="stylesheet" href="stylee.css">
    <link rel="icon" type="image/x-icon" href="assets/img/icons8-pen-64.png" />
    <style>

body {
    background-color: #D3EBCD;
}
.back_btn {
    color: #2bc48a;
    text-decoration: 0;
    display: flex;
    align-items: center;
    }
.back_btn img {
        height: 16px;
        margin-right:5px ;
        }

.form {
    width: 50%;
    margin: auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
}

.form h2 {
    text-align: center;
    margin-bottom: 20px;
}

.form label {
    font-weight: bold;
}

.form input[type="text"],
.form input[type="number"],
.form textarea,
.form input[type="file"] {
    width: 100%;
    padding: 8px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    display: block; /* Set display property to block */
}

.form input[type="submit"] {
    width: 100%;
    padding: 10px;
    background-color: #4CAF50;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

.form input[type="submit"]:hover {
    background-color: #45a049;
}

.back_btn {
    display: inline-block;
    text-decoration: none;
    margin-bottom: 20px;
    color: #4CAF50;
    font-weight: bold;
}

.back_btn img {
    vertical-align: middle;
    margin-right: 5px;
}

.erreur_message {
    color: red;
    font-weight: bold;
    text-align: center;
    margin-bottom: 10px;
}

    </style>
</head>
<body>
    <div class="form">
    <?php

//connexion à la base de donnée
 include_once "connection.php";
//on récupère le id dans le lien
 $id = $_GET['id'];
 //requête pour afficher les infos d'un employé
 $req = mysqli_query($con , "SELECT * FROM Employe WHERE id = $id");
 $row = mysqli_fetch_assoc($req);
?>

        <a href="Admin.php" class="back_btn"><img src="images/back.png"> Retour </a>
        <h2>l'employé <?php echo $id?></h2>

        <form action="" method="POST">
            <label>Nom</label>
            <input type="text" name="nom" value="<?=$row['title']?>">
            <label>Prénom</label>
            <input type="text" name="prenom" value="<?=$row['subtitle']?>">
            <label>âge</label>
            <textarea id="editor" rows="10"  ><?=$row['content']?></textarea>
            <label>image</label><br>
            <img src="./img/<?php echo $row['filenameimg']; ?>" class="img-fluid" alt="Responsive image" style=' height: 420px;'/>


        </form>
   </div>


   <!-- code for ckeditor5 -->
   <script src="https://cdn.ckeditor.com/ckeditor5/35.2.0/classic/ckeditor.js"></script>
    <script>
                
                ClassicEditor.create( document.querySelector( '#editor' ), {
			
					licenseKey: '',		
					
				} )
				.then( editor => {
					window.editor = editor;
				} )
				.catch( error => {
					console.error( 'Oops, something went wrong!' );
					console.error( 'Please, report the following error on https://github.com/ckeditor/ckeditor5/issues with the build id and the error stack trace:' );
					console.warn( 'Build id: wa4ashdx63f1-glty1eaf4kbm' );
					console.error( error );
				} );
		</script>


</body>
</html>