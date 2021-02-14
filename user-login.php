<?php
session_start();
		$staff_id = $_POST["staff_id"];
		$password = $_POST["password"];
		$db_connection = pg_connect("host=localhost dbname=Hospital user=postgres password=Youknowit2");
		$query = "SELECT \"STAFF_NAME\"  FROM \"Staff\" WHERE \"STAFF_ID\" = '$staff_id' AND \"PASSWORD\" = '$password' ";
		$query2 = "SELECT COUNT(*) AS doctors FROM \"Doctor\" ";
		$query3 = "SELECT COUNT(*) AS patients FROM \"Patient\" ";
		$query4 = "SELECT * FROM \"Patient\" ";

		$result = pg_query($db_connection, $query);
		$doctors = pg_query($db_connection, $query2);
		$get_patients_count = pg_query($db_connection, $query3);
		$get_patients_list = pg_query($db_connection, $query4);

		$see = pg_fetch_assoc($result);
		$doctor_count = pg_fetch_assoc($doctors);
		$patient_count = pg_fetch_assoc($get_patients_count);
		while($row = pg_fetch_assoc($get_patients_list)){
		$patients[] = $row;
		}
#		$patient_list = pg_fetch_assoc($get_patients_list);

		if( $see['STAFF_NAME'] ){
		    $_SESSION['username'] = $see['STAFF_NAME'];
		    header('Location: index.php');
		}
		else{
		//echo "P";
		print_r($patients);
		}
	    $_SESSION['doctors'] = $doctor_count['doctors'];
	    $_SESSION['patients'] = $patient_count['patients'];
	    $_SESSION['patients_list'] = $patients;



	?>