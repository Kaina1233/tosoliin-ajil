<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:nuuts_ug.php');
}
else{
if(isset($_GET['del']))
{
$aimag_id=$_GET['del'];
$sql = "delete from aimag WHERE aimag_id=:aimag_id";
$query = $dbh->prepare($sql);
$query -> bindParam(':aimag_id',$aimag_id, PDO::PARAM_STR);
$query -> execute();
$msg="өгөгдөл устлаа";

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
	
	<title>Аялалын систем  | Админ </title>
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

						<h2 class="page-title">Аймгийн мэдээлэл</h2>
						<div class="panel panel-default">
							<div class="panel-body">
							<?php if($error){?><div class="errorWrap"><strong>Алдаа</strong>:<?php echo htmlentities($error); ?> </div><?php } 
				else if($msg){?><div class="succWrap"><strong>Амжилттай</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
								<table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
									<thead>
										<tr>
										<th>Дугаар</th>
											<th>Аймгийн нэр</th>						
											<th>Засах/Устгах</th>
										</tr>
									</thead>
									<tbody>

									<?php $sql = "SELECT * from  aimag ";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{				?>	
										<tr>
											<td><?php echo htmlentities($cnt);?></td>
											<td><?php echo htmlentities($result->aimag_ner);?></td>
<td><a href="aimag_zasah.php?id=<?php echo $result->aimag_id;?>"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;
<a href="aimag_medeelel.php?del=<?php echo $result->aimag_id;?>" onclick="return confirm('Устгах уу?');"><i class="fa fa-close"></i></a></td>
										</tr>
										<?php $cnt=$cnt+1; }} ?>
										
									</tbody>
								</table>

						

							</div>
						</div>

					

					</div>
				</div>

			</div>
		</div>
	</div>
	<script src="js/jquery.min.js"></script>
	<script src="js/main.js"></script>
</body>
</html>
<?php } ?>
