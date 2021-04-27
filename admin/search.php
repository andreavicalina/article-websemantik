<?php
    include "../connection.php";

    if (empty($_SESSION['username'])) {
        header ("Location: ../error.php");
        die;
    }

    require_once "../lib/EasyRdf.php";

    EasyRdf_Namespace::set('wd', 'http://www.wikidata.org/entity/');
    EasyRdf_Namespace::set('wdt', 'http://www.wikidata.org/prop/direct/');
    EasyRdf_Namespace::set('wikibase', 'http://wikiba.se/ontology#');
    EasyRdf_Namespace::set('p', 'http://www.wikidata.org/prop/');
    EasyRdf_Namespace::set('ps', 'http://www.wikidata.org/prop/statement/');
    EasyRdf_Namespace::set('pq', 'http://www.wikidata.org/prop/qualifier/');
    EasyRdf_Namespace::set('bd', 'http://www.bigdata.com/rdf#');
    EasyRdf_Namespace::set('owl', 'http://www.w3.org/2002/07/owl#');
    EasyRdf_Namespace::set('rdfs', 'http://www.w3.org/2000/01/rdf-schema#');
    EasyRdf_Namespace::set('foaf', 'http://xmlns.com/foaf/0.1/');
    EasyRdf_Namespace::set('dct', 'http://purl.org/dc/terms/');
    EasyRdf_Namespace::set('dbpedia-owl', 'http://dbpedia.org/ontology/');

    EasyRdf_Namespace::set('rdf', 'http://www.w3.org/1999/02/22-rdf-syntax-ns#');
    EasyRdf_Namespace::set('dbo', 'http://dbpedia.org/ontology/');
    EasyRdf_Namespace::set('geo', 'http://www.w3.org/2003/01/geo/wgs84_pos#');

    $sparql = new EasyRdf_Sparql_Client('https://query.wikidata.org/sparql');
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
                                <a class="nav-link color-red-hover" href="home.php">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link color-aqua-hover active" href="search.php">Discover</a>
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

<!-- SEARCH SECTION -->
        <section class="section">
            <div class="container">
                <!-- search bar -->
               <form method="post" action="">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Search your favorite singer..." name="lokasi">

                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="submit" name="btnsearch">Search</button>
                        </div>

                    </div>
                    <small><strong>(Please Input In Lowercase!)</strong></small>
                </form>
                <!-- end search bar -->
                <?php
                if(isset($_POST['lokasi']))
                { 
                        $nama = $_POST['lokasi'];

                        $result = $sparql->query (
                            'SELECT DISTINCT ?itemLabel ?dob ?web ?negaraLabel ?pobLabel ?residenceLabel ?start ?realLabel WHERE{ '.
                            '?item wdt:P31 wd:Q5.'.
                            '?item wdt:P106 wd:Q177220.'.
                            '?item rdfs:label ?itemLabel.'.
                            'FILTER(CONTAINS(LCASE(?itemLabel), "'.$nama.'"@en)).'.
                            '?item wdt:P27 ?negara.'.
                            ' OPTIONAL{ '.
                            '?item wdt:P569 ?dob.'. ' }'.
                            ' OPTIONAL{ '.
                            '?item wdt:P19 ?pob.'. ' }'.
                            ' OPTIONAL{ '.
                            '?item wdt:P551 ?residence.'. ' }'.
                            ' OPTIONAL{ '.
                            '?item wdt:P2031 ?start.'. ' }'.
                            ' OPTIONAL{ '.
                            '?item wdt:P1477 ?real.'. ' }'.
                            ' OPTIONAL{ '.
                            '?item wdt:P856 ?web.'. ' }'.
                                 
                            'SERVICE wikibase:label { bd:serviceParam wikibase:language "[AUTO_LANGUAGE],en". }'.
                            '} LIMIT 1'
                            
                        );
                ?>
                <?php   if($result != null) { ?>
                        <table class="table table-hover mt-3">
                            <thead>
                                <tr>
                                    
                                    <th scope="col">Name</th>
                                    <th scope="col">Info</th>
                                    <th scope="col">Official Web</th>
                                </tr>
                            </thead>
                <?php
                        
                        foreach ($result as $row) {
                ?>
                            <tbody>
                                <tr>
                                    
                                    <td style="max-width: 150px"><?= $row->itemLabel ?></td>
                                    <td>
                <?php
                    if(isset($row->dob)){
                        $array = array('dob'=>str_replace('T00:00:00Z', '', ucwords($row->dob)));
                    }
                ?>
                <?php
                    if (isset($row->start)) {
                        $arrayS = array('start'=>str_replace('T00:00:00Z', '', ucwords($row->start))); }
                ?>
                                        <?php if (isset($row->realLabel)) { ?>
                                                Real name is <?php echo $row->realLabel, '. <br>' ?>
                                        <?php }else { ?>
                                                Real name is <?php echo $row->itemLabel, '. <br>' ?>
                                        <?php   } ?>
                                        <?php if ($array['dob'] != null) { ?>
                                        Born on <?= $array['dob'] ?>,
                                        <?php } ?>
                                        <?php if (isset($row->pobLabel)) { ?>
                                         in <?= $row->pobLabel, '. ' ?>
                                        <?php }else { ?>
                                        <?php   } ?>
                                        <?php if (isset($arrayS['start'])) { ?>
                                         Started career in <?= $arrayS['start'] ?>.<br>
                                        <?php }else { ?>
                                        <?php   } ?>
                                        <?php if (isset($row->residenceLabel)) { ?>
                                          Current residence at <?= $row->residenceLabel ?>.
                                        <?php }else { ?>
                                        <?php   } ?>
                                        From <?= $row->negaraLabel ?>.
                                       
                                       
                                    </td>
                                    <td>
                                        <?php if (isset($row->web)) { ?>
                                          <a href="<?= $row->web ?>" target="_blank"><?= $row->web ?></a>
                                        <?php }else { ?>
                                        <?php   } ?>
                                    </td>
                                </tr>
                            </tbody>
                <?php
                    }
                ?>
                        </table>
                    <?php   }else { ?>
                        <h3>TIDAK ADA DATA</h3>
                   <?php }  ?>

                <?php   } ?>
            </div><!-- end container -->
        </section>
<!-- SEARCH SECTION-->

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
    <script type="text/javascript">
        var span = document.getElementById("dataCopy");
        function copyTeks(){
            document.execCommand("copy");
            alert(span.textContent + " copied" )
        }
        span.addEventListener("copy", function(event) {
          event.preventDefault();
          if (event.clipboardData) {
            event.clipboardData.setData("text/plain", span.textContent);
            console.log(event.clipboardData.getData("text"))
          }
        });
    </script>

</body>
</html>