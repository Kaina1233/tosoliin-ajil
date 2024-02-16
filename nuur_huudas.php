<?php 
session_start();
include('includes/config.php');
error_reporting(0);
?>
<!DOCTYPE HTML>
<html lang="en">
<head>

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
   <!-- Including our scripting file. -->
   <script type="text/javascript" src="haah.js"></script>



<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width,initial-scale=1">
<meta name="keywords" content="">
<meta name="description" content="">
<title>Аялалын систем</title>

<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">
<link rel="stylesheet" href="assets/css/csscss.css" type="text/css">
<link rel="stylesheet" href="assets/css/owl.carousel.css" type="text/css">
<link rel="stylesheet" href="assets/css/owl.transitions.css" type="text/css">
<link href="assets/css/slick.css" rel="stylesheet">
<link href="assets/css/bootstrap-slider.min.css" rel="stylesheet">
<link href="assets/css/font-awesome.min.css" rel="stylesheet">
		<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/purple.css" title="purple" media="all" />
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/images/favicon-icon/apple-touch-icon-144-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/images/favicon-icon/apple-touch-icon-114-precomposed.html">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/images/favicon-icon/apple-touch-icon-72-precomposed.png">
<link rel="apple-touch-icon-precomposed" href="assets/images/favicon-icon/apple-touch-icon-57-precomposed.png">
<link rel="shortcut icon" href="assets/images/favicon-icon/favicon.png">
<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet"> 
</head>
<body>
      <!-- header section start -->
      <div class="header_section">
         <div class="header_main">

            <div class="container-fluid">
               <div class="logo"><a href="index.html"><img src=""></a></div>
               <div class="menu_main">
                  <ul>
                     <li class="active"><a href="nuur_huudas.php">Нүүр</a></li>
                     <li><a href="medeelel2.php">Үзэсгэлэнт газар</a></li>
                     <li><a href="amraltiin_gazar.php">Амралтын газар</a></li>
                     <li><a href="bidnii_tuhai.php">Бидний тухай</a></li>
                  </ul>
               </div>
            </div>
         </div>
         <!-- banner section start -->
         <div class="banner_section layout_padding">
            <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
               <div class="carousel-inner">
                  <div class="carousel-item active">
                     <div class="container">
                        
                        
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- banner section end -->
      </div>
</section>


<section class="section-padding gray-bg">
  <div class="container">
    <div class="section-header text-center">
      <h1>Хайсан газараа олоорой.</h1>
      <p> </p>
    </div>     
<?php $sql = "SELECT dursgalt_gazar.DU_ner,dursgalt_gazar.DU_id,dursgalt_gazar.DU_tailbar,dursgalt_gazar.Image1 from dursgalt_gazar";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{  
?>  
<div class="col-list-3">
<div class="recent-car-list">
<div class="car-info-box"> <a href="medeelel.php?vhid=<?php echo htmlentities($result->DU_id);?>"><img src="admin/img/vehicleimages/<?php echo htmlentities($result->Image1);?>" class="img-responsive" alt="image"></a>

</div>
<div class="car-title-m">
<h6><a href="medeelel.php?vhid=<?php echo htmlentities($result->DU_id);?>"><?php echo htmlentities($result->aimag_ner);?>  <?php echo htmlentities($result->DU_ner);?></a></h6>
</div>
<div class="inventory_info_m">
<p><?php echo substr($result->DU_tailbar,0,200);?></p>
</div>
</div>
</div>
<?php }}?>
</div>       
      </div>
    </div>
  </div>
</section>

<?php include('includes/footer.php');?>
<div id="back-top" class="back-top"> <a href="#top"><i class="fa fa-angle-up" aria-hidden="true"></i> </a> </div>

<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script> 
<script src="assets/js/interface.js"></script> 
<script src="assets/switcher/js/switcher.js"></script>
<script src="assets/js/bootstrap-slider.min.js"></script> 
<script src="assets/js/slick.min.js"></script> 
<script src="assets/js/owl.carousel.min.js"></script>
</body>
</html>
