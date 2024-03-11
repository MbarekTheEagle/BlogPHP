
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


<br><br>
    <div class="form">
    <?php
       //vérifier que le bouton ajouter a bien été cliqué
       if(isset($_POST['button'])){
            $filenameimg = $_FILES["uploadfile"]["name"];
            $tempname = $_FILES["uploadfile"]["tmp_name"];
            $folder = "./img/" . $filenameimg;
           //extraction des informations envoyé dans des variables par la methode POST
           extract($_POST);
           //verifier que tous les champs ont été remplis
           if(isset($title) && isset($subtitle) && isset($content) && $idwriter && $filenameimg){
             
                //connexion à la base de donnée
                include_once "connection.php";
                //requête d'ajout
                $req = mysqli_query($con , "INSERT INTO employe VALUES(NULL, '$title', '$subtitle','$content','$idwriter','$filenameimg')");
                if($req){//si la requête a été effectuée avec succès , on fait une redirection
                    header("location: Admin.php");
                }else {//si non
                    $message = "Employé non ajouté";
                }
                // Now let's move the uploaded image into the folder: image
                if (move_uploaded_file($tempname, $folder)) {
                    echo "<h3> Image uploaded successfully!</h3>";
                } else {
                    echo "<h3> Failed to upload image!</h3>";
                }

              

           }else {
               //si non
               $message = "Veuillez remplir tous les champs !";
           }
       }
    
    ?>
 
        <a href="Admin.php" class="back_btn"><img  src="images/back.png"> Retour </a>
        <h2>Ajouter un employé</h2>
        <p class="erreur_message">
        Veuillez remplir tous les champs !
        </p> 
   
        <form action="" method="POST"  enctype="multipart/form-data">
            <label>Title</label>
            <input type="text" name="title">
            <label>Subtitle</label>
            <input type="text" name="subtitle"><br>
            <label>Content</label>
            <textarea id="editor" rows="10" name="content" ></textarea><br>
            <label>idwriter</label>
            <input type="number" name="idwriter">
            <label>Image</label>
            <input type="file" name="uploadfile" value="" />
           

            <input type="submit" value="Ajouter" name="button">
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