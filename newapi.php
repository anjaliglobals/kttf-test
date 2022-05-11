<?php
$mysqli = new mysqli("localhost","root","Globals@123","kttf2");

mysqli_query($mysqli,"SET CHARACTER SET 'utf8'");
mysqli_query($mysqli,"SET SESSION collation_connection ='utf8_unicode_ci'");

header('Content-Type: application/json');

// Check connection
if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}
else
{
		
	$sql = "SELECT * FROM m_product";
	$result = $mysqli->query($sql);

	if ($result->num_rows > 0) 
	{
	  // output data of each row
	  while($row = $result->fetch_array()) 
	  {
	    	$return_arr[] = array("id" => $row['id'],
	                   			  "productname" => $row['name'],
	                   			  "description" => $row['short_description'],
	                   			  "termsandconditions" => $row['terms_conditions'],
	                   			);
	  }
		// $return_arr=$result->fetch_array();
	}
		// print_r($result->fetch_array());
	else {
	  echo "0 results";
	}
	echo json_encode($return_arr);
}
// echo "test123";
?>