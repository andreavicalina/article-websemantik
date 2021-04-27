<?php
    include "../connection.php";

    if (empty($_SESSION['username'])) {
        header ("Location: ../error.php");
        die;
    }
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
    <link rel="shortcut icon" href="../images/apple-touch-icon.png" type="image/x-icon" />
    <link rel="apple-touch-icon" href="../images/apple-touch-icon.png">
    
    <!-- Design fonts -->
    <link href="https://fonts.googleapis.com/css?family=Ubuntu:300,400,400i,500,700" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,400i,500,700,900" rel="stylesheet"> 

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.css" rel="stylesheet">

    <!-- FontAwesome Icons core CSS -->
    <link href="../css/font-awesome.min.css" rel="stylesheet">

    <!-- Custom styles -->
    <link href="../style.css" rel="stylesheet">

    <!-- Responsive styles -->
    <link href="../css/responsive.css" rel="stylesheet">

    <!-- Colors -->
    <link href="../css/colors.css" rel="stylesheet">

</head>
<body>

<!-- LOADER -->
    <!-- <div id="preloader">
        <img class="preloader" src="../images/loader.gif" alt="">
    </div> -->
<!-- LOADER -->

    <div id="wrapper">
<!-- HEADER -->
        <div class="header-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="logo">
                            <a href="#"><img src="../images/logo.png" alt="" style="max-width: 500px"></a>
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
                                <a class="nav-link color-red-hover active" href="home.php">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link color-aqua-hover" href="search.php">Discover</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link color-yellow-hover" href="upload.php">Upload</a>
                            </li>
                            <li class="nav-item" style="border-left: 2px solid black">
                                <a class="nav-link color-blue-hover" href="../logout.php"><i class='fa fa-user' style="font-size: 15px;"></i> Logout</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </header>
<!-- NAVBAR -->

<!-- CONTENT -->
        <section class="section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <?php
                                $show = "SELECT * FROM artikel a, author b WHERE a.id_author = b.id_author ORDER BY newest DESC LIMIT 2";
                                $query = mysqli_query($connect, $show);

                                foreach ($query as $data) {
        ?>
                                <div class="blog-box">
                                    <div class="post-media">
                                        <a href="../page-blog.php?id=<?=$data['id_artikel']?>">
                                            <img src="<?php echo "../pic/".$data['gambar']?>" class="img-fluid">
                                            <div class="hovereffect">
                                                <span></span>
                                            </div>
                                        </a>
                                    </div><!-- end media -->
                                    <div class="blog-meta big-meta">
                                        <h4><a href="../page-blog.php?id=<?=$data['id_artikel']?>" title=""><?= $data['judul'] ?></a></h4>
                                        <p><?php echo substr($data['isi'], 0, 20)?>. . .</p>
                                        <small><?= $data['tanggal']?></small>
                                        <small>by <?=$data['nama_author']?></small>
                                    </div><!-- end meta -->
                                </div><!-- end blog-box -->
                                <hr class="invis">
        <?php
                                }
        ?>
                            </div><!-- end col -->
                        </div><!-- end row -->
                    </div><!-- end col -->

                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
        <?php
                                $show2 = "SELECT * FROM artikel a, author b WHERE a.id_author = b.id_author LIMIT 3";
                                $query2 = mysqli_query($connect, $show2);

                                foreach ($query2 as $data) {
        ?>
                                <div class="blog-box">
                                    <div class="post-media">
                                        <a href="../page-blog.php?id=<?=$data['id_artikel']?>">
                                            <img src="<?php echo "../pic/".$data['gambar']?>"class="img-fluid">
                                            <div class="hovereffect">
                                                <span></span>
                                            </div>
                                        </a>
                                    </div><!-- end media -->
                                    <div class="blog-meta">
                                        <h4><a href="../page-blog.php?id=<?=$data['id_artikel']?>"><?= $data['judul'] ?></a></h4>
                                        <small><?= $data['tanggal']?></small>
                                    </div><!-- end meta -->
                                </div><!-- end blog-box -->
                                <hr class="invis">
        <?php
                                }
        ?>
                            </div><!-- end col -->
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
        <?php
                                $show3 = "SELECT * FROM artikel a, author b WHERE a.id_author = b.id_author LIMIT 3 OFFSET 3";
                                $query3 = mysqli_query($connect, $show3);

                                foreach ($query3 as $data) {
        ?>
                                <div class="blog-box">
                                    <div class="post-media">
                                        <a href="../page-blog.php?id=<?=$data['id_artikel']?>">
                                            <img src="<?php echo "../pic/".$data['gambar']?>" class="img-fluid">
                                            <div class="hovereffect">
                                                <span></span>
                                            </div>
                                        </a>
                                    </div><!-- end media -->
                                    <div class="blog-meta">
                                        <h4><a href="../page-blog.php?id=<?=$data['id_artikel']?>"><?= $data['judul'] ?></a></h4>
                                        <small><?= $data['tanggal']?></small>
                                    </div><!-- end meta -->
                                </div><!-- end blog-box -->

                                <hr class="invis">
        <?php
                                }
        ?>
                            </div><!-- end col -->
                        </div><!-- end row -->
                    </div><!-- end col -->
                </div><!-- end row -->
    
                <hr class="invis1">
    
                
            </div><!-- end container -->
        </section>
<!-- CONTENT -->

        <div class="dmtop">Scroll to Top</div>
        
    </div><!-- end wrapper -->

    <!-- Core JavaScript
    ================================================== -->
    <script src="../js/jquery.min.js"></script>
    <script src="../js/jquery.email-autocomplete.min.js"></script>
    <script src="../js/jquery.validate.js"></script>
    <script src="../js/jquery.validate.min.js"></script>
    <script src="../js/tether.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/custom.js"></script>

</body>
</html>