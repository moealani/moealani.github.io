<!DOCTYPE html>
<html>
<body>
<?php
    $tableid = $_GET['id'];
    $status = $_GET['status'];
    $lastseen = $_GET['lastseen'];
    $location = $_GET['location'];
    $floor = $_GET['floor'];

    echo $var1;

  $servername = "mydb.ics.purdue.edu";
	$username = "akais";
	$password = "2503Team22";
	$database = "akais";
	// Create connection
	$conn = mysqli_connect($servername, $username, $password, $database);

	// Check connection
	if (!$conn) {
	    die("Connection failed: " . mysqli_connect_error());
	}
	echo "Connected successfully <br> ";

	$sql = "INSERT INTO ezspot VALUES (".$tableid.", ".$status.", ".$lastseen.", ".$location.", ".$floor.")";

	$sql2 = "SELECT * FROM `ezspot` WHERE 1";
	$retr = $conn->query($sql2);

	while($row = $retr->fetch_assoc()){
		echo "Table ID: " . $row['Table_ID'] . ", Status: " . $row['Status'] . ", Last Activity: " . $row['Last_Activity']. ", Building: " . $row['Building'] . ", Floor: " . $row['Floor'] ."<br>";
	}

	if ($retr) {
	      echo "Successfully retrieved data <br>";
	} else {
	      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}

	if (mysqli_query($conn, $sql)) {
      echo "New record created successfully <br>";
	} else {
	      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}

?>
</body>
</html>
