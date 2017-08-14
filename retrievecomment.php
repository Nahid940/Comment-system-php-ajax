<?php
	$con=mysqli_connect("localhost","root","","comment");
	$query="select * from comment";
	$res=mysqli_query($con,$query);
	$result=array();
	
	while($row=mysqli_fetch_array($res)){
		array_push($result,array('name' => $row[0],'comment'=>$row[1]));
	}
		echo json_encode(array("result"=>$result));
	
?>
				