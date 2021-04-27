<?php
    include "connection.php";
    require_once realpath(__DIR__.'')."/vendor/autoload.php";
    require_once __DIR__."/html_tag_helpers.php";

    \EasyRdf\RdfNamespace::set('wd', 'http://www.wikidata.org/entity/');
\EasyRdf\RdfNamespace::set('wdt', 'http://www.wikidata.org/prop/direct/');
\EasyRdf\RdfNamespace::set('wikibase', 'http://wikiba.se/ontology#');
\EasyRdf\RdfNamespace::set('p', 'http://www.wikidata.org/prop/');
\EasyRdf\RdfNamespace::set('ps', 'http://www.wikidata.org/prop/statement/');
\EasyRdf\RdfNamespace::set('pq', 'http://www.wikidata.org/prop/qualifier/');
\EasyRdf\RdfNamespace::set('bd', 'http://www.bigdata.com/rdf#');
\EasyRdf\RdfNamespace::set('owl', 'http://www.w3.org/2002/07/owl#');
\EasyRdf\RdfNamespace::set('rdfs', 'http://www.w3.org/2000/01/rdf-schema#');
\EasyRdf\RdfNamespace::set('foaf', 'http://xmlns.com/foaf/0.1/');
\EasyRdf\RdfNamespace::set('dct', 'http://purl.org/dc/terms/');
\EasyRdf\RdfNamespace::set('dbpedia-owl', 'http://dbpedia.org/ontology/');

\EasyRdf\RdfNamespace::set('rdf', 'http://www.w3.org/1999/02/22-rdf-syntax-ns#');
\EasyRdf\RdfNamespace::set('dbo', 'http://dbpedia.org/ontology/');
\EasyRdf\RdfNamespace::set('geo', 'http://www.w3.org/2003/01/geo/wgs84_pos#');
\EasyRdf\RdfNamespace::set('dbr', 'http://dbpedia.org/resource/');
\EasyRdf\RdfNamespace::set('dbp', 'http://dbpedia.org/property/');

$sparql = new \EasyRdf\Sparql\Client('http://linkeddata.uriburner.com/sparql/');
$result = $sparql->query('
SELECT ?itemLabel ?lokasi ?negaralebel  ?link ?kotaLabel ?foto ?fb ?berdiri
{ 
SERVICE <http://query.wikidata.org/sparql> 
{ SELECT ?item ?itemLabel ?lokasi ?link ?foto ?kotaLabel ?negaralebel ?fb ?berdiri WHERE{
      ?item wdt:P31 wd:Q3918.
      ?item wdt:P17 ?negara.
      ?item rdfs:label ?itemLabel.
      ?item wdt:P131 ?kota.
      OPTIONAL{
      ?item wdt:P154 ?foto.
      }
      OPTIONAL{
      ?item wdt:P571 ?berdiri.
      }
      OPTIONAL{
        ?item wdt:P2013 ?fb.
        }
        OPTIONAL{
            ?item wdt:P856 ?link.
            }
      ?item wdt:P625 ?lokasi.
      ?negara rdfs:label ?negaralebel.
      FILTER(?item = wd:Q4200341)
      FILTER(CONTAINS(LCASE(?itemLabel), "universitas"@id)).
      FILTER(CONTAINS(LCASE(?negaralebel), "indonesia"@id)).
      FILTER(CONTAINS(LCASE(?itemLabel), "universitas"@id)).
      SERVICE wikibase:label { bd:serviceParam wikibase:language "[AUTO_LANGUAGE],en". bd:serviceParam wikibase:language "[AUTO_LANGUAGE],id". } 
    }
} } LIMIT 1

');
foreach ($result as $key2):
    $array2 = array('lokasi'=>str_replace('POINT', '', ucwords($key2->lokasi)));
    $array3 = array('lokasi' =>str_replace(')', '', ucwords($array2["lokasi"])));
    $array4 = array('lokasi' =>str_replace('(', '', ucwords($array3["lokasi"])));
    $array5 = array('lokasi' =>str_replace(' -', ' ', ucwords($array4["lokasi"])));
    $pattern = '/(\d+) (\d+).(\d+)/i'; 
    $replacement = '$1 '; 
    $pattern1 = '/(\d+).(\d+) /i';
    $replacement1 = '';
      
    // print output of function 
    $array6 = array(
      'long' => preg_replace($pattern, $replacement, $array5["lokasi"]),
      'lat' => preg_replace($pattern1, $replacement1, $array4["lokasi"])
    );
    // echo preg_replace($pattern, $replacement, $array5["lokasi"]).'<br>'; 
    // echo preg_replace($pattern1, $replacement1, $array4["lokasi"]).'<br>'; 
    // $array6 = $array5["lokasi"];
    // list($a, $b) = $array6;
    // $array6 = array('lokasi' =>str_replace('(', '', ucwords($array4["lokasi"])));
    // echo "Lat: $b Long: $a <br>";
    // echo $array5["lokasi"].'<br>';
    endforeach;
        
        ?>
?>
<!DOCTYPE html>
<html lang="en">

<head>
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
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css"
   integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
   crossorigin=""/>

  <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"
   integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew=="
   crossorigin=""></script>
   <style media="screen">
  #mapid { height: 400px;     z-index: 1;}
  </style>
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
                                <a class="nav-link color-yellow-hover" href="team.php">Teams</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link color-red-hover active" href="base.php">Our Base</a>
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
<?php foreach($result as $data): 

    ?>

    <div class="container-fluid mt-5">
        <div align="center">
            <h3><?php echo $data->itemLabel ?></h3>
        </div>
        
    </div>

    <!--================Product Description Area =================-->
    <section class="product_description_area" data-aos="fade-down" data-aos-duration="2000">
        <div class="container">
            <!-- <div  id="mapBox" class="mapBox" data-lat="40.701083" data-lon="-74.1522848" data-zoom="13" data-info="PO Box CT16122 Collins Street West, Victoria 8007, Australia."
            data-mlat="40.701083" data-mlon="-74.1522848">
           </div> -->
           <div id="mapid" class="map map-home"></div>
        </div>
    </section>
    <!--================End Product Description Area =================-->
    <div class="container-fluid mt-3">
        <div align="center">
            <h3> Lokasi : <?php echo $data->kotaLabel ?>, <?php echo $data->negaralebel ?></h3>
            <h3> Berdiri : <?php 
                $kar = $data->berdiri;
                $kara = substr($kar,0,10);
                echo $kara;
                 ?></h3>
             <h3>Official Website : <a href="<?php echo $data->link ?>"><?php echo $data->itemLabel ?></a></h3>
        </div>
        
    </div>

    
    <?php endforeach ?>

       



<!-- FOOTER -->
        <footer class="footer mt-5">
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

    <script src="js/vendor/jquery-2.2.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
     crossorigin="anonymous"></script>
    <script src="js/vendor/bootstrap.min.js"></script>
    <script src="js/jquery.ajaxchimp.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <script src="js/nouislider.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <!--gmaps Js-->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
    <script src="js/gmaps.min.js"></script>
    <script src="js/main.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <script>
        AOS.init();
      </script>
<script type="text/javascript">

var map = L.map('mapid').setView([<?php echo $array6["lat"]; ?>, <?php echo $array6["long"]; ?>], 5);



L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map);

<?php 
foreach ($result as $key2):
$array2 = array('lokasi'=>str_replace('POINT', '', ucwords($key2->lokasi)));
$array3 = array('lokasi' =>str_replace(')', '', ucwords($array2["lokasi"])));
$array4 = array('lokasi' =>str_replace('(', '', ucwords($array3["lokasi"])));
$array5 = array('lokasi' =>str_replace(' -', ' ', ucwords($array4["lokasi"])));
$pattern = '/(\d+) (\d+).(\d+)/i'; 
$replacement = '$1 '; 
$pattern1 = '/(\d+).(\d+) /i';
$replacement1 = '';

// print output of function 
$array6 = array(
'long' => preg_replace($pattern, $replacement, $array5["lokasi"]),
'lat' => preg_replace($pattern1, $replacement1, $array4["lokasi"])
);

?>

var marker = L.marker([<?php echo $array6["lat"]; ?>, <?php echo $array6["long"]; ?>]).addTo(map);
<?php if (isset($key2->namaUniv)) { ?>
    marker.bindPopup('<b><?php echo $key2->namaUniv; ?></b><br>').openPopup();
<?php } else { ?>
    marker.bindPopup('<b><?php echo $key2->itemLabel; ?></b><br>').openPopup();
<?php } ?>
<?php endforeach; ?>

</script>

</body>
</html>