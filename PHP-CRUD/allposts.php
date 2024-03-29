<!DOCTYPE html>
<html lang="ar" dir="rtl">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title> Al Anamil الأنامل</title>
        <link rel="icon" type="image/x-icon" href="assets/img/icons8-pen-64.png" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    </head>
    <body>
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light" id="mainNav">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="index.php" style="font-family: DG Trika;">الأنامل</a>
                <button class="navbar-toggler" type="button" style="font-family: DG Trika;" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                قائمة
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto py-4 py-lg-0">
                        <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" style="font-family: DG Trika;" href="index.php">الرئيسية</a></li>
                        <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" style="font-family: DG Trika;" href="about.php">حول</a></li>
                        <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" style="font-family: DG Trika;" href="allposts.php">كل المقالات</a></li>
                        <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" style="font-family: DG Trika;" href="contact.php">تواصل</a></li>
                        <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" style="font-family: DG Trika;" href="admin.php">Admin</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Page Header-->
        <header class="masthead" style="background-image: url('assets/img/pdmisc1-16-nap.jpg')">
            <div class="container position-relative px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <div class="site-heading">
                            <h1 style="font-family: shareb;">كل مقالات الأنامل</h1>
                            <span class="subheading" style="font-family:shareb;">. لا تقود الكتابة إلا إلى المزيد من الكتابة </span>
                        </div>
                    </div>
                </div>
            </div>
        </header>
      
        <!-- Main Content-->
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">

                 <!--connection -->
                 <?php 
                        include_once "connection.php";

                        $req = mysqli_query($con , "SELECT * FROM employe");
                        if(mysqli_num_rows($req) == 0){
                            //s'il n'existe pas d'employé dans la base de donné , alors on affiche ce message :
                            echo "Il n'y a pas encore d'employé ajouter !" ;
                            
                        }else {
                            //si non , affichons la liste de tous les employés
                            while($row=mysqli_fetch_assoc($req)){
                                ?>
                                    <div class="post-preview">
                                       
                                        <img src="./img/<?php echo $row['filenameimg']; ?>" class="img-fluid" alt="Responsive image"/>
                                        <a href="post.php?id=<?=$row['id']?>">
                                            <h2 class="post-title"><?php echo $row['title']?></h2>
                                            <h3 class="post-subtitle"><?=$row['subtitle']?></h3>
                                        </a>
                                        <p class="post-meta">
                                            <a href="#!">مبارك الكوشي</a>
                                            <!--  on September 24, 2022-->
                                        </p>
                                        <hr class="my-4" />
                                    </div>
                                                      
                                <?php
                            }
                            
                        }
                    ?>
                     
                    <!-- Divider-->
                    <hr class="my-4" />
    
                    <!-- Pager
                    <div class="d-flex justify-content-end mb-4"><a class="btn btn-primary text-uppercase" href="#!">Older Posts →</a></div>-->
                </div>
            </div>
        </div>
        <!-- Footer-->
        <footer class="border-top">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <ul class="list-inline text-center">
                            <li class="list-inline-item">
                                <a href="#!">
                                    <span class="fa-stack fa-lg">
                                        <i class="fas fa-circle fa-stack-2x"></i>
                                        <i class="fab fa-twitter fa-stack-1x fa-inverse"></i>
                                    </span>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#!">
                                    <span class="fa-stack fa-lg">
                                        <i class="fas fa-circle fa-stack-2x"></i>
                                        <i class="fab fa-facebook-f fa-stack-1x fa-inverse"></i>
                                    </span>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#!">
                                    <span class="fa-stack fa-lg">
                                        <i class="fas fa-circle fa-stack-2x"></i>
                                        <i class="fab fa-github fa-stack-1x fa-inverse"></i>
                                    </span>
                                </a>
                            </li>
                        </ul>
                        <div class="small text-center text-muted fst-italic">Copyright &copy; Al Anamil 2024</div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
