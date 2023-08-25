<?php 
session_start(); 
ob_start();
ini_set('display_errors', 0);
date_default_timezone_set('Asia/Kolkata');

//if(!$_SESSION['sesion_ecode']) { header("Location: https://hrinfo.fintinc.com"); }
//include("header.php");
include("common.php");
require 'PHPMailer/PHPMailerAutoload.php';

$official_mail_info = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM emp_login_credentials WHERE e_code='".$_SESSION['sesion_ecode']."'"));
$p_info = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM emp_personal_info WHERE e_code='".$_SESSION['sesion_ecode']."'"));
//$_SESSION['emp_name'] = $p_info['e_name'];


if(isset($_POST['submit']))
{
  $ecode = 'A0144';
  $e_name = $_POST['emp_name'];    /* Personal details */
  //$age = $_POST['age'];
  $dob = date('Y-m-d',strtotime($_POST['dob']));
  $act_dob = date('Y-m-d',strtotime($_POST['act_dob']));
  $bgroup = $_POST['bgroup'];
  $high_edu = $_POST['high_edu'];
  $gender = $_POST['gender'];
  $marst = $_POST['marst'];
  if($marst=='Single')
	{ $madate = '0000-00-00'; } else { $madate = date('Y-m-d',strtotime($_POST['madate'])); }
  $contno = $_POST['contno'];
  $emp_email = $_POST['emp_email'];
  //$religion = $_POST['religion'];
  $nationality = $_POST['nationality'];
  $emp_aadhar_no = $_POST['emp_aadhar_no'];
  $emp_aadhar_img = $_POST['emp_aadhar_img'];
  $emp_pan_no = $_POST['emp_pan_no'];
  $emp_pan_img = $_POST['emp_pan_img'];
  $emer_name = $_POST['emer_name'];
  $emer_rel = $_POST['emer_rel'];
  $emer_addr = $_POST['emer_addr'];
  $emer_cont = $_POST['emer_cont'];
  $pp_no = $_POST['pp_no'];
  $pp_issuedt = date('Y-m-d',strtotime($_POST['pp_issuedt']));
  $pp_expdt = date('Y-m-d',strtotime($_POST['pp_expdt']));
  $created_on = date('y-m-d H:i:s');

  $hno = $_POST['hno'];   /* Address details */
  $city = $_POST['city'];
  $state = $_POST['state'];
  $zipcode = $_POST['zipcode'];
  $country = $_POST['country'];
  $per_hno = $_POST['perm_hno'];
  $per_city = $_POST['perm_city'];
  $per_state = $_POST['perm_state'];
  $per_zipcode = $_POST['perm_zipcode'];
  $per_country = $_POST['perm_country'];

  $erel = $_POST['erel'];    /* Family details */
  $relname = $_POST['relname'];
  $reldob = date('Y-m-d',strtotime($_POST['reldob']));
  $relage = $_POST['relage'];
  $relaad = $_POST['relaad'];
  $reladimg = $_POST['reladimg'];

  $erel2 = $_POST['erel2'];
  $relname2 = $_POST['relname2'];
  $reldob2 = date('Y-m-d',strtotime($_POST['reldob2']));
  $relage2 = $_POST['relage2'];
  $relaad2 = $_POST['relaad2'];
  $reladimg2 = $_POST['reladimg2'];

  $erel3 = $_POST['erel3'];
  $relname3 = $_POST['relname3'];
  $reldob3 = date('Y-m-d',strtotime($_POST['reldob3']));
  $relage3 = $_POST['relage3'];
  $relaad3 = $_POST['relaad3'];
  $reladimg3 = $_POST['reladimg3'];

  $erel4 = $_POST['erel4'];
  $relname4 = $_POST['relname4'];
  $reldob4 = date('Y-m-d',strtotime($_POST['reldob4']));
  $relage4 = $_POST['relage4'];
  $relaad4 = $_POST['relaad4'];
  $reladimg4 = $_POST['reladimg4'];

  $erel5 = $_POST['erel5'];
  $relname5 = $_POST['relname5'];
  $reldob5 = date('Y-m-d',strtotime($_POST['reldob5']));
  $relage5 = $_POST['relage5'];
  $relaad5 = $_POST['relaad5'];
  $reladimg5 = $_POST['reladimg5'];

  $erel6 = $_POST['erel6'];
  $relname6 = $_POST['relname6'];
  $reldob6 = date('Y-m-d',strtotime($_POST['reldob6']));
  $relage6 = $_POST['relage6'];
  $relaad6 = $_POST['relaad6'];
  $reladimg6 = $_POST['reladimg6'];

  $erel7 = $_POST['erel7'];
  $relname7 = $_POST['relname7'];
  $reldob7 = date('Y-m-d',strtotime($_POST['reldob7']));
  $relage7 = $_POST['relage7'];
  $relaad7 = $_POST['relaad7'];
  $reladimg7 = $_POST['reladimg7'];

  $ahn = $_POST['ahn']; /* Bank details */
  $bank_name = $_POST['bank_name'];
  $ac_no = $_POST['ac_no'];
  $brach_name = $_POST['brach_name'];
  $ac_type = $_POST['ac_type'];
  //$brach_code = $_POST['brach_code'];
  //$bank_addr = $_POST['bank_addr'];
  $pf_no = $_POST['pf_no'];
  $uan_no = $_POST['uan_no'];
  $dt_exit = date('Y-m-d',strtotime($_POST['dt_exit']));
  $nom_name = $_POST['nom_name'];
  $relation = $_POST['relation'];
  $nom_dob = date('Y-m-d',strtotime($_POST['nom_dob']));

  $qual1 = $_POST['qual1']; /* Education details */
  $yop1 = $_POST['yop1'];
  $univ1 = $_POST['univ1'];
  $ms1 = $_POST['ms1'];
  $perc1 = $_POST['perc1'];

  $qual2 = $_POST['qual2'];
  $yop2 = $_POST['yop2'];
  $univ2 = $_POST['univ2'];
  $ms2 = $_POST['ms2'];
  $perc2 = $_POST['perc2'];

  $qual3 = $_POST['qual3'];
  $yop3 = $_POST['yop3'];
  $univ3 = $_POST['univ3'];
  $ms3 = $_POST['ms3'];
  $perc3 = $_POST['perc3'];

  $qual4 = $_POST['qual4'];
  $yop4 = $_POST['yop4'];
  $univ4 = $_POST['univ4'];
  $ms4 = $_POST['ms4'];
  $perc4 = $_POST['perc4'];

  $pers = $_POST['pers'];
  $pursuing = $_POST['pursuing'];
  
  $org_name = $_POST['org_name']; /* Employement details */
  $desig_name = $_POST['desig_name'];
  $dur_work = $_POST['dur_work'];
  $reason = $_POST['reason'];

  $org_name2 = $_POST['org_name2'];
  $desig_name2 = $_POST['desig_name2'];
  $dur_work2 = $_POST['dur_work2'];
  $reason2 = $_POST['reason2'];

  $org_name3 = $_POST['org_name3'];
  $desig_name3 = $_POST['desig_name3'];
  $dur_work3 = $_POST['dur_work3'];
  $reason3 = $_POST['reason3'];

  $org_name4 = $_POST['org_name4'];
  $desig_name4 = $_POST['desig_name4'];
  $dur_work4 = $_POST['dur_work4'];
  $reason4 = $_POST['reason4'];

  $org_name5 = $_POST['org_name5'];
  $desig_name5 = $_POST['desig_name5'];
  $dur_work5 = $_POST['dur_work5'];
  $reason5 = $_POST['reason5'];

  $refbyfint = $_POST['refbyfint'];  /* Refference details */
  $empref_name = $_POST['empref_name'];
  $empref_cont = $_POST['empref_cont'];
  $empref_id = $_POST['empref_id'];
  $ref_name = $_POST['ref_name'];
  $ref_desig = $_POST['ref_desig'];
  $empref_id = $_POST['ref_cont'];
  $ref_name2 = $_POST['ref_name2'];
  $ref_desig2 = $_POST['ref_desig2'];
  $empref_id2 = $_POST['ref_cont2'];

  
  $sports = $_POST['sports'];
  $soc_serv = $_POST['soc_serv'];
  $trainer_others = $_POST['trainer_others'];
  $applied = $_POST['applied'];
  $anyrel = $_POST['anyrel'];
  //$rel_emp_id = $_POST['rel_emp_id'];
  $crim = $_POST['crim'];
  //$crim_offence = $_POST['crim_offence'];
  $medcond = $_POST['medcond'];
  //$anyillness = $_POST['anyillness'];
  
  if($applied=='Yes')
	{ $appl_date = date('Y-m-d',strtotime($_POST['appl_date'])); } else { $appl_date = '0000-00-00'; }
  if($anyrel=='Yes')
	{ $rel_emp_id = $_POST['rel_emp_id']; } else { $rel_emp_id = ''; }
  if($crim=='Yes')
	{ $crim_offence = $_POST['crim_offence']; } else { $crim_offence = ''; }
  if($medcond=='Yes')
	{ $anyillness = $_POST['anyillness']; } else { $anyillness = ''; }

    $prim1 = $_POST['prim1'];   /* Technical competency */
	$prof1 = $_POST['prof1'];
	$prim2 = $_POST['prim2'];
	$prof2 = $_POST['prof2'];
	$prim3 = $_POST['prim3'];
	$prof3 = $_POST['prof3'];
	$prim4 = $_POST['prim4'];
	$prof4 = $_POST['prof4'];
	$prim5 = $_POST['prim5'];
	$prof5 = $_POST['prof5'];
	$cdate = date('Y-m-d H:i:s');

	$yrs_exp = $_POST['yrs_exp'];
	$desig = $_POST['desig'];
	$other = $_POST['other'];
	$proj = $_POST['proj'];
	$projdesc = $_POST['proj_desc'];
	$tech = $_POST['tech'];
	$tech_desc = $_POST['tech_desc'];
	$qa = $_POST['qa'];
	$qadesc = $_POST['qa_desc'];
	$cmmi = $_POST['cmmi'];
	$cmmidesc = $_POST['cmmi_desc'];
	$any = $_POST['any'];
	$anydesc = $_POST['any_desc'];

  	if(!file_exists($ecode)) {
    $directory = mkdir('empdocs/'.$ecode, 0777, true);
    $targetDir = "empdocs/".$ecode;
    }
    // File upload path.
	$targetDir = "empdocs/".$ecode."/";

  $emp_aadhar_img='';
  $emp_pan_img='';
  $profile_pic='';
  $msg='';
  if(!empty($_FILES['emp_aadhar_img']['tmp_name'])) {
		$sourcePath = $_FILES['emp_aadhar_img']['tmp_name'];
		$ext = strtolower(pathinfo($_FILES['emp_aadhar_img']['name'], PATHINFO_EXTENSION));
		$rand_value = rand(1,100000).'-empaadhar';
		$emp_aadhar_img = $rand_value.'.'.$ext;
		$targetPath = $targetDir.$rand_value.'.'.$ext;
		move_uploaded_file($sourcePath,$targetPath);
		}
	if(!empty($_FILES['emp_pan_img']['tmp_name'])) {
		$sourcePath = $_FILES['emp_pan_img']['tmp_name'];
		$ext = strtolower(pathinfo($_FILES['emp_pan_img']['name'], PATHINFO_EXTENSION));
		$rand_value = rand(1,100000).'-pan';
		$emp_pan_img = $rand_value.'.'.$ext;
		$targetPath = $targetDir.$rand_value.'.'.$ext;
		move_uploaded_file($sourcePath,$targetPath);
		}
	if(!empty($_FILES['profile_pic']['tmp_name'])) {
		$sourcePath = $_FILES['profile_pic']['tmp_name'];
		$ext = strtolower(pathinfo($_FILES['profile_pic']['name'], PATHINFO_EXTENSION));
		$rand_value = rand(1,100000).'-profile';
		$profile_pic = $rand_value.'.'.$ext;
		$targetPath = $targetDir.$rand_value.'.'.$ext;
		move_uploaded_file($sourcePath,$targetPath);
		}

  $empupd = mysqli_query($con,"UPDATE reg_personaldet SET 
  e_name = '".$e_name."',
  e_age = '',
  e_dob = '".$dob."',
  e_act_dob = '".$act_dob."',
  blood_group = '".$bgroup."',
  high_edu = '".$high_edu."',
  gend = '".$gender."',
  mar_st = '".$marst."',
  anniv_dt = '".$madate."',
  e_cont_no = '".$contno."',
  e_pers_email = '".$emp_email."',
  nationality = '".$nationality."',
  aadhar_no = '".$emp_aadhar_no."',
  aadhar_img = '".$emp_aadhar_img."',
  pan_no = '".$emp_pan_no."',
  pan_img = '".$emp_pan_img."',
  emer_fullname = '".$emer_name."',
  emer_relation = '".$emer_rel."',
  emer_addr = '".$emer_addr."',
  emer_cont_no = '".$emer_cont."',
  pp_no = '".$pp_no."',
  issue_dt = '".$pp_issuedt."',
  exp_dt = '".$pp_expdt."',
  profile_pic = '".$profile_pic."',
  created_dt = '".$created_on."' WHERE e_code = 'A0144'");


$ins_adar='';
$ins_adar2='';
$ins_adar3='';
$ins_adar4='';
$ins_adar5='';
$ins_adar6='';
$ins_adar7='';

  if($empupd) {
		$empaddr = mysqli_query($con,"INSERT INTO reg_addrdet (e_code,hno,city,state,zipcode,country,perm_hno,perm_city,perm_state,perm_zipcode,perm_country) VALUES('".$ecode."','".$hno."','".$city."','".$state."','".$zipcode."','".$country."','".$per_hno."','".$per_city."','".$per_state."','".$per_zipcode."','".$per_country."')");

		if(!empty($_FILES['reladimg']['tmp_name'])) {
		$sourcePath = $_FILES['reladimg']['tmp_name'];
		$ext = strtolower(pathinfo($_FILES['reladimg']['name'], PATHINFO_EXTENSION));
		$rand_value = rand(1,100000).'-aadhar';
		$ins_adar = $rand_value.'.'.$ext;
		$targetPath = $targetDir.$rand_value.'.'.$ext;
		move_uploaded_file($sourcePath,$targetPath);
		}
		if($erel!='' and $relname!='') {
		$empfam = mysqli_query($con,"INSERT INTO reg_familydet (e_code,relation,name,dob,age,aadhar_no,aadhar_img) VALUES('".$ecode."','".$erel."','".$relname."','".$reldob."','','".$relaad."','".$ins_adar."')");
		}

			if(!empty($_FILES['reladimg2']['tmp_name'])) {
			$sourcePath = $_FILES['reladimg2']['tmp_name'];
			$ext = strtolower(pathinfo($_FILES['reladimg2']['name'], PATHINFO_EXTENSION));
			$rand_value = rand(1,100000).'-aadhar';
			$ins_adar2 = $rand_value.'.'.$ext;
			$targetPath = $targetDir.$rand_value.'.'.$ext;
			move_uploaded_file($sourcePath,$targetPath);
			}

			if($erel2!='' and $relname2!='') {
				$empfam = mysqli_query($con,"INSERT INTO reg_familydet (e_code,relation,name,dob,age,aadhar_no,aadhar_img) VALUES('".$ecode."','".$erel2."','".$relname2."','".$reldob2."','','".$relaad2."','".$ins_adar2."')");
			}

			if(!empty($_FILES['reladimg3']['tmp_name'])) {
			$sourcePath = $_FILES['reladimg3']['tmp_name'];
			$ext = strtolower(pathinfo($_FILES['reladimg3']['name'], PATHINFO_EXTENSION));
			$rand_value = rand(1,100000).'-aadhar';
			$ins_adar3 = $rand_value.'.'.$ext;
			$targetPath = $targetDir.$rand_value.'.'.$ext;
			move_uploaded_file($sourcePath,$targetPath);
			}
			if($erel3!='' and $relname3!='') {
			$empfam = mysqli_query($con,"INSERT INTO reg_familydet (e_code,relation,name,dob,age,aadhar_no,aadhar_img) VALUES('".$ecode."','".$erel3."','".$relname3."','".$reldob3."','','".$relaad3."','".$ins_adar3."')");
			}

			if(!empty($_FILES['reladimg4']['tmp_name'])) {
			$sourcePath = $_FILES['reladimg4']['tmp_name'];
			$ext = strtolower(pathinfo($_FILES['reladimg4']['name'], PATHINFO_EXTENSION));
			$rand_value = rand(1,100000).'-aadhar';
			$ins_adar4 = $rand_value.'.'.$ext;
			$targetPath = $targetDir.$rand_value.'.'.$ext;
			move_uploaded_file($sourcePath,$targetPath);
			}
		if($erel4!='' and $relname4!='') {
			$empfam = mysqli_query($con,"INSERT INTO reg_familydet (e_code,relation,name,dob,age,aadhar_no,aadhar_img) VALUES('".$ecode."','".$erel4."','".$relname4."','".$reldob4."','','".$relaad4."','".$ins_adar4."')");
			}

			if(!empty($_FILES['reladimg5']['tmp_name'])) {
			$sourcePath = $_FILES['reladimg5']['tmp_name'];
			$ext = strtolower(pathinfo($_FILES['reladimg5']['name'], PATHINFO_EXTENSION));
			$rand_value = rand(1,100000).'-aadhar';
			$ins_adar5 = $rand_value.'.'.$ext;
			$targetPath = $targetDir.$rand_value.'.'.$ext;
			move_uploaded_file($sourcePath,$targetPath);
			}
		if($erel5!='' and $relname5!='') {
			$empfam = mysqli_query($con,"INSERT INTO reg_familydet (e_code,relation,name,dob,age,aadhar_no,aadhar_img) VALUES('".$ecode."','".$erel5."','".$relname5."','".$reldob5."','','".$relaad5."','".$ins_adar5."')");
			}

			if(!empty($_FILES['reladimg6']['tmp_name'])) {
			$sourcePath = $_FILES['reladimg6']['tmp_name'];
			$ext = strtolower(pathinfo($_FILES['reladimg6']['name'], PATHINFO_EXTENSION));
			$rand_value = rand(1,100000).'-aadhar';
			$ins_adar6 = $rand_value.'.'.$ext;
			$targetPath = $targetDir.$rand_value.'.'.$ext;
			move_uploaded_file($sourcePath,$targetPath);
			}
		if($erel6!='' and $relname6!='') {
			$empfam = mysqli_query($con,"INSERT INTO reg_familydet (e_code,relation,name,dob,age,aadhar_no,aadhar_img) VALUES('".$ecode."','".$erel6."','".$relname6."','".$reldob6."','','".$relaad6."','".$ins_adar6."')");
			}

			if(!empty($_FILES['reladimg7']['tmp_name'])) {
			$sourcePath = $_FILES['reladimg7']['tmp_name'];
			$ext = strtolower(pathinfo($_FILES['reladimg7']['name'], PATHINFO_EXTENSION));
			$rand_value = rand(1,100000).'-aadhar';
			$ins_adar7 = $rand_value.'.'.$ext;
			$targetPath = $targetDir.$rand_value.'.'.$ext;
			move_uploaded_file($sourcePath,$targetPath);
			}
		if($erel7!='' and $relname7!='') {
			$empfam = mysqli_query($con,"INSERT INTO reg_familydet (e_code,relation,name,dob,age,aadhar_no,aadhar_img) VALUES('".$ecode."','".$erel7."','".$relname7."','".$reldob7."','','".$relaad7."','".$ins_adar7."')");
			}

			/*if($erel == 'Child1') { $chldst = 'yes'; } else { $chldst = ''; }
			if($erel == 'Father') { $chldst = 'yes'; } else { $chldst = ''; }*/

			mysqli_query($con,"INSERT INTO reg_insurance (e_code,ins_package,ins_period,have_childrens_inc,have_parents_inc) VALUES('".$ecode."','','','','')");


		$empbnk = mysqli_query($con,"INSERT INTO reg_bankpfdet (e_code,ac_holder_name,bank_name,account_num,branch,acc_type,pf_acc_no,uan_no,date_of_exit_prev,nominee_name,relation,nominee_dob) VALUES('".$ecode."','".$ahn."','".$bank_name."','".$ac_no."','".$brach_name."','".$ac_type."','".$pf_no."','".$uan_no."','".$dt_exit."','".$nom_name."','".$relation."','".$nom_dob."')");

		if($qual1!='' and $univ1!='') {
	   $empaca = mysqli_query($con,"INSERT INTO reg_academicdet (e_code,qualification,year_of_passing,name_of_school,major_sub,div_perc,persuing_any_course,course_det) VALUES('".$ecode."','".$qual1."','".$yop1."','".$univ1."','".$ms1."','".$perc1."','".$pers."','".$pursuing."')");
		}

	   if($qual12!='' and $univ12!='') {
	   $empaca2 = mysqli_query($con,"INSERT INTO reg_academicdet (e_code,qualification,year_of_passing,name_of_school,major_sub,div_perc) VALUES('".$ecode."','".$qual12."','".$yop12."','".$univ12."','".$ms12."','".$perc12."')");
	   }
	   if($qual13!='' and $univ13!='') {
	   $empaca3 = mysqli_query($con,"INSERT INTO reg_academicdet (e_code,qualification,year_of_passing,name_of_school,major_sub,div_perc) VALUES('".$ecode."','".$qual13."','".$yop13."','".$univ13."','".$ms13."','".$perc13."')");
	   }
	   if($qual14!='' and $univ14!='') {
	   $empaca4 = mysqli_query($con,"INSERT INTO reg_academicdet (e_code,qualification,year_of_passing,name_of_school,major_sub,div_perc) VALUES('".$ecode."','".$qual14."','".$yop14."','".$univ14."','".$ms14."','".$perc14."')");
	   }

	    $empempment = mysqli_query($con,"INSERT INTO reg_employmentdet (e_code,name_of_org,desig,duration_worker,reason_for_leaving) VALUES('".$ecode."','".$org_name."','".$desig_name."','".$dur_work."','".$reason."')");
		if($org_name2!='' and $dur_work2!='') {
	    $empempment2 = mysqli_query($con,"INSERT INTO reg_employmentdet (e_code,name_of_org,desig,duration_worker,reason_for_leaving) VALUES('".$ecode."','".$org_name2."','".$desig_name2."','".$dur_work2."','".$reason2."')");}
		if($org_name3!='' and $dur_work3!='') {
	    $empempment3 = mysqli_query($con,"INSERT INTO reg_employmentdet (e_code,name_of_org,desig,duration_worker,reason_for_leaving) VALUES('".$ecode."','".$org_name3."','".$desig_name3."','".$dur_work3."','".$reason3."')");}
		if($org_name4!='' and $dur_work4!='') {
	    $empempment4 = mysqli_query($con,"INSERT INTO reg_employmentdet (e_code,name_of_org,desig,duration_worker,reason_for_leaving) VALUES('".$ecode."','".$org_name4."','".$desig_name4."','".$dur_work4."','".$reason4."')");}
		if($org_name5!='' and $dur_work5!='') {
	    $empempment5 = mysqli_query($con,"INSERT INTO reg_employmentdet (e_code,name_of_org,desig,duration_worker,reason_for_leaving) VALUES('".$ecode."','".$org_name5."','".$desig_name5."','".$dur_work5."','".$reason5."')");}

		$empreff = mysqli_query($con,"INSERT INTO reg_refference (e_code,refbyfint,empref_name,empref_cont,empref_id,ref_name,ref_desig,ref_cont,ref_name2,ref_desig2,ref_cont2) VALUES('".$ecode."','".$refbyfint."','".$empref_name."','".$empref_cont."','".$empref_id."','".$ref_name."','".$ref_desig."','".$empref_id."','".$ref_name2."','".$ref_desig2."','".$empref_id2."')");

		$ec = mysqli_query($con,"INSERT INTO reg_extra_curcular_act (e_code,sports,social_ser,trainer_others,any_applied,desc_applied,your_relatives,desc_relatives,crim_offence,desc_offence,any_illness,desc_illness) VALUES('".$ecode."','".$sports."','".$soc_serv."','".$trainer_others."','".$applied."','".$appl_date."','".$anyrel."','".$rel_emp_id."','".$crim."','".$crim_offence."','".$medcond."','".$anyillness."')");

			if($other != '')
			{
				$qry = mysqli_query($con,"INSERT INTO emp_otherroles(desig_tblid,e_code,other_role) 
				VALUES('$desig','$ecode','$other')");
			}

			if($prim1 != '' AND $prof1 != '')
			{
				$qry1 = mysqli_query($con,"INSERT INTO emp_prim_sec_skills(e_code,primary_skill,num_of_yrs) 
				VALUES('$ecode','$prim1','$prof1')");
			}

			if($prim2 != '' AND $prof2 != '')
			{
				$qry2 = mysqli_query($con,"INSERT INTO emp_prim_sec_skills(e_code,primary_skill,num_of_yrs) 
				VALUES('$ecode','$prim2','$prof2')");

			}

			if($prim3 != '' AND $prof3 != '')
			{
				$qry3 = mysqli_query($con,"INSERT INTO emp_prim_sec_skills(e_code,primary_skill,num_of_yrs) 
				VALUES('$ecode','$prim3','$prof3')");
			}

			if($prim4 != '' AND $prof4 != '')
			{
				$qry3 = mysqli_query($con,"INSERT INTO emp_prim_sec_skills(e_code,primary_skill,num_of_yrs) 
				VALUES('$ecode','$prim4','$prof4')");
			}

			if($prim5 != '' AND $prof5 != '')
			{
				$qry3 = mysqli_query($con,"INSERT INTO emp_prim_sec_skills(e_code,primary_skill,num_of_yrs) 
				VALUES('$ecode','$prim5','$prof5')");
			}

		mysqli_query($con,"INSERT INTO emp_proj_skills(e_code,yrs_exp,desig,proj_mng_skills,proj_mng_skills_desc,tech,tech_desc,qa_exp,qa_exp_desc,cmmi_exp,cmmi_exp_desc,any_cert,any_cert_desc,cur_date) 
		VALUES ('$ecode','$yrs_exp','$desig','$proj','$projdesc','$tech','$tech_desc','$qa','$qadesc','$cmmi','$cmmidesc','$any','$anydesc','$cdate')");


	  //$msg = "<b>Details submitted successfully</b>";
	  header("Location: http://s343786261.onlinehome.us/hrinfo-dev/thank-you");
	}
}
?>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
<link rel="stylesheet" type="text/css" href="css/font-awesome.css"/>

<script>
$( document ).ready(function() {
$('.continue').click(function(){
  $('.nav-tabs > .active').next('li').find('a').trigger('click');
});
$('.back').click(function(){
  $('.nav-tabs > .active').prev('li').find('a').trigger('click');
});
});
</script>
<style>
.tabs-wrap {
	margin-top: 40px;
	font-size: 12px;
}
.tab-content .tab-pane {
	padding: 20px 0;
	border-left: 1px solid #ddd;
	border-right: 1px solid #ddd;
	border-bottom: 1px solid #ddd;
}
.nav-tabs>li>a {
	background:#330099;
	color:#fff;
	margin-right: 4px;
}
.nav-tabs>li.active>a, .nav-tabs>li.active>a:focus, .nav-tabs>li.active>a:hover {
    color: #ff0000;
	font-weight:700
}
.nav>li>a:focus, .nav>li>a:hover {
    text-decoration: none;
    background-color: #eee;
	color:#330099
}
.tabhead1 {
	padding-left: 14px;
    font-size: 18px;
    font-weight: 700;
    padding-bottom: 10px;
	color:#330099;
	margin-top: -10px;
}
.formgap {
	height:7px;
	clear:both;
}
.btn-primary {
    color: #fff;
    background-color: #ff0000;
    border-color: #2e6da4;
}
.nav>li>a {
    padding: 10px 10px;
}
.plus-icon {
	cursor:pointer; color: #ff0000; font-size:25px;
}
</style>
<form name="regform" id="regform" method="post" action="" enctype="multipart/form-data" />
<div class="container tabs-wrap">
<ul class="nav nav-tabs" role="tablist">
<li role="presentation" class="active">
  <a href="#perdet" aria-controls="perdet" role="tab" data-toggle="tab" aria-expanded="true">Personal Details</a>
</li>
<li>
  <a href="#pan" aria-controls="pan" role="tab" data-toggle="tab" aria-expanded="false">Aadhar/PAN Details</a>
</li>
<li>
  <a href="#addrdet" aria-controls="addrdet" role="tab" data-toggle="tab" aria-expanded="false">Address Details</a>
</li>
<li>
  <a href="#famdet" aria-controls="famdet" role="tab" data-toggle="tab" aria-expanded="false">Family Details</a>
</li>
<li>
  <a href="#bankdet" aria-controls="bankdet" role="tab" data-toggle="tab" aria-expanded="false">Bank Details</a>
</li>
<li>
  <a href="#educdet" aria-controls="educdet" role="tab" data-toggle="tab" aria-expanded="false">Education Details</a>
</li>
<li>
  <a href="#emp" aria-controls="emp" role="tab" data-toggle="tab" aria-expanded="false">Employment Details</a>
</li>
<li>
  <a href="#tcdet" aria-controls="tcdet" role="tab" data-toggle="tab" aria-expanded="false">Technical Competency</a>
</li>
<li>
  <a href="#eca" aria-controls="eca" role="tab" data-toggle="tab" aria-expanded="false">	Extra Curricular</a>
</li>
</ul>

<div class="tab-content">
<div style="text-align:center; padding-top:5px;"><font color="blue"><?php if($msg) { echo $msg; } ?></font></div>
<div role="tabpanel" class="tab-pane active" id="perdet">
<div class="tabhead1"><h3>Personal Details</h3></div>

<div class="form-group">
<label class="col-sm-2 control-label">Emp Code<font color="#ff0000">*</font></label>
<div class="col-sm-4">
	<input type="text" name="ecode" id="ecode" value="A0144" class="form-control" disabled/>
</div>

<label class="col-sm-2 control-label">Name<font color="#ff0000">*</font></label>
<div class="col-sm-4">
	<input type="text" name="emp_name" id="emp_name" placeholder="As per aadhar" class="form-control" value="ABC" readonly/>
</div>
</div>
<div class="formgap">&nbsp;</div>

<div class="form-group">
<label class="col-sm-2 control-label">Date of Birth<font color="#ff0000">*</font></label>
<div class="col-sm-4">
	<input type="date" name="dob" id="dob" class="form-control" autocomplete="off" />
</div>

<label class="col-sm-2 control-label">Actual Date of Birth<font color="#ff0000">*</font></label>
<div class="col-sm-4">
	<input type="date" name="act_dob" id="act_dob" class="form-control" autocomplete="off" />
</div>
</div>
<div class="formgap">&nbsp;</div>

<div class="form-group">
<label class="col-sm-2 control-label">Blood Group<font color="#ff0000">*</font></label>
<div class="col-sm-4">
		<select name="bgroup" class="form-control" style="height:30px">
		<option value="">Select group</option>
		<option value="A+">A+</option>
		<option value="A-">A-</option>
		<option value="B+">B+</option>
		<option value="B-">B-</option>
		<option value="O+">O+</option>
		<option value="O-">O-</option>
		<option value="AB+">AB+</option>
		<option value="AB-">AB-</option>
		</select>
</div>

<label class="col-sm-2 control-label">Highest Education<font color="#ff0000">*</font></label>
<div class="col-sm-4">
	<input type="text" name="high_edu" id="high_edu" class="form-control" title="Please enter education" />
</div>
</div>
<div class="formgap">&nbsp;</div>

<div class="form-group">
<label class="col-sm-2 control-label">Gender<font color="#ff0000">*</font></label>
<div class="col-sm-4">
	<input type="radio" name="gender" id="gender" value="Male" />&nbsp;Male &nbsp;&nbsp;&nbsp; <input type="radio" name="gender" id="gender1" value="Female" />&nbsp;Female
</div>

<label class="col-sm-2 control-label">Marital Status<font color="#ff0000">*</font></label>
<div class="col-sm-4">
	<input type="radio" name="marst" id="marst" value="Married" />&nbsp;Married &nbsp;&nbsp;&nbsp; <input type="radio" name="marst" id="marst1" value="Single" />&nbsp;Single
</div>
</div>

<div class="form-group" style="display:none;" id="maid">
<label class="col-sm-2 control-label"></label>
<div class="col-sm-4">
	<!-- <input type="text" name="contno" id="contno" class="form-control" title="Please enter mobile no" /> -->
</div>

<label class="col-sm-2 control-label">Marr.Anniv.Date</label>
<div class="col-sm-4">
	<input type="date" name="madate" id="madate" class="form-control"  autocomplete="off" />
</div>
</div>
<div class="formgap">&nbsp;</div>

<div class="form-group">
<label class="col-sm-2 control-label">Contact No<font color="#ff0000">*</font></label>
<div class="col-sm-4">
	<input type="text" name="contno" id="contno" class="form-control" title="Please enter mobile no" />
</div>

<label class="col-sm-2 control-label">Personal Email ID<font color="#ff0000">*</font></label>
<div class="col-sm-4">
	<input type="text" name="emp_email" id="emp_email" class="form-control" title="Please enter a email" value="abc@abc.com" readonly />
</div>
</div>
<div class="formgap">&nbsp;</div>

<div class="form-group">
<label class="col-sm-2 control-label">Nationality<font color="#ff0000">*</font></label>
<div class="col-sm-4">
	<input type="text" name="nationality" id="nationality" class="form-control" />
</div>
<label class="col-sm-2 control-label">Profile Image<font color="#ff0000">*</font></label>
<div class="col-sm-4">
	<input type="file" name="profile_pic" id="profile_pic" class="form-control" accept=".png, .jpg, .jpeg" />
</div>
</div>

<div class="formgap">&nbsp;</div>



<div class="tabhead1" style="padding-top: 15px;"><h4>Emergency Contact Details</h4></div>
<div class="form-group">
<label class="col-sm-2 control-label">Full Name<font color="#ff0000">*</font></label>
<div class="col-sm-4">
	<input type="text" name="emer_name" id="emer_name" placeholder="Emergency cont person name" class="form-control" />
</div>

<label class="col-sm-2 control-label">Relationship<font color="#ff0000">*</font></label>
<div class="col-sm-4">
	<select name="emer_rel" class="form-control" style="height:30px" >
		<option value="">Select</option>
		<option value="Father">Father</option>
		<option value="Mother">Mother</option>
		<option value="Spouse">Spouse</option>
		<option value="Brother">Brother</option>
		<option value="Sister">Sister</option>
	</select>
</div>
</div>
<div class="formgap">&nbsp;</div>

<div class="form-group">
<label class="col-sm-2 control-label">Address<font color="#ff0000">*</font></label>
<div class="col-sm-4">
	<input type="text" name="emer_addr" id="emer_addr" placeholder="Emergency cont person address" class="form-control" title="Please enter mobile no" />
</div>

<label class="col-sm-2 control-label">Contact No<font color="#ff0000">*</font></label>
<div class="col-sm-4">
	<input type="text" name="emer_cont" id="emer_cont" placeholder="Emergency cont no" class="form-control" title="Please enter a email" />
</div>
</div>
<div class="formgap">&nbsp;</div>

<div align="center" style="margin-top:15px"><a class="btn btn-primary continue">Continue</a></div>
</div>
 <!-- End personal details -->

 <div role="tabpanel" class="tab-pane" id="pan">
<div class="tabhead1"><h3 class="">Aadhar/PAN Details</h3></div>

<div class="form-group">
<label class="col-sm-2 control-label">Aadhar No<font color="#ff0000">*</font></label>
<div class="col-sm-4">
	<input type="text" name="emp_aadhar_no" id="emp_aadhar_no" class="form-control" />
</div>

<label class="col-sm-2 control-label">PAN No<font color="#ff0000">*</font></label>
<div class="col-sm-4">
	<input type="text" name="emp_pan_no" id="emp_pan_no" class="form-control" />
</div>
</div>
<div class="formgap">&nbsp;</div>
<div class="form-group">
<label class="col-sm-2 control-label">Aadhar Image<font color="#ff0000">*</font></label>
<div class="col-sm-4">
	<input type="file" name="emp_aadhar_img" id="emp_aadhar_img" class="form-control" accept=".png, .jpg, .jpeg" />
</div>

<label class="col-sm-2 control-label">PAN Image<font color="#ff0000">*</font></label>
<div class="col-sm-4">
	<input type="file" name="emp_pan_img" id="emp_pan_img" class="form-control" accept=".png, .jpg, .jpeg" />
</div>
</div>
<div class="formgap">&nbsp;</div>
<div class="tabhead1"><h3 class="">Passport Details</h3></div>
<div class="formgap">&nbsp;</div>

<div class="form-group">
<label class="col-sm-2 control-label">Passport No</label>
<div class="col-sm-4">
	<input type="text" name="pp_no" id="pp_no" class="form-control" />
</div>

<label class="col-sm-2 control-label">Issue Date</label>
<div class="col-sm-4">
	<input type="date" name="pp_issuedt" id="pp_issuedt" class="form-control" autocomplete="off" />
</div>
</div>
<div class="formgap">&nbsp;</div>

<div class="form-group">
<label class="col-sm-2 control-label">Passport Exp Date</label>
<div class="col-sm-4">
	<input type="date" name="pp_expdt" id="pp_expdt" class="form-control" autocomplete="off" />
</div>
</div>
<div style="clear:both"></div>
<div align="center" style="margin-top:15px"><a class="btn btn-primary back">Go Back</a> <a class="btn btn-primary continue">Continue</a></div>
</div><!-- pan -->

 <div role="tabpanel" class="tab-pane" id="addrdet">

<div class="col-sm-1"></div>
<div class="col-sm-5">
	<div class="tabhead1"><h3 class="">Permanent Address Details</h3></div>
	<div class="form-group">
	<label class="col-sm-2 control-label">Address<font color="#ff0000">*</font></label>
<div class="col-sm-10">
	<input type="text" name="hno" id="hno" class="form-control" />
</div>
</div>
<div class="formgap">&nbsp;</div>
<div class="form-group">
	<label class="col-sm-2 control-label">City<font color="#ff0000">*</font></label>
		<div class="col-sm-10">
			<input type="text" name="city" id="city" class="form-control" />
		</div>
	</div>
<div class="formgap">&nbsp;</div>
	<div class="form-group">
	<label class="col-sm-2 control-label">State<font color="#ff0000">*</font></label>
		<div class="col-sm-10">
			<input type="text" name="state" id="state" class="form-control" />
		</div>
	</div>
<div class="formgap">&nbsp;</div>

	<div class="form-group">
	<label class="col-sm-2 control-label">Zipcode<font color="#ff0000">*</font></label>
		<div class="col-sm-10">
			<input type="text" name="zipcode" id="zipcode" class="form-control"  />
		</div>
	</div>
<div class="formgap">&nbsp;</div>
	<div class="form-group">
	<label class="col-sm-2 control-label">Country<font color="#ff0000">*</font></label>
		<div class="col-sm-10">
			<input type="text" name="country" id="country" class="form-control" /><br><input type="checkbox" id="copyaddr" />&nbsp;Same as Permanent address
		</div>
	</div>

</div>


<div class="col-sm-5">

	<div class="tabhead1"><h3 class="">Mailing Address Details</h3></div>

	<div class="form-group">
	<label class="col-sm-2 control-label">Address<font color="#ff0000">*</font></label>
		<div class="col-sm-10">
			<input type="text" name="perm_hno" id="perm_hno" class="form-control" />
		</div>
	</div>
	<div class="formgap">&nbsp;</div>
	<div class="form-group">
<label class="col-sm-2 control-label">City<font color="#ff0000">*</font></label>
<div class="col-sm-10">
	<input type="text" name="perm_city" id="perm_city" class="form-control" />
</div>
</div>
<div class="formgap">&nbsp;</div>

	<div class="form-group">
	<label class="col-sm-2 control-label">State<font color="#ff0000">*</font></label>
		<div class="col-sm-10">
			<input type="text" name="perm_state" id="perm_state" class="form-control" />
		</div>
	</div>
<div class="formgap">&nbsp;</div>
<div class="form-group">
<label class="col-sm-2 control-label">Zipcode<font color="#ff0000">*</font></label>
<div class="col-sm-10">
	<input type="text" name="perm_zipcode" id="perm_zipcode" class="form-control" title="Please enter a state." />
</div>
</div>
<div class="formgap">&nbsp;</div>
<div class="form-group">
<label class="col-sm-2 control-label">Country<font color="#ff0000">*</font></label>
<div class="col-sm-10">
	<input type="text" name="perm_country" id="perm_country" class="form-control" title="Please enter a country." />
</div>
</div>
<div class="formgap">&nbsp;</div>


	

</div><!-- col-sm-5 -->
<div class="col-sm-1"></div>
<div style="clear:both"></div>


<div align="center" style="margin-top:15px"><a class="btn btn-primary back">Go Back</a> <a class="btn btn-primary continue">Continue</a></div>
</div>


<div role="tabpanel" class="tab-pane" id="famdet">
<div class="tabhead1"><h3 class="">Family Details</h3></div>
<!-- Family Details -->
<div class="form-group">

<div class="col-sm-2">
<b>Relation</b><br>
	<select name="erel" id="erel" class="form-control" style="height:30px" >
		<option value="">Select</option>
		<option value="Father">Father</option>
		<option value="Mother">Mother</option>
		<option value="spouse">Spouse</option>
		<option value="Child1">Child1</option>
		<option value="Child2">Child2</option>
		<option value="Child3">Child3</option>
		<option value="Child4">Child4</option>
		</select>
</div>


<div class="col-sm-2">
<b>Name</b><br>
	<input type="text" name="relname" id="relname" placeholder="As per aadhar" class="form-control" />
</div>

<div class="col-sm-2">
<b>Date of Birth</b><br>
	<input type="date" name="reldob" id="reldob" class="form-control" autocomplete="off" />
</div>


<!-- <div class="col-sm-1">
<b>Age</b><font color="#ff0000">*</font><br>
	<input type="text" name="relage" id="relage" class="form-control" />
</div> -->


<div class="col-sm-2">
<b>Aadhar no</b><br>
	<input type="text" name="relaad" id="relaad" class="form-control" />
</div>


<div class="col-sm-3">
<b>Aadhar Img</b><br>
	<input type="file" name="reladimg" id="reladimg" class="form-control" accept=".png, .jpg, .jpeg" />
</div>

<div class="col-sm-1">
<div style="display:block; margin-top: 25px;" id="1div">
	<span id="1but" class="plus-icon"><i class="fa fa-plus-circle" aria-hidden="true"></i></span>
</div>
</div>

</div>
<div class="formgap">&nbsp;</div>


<div id="rel2" style="display:none;">
<div class="form-group">
<div class="col-sm-2">
	<select name="erel2" id="erel2" class="form-control" style="height:30px" >
		<option value="">Select</option>
		<option value="Father">Father</option>
		<option value="Mother">Mother</option>
		<option value="spouse">Spouse</option>
		<option value="Child1">Child1</option>
		<option value="Child2">Child2</option>
		<option value="Child3">Child3</option>
		<option value="Child4">Child4</option>
		</select>
</div>


<div class="col-sm-2">
	<input type="text" name="relname2" id="relname2" placeholder="As per aadhar" class="form-control" />
</div>

<div class="col-sm-2">
	<input type="date" name="reldob2" id="reldob2" class="form-control" autocomplete="off" />
</div>


<!-- <div class="col-sm-1">
	<input type="text" name="relage2" id="relage2" class="form-control" />
</div> -->


<div class="col-sm-2">
	<input type="text" name="relaad2" id="relaad2" class="form-control" />
</div>


<div class="col-sm-3">
	<input type="file" name="reladimg2" id="reladimg2" class="form-control" accept=".png, .jpg, .jpeg" />
</div>

<div class="col-sm-1">
<div style="display:none; margin-top: 5px;" id="2div">
	<span id="2but" class="plus-icon"><i class="fa fa-plus-circle" aria-hidden="true"></i></span> <span id="rem2div" class="plus-icon"><i class="fa fa-minus-circle" aria-hidden="true"></i></span>
</div>
</div>
</div>
</div>
<div class="formgap">&nbsp;</div>

<div id="rel3" style="display:none;">
<div class="form-group">
<div class="col-sm-2">
	<select name="erel3" id="erel3" class="form-control" style="height:30px" >
		<option value="">Select</option>
		<option value="Father">Father</option>
		<option value="Mother">Mother</option>
		<option value="spouse">Spouse</option>
		<option value="Child1">Child1</option>
		<option value="Child2">Child2</option>
		<option value="Child3">Child3</option>
		<option value="Child4">Child4</option>
		</select>
</div>


<div class="col-sm-2">
	<input type="text" name="relname3" id="relname3" placeholder="As per aadhar" class="form-control" />
</div>

<div class="col-sm-2">
	<input type="date" name="reldob3" id="reldob3" class="form-control" autocomplete="off" />
</div>


<!-- <div class="col-sm-1">
	<input type="text" name="relage3" id="relage3" class="form-control" />
</div> -->


<div class="col-sm-2">
	<input type="text" name="relaad3" id="relaad3" class="form-control" />
</div>


<div class="col-sm-3">
	<input type="file" name="reladimg3" id="reladimg3" class="form-control" accept=".png, .jpg, .jpeg" />
</div>

<div class="col-sm-1">
<div style="display:none; margin-top: 5px;" id="3div">
	<span id="3but" class="plus-icon"><i class="fa fa-plus-circle" aria-hidden="true"></i></span> <span id="rem3div" class="plus-icon"><i class="fa fa-minus-circle" aria-hidden="true"></i></span>
</div>
</div>
</div>
</div>
<div class="formgap">&nbsp;</div>

<!-- Family Details -->
<div id="rel4" style="display:none;">
<div class="form-group">
<div class="col-sm-2">
	<select name="erel4" id="erel4" class="form-control" style="height:30px" >
		<option value="">Select</option>
		<option value="Father">Father</option>
		<option value="Mother">Mother</option>
		<option value="spouse">Spouse</option>
		<option value="Child1">Child1</option>
		<option value="Child2">Child2</option>
		<option value="Child3">Child3</option>
		<option value="Child4">Child4</option>
		</select>
</div>


<div class="col-sm-2">
	<input type="text" name="relname4" id="relname4" placeholder="As per aadhar" class="form-control" />
</div>

<div class="col-sm-2">
	<input type="date" name="reldob4" id="reldob4" class="form-control" autocomplete="off" />
</div>


<!-- <div class="col-sm-1">
	<input type="text" name="relage4" id="relage4" class="form-control" />
</div> -->


<div class="col-sm-2">
	<input type="text" name="relaad4" id="relaad4" class="form-control" />
</div>


<div class="col-sm-3">
	<input type="file" name="reladimg4" id="reladimg4" class="form-control" accept=".png, .jpg, .jpeg" />
</div>

<div class="col-sm-1">
<div style="display:none; margin-top: 5px;" id="4div">
	<span id="4but" class="plus-icon"><i class="fa fa-plus-circle" aria-hidden="true"></i></span> <span id="rem4div" class="plus-icon"><i class="fa fa-minus-circle" aria-hidden="true"></i></span>
</div>
</div>
</div>
</div>
<div class="formgap">&nbsp;</div>

<!-- Family Details -->
<div id="rel5" style="display:none;">
<div class="form-group">
<div class="col-sm-2">
	<select name="erel5" id="erel5" class="form-control" style="height:30px" >
		<option value="">Select</option>
		<option value="Father">Father</option>
		<option value="Mother">Mother</option>
		<option value="spouse">Spouse</option>
		<option value="Child1">Child1</option>
		<option value="Child2">Child2</option>
		<option value="Child3">Child3</option>
		<option value="Child4">Child4</option>
		</select>
</div>


<div class="col-sm-2">
	<input type="text" name="relname5" id="relname5" placeholder="As per aadhar" class="form-control" />
</div>

<div class="col-sm-2">
	<input type="date" name="reldob5" id="reldob5" class="form-control" autocomplete="off" />
</div>


<!-- <div class="col-sm-1">
	<input type="text" name="relage5" id="relage5" class="form-control" />
</div> -->


<div class="col-sm-2">
	<input type="text" name="relaad5" id="relaad5" class="form-control" />
</div>


<div class="col-sm-3">
	<input type="file" name="reladimg5" id="reladimg5" class="form-control" accept=".png, .jpg, .jpeg" />
</div>

<div class="col-sm-1">
<div style="display:none; margin-top: 5px;" id="5div">
	<span id="5but" class="plus-icon"><i class="fa fa-plus-circle" aria-hidden="true"></i></span> <span id="rem5div" class="plus-icon"><i class="fa fa-minus-circle" aria-hidden="true"></i></span>
</div>
</div>
</div>
</div>
<div class="formgap">&nbsp;</div>

<!-- Family Details -->
<div id="rel6" style="display:none;">
<div class="form-group">
<div class="col-sm-2">
	<select name="erel6" id="erel6" class="form-control" style="height:30px" >
		<option value="">Select</option>
		<option value="Father">Father</option>
		<option value="Mother">Mother</option>
		<option value="spouse">Spouse</option>
		<option value="Child1">Child1</option>
		<option value="Child2">Child2</option>
		<option value="Child3">Child3</option>
		<option value="Child4">Child4</option>
		</select>
</div>


<div class="col-sm-2">
	<input type="text" name="relname6" id="relname6" placeholder="As per aadhar" class="form-control" />
</div>

<div class="col-sm-2">
	<input type="date" name="reldob6" id="reldob6" class="form-control" autocomplete="off" />
</div>


<!-- <div class="col-sm-1">
	<input type="text" name="relage6" id="relage6" class="form-control" />
</div> -->


<div class="col-sm-2">
	<input type="text" name="relaad6" id="relaad6" class="form-control" />
</div>


<div class="col-sm-3">
	<input type="file" name="reladimg6" id="reladimg6" class="form-control" accept=".png, .jpg, .jpeg" />
</div>

<div class="col-sm-1">
<div style="display:none; margin-top: 5px" id="6div">
	<span id="6but" class="plus-icon"><i class="fa fa-plus-circle" aria-hidden="true"></i></span> <span id="rem6div" class="plus-icon"><i class="fa fa-minus-circle" aria-hidden="true"></i></span>
</div>
</div>
</div>
</div>
<div class="formgap">&nbsp;</div>
<!-- Family Details -->
<div id="rel7" style="display:none;">
<div class="form-group">
<div class="col-sm-2">
	<select name="erel7" id="erel7" class="form-control" style="height:30px" >
		<option value="">Select</option>
		<option value="Father">Father</option>
		<option value="Mother">Mother</option>
		<option value="spouse">Spouse</option>
		<option value="Child1">Child1</option>
		<option value="Child2">Child2</option>
		<option value="Child3">Child3</option>
		<option value="Child4">Child4</option>
		</select>
</div>


<div class="col-sm-2">
	<input type="text" name="relname7" id="relname7" placeholder="As per aadhar" class="form-control" />
</div>

<div class="col-sm-2">
	<input type="date" name="reldob7" id="reldob7" class="form-control" autocomplete="off" />
</div>


<!-- <div class="col-sm-1">
	<input type="text" name="relage7" id="relage7" class="form-control" />
</div> -->


<div class="col-sm-2">
	<input type="text" name="relaad7" id="relaad7" class="form-control" />
</div>


<div class="col-sm-3">
	<input type="file" name="reladimg7" id="reladimg7" class="form-control" accept=".png, .jpg, .jpeg" />
</div>

<div class="col-sm-1">
<div style="display:none; margin-top: 5px;" id="7div">
	<span id="rem7div" class="plus-icon"><i class="fa fa-minus-circle" aria-hidden="true"></i></span>
</div>
</div>
</div>
</div>
<!-- End family details -->
<div class="formgap">&nbsp;</div>


<div align="center" style="margin-top:15px"><a class="btn btn-primary back">Go Back</a> <a class="btn btn-primary continue">Continue</a></div>
</div>


<div role="tabpanel" class="tab-pane" id="bankdet">
<div class="tabhead1"><h3 class="">Bank Details</h3></div>
<div class="form-group">
<label class="col-sm-2 control-label">Account Holder Name<font color="#ff0000">*</font></label>
<div class="col-sm-4">
	<input type="text" name="ahn" id="ahn" class="form-control" />
</div>
<label class="col-sm-2 control-label">Account No<font color="#ff0000">*</font></label>
<div class="col-sm-4">
	<input type="text" name="ac_no" id="ac_no" class="form-control" />
</div>
</div>
<div class="formgap">&nbsp;</div>

<div class="form-group">
<label class="col-sm-2 control-label">Name of bank<font color="#ff0000">*</font></label>
<div class="col-sm-4">
	<input type="text" name="bank_name" id="bank_name" class="form-control" />
</div>
<label class="col-sm-2 control-label">Name of branch<font color="#ff0000">*</font></label>
<div class="col-sm-4">
	<input type="text" name="brach_name" id="brach_name" class="form-control" />
</div>
</div>
<div class="formgap">&nbsp;</div>

<div class="form-group">


<label class="col-sm-2 control-label">Account type<font color="#ff0000">*</font></label>
<div class="col-sm-4">
	<input type="text" name="ac_type" id="ac_type" class="form-control" />
</div>
</div>
<div class="formgap">&nbsp;</div>
<div class="tabhead1" style="margin-top:20px"><h4 class="">PF Details</h4></div>

<div class="form-group">
<div class="col-sm-4">
	<b>PF Account No</b>
	<input type="text" name="pf_no" id="pf_no" class="form-control" />
</div>

<div class="col-sm-4">
	<b>UAN No</b>
	<input type="text" name="uan_no" id="uan_no" class="form-control" />
</div>

<div class="col-sm-4">
<b>Date of Exit(Previous Employer)</b>
	<input type="date" name="dt_exit" id="dt_exit" class="form-control" />
</div>
</div>
<div class="formgap">&nbsp;</div>

<div class="form-group">
</div>
<div class="formgap">&nbsp;</div>

<div class="tabhead1""><h4 class="">Nominee Details</h4></div>
<div class="form-group">
<div class="col-sm-4">
<b>Nominee Name</b><font color="#ff0000">*</font>
	<input type="text" name="nom_name" id="nom_name" class="form-control" />
</div>
<div class="col-sm-4">
<b>Relationship</b><font color="#ff0000">*</font>
	<input type="text" name="relation" id="relation" class="form-control" />
</div>
<div class="col-sm-4">
<b>DOB of Nominee</b><font color="#ff0000">*</font>
	<input type="date" name="nom_dob" id="nom_dob" class="form-control" autocomplete="off" />
</div>
</div>
<div class="formgap">&nbsp;</div>

<div align="center" style="margin-top:15px"><a class="btn btn-primary back">Go Back</a> <a class="btn btn-primary continue">Continue</a></div>
</div>

<div role="tabpanel" class="tab-pane" id="educdet">
<div class="tabhead1"><h3 class="">Education Details</h3></div>
<!-- Parents Details -->
<div class="form-group">
<div class="col-sm-2">
	<b>Qualification</b><font color="#ff0000">*</font>
	<input type="text" name="qual1" id="qual1" placeholder="" class="form-control" />
</div>
<div class="col-sm-2">
 <b>Year of Passing</b><font color="#ff0000">*</font>
<input type="text" name="yop1" id="yop1" placeholder="" class="form-control" />
</div>

<div class="col-sm-3">
<b>School/University/College</b><font color="#ff0000">*</font>
	<input type="text" name="univ1" id="univ1" placeholder="" class="form-control" />
</div>
<div class="col-sm-2">
	<b>Major Subject</b><font color="#ff0000">*</font>
	<input type="text" name="ms1" id="ms1" placeholder="" class="form-control" />
</div>
<div class="col-sm-2">
	<b>Class/Division/Percentage</b><font color="#ff0000">*</font>
	<input type="text" name="perc1" id="perc1" placeholder="" class="form-control" />
</div>
<div class="col-sm-1">&nbsp;</div>
<div style="display:block; margin-top: 26px;" id="1qual"><span id="educ1" class="plus-icon"><i class="fa fa-plus-circle" aria-hidden="true"></i></span></div>
<div class="formgap">&nbsp;</div>
</div>


<div class="form-group" style="display:none;" id="educqual2">
<div class="col-sm-2">
	<input type="text" name="qual2" id="qual2" placeholder="" class="form-control" />
</div>
<div class="col-sm-2">
<input type="text" name="yop2" id="yop2" placeholder="" class="form-control" />
</div>

<div class="col-sm-3">
	<input type="text" name="univ2" id="univ2" placeholder="" class="form-control" />
</div>
<div class="col-sm-2">
	<input type="text" name="ms2" id="ms2" placeholder="" class="form-control" />
</div>
<div class="col-sm-2">
	<input type="text" name="perc2" id="perc2" placeholder="" class="form-control" />
</div>
<div class="col-sm-1">&nbsp;</div>
<div style="display:none; margin-top: 26px;" id="2qual"><span id="educ2" class="plus-icon"><i class="fa fa-plus-circle" aria-hidden="true"></i></span> <span id="remqual2" class="plus-icon"><i class="fa fa-minus-circle" aria-hidden="true"></i></span></div>
<div class="formgap">&nbsp;</div>
</div>

<div class="form-group" style="display:none;" id="educqual3">
<div class="col-sm-2">
	<input type="text" name="qual3" id="qual3" placeholder="" class="form-control" />
</div>
<div class="col-sm-2">
<input type="text" name="yop3" id="yop3" placeholder="" class="form-control" />
</div>

<div class="col-sm-3">
	<input type="text" name="univ3" id="univ3" placeholder="" class="form-control" />
</div>
<div class="col-sm-2">
	<input type="text" name="ms3" id="ms3" placeholder="" class="form-control" />
</div>
<div class="col-sm-2">
	<input type="text" name="perc3" id="perc3" placeholder="" class="form-control" />
</div>
<div class="col-sm-1">&nbsp;</div>
<div style="display:none; margin-top: 26px;" id="3qual"><span id="educ3" class="plus-icon"><i class="fa fa-plus-circle" aria-hidden="true"></i></span> <span id="remqual3" class="plus-icon"><i class="fa fa-minus-circle" aria-hidden="true"></i></span></div>
<div class="formgap">&nbsp;</div>
</div>


<div class="form-group" style="display:none;" id="educqual4">
<div class="col-sm-2">
	<input type="text" name="qual4" id="qual4" class="form-control" />
</div>
<div class="col-sm-2">
<input type="text" name="yop4" id="yop4" class="form-control" />
</div>

<div class="col-sm-3">
	<input type="text" name="univ4" id="univ4" class="form-control" />
</div>
<div class="col-sm-2">
	<input type="text" name="ms4" id="ms4" class="form-control" />
</div>
<div class="col-sm-2">
	<input type="text" name="perc4" id="perc4" class="form-control" />
</div>
<div class="col-sm-1">&nbsp;</div>
<div style="display:none; margin-top: 26px;" id="4qual"><span id="remqual4" class="plus-icon"><i class="fa fa-minus-circle" aria-hidden="true"></i></span></div>
</div>

<div style="clear:both">&nbsp;</div>
<div class="formgap">&nbsp;</div>
<div class="form-group">
<div class="col-sm-7">
	<b>Are you pursuing any course</b><font color="#ff0000">*</font> <input type="radio" name="pers" id="yes" value="Yes" />&nbsp;Yes &nbsp;&nbsp;&nbsp; <input type="radio" name="pers" id="no" value="No" />&nbsp;No
	<input type="text" name="pursuing" id="pursuing" class="form-control" style="display:none;"/>
</div>
<div style="clear:both">&nbsp;</div>

</div>

<div align="center" style="margin-top:15px"><a class="btn btn-primary back">Go Back</a> <a class="btn btn-primary continue">continue</a></div>
</div>


<!-- <div role="tabpanel" class="tab-pane" id="lang">
<div class="tabhead1"><h3 class="">Language Proficiency</h3></div>
<table class="table">
<tr>
	<td></td>
	<td><b>Read</b></td>
	<td><b>Write</b></td>
	<td><b>Speak</b></td>
</tr>
<tr>
	<td><b>Telugu</b></td>
	<td><input type="checkbox" id="rd_tel" name="rd_tel" value="Yes"></td>
	<td><input type="checkbox" id="wr_tel" name="wr_tel" value="Yes"></td>
	<td><input type="checkbox" id="sp_tel" name="sp_tel" value="Yes"></td>
</tr>
<tr>
	<td><b>Hindi</b></td>
	<td><input type="checkbox" id="rd_hin" name="rd_hin" value="Yes"></td>
	<td><input type="checkbox" id="wr_hin" name="wr_hin" value="Yes"></td>
	<td><input type="checkbox" id="sp_hin" name="sp_hin" value="Yes"></td>
</tr>
<tr>
	<td><b>English</b></td>
	<td><input type="checkbox" id="rd_eng" name="rd_eng" value="Yes"></td>
	<td><input type="checkbox" id="wr_eng" name="wr_eng" value="Yes"></td>
	<td><input type="checkbox" id="sp_eng" name="sp_eng" value="Yes"></td>
</tr>
<tr>
	<td><b>Other Language (if any)</b></td>
	<td><input type="text" name="rd_oth" id="rd_oth" class="form-control"/></td>
	<td><input type="text" name="wr_oth" id="wr_oth" class="form-control"/></td>
	<td><input type="text" name="sp_oth" id="sp_oth" class="form-control"/></td>
</tr>
</table>

<div align="center" style="margin-top:15px"><a class="btn btn-primary back">Go Back</a> <a class="btn btn-primary continue">Continue</a></div>
</div> -->

<div role="tabpanel" class="tab-pane" id="emp">
<div class="tabhead1"><h3 class="">Employment Details (Starting from first organization to recent organization)</h3></div>
<div class="form-group">
<div class="col-sm-3">
<b>Name of the Organization</b>
	<input type="text" name="org_name" id="org_name" class="form-control" />
</div>
<div class="col-sm-3">
<b>Designation</b>
	<input type="text" name="desig_name" id="desig_name" class="form-control" />
</div>
<div class="col-sm-3">
<b>Duration Worked</b>
	<input type="text" name="dur_work" id="dur_work" class="form-control" />
</div>
<div class="col-sm-2">
<b>Reason for leaving</b>
	<input type="text" name="reason" id="reason" class="form-control" />
</div>
<div class="col-sm-1">
<div style="display:block; margin-top: 26px;" id="1ed"><span id="ed1" class="plus-icon"><i class="fa fa-plus-circle" aria-hidden="true"></i></span></div>
</div>
<div class="formgap">&nbsp;</div>
</div>


<div class="form-group" style="display:none;" id="emp_det2">
<div class="col-sm-3">
	<input type="text" name="org_name2" id="org_name2" class="form-control" />
</div>
<div class="col-sm-3">
	<input type="text" name="desig_name2" id="desig_name2" class="form-control" />
</div>
<div class="col-sm-3">
	<input type="text" name="dur_work2" id="dur_work2" class="form-control" />
</div>
<div class="col-sm-2">
	<input type="text" name="reason2" id="reason2" class="form-control" />
</div>
<div class="col-sm-1">
<div style="display:none; margin-top: 5px;" id="2ed"><span id="ed2" class="plus-icon"><i class="fa fa-plus-circle" aria-hidden="true"></i></span> <span id="remed2" class="plus-icon"><i class="fa fa-minus-circle" aria-hidden="true"></i></span></div>
</div>
<div class="formgap">&nbsp;</div>
</div>


<div class="form-group" style="display:none;" id="emp_det3">
<div class="col-sm-3">
	<input type="text" name="org_name3" id="org_name3" class="form-control" />
</div>
<div class="col-sm-3">
	<input type="text" name="desig_name3" id="desig_name3" class="form-control" />
</div>
<div class="col-sm-3">
	<input type="text" name="dur_work3" id="dur_work3" class="form-control" />
</div>
<div class="col-sm-2">
	<input type="text" name="reason3" id="reason3" class="form-control" />
</div>
<div class="col-sm-1">
<div style="display:none; margin-top: 5px;" id="3ed"><span id="ed3" class="plus-icon"><i class="fa fa-plus-circle" aria-hidden="true"></i></span> <span id="remed3" class="plus-icon"><i class="fa fa-minus-circle" aria-hidden="true"></i></span></div>
</div>
<div class="formgap">&nbsp;</div>
</div>

<div class="form-group" style="display:none;" id="emp_det4">
<div class="col-sm-3">
	<input type="text" name="org_name4" id="org_name4" class="form-control" />
</div>
<div class="col-sm-3">
	<input type="text" name="desig_name4" id="desig_name4" class="form-control" />
</div>
<div class="col-sm-3">
	<input type="text" name="dur_work4" id="dur_work4" class="form-control" />
</div>
<div class="col-sm-2">
	<input type="text" name="reason4" id="reason4" class="form-control" />
</div>
<div class="col-sm-1">
<div style="display:none; margin-top: 5px;" id="4ed"><span id="ed4" class="plus-icon"><i class="fa fa-plus-circle" aria-hidden="true"></i></span> <span id="remed4" class="plus-icon"><i class="fa fa-minus-circle" aria-hidden="true"></i></span></div>
</div>
<div class="formgap">&nbsp;</div>
</div>



<div class="form-group" style="display:none;" id="emp_det5">
<div class="col-sm-3">
	<input type="text" name="org_name5" id="org_name5" class="form-control" />
</div>
<div class="col-sm-3">
	<input type="text" name="desig_name5" id="desig_name5" class="form-control" />
</div>
<div class="col-sm-3">
	<input type="text" name="dur_work5" id="dur_work5" class="form-control" />
</div>
<div class="col-sm-2">
	<input type="text" name="reason5" id="reason5" class="form-control" />
</div>
<div class="col-sm-1">
<div style="display:none; margin-top: 5px;" id="5ed"><span id="remed5" class="plus-icon"><i class="fa fa-minus-circle" aria-hidden="true"></i></span></div>
</div>
</div>


<div style="clear:both">&nbsp;</div>
<div class="formgap">&nbsp;</div>
<div class="form-group">
<div class="col-sm-7">
	<b>Have you been reffered to this position by FINT employee </b><font color="#ff0000">*</font> <input type="radio" name="refbyfint" id="yes" value="Yes" />&nbsp;Yes &nbsp;&nbsp;&nbsp; <input type="radio" name="refbyfint" id="no" value="No" />&nbsp;No
</div>
<div style="clear:both">&nbsp;</div>
</div>

<div class="form-group" id="refferby" style="display:none;">
<div class="col-sm-4">
<b>Name</b>
	<input type="text" name="empref_name" id="empref_name" class="form-control" />
</div>
<div class="col-sm-4">
<b>Contact No</b>
	<input type="text" name="empref_cont" id="empref_cont" class="form-control" />
</div>
<div class="col-sm-4">
<b>Emp_ID</b>
	<input type="text" name="empref_id" id="empref_id" class="form-control" />
</div>
</div>
<div class="formgap">&nbsp;</div>

<div class="tabhead1"><h3 class="">References from previous organization (Freshers/Interns need not mention)</h3></div>
<table class="table">
<tr>
	<td></td>
	<td><b>Reference 1</b></td>
	<td><b>Reference 2</b></td>
</tr>
<tr>
	<td><b>Name</b></td>
	<td><input type="text" name="ref_name" id="ref_name" class="form-control"/></td>
	<td><input type="text" name="ref_name2" id="ref_name2" class="form-control"/></td>
</tr>
<tr>
	<td><b>Designation</b></td>
	<td><input type="text" name="ref_desig" id="ref_desig" class="form-control"/></td>
	<td><input type="text" name="ref_desig2" id="ref_desig2" class="form-control"/></td>
</tr>
<tr>
	<td><b>Contact No</b></td>
	<td><input type="text" name="ref_cont" id="ref_cont" class="form-control"/></td>
	<td><input type="text" name="ref_cont2" id="ref_cont2" class="form-control"/></td>
</tr>
</table>

<div align="center" style="margin-top:15px"><a class="btn btn-primary back">Go Back</a>&nbsp;<a class="btn btn-primary continue">Continue</a></div>
</div>

 <!-- Technical competency -->
 <div role="tabpanel" class="tab-pane" id="tcdet">
<div class="tabhead1"><h3 class="">Technical Competency</h3></div>

<div class="form-group">
<div style="padding: 10px 10px; border:1px solid #ccc; margin:20px 0px;  margin: 0 auto; width: 650px; border-radius:6px;">

	<table style="font-family: Helvetica Neue,Helvetica,Arial,sans-serif; font-size:12px;" align="center" border="0" cellspacing="2" cellpadding="3">
	<tr>
		<td><b>Overall Experience:</b></td>
		<td><input type="text" name="yrs_exp" id="yrs_exp" class="form-control" /></td>
	</tr>

	<tr>
		<td><b>Role:</b></td>
		<td style="padding-top:10px;">
		<select name="desig" id="desig" class="form-control" style="width:242px; height:30px" />
<option value="">Select</option>
<?php $rol = mysqli_query($con,"SELECT * FROM emp_roles"); 
while($res = mysqli_fetch_array($rol)) {
?>
<option value="<?php echo $res['tbl_id']; ?>"><?php echo $res['role']; ?></option>
<?php } ?>
<option value="9">Other Role</option>
</select><br /><span id="othersp" style="display:none; padding-top:5px;"><input type="text" placeholder="Specify your role here" name="other" id="other" class="form-control" /></span>
</td>
	</tr>
	</table>
</div>
<div style="padding: 10px 10px; border:1px solid #ccc; margin:20px 0px; margin: 0 auto; width: 650px; border-radius:6px; margin-top: 10px;">
<table style="font-family: Helvetica Neue,Helvetica,Arial,sans-serif; font-size:12px;" align="center" border="0" cellspacing="2" cellpadding="3">
<tr>
	<td style="padding-left: 19px;"><b>Primary/Secondary Skills:<br>(Relevant Experience)</b></td>
<td>
<div id="row1">
<select name="prim1" id="prim1" class="form-control" style="width:242px; height:30px; display: initial;">
<option value="">Select</option>
<?php $qry = mysqli_query($con,"SELECT * FROM emp_skillset ORDER BY skill_name ASC"); 
while($rec = mysqli_fetch_array($qry))
{
?>
<option value="<?php echo $rec['tbl_id']; ?>"><?php echo $rec['skill_name']; ?></option>
<?php } ?>
</select>
<select name="prof1" id="prof1" class="form-control" style="width: 75px; height:30px; display: initial;" />
<option value="">Exp</option>
<option value="0-1">0-1</option>
<option value="1-4">1-4</option>
<option value="5-8">5-8</option>
<option value="9-12">9-12</option>
<option value=">12">&nbsp;> 12</option>
</select>
</div>
<div style="margin-top:3px;" id="row2">
<select name="prim2" id="prim2" class="form-control" style="width:242px; height:30px; display: initial;">
<option value="">Select</option>
<?php $qry2 = mysqli_query($con,"SELECT * FROM emp_skillset ORDER BY skill_name ASC"); 
while($rec2 = mysqli_fetch_array($qry2))
{
?>
<option value="<?php echo $rec2['tbl_id']; ?>"><?php echo $rec2['skill_name']; ?></option>
<?php } ?>
</select>
<select name="prof2" id="prof2" class="form-control" style="width: 75px; height:30px; display: initial;">
<option value="">Exp</option>
<option value="0-1">0-1</option>
<option value="1-4">1-4</option>
<option value="5-8">5-8</option>
<option value="9-12">9-12</option>
<option value=">12">&nbsp;> 12</option>
</select>
</div>

<div style="margin-top:3px;" id="row3">
<select name="prim3" id="prim3" class="form-control" style="width:242px; height:30px; display: initial;">
<option value="">Select</option>
<?php $qry3 = mysqli_query($con,"SELECT * FROM emp_skillset ORDER BY skill_name ASC"); 
while($rec3 = mysqli_fetch_array($qry3))
{
?>
<option value="<?php echo $rec3['tbl_id']; ?>"><?php echo $rec3['skill_name']; ?></option>
<?php } ?>
</select>
<select name="prof3" id="prof3" class="form-control" style="width: 75px; height:30px; display: initial;">
<option value="">Exp</option>
<option value="0-1">0-1</option>
<option value="1-4">1-4</option>
<option value="5-8">5-8</option>
<option value="9-12">9-12</option>
<option value=">12">&nbsp;> 12</option>
</select>
</div>

<div style="margin-top:3px;" id="row4">
<select name="prim4" id="prim4" class="form-control" style="width:242px; height:30px; display: initial;">
<option value="">Select</option>
<?php $qry3 = mysqli_query($con,"SELECT * FROM emp_skillset ORDER BY skill_name ASC"); 
while($rec3 = mysqli_fetch_array($qry3))
{
?>
<option value="<?php echo $rec3['tbl_id']; ?>"><?php echo $rec3['skill_name']; ?></option>
<?php } ?>
</select>
<select name="prof4" id="prof4" class="form-control" style="width: 75px; height:30px; display: initial;">
<option value="">Exp</option>
<option value="0-1">0-1</option>
<option value="1-4">1-4</option>
<option value="5-8">5-8</option>
<option value="9-12">9-12</option>
<option value=">12">&nbsp;> 12</option>
</select>
</div>

<div style="margin-top:3px;" id="row5">
<select name="prim5" id="prim5" class="form-control" style="width:242px; height:30px; display: initial;">
<option value="">Select</option>
<?php $qry3 = mysqli_query($con,"SELECT * FROM emp_skillset ORDER BY skill_name ASC"); 
while($rec3 = mysqli_fetch_array($qry3))
{
?>
<option value="<?php echo $rec3['tbl_id']; ?>"><?php echo $rec3['skill_name']; ?></option>
<?php } ?>
</select>
<select name="prof5" id="prof5" class="form-control" style="width: 75px; height:30px; display: initial;">
<option value="">Exp</option>
<option value="0-1">0-1</option>
<option value="1-4">1-4</option>
<option value="5-8">5-8</option>
<option value="9-12">9-12</option>
<option value=">12">&nbsp;> 12</option>
</select>
</div>

<div style="font-size: 10px; color:#ff0000; padding-top:5px"><em>(A maximum of 5 Skillsets can be selected)</em></div>
		</td>
	</tr>
</table>
</div>
<div style="padding: 10px 10px; border:1px solid #ccc; margin:20px 0px;  margin: 0 auto; width: 650px; border-radius:6px; margin-top: 10px;">
	<table style="font-family: Helvetica Neue,Helvetica,Arial,sans-serif; font-size:12px;" align="center" border="0" cellspacing="2" cellpadding="3">
	<tr>
		<td colspan="2" align="center" height="5"></td>
	</tr>
	<tr>
		<td colspan="2" style="background: #f9f9f9;"><b>Domain Certifications(Project Management etc..): </b>
			<input type="radio" name="proj" id="yesch1" value="Yes" onchange="validate(this)" />Yes 
			<input type="radio" name="proj" id="noch1" value="No" onchange="validate(this)" />No
			<div id="ftxt1" style="display:none; padding-top:6px">
				<textarea name="proj_desc" id="proj-desc" rows="4" cols="55" class="txtbx1" maxlength="500" /></textarea>
			</div>
		</td>
	</tr>
	<tr>
		<td colspan="2" align="center" height="1"></td>
	</tr>
	<tr>
		<td colspan="2" style="background: #f9f9f9;"><b>Technical Certifications:</b> 
			<input type="radio" name="tech" id="yesch5" value="Yes" onchange="validate5(this)" />Yes 
			<input type="radio" name="tech" id="noch5" value="No" onchange="validate5(this)" />No
			<div id="ftxt5" style="display:none; padding-top:6px">
				<textarea name="tech_desc" id="tech-desc" rows="4" cols="55" class="txtbx1" maxlength="500" /></textarea>
			</div>
		</td>
	</tr>
	<tr>
		<td colspan="2" align="center" height="1"></td>
	</tr>
	<tr>
		<td colspan="2" style="background: #f9f9f9;">
			<b>QA (Software Engineering Process Group) experience:</b> 
			<input type="radio" name="qa" id="yesch2" value="Yes" onchange="validate2(this)" />Yes
			<input type="radio" name="qa" id="noch2" value="No" onchange="validate2(this)" />No  
			<div id="ftxt2" style="display:none; padding-top:6px">
				<textarea name="qa_desc" id="qa-desc" rows="4" cols="55" class="txtbx2" maxlength="500" /></textarea>
			</div>
		</td>
	</tr>
	<tr>
		<td colspan="2" align="center" height="1"></td>
	</tr>
	<tr>
		<td colspan="2" style="background: #f9f9f9;"><b>CMMI ATM experience:</b> 
			<input type="radio" name="cmmi" id="yesch3" value="Yes" onchange="validate3(this)" />Yes 
			<input type="radio" name="cmmi" id="noch3" value="No" onchange="validate3(this)" />No 
			<div id="ftxt3" style="display:none; padding-top:6px">
				<textarea name="cmmi_desc" id="cmmi-desc" class="txtbx3" rows="4" cols="55" maxlength="500" /></textarea>
			</div>
		</td>
	</tr>
	<tr>
		<td colspan="2" align="center" height="1"></td>
	</tr>
	<tr>
		<td colspan="2" style="background: #f9f9f9;"><b>Other Certifications / <br>Technical Competency:</b>
			<input type="radio" name="any" id="yesch4" value="Yes" onchange="validate4(this)" />Yes 
			<input type="radio" name="any" id="noch4" value="No" onchange="validate4(this)" />No 

			<div id="ftxt4" style="display:none; padding-top:6px">
				<textarea name="any_desc" id="any-desc" class="txtbx4" rows="4" cols="55" /></textarea>
			</div>
		</td>
	</tr>
	<tr>
		<td colspan="2" align="center" height="5"></td>
	</tr>
	</table>
</div>

<div class="formgap">&nbsp;</div>
</div>

<div align="center" style="margin-top:15px"><a class="btn btn-primary back">Go Back</a> <a class="btn btn-primary continue">continue</a></div>
</div>
 <!-- end here -->

<div role="tabpanel" class="tab-pane" id="eca">
<div class="tabhead1"><h3 class="">Extra Curricular Activities</h3></div>

<div class="form-group">
<div class="col-sm-4">
<b>Sports</b>
	<input type="text" name="sports" id="sports" class="form-control" />
</div>
<div class="col-sm-4">
<b>Social Service</b>
	<input type="text" name="soc_serv" id="soc_serv" class="form-control" />
</div>
<div class="col-sm-4">
<b>Trainer/others</b>
	<input type="text" name="trainer_others" id="trainer_others" class="form-control" />
</div>

<div class="formgap">&nbsp;</div>
</div>

<div class="form-group">
<div class="col-sm-12">
	<b>Have you applied before at FINT Solutions and if yes, when?</b><font color="#ff0000">*</font> <input type="radio" name="applied" id="yes" value="Yes" />&nbsp;Yes &nbsp;&nbsp;&nbsp; <input type="radio" name="applied" id="no" value="No" />&nbsp;No
</div>
</div>

<div class="form-group" id="hyafint" style="display:none;">
<div class="col-sm-6">
	<input type="date" name="appl_date" id="appl_date" class="form-control" autocomplete="off" />
</div>
</div>
<div class="formgap">&nbsp;</div>

<div class="form-group">
<div class="col-sm-12">
	<b>Are any of your relatives or blood relation working over here, if yes who?</b><font color="#ff0000">*</font> <input type="radio" name="anyrel" id="yes" value="Yes" />&nbsp;Yes &nbsp;&nbsp;&nbsp; <input type="radio" name="anyrel" id="no" value="No" />&nbsp;No
</div>
</div>

<div class="form-group" id="areanyrel" style="display:none;">
<div class="col-sm-6">
	<input type="text" name="rel_emp_id" id="rel_emp_id" class="form-control" />
</div>
</div>
<div class="formgap" style="height:10px">&nbsp;</div>

<div class="form-group">
<div class="col-sm-12">
	<b>Have you been ever convicted of a criminal offense anywhere?</b><font color="#ff0000">*</font> <input type="radio" name="crim" id="yes" value="Yes" />&nbsp;Yes &nbsp;&nbsp;&nbsp; <input type="radio" name="crim" id="no" value="No" />&nbsp;No
</div>
</div>

<div class="form-group" id="anycrim" style="display:none;">
<div class="col-sm-6">
	<input type="text" name="crim_offence" id="crim_offence" class="form-control" />
</div>
</div>
<div class="formgap" style="height:10px">&nbsp;</div>

<div class="form-group">
<div class="col-sm-12">
	<b>Have you got any pre-existing medical conditions/illnesses? If yes please let us know better to help you.</b><font color="#ff0000">*</font> <input type="radio" name="medcond" id="yes" value="Yes" />&nbsp;Yes &nbsp;&nbsp;&nbsp; <input type="radio" name="medcond" id="no" value="No" />&nbsp;No
</div>
</div>

<div class="form-group" id="medicalcond" style="display:none;">
<div class="col-sm-6">
	<input type="text" name="anyillness" id="anyillness" class="form-control" />
</div>
</div>
<div class="formgap" style="height:10px">&nbsp;</div>
<div style="clear:both"></div>

<div align="center" style="margin-top:15px"><a class="btn btn-primary back">Go Back</a> <input type="submit" name="submit" class="mb-xs mt-xs mr-xs btn btn-primary" value="Submit" onClick="return confirm('Click OK to preseed with this details, Cancel to recheck your details.');"></div>


</div><!-- eca -->

</div>
</div>
</form>
<div id="push"></div>

<script src="http://s343786261.onlinehome.us/hrinfo-dev/js/multidrop.js"></script>
  <script>
$(document).ready(function(){
 $('#row2').hide();
 $('#row3').hide();
 $('#row4').hide();
 $('#row5').hide();
});
</script>
<script>
$(document).ready(function() {
$("#1but").click(function() {
    $('#rel2').css('display', 'block');
    $('#2div').show();
	$('#1but').hide();
});

$("#rem2div").click(function() {
	$('#rel2').css('display', 'none');
	$('#2div').hide();
	$('#1but').show();
	$('#erel2').val('');
	$('#relname2').val('');
	$('#reldob2').val('');
	$('#relage2').val('');
	$('#relaad2').val('');
	$('#reladimg2').val('');
	
});

$("#2but").click(function() {
    $('#rel3').css('display', 'block');
    $('#3div').show();
	$('#2div').hide();
});

$("#rem3div").click(function() {
	$('#rel3').css('display', 'none');
	$('#3div').hide();
	$('#2div').show();
	$('#erel3').val('');
	$('#relname3').val('');
	$('#reldob3').val('');
	$('#relage3').val('');
	$('#relaad3').val('');
	$('#reladimg3').val('');
});

$("#3but").click(function() {
    $('#rel4').css('display', 'block');
    $('#4div').show();
	$('#3div').hide();
});

$("#rem4div").click(function() {
	$('#rel4').css('display', 'none');
	$('#4div').hide();
	$('#3div').show();
	$('#erel4').val('');
	$('#relname4').val('');
	$('#reldob4').val('');
	$('#relage4').val('');
	$('#relaad4').val('');
	$('#reladimg4').val('');
});

$("#4but").click(function() {
    $('#rel5').css('display', 'block');
    $('#5div').show();
	$('#4div').hide();
});

$("#rem5div").click(function() {
	$('#rel5').css('display', 'none');
	$('#5div').hide();
	$('#4div').show();
	$('#erel5').val('');
	$('#relname5').val('');
	$('#reldob5').val('');
	$('#relage5').val('');
	$('#relaad5').val('');
	$('#reladimg5').val('');
});

$("#5but").click(function() {
    $('#rel6').css('display', 'block');
    $('#6div').show();
	$('#5div').hide();
});

$("#rem6div").click(function() {
	$('#rel6').css('display', 'none');
	$('#6div').hide();
	$('#5div').show();
	$('#erel6').val('');
	$('#relname6').val('');
	$('#reldob6').val('');
	$('#relage6').val('');
	$('#relaad6').val('');
	$('#reladimg6').val('');
});

$("#6but").click(function() {
    $('#rel7').css('display', 'block');
    $('#7div').show();
	$('#6div').hide();
});

$("#rem7div").click(function() {
	$('#rel7').css('display', 'none');
	$('#7div').hide();
	$('#6div').show();
	$('#erel7').val('');
	$('#relname7').val('');
	$('#reldob7').val('');
	$('#relage7').val('');
	$('#relaad7').val('');
	$('#reladimg7').val('');
});

  /*$( "#reldob" ).datepicker({
   dateFormat: 'dd-mm-yy',
   changeMonth: true,
   changeYear: true,
   maxDate: '0'
});
$( "#reldob2" ).datepicker({
   dateFormat: 'dd-mm-yy',
   changeMonth: true,
   changeYear: true,
   maxDate: '0'
});
$( "#reldob3" ).datepicker({
   dateFormat: 'dd-mm-yy',
   changeMonth: true,
   changeYear: true,
   maxDate: '0'
});
$( "#reldob4" ).datepicker({
   dateFormat: 'dd-mm-yy',
   changeMonth: true,
   changeYear: true,
   maxDate: '0'
});
$( "#reldob5" ).datepicker({
   dateFormat: 'dd-mm-yy',
   changeMonth: true,
   changeYear: true,
   maxDate: '0'
});
$( "#reldob6" ).datepicker({
   dateFormat: 'dd-mm-yy',
   changeMonth: true,
   changeYear: true,
   maxDate: '0'
});
$( "#reldob7" ).datepicker({
   dateFormat: 'dd-mm-yy',
   changeMonth: true,
   changeYear: true,
   maxDate: '0'
});
$( "#dob" ).datepicker({
   dateFormat: 'dd-mm-yy',
   changeMonth: true,
   changeYear: true,
    minDate: "-100Y",
    maxDate: "-15Y"
});
$( "#act_dob" ).datepicker({
   dateFormat: 'dd-mm-yy',
   changeMonth: true,
   changeYear: true,
    minDate: "-100Y",
    maxDate: "-15Y"
});
$( "#madate" ).datepicker({
   dateFormat: 'dd-mm-yy',
   changeMonth: true,
   changeYear: true,
   maxDate: '0'
});
$( "#nom_dob" ).datepicker({
   dateFormat: 'dd-mm-yy',
   changeMonth: true,
   changeYear: true,
    minDate: "-60Y",
    maxDate: "-5Y"
});
$( "#pp_issuedt" ).datepicker({
   dateFormat: 'dd-mm-yy',
   changeMonth: true,
   changeYear: true,
   maxDate: '0'
});
$( "#pp_expdt" ).datepicker({
   dateFormat: 'dd-mm-yy',
   changeMonth: true,
   changeYear: true
});
$( "#dt_exit" ).datepicker({
   dateFormat: 'dd-mm-yy',
   changeMonth: true,
   changeYear: true
});
$( "#appl_date" ).datepicker({
   dateFormat: 'dd-mm-yy',
   changeMonth: true,
   changeYear: true,
   maxDate: '0'
});*/
});

$(document).ready(function() {
	$('input[type=radio][name=refbyfint]').change(function() {
    if (this.value == 'Yes') {
        $('#refferby').show();
    }
    else if (this.value == 'No') {
        $('#refferby').hide();
        $('#empref_name').val('');
        $('#empref_cont').val('');
        $('#empref_id').val('');
    }
});

	$('input[type=radio][name=pers]').change(function() {
    if (this.value == 'Yes') {
        $('#pursuing').show();
    }
    else if (this.value == 'No') {
        $('#pursuing').hide();
    }
});

	$('input[type=radio][name=applied]').change(function() {
    if (this.value == 'Yes') {
        $('#hyafint').show();
    }
    else if (this.value == 'No') {
        $('#hyafint').hide();
        $('#appl_date').val('');
    }
});

  $('input[type=radio][name=anyrel]').change(function() {
    if (this.value == 'Yes') {
        $('#areanyrel').show();
    }
    else if (this.value == 'No') {
        $('#areanyrel').hide();
        $('#rel_emp_id').val('');
    }
});

   $('input[type=radio][name=crim]').change(function() {
    if (this.value == 'Yes') {
        $('#anycrim').show();
    }
    else if (this.value == 'No') {
        $('#anycrim').hide();
        $('#crim_offence').val('');
    }
});

  $('input[type=radio][name=medcond]').change(function() {
    if (this.value == 'Yes') {
        $('#medicalcond').show();
    }
    else if (this.value == 'No') {
        $('#medicalcond').hide();
        $('#anyillness').val('');
    }
});
});

$(document).ready(function() {
$("#ed1").click(function() {
    $('#emp_det2').css('display', 'block');
    $('#2ed').show();
	$('#1ed').hide();
});
$("#remed2").click(function() {
    $('#emp_det2').css('display', 'none');
	$('#2ed').hide();
	$('#1ed').show();
	 $('#org_name2').val('');
	 $('#desig_name2').val('');
	 $('#dur_work2').val('');
	 $('#reason2').val('');
});

$("#ed2").click(function() {
    $('#emp_det3').css('display', 'block');
    $('#3ed').show();
	$('#2ed').hide();
});
$("#remed3").click(function() {
    $('#emp_det3').css('display', 'none');
	$('#3ed').hide();
	$('#2ed').show();
	$('#org_name3').val('');
	 $('#desig_name3').val('');
	 $('#dur_work3').val('');
	 $('#reason3').val('');
});

$("#ed3").click(function() {
    $('#emp_det4').css('display', 'block');
    $('#4ed').show();
	$('#3ed').hide();
});
$("#remed4").click(function() {
    $('#emp_det4').css('display', 'none');
	$('#4ed').hide();
	$('#3ed').show();
	$('#org_name4').val('');
	 $('#desig_name4').val('');
	 $('#dur_work4').val('');
	 $('#reason4').val('');
});

$("#ed4").click(function() {
    $('#emp_det5').css('display', 'block');
    $('#4ed').hide();
	$('#5ed').show();
});
$("#remed5").click(function() {
    $('#emp_det5').css('display', 'none');
	$('#5ed').hide();
	$('#4ed').show();
	$('#org_name5').val('');
	 $('#desig_name5').val('');
	 $('#dur_work5').val('');
	 $('#reason5').val('');
});
});

$(document).ready(function() {
$("#educ1").click(function() {
    $('#educqual2').css('display', 'block');
    $('#2qual').show();
	$('#1qual').hide();
});
$("#remqual2").click(function() {
    $('#educqual2').css('display', 'none');
	$('#2qual').hide();
	$('#1qual').show();
	$('#qual2').val('');
	$('#yop2').val('');
	$('#univ2').val('');
	$('#ms2').val('');
	$('#perc2').val('');
});
$("#educ2").click(function() {
    $('#educqual3').css('display', 'block');
    $('#3qual').show();
	$('#2qual').hide();
});
$("#remqual3").click(function() {
    $('#educqual3').css('display', 'none');
	$('#3qual').hide();
	$('#2qual').show();
	$('#qual3').val('');
	$('#yop3').val('');
	$('#univ3').val('');
	$('#ms3').val('');
	$('#perc3').val('');
});
$("#educ3").click(function() {
    $('#educqual4').css('display', 'block');
    $('#4qual').show();
	$('#3qual').hide();
});
$("#remqual4").click(function() {
    $('#educqual4').css('display', 'none');
	$('#4qual').hide();
	$('#3qual').show();
	$('#qual4').val('');
	$('#yop4').val('');
	$('#univ4').val('');
	$('#ms4').val('');
	$('#perc4').val('');
});

$('input[type=radio][name=marst]').change(function() {
    if (this.value == 'Married') {
        $('#maid').show();
    }
    else if (this.value == 'Single') {
        $('#maid').hide();
        $('#madate').val('');
    }
});
});

$(document).ready(function() {
$("#copyaddr").on("change",function(){
if (this.checked ) {
	$("#perm_hno").val($("#hno").val());
	$("#perm_city").val($("#city").val());
	$("#perm_state").val($("#state").val());
	$("#perm_zipcode").val($("#zipcode").val());
	$("#perm_country").val($("#country").val());
   } else {
	$('#perm_hno').val('');
	$('#perm_city').val('');
	$('#perm_state').val('');
	$('#perm_zipcode').val('');
	$('#perm_country').val('');
  }    
});

$("#yrs_exp").blur(function() {
		var $this = $(this);
		$this.val($this.val().replace(/[^\d.]/g, ''));  
		//this.value = parseFloat(this.value).toFixed(2);
		alert('Enter only digits and decimal values');
	});
});
</script>

<script>
$(document).ready(function(){
  $("form").submit(function(){
    //var emp_name = $('#emp_name').val();
    //var age = $('#age').val();
    var dob = $('#dob').val();
    var act_dob = $('#act_dob').val();
    var bgroup = $('#bgroup').val();
    var high_edu = $('#high_edu').val();
    var gender = $('#gender').val(); //radio button
    var marst = $('#marst').val(); //radio button  

    var madate = $('#madate').val(); 
    var contno = $('#contno').val(); 
    //var emp_email = $('#emp_email').val(); 
    var religion = $('#religion').val(); 
    var nationality = $('#nationality').val(); 
    var emer_name = $('#emer_name').val(); 
    var emer_rel = $('#emer_rel').val(); 
    var emer_addr = $('#emer_addr').val(); 
    var emer_cont = $('#emer_cont').val(); 
	//var pp_no = $('#pp_no').val();
    //var pp_issuedt = $('#pp_issuedt').val();
    //var pp_expdt = $('#pp_expdt').val();
    var emp_aadhar_no = $('emp_aadhar_no').val();
    var emp_pan_no = $('emp_pan_no').val();
    var emp_aadhar_img = $('emp_aadhar_img').val();
    var emp_pan_img = $('emp_pan_img').val();

    var hno = $('#hno').val(); 
    var city = $('#city').val(); 
    var state = $('#state').val(); 
    var zipcode = $('#zipcode').val(); 
    var country = $('#country').val(); 
    var copyaddr = $('#copyaddr').val();  //checkbox
	var perm_hno = $('#perm_hno').val(); 
    var perm_city = $('#perm_city').val(); 
    var perm_state = $('#perm_state').val(); 
    var perm_zipcode = $('#perm_zipcode').val(); 
    var perm_country = $('#perm_country').val();

    var erel = $('#erel').val();
    var relname = $('#relname').val();
    var reldob = $('#reldob').val();
    var relage = $('#relage').val();
    var relaad = $('#relaad').val();
    var reladimg = $('#reladimg').val();
	    var erel2 = $('#erel2').val();
    var relname2 = $('#relname2').val();
    var reldob2 = $('#reldob2').val();
    var relage2 = $('#relage2').val();
    var relaad2 = $('#relaad2').val();
    var reladimg2 = $('#reladimg2').val();
	    var erel3 = $('#erel3').val();
    var relname3 = $('#relname3').val();
    var reldob3 = $('#reldob3').val();
    var relage3 = $('#relage3').val();
    var relaad3 = $('#relaad3').val();
    var reladimg3 = $('#reladimg3').val();
	    var erel4 = $('#erel4').val();
    var relname4 = $('#relname4').val();
    var reldob4 = $('#reldob4').val();
    var relage4 = $('#relage4').val();
    var relaad4 = $('#relaad4').val();
    var reladimg4 = $('#reladimg4').val();
	    var erel5 = $('#erel5').val();
    var relname5 = $('#relname5').val();
    var reldob5 = $('#reldob5').val();
    var relage5 = $('#relage5').val();
    var relaad5 = $('#relaad5').val();
    var reladimg5 = $('#reladimg5').val();
	    var erel6 = $('#erel6').val();
    var relname6 = $('#relname6').val();
    var reldob6 = $('#reldob6').val();
    var relage6 = $('#relage6').val();
    var relaad6 = $('#relaad6').val();
    var reladimg6 = $('#reladimg6').val();
	    var erel7 = $('#erel7').val();
    var relname7 = $('#relname7').val();
    var reldob7 = $('#reldob7').val();
    var relage7 = $('#relage7').val();
    var relaad7 = $('#relaad7').val();
    var reladimg7 = $('#reladimg7').val();

    var ahn = $('#ahn').val();
    var bank_name = $('#bank_name').val();
    var ac_no = $('#ac_no').val();
    var brach_name = $('#brach_name').val();
    var ac_type = $('#ac_type').val();
    //var brach_code = $('#brach_code').val();
    //var bank_addr = $('#bank_addr').val();
    var pf_no = $('#pf_no').val();
    var uan_no = $('#uan_no').val();
    var dt_exit = $('#dt_exit').val();
    var nom_name = $('#nom_name').val();
    var relation = $('#relation').val();
    var nom_dob = $('#nom_dob').val();

    var qual1 = $('#qual1').val();
    var yop1 = $('#yop1').val();
    var univ1 = $('#univ1').val();
    var ms1 = $('#ms1').val();
    var perc1 = $('#perc1').val();
	    var qual2 = $('#qual2').val();
    var yop2 = $('#yop2').val();
	var univ2 = $('#univ2').val();
    var ms2 = $('#ms2').val();
    var perc2 = $('#perc2').val();
	    var qual3 = $('#qual3').val();
    var yop3 = $('#yop3').val();
	var univ3 = $('#univ3').val();
    var ms3 = $('#ms3').val();
    var perc3 = $('#perc3').val();
	    var qual4 = $('#qual4').val();
    var yop4 = $('#yop4').val();
	var univ4 = $('#univ4').val();
    var ms4 = $('#ms4').val();
    var perc4 = $('#perc4').val();

    var org_name = $('#org_name').val();
    var desig_name = $('#desig_name').val();
    var dur_work = $('#dur_work').val();
    var reason = $('#reason').val();
	    var org_name2 = $('#org_name2').val();
    var desig_name2 = $('#desig_name2').val();
    var dur_work2 = $('#dur_work2').val();
    var reason2 = $('#reason2').val();
	    var org_name3 = $('#org_name3').val();
    var desig_name3 = $('#desig_name3').val();
    var dur_work3 = $('#dur_work3').val();
    var reason3 = $('#reason3').val();
	    var org_name4 = $('#org_name4').val();
    var desig_name4 = $('#desig_name4').val();
    var dur_work4 = $('#dur_work4').val();
    var reason4 = $('#reason4').val();
	    var org_name5 = $('#org_name5').val();
    var desig_name5 = $('#desig_name5').val();
    var dur_work5 = $('#dur_work5').val();
    var reason5 = $('#reason5').val();

    var refbyfint = $('#refbyfint').val();  //radio button
    var empref_name = $('#empref_name').val();
    var empref_cont = $('#empref_cont').val();
    var empref_id = $('#empref_id').val();
    var ref_name = $('#ref_name').val();
    var ref_name2 = $('#ref_name2').val();
    var ref_desig = $('#ref_desig').val();
    var ref_desig2 = $('#ref_desig2').val();
    var ref_cont = $('#ref_cont').val();
    var ref_cont2 = $('#ref_cont2').val();

    var ssc = $('#ssc').val();
    var inter = $('#inter').val();
    var degree = $('#degree').val();
    var pg = $('#pg').val();
    var pan = $('#pan').val();
    var offer_letter = $('#offer_letter').val();
    var rel_letter = $('#rel_letter').val();
    var pay_slips = $('#pay_slips').val();
    var pp_images = $('#pp_images').val();
    var other_cert = $('#other_cert').val();

	var sports = $('#sports').val();
	var soc_serv = $('#soc_serv').val();
	var trainer_others = $('#trainer_others').val();
	var applied = $('#applied').val();
	var appl_date = $('#appl_date').val();
	var anyrel = $('#anyrel').val();
	var rel_emp_id = $('#rel_emp_id').val();
	var crim = $('#crim').val();
	var crim_offence = $('#crim_offence').val();
	var medcond = $('#medcond').val();
	var anyillness = $('#anyillness').val();

	var prim1 = $('#prim1').val();
	var yrs_exp = $('#yrs_exp').val();


	if(dob == '' || act_dob == '' || bgroup  == '' || high_edu  == '' || contno  == '' || religion  == '' || nationality  == '' || emer_name  == '' || emer_rel  == '' || emer_addr  == '' || emer_cont  == '' || profile_pic  == '')
	{
	  alert('Please fill all the required fields in personal details');
	  return false;
	}
	var gendval = $("input[name='gender']:checked").val();
	if(gendval != 'Male' && gendval != 'Female'){
		alert('Select atleast one option for gender');
		return false;
	}
	var marst = $("input[name='marst']:checked").val();
	if(marst != 'Married' && marst != 'Single'){
		alert('Select atleast one option for marital status');
		return false;
	}
	if(emp_aadhar_no  == '' || emp_pan_no  == '' || emp_aadhar_img  == '' || emp_pan_img  == '')
	  {
		alert('Please fill all the required fields in aadhar/pan details');
	    return false;
	  }
	if(hno == '' || city == '' || state == '' || zipcode == '' || perm_hno == '' || perm_city == '' || perm_state == '' || perm_zipcode == '' || perm_country == '')
	  {
	  alert('Please fill all the required fields in address information');
	  return false;
	  }
	if(ahn == '' || bank_name == '' || ac_no == '' || brach_name == '' || ac_type == '' || nom_name == '' || relation == '' || nom_dob == '')
	  {
	  alert('Please fill all the required fields in bank details');
	  return false;
	  }
	if(qual1 == '' || yop1 == '' || univ1 == '' || ms1 == '' || perc1 == '')
	  {
	  alert('Please fill all the required fields in education details');
	  return false;
	  }
	  var pers = $("input[name='pers']:checked").val();
	  if(pers != 'Yes' && pers != 'No'){
		alert('Select atleast one option for pursuing any course');
		return false;
	  }
	  var refbyfint = $("input[name='refbyfint']:checked").val();
	  if(refbyfint != 'Yes' && refbyfint != 'No'){
		alert('Select atleast one option for have you been reffered');
		return false;
	  }
	  if(prim1 == '' || yrs_exp == '')
	  {
	  alert('Please fill all the required fields in technical competency');
	  return false;
	  }

  });
});
</script>