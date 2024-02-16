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
$du_ner=$_POST['du_ner'];
$aimag_nerr=$_POST['aimag_nerr'];
$du_tailbar=$_POST['du_tailbar'];
$image1=$_FILES["img1"]["name"];
$image2=$_FILES["img2"]["name"];
$image3=$_FILES["img3"]["name"];
move_uploaded_file($_FILES["img1"]["tmp_name"],"img/vehicleimages/".$_FILES["img1"]["name"]);
move_uploaded_file($_FILES["img2"]["tmp_name"],"img/vehicleimages/".$_FILES["img2"]["name"]);
move_uploaded_file($_FILES["img3"]["tmp_name"],"img/vehicleimages/".$_FILES["img3"]["name"]);

$sql="INSERT INTO dursgalt_gazar(DU_ner,aimag_ner,DU_tailbar,Image1,Image2,Image3) VALUES(:du_ner,:aimag_nerr,:du_tailbar,:image1,:image2,:image3)";
$query = $dbh->prepare($sql);
$query->bindParam(':du_ner',$du_ner,PDO::PARAM_STR);
$query->bindParam(':aimag_nerr',$aimag_nerr,PDO::PARAM_STR);
$query->bindParam(':du_tailbar',$du_tailbar,PDO::PARAM_STR);
$query->bindParam(':image1',$image1,PDO::PARAM_STR);
$query->bindParam(':image2',$image2,PDO::PARAM_STR);
$query->bindParam(':image3',$image3,PDO::PARAM_STR);
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
					
						<h2 class="page-title">Пост оруулах</h2>

						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-default">
									
<?php if($error){?><div class="errorWrap"><strong>Алдаа</strong>:<?php echo htmlentities($error); ?> </div><?php } 
				else if($msg){?><div class="succWrap"><strong>Амжилттай</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>

									<div class="panel-body">
<form method="post" class="form-horizontal" enctype="multipart/form-data">
<div class="form-group">
<label class="col-sm-2 control-label">Нэршил</label>
<div class="col-sm-4">
<input type="text" name="du_ner" class="form-control" required>
</div>
<label class="col-sm-2 control-label">Аймаг сонгох</label>
<div class="col-sm-4">
<select class="selectpicker" name="aimag_nerr" required>
<option value=""> </option>
<?php $ret="select aimag_id,aimag_ner from aimag";
$query= $dbh -> prepare($ret);

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
<label class="col-sm-2 control-label">Тайлбар</label>
<div class="col-sm-10">
<textarea class="form-control" name="du_tailbar" rows="3" required></textarea>
</div>
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
<div class="col-sm-4">
Зураг 2<input type="file" name="img2" required>
</div>
<div class="col-sm-4">
Зураг 3<input type="file" name="img3" required>
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