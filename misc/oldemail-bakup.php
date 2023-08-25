<?php 
session_start(); 
ob_start();
//ini_set('display_errors', 1);

if(!$_SESSION['sesion_ecode']) { header("Location: https://hrinfo.fintinc.com"); }
//include("header.php");
include("common.php");
require 'PHPMailer/PHPMailerAutoload.php';

$official_mail_info = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM emp_login_credentials WHERE e_code='".$_SESSION['sesion_ecode']."'"));
$p_info = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM emp_personal_info WHERE e_code='".$_SESSION['sesion_ecode']."'"));
$edit_gend = $p_info['e_gender'];
$_SESSION['emp_name'] = $p_info['e_name'];
$edit_marital_status = $p_info['e_marital_status'];
$e_division = $official_mail_info['e_division'];


if(isset($_POST['update_info']))
{

	$dob = date('Y-m-d',strtotime($_POST['dob']));
	//$doj = date('Y-m-d',strtotime($_POST['doj']));

	$ename = $_POST['ename'];
	$division = $_POST['division'];
	$mob = $_POST['mob'];
	$father_name = $_POST['father_name'];
	$fname = $_POST['fname'];
	if($fname=='fath_name') { $father_spouse = "Father"; } else { $father_spouse = "Spouse"; }
	$email = $_POST['email'];
	$aadhar = $_POST['aadhar'];
	$pan = $_POST['pan'];
	$passport = $_POST['passport'];
	$bgroup = $_POST['bgroup'];
	$incase_emer_name = $_POST['incase_emer'];
	$emer_no = $_POST['emer_no'];
	$paddr = $_POST['paddr'];
	$addr_ph = $_POST['addr_ph'];
	$mail_addr = $_POST['mail_addr'];
	$mail_ph = $_POST['mail_ph'];
	$prof_img = $_POST['uploaded_file_name'];
	$uan = $_POST['uan'];
	$esi = $_POST['esi'];
	$course_name = $_POST['course_name'];
	$univ = $_POST['univ'];
	$univ_from = date('Y-m-d', strtotime($_POST['univ_from']));
	$univ_to = date('Y-m-d', strtotime($_POST['univ_to']));
	$fath_name = $_POST['fath_name'];
	$moth_name = $_POST['moth_name'];
	$spouse_name = $_POST['spouse_name'];
	$child_name1 = $_POST['child_name1'];
	$child_name2 = $_POST['child_name2'];
	$child_name3 = $_POST['child_name3'];
	$chk_conditions = $_POST['chk_conditions'];

	$bank_exist = $_POST['bank_exist'];
	$pf_exist = $_POST['pf_exist'];
	$chk_conditions = $_POST['chk_conditions'];
	$gender = $_POST['gender'];
	$cur_date = date('M d, Y');

	if($gender=='Male')
	{
	$gend = 'Male';
	}
	else 
	{
	$gend = 'Female';
	} 

	$ms = $_POST['ms'];
	
	if($ms=='Married')
	{
	$mr_status = 'Married';
	$madate = date('Y-m-d',strtotime($_POST['madate']));
	}
	else if($ms=='Single')
	{
	$mr_status = 'Single';
	$madate = '0000-00-00';
	}

	//Image upload code start here
	if($_POST['primage']=="Successfully Uploaded")
	{
	$prof_img = $_POST['uploaded_file_name'];
	}
	else
	{
	$prof_img = '';
	}

	if($bank_exist=="Yes")
	{
	$bname = $_POST['bname'];
	$acno = $_POST['acno'];
	$ifsc = $_POST['ifsc'];
	}
	else
	{
	$bname = '';
	$acno = '';
	$ifsc = '';
	}

	if($pf_exist=="Yes")
	{
	$pfno = $_POST['pfno'];
	}
	else
	{
	$pfno = '';
	}
	
	// Nominee Value Details Starts Here.
	$nominee = $_POST['nominee'];
	$nomineeName = $_POST['nominee_name'];
    // Ends Here.

	if($prof_img!='')
	{
	$sub_det = mysqli_query($con, "UPDATE emp_personal_info SET	e_name = '".$ename."',e_father_spouse_name = '".$father_name."',e_father_spouse = '".$father_spouse."',e_gender = '".$gend."',e_dob = '".$dob."',e_mobile_no = '".$mob."',e_marital_status = '".$mr_status."',e_anniv_date = '".$madate."',e_aadhar_no = '".$aadhar."',e_pan_no = '".$pan."',e_passport_no = '".$passport."',e_blood_group = '".$bgroup."',e_emerg_cont_name = '".$incase_emer_name."',e_emer_cont_no = '".$emer_no."',e_perm_addr = '".$paddr."',e_addr_ph = '".$addr_ph."',e_mailing_addr = '".$mail_addr."',e_mailing_ph = '".$mail_ph."',e_nominee = '".$nominee."', e_nominee_name='".$nomineeName."',e_prof_img = '".$prof_img."', e_releaving_date = '0000-00-00' WHERE e_code  = '".$_SESSION['sesion_ecode']."'") or die(mysqli_error($con));

	$sub_det1 = mysqli_query($con, "UPDATE emp_account_details SET e_code = '".$_SESSION['sesion_ecode']."',bank_exist = '".$bank_exist."', 		bank_name = '".$bname."',bank_ac = '".$acno."',bank_ifsc = '".$ifsc."',pf_exist = '".$pf_exist."',pf_no = '".$pfno."',pf_uan_no = '".$uan."',
		esi_no = '".$esi."',edu_course = '".$course_name."',edu_univ = '".$univ."',edu_from = '".$univ_from."',edu_to = '".$univ_to."',fam_father = '".$fath_name."',fam_mother = '".$moth_name."',fam_spouse = '".$spouse_name."',fam_child1 = '".$child_name1."',fam_child2 = '".$child_name2."',
		fam_child3 = '".$child_name3."',accept_terms = '".$chk_conditions."' WHERE e_code = '".$_SESSION['sesion_ecode']."'") or die(mysqli_error($con));

	}
	else
	{
		$msgs = "<font color='red'>Please upload ID Card Image</font>";
	}

	if($sub_det AND $sub_det1)
	{
	mysqli_query($con, "UPDATE emp_login_credentials SET e_user_name='',e_password='',added_by='user',e_status='Active' WHERE e_code = '".$_SESSION['sesion_ecode']."'") or die(mysqli_error($con));

	if($bank_exist=='Yes')
	{
		$xheaders = "MIME-Version: 1.0\r\n";
		$xheaders .= "Content-Type: text/html; charset=iso-8859-1\r\n";
		$msg  = "<table border='1' cellpadding='3' cellspacing='1' bgcolor='#F0F0F0' bordercolor='#D6D6D6' style='FONT-FAMILY:Tahoma, Helvatica, fantasy; color:#000000; FONT-SIZE: 9pt; FONT-STYLE: normal; FONT-VARIANT: normal; FONT-WEIGHT: normal; border-collapse:collapse'><tr>";
		$msg .= "<td colspan='2' bgcolor='#000099'><font color='white'><b>Employee Registration Completed</b></font></td></tr>";
		$msg .= "<tr><td colspan='2'>Hello,</td></tr>";
		$msg .= "<tr><td colspan='2'>A new employee $ename has reported for duty today ($cur_date).</td></tr>";  
		$msg .= "<tr><td colspan='2'>His/Her details are as given below </td></tr>";  
		$msg .= "<tr><td colspan='2'><b>Employee code:</b> $_SESSION[sesion_ecode]</td></tr>";  
		$msg .= "<tr><td colspan='2'><b>Continuing with existing bank account:</b> $bank_exist</td></tr>";  
		$msg .= "<tr><td colspan='2'><b>Continuing with existing PF account:</b> $pf_exist</td></tr>";   
		$msg .= "<tr><td colspan='2'>&nbsp;</td></tr>";     
		$msg .= "<tr><td colspan='2'>&nbsp;</td></tr></table>";

		$xheaders .= "From: HR <hr@fintinc.com>\r\n";
		$sub = "$ename Registration Completed";
		$to = "aditya@fintinc.com, rajeev.chigurukota@fintinc.com, rpkesani@fintinc.com, sunil@fintinc.com, madhu@fintinc.com, ravichandra.maddhipoti@fintinc.com, rao.majety@fintinc.com, stella.darla@fintinc.com, anil.gorantla@fintinc.com, bhavani.vallentine@fintinc.com, murali.namburi@fintinc.com";

		mail($to,$sub,$msg,$xheaders);

		$xheaders2 = "MIME-Version: 1.0\r\n";
		$xheaders2 .= "Content-Type: text/html; charset=iso-8859-1\r\n";
		$msg2  = "<table border='1' cellpadding='3' cellspacing='1' bgcolor='#F0F0F0' bordercolor='#D6D6D6' style='FONT-FAMILY:Tahoma, Helvatica, fantasy; color:#000000; FONT-SIZE: 9pt; FONT-STYLE: normal; FONT-VARIANT: normal; FONT-WEIGHT: normal; border-collapse:collapse'><tr>";
		$msg2 .= "<td colspan='2' bgcolor='#000099'><font color='white'><b>Employee Registration Completed</b></font></td></tr>";
		$msg2 .= "<tr><td colspan='2'>Hello $ename,</td></tr>"; 
		$msg2 .= "<tr><td colspan='2'>Your Registration is completed.</td></tr>";
		$msg2 .= "<tr><td colspan='2'>Once again check your given bank details, if anything wrong please contact HR.</td></tr>"; 
		$msg2 .= "<tr><td colspan='2'><b>Bank Name:</b> $bname</td></tr>";  
		$msg2 .= "<tr><td colspan='2'><b>Account Name:</b> $acno</td></tr>";
		$msg2 .= "<tr><td colspan='2'><b>IFSC Code:</b> $ifsc</td></tr>";
		$msg2 .= "<tr><td colspan='2'>&nbsp;</td></tr>";     
		$msg2 .= "<tr><td colspan='2'>&nbsp;</td></tr></table>";
	
		$xheaders2 .= "From: HR <hr@fintinc.com>\r\n";
		$sub2 = "$ename Fint Registration Completed";
		$to2 = $email;
		//$to2 = "rajnikar@fintinc.com";

		mail($to2,$sub2,$msg2,$xheaders2);
	}
	else
	{
		$xheaders = "MIME-Version: 1.0\r\n";
		$xheaders .= "Content-Type: text/html; charset=iso-8859-1\r\n";
		$msg  = "<table border='1' cellpadding='3' cellspacing='1' bgcolor='#F0F0F0' bordercolor='#D6D6D6' style='FONT-FAMILY:Tahoma, Helvatica, fantasy; color:#000000; FONT-SIZE: 9pt; FONT-STYLE: normal; FONT-VARIANT: normal; FONT-WEIGHT: normal; border-collapse:collapse'><tr>";
		$msg .= "<td colspan='2' bgcolor='#000099'><font color='white'><b>Employee Registration Completed</b></font></td></tr>";
		$msg .= "<tr><td colspan='2'>Hello,</td></tr>";
		$msg .= "<tr><td colspan='2'>A new employee $ename has reported for duty today ($cur_date).</td></tr>";  
		$msg .= "<tr><td colspan='2'>His/Her details are as given below </td></tr>";  
		$msg .= "<tr><td colspan='2'><b>Employee code:</b> $_SESSION[sesion_ecode]</td></tr>";  
		$msg .= "<tr><td colspan='2'><b>Continuing with existing bank account:</b> $bank_exist</td></tr>";  
		$msg .= "<tr><td colspan='2'><b>Continuing with existing PF account:</b> $pf_exist</td></tr>";   
		$msg .= "<tr><td colspan='2'>&nbsp;</td></tr>";     
		$msg .= "<tr><td colspan='2'>&nbsp;</td></tr></table>";

		$xheaders .= "From: HR <hr@fintinc.com>\r\n";
		$sub = "$ename Registration Completed";

		$to = "aditya@fintinc.com, rajeev.chigurukota@fintinc.com, rpkesani@fintinc.com, sunil@fintinc.com, madhu@fintinc.com, ravichandra.maddhipoti@fintinc.com, rao.majety@fintinc.com, stella.darla@fintinc.com, anil.gorantla@fintinc.com, bhavani.vallentine@fintinc.com, murali.namburi@fintinc.com";

		//$to = "rajnikar@fintinc.com";

		mail($to,$sub,$msg,$xheaders);
	}

	header("Location: https://hrinfo.fintinc.com/thank-you");
	}
	
}
			
?>

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<!-- <link rel="stylesheet" href="https://hrinfo.fintinc.com/css/regform.css"> -->
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script type="text/javascript">
function ValidateAlpha(evt)
    {
        var keyCode = (evt.which) ? evt.which : evt.keyCode
        if ((keyCode < 65 || keyCode > 90) && (keyCode < 97 || keyCode > 123) && keyCode != 32)
         
        return false;
            return true;
    }

function isNumberKey(evt){  <!--Function to accept only numeric values-->
    //var e = evt || window.event;
	var charCode = (evt.which) ? evt.which : evt.keyCode
    if (charCode != 46 && charCode > 31 
	&& (charCode < 48 || charCode > 57))
        return false;
        return true;
	}

$(function () {
    var dateFormat = 'mm/dd/yy';

    $("#univ_from").datepicker({
	   changeMonth: true,
       changeYear: true,
        maxDate: '0',
        dateFormat: dateFormat,
        onSelect: function (selectedDate) {
            var date = $.datepicker.parseDate(dateFormat, selectedDate)
            var tod = date.setDate(date.getDate());
            $to.prop('disabled', false).datepicker( "option", "minDate", new Date(tod ));
        }
    });
    var $to = $("#univ_to").datepicker({
     changeMonth: true,
     changeYear: true,
    maxDate: '0',
    dateFormat: dateFormat
    }).prop('disabled', true);
});
</script>
<script>
    $( function() {
    $( "#dob" ).datepicker({
      changeMonth: true,
      changeYear: true,
       minDate: "-60Y",
       maxDate: "-15Y"
    });
    });

	$( function() {
    $( "#madate" ).datepicker({
      changeMonth: true,
      changeYear: true,
	  maxDate: '0',
	  yearRange: "-80:-0"
    });
    });

function handleChange()
{
	document.getElementById("maid").style.display = "none";
	document.getElementById("madate").value='';
}
function handleChange1()
{
	document.getElementById("maid").style.display = "block";
}

function bankexist()
{
	document.getElementById("banks").style.display = "block";
}
function bankexist1()
{
	document.getElementById("banks").style.display = "none";
	document.getElementById("bname").value='ICICI';
	document.getElementById("acno").value='';
	document.getElementById("ifsc").value='';
}

/*function pfexist()
{
	document.getElementById("pfdet").style.display = "block";
}
function pfexist1()
{
	document.getElementById("pfdet").style.display = "none";
	document.getElementById("pfno").value='';
}*/

function FillBilling(f) 
{
  if(f.copyaddr.checked == true) {
    f.mail_addr.value = f.paddr.value;
    f.mail_ph.value = f.addr_ph.value;
	document.getElementById("mail_addr").readOnly = true;
  }
  else
	{
	  f.mail_addr.value = '';
	  f.mail_ph.value = '';
	  document.getElementById("mail_addr").readOnly = false;
	}
}

function sync()
{
	if(document.getElementById("copyaddr").checked == true)
	{
		var paddr = document.getElementById('paddr');
		var mail_addr = document.getElementById('mail_addr');
		mail_addr.value = paddr.value;
	}
}
</script>
<script>
function validate()
{
	if((document.getElementById("m").checked == true) && (document.getElementById("madate").value==''))
	{
		alert('please select anniversary date');
		return false;
	}

	var bankname = document.getElementById("bname").value;
	var bankac = document.getElementById("acno").value;
	var bankifsc = document.getElementById("ifsc").value;
	if((document.getElementById("bank_exist").checked == true) && (bankac=='' || bankifsc==''))
	{
		alert('please fill all the bank details');
		return false;
	}

	/*if((document.getElementById("pf_exist").checked == true) && (document.getElementById("pfno").value==''))
	{
		alert('please fill PF Account number');
		return false;
	}*/
	return true;
}

</script>
<style>
	.input1{
    width: 100%;
    height: 34px;
    padding: 6px 12px;
    font-size: 14px;
    line-height: 1.42857143;
    color: #555;
    background-color: #fff;
    background-image: none;
    border: 1px solid #ccc;
    border-radius: 4px;
    -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
    box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
    -webkit-transition: border-color ease-in-out .15s, -webkit-box-shadow ease-in-out .15s;
    -o-transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
    transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
}
.sub1 { 
	font-family: Calibri, Arial;  width:80px; height:30px; background:url('images/submit.png') no-repeat; border:none; font-size:12pt; font-weight:bold; color:#FFFFFF; cursor:pointer; background-position: 0px -30px;
}
.sub1:active {
     background:url('images/submit.png') no-repeat;       
}

.sub1:hover {
     background-position: 0px 0px;
}
</style>

<div style="margin:10px 80px; font-size:20px;">
<div class="empmainhead" align="center"><font color="brown"><strong>Employee Registration Form</strong></font></div>
</div>

<div style="margin-left:63px; margin-right:63px; margin-top:10px; background-color:#dbf1fd">
	<div style="padding:4px; font-weight:bold; font-size:15px">Personal Details</div>

<form name="editform" action="" method="POST" enctype="multipart/form-data" onsubmit="return validate();">
<table class="hometext" align="center">
	
	<tr><td colspan="4" align="center"><?php if($msgs) { echo $msgs; } ?></td></tr>
	<tr><td colspan="4" align="left"><font color="brown">All * marks are mandatory fields</font></td></tr>
	<tr>
		<td>Emp Code: </td>
		<td><b><?php echo $_SESSION['sesion_ecode']; ?></b></td>
		<td>&nbsp;&nbsp;&nbsp;&nbsp;Name:<span style="color:red">*</span> </td>
		<td><input style="background-color:light-gray; width:65%;" type="text" name="ename" placeholder="Name as per aadhar" id="ename" value="<?php echo $p_info['e_name']; ?>" class="input1" readonly>&nbsp;&nbsp;<select name="division" id="division" class="input1" style="width:30%" disabled>
		<option value="">Division</option>
		<option value="BOH"<?php if($e_division == 'BOH') { echo "selected"; } ?>>BOH</option>
		<option value="EWB"<?php if($e_division == 'EWB') { echo "selected"; } ?>>EWB</option>
		<option value="HQ"<?php if($e_division == 'HQ') { echo "selected"; } ?>>HQ</option>
		</select>
		</td>
	</tr>
	<tr>
			<td style="height:5px"></td>
	</tr>
	<tr>
		<td>Gender:<span style="color:red">*</span></td>
		<td><input type="radio" name="gender" value="Male" required <?php if(isset($_POST['gender']) && $_POST['gender']=='Male') { echo "checked"; } ?>>Male&nbsp;&nbsp;
		<input type="radio" name="gender" value="Female" required <?php  if(isset($_POST['gender']) && $_POST['gender']=='Female') { echo "checked"; }  ?>>Female&nbsp;&nbsp;</td>

		<td>&nbsp;&nbsp;&nbsp;&nbsp;DOB:<span style="color:red">*</span> </td>
		<td><input type="text" name="dob" id="dob" value="<?php if(isset($_POST['dob'])) { echo $_POST['dob']; } elseif($p_info['e_dob']!='0000-00-00') { echo ""; } ?>" class="input1" required ><br/></td>
	</tr>
	<tr>
			<td style="height:5px"></td>
	</tr>
	<tr>
		<td><select name="fname" id="fname" class="input1" style="width:80%" required><option value="">Select one</option><option value="fath_name"<?php if($_POST['fname'] == 'fath_name') { echo "selected"; } ?>>Father</option><option value="spous_name"<?php if($_POST['fname'] == 'spous_name') { echo "selected"; } ?>>Spouse</option></select><span style="color:red">*</span> </td>
		<td><input type="text" name="father_name" id="father_name" value="<?php if(isset($_POST['father_name'])) { echo $_POST['father_name']; } ?>" title="Allowed only characters with one uppercase letter" class="input1"  onKeyPress="return ValidateAlpha(event);" required ><br/></td>
		<td>&nbsp;&nbsp;&nbsp;&nbsp;Email:<span style="color:red">*</span> </td>
		<td><input type="text" name="email" value="<?php echo $p_info['e_email']; ?>" class="input1" readonly ></td>
	</tr>
	<tr>
		<td style="height:5px"></td>
	</tr>
	<tr>
		<td>Mobile:<span style="color:red">*</span> </td>
		<td><input type="text" name="mob" placeholder="10 digit mobile number" value="<?php if(isset($_POST['mob'])) { echo $_POST['mob']; } ?>" maxlength="10" class="input1" pattern="\d{10}" title="Enter 10 digits for valid mobile number" onkeypress="return isNumberKey(event)" required><br/></td>
		<td>&nbsp;&nbsp;&nbsp;&nbsp;Marital Status:<span style="color:red">*</span> </td>
		<td>
Single<input type="radio" name="ms" onchange="handleChange();" id="s" value="Single" required <?php if(isset($_POST['ms']) && $_POST['ms']=='Single') { echo "checked"; } ?> >&nbsp;&nbsp;&nbsp;Married<input type="radio" name="ms" onchange="handleChange1();" id="m" value="Married" required <?php if(isset($_POST['ms']) && $_POST['ms']=='Married') { echo "checked"; } ?> ><br/></td>
	</tr>
	<tr>
		<td></td>
		<td></td>
		<td colspan="2">
			<div style="display:none" id="maid">
				<table class="hometext">
				<tr>
				<td>&nbsp;&nbsp;&nbsp;&nbsp;<b>Marr.Anniv.Date :</b></td>
				<td style="padding-left:38px"><input type="text" name="madate" id="madate" value="<?php if(isset($_POST['madate'])) { echo $_POST['madate']; } elseif($p_info['e_anniv_date']!='0000-00-00') { echo ""; } ?>" class="input1" readonly></td>
			</tr>
			</table>
			</div>
		</td>
	</tr>

	<tr>
		<td style="height:5px"></td>
	</tr>
	<tr>
		<td>In Case Of<br>Emergency Notify:<span style="color:red">*</span> </td>
		<td><input type="text" name="incase_emer" id="incase_emer" value="<?php if(isset($_POST['incase_emer'])) { echo $_POST['incase_emer']; } ?>" class="input1" onKeyPress="return ValidateAlpha(event);"  title="Allowed only characters with one uppercase letter" required ><br/></td>
		<td>&nbsp;&nbsp;&nbsp;&nbsp;Date Of Joining:<span style="color:red">*</span> </td>
		<td><input type="text" name="doj" id="doj" value="<?php echo date('d-m-Y',strtotime($p_info['e_doj'])); ?>" class="input1" readonly ><br/></td>
	</tr>

	<tr>
		<td style="height:5px"></td>
	</tr>

	<tr>
		<td>Emergency mobile No:<span style="color:red">*</span> </td>
		<td><input type="text" name="emer_no" placeholder="10 digit mobile number" value="<?php if(isset($_POST['emer_no'])) { echo $_POST['emer_no']; } ?>"  maxlength="10" class="input1" title="Enter 10 digits for valid mobile number" pattern="\d{10}" onkeypress="return isNumberKey(event)" required ><br/></td>
		<td>&nbsp;&nbsp;&nbsp;&nbsp;Same as Permanent address</td>
		<td><input type="checkbox" name="copyaddr" id="copyaddr" value="copyaddr" onclick="FillBilling(this.form)" /><br/></td>
		
	</tr>
	<tr>
			<td style="height:5px"></td>
	</tr>
	<tr>
		<td>Permanent Address:<span style="color:red">*</span> </td>
		<td><textarea name="paddr" id="paddr" rows="4" cols="56" onkeyup="sync(this)" required ><?php if(isset($_POST['paddr'])) { echo $_POST['paddr']; } ?></textarea><br/></td>
		<td>&nbsp;&nbsp;&nbsp;&nbsp;Mailing Address:<span style="color:red">*</span></td>
		<td><textarea name="mail_addr" id="mail_addr" rows="4" cols="56" required><?php if(isset($_POST['mail_addr'])) { echo $_POST['mail_addr']; } ?></textarea><br/></td>
	</tr> 
	<tr>
		<td style="height:5px"></td>
	</tr>
	<tr>
		<td>Land Phone: </td>
		<td><input type="text" name="addr_ph" value="<?php if(isset($_POST['addr_ph'])) { echo $_POST['addr_ph']; } ?>" maxlength="12" class="input1" pattern="\d{9,12}" title="Enter only digits for valid phone number" onkeypress="return isNumberKey(event)"><br/></td>
		<td>&nbsp;&nbsp;&nbsp;&nbsp;Land Phone: </td>
		<td><input type="text" name="mail_ph" value="<?php if(isset($_POST['mail_ph'])) { echo $_POST['mail_ph']; } ?>" maxlength="12" class="input1" pattern="\d{9,12}" title="Enter only digits for valid phone number" onkeypress="return isNumberKey(event)"><br/></td>
	</tr>
	<tr>
			<td style="height:5px"></td>
	</tr>
	<tr>
		<td>Blood Group:<span style="color:red">*</span> </td>
		<td>
		<select name="bgroup" class="input1" style="height:30px" required>
		<option value="">Select group</option>
		<option value="A+"<?php if(isset($_POST['bgroup']) && ($_POST['bgroup'])=='A+') { echo "selected"; } ?>>A+</option>
		<option value="A-"<?php if(isset($_POST['bgroup']) && ($_POST['bgroup'])=='A-') { echo "selected"; } ?>>A-</option>
		<option value="B+"<?php if(isset($_POST['bgroup']) && ($_POST['bgroup'])=='B+') { echo "selected"; } ?>>B+</option>
		<option value="B-"<?php if(isset($_POST['bgroup']) && ($_POST['bgroup'])=='B-') { echo "selected"; } ?>>B-</option>
		<option value="O+"<?php if(isset($_POST['bgroup']) && ($_POST['bgroup'])=='O+') { echo "selected"; } ?>>O+</option>
		<option value="O-"<?php if(isset($_POST['bgroup']) && ($_POST['bgroup'])=='O-') { echo "selected"; } ?>>O-</option>
		<option value="AB+"<?php if(isset($_POST['bgroup']) && ($_POST['bgroup'])=='AB+') { echo "selected"; } ?>>AB+</option>
		<option value="AB-"<?php if(isset($_POST['bgroup']) && ($_POST['bgroup'])=='AB-') { echo "selected"; } ?>>AB-</option>
		</select><br/>
		</td>
		<td>&nbsp;&nbsp;&nbsp;&nbsp;Aadhar#:<span style="color:red">*</span> </td>
		<td><input type="text" name="aadhar" value="<?php if(isset($_POST['aadhar'])) { echo $_POST['aadhar']; } ?>"  maxlength="12" class="input1" pattern="\d{12}" onkeypress="return isNumberKey(event)" required><br/></td>
	</tr>
	<tr>
			<td style="height:5px"></td>
	</tr>
	<tr>
		<td>PAN#: <span style="color:red">*</span></td>
		<td><input type="text" name="pan" value="<?php if(isset($_POST['pan'])) { echo $_POST['pan']; } ?>" maxlength="10" class="input1" pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{10,}$" title="Enter PAN number with alphanumeric only" style="text-transform:uppercase" required><br/></td>
		<td>&nbsp;&nbsp;&nbsp;&nbsp;Passport#: </td>
		<td><input type="text" name="passport" value="<?php if(isset($_POST['passport'])) { echo $_POST['passport']; } ?>"  maxlength="8" pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$" title="Enter Passport number with alphanumeric only" style="text-transform:uppercase" class="input1"></td>
	</tr>
	<tr>
			<td style="height:10px"></td>
	</tr>
	<tr>
		<td>ID Card Image:<span style="color:red">*</span> </td>
		<td colspan="3"><span style="color:brown"><i>File must be less than 2MB (This image is used for ID card)</i></span><br /> <input type="file" accept=".jpg, .png, .jpeg" name="uploaded_file" id="uploaded_file" required><div id="result"></div></td>&nbsp;&nbsp;<!-- <input type="image" name="remove_button" id="remove_button" value="Delete" style="display:none" src="<?php //echo get_stylesheet_directory_uri(); ?>/images/delete1.png" /> -->
		
	</tr>
	<tr>
		<td style="height:10px"></td>
	</tr>
</table>
</div>

<div style="margin-left:63px; margin-right:63px; margin-top:10px; background-color:#dbf1fd">
	<div style="padding:4px; font-weight:bold; font-size:15px">Bank Details</div>
<table class="hometext">
	<tr>
	<td colspan="2">Continue with the existing ICICI bank account?:<span style="color:red">*</span> <input type="radio" name="bank_exist" id="bank_exist" value="Yes" onchange="bankexist();" required <?php if(isset($_POST['bank_exist']) && $_POST['bank_exist']=='Yes') { echo "checked"; } else if($edit_gend=='Yes') { echo "checked"; } ?>>&nbsp;Yes &nbsp;&nbsp;&nbsp; <input type="radio" name="bank_exist" id="bank_exist1" value="No" onchange="bankexist1();" required <?php if(isset($_POST['bank_exist']) && $_POST['bank_exist']=='No') { echo "checked"; } else if($edit_gend=='No') { echo "checked"; } ?>>&nbsp;No</td>
	</tr>

	<tr>
	<td>
		<div style="display:none" id="banks">
				<table class="hometext" align="center">
					<tr>
					<td style="height:10px"></td>
				</tr>
				<tr>
				<td colspan="4"><input type="text" name="bname" id="bname" class="input1" placeholder="" value="ICICI" title="Allowed only characters with one uppercase letter"  onKeyPress="return ValidateAlpha(event);" style="text-transform:uppercase; width:220px" readonly>&nbsp;<input type="text" name="acno" id="acno" class="input1" placeholder="ICICI Account No" value="<?php if(isset($_POST['acno'])) { echo $_POST['acno']; } ?>" pattern="\d{9,18}" onkeypress="return isNumberKey(event)" title="Allowed min 9 and max 18 digits" style="width:220px;" >&nbsp;<input type="text" name="ifsc" id="ifsc" class="input1" placeholder="ICIC#######" value="<?php if(isset($_POST['ifsc'])) { echo $_POST['ifsc']; } ?>" pattern="[A-Za-z0-9]{11}" title="Enter IFSC Code with alphanumeric" maxlength="11" style="text-transform:uppercase; width:220px" ></td>
			</tr>
			</table>
			</div>
		</td>
	</tr>
	<tr>
		<td style="height:10px"></td>
	</tr>
</table>
</div>
<div style="margin-left:63px; margin-right:63px; margin-top:10px; background-color:#dbf1fd">
	<div style="padding:4px; font-weight:bold; font-size:15px">PF Details</div>
<table class="hometext">
		<tr>
		<td colspan="4">Do you want Continue wth the existing PF?:<span style="color:red">*</span> <input type="radio" name="pf_exist" id="pf_exist" value="Yes" onchange="pfexist();" required <?php if(isset($_POST['bank_exist']) && $_POST['bank_exist']=='Yes') { echo "checked"; } else if($edit_gend=='Yes') { echo "checked"; } ?>>&nbsp;Yes &nbsp;&nbsp;&nbsp; <input type="radio" name="pf_exist" id="pf_exist1" value="No" onchange="pfexist1();" required <?php if(isset($_POST['bank_exist']) && $_POST['bank_exist']=='No') { echo "checked"; } else if($edit_gend=='No') { echo "checked"; } ?>>&nbsp;No</td>
		</tr>
<!-- <tr>
	<td colspan="4">
		<div style="display:none" id="pfdet">
			<table class="hometext" style="margin-left:44px">
				<tr>
				<td><input type="text" name="pfno" id="pfno" class="input1" placeholder="PF Number" value="<?php if(isset($_POST['pfno'])) { echo $_POST['pfno']; } ?>" title="Enter PF number with alphanumeric only" pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$" maxlength="15" style="text-transform:uppercase"></td>
				</tr>
			</table>
		</div>
	</td>
</tr> -->
<tr>
		<td>UAN#:</td><td> <input type="text" name="uan" id="uan" class="input1" value="<?php if(isset($_POST['uan'])) { echo $_POST['uan']; } ?>" class="input1" title="Enter only digits" onkeypress="return isNumberKey(event)" maxlength="15" ><br/></td>
		<td>&nbsp;&nbsp;&nbsp;&nbsp;ESI#: </td>
		<td><input type="text" name="esi" id="esi" title="Enter only digits" class="input1" value="<?php if(isset($_POST['esi'])) { echo $_POST['esi']; } ?>" onkeypress="return isNumberKey(event)" class="input1" maxlength="15"></td>
	</tr>
	<tr>
		<td style="height:10px"></td>
	</tr>
</table>
</div>
<div style="margin-left:63px; margin-right:63px; margin-top:10px; background-color:#dbf1fd">
	<div style="padding:4px; font-weight:bold; font-size:15px">Highest Education Qualification<span style="color:red">*</span></div>
	<table class="hometext">
	<tr>
		<td><input type="text" name="course_name" id="course_name" placeholder="Course Name" class="input1" style="width:200px" value="<?php if(isset($_POST['course_name'])) { echo $_POST['course_name']; } ?>"  title="Allowed only characters with one uppercase letter" onKeyPress="return ValidateAlpha(event);" required /></td>
		<td><input type="text" name="univ" id="univ" placeholder="University"  class="input1" style="width:200px" value="<?php if(isset($_POST['univ'])) { echo $_POST['univ']; } ?>" onKeyPress="return ValidateAlpha(event);" title="Allowed only characters with one uppercase letter" required /></td></td>
		<td><input type="text" name="univ_from" id="univ_from" placeholder="From" class="input1" style="width:200px" value="<?php if(isset($_POST['univ_from'])) { echo $_POST['univ_from']; } ?>" required readonly /></td></td>
		<td><input type="text" name="univ_to" id="univ_to" placeholder="To" class="input1" style="width:200px" value="<?php if(isset($_POST['univ_to'])) { echo $_POST['univ_to']; } ?>" required readonly /></td></td>
		
	</tr>
	<tr>
		<td style="height:10px"></td>
	</tr>
</table>
</div>
<div style="margin-left:63px; margin-right:63px; margin-top:10px; background-color:#dbf1fd">
	<div style="padding:4px; font-weight:bold; font-size:15px">Family Details</div>
<table class="hometext">
	<tr>
		<td><input type="text" name="fath_name" id="fath_name" placeholder="Father Name" class="input1" value="<?php if(isset($_POST['fath_name'])) { echo $_POST['fath_name']; } ?>" title="Allowed only characters with one uppercase letter"  onKeyPress="return ValidateAlpha(event);" /></td>
		<td><input type="text" name="moth_name" id="moth_name" placeholder="Mother Name" class="input1" value="<?php if(isset($_POST['moth_name'])) { echo $_POST['moth_name']; } ?>" title="Allowed only characters with one uppercase letter"  onKeyPress="return ValidateAlpha(event);" /></td></td>
		<td><input type="text" name="spouse_name" id="spouse_name" placeholder="Spouse Name" class="input1" value="<?php if(isset($_POST['spouse_name'])) { echo $_POST['spouse_name']; } ?>" title="Allowed only characters with one uppercase letter"  onKeyPress="return ValidateAlpha(event);" /></td></td>
			
	</tr>
	<tr>
		<td style="height:5px"></td>
	</tr>
	<tr>
		<td><input type="text" name="child_name1" id="child_name1" placeholder="Children 1" class="input1" value="<?php if(isset($_POST['child_name1'])) { echo $_POST['child_name1']; } ?>" title="Allowed only characters with one uppercase letter"  onKeyPress="return ValidateAlpha(event);" /></td></td>
		<td><input type="text" name="child_name2" id="child_name2" placeholder="Children 2" class="input1" value="<?php if(isset($_POST['child_name2'])) { echo $_POST['child_name2']; } ?>" title="Allowed only characters with one uppercase letter"  onKeyPress="return ValidateAlpha(event);" /></td>
		<td><input type="text" name="child_name3" id="child_name3" placeholder="Children 3" class="input1" value="<?php if(isset($_POST['child_name3'])) { echo $_POST['child_name3']; } ?>" title="Allowed only characters with one uppercase letter"  onKeyPress="return ValidateAlpha(event);" /></td>	
	</tr>
	<tr>
		<td style="height:10px"></td>
	</tr>
	
	
</table>
</div>

<!-- Nominee Details Starts Here. -->
<div style="margin-left:63px; margin-right:63px; margin-top:10px; background-color:#dbf1fd">
	<div style="padding:4px; font-weight:bold; font-size:15px">Nominee Details<span style="color:red">*</span></div>
	<table class="hometext">
		<tr>
			<td style="width:45%">
				<select name="nominee" id="nominee" class="input1" style="height:30px;" required>
					<option value="">--Select--</option>
					<option value="father">Father</option>
					<option value="mother">Mother</option>
					<option value="spouse">Spouse</option>
					<option value="child">Child</option>
					<option value="others">Others</option>
				</select>
			</td>
			<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td>
				<input type="text" name="nominee_name" style="display:none" id="nominee_name" placeholder="Enter Name" class="input1" value="<?php if(isset($_POST['nominee_name'])) { echo $_POST['nominee_name']; } ?>"/>
			</td>
		</tr>
	</table>
</div>		
<!-- Nominee Details Ends Here-->

<div style="margin-left:63px; margin-right:63px; margin-top:10px;">
<table class="hometext" width="100%">
<tr>
		<td><input type="checkbox" name="chk_conditions" id="chk_conditions" value="Yes" required>&nbsp;I Accept Company Terms and Policies <!-- <a href="https://hrinfo.fintinc.com/Handbook_02092018.pdf" target="_blank"><font color="blue">Employee Handbook</font></a>,  --><a href="https://hrinfo.fintinc.com/Employee_NDA-Fint.pdf" target="_blank"><font color="blue">Non Disclosure Agreement</font></a><span style="color:red">*</span></td>
	</tr>
	<tr>
		<td style="height:10px"></td>
	</tr>
	<input type="hidden" name="primage" id="primage" />
	<!-- <input type="hidden" name="adimage" id="adimage" />
	<input type="hidden" name="panimage" id="panimage" />
	<input type="hidden" name="ppimage" id="ppimage" /> -->
	<input type="hidden" name="uploaded_file_name" id="uploaded_file_name" />
	<!-- <input type="hidden" name="uploaded_file_name1" id="uploaded_file_name1" />
	<input type="hidden" name="uploaded_file_name2" id="uploaded_file_name2" />
	<input type="hidden" name="uploaded_file_name3" id="uploaded_file_name3" /> -->
	<tr>
		<td align="center"><input type="submit" name="update_info" id="update_info" value="Submit" class="sub1" /></td>
	</tr>
	<tr>
		<td height="20"></td>
	</tr>
	</table>
	</div>
<br />
</form>
</div>
<div style="clear:both"></div>

<script>
$(document).ready(function(){
        $('#uploaded_file').change(function(e){
            var file = this.files[0];
            var form = new FormData();
            form.append('uploaded_file', file);
            $.ajax({
                url : "<?php echo $homeurl; ?>/ajax_upload_document.php",
                type: "POST",
                cache: false,
                contentType: false,
                processData: false,
                data : form,
                success: function(res){
					var a = res.split('@');
					//alert(a[0]);
					$("#result").html(a[0]);
					$("#primage").val(a[0]);
					$("#uploaded_file_name").val(a[1]);
					$("#remove_button").hide();
                }
            });
        });
			$('#nominee').change(function(e){
			var nomineeName = $('#nominee').val();
			$('#nominee_name').val('');
			if(nomineeName != ''){
				$('#nominee_name').show();
				$('#nominee_name').prop('required','true');
			}else{
				$('#nominee_name').hide();
				$('#nominee_name').val('');
				$('#nominee_name').removeAttr('required');
			}
		});
    });
 </script>
