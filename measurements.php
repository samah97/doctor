<?php include_once("functions.php");?>
<html>
<head>
    <meta charset="utf-8"> 
	<meta name="viewport" content="width=device-width, initial-scale=1">
	 <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<!-- jQuery library -->
	<script src="js/jquery-3.3.1.min.js"></script>
		
	<!-- Latest compiled JavaScript -->
	<script src="bootstrap/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/header.css">
	<link rel="stylesheet" type="text/css" href="css/measurements.css">

	<script type="text/javascript" href="js/main.js"></script>
	<!--Slick-->
	<link rel="stylesheet" type="text/css" href="plugins/slick/slick/slick.css"/>
	<link rel="stylesheet" type="text/css" href="plugins/slick/slick/slick-theme.css"/>

	<script type="text/javascript" src="plugins/slick/slick/slick.min.js"></script>
	<!--End -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<?php
include_once "header.php";


if(isset($_REQUEST['btn-back'])){
	 $reset=exec_query("delete from temp_presc where session_id='".session_id()."' and patient_id=".$_SESSION['patient_id']);
	 unset($_SESSION['patient_id']);
	 }

if(!isset($_SESSION['patient_id']))
	header("location:patients.php");

$get_patient=exec_query("select * from patients where patient_id=".$_SESSION['patient_id']);
$row_res_patient=mysqli_fetch_array($get_patient);
?>
<body>
<div class="container-fluid">
<div class="row">

<div class="container">
	<div class="row">
	<div class="col-sm-12">
	<form method="post">
	<button type="submit" class="btn" name="btn-back" ><i class="fa fa-arrow-left"></i> Choose Another </button>
	</form>
	</div>

	<div class="col-sm-12 patient-name">
		<h3>Patient: <span style="font-family:cursive;color:green;"><?php echo $row_res_patient['Fname']." ".$row_res_patient['Mname']." ".$row_res_patient['Lname']; ?></span>
		</h3>
	</div>
	</div>

	
	
	<div class="row">
		<div class="col-sm-12  col-md-6 ">
		<form method="post" name="measurements">
		<div class="form-group">
		<table class="table">
		 <tr>
			<td><label for="w">Weight: </label>
			<td><input class="form-control input-sm" type="number" name="weight" id="w" placeholder="in KG">
		<tr>
		<tr>
			<td><label for="h">Height: </label>
			<td><input class="form-control input-sm" type="number" name="height" id="h" placeholder="in CM">
		
			<?php
			if($row_res_patient['dob']<date('Y-m-d')){
			?>
				<tr>
					<td><label for="c">Coronical: </label>
					<td><input type="number" class="form-control input-sm" name="coronical" id="c">
			<?php
			}
			?>
		<tr>
			<td colspan=2><button style="float:right" type="submit" name="add" class="btn btn-success">Add Measurement</button>
		</table>
		</div>
		</form>
		</div>

		<div class="col-sm-12 col-md-6">
		<div class="vaccinations-container">
		<div class="slider-arrows">
		<img src='images/arrow-up.png' class="slick-arrow-up"/>
		<img src='images/arrow-down.png' class="slick-arrow-down"/>
		</div>
		<h4>Vaccinations</h4>
		<div class="vaccinations-slider">
		<?php
			$get_vaccanies=exec_query("select * from vaccination order by vacc_order asc ");

			while($get_vaccanies_result=mysqli_fetch_assoc($get_vaccanies)){
		?>
		<label class="checkbox-container vaccinations-li">

			<?php
			$row="";

			if($_SESSION['lang']=="en"){
				$row.=$get_vaccanies_result['vacc_name_en'];

				if($get_vaccanies_result['from']>0){
				$row.= "&nbsp;&nbsp;<span class='vacc-info small'>(";
				$row.=$get_vaccanies_result['from']." &rarr;".$get_vaccanies_result['to']."&nbsp;";
				$row.=(strcmp($get_vaccanies_result['type'],"m")==0)?'months':'years';
				$row.=")</span>";
				}
				else{

					$row.="&nbsp;&nbsp;<span class='vacc-info small'>(";
					$row.=$get_vaccanies_result['to']."&nbsp;";
					$row.=(strcmp($get_vaccanies_result['type'],"m")==0)?'months':'years';
					$row.=")</span>";
				}

				echo $row;
				}
			else
				echo $get_vaccanies_result['vacc_name_ar'];
		 
		 ?>

			</li>
		<input type="checkbox">
		<span class="checkmark"></span>

		</label>
		<?php } ?>
		</div>	
		</div>
		</div>
		<div class="col-md-12">
		<div class="pull-right">
			<p class="view-all">View All</p>
		</div>
		</div>

	</div>

	<div class="row">
	<div class="col-md-12 grey-line"></div>
	<div class="col-md-6"></div>
	</div>

	<div class="row">
		<div class="col-md-12 text-center">
			<h4>Add A Medical Image</h4>
		</div>
		<form>
		<div class="form-group col-md-4 col-md-offset-4">
			<input type='file' class='form-control' name='image-upload'>
			<input type='submit' name='upload' class='form-control'/>
		</div>
		</form>

	</div>
	
</div>
</div>
</div>

<script>
$(document).ready(function(){




$('img.slick-arrow-up').click(function(){
$('.vaccinations-slider').slick('slickPrev');
});

$('img.slick-arrow-down').click(function(){
$('.vaccinations-slider').slick('slickNext');
});

$('.vaccinations-slider').slick({
 infinite: false,
  slidesToShow: 4,
  slidesToScroll: 4,
  arrows:false,
  vertical:true,


});
	
})

</script>
	<?php
	if(isset($_REQUEST['add'])){
		print_r($_REQUEST);
		$ins_meas=exec_query("insert into measurements values(null,".$_SESSION['patient_id'].",".$_REQUEST['height'].",".$_REQUEST['weight'].",".$_REQUEST['coronical']." )");	
	}
	
	
	
	?>