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
$am_image1=$_FILES["img1"]["name"];
move_uploaded_file($_FILES["img1"]["tmp_name"],"img/vehicleimages/".$_FILES["img1"]["name"]);

$sql="INSERT INTO am_gazar(AM_ner,DU_id,AM_medeelel,AM_une,AM_utas,AM_image1) VALUES(:am_ner,:aimag_nerr,:am_medeelel,:am_une,:am_utas,:am_image1)";
$query = $dbh->prepare($sql);
$query->bindParam(':am_ner',$am_ner,PDO::PARAM_STR);
$query->bindParam(':aimag_nerr',$aimag_nerr,PDO::PARAM_STR);
$query->bindParam(':am_medeelel',$am_medeelel,PDO::PARAM_STR);
$query->bindParam(':am_une',$am_une,PDO::PARAM_STR);
$query->bindParam(':am_utas',$am_utas,PDO::PARAM_STR);
$query->bindParam(':am_image1',$am_image1,PDO::PARAM_STR);
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

	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<link rel="stylesheet" href="css/fileinput.min.css">
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
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
									
<?php if($error){?><div class="errorWrap"><strong>Алдаа</strong>:<?php echo htmlentities($error); ?> </div><?php } 
				else if($msg){?><div class="succWrap"><strong>Амжилттай</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>

									<div class="panel-body">
<form method="post" class="form-horizontal" enctype="multipart/form-data">
<div class="form-group">
<label class="col-sm-2 control-label">Амралтын газарын нэр</label>
<div class="col-sm-4">
<input type="text" name="am_ner" class="form-control" required>
</div>
<label class="col-sm-2 control-label">Аймаг сонгох</label>
<div class="col-sm-4">
<select class="selectpicker" name="aimag_nerr" required>
<option value=""> </option>
<?php $ret="select aimag_id,aimag_ner from aimag";
$query= $dbh -> prepare($ret);
//$query->bindParam(':id',$id, PDO::PARAM_STR);
$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);
if($query -> rowCount() > 0)
{
foreach($results as $result)
{
?>
<option value="<?php echo htmlentities($result->aimag_id);?>"><?php echo htmlentities($result->aimag_ner);?></option>
<?php }} ?>

</select>
</div>
</div>
											
<div class="hr-dashed"></div>
<div class="form-group">
<label class="col-sm-2 control-label">Мэдээлэл</label>
<div class="col-sm-10">
<textarea class="form-control" name="am_medeelel" rows="3" required></textarea>
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Үнэ</label>
<div class="col-sm-4">
<input type="text" name="am_une" class="form-control" required>
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Утас</label>
<div class="col-sm-4">
<input type="text" name="am_utas" class="form-control" required>
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
Зураг 1 <input type="file" name="img1" required>
</div>
</div>


<div class="form-group">
</div>

</div>

</div>
<div class="hr-dashed"></div>									
</div>
</div>
</div>
</div>
							






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