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

    <!-- CK Editor -->
    <script src="http://cdn.ckeditor.com/4.6.2/standard-all/ckeditor.js"></script>

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
                                <a class="nav-link color-red-hover" href="home.php">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link color-aqua-hover" href="search.php">Discover</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link color-yellow-hover active" href="upload.php">Upload</a>
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

<!-- upload form -->
        <section class="section">
            <div class="container w-50">
                <form method="post" action="uplQuery.php" enctype="multipart/form-data">
                    <div class="form-group">
                        <input class="form-control" type="text" placeholder="Title" name="judul" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <select class="form-control" name="penulis">
                            <option hidden>Choose Author</option>
                            <?php
                                $query = mysqli_query($connect, "SELECT * FROM author");
                                while ($row = mysqli_fetch_array($query)) {
                            ?>
                                    <option value="<?= $row['id_author'] ?>"><?= $row['nama_author'] ?></option>
                            <?php
                                }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="file" name="gambar">
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="date" name="tanggal">
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="text" placeholder="Put the link here!" name="link" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" id="isi" name="isi"></textarea>
                    </div><br><br>
                    <button class="btn btn-primary" type="submit" name="btnupl">Upload</button>
                </form>
            </div><!-- end container -->
        </section>
<!-- upload form -->

        <div class="dmtop">Scroll to Top</div>
        
    </div><!-- end wrapper -->

    <!-- Core JavaScript
    ================================================== -->
    <script src="js/jquery.min.js"></script>
    <script src="js/tether.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>

    <!-- CK Editor -->
        <script type="text/javascript">
        // Initialize
            CKEDITOR.replace('isi', {
            width: "640px",
            filebrowserUploadUrl: "uplDesc.php"
        });
        </script>

</body>
</html>