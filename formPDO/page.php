<?php
session_start();
?>

<!DOCTYPE HTML>  
<html>
<head>
	<title>Page</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
th {padding: 10px;}

</style>
</head>

<body>  

<?php

class TableRows extends RecursiveIteratorIterator { 
    function __construct($it) { 
        parent::__construct($it, self::LEAVES_ONLY); 
    }
}

// define variables and set to empty values
$servername= "localhost";
$username="root";
$password="";

try {
    $conn = new PDO("mysql:host=$servername;dbname=test", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if ($_SERVER["REQUEST_METHOD"] == "GET") {
  $rollno = $_GET["rollno"];
}

	$sql ="SELECT * FROM collection WHERE rollno='$rollno'";
	foreach ($conn->query($sql) as $row) {
		$name = $row['name'];
		$specialization=$row["specialization"];
		$research=$row["research"];
		$abstract=$row["abstract"];
		$publications=$row["publications"];
		$awards=$row["awards"];
		$subtext1=$row["subtext1"];
		$subtext2=$row["subtext2"];
		$subtext3=$row["subtext3"];
	}
}

catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }

$conn = null;

?>

<div style="max-width: 900px; width: 100%; margin: 0 auto; position: relative; background-color:lightblue; border: 1px solid grey;">
	<form>
	<center>
	<table>
		<tr>
			<th><b>Name :</b></th>
			<th><label><?php echo $name;?></label></th>
		</tr>
		<tr>
			<th><b>Roll number :</b></th>
			<th><label><?php echo $rollno;?></label></th>
		</tr>
		<tr>
			<th><b>Specialization :</b></th>
			<th><label><?php echo $specialization;?></label></th>
		</tr>
		<tr>
			<th><b>Title of Research :</b></th>
			<th><label><?php echo $research;?></label></th>
		</tr>
		<tr>
			<th><b>Abstract :</b></th>
			<th><label><?php echo $abstract;?></label></th>
		</tr>
		<tr>
			<th><b>Important publications :</b></th>
			<th><label><?php echo $publications;?></label></th>
		</tr>
		<tr>
			<th><b>Awards obtained, if any :</b></th>
			<th><label><?php echo $awards;?></label></th>
		</tr>
	</table>
	</center>
	<br><br>
	
		<div class="container-fluid">
			
			<div class="row">
				<div class="col-sm-4">
					<div style="background-color:pink; text-align:center; max-width:290px; box-shadow: 10px 10px 5px #888888;">
						<div>
							<img id="blah1" src="images\<?php echo $rollno.'_1.'.$_SESSION['file_ext1'];?>" alt="your image" height="200px" style="visibility:hidden"/>
						</div>
						<label><?php echo $subtext1;?></label>
					</div>
				</div>

				<div class="col-sm-4">
					<div style="background-color:pink; text-align:center; max-width:290px; box-shadow: 10px 10px 5px #888888;">
						<div>
							<img id="blah2" src="images\<?php echo $rollno.'_2.'.$_SESSION['file_ext2'];?>" alt="your image" height="200px" style="visibility:hidden"/>
						</div>
						<label><?php echo $subtext2;?></label>
					</div>
				</div>

				<div class="col-sm-4">
					<div style="background-color:pink; text-align:center; max-width:290px; box-shadow: 10px 10px 5px #888888;">
						<div>
							<img id="blah3" src="images\<?php echo $rollno.'_3.'.$_SESSION['file_ext3'];?>" alt="your image" height="200px" style="visibility:hidden"/>
						</div>
						<label><?php echo $subtext3;?></label>
					</div>
				</div>
			</div>
		</div>
		<br><br>
		
	</form>
</div>

</body>
</html>