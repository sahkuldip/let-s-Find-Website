form.php
<!DOCTYPE html>

<html>

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Form Registration</title>

</head>

<body>

    <h2>Client Side Form Validation</h2>

    <form method="POST" action="./formSubmit.php">

        <div>

            <label for="name">Please enter your name: </label>

            <input type="text" name="name" id="name">

        </div>

        <div>

            <label for="address">Please enter your address: </label>

            <input type="text" name="address" id="address">

        </div>

        <div>

            <label for="phoneNumber">Please enter your PhoneNumber: </label>

            <input type="text" name="phoneNumber" id="PhoneNumber">

        </div>

        <div>

            <label for="department">Please enter your Department: </label>

            <input type="text" name="department" id="department">

        </div>

        <div>

            <label for="salary">Please enter your Salary: </label>

            <input type="text" name="salary" id="salary">

        </div>

        <div>

            <input type="submit" name="signup" value="Signup">

        </div>

    </form>

</body>

</html>



//formSubmit.php

<?php

$servername = "localhost";

$username = "root";

$password = "";

$dbname = "webtech";

$tablename = "users";



if($_SERVER["REQUEST_METHOD"] == "POST"){

	$name = $_POST['name'];

	$address = $_POST['address'];

        $phoneNumber = $_POST['phoneNumber'];

	$department = $_POST['department'];

	$salary = $_POST['salary'];

    

	//connect to database

	$conn = mysqli_connect($servername, $username, $password) or die(mysql_error()); //Connect to server

	mysqli_select_db($conn, $dbname) or die("Cannot connect to database"); //Connect to database

    

    // Insert the values into database

    mysqli_query($conn, "INSERT INTO ".$tablename."(name, address, phoneNumber, department, salary) VALUES ('$name','$address', '$phoneNumber', '$department', '$salary')");    

	Print '<script>alert("Congrats! Your Submission is Successfully Registered!");</script>'; 

	Print '<script>window.location.assign("display.php");</script>'; 

}

?>



//display.php

<?php

    $db = "webtech";

    $conn = mysqli_connect("localhost", "root","") or die(mysql_error());

    mysqli_select_db($conn, $db) or die("Cannot connect to database");

    $query = mysqli_query($conn, "Select * from  users"); 

?>

<html>

<head>

    <title>Displaying Data</title>

</head>

<body>

<table border="1">

	<tr>

		<th>Name</th>

		<th>Address</th>

		<th>Phone Number</th>

		<th>Department</th>

		<th>Salary</th>

	</tr>

<?php 

     while($row = mysqli_fetch_array($query)) 

	{

?>		  

	<tr>

		<th><?php echo $row['name']; ?></th>

		<th><?php echo $row['address']; ?></th>

		<th><?php echo $row['phoneNumber']; ?></th>

		<th><?php echo $row['department']; ?></th>

		<th><?php echo $row['salary']; ?></th>

	</tr>

	<?php } ?>

</table>

<a href="index.html">Go back to Register New Users</a>

</body>

</html>

