<?php
	$firstName = $_POST['firstName'];
	$lastName = $_POST['lastName'];
	$gender = $_POST['gender'];
	$order = $_POST['order'];
	$address = $_POST['address'];
	$number = $_POST['number'];

	// Database connection
	$conn = new mysqli('localhost','root','','testregistration123');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into testregistration123(firstName, lastName, gender, order, address, number) values(?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("sssssi", $firstName, $lastName, $gender, $order, $address, $number);
		$execval = $stmt->execute();
		echo $execval;
		echo "Ordering successfully done";
		$stmt->close();
		$conn->close();
	}
?>
