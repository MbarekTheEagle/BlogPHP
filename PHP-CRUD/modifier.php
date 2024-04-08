<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Al Anamil الأنامل</title>
        <link rel="icon" type="image/x-icon" href="assets/img/icons8-pen-64.png" />
    <link rel="stylesheet" href="stylee.css">
    
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
    // Include the database connection file
    include_once "connection.php";

    // Check if the ID is provided in the URL
    if(isset($_GET['id'])) {
        $id = $_GET['id'];

        // Retrieve the employee details from the database
        $query = "SELECT * FROM Employe WHERE id = $id";
        $result = mysqli_query($con, $query);

        if(mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
        } else {
            echo "Employee not found.";
            exit;
        }
    } else {
        echo "Employee ID not provided.";
        exit;
    }

    // Check if the form is submitted
    if(isset($_POST['button'])) {
        // Extract form data
        $title = $_POST['title'];
        $subtitle = $_POST['subtitle'];
        $content = $_POST['content'];
        $idwriter = $_POST['idwriter'];

        // Check if all form fields are filled
        if(!empty($title) && !empty($subtitle) && !empty($content) && !empty($idwriter)) {
            // Check if a new image file is uploaded
            if(isset($_FILES['uploadfile']) && $_FILES['uploadfile']['error'] === UPLOAD_ERR_OK) {
                $filenameimg = $_FILES["uploadfile"]["name"];
                $tempname = $_FILES["uploadfile"]["tmp_name"];
                $folder = "./img/" . $filenameimg;
                // Move uploaded file to destination folder
                if(move_uploaded_file($tempname, $folder)) {
                    // Update employee details in the database
                    $query = "UPDATE employe SET title = '$title', subtitle = '$subtitle', content = '$content', idwriter = '$idwriter', filenameimg = '$filenameimg' WHERE id = $id";
                    $result = mysqli_query($con, $query);
                    if($result) {
                        header("location: admin.php");
                        exit;
                    } else {
                        $message = "Failed to update employee details.";
                    }
                } else {
                    $message = "Failed to move uploaded file.";
                }
            } else {
                // Update employee details without changing the image
                $query = "UPDATE employe SET title = '$title', subtitle = '$subtitle', content = '$content', idwriter = '$idwriter' WHERE id = $id";
                $result = mysqli_query($con, $query);
                if($result) {
                    header("location: admin.php");
                    exit;
                } else {
                    $message = "Failed to update employee details.";
                }
            }
        } else {
            $message = "Please fill in all fields.";
        }
    }
    ?>

    <div class="form">
        <a href="admin.php" class="back_btn"><img src="images/back.png"> Retour </a>
        <h2>Modifier l'employé</h2>
        <?php if(isset($message)) echo "<p class='erreur_message'>$message</p>"; ?>
        <form action="" method="POST" enctype="multipart/form-data">
            <label>Nom</label>
            <input type="text" name="title" value="<?= $row['title'] ?>">
            <label>Prénom</label>
            <input type="text" name="subtitle" value="<?= $row['subtitle'] ?>">
            <label>Content</label>
            <textarea id="editor" rows="10" name="content"><?= $row['content'] ?></textarea>
            <label>idwriter</label>
            <input type="number" name="idwriter" value="<?= $row['idwriter'] ?>">
            <label>Image</label>
            <input type="file" name="uploadfile">
            <img src="./img/<?= $row['filenameimg'] ?>" class="img-fluid" alt="Employee Image" style='width: 300px;'>
            <input type="submit" value="Modifier" name="button">
        </form>
    </div>

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
