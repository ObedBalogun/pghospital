<?php
		$staff_name = $_POST["staff_name"];
		$staff_id = $_POST["staff_id"];
		$password = $_POST["password"];
		$phone_number = $_POST["phone"];
		$db_connection = pg_connect("host=localhost dbname=Hospital user=postgres password=Youknowit2");
		$query = "INSERT INTO \"Staff\" (\"STAFF_ID\",\"STAFF_NAME\",\"PASSWORD\")  VALUES('$staff_id','$staff_name','$password')";
		$result = pg_query($db_connection, $query);
		header('Location: index.php');
	?>