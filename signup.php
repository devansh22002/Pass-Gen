<?php
$insert=false;
if(isset($_POST['username'])){
  //Set connection variables
    $server="devansh.mysql.polardb.ap-south-1.rds.aliyuncs.com:3306";
    $username="devanshdb1";
    $password="Dev@1234";
 
 //create database connection
 $con = mysqli_connect($server,$username,$password);
 
 
 //check for connection success
 if(!$con){
     die("connection to this database failed due to".mysqli_connect_error());
 }
//  echo"success connecting to the DB";
 
//collect post variables
$username1=$_POST['username'];
$password1=$_POST['password'];
 
$sql= "  INSERT INTO devanshdb1.user1 (username1,password1) VALUES 
('$username1', '$password1');";
 
 echo $sql;
 
//execute query
if($con->query($sql)==true){
    // echo"Successfully inserted";
 
    //flag for successful insertion
    $insert=true;
}
else{
    
    echo"ERROR: $sql <br> $con->error";
}
 
//close the database connection
$con->close();
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Registration Page</title>
	<style>
		body {
			background-color: #f2f2f2;
			background-image: linear-gradient(rgb(119, 119, 231),pink,rgb(119, 119, 231));
		}

		form {
			background-color: #333;
			color: #fff;
			padding: 20px;
			width: 400px;
			margin: 0 auto;
			border-radius: 5px;
			margin-top: 50px;
			font-family: Arial, sans-serif;
		}

		input[type=text], input[type=password], input[type=email] {
			width: 100%;
			padding: 12px 20px;
			margin: 8px 0;
			display: inline-block;
			border: 1px solid #ccc;
			border-radius: 4px;
			box-sizing: border-box;
		}

		button {
			background-color: #4CAF50;
			color: white;
			padding: 14px 20px;
			margin: 8px 0;
			border: none;
			border-radius: 4px;
			cursor: pointer;
			width: 100%;
			font-size: 16px;
		}

		button:hover {
			background-color: #45a049;
		}

		.container {
			padding: 16px;
		}

		h2 {
			text-align: center;
			margin-top: 0;
		}

		p {
			text-align: center;
			font-size: 18px;
			margin-top: 20px;
		}
	</style>
	<script>
		function validateForm() {
			var username = document.forms["signup"]["username"].value;
			var password = document.forms["signup"]["password"].value;
			var confirm_password = document.forms["signup"]["confirm_password"].value;
			if (username == "" || password == "" || confirm_password == "") {
				alert("Please fill out all fields.");
				return false;
			}
			if (password != confirm_password) {
				alert("Passwords do not match.");
				return false;
			}
		}
	</script>
</head>
<body>
	<form name="Signup" action="signup.php" method="post" onsubmit="return validate()">
		<h2>Sign Up</h2>

		<div class="container">
			<label for="username"><b>Username</b></label>
			<input type="text" placeholder="Enter Username" name="username" required>

			<label for="password"><b>Password</b></label>
			<input type="password" placeholder="Enter Password" name="password" required>



			<button type="submit">Register</button>
			<?php
if($insert==true){
        echo"<p class='submitMsg'>Thanks </p>";
        }
        ?>
		</div>

		<p>Already have an account? <a href="login.html">Login here</a>.</p>
	</form>
</body>
</html>
