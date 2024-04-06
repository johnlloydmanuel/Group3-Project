<!-- 
    - recryled code format
    - no validation yet (incomplete validation)
-->

<?php
session_start();

if(isset($_POST["btn-login"])){
	
	$email = $_POST["user-email"];
	$password = $_POST["user-pass"];
	
	if(empty($email)){
		echo "
        <script type=\"text/javascript\">
            alert('please input your email');
        </script>
            ";
	} else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        echo "
        <script type=\"text/javascript\">
            alert('please input valid email');
        </script>
            ";
    }
    else if(empty($password)){
		echo "
        <script type=\"text/javascript\">
            alert('please input your password');
        </script>
            ";
	} else if(strlen($password) >= 8){
		echo "
        <script type=\"text/javascript\">
            alert('Password don't match');
        </script>
            ";
	}
    else {
		
		require("dbconn.php");
		
		$sql = "SELECT id,email,passwurd FROM mock_user WHERE email = :email";
		
		$val = array(":email" => $email);
		
		$result = $conn->prepare($sql);
		$result->execute($val);
		
		if($result->rowCount() == 1){
			
			$row = $result->fetch(PDO::FETCH_ASSOC);
			
			if(password_verify($password, $row["passwurd"])){
				
				$_SESSION["id"] = $row["id"];
				
				header("location:testpage.php");
				exit();
			} else {
				echo "Invalid !";
			}
			
		} else {
			echo "Invalid credentials!";
		}
	
	}
	
} else {
	header("location:testpage2.php");
	exit();
}

?>