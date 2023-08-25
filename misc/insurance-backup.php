<?php
session_start(); 
if(!$_SESSION['sesion_userrole']) { header("Location: http://s343786261.onlinehome.us/hrportal-dev/login"); }
include("header.php");
include("common.php");
ini_set('display_errors', '1');
$ecode = base64_decode($_SESSION['sesion_username']);
$msg1 = '';
if(isset($_POST['submit']))
{
		$e_code = $ecode;
		$e_package = $_POST['package'];
		$e_name = $_POST['self_name'];
		$e_dob = $_POST['self_dob'];
		$age1 = date_diff(date_create($e_dob), date_create('today'))->y;
		$e_age = $age1;
		$e_aadhar_no = $_POST['self_aadhar'];
		$e_marital_status = $_POST['marital_status'];
		$e_spouse = $_POST['spouse'];
		$e_spouse_name = $_POST['spouse_name'];
		$e_spouse_dob = $_POST['spouse_dob'];
		$age2 = date_diff(date_create($e_spouse_dob), date_create('today'))->y;
		$e_spouse_age = $age2;
		$e_spouse_aadhar_no = $_POST['spouse_aadhar'];
		$e_child_status = $_POST['siblings'];
		$e_child1 = $_POST['child1'];
		$e_child1_name = $_POST['chl1_name'];
		$e_child1_dob = $_POST['child1_dob'];
		$age3 = date_diff(date_create($e_child1_dob), date_create('today'))->y;
		$e_child1_age = $age3;
		$e_child1_aadhar_no = $_POST['child1_aadhar'];
		$e_child2 = $_POST['child2'];
		$e_child2_name = $_POST['chl2_name'];
		$e_child2_dob = $_POST['child2_dob'];
		$age4 = date_diff(date_create($e_child2_dob), date_create('today'))->y;
		$e_child2_age = $age4;
		$e_child2_aadhar_no = $_POST['child2_aadhar'];
		$e_child3 = $_POST['child3'];
		$e_child3_name = $_POST['chl3_name'];
		$e_child3_dob = $_POST['child3_dob'];
		$age5 = date_diff(date_create($e_child3_dob), date_create('today'))->y;
		$e_child3_age = $age5;
		$e_child3_aadhar_no = $_POST['child3_aadhar'];
		
		$e_child4 = $_POST['child4'];
		$e_child4_name = $_POST['chl4_name'];
		$e_child4_dob = $_POST['child4_dob'];
		$age5_1 = date_diff(date_create($e_child4_dob), date_create('today'))->y;
		$e_child4_age = $age5_1;
		$e_child4_aadhar_no = $_POST['child4_aadhar'];
		
		$e_parents_status = $_POST['parents'];
		$e_parent1 = $_POST['parent1'];
		$e_parent1_name = $_POST['parent1_name'];
		$e_parent1_dob = $_POST['parent1_dob'];
		$age6 = date_diff(date_create($e_parent1_dob), date_create('today'))->y;
		$e_parent1_age = $age6;
		$e_parent1_aadhar_no = $_POST['parent1_aadhar'];
		$e_parent2 = $_POST['parent2'];
		$e_parent2_name = $_POST['parent2_name'];
		$e_parent2_dob = $_POST['parent2_dob'];
		$age7 = date_diff(date_create($e_parent2_dob), date_create('today'))->y;
		$e_parent2_age = $age7;
		$e_parent2_aadhar_no = $_POST['parent2_aadhar'];
		$date = date('Y-m-d H:i:s');
// Creating a Directory with Employee Code.
if(!file_exists($e_code)) {
  $directory = mkdir('EHIS/'.$e_code, 0777, true);
  $targetDir = "EHIS/".$e_code;
}
// File upload path.
$targetDir = "EHIS/".$e_code."/";
/* File Uploading Code Starts Here. */	
if(!empty($_FILES['self_aadharImg']['name'])){
$e_self_aadharImg_fileName = basename($_FILES['self_aadharImg']['name']);
$temp_name = $_FILES['self_aadharImg']['tmp_name'];
$targetFilePath = $targetDir.$e_self_aadharImg_fileName;
//$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
move_uploaded_file($temp_name, $targetFilePath);
}
if(!empty($_FILES['spouse_aadharImg']['name'])){
$e_spouse_aadharImg_fileName = basename($_FILES['spouse_aadharImg']['name']);
$temp_name1 = $_FILES['spouse_aadharImg']['tmp_name'];
$targetFilePath1 = $targetDir . $e_spouse_aadharImg_fileName;
move_uploaded_file($temp_name1, $targetFilePath1);
}
if(!empty($_FILES['chl1_aadharImg']['name'])){
$e_chl1_aadharImg_fileName = basename($_FILES['chl1_aadharImg']['name']);
$temp_name2 = $_FILES['chl1_aadharImg']['tmp_name'];
$targetFilePath2 = $targetDir . $e_chl1_aadharImg_fileName;
move_uploaded_file($temp_name2, $targetFilePath2);
}
if(!empty($_FILES['chl2_aadharImg']['name'])){
$e_chl2_aadharImg_fileName = basename($_FILES['chl2_aadharImg']['name']);
$temp_name3 = $_FILES['chl2_aadharImg']['tmp_name'];
$targetFilePath3 = $targetDir . $e_chl2_aadharImg_fileName;
move_uploaded_file($temp_name3, $targetFilePath3);
}


if(!empty($_FILES['chl3_aadharImg']['name'])){
$e_chl3_aadharImg_fileName = basename($_FILES['chl3_aadharImg']['name']);
$temp_name3_1 = $_FILES['chl3_aadharImg']['tmp_name'];
$targetFilePath3_1 = $targetDir . $e_chl3_aadharImg_fileName;
move_uploaded_file($temp_name3_1, $targetFilePath3_1);
}

if(!empty($_FILES['chl4_aadharImg']['name'])){
$e_chl4_aadharImg_fileName = basename($_FILES['chl4_aadharImg']['name']);
$temp_name4_1 = $_FILES['chl4_aadharImg']['tmp_name'];
$targetFilePath4_1 = $targetDir . $e_chl4_aadharImg_fileName;
move_uploaded_file($temp_name4_1, $targetFilePath4_1);
}


if(!empty($_FILES['parent1_aadharImg']['name'])){
$e_parent1_aadharImg_fileName = basename($_FILES['parent1_aadharImg']['name']);
$temp_name4 = $_FILES['parent1_aadharImg']['tmp_name'];
$targetFilePath4 = $targetDir . $e_parent1_aadharImg_fileName;
move_uploaded_file($temp_name4, $targetFilePath4);
}
if(!empty($_FILES['parent2_aadharImg']['name'])){
$e_parent2_aadharImg_fileName = basename($_FILES['parent2_aadharImg']['name']);
$temp_name5 = $_FILES['parent2_aadharImg']['tmp_name'];
$targetFilePath5 = $targetDir . $e_parent2_aadharImg_fileName;
move_uploaded_file($temp_name5, $targetFilePath5);
}
/* File Uploading Code Ends Here. */
		$sql_insert = mysqli_query($con, "INSERT INTO emp_EHS_insurance (t_id, emp_id, emp_name, emp_dob, emp_insure_package, emp_age, emp_aadhar_no, emp_aadhar_img, emp_marital_status, emp_spouse_name, emp_spouse_dob, emp_spouse_age, emp_spouse_aadhar_no, emp_spouse_aadhar_img, emp_children_status, emp_child1, emp_child1_name, emp_child1_dob, emp_child1_age, emp_child1_aadhar_no,  emp_child1_aadhar_img, emp_child2, emp_child2_name, emp_child2_dob, emp_child2_age, emp_child2_aadhar_no, emp_child2_aadhar_img, emp_child3, emp_child3_name, emp_child3_dob, emp_child3_age, emp_child3_aadhar_no, emp_child3_aadhar_img,emp_child4, emp_child4_name, emp_child4_dob, emp_child4_age, emp_child4_aadhar_no, emp_child4_aadhar_img, emp_parents_included, emp_parent1, emp_parent1_name, emp_parent1_dob, emp_parent1_age, emp_parent1_aadhar_no, emp_parent1_aadhar_img, emp_parent2, emp_parent2_name, emp_parent2_dob, emp_parent2_age, emp_parent2_aadhar_no, emp_parent2_aadhar_img, period, submitted_on) VALUES ('','$e_code','$e_name','$e_dob','$e_package','$e_age','$e_aadhar_no','$e_self_aadharImg_fileName','$e_marital_status','$e_spouse_name','$e_spouse_dob','$e_spouse_age','$e_spouse_aadhar_no','$e_spouse_aadharImg_fileName','$e_child_status','$e_child1','$e_child1_name','$e_child1_dob','$e_child1_age','$e_child1_aadhar_no','$e_chl1_aadharImg_fileName','$e_child2','$e_child2_name','$e_child2_dob','$e_child2_age','$e_child2_aadhar_no','$e_chl2_aadharImg_fileName','$e_child3','$e_child3_name','$e_child3_dob','$e_child3_age','$e_child3_aadhar_no','$e_chl3_aadharImg_fileName','$e_child4','$e_child4_name','$e_child4_dob','$e_child4_age','$e_child4_aadhar_no','$e_chl4_aadharImg_fileName','$e_parents_status','$e_parent1','$e_parent1_name','$e_parent1_dob','$e_parent1_age','$e_parent1_aadhar_no','$e_parent1_aadharImg_fileName','$e_parent2','$e_parent2_name','$e_parent2_dob','$e_parent2_age','$e_parent2_aadhar_no','$e_parent2_aadharImg_fileName','2021-2022','$date')") or die(mysqli_error($con));
			if($sql_insert){
				$msg="<font color='blue'><b>Details submitted successfully.</b></font>";
			}
			else
			{
				$msg="<font color='red'><b>Details submission failed.</b></font>";
			}
		}
// Updation Code Starts Here.
if(isset($_POST['updateDetails']))
{	
$targetDir = "EHIS/".$ecode."/";
$qry_in_update = mysqli_query($con, "SELECT e1.* FROM emp_EHS_insurance e1 WHERE e1.submitted_on = (SELECT MAX(e2.submitted_on) FROM emp_EHS_insurance e2 WHERE e2.emp_id = '".$ecode."') AND e1.emp_id = '".$ecode."'") or die (mysqli_error($con));
$result_in_update = mysqli_fetch_array($qry_in_update);
		$e_code = $ecode;
		$e_name = $_POST['self_name'];
		$e_package = $_POST['package'];
		$e_dob = $_POST['self_dob'];
		$age1 = date_diff(date_create($e_dob), date_create('today'))->y;
		$e_age = $age1;
		$e_aadhar_no = $_POST['self_aadhar'];
		if(!empty($_FILES['self_aadharImg']['name'])){
			$e_self_aadharImg_fileName = basename($_FILES['self_aadharImg']['name']);
			$temp_name = $_FILES['self_aadharImg']['tmp_name'];
			$targetFilePath = $targetDir.$e_self_aadharImg_fileName;
			move_uploaded_file($temp_name, $targetFilePath);
		}else{
			$e_self_aadharImg_fileName = $result_in_update['emp_aadhar_img'];	
		}
		$e_marital_status = $_POST['marital_status'];
		if($e_marital_status == 'married'){
			$e_spouse = $_POST['spouse'];
			$e_spouse_name = $_POST['spouse_name'];
			$e_spouse_dob = $_POST['spouse_dob'];
			$age2 = date_diff(date_create($e_spouse_dob), date_create('today'))->y;
			$e_spouse_age = $age2;
			$e_spouse_aadhar_no = $_POST['spouse_aadhar'];
			
			if(!empty($_FILES['spouse_aadharImg']['name'])){
				$e_spouse_aadharImg_fileName = basename($_FILES['spouse_aadharImg']['name']);
				$temp_name1 = $_FILES['spouse_aadharImg']['tmp_name'];
				$targetFilePath1 = $targetDir . $e_spouse_aadharImg_fileName;
				move_uploaded_file($temp_name1, $targetFilePath1);
			}else{
				$e_spouse_aadharImg_fileName = $result_in_update['emp_spouse_aadhar_img'];	
			}
			
		}else if($e_marital_status == 'unmarried'){
			$e_spouse = '';
			$e_spouse_name = '';
			$e_spouse_age = '';
			$e_spouse_aadharImg_fileName = $_FILES['spouse_aadharImg']['name'] = '';
		}
		$e_child_status = $_POST['siblings'];
		if($e_child_status == 'yes'){
			$e_child1 = $_POST['child1'];
			$e_child1_name = $_POST['chl1_name'];
			$e_child1_dob = $_POST['child1_dob'];
			$age3 = date_diff(date_create($e_child1_dob), date_create('today'))->y;
			$e_child1_age = $age3;
			$e_child1_aadhar_no = $_POST['child1_aadhar'];
			if(!empty($_FILES['chl1_aadharImg']['name'])){
				$e_chl1_aadharImg_fileName = basename($_FILES['chl1_aadharImg']['name']);
				$temp_name2 = $_FILES['chl1_aadharImg']['tmp_name'];
				$targetFilePath2 = $targetDir . $e_chl1_aadharImg_fileName;
				move_uploaded_file($temp_name2, $targetFilePath2);
			}else{
				$e_chl1_aadharImg_fileName = $result_in_update['emp_child1_aadhar_img'];	
			}
			$e_child2 = $_POST['child2'];
			$e_child2_name = $_POST['chl2_name'];
			$e_child2_dob = $_POST['child2_dob'];
			$age4 = date_diff(date_create($e_child2_dob), date_create('today'))->y;
			$e_child2_age = $age4;
			$e_child2_aadhar_no = $_POST['child2_aadhar'];
			if(!empty($_FILES['chl2_aadharImg']['name'])){
				$e_chl2_aadharImg_fileName = basename($_FILES['chl2_aadharImg']['name']);
				$temp_name3 = $_FILES['chl2_aadharImg']['tmp_name'];
				$targetFilePath3 = $targetDir . $e_chl2_aadharImg_fileName;
				move_uploaded_file($temp_name3, $targetFilePath3);
			}else{
				$e_chl2_aadharImg_fileName = $result_in_update['emp_child2_aadhar_img'];	
			}
			$e_child3 = $_POST['child3'];
			$e_child3_name = $_POST['chl3_name'];
			$e_child3_dob = $_POST['child3_dob'];
			$age5 = date_diff(date_create($e_child3_dob), date_create('today'))->y;
			$e_child3_age = $age5;  //$_POST['child3_age'];
			$e_child3_aadhar_no = $_POST['child3_aadhar'];
			
			
			if(!empty($_FILES['chl3_aadharImg']['name'])){
				$e_chl3_aadharImg_fileName = basename($_FILES['chl3_aadharImg']['name']);
				$temp_name3_1 = $_FILES['chl3_aadharImg']['tmp_name'];
				$targetFilePath3_1 = $targetDir . $e_chl3_aadharImg_fileName;
				move_uploaded_file($temp_name3_1, $targetFilePath3_1);
			}else{
				$e_chl3_aadharImg_fileName = $result_in_update['emp_child3_aadhar_img'];	
			}
			$e_child4 = $_POST['child4'];
			$e_child4_name = $_POST['chl4_name'];
			$e_child4_dob = $_POST['child4_dob'];
			$age51 = date_diff(date_create($e_child4_dob), date_create('today'))->y;
			$e_child4_age = $age51;  //$_POST['child3_age'];
			$e_child4_aadhar_no = $_POST['child4_aadhar'];
			
			
			if(!empty($_FILES['chl4_aadharImg']['name'])){
				$e_chl4_aadharImg_fileName = basename($_FILES['chl4_aadharImg']['name']);
				$temp_name4_1 = $_FILES['chl4_aadharImg']['tmp_name'];
				$targetFilePath4_1 = $targetDir . $e_chl4_aadharImg_fileName;
				move_uploaded_file($temp_name4_1, $targetFilePath4_1);
			}else{
				$e_chl4_aadharImg_fileName = $result_in_update['emp_child4_aadhar_img'];	
			}
				
		}else{
			$e_child1 = '';
			$e_child1_name = '';
			$e_child1_age = '';
			$e_child1_aadhar_no = '';
			$e_child2 = '';
			$e_child2_name = '';
			$e_child2_age = '';
			$e_child2_aadhar_no = '';
			$e_child3 = '';
			$e_child3_name = '';
			$e_child3_age = '';
			$e_child3_aadhar_no = '';
			$e_child4 = '';
			$e_child4_name = '';
			$e_child4_age = '';
			$e_child4_aadhar_no = '';
		}
		$e_parents_status = $_POST['parents'];
		if($e_parents_status == 'yes'){
			$e_parent1 = $_POST['parent1'];
			$e_parent1_name = $_POST['parent1_name'];
			$e_parent1_dob = $_POST['parent1_dob'];
			$age6 = date_diff(date_create($e_parent1_dob), date_create('today'))->y;
			$e_parent1_age = $age6;
			$e_parent1_aadhar_no = $_POST['parent1_aadhar'];
			$e_parent2 = $_POST['parent2'];
			$e_parent2_name = $_POST['parent2_name'];
			$e_parent2_dob = $_POST['parent2_dob'];
			$age7 = date_diff(date_create($e_parent2_dob), date_create('today'))->y;
			$e_parent2_age = $age7;
			$e_parent2_aadhar_no = $_POST['parent2_aadhar'];
			if(!empty($_FILES['parent1_aadharImg']['name'])){
				$e_parent1_aadharImg_fileName = basename($_FILES['parent1_aadharImg']['name']);
				$temp_name4 = $_FILES['parent1_aadharImg']['tmp_name'];
				$targetFilePath4 = $targetDir . $e_parent1_aadharImg_fileName;
				move_uploaded_file($temp_name4, $targetFilePath4);
			}else{
				$e_parent1_aadharImg_fileName = $result_in_update['emp_parent1_aadhar_img'];	
			}
			if(!empty($_FILES['parent2_aadharImg']['name'])){
				$e_parent2_aadharImg_fileName = basename($_FILES['parent2_aadharImg']['name']);
				$temp_name5 = $_FILES['parent2_aadharImg']['tmp_name'];
				$targetFilePath5 = $targetDir . $e_parent2_aadharImg_fileName;
				move_uploaded_file($temp_name5, $targetFilePath5);
			}else{
				$e_parent2_aadharImg_fileName = $result_in_update['emp_parent2_aadhar_img'];
			}
		}else if($e_parents_status == 'no'){
			$e_parent1 = '';
			$e_parent1_name = '';
			$e_parent1_age = '';
			$e_parent1_aadhar_no = '';
			$e_parent1_aadharImg_fileName = $_FILES['parent1_aadharImg']['name'] = '';
			$e_parent2 = '';
			$e_parent2_name = '';
			$e_parent2_age = '';
			$e_parent2_aadhar_no = '';
			$e_parent2_aadharImg_fileName = $_FILES['parent2_aadharImg']['name'] = '';	
		}
		$date = date('Y-m-d H:i:s');
		$sql_update_insert = mysqli_query($con, "INSERT INTO emp_EHS_insurance (t_id, emp_id, emp_name, emp_dob, emp_insure_package, emp_age, emp_aadhar_no, emp_aadhar_img, emp_marital_status, emp_spouse_name, emp_spouse_dob, emp_spouse_age, emp_spouse_aadhar_no, emp_spouse_aadhar_img, emp_children_status, emp_child1, emp_child1_name, emp_child1_dob, emp_child1_age, emp_child1_aadhar_no, emp_child1_aadhar_img, emp_child2, emp_child2_name, emp_child2_dob, emp_child2_age, emp_child2_aadhar_no, emp_child2_aadhar_img, emp_child3, emp_child3_name, emp_child3_dob, emp_child3_age, emp_child3_aadhar_no, emp_child3_aadhar_img, emp_child4, emp_child4_name, emp_child4_dob, emp_child4_age, emp_child4_aadhar_no, emp_child4_aadhar_img, emp_parents_included, emp_parent1, emp_parent1_name, emp_parent1_dob, emp_parent1_age, emp_parent1_aadhar_no, emp_parent1_aadhar_img, emp_parent2, emp_parent2_name, emp_parent2_dob, emp_parent2_age, emp_parent2_aadhar_no, emp_parent2_aadhar_img, period, submitted_on) VALUES ('','$e_code','$e_name','$e_dob','$e_package','$e_age','$e_aadhar_no','$e_self_aadharImg_fileName','$e_marital_status','$e_spouse_name','$e_spouse_dob','$e_spouse_age','$e_spouse_aadhar_no','$e_spouse_aadharImg_fileName','$e_child_status','$e_child1','$e_child1_name','$e_child1_dob','$e_child1_age','$e_child1_aadhar_no','$e_chl1_aadharImg_fileName','$e_child2','$e_child2_name','$e_child2_dob','$e_child2_age','$e_child2_aadhar_no','$e_chl2_aadharImg_fileName','$e_child3','$e_child3_name','$e_child3_dob','$e_child3_age','$e_child3_aadhar_no','$e_chl3_aadharImg_fileName','$e_child4','$e_child4_name','$e_child4_dob','$e_child4_age','$e_child4_aadhar_no','$e_chl4_aadharImg_fileName','$e_parents_status','$e_parent1','$e_parent1_name','$e_parent1_dob','$e_parent1_age','$e_parent1_aadhar_no','$e_parent1_aadharImg_fileName','$e_parent2','$e_parent2_name','$e_parent2_dob','$e_parent2_age','$e_parent2_aadhar_no','$e_parent2_aadharImg_fileName','2021-2022','$date')") or die(mysqli_error($con));
			if($sql_update_insert){
				echo "<br/><div align='center'><font color='blue' ><h3><b>Details updated successfully.</b></h3></font></div>";
				exit;
			}
			else
			{
				echo "<br/><div align='center'><font color='red'><h3><b>Details updation failed.</b></h3></font></div>";
			}
		}		
?>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<div class="tablehead" style="text-align:center;font-size:15pt;">Group Health Insurance&nbsp;(GHI)</div>
<div class="mainbg">
<?php 
$e_code = $ecode;
$targetDir = "EHIS/".$e_code."/";
$qry = mysqli_query($con, "SELECT e1.* FROM emp_EHS_insurance e1 WHERE e1.submitted_on = (SELECT MAX(e2.submitted_on) FROM emp_EHS_insurance e2 WHERE e2.emp_id = '".$e_code."') AND e1.emp_id = '".$e_code."'") or die (mysqli_error($con));

$rowCount = mysqli_num_rows($qry);
if($rowCount > 0 ){
	$emp_insure_details = mysqli_fetch_array($qry);
?>	
<table class="imagetable" border="0" cellspacing="2" cellpadding="3" align="left"width="99%">
<tr><td colspan="8"><b>Employee Insurance Details.</b></td></tr>
<tr>
	<td><b>Employee Insurance Package : </b></td>
	<td><?php echo $emp_insure_details['emp_insure_package'];?></td>
</tr>
<tr>
<td><b>Employee Name : </b></td> 
	<td><?php echo $emp_insure_details['emp_name'];?></td>
	<td><b>Employee DOB : </b></td>
	<td><?php echo $emp_insure_details['emp_dob'];?></td>
	<td><b>Aadhar#: </b></td>
	<td><?php echo $emp_insure_details['emp_aadhar_no'];?></td>
	<td><b>Aadhar Image: </b></td>
	<td><a href="<?php echo $targetDir.$emp_insure_details['emp_aadhar_img'];?>" style="margin-left: 5px;" target="_blank"><b><?php echo $emp_insure_details['emp_aadhar_img'];?></b></a></td>
</tr>
<tr>
	<td><b>Spouse Included? : </b></td>
	<td><?php if($emp_insure_details['emp_marital_status'] == 'unmarried'){echo 'No';} else {echo 'Yes';}?></td>
</tr>
<?php if($emp_insure_details['emp_marital_status'] == 'married'){?>
<tr>
	<td><b>Spouse Name : </b></td>
	<td><?php echo $emp_insure_details['emp_spouse_name'];?></td>
	<td><b>Spouse DOB : </b></td>
	<td><?php echo $emp_insure_details['emp_spouse_dob'];?></td>
	<td><b>Spouse Aadhar#: </b></td>
	<td><?php echo $emp_insure_details['emp_spouse_aadhar_no'];?></td>
	<td><b>Spouse Aadhar Image : </b></td>
	<td><a href="<?php echo $targetDir.$emp_insure_details['emp_spouse_aadhar_img'];?>" style="margin-left: 5px;" target="_blank"><b><?php echo $emp_insure_details['emp_spouse_aadhar_img'];?></b></a></td>
</tr>
<?php } ?>
<tr>
<td><b>Children Included? : </b></td>
<td><?php if($emp_insure_details['emp_children_status'] == 'no'){echo 'No';} else {echo 'Yes';}?></td>
</tr>
<?php if($emp_insure_details['emp_children_status'] == 'yes'){ 
 if($emp_insure_details['emp_child1_name'] != ''){?>
<tr>
	<td><b>Child1 Name : </b></td>
	<td><?php echo $emp_insure_details['emp_child1_name'];?></td>
	<td><b>Child1 DOB : </b></td>
	<td><?php echo $emp_insure_details['emp_child1_dob'];?></td>
	<td><b>Child1 Aadhar#: </b></td>
	<td><?php echo $emp_insure_details['emp_child1_aadhar_no'];?></td>
	<td><b>Child1 Aadhar Iamge : </b></td>
	<td><a href="<?php echo $targetDir.$emp_insure_details['emp_child1_aadhar_img'];?>" style="margin-left: 5px;" target="_blank"><b><?php echo $emp_insure_details['emp_child1_aadhar_img'];?></b></a></td>
</tr>
<?php }
if($emp_insure_details['emp_child2_name'] != ''){?> 
<tr>
	<td><b>Child2 Name : </b></td>
	<td><?php echo $emp_insure_details['emp_child2_name'];?></td>
	<td><b>Child2 DOB : </b></td>
	<td><?php echo $emp_insure_details['emp_child2_dob'];?></td>
	<td><b>Child2 Aadhar#: </b></td>
	<td><?php echo $emp_insure_details['emp_child2_aadhar_no'];?></td>
	<td><b>Child2 Aadhar Iamge : </b></td>
	<td><a href="<?php echo $targetDir.$emp_insure_details['emp_child2_aadhar_img'];?>" style="margin-left: 5px;" target="_blank"><b><?php echo $emp_insure_details['emp_child2_aadhar_img'];?></b></a></td>
</tr>
<?php } 
if($emp_insure_details['emp_child3_name'] != ''){?>
<tr>
	<td><b>Child3 Name : </b></td>
	<td><?php echo $emp_insure_details['emp_child3_name'];?></td>
	<td><b>Child3 DOB : </b></td>
	<td><?php echo $emp_insure_details['emp_child3_dob'];?></td>
	<td><b>Child3 Aadhar#: </b></td>
	<td><?php echo $emp_insure_details['emp_child3_aadhar_no'];?></td>
	<td><b>Child3 Aadhar Iamge : </b></td>
	<td><a href="<?php echo $targetDir.$emp_insure_details['emp_child3_aadhar_img'];?>" style="margin-left: 5px;" target="_blank"><b><?php echo $emp_insure_details['emp_child3_aadhar_img'];?></b></a></td>
</tr>
<?php }
if($emp_insure_details['emp_child4_name'] != ''){?>
<tr>
	<td><b>Child4 Name : </b></td>
	<td><?php echo $emp_insure_details['emp_child4_name'];?></td>
	<td><b>Child4 DOB : </b></td>
	<td><?php echo $emp_insure_details['emp_child4_dob'];?></td>
	<td><b>Child4 Aadhar#: </b></td>
	<td><?php echo $emp_insure_details['emp_child4_aadhar_no'];?></td>
	<td><b>Child4 Aadhar Iamge : </b></td>
	<td><a href="<?php echo $targetDir.$emp_insure_details['emp_child4_aadhar_img'];?>" style="margin-left: 5px;" target="_blank"><b><?php echo $emp_insure_details['emp_child4_aadhar_img'];?></b></a></td>
</tr>
<?php }
 }?>
<tr>
	<td><b>Parents Included? : </b></td>
	<td><?php if($emp_insure_details['emp_parents_included'] == 'no'){echo 'No';} else {echo 'Yes';}?></td>
</tr>
<?php if($emp_insure_details['emp_parents_included'] == 'yes'){
	if($emp_insure_details['emp_parent1_name'] != ''){?>
<tr>
	<td><b>Parent1 Name : </b></td>
	<td><?php echo $emp_insure_details['emp_parent1_name'];?></td>
	<td><b>Parent1 DOB : </b></td>
	<td><?php echo $emp_insure_details['emp_parent1_dob'];?></td>
	<td><b>Parent1 Aadhar#: </b></td>
	<td><?php echo $emp_insure_details['emp_parent1_aadhar_no'];?></td>
	<td><b>Parent1 Aadhar Image : </b></td>
	<td><a href="<?php echo $targetDir.$emp_insure_details['emp_parent1_aadhar_img'];?>" style="margin-left: 5px;" target="_blank"><b><?php echo $emp_insure_details['emp_parent1_aadhar_img'];?></b></a></td>
</tr>
<?php } 
if ($emp_insure_details['emp_parent2_name'] != '') {?>
<tr>
<td><b>Parent2 Name : </b></td>
	<td><?php echo $emp_insure_details['emp_parent2_name'];?></td>
	<td><b>Parent2 DOB : </b></td>
	<td><?php echo $emp_insure_details['emp_parent2_dob'];?></td>
	<td><b>Parent2 Aadhar#: </b></td>
	<td><?php echo $emp_insure_details['emp_parent2_aadhar_no'];?></td>
	<td><b>Parent2 Aadhar Image : </b></td>
	<td><a href="<?php echo $targetDir.$emp_insure_details['emp_parent2_aadhar_img'];?>" style="margin-left: 5px;" target="_blank"><b><?php echo $emp_insure_details['emp_parent2_aadhar_img'];?></b></a></td>
</tr>
<?php } }?>
</table>

<div style="text-align: left;"><b><font color='red'> *Note: </font>Group Personal Accident Insurance (GPA) - Accidental Death Coverage of employee for Sum Insured INR 20 Lacs.</b>
</div>
			
<?php 
	//echo "<div align='center' id='msg1ID'> $msg1 </div>
	//<div align='center' id='success_div'><font color='blue'><h3><b>You have submitted your details successfully.</b></h3></font></div><br/>
	echo  "<div style='margin-left: 328px; margin-top: 36px;'><font color=red><b>Do you want to update the details?</b></font>
		<input type='radio' name='update' id='update_yes' value='yes'> <b>Yes</b>&nbsp;&nbsp;
		<input type='radio' name='update' id='update_no' value='no' checked> <b>No</b></div>";
?>
<div id="yes_div" style="display: none; margin-top: 27px;"> 
<?php //$result = mysqli_fetch_array($qry);?>
<form name="edit_insure_form" id="edit_insure_form" method="post" action="" enctype="multipart/form-data"> 
		<table border="0" cellspacing="2" cellpadding="3" align="center">
		
			<tr>
				<td colspan="2" style="text-align: left;"><b><font color='red'>Please Fill The Details.</font></b></td>
				<td colspan="4" style="text-align: center;"><b><font color='red' style="margin-left: 63px;">(Please upload respective Aadhar images only.)</font></b></td>
			</tr>
			<tr>
				<td><b>Package Details: </b></td>
			</tr>
			<tr>
				<td>
					<select name="package" id="package" class="input1 textbox-height textbox-width" style="width:99px; height:30px" required >
						<option value="">--Select--</option>
						<option value="3L" <?php if($emp_insure_details['emp_insure_package'] == '3L'){echo "select: selected";}?>>3 Lakhs</option>
						<option value="5L" <?php if($emp_insure_details['emp_insure_package'] == '5L'){echo "select: selected";}?>>5 Lakhs</option>
					</select> 
				</td>
			</tr>
			<tr>
				<td><b>Self Details: </b></td>
				<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
			</tr>	
			<?php if($emp_insure_details['emp_aadhar_img'] != ""){?>
			<tr>
				<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td colspan="3" align="center"><a href="<?php echo $targetDir.$emp_insure_details['emp_aadhar_img'];?>" id="self_img_id" style="margin-left: 65px;" target="_blank"><b>Aadhar Image (Self)</b></a></td>
			</tr>
			<?php }?>
			<tr>
				<td>
					<select name="self" id="self" class="input1 textbox-height textbox-width" style="width:99px; height:30px" required >
						<option value="">--Select--</option>
						<option value="self" <?php echo "select : selected"?>>Self</option>
					</select> 
				</td>
				<td><input align="left" type="text" name="self_name" id="self_name" class="input1" value="<?php if($emp_insure_details['emp_name'] != "") {echo $emp_insure_details['emp_name'];}else {echo "";}?>" required>
				</td>
				
				<td><input align="left" type="date" name="self_dob" id="self_dob" class="input1" style="width:117px;" value=<?php if($emp_insure_details['emp_dob'] != "") {echo $emp_insure_details['emp_dob'];}else {echo "";}?> placeholder="Enter Your DOB" required>
				</td>

				<td>
					<input align="left" type="text" name="self_aadhar" id="self_aadhar" class="input1" style="width:108px;" value="<?php if($emp_insure_details['emp_aadhar_no'] != "") {echo $emp_insure_details['emp_aadhar_no'];}else {echo "";}?>" maxlength="14" required>
				</td>
				
				<td><b>Upload Image : </b><input align="left" type="file" name="self_aadharImg" id="self_aadharImg" accept=".png, .jpg, .jpeg" required></td>
			</tr>
			
			<tr>	
				<td><b>Are you married? </b></td>
				<td><input type="radio" name="marital_status" id="m_yes" value="married"> Yes  
					<input type="radio" name="marital_status" id="m_no" <?php echo ($emp_insure_details['emp_marital_status'] == 'unmarried')?'checked':'';?> value="unmarried" id="m_no"> No 
				</td>
			</tr>
			<tr>
			<?php if($emp_insure_details['emp_marital_status'] == 'married' and $emp_insure_details['emp_spouse_aadhar_img'] != ""){?>
				<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td colspan="3" align="center"><a href="<?php echo $targetDir.$emp_insure_details['emp_spouse_aadhar_img'];?>" id="spouse_img_id" style="margin-left: 65px;" target="_blank"><b>Aadhar Image (Spouse)</b></a></td>
			<?php }else{?>
				<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td colspan="2">&nbsp;</td>
			<?php }?>
			</tr>
			<tr id="spouse_tr">
				<td>
					<select name="spouse" id="spouse" class="input1 textbox-height textbox-width" style="width:99px; height:30px">
						<option value="">--Select--</option>
						<option value="spouse" <?php if($emp_insure_details['emp_marital_status'] == 'married') {echo "select : selected";}?>>Spouse</option>
					</select> 
				</td>
				<td><input align="left" type="text" name="spouse_name" id="spouse_name" class="input1" value="<?php if($emp_insure_details['emp_spouse_name'] != ''){echo $emp_insure_details['emp_spouse_name'];} else {echo "";}?>">
				</td>
				
				<td><input align="left" type="date" name="spouse_dob" id="spouse_dob" class="input1" style="width:117px;" value=<?php if($emp_insure_details['emp_spouse_dob'] != "") {echo $emp_insure_details['emp_spouse_dob'];}else {echo "";}?> placeholder="Enter Spouse DOB">
				</td>

				<td>
					<input align="left" type="text" name="spouse_aadhar" id="spouse_aadhar" class="input1" style="width:108px;" value="<?php if($emp_insure_details['emp_spouse_aadhar_no'] != "") {echo $emp_insure_details['emp_spouse_aadhar_no'];}else {echo "";}?>" maxlength="14">
				</td>
				
				<td><b>Upload Image : </b><input align="left" type="file" name="spouse_aadharImg" id="spouse_aadharImg" accept=".png, .jpg, .jpeg" ></td>
			</tr>
			<tr id="siblings_tr">	
				<td><b>Do you have children? </b></td>
				<td><input type="radio" name="siblings" id="siblings_yes" value="yes"> Yes  
					<input type="radio" name="siblings" id="siblings_no" value="no" <?php echo ($emp_insure_details['emp_children_status'] == 'no')?'checked':'';?>> No 
				</td>
			</tr>
			<?php if($emp_insure_details['emp_child1_aadhar_img'] != ""){?>
			<tr>
				<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td colspan="3" align="center"><a href="<?php echo $targetDir.$emp_insure_details['emp_child1_aadhar_img'];?>" id="child1_img_id" style="margin-left: 65px;" target="_blank"><b>Aadhar Image (Child1)</b></a></td>
			</tr>
			<?php }?>
			<tr id="child1_tr">
				<td>
					<select name="child1" id="child1" class="input1 textbox-height textbox-width" style="width:99px; height:30px">
						<option value="">--Select--</option>
						<option value="child1" <?php if($emp_insure_details['emp_child1'] == 'child1'){echo "select : selected";}?>>Child1</option>
	<!--				<option value="child2" <?php //if($emp_insure_details['emp_child1'] == 'child2'){echo "select : selected";}?>>Child2</option>
						<option value="child3" <?php //if($emp_insure_details['emp_child1'] == 'child3'){echo "select : selected";}?>>Child3</option>  -->
					</select> 
				</td>
				<td><input align="left" type="text" name="chl1_name" id="chl1_name" class="input1" value="<?php if($emp_insure_details['emp_child1_name'] != ''){echo $emp_insure_details['emp_child1_name'];}else {echo '';}?>">
				</td>
				
				<td><input align="left" type="date" name="child1_dob" id="child1_dob" class="input1" style="width:117px;" value=<?php if($emp_insure_details['emp_child1_dob'] != "") {echo $emp_insure_details['emp_child1_dob'];}else {echo "";}?> placeholder="Enter Child1 DOB">
				</td>
	
				<td>
					<input align="left" type="text" name="child1_aadhar" id="child1_aadhar" class="input1" style="width:108px;" value="<?php if($emp_insure_details['emp_child1_aadhar_no'] != "") {echo $emp_insure_details['emp_child1_aadhar_no'];}else {echo "";}?>" maxlength="14">
				</td>
				
				<td><b>Upload Image : </b><input align="left" type="file" name="chl1_aadharImg" id="chl1_aadharImg" accept=".png, .jpg, .jpeg" ></td>
			</tr>
			<?php if($emp_insure_details['emp_child2_aadhar_img'] != ""){?>
			<tr>
				<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td colspan="3" align="center"><a href="<?php echo $targetDir.$result['emp_child2_aadhar_img'];?>" id="child2_img_id" style="margin-left: 65px;" target="_blank"><b>Aadhar Image (Child2)</b></a></td>
			</tr>
			<?php }?>
			<tr id="child2_tr">
				<td>
					<select name="child2" id="child2" class="input1 textbox-height textbox-width" style="width:99px; height:30px">
						<option value="">--Select--</option>
	<!--				<option value="child1" <?php //if($emp_insure_details['emp_child2'] == 'child1'){echo "select : selected";}?>>Child1</option>  -->
						<option value="child2" <?php if($emp_insure_details['emp_child2'] == 'child2'){echo "select : selected";}?>>Child2</option>
	<!--				<option value="child3" <?php //if($emp_insure_details['emp_child2'] == 'child3'){echo "select : selected";}?>>Child3</option>  -->
					</select> 
				</td>
				<td><input align="left" type="text" name="chl2_name" id="chl2_name" class="input1" value="<?php if($emp_insure_details['emp_child2_name'] != ''){echo $emp_insure_details['emp_child2_name'];}else {echo '';}?>">
				</td>
				
				<td><input align="left" type="date" name="child2_dob" id="child2_dob" class="input1" style="width:117px;" value=<?php if($emp_insure_details['emp_child2_dob'] != "") {echo $emp_insure_details['emp_child2_dob'];}else {echo "";}?> placeholder="Enter Child2 DOB">
				</td>
	
				<td>
					<input align="left" type="text" name="child2_aadhar" id="child2_aadhar" class="input1" style="width:108px;" value="<?php if($emp_insure_details['emp_child2_aadhar_no'] != "") {echo $emp_insure_details['emp_child2_aadhar_no'];}else {echo "";}?>" maxlength="14">
				</td>
				
				<td><b>Upload Image : </b><input align="left" type="file" name="chl2_aadharImg" id="chl2_aadharImg" accept=".png, .jpg, .jpeg" ></td>
			</tr>
			<?php if($emp_insure_details['emp_child3_aadhar_img'] != ""){?>
			<tr>
				<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td colspan="3" align="center"><a href="<?php echo $targetDir.$emp_insure_details['emp_child3_aadhar_img'];?>" id="child3_img_id" style="margin-left: 65px;" target="_blank"><b>Aadhar Image (Child3)</b></a></td>
			</tr>
			<?php }?>
			<tr id="child3_tr">
				<td>
					<select name="child3" id="child3" class="input1 textbox-height textbox-width" style="width:99px; height:30px">
						<option value="">--Select--</option>
	<!--				<option value="child1" <?php //if($emp_insure_details['emp_child3'] == 'child1'){echo "select : selected";}?>>Child1</option>
						<option value="child2" <?php //if($emp_insure_details['emp_child3'] == 'child2'){echo "select : selected";}?>>Child2</option>   -->
						<option value="child3" <?php if($emp_insure_details['emp_child3'] == 'child3'){echo "select : selected";}?>>Child3</option>
					</select> 
				</td>
				<td><input align="left" type="text" name="chl3_name" id="chl3_name" class="input1" value="<?php if($emp_insure_details['emp_child3_name'] != ''){echo $emp_insure_details['emp_child3_name'];}else {echo '';}?>">
				</td>
				
				<td><input align="left" type="date" name="child3_dob" id="child3_dob" class="input1" style="width:117px;" value=<?php if($emp_insure_details['emp_child3_dob'] != "") {echo $emp_insure_details['emp_child3_dob'];}else {echo "";}?>>
				</td>
	
				<td>
					<input align="left" type="text" name="child3_aadhar" id="child3_aadhar" class="input1" style="width:108px;" value="<?php if($emp_insure_details['emp_child3_aadhar_no'] != "") {echo $emp_insure_details['emp_child3_aadhar_no'];}else {echo "";}?>" maxlength="14">
				</td>
				
				<td><b>Upload Image : </b><input align="left" type="file" name="chl3_aadharImg" id="chl3_aadharImg" accept=".png, .jpg, .jpeg" ></td>
			</tr>
			<?php if($emp_insure_details['emp_child4_aadhar_img'] != ""){?>
			<tr>
				<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td colspan="3" align="center"><a href="<?php echo $targetDir.$emp_insure_details['emp_child4_aadhar_img'];?>" id="child4_img_id" style="margin-left: 65px;" target="_blank"><b>Aadhar Image (Child4)</b></a></td>
			</tr>
			<?php }?>
<!-- Child4 Code Starts Here.-->			
			<tr id="child4_tr">
				<td>
					<select name="child4" id="child4" class="input1 textbox-height textbox-width" style="width:99px; height:30px">
						<option value="">--Select--</option>
		<!--			<option value="child1" <?php //if($emp_insure_details['emp_child4'] == 'child1'){echo "select : selected";}?>>Child1</option>
						<option value="child2" <?php //if($emp_insure_details['emp_child4'] == 'child2'){echo "select : selected";}?>>Child2</option>
						<option value="child3" <?php //if($emp_insure_details['emp_child4'] == 'child3'){echo "select : selected";}?>>Child3</option>  -->
						<option value="child4" <?php if($emp_insure_details['emp_child4'] == 'child4'){echo "select : selected";}?>>Child4</option>
					</select> 
				</td>
				<td><input align="left" type="text" name="chl4_name" id="chl4_name" class="input1" value="<?php if($emp_insure_details['emp_child4_name'] != ''){echo $emp_insure_details['emp_child4_name'];}else {echo '';}?>">
				</td>
				
				<td><input align="left" type="date" name="child4_dob" id="child4_dob" class="input1" style="width:117px;" value=<?php if($emp_insure_details['emp_child4_dob'] != "") {echo $emp_insure_details['emp_child4_dob'];}else {echo "";}?>>
				</td>
	
				<td>
					<input align="left" type="text" name="child4_aadhar" id="child4_aadhar" class="input1" style="width:108px;" value="<?php if($emp_insure_details['emp_child4_aadhar_no'] != "") {echo $emp_insure_details['emp_child4_aadhar_no'];}else {echo "";}?>" maxlength="14">
				</td>
				
				<td><b>Upload Image : </b><input align="left" type="file" name="chl4_aadharImg" id="chl4_aadharImg" accept=".png, .jpg, .jpeg" ></td>
			</tr>
<!-- Child4 Code Ends Here.-->			
			<tr>	
				<td><b>Do you want to include parents : </b></td>
				<td><input type="radio" name="parents" id="parents_yes" value="yes"> Yes  
					<input type="radio" name="parents" id="parents_no" <?php echo ($emp_insure_details['emp_parents_included'] == 'no')?'checked':'';?> value="no"> No 
				</td>
			</tr>
			<?php if($emp_insure_details['emp_parent1_aadhar_img'] != ""){?>
			<tr>
				<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td colspan="3" align="center"><a href="<?php echo $targetDir.$emp_insure_details['emp_parent1_aadhar_img'];?>" id="parent1_img_id" style="margin-left: 65px;" target="_blank"><b>Aadhar Image (Parent1)</b></a></td>
				<?php } else if($emp_insure_details['emp_parent1_aadhar_img'] == ""){?>
				<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td colspan="2">&nbsp;</td>
				<?php } ?>
			</tr>
			<tr id="parent1_tr">
				<td>
					<select name="parent1" id="parent1" class="input1 textbox-height textbox-width" style="width:99px; height:30px">
						<option value="">--Select--</option>
						<option value="father" <?php if($emp_insure_details['emp_parent1'] == 'father') echo "select : selected"?>>Father</option>
						<option value="mother" <?php if($emp_insure_details['emp_parent1'] == 'mother') echo "select : selected"?>>Mother</option>
					</select> 
				</td>
				<td><input align="left" type="text" name="parent1_name" id="parent1_name" class="input1" value="<?php if($emp_insure_details['emp_parent1_name'] != ''){echo $emp_insure_details['emp_parent1_name'];}else {echo "";}?>">
				</td>
				
				<td><input align="left" type="date" name="parent1_dob" id="parent1_dob" class="input1" style="width:117px;" value=<?php if($emp_insure_details['emp_parent1_dob'] != "") {echo $emp_insure_details['emp_parent1_dob'];}else {echo "";}?> placeholder="Enter Parent1 DOB">
				</td>

				<td>
					<input align="left" type="text" name="parent1_aadhar" id="parent1_aadhar" class="input1" style="width:108px;" value="<?php if($emp_insure_details['emp_parent1_aadhar_no'] != "") {echo $emp_insure_details['emp_parent1_aadhar_no'];}else {echo "";}?>" maxlength="14">
				</td>
				
				<td><b>Upload Image : </b><input align="left" type="file" name="parent1_aadharImg" id="parent1_aadharImg" accept=".png, .jpg, .jpeg" ></td>
			</tr>
			<?php if($emp_insure_details['emp_parent2_aadhar_img'] != ""){?>
			<tr>
				<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td colspan="3" align="center"><a href="<?php echo $targetDir.$emp_insure_details['emp_parent2_aadhar_img'];?>" id="parent2_img_id" style="margin-left: 65px;" target="_blank"><b>Aadhar Image (Parent2)</b></a></td>
			</tr>
			<?php }?>
			<tr id="parent2_tr">
				<td>
					<select name="parent2" id="parent2" class="input1 textbox-height textbox-width" style="width:99px; height:30px">
						<option value="">--Select--</option>
						<option value="father" <?php if($emp_insure_details['emp_parent2'] == 'father') echo "select : selected"?>>Father</option>
						<option value="mother" <?php if($emp_insure_details['emp_parent2'] == 'mother') echo "select : selected"?>>Mother</option>
					</select> 
				</td>
				<td><input align="left" type="text" name="parent2_name" id="parent2_name" class="input1" value="<?php if($emp_insure_details['emp_parent2_name'] != ''){echo $emp_insure_details['emp_parent2_name'];} else {echo "";}?>">
				</td>
				
				<td><input align="left" type="date" name="parent2_dob" id="parent2_dob" class="input1" style="width:117px;" value=<?php if($emp_insure_details['emp_parent2_dob'] != "") {echo $emp_insure_details['emp_parent2_dob'];}else {echo "";}?> placeholder="Enter Parent2 DOB">
				</td>

				<td>
					<input align="left" type="text" name="parent2_aadhar" id="parent2_aadhar" class="input1" style="width:108px;" value="<?php if($emp_insure_details['emp_parent2_aadhar_no'] != "") {echo $emp_insure_details['emp_parent2_aadhar_no'];}else {echo "";}?>" maxlength="14">
				</td>
				
				<td><b>Upload Image : </b><input align="left" type="file" name="parent2_aadharImg" id="parent2_aadharImg" accept=".png, .jpg, .jpeg" ></td>
			</tr>
			
			<tr>
               <td colspan="6" align="center" height="30">
				 <input type="submit" name="updateDetails" id="updateDetails" value="Update" class="sub1"/>   
               </td>
            </tr>	
		</table>
</form>
	</div>
<?php	
} else{
?>
<form name="insure_form" id="insure_form" method="post" action="" enctype="multipart/form-data"> 
	<div align="center"><?php if($msg) { echo $msg; } ?></div>
		<table border="0" cellspacing="2" cellpadding="3" align="center">
			<tr>
				<td colspan="2" style="text-align: left;"><b><font color='red'> Please Fill The Details. </font></b></td>
				<td colspan="4" style="text-align: right;"><b><font color='red' style="margin-right: 27px;">(Please upload respective Aadhar images only.)</font></b></td>
			</tr>
			<tr>
				<td><b>Package Details: </b></td>
			</tr>
			<tr>
				<td>
					<select name="package" id="package" class="input1 textbox-height textbox-width" style="width:99px; height:30px" required >
						<!-- <option value="">--Select--</option> -->
						<option value="3L">3 Lakhs</option>
						<option value="5L">5 Lakhs</option>
					</select> 
				</td>
			</tr>
			<tr>
				<td><b>Self Details: </b></td>
			</tr>
			<tr>
				<td>
					<select name="self" id="self" class="input1 textbox-height textbox-width" style="width:99px; height:30px" required >
						<!-- <option value="">--Select--</option> -->
						<option value="self">Self</option>
					</select> 
				</td>
				<td><input align="left" type="text" name="self_name" id="self_name" class="input1" placeholder="Please Enter Your Name" required>
				</td>
				<td><input align="left" type="date" name="self_dob" id="self_dob" class="input1" style="width:117px;" placeholder="Enter Your DOB" required>
				</td>

				<td>
					<input align="left" type="text" name="self_aadhar" id="self_aadhar" class="input1" style="width:144px;" placeholder="Enter Your Aadhar#" maxlength="14" required>
				</td>
				
	<!--		<td><b>Upload Image : </b></td>-->
				<td><input align="left" type="file" name="self_aadharImg" id="self_aadharImg" accept=".png, .jpg, .jpeg" required></td>
			</tr>
			<tr>	
				<td><b>Are you married? </b></td>
				<td><input type="radio" name="marital_status" value="married"> Yes  
					<input type="radio" name="marital_status" value="unmarried" checked> No 
				</td>
			</tr>
			<tr id="spouse_tr">
				<td>
					<select name="spouse" id="spouse" class="input1 textbox-height textbox-width" style="width:99px; height:30px">
						<!-- <option value="">--Select--</option> -->
						<option value="spouse">Spouse</option>
					</select> 
				</td>
				<td><input align="left" type="text" name="spouse_name" id="spouse_name" class="input1" placeholder="Please Enter Your Spouse Name">
				</td>
				<td><input align="left" type="date" name="spouse_dob" id="spouse_dob" class="input1" style="width:117px;" placeholder="Enter Spouse DOB">
				</td>

				<td>
					<input align="left" type="text" name="spouse_aadhar" id="spouse_aadhar" class="input1" style="width:144px;" placeholder="Enter Spouse Aadhar#" maxlength="14">
				</td>
				
	<!--		<td><b>Upload Image : </b></td> -->
				<td><input align="left" type="file" name="spouse_aadharImg" id="spouse_aadharImg" accept=".png, .jpg, .jpeg" ></td>
			</tr>
			<tr id="siblings_tr">	
				<td><b>Do you have children? </b></td>
				<td><input type="radio" name="siblings" id="siblings_yes" value="yes"> Yes  
					<input type="radio" name="siblings" id="siblings_no" value="no" checked> No 
				</td>
			</tr>
			<tr id="child1_tr">
				<td>
					<select name="child1" id="child1" class="input1 textbox-height textbox-width" style="width:99px; height:30px">
						<option value="">--Select--</option>
						<option value="child1">Child1</option>
				<!--	<option value="child2">Child2</option>
						<option value="child3">Child3</option>
						<option value="child3">Child4</option>  -->
					</select> 
				</td>
				<td><input align="left" type="text" name="chl1_name" id="chl1_name" class="input1" placeholder="Please Enter Child1 Name">
				</td>
				<td><input align="left" type="date" name="child1_dob" id="child1_dob" class="input1" style="width:117px;" placeholder="Enter Child1 DOB">
				</td>
	
				<td>
					<input align="left" type="text" name="child1_aadhar" id="child1_aadhar" class="input1" style="width:144px;" placeholder="Enter Child1 Aadhar#" maxlength="14">
				</td>
				
	<!--		<td><b>Upload Image : </b></td> -->
				<td><input align="left" type="file" name="chl1_aadharImg" id="chl1_aadharImg" accept=".png, .jpg, .jpeg" ></td>
			</tr>
			<tr id="child2_tr">
				<td>
					<select name="child2" id="child2" class="input1 textbox-height textbox-width" style="width:99px; height:30px">
						<option value="">--Select--</option>
				<!--	<option value="child1">Child1</option>  -->
						<option value="child2">Child2</option>
				<!--	<option value="child3">Child3</option>
						<option value="child3">Child4</option>  -->
					</select> 
				</td>
				<td><input align="left" type="text" name="chl2_name" id="chl2_name" class="input1" placeholder="Please Enter Child2 Name">
				</td>
				<td><input align="left" type="date" name="child2_dob" id="child2_dob" class="input1" style="width:117px;" placeholder="Enter Child2 DOB">
				</td>
	
				<td>
					<input align="left" type="text" name="child2_aadhar" id="child2_aadhar" class="input1" style="width:144px;" placeholder="Enter Child2 Aadhar#" maxlength="14">
				</td>
				
	<!--		<td><b>Upload Image : </b></td> -->
				<td><input align="left" type="file" name="chl2_aadharImg" id="chl2_aadharImg" accept=".png, .jpg, .jpeg" ></td>
			</tr>
			<tr id="child3_tr">
				<td>
					<select name="child3" id="child3" class="input1 textbox-height textbox-width" style="width:99px; height:30px">
						<option value="">--Select--</option>
				<!--	<option value="child1">Child1</option>
						<option value="child2">Child2</option>  -->
						<option value="child3">Child3</option>
				<!--	<option value="child3">Child4</option>  -->
					</select> 
				</td>
				<td><input align="left" type="text" name="chl3_name" id="chl3_name" class="input1" placeholder="Please Enter Child3 Name">
				</td>
				<td><input align="left" type="date" name="child3_dob" id="child3_dob" class="input1" style="width:117px;">
				</td>
	
				<td>
					<input align="left" type="text" name="child3_aadhar" id="child3_aadhar" class="input1" style="width:144px;" placeholder="Enter Child3 Aadhar#" maxlength="14">
				</td>
				
	<!--		<td><b>Upload Image : </b></td> -->
				<td><input align="left" type="file" name="chl3_aadharImg" id="chl3_aadharImg" accept=".png, .jpg, .jpeg" ></td>
			</tr>
			<tr id="child4_tr">
				<td>
					<select name="child4" id="child4" class="input1 textbox-height textbox-width" style="width:99px; height:30px">
						<option value="">--Select--</option>
			<!--		<option value="child1">Child1</option>
						<option value="child2">Child2</option>
						<option value="child3">Child3</option>   -->
						<option value="child4">Child4</option>
					</select> 
				</td>
				<td><input align="left" type="text" name="chl4_name" id="chl4_name" class="input1" placeholder="Please Enter Child4 Name">
				</td>
				<td><input align="left" type="date" name="child4_dob" id="child4_dob" class="input1" style="width:117px;">
				</td>
	
				<td>
					<input align="left" type="text" name="child4_aadhar" id="child4_aadhar" class="input1" style="width:144px;" placeholder="Enter Child4 Aadhar#" maxlength="14">
				</td>
				
	<!--		<td><b>Upload Image : </b></td> -->
				<td><input align="left" type="file" name="chl4_aadharImg" id="chl4_aadharImg" accept=".png, .jpg, .jpeg" ></td>
			</tr>
			
			<tr>	
				<td><b>Do you want to include parents/in-laws : </b></td>
				<td><input type="radio" name="parents" value="yes"> Yes  
					<input type="radio" name="parents" value="no" checked> No 
				</td>
			</tr>
			<tr id="parent1_tr">
				<td>
					<select name="parent1" id="parent1" class="input1 textbox-height textbox-width" style="width:99px; height:30px">
						<option value="">--Select--</option>
						<option value="father">Father</option>
						<option value="mother">Mother</option>
					</select> 
				</td>
				<td><input align="left" type="text" name="parent1_name" id="parent1_name" class="input1" placeholder="Please Enter Parent1 Name">
				</td>
				<td><input align="left" type="date" name="parent1_dob" id="parent1_dob" class="input1" style="width:117px;" placeholder="Enter Paren1 DOB">
				</td>
	
				<td>
					<input align="left" type="text" name="parent1_aadhar" id="parent1_aadhar" class="input1" style="width:144px;" placeholder="Enter Parent1 Aadhar#" maxlength="14">
				</td>
				
	<!--		<td><b>Upload Image : </b></td> -->
				<td><input align="left" type="file" name="parent1_aadharImg" id="parent1_aadharImg" accept=".png, .jpg, .jpeg" ></td>
			</tr>
			<tr id="parent2_tr">
				<td>
					<select name="parent2" id="parent2" class="input1 textbox-height textbox-width" style="width:99px; height:30px">
						<option value="">--Select--</option>
						<option value="father">Father</option>
						<option value="mother">Mother</option>
					</select> 
				</td>
				<td><input align="left" type="text" name="parent2_name" id="parent2_name" class="input1" placeholder="Please Enter Parent2 Name">
				</td>
				<td><input align="left" type="date" name="parent2_dob" id="parent2_dob" class="input1" style="width:117px;" placeholder="Enter Paren2 DOB">
				</td>
	
				<td>
					<input align="left" type="text" name="parent2_aadhar" id="parent2_aadhar" class="input1" style="width:144px;" placeholder="Enter Parent2 Aadhar#" maxlength="14">
				</td>
				
	<!--		<td><b>Upload Image : </b></td> -->
				<td><input align="left" type="file" name="parent2_aadharImg" id="parent2_aadharImg" accept=".png, .jpg, .jpeg" ></td>
			</tr>
			
			<tr>
				<td colspan="4" style="text-align: left;"><b><font color='red'> *Note: </font>Group Personal Accident Insurance (GPA) - Accidental Death Coverage of employee for Sum Insured INR 20 Lacs.</b></td>
			</tr>
			
			<tr>
               <td colspan="6" align="center" height="30">
				 <input type="submit" name="submit" id="submit" value="Submit" class="sub1"/>   
               </td>
            </tr>	
		</table>
</form>
<?php }?>
</div> <!-- mainbg <div> ends here.-->
<?php include("footer.php"); ?>

<script type="text/javascript">
$(document).ready(function(){	
	$('#parent1_tr').hide();
	$('#parent2_tr').hide();
	$('#spouse_tr').hide();	
	$('#siblings_tr').hide();
	$('#child1_tr').hide();
	$('#child2_tr').hide();
	$('#child3_tr').hide();
	$('#child4_tr').hide();
	
	$('input[type=radio][name=marital_status]').change(function() {
		if ($(this).val() == 'married') {
			$('#spouse_tr').show();
			$('#siblings_tr').show();
			
			$('#spouse_img_id').show();
			
			$('#spouse').prop('required',true);
			$('#spouse_name').prop('required',true);
			$('#spouse_name').attr('placeholder','Please Enter Spouse Name.');
			
			$('#spouse_aadhar').prop('required',true);
			$('#spouse_dob').prop('required',true)
			
			$('#spouse_aadharImg').prop('required',true);
		}
		else if ($(this).val() == 'unmarried') {
			$('#spouse_tr').hide();
			$('#siblings_tr').hide();
			
			$('#child1_tr').hide();
			$('#child2_tr').hide();
			$('#child3_tr').hide();
			$('#child4_tr').hide();
			
			$('#spouse_img_id').hide();
			
			$('#child1_img_id').hide();
			$('#child2_img_id').hide();
			$('#child3_img_id').hide();
			$('#child4_img_id').hide();
			
			$("#siblings_no").prop("checked", true);	
		}
	});
	
	$('input[type=radio][name=siblings]').change(function(){
		if(this.value == 'yes'){
			$('#child1_tr').show();
			$('#child2_tr').show();
			$('#child3_tr').show();
			$('#child4_tr').show();
			
			$('#child1').prop('required',true);
			$('#chl1_name').prop('required',true);
			$('#chl1_name').attr('placeholder','Please Enter Child1 Name.');
			$('#chl2_name').attr('placeholder','Please Enter Child2 Name.');
			$('#chl3_name').attr('placeholder','Please Enter Child3 Name.');
			$('#chl4_name').attr('placeholder','Please Enter Child4 Name.');
			
			$('#child1_dob').prop('required',true);
			
			$('#child1_img_id').show();
			$('#child2_img_id').show();
			$('#child3_img_id').show();
			$('#child4_img_id').show();
		}
		else if(this.value == 'no'){
			$('#child1_tr').hide();
			$('#child2_tr').hide();
			$('#child3_tr').hide();
			$('#child4_tr').hide();
			
			$('#child1_img_id').hide();
			$('#child2_img_id').hide();
			$('#child3_img_id').hide();
			$('#child4_img_id').hide();
		}
	});	
	
	$("#child2").change(function() {
        var child2_val = $('option:selected', this).text();
		if(child2_val != ''){
			$('#chl2_name').prop('required',true);
			$('#child2_dob').prop('required',true);
		}
    });
	$("#child3").change(function() {
        var child3_val = $('option:selected', this).text();
		if(child3_val != ''){
			$('#chl3_name').prop('required',true);
			$('#child3_dob').prop('required',true);
		}
    });
	
	$('input[type=radio][name=parents]').change(function() {
		if (($(this).val()) == 'yes') {
			$('#parent1_tr').show();
			$('#parent2_tr').show();
			$('#parent1').prop('required',true);
			$('#parent1_name').prop('required',true);
			$('#parent1_name').attr('placeholder','Please Enter Parent1 Name.');
			$('#parent2_name').attr('placeholder','Please Enter Parent2 Name.');
			
			$('#parent1_aadhar').prop('required',true);
			$('#parent1_dob').prop('required',true);
			
			$('#parent1_aadharImg').prop('required',true);
			
			$('#parent1_img_id').show();
			$('#parent2_img_id').show();
		}
		else if (($(this).val()) == 'no') {
			$('#parent1_tr').hide();
			$('#parent2_tr').hide();
			$('#parent1_img_id').hide();
			$('#parent2_img_id').hide();
		 				
			$('#parent1').val(''); 
			$('#parent1_name').val(''); 
			$('#parent1_age').val('');  
		}
	});

	$("#parent2").change(function() {
        var parent2_val = $('option:selected', this).val();
		if(parent2_val != ''){
			$('#parent2_name').prop('required',true);
			$('#parent2_aadhar').prop('required',true);
			$('#parent2_dob').prop('required',true);	
			$('#parent2_aadharImg').prop('required',true);
		}
    });
	
	$('input[type=radio][name=update]').change(function(){
		if(this.value == 'yes'){
			$('#yes_div').show();
			$('#success_div').hide();
		}
		else if(this.value == 'no'){
			$('#yes_div').hide()
		}
	});		
// Submit Validations Code Starts Here.	
	$('#submit').click(function(){
		var selfAadharLength    = ($('#self_aadhar').val()).length;	
		var child1AadharLength  = ($('#child1_aadhar').val()).length;
		var child2AadharLength  = ($('#child2_aadhar').val()).length;
		var child3AadharLength  = ($('#child3_aadhar').val()).length;
		
		if(selfAadharLength != '' && selfAadharLength < 14 ){
			alert("Please Enter Your Valid Aadhar#.");
			return false;
		}
		if (Date.parse(new Date()) < Date.parse($("#self_dob").val())) { 
			alert("DOB Should Be Less Than Current Date.");
			return false;
		}
		
		var marital_status = $('input[type=radio][name=marital_status]:checked').val();	
			if(marital_status == 'married'){		
				var spouseAadharLength = ($('#spouse_aadhar').val()).length;
				if(spouseAadharLength != '' && spouseAadharLength < 14){
					alert("Please Provide Spouse's Valid Aadhar#");
					return false;
				}
				if (Date.parse(new Date()) < Date.parse($("#spouse_dob").val())) { 
					alert("Spouse DOB Should Be Less Than Current Date.");
					return false;
				}
				
			}
		var siblings_status = $('input[type=radio][name=siblings]:checked').val();
			if(siblings_status == 'yes'){
				var child1AadharLength = (($('#child1_aadhar').val()).trim()).length;
				if(child1AadharLength != '' && child1AadharLength < 14){
					alert("Please Provide Child1's Valid Aadhar#");
					return false;
				}
				if (Date.parse(new Date()) < Date.parse($("#child1_dob").val())) { 
					alert("child1 DOB Should Be Less Than Current Date.");
					return false;
				}
				if(child1AadharLength == 14){
					$('#chl1_aadharImg').prop('required',true);
				}
					
				var child2AadharLength = (($('#child2_aadhar').val()).trim()).length;
				if(child2AadharLength != '' && child2AadharLength < 14){
					alert("Please Provide Child2's Valid Aadhar#");
					return false;
				}
				if (Date.parse(new Date()) < Date.parse($("#child2_dob").val())) { 
					alert("child2 DOB Should Be Less Than Current Date.");
					return false;
				}
				if(child2AadharLength == 14){
					$('#chl2_aadharImg').prop('required',true);
				}
				
				var child3AadharLength = (($('#child3_aadhar').val()).trim()).length;
				if(child3AadharLength != '' && child3AadharLength < 14){
					alert("Please Provide Child3's Valid Aadhar#");
					return false;
				}
				if (Date.parse(new Date()) < Date.parse($("#child3_dob").val())) { 
					alert("child3 DOB Should Be Less Than Current Date.");
					return false;
				}
				if(child3AadharLength == 14){
					$('#chl3_aadharImg').prop('required',true);
				}	
				
				var child4AadharLength = (($('#child4_aadhar').val()).trim()).length;
				if(child4AadharLength != '' && child4AadharLength < 14){
					alert("Please Provide Child4's Valid Aadhar#");
					return false;
				}
				if (Date.parse(new Date()) < Date.parse($("#child4_dob").val())) { 
					alert("child4 DOB Should Be Less Than Current Date.");
					return false;
				}
				if(child4AadharLength == 14){
					$('#chl4_aadharImg').prop('required',true);
				}	
			}
		
		var parents_status = $('input[type=radio][name=parents]:checked').val();
			if (parents_status == 'yes') {
				var parent1AadharLength = (($('#parent1_aadhar').val()).trim()).length;
				if(parent1AadharLength != '' && parent1AadharLength < 14){
					alert("Please Provide Parent1's Valid Aadhar#");
					return false;
				}
				if (Date.parse(new Date()) < Date.parse($("#parent1_dob").val())) { 
					alert("Parent1 DOB Should Be Less Than Current Date.");
					return false;
				}
				
				var parent2Val = $('#parent2').val();
				if(parent2Val != ''){
					var parent2AadharLength = (($('#parent2_aadhar').val()).trim()).length;
					if(parent2AadharLength != '' && parent2AadharLength < 14){
						alert("Please Provide Parent2's Valid Aadhar#");
						return false;
					}
					if (Date.parse(new Date()) < Date.parse($("#parent2_dob").val())) { 
						alert("Parent2 DOB Should Be Less Than Current Date.");
						return false;
					}
				}
			}
	}); 
// Submit Validations Code Ends Here.	
});

$(document).ready(function(){
	$('#update_yes').click(function(){
		var res = $(this).val();
		if(res == 'yes'){
		var res1 = "<?php echo $emp_insure_details['emp_marital_status'];?>";
			if(res1 == 'married'){
				$('#m_yes').trigger('click');
			}else{
				$('#m_no').trigger('click');
				$('#spouse_img_id').hide();
			}
		var res2 = "<?php echo $emp_insure_details['emp_children_status'];?>";
			if(res2 == 'yes'){
				$('#siblings_yes').trigger('click');
			}	
		var res3 = "<?php echo $emp_insure_details['emp_parents_included']?>";	
			if(res3 == 'yes'){
				$('#parents_yes').trigger('click');					
			}else{
				$('#parents_no').trigger('click');	
				$('#parent1_img_id').hide();
				$('#parent2_img_id').hide();
			}
		}
	});	
	
});	
// Update Validations Code Starts Here.  
$(document).ready(function(){
	$('#updateDetails').click(function(){	
		var image1 = "<?php echo $emp_insure_details['emp_aadhar_img'];?>";
			if(image1 == ""){
				$('#self_aadharImg').prop('required',true);	
			}else{	
				$('#self_aadharImg').prop('required',false);
			}
		
		var image2 = "<?php echo $emp_insure_details['emp_spouse_aadhar_img'];?>";
			if(image2 == ""){
				$('#spouse_aadharImg').prop('required',true);
			}else{	
				$('#spouse_aadharImg').prop('required',false);
			}
		
		var selfAadharLength = ($('#self_aadhar').val()).length;
	
		if(selfAadharLength != '' && selfAadharLength < 14){ 
			alert("Please Enter Your Valid Aadhar#.");
			return false;
		}
		if (Date.parse(new Date()) < Date.parse($("#self_dob").val())) { 
			alert("DOB Must be Less Than Current Date.");
			return false;
		}
	
		var parents_status = "<?php echo $emp_insure_details['emp_parents_included'];?>";	
		var image3;
			if(parents_status == 'yes'){	
				image3 = "<?php echo $emp_insure_details['emp_parent1_aadhar_img'];?>";
				if(image3 == ""){
				}else{
					$('#parent1_aadharImg').prop('required',false);
				}
				
				var parent2_val = $('option:selected', "#parent2").val();
				var image4 = "<?php echo $emp_insure_details['emp_parent2_aadhar_img'];?>";
				if(parent2_val != "" && image4 == ""){
					$('#parent2_aadharImg').prop('required',true);
				}else{
					$('#parent2_aadharImg').prop('required',false);
				} 
			}else if(parents_status == 'no'){
				$('#parent1').prop('required',false);
				$('#parent1_name').prop('required',false);
				$('#parent1_age').prop('required',false);
				
				$('#parent1_aadhar').prop('required',false);
				$('#parent1_dob').prop('required',false);
				
				$('#parent1_aadharImg').prop('required',false);
			}	
			
		var marital_status = $('input[type=radio][name=marital_status]:checked').val();	
			if(marital_status == 'married'){
				$('#spouse').prop('required',true);
				$('#spouse_name').prop('required',true);
				
				$('#spouse_aadhar').prop('required',true);
				$('#spouse_dob').prop('required',true);
				
				var spouseAadharLength = ($('#spouse_aadhar').val()).length;
				if(spouseAadharLength < 14){
					alert("Please Provide Spouse's Valid Aadhar#");
					return false;
				}
				if (Date.parse(new Date()) < Date.parse($("#spouse_dob").val())) { 
					alert("Spouse DOB Should Not Be Greater Than Current Date.");
					return false;
				}			
		   }
		   if(marital_status == 'unmarried'){
			    $('#spouse').val(''); 
				$('#spouse_name').val(''); 
				$('#spouse_age').val('');
				
				$('#spouse').prop('required',false);
				$('#spouse_name').prop('required',false);
				$('#spouse_age').prop('required',false);
				
				$('#spouse_aadhar').prop('required',false);
				$('#spouse_dob').prop('required',false);
				
				$('#spouse_aadharImg').prop('required',false);
				$('#spouse_img_id').hide();
				
				$('#child1').prop('required',false);
				$('#chl1_name').prop('required',false);
				$('#child1_age').prop('required',false);

				$('#child1_aadhar').prop('required',false);
				$('#child1_dob').prop('required',false);
		   }
		var children_status = $('input[type=radio][name=siblings]:checked').val();
		if(children_status == 'yes'){
				var child1AadharLength = (($('#child1_aadhar').val()).trim()).length;
					if(child1AadharLength != '' && child1AadharLength < 14){
						alert("Please Provide Child1's Valid Aadhar#");
						return false;
					}
					if (Date.parse(new Date()) < Date.parse($("#child1_dob").val())) { 
						alert("Child1 DOB Should Not Be Greater Than Current Date.");
						return false;
					}
		var child1AadharImage = "<?php echo $emp_insure_details['emp_child1_aadhar_img'];?>";	
					if(child1AadharLength == 14 && child1AadharImage == ''){
						$('#chl1_aadharImg').prop('required',true);
					}
					
					var child2AadharLength = (($('#child2_aadhar').val()).trim()).length;
					if(child2AadharLength != '' && child2AadharLength < 14){
						alert("Please Provide Child2's Valid Aadhar#");
						return false;
					}
					if (Date.parse(new Date()) < Date.parse($("#child2_dob").val())) { 
						alert("Child2 DOB Should Not Be Greater Than Current Date.");
						return false;
					}
		var child2AadharImage = "<?php echo $emp_insure_details['emp_child2_aadhar_img'];?>";
					if(child2AadharLength == 14 && child2AadharImage == ''){
						$('#chl2_aadharImg').prop('required',true);
					}
					
					var child3AadharLength = (($('#child3_aadhar').val()).trim()).length;
					if(child3AadharLength != '' && child3AadharLength < 14){
						alert("Please Provide Child3's Valid Aadhar#");
						return false;
					}
					if (Date.parse(new Date()) < Date.parse($("#child3_dob").val())) { 
						alert("Child3 DOB Should Not Be Greater Than Current Date.");
						return false;
					}
		var child3AadharImage = "<?php echo $emp_insure_details['emp_child3_aadhar_img'];?>";
					if(child3AadharLength == 14 && child3AadharImage == ''){
						$('#chl3_aadharImg').prop('required',true);
					}
					
					var child4AadharLength = (($('#child4_aadhar').val()).trim()).length;
					if(child4AadharLength != '' && child4AadharLength < 14){
						alert("Please Provide Child4's Valid Aadhar#");
						return false;
					}
					if (Date.parse(new Date()) < Date.parse($("#child4_dob").val())) { 
						alert("Child4 DOB Should Not Be Greater Than Current Date.");
						return false;
					}
		var child4AadharImage = "<?php echo $emp_insure_details['emp_child4_aadhar_img'];?>";
					if(child4AadharLength == 14 && child4AadharImage == ''){
						$('#chl4_aadharImg').prop('required',true);
					}
		}else{
			$('#child1_aadhar').prop('required',false);
			$('#child2_aadhar').prop('required',false);
			$('#child3_aadhar').prop('required',false);
			$('#child4_aadhar').prop('required',false);
		}
		var parents_status = $('input[type=radio][name=parents]:checked').val();
			if (parents_status == 'yes') {
				$('#parent1').prop('required',true);
				$('#parent1_name').prop('required',true);				
				$('#parent1_aadhar').prop('required',true);
				$('#parent1_dob').prop('required',true);
				
				if(($('#parent2').val()) != ''){
					$('#parent2_name').prop('required',true);
					$('#parent2_aadhar').prop('required',true);
					$('#parent2_dob').prop('required',true);
					
					var parent2AadharLength = ($('#parent2_aadhar').val()).length;
					if(parent2AadharLength != '' && parent2AadharLength < 14){
						alert("Please Provide Parent2's Valid Aadhar#");
						return false;
					}
					if (Date.parse(new Date()) < Date.parse($("#parent2_dob").val())) { 
						alert("Parent2 DOB Should Not Be Greater Than Current Date.");
						return false;
					}
				}
			}else if(parents_status == 'no'){
				$('#parent1_aadharImg').prop('required',false);
				$('#parent2_aadhar').prop('required',false);
			}

		var parent2_name_val = $('#parent2_name').val();
		var parent2_age_val = $('option:selected','#parent2_age').val();
			
		if (Date.parse(new Date()) < Date.parse($("#child1_dob").val())) { 
			alert("Child1 DOB Must be Less Than Current Date.");
			return false;
		}
	});
	
	$('input[type=radio][name=parents]').change(function() {
		if (($(this).val()) == 'no') {	
			$('#parent1').prop('required',false);
			$('#parent1_name').prop('required',false);
			$('#parent1_age').prop('required',false);
			
			$('#parent1_aadhar').prop('required',false);
			$('#parent1_dob').prop('required',false);
		}
	});
	
	var child3_value = $('#child3').val();
	if(child3_value != ''){
		$('#chl3_name').prop('required',true);
		$('#child3_dob').prop('required',true);
	}else{
		$('#chl3_name').prop('required',false);
		$('#child3_dob').prop('required',false);
	}
	
	var child4_value = $('#child4').val();
	if(child4_value != ''){
		$('#chl4_name').prop('required',true);
		$('#child4_dob').prop('required',true);
	}else{
		$('#chl4_name').prop('required',false);
		$('#child4_dob').prop('required',false);
	}
});	
// Update Validations Code Ends Here.

$(document).ready(function(){
	function space(eve, after) {
			after = after || 4;
			var v = eve.value.replace(/[^\dA-Z]/g, ''),
				reg = new RegExp(".{" + after + "}","g")
			eve.value = v.replace(reg, function (a, b, c) {
				return a + ' ';
			});
    }
    var e1 = document.getElementById('self_aadhar');
		e1.addEventListener('keyup', function () {
        space(this, 4);
    });
	var e2 = document.getElementById('spouse_aadhar');
		e2.addEventListener('keyup', function () {
        space(this, 4);
    });
	var e3 = document.getElementById('child1_aadhar');
		e3.addEventListener('keyup', function () {
        space(this, 4);
    });
	var e4 = document.getElementById('child2_aadhar');
		e4.addEventListener('keyup', function () {
        space(this, 4);
    });
	var e5 = document.getElementById('child3_aadhar');
		e5.addEventListener('keyup', function () {
        space(this, 4);
    });
	var e5_1 = document.getElementById('child4_aadhar');
		e5_1.addEventListener('keyup', function () {
        space(this, 4);
    });
	var e6 = document.getElementById('parent1_aadhar');
		e6.addEventListener('keyup', function () {
        space(this, 4);
    });
	var e7 = document.getElementById('parent2_aadhar');
		e7.addEventListener('keyup', function () {
        space(this, 4);
    });	 
	
	$('#child1_dob').blur(function(){
		var child1DOB = ($('#child1_dob').val());
		
		 var dob = new Date(child1DOB);
         var today = new Date();
		 
		  ageInMilliseconds = new Date(today - dob),
          years = ageInMilliseconds / (24 * 60 * 60 * 1000 * 365.25 ),
          months = 12 * (years % 1),
          days = Math.floor(30 * (months % 1));
//  alert(Math.floor(years) + ' years ' + Math.floor(months) + ' months ' + days + ' days');
		 if(((Math.floor(years)) > 25) || (((Math.floor(years)) == 25) && days > 0)){
			 alert("Your Child Age Must be Below 25 Years");
			 $('#child1').val('');
			 $('#chl1_name').val('');
			 $('#child1_dob').val('');
		 }
	});
	
	$('#child2_dob').blur(function(){
		var child2DOB = ($('#child2_dob').val());
		
		 var dob = new Date(child2DOB);
         var today = new Date();
		 
		  ageInMilliseconds = new Date(today - dob),
          years = ageInMilliseconds / (24 * 60 * 60 * 1000 * 365.25 ),
          months = 12 * (years % 1),
          days = Math.floor(30 * (months % 1));
//  alert(Math.floor(years) + ' years ' + Math.floor(months) + ' months ' + days + ' days');
		 if(((Math.floor(years)) > 25) || (((Math.floor(years)) == 25) && days > 0)){
			 alert("Your Child Age Must be Below 25 Years");
			 $('#child2').val('');
			 $('#chl2_name').val('');
			 $('#child2_dob').val('');
		 }
	});
	
	$('#child3_dob').blur(function(){
		var child3DOB = ($('#child3_dob').val());
		
		 var dob = new Date(child3DOB);
         var today = new Date();
		 
		  ageInMilliseconds = new Date(today - dob),
          years = ageInMilliseconds / (24 * 60 * 60 * 1000 * 365.25 ),
          months = 12 * (years % 1),
          days = Math.floor(30 * (months % 1));
//  alert(Math.floor(years) + ' years ' + Math.floor(months) + ' months ' + days + ' days');
		 if(((Math.floor(years)) > 25) || (((Math.floor(years)) == 25) && days > 0)){
			 alert("Your Child Age Must be Below 25 Years");
			 $('#child3').val('');
			 $('#chl3_name').val('');
			 $('#child3_dob').val('');
		 }
	});
	
	$('#child4_dob').blur(function(){
		var child4DOB = ($('#child4_dob').val());
		
		 var dob = new Date(child4DOB);
         var today = new Date();
		 
		  ageInMilliseconds = new Date(today - dob),
          years = ageInMilliseconds / (24 * 60 * 60 * 1000 * 365.25 ),
          months = 12 * (years % 1),
          days = Math.floor(30 * (months % 1));
//  alert(Math.floor(years) + ' years ' + Math.floor(months) + ' months ' + days + ' days');
		 if(((Math.floor(years)) > 25) || (((Math.floor(years)) == 25) && days > 0)){
			 alert("Your Child Age Must be Below 25 Years");
			 $('#child4').val('');
			 $('#chl4_name').val('');
			 $('#child4_dob').val('');
		 }
	});
});
</script>