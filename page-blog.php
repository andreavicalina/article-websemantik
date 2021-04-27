<?php
    include "connection.php";

    $id = $_GET['id'];

    require_once realpath (__DIR__)."/vendor/autoload.php";
    require_once __DIR__."/html_tag_helpers.php";

    \EasyRdf\RdfNamespace::setDefault('og');
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

</head>
<body>

<!-- LOADER -->
    <!-- <div id="preloader">
        <img class="preloader" src="images/loader.gif" alt="">
    </div>  -->
<!-- LOADER -->

    <div id="wrapper">
<!-- HEADER -->
        <div class="header-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="logo">
                            <a href="#"><img src="images/logo.png" alt="" style="max-width: 500px"></a>
                        </div><!-- end logo -->
                    </div>
                </div><!-- end row -->
            </div><!-- end container -->
        </div>
<!-- HEADER -->

        <section class="section wb">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                        <div class="page-wrapper">
                            <div class="blog-title-area">
        <?php
                        $select = "SELECT * FROM artikel a, author k WHERE id_artikel = $id AND a.id_author = k.id_author";
                        $query = mysqli_query($connect, $select);

                        foreach ($query as $data) {
        ?>
                                <ol class="breadcrumb hidden-xs-down">
                                    <a href="index.php"><li class="breadcrumb-item">Home</li></a>
                                    <li class="breadcrumb-item"> / <?= $data['judul']?></li>
                                </ol>

                                <h3><?= $data['judul']?></h3>

                                <div class="blog-meta big-meta">
                                    <small><?= $data['tanggal']?></small>
                                    <small>by <?= $data['nama_author']?></small>
                                </div><!-- end meta -->
                            </div><!-- end title -->

                            <?php
                                $doc = \EasyRdf\Graph::newAndLoad($data['link']);
                            ?>
                            <div class="blog-content">  
                                <div class="pp">
                                    <a href="<?= $doc->url ?>" class="box">
                                        <div class="card border-dark" style="width: 18rem; box-shadow: 5px 10px 8px grey;">
                                            <div class="card-header text-dark"><?= $doc->site_name ?></div>
                                            <div class="card-body p-3 text-dark">
                                                <h5 class="card-title"><?= $doc->title ?></h5>
                                                <p class="card-text"><?= $doc->description ?></p>
                                            </div>
                                        </div>
                                    </a>
                                    <p><?= $data['isi']?></p>
                                </div><!-- end pp -->
                            </div><!-- end content -->
<?php
                        }
?>
                        </div>
                    </div>
                            
                            <hr class="invis1">


<!-- SIDEBAR -->
                    <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                        <div class="sidebar">
                            <div class="widget">
                                <h2 class="widget-title">Recent Posts</h2>
                                <div class="blog-list-widget">
        <?php
                                $recent = "SELECT * FROM artikel a, author b WHERE a.id_author = b.id_author ORDER BY newest DESC LIMIT 5";
                                $query = mysqli_query($connect, $recent);

                                foreach ($query as $data) {
        ?>
                                    <div class="list-group">
                                        <a href="page-blog.php?id=<?=$data['id_artikel']?>" class="list-group-item list-group-item-action flex-column align-items-start">
                                            <div class="w-100 justify-content-between">
                                                <img src="<?php echo "pic/".$data['gambar']?>" alt="" class="img-fluid float-left">
                                                <h5 class="mb-1"><?= $data['judul'] ?></h5>
                                                <small><?=$data['tanggal']?></small>
                                            </div>
                                        </a>
                                    </div>
        <?php
                                }
        ?>
                                </div><!-- end blog-list -->
                            </div><!-- end widget -->
                        </div><!-- end sidebar -->
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end container -->
        </section>
<!-- SIDEBAR -->

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
    <script src="js/jquery.email-autocomplete.min.js"></script>
    <script src="js/tether.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>

</body>
</html>