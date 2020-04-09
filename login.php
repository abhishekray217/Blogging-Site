<?php
session_start();

?>
<?php
$email=$pass="";
$epass=$eemail="";
$status=true;
if(!empty($_POST))
 {
    if(empty($_POST['email'])) {
		$status=false;
		$eemail = "Email Required";
	} 
	else {
		$email =$_POST['email'];
	}

	if(empty($_POST['pass'])) {
		$status=false;
		$epass = "Password Required";
	} 
	else {
		$pass =$_POST['pass'];
		$pass=sha1($pass);
	}

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "registration";

	if($status)
	{
	  $conn = new mysqli($servername, $username, $password, $dbname);
	  if ($conn->connect_error) 
		{
		 die("Connection failed: " . $conn->connect_error);
	    }
	  else
		{
	    $sql="SELECT ID,FIRST_NAME,LAST_NAME,USER_NAME,EMAIL,PHONE_NO,IMAGES
		  from register where EMAIL='$email'and PASSWORD='$pass'";
	    $result=$conn->query($sql);
	    if($result->num_rows>0)
	   {
		   $record=$result->fetch_assoc();
		   echo $record['ID']."<br>";
		   echo $record['FIRST_NAME']."<br>";
		   echo $record['LAST_NAME']."<br>";
		   echo $record['EMAIL']."<br>";
		   $_SESSION['loggedin']=true;
		   $_SESSION['userdetails']=$record;
		   header('location:profile.php');
		//    converting the result into associative array
		   echo "Login Sucessful";
	   }
		else
		{
		echo "Invalid Email or Password " . $sql . "<br>" . $conn->error;
	    }
      }
      $conn->close();
  }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="Css/logcs.css">
    <script type="text/javascript" src="js/logjs.js">
    </script>
    <title>Login Form</title>
</head>

<body>
    <h1>Login to create a new post.</h1>
    <h3>Are you a member?</h3>
    <p><a href="registration.php">No</a></p>
    <fieldset>
        <legend>
            <h2>Login</h2>
        </legend>
        <form onsubmit="return validat()" action="#" method="post">
            <div class="log">

                <div class="row"><label for="email">E-mail:</label>
                    <input type="email" name="email" value="<?php echo $email;?>" id="email" onblur="validate('email','eemail')" placeholder="test@gmail.com">
                </div>
                <span id="eemail" style="display: none;">*required</span>
                <p><?php echo $eemail;?></p>

                <div class="row"><label for="">Password (8 characters minimum):</label>
                    <input type="password" id="pass" value="<?php echo $pass;?>" name="pass" onblur="validate('pass','epass')"></div>
                <span id="epass" style="display: none;">*required</span>
                <p><?php echo $epass;?></p>

                <input type="submit" name="submit" value="Login">
            </div>

        </form>
    </fieldset>

</body>

</html>