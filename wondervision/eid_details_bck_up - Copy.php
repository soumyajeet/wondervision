<?php
session_start();

include('include/config.php');
date_default_timezone_set('Asia/Calcutta');
$date = date('Y-m-d H:i:s');
$eid=$_GET["eid"];
$valid_next_page=0;

/*if(isset($_REQUEST['enq']))
{
  ?>
	//header('Location:totalamount.php?eid=$eid');
	<script>
		window.location="totalamount.php?eid="<?php echo $eid; ?>;
	
	</script>
	
	<?php
}*/

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Analytical and Business Process Automation & Management tool for Tourism Business</title>
	
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<link rel="stylesheet" href="/resources/demos/style.css" />
	<link rel="stylesheet" type="text/css" media="screen" href="css/glyphicons.all.css" />

	<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
	
	<script type="text/javascript" src="flot/jquery.flot.js"></script>
	<script type="text/javascript" src="flot/jquery.flot.pie.js"></script>
	<script type="text/javascript" src="flot/jquery.flot.resize.js"></script>
	<script type="text/javascript" src="bootstrap/js/bootstrap-alert.js"></script>
	<script type="text/javascript" src="bootstrap/js/bootstrap-button.js"></script>
	<script type="text/javascript" src="bootstrap/js/bootstrap-carousel.js"></script>
	<script type="text/javascript" src="bootstrap/js/bootstrap-collapse.js"></script>
	<script type="text/javascript" src="bootstrap/js/bootstrap-dropdown.js"></script>
	<script type="text/javascript" src="bootstrap/js/bootstrap-modal.js"></script>
	<script type="text/javascript" src="bootstrap/js/bootstrap-tooltip.js"></script>
	<script type="text/javascript" src="bootstrap/js/bootstrap-popover.js"></script>
	<script type="text/javascript" src="bootstrap/js/bootstrap-scrollspy.js"></script>
	<script type="text/javascript" src="bootstrap/js/bootstrap-tab.js"></script>
	<script type="text/javascript" src="bootstrap/js/bootstrap-transition.js"></script>
	<script type="text/javascript" src="bootstrap/js/bootstrap-typeahead.js"></script>
	<script type="text/javascript" src="validation.js"></script>
	
	

	<!-- Uncomment to use LESS The dynamic stylesheet language. | http://lesscss.org/ -->
	<!-- <link rel="stylesheet/less" type="text/css" href="css/main.less" /> -->
	<!-- <script type="text/javascript" src="js/less-1.3.0.min.js"></script> -->

	<!-- Uncomment to use CSS -->
	<link rel="stylesheet" type="text/css" media="screen" href="css/bootstrap.css" />
	

	<!-- DEMO SCRIPTS -->
	<script type="text/javascript" src="js/demo.js"></script>
	
	  <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
	  <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
	  <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
	  <link rel="stylesheet" href="/resources/demos/style.css" />
	  <script>
	  $(function() {
	    $( "#datepicker" ).datepicker();
	  });
	  $(function() {
	    $( "#datepicker1" ).datepicker();
	  });
	   $(function() {
	    $( "#datepicker3" ).datepicker();
	  });
	   $(function() {
	    $( "#datepicker4" ).datepicker();
	  });
	  </script>
	  <!--Include JQuery File-->
<script type="text/javascript" language="Javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
 
<!--Include JQuery UI File-->
<script type="text/javascript" language="Javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.21/jquery-ui.min.js"></script>
 
</head>
<body>
 
	<script type="text/javascript" src="js/myScript.js"></script>
	<script language="JavaScript" type="text/javascript" src="search.js"></script>

	


</head>
<body>
	<!-- BEGIN #navbar -->
	<div class="navbar" id="navbar">
		<div class="navbar-inner">
			<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
				<span class="icon-user icon-white"></span>
			</a>
			<a class="brand" href="#">XLogistics<br><h3>Tour Management Edition</h3></a>
			<div class="nav-collapse collapse">
				<ul class="nav pull-right">
					<li><a href="index.php"><i class="icon-off icon-white"></i> logout</a></li>
				</ul>
			</div>
			<div class="clearfix"></div>
		</div>
		<?php include('menu.php'); ?>
	</div> <!-- END #navbar -->

	<!-- BEGIN #main -->
	<div class="main" id="main">
		<!-- BEGIN #main-nav -->
		<?php include('sidebar.php'); ?>
<!-- BEGIN #main-content -->
		<div class="content" id="main-content">
			
			<div class="row-fluid" id="main-content-row">
				<!-- BEGIN #main-content-span -->
				<div class="span6" id="main-content-span">
				<h2 style="width:195%;">Enquiry Details</h2>
				
					<div class="enquiryfrom" style="padding:15px;">
					
					<?php
						$query10  = "SELECT * FROM enquiry_accomodation_mapping WHERE enquiry_id = '$eid'";
							
							$result10 = mysql_query($query10);
							
							while($row10 = mysql_fetch_assoc($result10)) {
							echo $row10['servicetax'];
							echo "/************************/";
							echo $row10['commission'];
							if( $row10['servicetax']==0.00 || $row10['commission']==0.00){
								$valid_next_page=1;
								
								}
							echo "*******************";
								echo $valid_next_page;
							
					?>
		 <table border="0" width="100%" style="background-color:#EEEEEE;">
			<tr style="background-color:#F9F9F9;border:1px solid #ffffff; height:25px; color:#000000">
				<td align="center" colspan="4"><b>NAME&nbsp;&nbsp; </b>

				
				<?php
								  
								  $query100="SELECT name,hotel_id FROM hotel_master where (hotel_id=(select hotel_id from accomodation_type_details where accomodation_type_id='".$row10['accomodation_type_id']."'))";
								$result100 = mysql_query($query100);
								
								$row100=mysql_fetch_array($result100);
								
								echo $row100['name']; 								
								?>
				</td>
				
			</tr>
			<tr>
				<td width="20%" align="left"><b>ADULT</b></td>
				<td width="30%" align="left"><?php echo $row10['noofadults'] ?></td>
				<td width="20%" align="left"><b>CHILDREN</b></td>
				<td align="left"><?php echo $row10['noofchildren'] ?></td>
			</tr>
			<tr>
				<td width="20%" align="left"><b>ROOM</b></td>
				<td width="30%" align="left"><?php echo $row10['noofrooms'] ?></td>
				<td width="20%" align="left"><b>AMOUNT</b></td>
				<td align="left"><?php echo $row10['amount'] ?></td>
			</tr>
			<tr>
				<td width="20%" align="left"><b>CHECK_IN_DATE</b></td>
				<td width="30%" align="left"><?php echo $row10['checkindate'] ?> </td>
				<td width="20%" align="left"><b>CHECK_OUT_DATE</b></td>
				<td align="left"><?php echo $row10['checkoutdate'] ?></td>
			</tr>
			<tr>
				<td width="20%" align="left"><b>&nbsp;</b></td>
				<td width="30%" align="center">
				<table border=0 width=100%>
				<tr>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td align="right">
				<a  href="edithotel.php?eid=<?php echo $eid ?>&hid=<?php echo $row100['hotel_id'] ?>&hname=<?php echo $row100['name'] ?>&adl=<?php echo $row10['noofadults'] ?>&chl=<?php echo $row10['noofchildren'] ?>&rum=<?php echo $row10['noofrooms'] ?>&amt=<?php echo $row10['amount'] ?>&cid=<?php echo $row10['checkindate'] ?>&cod=<?php echo $row10['checkoutdate'] ?>&aid=<?php echo $row10['accomodation_type_id'] ?>&action=edit"><b>Edit</b></a>
				</td>
				<td align="center"><a  href="edithotel.php?eid=<?php echo $eid ?>&aid=<?php echo $row10['accomodation_type_id'] ?>&action=delete" onclick="return confirm('Are you sure want to delete ??');"><b>Delete</b></a></td>
				</tr>
				</table>
				
				
				
				</td>
				<td width="20%" align="right">&nbsp;</td>
				<td align="left">&nbsp;</td>
			</tr>
		</table>
			<?php
							}
							?>
				</br></br>			
			<?php
							
							
							$query101  = "SELECT * FROM transport_details WHERE enquiry_id = '$eid'";
							
							$result101 = mysql_query($query101);
							while($row101 = mysql_fetch_assoc($result101)) {
							echo $row101['servicetax'];
							echo "/************************/";
							echo $row101['commission'];
							if( $row101['servicetax']==0.00 || $row101['commission']==0.00)
								$valid_next_page=1;
									echo "*******************";
								echo $valid_next_page;
								
							?>
							
			<table border="0" width="100%" style="background-color:#EEFFEE;">
			<tr>
				<td width="20%" align="left"><b>ADULT</b></td>
				<td width="30%" align="left"><?php echo $row101['noofadults'] ?></td>
				<td width="20%" align="left"><b>CHILDREN</b></td>
				<td align="left"><?php echo $row101['noofchildren'] ?></td>
			</tr>
			<tr>
				<td width="20%" align="left"><b>START PLACE</b></td>
				<td width="30%" align="left"><?php echo $row101['startingplace'] ?></td>
				<td width="20%" align="left"><b>DESTINATION</b></td>
				<td align="left"><?php echo $row101['destination'] ?></td>
			</tr>
			<tr>
				<td width="20%" align="left"><b>FROM_DATE</b></td>
				<td width="30%" align="left"><?php echo $row101['pickuptime'] ?> </td>
				<td width="20%" align="left"><b>TO_DATE</b></td>
				<td align="left"><?php echo $row101['estimatedtime'] ?></td>
			</tr>
			<tr>
				<td width="20%" align="left"><b>RATE</b></td>
				<td width="30%" align="left"><?php echo $row101['rate'] ?> </td>
				<td width="20%" align="left"><b>TYPE</b></td>
				<td align="left"><?php echo $row101['vehicletype'] ?></td>
			</tr>
			<tr>
				<td width="20%" align="left"><b>&nbsp;</b></td>
				<td width="30%" align="center">
				<table border=0 width=100%>
				<tr>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td align="right">
				
				<?php
				if ($row101['vehicletype']=="AC")
					$type_AC=0;
				else
					$type_AC=1;
					
				
				?>
				
				<a  href="edittravel.php?tid=<?php echo $row101['transport_id'] ?>&action=edit&eid=<?php echo $eid ?>&adt=<?php echo $row101['noofadults'] ?>&chld=<?php echo $row101['noofchildren'] ?>&sp=<?php echo $row101['startingplace'] ?>&dst=<?php echo $row101['destination'] ?>&fd=<?php echo $row101['pickuptime'] ?>&td=<?php echo $row101['estimatedtime'] ?>&rate=<?php echo $row101['rate'] ?>&type=<?php echo $type_AC ?>"><b>Edit</b></a>
				</td>
				<td align="center"><a  href="edittravel.php?tid=<?php echo $row101['transport_id'] ?>&action=delete&eid=<?php echo $eid ?>"onclick="return confirm('Are you sure want to delete ??');"><b>Delete</b></a></td>
				</tr>
				</table>
				
				
				
				</td>
				<td width="20%" align="right">&nbsp;</td>
				<td align="left">&nbsp;</td>
			</tr>
			<tr style="background-color:#EEFFFF;>
				<td colspan="4">&nbsp;</b></td>
				
			</tr>
		
		</table>
		
			<?php
							}
							?>
		<form>
		<table width="80%">
		   <tr>
								<td>
								<p align="center">
								<a href="totalamount.php?eid=<?php echo $eid; ?>"><input type="button" value="Submit" class="bbbtn" style="width:120px;" onclick="return shownextpage()"></a>
								</p>
								</td>
			</tr>
		</table>
		<script type="text/javascript" >

	 function shownextpage()
       {
	 
           submitOK="true";
		   var testthis="<?php echo $valid_next_page; ?>";
		
		   if(testthis==1)
           	{
				  alert("Plese fill up the mandatory field");   
                  submitOK="false";
            }
            
            if(submitOK=="false")
         return false;
			else
         return true;
       }
	</script>
	
		</form>


					</div>

				</div><!-- END #main-content-span -->
				<!-- BEGIN #main-content-span -->
			</div><!-- END main-content-row -->
		</div><!-- END #main-content -->	
	</div><!-- END #main -->
	<!-- BEGIN #footer -->
	<div class="footer" id="footer">	
		<div class="clearfix"></div>
	</div> <!-- END #footer -->
</body>
</html>