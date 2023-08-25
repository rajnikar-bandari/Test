<?php
session_start();
if(!isset($_SESSION['userid']) || $_SESSION['userid']=="")
{ header("Location:index.php"); }
require_once("common.php");
 
$cur_date = date('Y-m-d');

$rmcode = mysqli_query($con,"SELECT * FROM reporting_mangers WHERE rep_uname='".$_SESSION['userid']."' ");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Fint Time Sheet </title>
<link rel="icon" type="image/x-icon" href="images/favicon.png">
<link href="images/mt.css" rel="stylesheet" type="text/css" />
</head>
<body>
 <table width="94%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td class="lefttable" width="5">
	<table width="5" class="bg" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
</td>

<!--middle start here -->
    <td width="100%" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="227"><img src="images/logo.gif" width="227" height="107" /></td>
        <td width="100%" class="topbg1"><div align="center" class="topheadtext">Time Sheet</div></td>
        <td width="342"><div align="right"><img src="images/topimg.jpg" width="342" height="107" /></div></td>
      </tr>
    </table>
	 <table class="navbg" width="100%" border="0" cellspacing="0" cellpadding="0">
       <tr>
	  <td>&nbsp;&nbsp;<!-- <a href="timesheet.php">Add Your Time Sheet</a> --></td>
	  <td align="right"><a href="change-pwd.php">Change Password</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="logout.php">Logout:</a> <?php echo $_SESSION['userid']; ?>&nbsp;&nbsp;</td>
	  </tr>
      </table>
      <table class="topyellow" width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td>&nbsp;</td>
        </tr>
      </table>
 <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td height="400" valign="top"><br />

<table width="800" border="0" align="center" cellpadding="0" cellspacing="0" class="bg">
              <tr>
                <td width="10"><img src="images/box-topleft.gif" /></td>
                <td width="780" class="boxhead">Time Sheet Reports</td>
                <td width="10"><img src="images/box-topright.gif" /></td>
              </tr>
              <tr>
                <td class="boxleft">&nbsp;</td>
                <td valign="top">
				<!-- box middle start -->


<table border="0" align="center" cellpadding="3" cellspacing="1" class="smalltext" width="820">
			    <tr>
				<td width="280" class="headcolor">Date</td>
				<td width="140" class="headcolor">Project</td>
                <td width="200" class="headcolor">Feature type</td>
                <td width="200" class="headcolor">Task</td>
                <td width="80" class="headcolor">Time</td>
				<td width="100" class="headcolor">Comments</td>
				<td width="140" class="headcolor">Status</td>
				<td width="140" class="headcolor">#</td>
				</tr>
			   <?php
		if(mysqli_num_rows($rmcode) == 0) 
		{
         ?>
<tr><td colspan="6" bgcolor="#E4F6FD">No Records</td></tr>
<?php
} else {
            while($grec=mysqli_fetch_array($rmcode))
           {
			$erec = mysqli_query($con,"SELECT * FROM timesheet WHERE uname='".$grec['euname']."' ORDER BY `date` DESC");

			while($rec=mysqli_fetch_array($erec))
			{

		$date1 = date('d-m-Y', strtotime($rec['date']));
           ?>
           <TR>
		   <TD bgcolor="#E4F6FD"><?php echo $date1; ?></TD>
		     <TD bgcolor="#E4F6FD"><?php echo $rec['pname']; ?></TD>
			<TD bgcolor="#E4F6FD"><?php echo $rec['feature_type']; ?></TD>
           <TD bgcolor="#E4F6FD"><?php echo $rec['task']; ?></TD>
		   <TD bgcolor="#E4F6FD"><?php echo $rec['hours']; ?>hrs <?php echo $rec['mins']; ?>mins</TD>
		   <TD bgcolor="#E4F6FD"><?php echo $rec['comments']; ?></TD>
		   <TD bgcolor="#E4F6FD"><?php echo $rec['status']; ?></TD>
		   <TD bgcolor="#E4F6FD"><?php if($rec['status']!='Approve') { ?>
		   <a href="timesheetedit.php?x=<?php echo $rec['id']; ?>"><strong style="color:red">Edit</strong></a> <?php } ?></TD></TD>
		   </tr>
					
           <?php 
		   }
		   }
		 }
          ?>
             </table>
				
				<!-- box middle end -->
				</td>
                <td class="boxright">&nbsp;</td>
              </tr>
              <tr>
                <td><img src="images/box-bottomleft.gif" /></td>
                <td class="boxbottom">&nbsp;</td>
                <td><img src="images/box-bottomright.gif" /></td>
              </tr>
            </table>
			<br>
			</td>
        </tr>
      </table>
	     <table class="footer" width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><div align="center">All Rights Reserved by Fint Solutions Pvt, Ltd.</div></td>
        </tr>
      </table>
	  
    </td>
<!--middle end here -->	
	
    <td class="righttable" width="5">
	<table width="5" class="bg" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
	</td>
  </tr>
</table>

</body>
</html>
			