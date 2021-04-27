<?php
    include "connection.php";
    require_once realpath(__DIR__.'')."/vendor/autoload.php";
    require_once __DIR__."/html_tag_helpers.php";
?>
<!DOCTYPE html>
<html lang="en">

    <!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- Site Metas -->
    <title>Singer Articles</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <!-- Site Icons -->
    <link rel="shortcut icon" href="images/apple-touch-icon.png" type="image/x-icon" />
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">
    
    <!-- Design fonts -->
    <link href="https://fonts.googleapis.com/css?family=Ubuntu:300,400,400i,500,700" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,400i,500,700,900" rel="stylesheet"> 

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- FontAwesome Icons core CSS -->
    <link href="css/font-awesome.min.css" rel="stylesheet">

    <!-- Custom styles -->
    <link href="style.css" rel="stylesheet">

    <!-- Responsive styles -->
    <link href="css/responsive.css" rel="stylesheet">

    <!-- Colors -->
    <link href="css/colors.css" rel="stylesheet">
    <style>
        .kartu{
            border-radius: 20px;
            transition: .5s ease;
           
        }
        .kartu:hover{
            background-color: #ffebbf;
             box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
             transition: .5s ease;
        transform: scale(1.07);
        }
    </style>

</head>
<body>

    <?php
     $data = \EasyRdf\Graph::newAndLoad('http://localhost/ws/kelompok.rdf');
     $doc = $data->primaryTopic();
    ?>


<!-- LOADER -->
    <!-- <div id="preloader">
        <img class="preloader" src="images/loader.gif" alt="">
    </div> -->
<!-- LOADER -->

    <div id="wrapper">

<!-- HEADER -->
    <div class="header-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="logo">
                        <a href="index.php"><img src="images/logo.png" alt="" style="max-width: 500px"></a>
                    </div><!-- end logo -->
                </div>
            </div><!-- end row -->
        </div><!-- end container -->
    </div>
<!-- HEADER -->

<!-- NAVBAR -->
        <header class="header">
            <div class="container">
                <nav class="navbar navbar-inverse navbar-toggleable-md">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#cloapediamenu" aria-controls="cloapediamenu" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-md-center" id="cloapediamenu">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link color-red-hover" href="index.php">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link color-pink-hover" href="page-article.php">Post</a>
                            </li>        
                            <li class="nav-item">
                                <a class="nav-link color-aqua-hover" href="page-discover.php">Discover</a>
                            </li>                   
                            <li class="nav-item">
                                <a class="nav-link color-yellow-hover active" href="team.php">Teams</a>
                            </li>
                             <li class="nav-item">
                                <a class="nav-link color-red-hover" href="base.php">Our Base</a>
                            </li>
                            <li class="nav-item" style="border-left: 2px solid black">
                                <a class="nav-link color-blue-hover" data-toggle="modal" href="#login"><i class='fa fa-user' style="font-size: 15px;"></i> Admin</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </header>
<!-- NAVBAR -->

<!-- MODAL -->
    <!-- modal login -->
        <div class="container">
            <div class="modal fade" id="login">
                <div class="modal-dialog modal-dialog-centered modal-sm">
                    <center>
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title mx-auto">Login</h4>
                        </div><!-- end modal-header -->
                        <div class="modal-body">
                            <div class="container">
                                <form action="login.php" method="post">
                                    <div class="form-group">
                                        <input class="form-control" type="text" placeholder="Username" name="username" autocomplete="off" required>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control required" type="password" placeholder="Password" name="sandi" required>
                                    </div>
                                    <button class="btn btn-primary" type="submit" name="btnlogin">Enter</button>
                                </form>
                            </div>
                        </div><!-- end modal-body -->
                    </div>
                    </center>
                </div><!-- end modal-dialog -->
            </div><!-- end modal -->
        </div><!-- end container -->
    <!-- end modal login -->
<!-- MODAL -->
<div class="conatiner-fluid mt-5 mb-5" style="width: 80%;margin: auto">
    <div class="row">
<?php
    foreach ($doc->all('foaf:kelompok') as $klm) { ?>
        <div class="card ml-3 mb-3 kartu " style="width: 16rem;">
        <div align="center" class="mt-3">
            <img src="<?php echo $klm->get('foaf:gambar'); ?>" style="width: 150px; border-radius: 75px">
        </div>
        
        <br> 
        <div align="center" class="mb-1">
            <h4><?php  echo $klm->get('rdfs:label'); ?></h4>
            <span class="badge badge-warning" style="font-size: 100%;"><?php  echo $klm->get('foaf:nim');?></span>
        </div>
        <div align="justify" class="ml-2 mr-2">
             <?php echo $klm->get('dc:deskripsi');?>
         </div> 
        <div align="center" class="mb-3">
                <strong style="color: #ffbd2b">Penyanyi Favorite</strong><br>
                 <a href="<?php  echo $klm->get('foaf:page'); ?>" style="text-decoration: none; color: black"><strong><?php echo $klm->get('foaf:name'); ?></strong></a>
            
        </div>
       
    </div>
    <?php }
?>
</div>
</div>

       



<!-- FOOTER -->
        <footer class="footer">
            <div class="container">
                <div class="widget">
                    <div class="footer-text text-center">
                        <h1>Stay Updated</h1>
                        <p>Get the latest and upcoming info info about your favorite singer.</p>
                    </div>
                </div>
            </div>
        </footer>
<!-- FOOTER -->

        <div class="dmtop">Scroll to Top</div>
        
    </div><!-- end wrapper -->

    <!-- Core JavaScript
    ================================================== -->
    <script src="js/jquery.min.js"></script>
    <script src="js/tether.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>

</body>
</html>