
<?php include_once("functions.php");

?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="js/jquery-3.3.1.min.js"></script>
		
	<!-- Latest compiled JavaScript -->
	<script src="bootstrap/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/header.css">
	<link rel="stylesheet" type="text/css" href="css/measurements.css">
	<link rel="stylesheet" type="text/css" href="css/static.css">
	<script type="text/javascript" href="js/main.js"></script>
	
	<!--Slick-->
	<link rel="stylesheet" type="text/css" href="plugins/slick/slick/slick.css"/>
	<link rel="stylesheet" type="text/css" href="plugins/slick/slick/slick-theme.css"/>

	<script type="text/javascript" src="plugins/slick/slick/slick.min.js"></script>
	<!--End -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	
	
	
	<!-- Alertify Plugin -->
	<script src="plugins/alertify/alertify.js"></script>

	<link rel="stylesheet" href="plugins/alertify/css/alertify.min.css" />
	
	<link rel="stylesheet" href="plugins/alertify/css/themes/default.min.css" />
	<!-- End -->
	
	<!-- DataTable plugin -->
	<link rel="stylesheet" href="plugins/DataTables/dataTables.bootstrap.min.css" />
	<script src="plugins/DataTables/jquery.dataTables.min.js" ></script>
	<script src="plugins/DataTables/dataTables.bootstrap.min.js"> </script>
	<!-- End of DataTable -->
	
	<!-- Zoom Plugin -->
<script src="plugins/jquery.elevatezoom.js" type="text/javascript"></script>
	<!-- End of Zoom -->
	
	<!--Custom Select box--> 
<link href="css/select2.min.css" rel="stylesheet" />
<script src="js/select2.min.js"></script>
<!-- End -->

<?php
include_once "header.php";

$getInfo=exec_query("select * from doctor where doc_id=".$_SESSION['doc_id']);
$row=mysqli_fetch_assoc($getInfo);



?>
<script>	</script>
</head>
<body>
<div class="container-fluid">
<div class="row">

<div class="container">

<div class="row">
<form method="post" onsubmit="updateInfo()">
<div class="col-md-2 bottom_margin_20">
<label class="pull-right text_center">First Name:</label>
</div>
<div class="col-md-4 bottom_margin_20"">
<input type="text" class="form-control" name="fname" value="<?php echo $row['fname'];?>">
</div>
<div class="col-md-2 bottom_margin_20"">
<label class="pull-right text_center">Last Name:</label>
</div>
<div class="col-md-4 bottom_margin_20">
<input type="text" class="form-control" name="lname" value="<?php echo $row['lname'];?>">
</div>

<div class="col-md-2 bottom_margin_20"">
<label class="pull-right text_center">Email:</label>
</div>
<div class="col-md-4 bottom_margin_20"">
<input type="email" class="form-control" name="email" value="<?php echo $row['email'];?>">
</div>
<div class="col-md-2 bottom_margin_20"">
<label class="pull-right text_center">Landline:</label>
</div>
<div class="col-md-4 bottom_margin_20"">
<input type="text" class="form-control" name="landline" value="<?php echo $row['landline'];?>">
</div>

<div class="col-md-2 bottom_margin_20"">
<label class="pull-right text_center">Phone:</label>
</div>
<div class="col-md-4 bottom_margin_20"">
<input type="text" class="form-control" name="phone" value="<?php echo $row['phone'];?>">
</div>
<div class="col-md-2 bottom_margin_20"">
<label class="pull-right text_center">Date Of Birth:</label>
</div>
<div class="col-md-4 bottom_margin_20"">
<input type="date" class="form-control" name="dob" value="<?php echo $row['dob'];?>">
</div>
<div class="col-md-12">
<button type="button" class="btn pull-right" style="background-color:#eb0954;color:white;font-weight:bold" name="save-info">SAVE</button>

</div>
</form>
</div>

<div class="row">
<div class="col-md-12">
<div class="white-line"></div>
</div>






</div>


</div>
</div>
</div>

<script>
function updateInfo(){
var form=$("#doctor-info").serliazeArray();
console.log(form);
/* $.ajax({


	
}); */
}

</script>

</body>

