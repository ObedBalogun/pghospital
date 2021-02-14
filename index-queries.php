<?php
		$db_connection = pg_connect("host=localhost dbname=Hospital user=postgres password=Youknowit2");
		$query = "SELECT \"Staff\" FROM \"Staff\"  WHERE()";
		$result = pg_query($db_connection, $query);
	?>