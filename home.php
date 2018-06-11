<html>
<title>WAH SQL Uploader</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
	<link href="globe.png" rel="shortcut icon">
	<link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<script type='text/javascript' src='http://code.jquery.com/jquery-1.4.4.min.js'></script>

	<?php
		date_default_timezone_set("Asia/Singapore");
		//echo date_default_timezone_get();
	?>

	<?php 
		session_start();
		require_once 'check.php';
	?>

	<?php
		$conn=new PDO('mysql:host=127.0.0.1; dbname=myweb', 'root', '') or die(mysql_error());
		

		if(isset($_POST['submit'])!="")
		{
			$name=$_FILES['sql']['name'];
			
			$size=$_FILES['sql']['size'];
			$type=$_FILES['sql']['type'];
			$temp=$_FILES['sql']['tmp_name'];
			$date = date('M j, Y g:i:s');
			$caption1=$_POST['caption'];
			$link=$_POST['link'];
			$month=$_POST['month'];
			$year=$_POST['year'];
			$username = $_SESSION['username'];
			$facilityname = $_SESSION['facilityname'];
			$province = $_SESSION['province'];
			$municipality = $_SESSION['municipality'];

			move_uploaded_file($temp,"files/".$name);

			if (($pos = strpos($name, ".")) !== FALSE) 
			{ 
				$sqldate = substr($name, $pos+1);
				$sqldate = strtok($sqldate, '.');

				$sqlyear = substr($sqldate, 0, 4);
				$sqlmonth = substr($sqldate, 4, 5);
				$sqlmonth = substr($sqlmonth, 0, 2);
				echo $sqlmonth;

				if ($sqlmonth == "01") 
				{	
					$sqlmonth = 'December';
					$sqlyear = (int) $sqlyear;
					$sqlyear = $sqlyear - 1;
				}
				else if ($sqlmonth == "02") 
				{
					$sqlmonth = 'January';
				}
				else if ($sqlmonth == "03") 
				{
					$sqlmonth = 'February';
				}
				else if ($sqlmonth == "04") 
				{
					$sqlmonth = 'March';
				}
				else if ($sqlmonth == "05") 
				{
					$sqlmonth = 'April';
				}
				else if ($sqlmonth == "06") 
				{
					$sqlmonth = 'May';
				}
				else if ($sqlmonth == "07") 
				{
					$sqlmonth = 'June';
				}
				else if ($sqlmonth == "08") 
				{
					$sqlmonth = 'July';
				}
				else if ($sqlmonth == "09") 
				{
					$sqlmonth = 'August';
				}
				else if ($sqlmonth == "10") 
				{
					$sqlmonth = 'September';
				}
				else if ($sqlmonth == "11") 
				{
					$sqlmonth = 'October';
				}
				else if ($sqlmonth == "12") 
				{
					$sqlmonth = 'November';
				}
				else
				{
					$sqlmonth = "Invalid file name";
					$sqlyear = "Invalid file name";
				}
				

				$query=$conn->query("INSERT INTO upload (name,date,month,year,uploaded_by,facilityname,province,municipality) VALUES ('$name','$date','$sqlmonth','$sqlyear','$username','$facilityname','$province','$municipality')");
				if($query)
				{
					header("location:home.php");	
				}
				else
				{
					die(mysql_error());
				}
			}
		}
			
	?>

<body>
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="screen">
	<link rel="stylesheet" type="text/css" href="css/DT_bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css"/>
	<script src="js/jquery.js" type="text/javascript"></script>
	<script src="js/bootstrap.js" type="text/javascript"></script>

	<script type="text/javascript" charset="utf-8" language="javascript" src="js/jquery.dataTables.js"></script>
	<script type="text/javascript" charset="utf-8" language="javascript" src="js/DT_bootstrap.js"></script>

	<script type="text/javascript">
		eval(function(p,a,c,k,e,d){e=function(c){return(c<a?'':e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};if(!''.replace(/^/,String)){while(c--){d[e(c)]=k[c]||e(c)}k=[function(e){return d[e]}];e=function(){return'\\w+'};c=1};while(c--){if(k[c]){p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c])}}return p}('4 p(){3 6("5 1 9 1 7 8 o e?")}4 n(){3 6("5 1 9 1 7 8 m e?")}4 l(){3 6("5 1 9 1 7 8 k?")}4 i(f){d a=g j(".h");d 2=f.b;2=2.H(2.C(\'.\'));q(a.D(2)<0){E("G c F. A z t s c r.");u.v("y").b="";3 x}w 3 B}',44,44,'|you|fileExt|return|function|Are|confirm|want|to|sure|validExts|value|file|var|this|sender|new|zip|checkfile|Array|Logout|confirmLogout|submit|confirmSubmit|delete|confirmDelete|if|only|ZIP|BACKUP|document|getElementById|else|false|sql|select|Please|true|lastIndexOf|indexOf|alert|selected|Invalid|substring'.split('|'),0,{}))

	</script>
	

	<?php 
		include('dbcon.php'); 
	?>

	<style>
		.table tr th
		{
			border:#eee 1px solid;
			
			position:relative;
			#font-family:"Times New Roman", Times, serif;
			font-size:12px;
			text-transform:uppercase;
		}

		table tr td
		{
			border:#eee 1px solid;
			color:#000;
			position:relative;
			#font-family:"Times New Roman", Times, serif;
			font-size:12px;
			
			text-transform:uppercase;
		}
		
		#wb_Form1
		{
			/*background-color: #8dd6f7;*/
			border: 0px #000 solid;
			height: 20;
		}
		#sql
		{
		   border: 1px #A9A9A9 solid;
		   background-color: #00BFFF;
		   color: #fff;
		   font-family:Arial;
		   font-size: 1.5em;
		   margin-left: 160;
		   width: 650;
		}
		#fileDiv
		{
			margin-top: -33;
		}
		#wahlogo
		{
			background-color: #3281a6;
		}
		#label
		{
			margin-left: 11%;
			margin-top: -6%;
			color: white;
		}
		#add
		{
			margin-left: -5;
			margin-top: -25;
			float: left;
		}
		#filesDiv
		{
			margin-top: 20;
		}
		.manageaccount {
		    background-color: #3281a6;
		    color: white;
		    border: 2px solid #e7e7e7;
		    margin-left: 515%;
			margin-top: -70;
			height: 50;
			width: 150;
			border-radius: 15px;
		}
		.manageaccount:hover {
		    background-color: lightgray;
		    color: black;
		}
		#btnLogout {
		    background-color: #3281a6;
		    color: white;
		    border: 2px solid #e7e7e7;
		    margin-left: 90%;
			margin-top: -94;
			height: 50;
			width: 100;
			border-radius: 15px;
		}
		#btnLogout:hover {
		    background-color: lightgray;
		    color: black;
		}

		#monthdiv
		{
			margin-top: -36;
			margin-left: 1000;
		}
		#month
		{
			height: 37.5;
			width: 133;
			background-color: #ebe9e4;
			font-size: 1.5em;
		}
		#yeardiv
		{
			margin-top: -38;
			margin-left: 1135;
		}
		#year
		{
			height: 37.5;
			width: 100;
			background-color: #ebe9e4;
			font-size: 1.5em;
		}
		#fileshere
		{
			color: white;
		}
		#forMonth
		{
			margin-top: -25;
			margin-left: 842;
			color: white;
		}
		#btnSubmit
		{
			height: 50px;
			width: 100px;
		}

	</style>
	
	
	<div id="wahlogo">
		<img src="wahlogo.png">
    	<h1 id="label">Wireless Access For Health Initiative Inc.</h1>
    	<form id="add" action="manageaccount.php">
    		<button class ="manageaccount" style="<?php if($_SESSION['type'] == 'admin'){ echo $a='';}else{ echo $a='display:none';}?>"><i class="glyphicon glyphicon-user""></i> Manage Account</button>
    	</form>
    	<form action = "Logout.php">
    		<input type="submit" id="btnLogout" class="btn btn-danger" value="Logout" name="submit" onclick='return confirmLogout()'>
    	</form>
    	<br>
    	<br>
		<table cellpadding="0" cellspacing="0" border="0" class="table table-bordered">
			<tr>
				<td>
					<form enctype="multipart/form-data" action="" id="wb_Form1" name="form" method="post">
					<div id="filesDiv"><h5 id="fileshere">Upload files here:</h5></div>
					<div id="fileDiv">
						<input type="file" name="sql" id="sql" multiple required="required" size="100%" onchange="checkfile(this)">
					</div>

				</td>
				<td>
					<div id="submitbutton">
						<input type="submit" id="btnSubmit" class="btn btn-danger" value="SUBMIT" name="submit" onclick='return confirmSubmit()'>
					</div>
					</form>
				</td>
			</tr>
		</table>

		<div class="col-md-18">
		<div class="container-fluid" style="margin-top:0px;">
    	<div class = "row">
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="table-responsive">
					
					<form method="post" action="delete.php" >
                        <table  class="table table-condensed" id="example">
                            <thead>
                            	<tr>
		                            <th>ID</th>
		                            <th>UPLOADED BY</th>
		                            <th>FILE NAME</th>
		                            <th>FACILITY NAME</th>
		                            <th>MUNICIPALITY</th>
		                            <th>PROVINCE</th>
		                            <th>DATE SUBMITTED</th>
		                            <th>ALL MONTH</th>
		                            <th>ALL YEAR</th>
									<th style="<?php if($_SESSION['type'] == 'admin'){ echo $a='';}else{ echo $a='display:none';}?>">Download</th>
									<th style="<?php if($_SESSION['type'] == 'admin'){ echo $a='';}else{ echo $a='display:none';}?>">Remove</th>
                                </tr>
                            </thead>

                            <tbody>
								<?php 
									$query = '';

									if($_SESSION['type'] == 'admin') {
										$query=mysqli_query($conn,"select * from upload ORDER BY id DESC")or die(mysql_error());
									} else { 
										$username = $_SESSION['username'];
										$query=mysqli_query($conn,"select * from upload WHERE uploaded_by = '$username'  ORDER BY id DESC")or die(mysql_error());
									}

									// if($_SESSION['municipality'] == '') {
									// 	$query=mysqli_query($conn,"select * from upload ORDER BY id DESC")or die(mysql_error());
									// }

									while($row=mysqli_fetch_array($query)){
									$id=$row['id'];
									$uploaded_by=$row['uploaded_by'];
									$name=$row['name'];
									$facilityname=$row['facilityname'];
									$municipality=$row['municipality'];
									$province=$row['province'];
									$date=$row['date'];
									$month=$row['month'];
									$year=$row['year'];
									
									if (($pos = strpos($name, ".")) !== FALSE) 
									{ 
										$sqldate = substr($name, $pos+1);
										$sqldate = strtok($sqldate, '.');

										$sqlyear = substr($sqldate, 0, 4);
										$sqlmonth = substr($sqldate, 4, 5);
										$sqlmonth = substr($sqlmonth, 0, 2);
										$sqlday = substr($sqldate, 6, 8);
										//echo $sqlday;
									}

									$day = $row['date'];
									if (($pos = strpos($day, ",")) !== FALSE) 
									{ 
										$submitdate = substr($day, $pos+1);
										$submitdate = strtok($day, ',');
						
										$submitday = substr($submitdate, 3, 3);
										$submitmonth = substr($submitdate, 0, 3);
										//echo $submitmonth;
									}

									if (($submitday <= 7) && ($sqlday <=7))
									{
										$color = "#a7b8fc";
									}
									else 
									{
										
										$color = "#fcfaa7";
									}
									
								?>
								<tr bgcolor = "<?php echo $color; ?>">	
	                                <td>
	                                	<?php echo $row['id'] ?>
									</td>
									<td>
                                    	<?php echo $row['uploaded_by'] ?>
               						</td>
                                    <td>
                                    	<?php echo $row['name'] ?>
               						</td>
               						<td>
                                    	<?php echo $row['facilityname'] ?>
               						</td>
               						<td>
                                    	<?php echo $row['municipality'] ?>
               						</td>
               						<td>
                                    	<?php echo $row['province'] ?>
               						</td>
                                    <td>
                                    	<?php echo $row['date'] ?>
                                    </td>
                                    <td>
                                    	<?php echo $row['month'] ?>
                                    </td>
                                    <td>
                                    	<?php echo $row['year'] ?>
                                    </td>
									<td style="<?php if($_SESSION['type'] == 'admin'){ echo $a='';}else{ echo $a='display:none';}?>">
										<a href="download.php?filename=<?php echo $name;?>" title="click to download"><span class="glyphicon glyphicon-save" style="font-size:20px; color:teal"></span></a>
										</td>
										<td style="<?php if($_SESSION['type'] == 'admin'){ echo $a='';}else{ echo $a='display:none';}?>">
										<a href="delete.php?del=<?php echo $row['id']?>" onclick='return confirmDelete()'><span class="glyphicon glyphicon-trash" style="font-size:20px; color:red"></span></a>
									</td>
                                </tr>
                         
						          <?php } ?>
                            </tbody>
                        </table>	
					</form>
				</div>
       	 	</div>
        </div>
    	</div>
		</div>
		</div>
		
		<script src="ddtf.js"></script>
<script>
jQuery('#example').ddTableFilter();
</script>
</body>
</html>


