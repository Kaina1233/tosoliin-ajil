<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{ 

if(isset($_POST['submit']))
  {
$am_ner=$_POST['am_ner'];
$aimag_nerr=$_POST['aimag_nerr'];
$am_medeelel=$_POST['am_medeelel'];
$am_une=$_POST['am_une'];
$am_utas=$_POST['am_utas'];

$sql="update am_gazar set AM_ner=:am_ner,DU_id=:aimag_nerr,AM_medeelel=:am_medeelel where AM_id=:id";
$query = $dbh->prepare($sql);
$query->bindParam(':am_ner',$am_ner,PDO::PARAM_STR);
$query->bindParam(':aimag_nerr',$aimag_nerr,PDO::PARAM_STR);
$query->bindParam(':am_medeelel',$am_medeelel,PDO::PARAM_STR);
$query->bindParam(':am_une',$am_une,PDO::PARAM_STR);
$query->bindParam(':am_utas',$am_utas,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
$msg="Аижилттай ";
}
else 
{
$error="Дахин оролдоно уу";
}

}


	?>
<!doctype html>
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="theme-color" content="#3e454c">
	
	<title>Аялалын систем Админ</title>

	<!-- Font awesome -->
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<!-- Sandstone Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- Bootstrap Datatables -->
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<!-- Bootstrap social button library -->
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<!-- Bootstrap select -->
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<!-- Bootstrap file input -->
	<link rel="stylesheet" href="css/fileinput.min.css">
	<!-- Awesome Bootstrap checkbox -->
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<!-- Admin Stye -->
	<link rel="stylesheet" href="css/cssssc.css">
<style>
		.errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #dd3d36;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #5cb85c;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
		</style>

</head>

<body>
	
	<div class="ts-main-content">
	<?php include('includes/hajuu_tses.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">
					
						<h2 class="page-title">Амралтын газар оруулах</h2>

						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-default">
									
<?php if($msg){?><div class="succWrap"><strong>Амжилттай</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>

									<div class="panel-body">
									<?php 
$id=intval($_GET['id']);
$sql ="SELECT am_gazar.*,aimag.aimag_ner,aimag.aimag_id as bid from am_gazar join aimag on aimag.aimag_id=am_gazar.aimag_ner where am_gazar.AM_id=:id";
$query = $dbh -> prepare($sql);
$query-> bindParam(':id', $id, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{	?>										
<form method="post" class="form-horizontal" enctype="multipart/form-data">
<div class="form-group">
<label class="col-sm-2 control-label">Нэршил</label>
<div class="col-sm-4">
<input type="text" name="am_ner" class="form-control" value="<?php echo htmlentities($result->AM_ner)?>" required>
</div>
<label class="col-sm-2 control-label">Аймаг сонгddох</label>
<div class="col-sm-4">
<select class="selectpicker" name="aimag_nerr" required>
<option value="<?php echo htmlentities($result->bid);?>"><?php echo htmlentities($bdname=$result->aimag_ner); ?> </option>
<?php $ret="select aimag_id,aimag_ner from aimag";
$query= $dbh -> prepare($ret);
//$query->bindParam(':id',$id, PDO::PARAM_STR);
$query-> execute();
$resultss = $query -> fetchAll(PDO::FETCH_OBJ);
if($query -> rowCount() > 0)
{
foreach($resultss as $results)
{
if($results->aimag_ner==$bdname)
{
continue;
} else{
?>
<option value="<?php echo htmlentities($results->aimag_id);?>"><?php echo htmlentities($results->aimag_ner);?></option>
<?php }}} ?>

</select>
</div>
</div>
											
<div class="hr-dashed"></div>
<div class="form-group">
<label class="col-sm-2 control-label">Мэдээлэл</label>
<div class="col-sm-10">
<textarea class="form-control" name="am_medeelel" rows="3" required><?php echo htmlentities($result->AM_medeelel);?></textarea>
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Үнэ</label>
<div class="col-sm-4">
<textarea class="form-control" name="am_une" rows="3" required><?php echo htmlentities($result->AM_une);?></textarea>
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Утас</label>
<div class="col-sm-4">
<textarea class="form-control" name="am_utas" rows="3" required><?php echo htmlentities($result->AM_utas);?></textarea>
</div>

<div class="form-group">

<div class="col-sm-4">

</div>

<div class="col-sm-4">

</div>
</div>


<div class="form-group">
<div class="col-sm-4">

</div>
<div class="col-sm-4">

</div>
</div>
<div class="hr-dashed"></div>


<div class="form-group">
<div class="col-sm-12">
<h4><b>Зураг оруулах</b></h4>
</div>
</div>

<div class="form-group">
<div class="col-sm-4">
Зураг 1 <img src="img/vehicleimages/<?php echo htmlentities($result->AM_image1);?>" width="300" height="200" style="border:solid 1px #000">
<a href="zurag_oorchloh1.php?imgid=<?php echo htmlentities($result->AN_id)?>">Зураг 1 солих</a>
</div>
</div>
								
</div>
</div>
</div>
</div>
</div>
</div>

<?php }} ?>				






											<div class="form-group">
												<div class="col-sm-8 col-sm-offset-2">
													<button class="btn btn-default" type="reset">Цуцлах</button>
													<button class="btn btn-primary" name="submit" type="submit">Хадгалах</button>
												</div>
											</div>

										</form>
									</div>
								</div>
							</div>
						</div>
						
					

					</div>
				</div>
				
			

			</div>
		</div>
	</div>

	<!-- Loading Scripts -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap-select.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/Chart.min.js"></script>
	<script src="js/fileinput.js"></script>
	<script src="js/chartData.js"></script>
	<script src="js/main.js"></script>
</body>
</html>
<?php } ?>