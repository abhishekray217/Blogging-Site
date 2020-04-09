<?php
session_start();
?>
<?php
 $fname=$lname=$uname=$email=$phone=$pass1=$pass2="";
 $efname=$elname=$euname=$eemail=$ephone=$epass1=$epass2=$epass3=$fileErr="";
 $status=true;
 $servername = "localhost";
 $username = "root";
 $password = "";
 $dbname = "registration";
 if(!empty($_POST))
 {  
     if(empty($_POST['fname'])) {
        $efname = "First Name Required";
        $status=false;
    }   
      else {
         $fname =$_POST['fname'];
    }    
     if(empty($_POST['lname'])) {
        $status=false;
        $elname = "Last Name Required";
    } 
     else {
        $lname =$_POST['lname'];
    }
     if(empty($_POST['uname'])) {
        $status=false;
        $euname = "User Name Required";
    } 
     else {
        $uname =$_POST['uname'];
    }
     if(empty($_POST['email'])) {
        $status=false;
        $eemail = "Email Required";
    }
     else {
        $email =$_POST['email'];
    }
     if(empty($_POST['phone'])) {
        $status=false;
        $ephone = "Phone-no Required";
    }
     else {
        $phone =$_POST['phone'];
    }
     if(empty($_POST['pass1'])) {
        $status=false;
        $epass1 = "Password Required";
    } 
     else {
        $pass1 =$_POST['pass1'];
        $pass1=sha1($pass1);
    }
    if(empty($_POST['pass2'])) {
        $status=false;
        $epass2 = "Re-Enter password";
    } 
     else {
        $pass2 =$_POST['pass2'];
        $pass2=sha1($pass2);
    }
    if($pass1==$pass2)
    {   
        
        $epass3="Password Matching.";
        
    }
    else{
        $status=false;
        $epass3="Password Not-Matching"; 
    }
    
// File related code
$target_dir="Uploads/";
	$target_file=$target_dir.basename($_FILES["image"]["name"]);
	$filestatus=true;
	// get the image extension;
	$imageFileType=strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
if($imageFileType!="jpg" && $imageFileType!="png"){
    $fileErr="Only Jpg and Png files allowed";
    $filestatus=false;
    $status=false;
}
if($filestatus){
    if(move_uploaded_file($_FILES["image"]["tmp_name"],$target_file)){
        $status=true;
    }
    else {
        $fileErr= "Issues in file upload";
        $status = false;
    }
}





    if($status){
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
    
        else
        {
             $sql = "INSERT INTO register (FIRST_NAME, LAST_NAME,IMAGES, USER_NAME, EMAIL, PHONE_NO, PASSWORD)
            VALUES ('$fname', '$lname','$target_file','$uname', '$email','$phone', '$pass1')";
            echo $sql;
            if ($conn->query($sql)) {
                header('location:login.php');
                echo "New record created successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
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
    <link rel="stylesheet" href="Css/regcss.css">
    <script src="Js/regjs.js"></script>
    <title>Registration Form</title>

</head>

<body >

    <h1>Welcome to blogging world.</h1>
    <h3>Already a member?</h3>
    <p id="po"><a href="login.php">Yes</a></p>
    <fieldset>
        <legend>
            <h2>Signup</h2>
        </legend>
        <form action="<?=$_SERVER['PHP_SELF'];?>" onsubmit="return validateform()" method="post" enctype="multipart/form-data">
            <div class="log">

                <div class="row"><label for="fname">First Name:</label>
                    <input type="text" name="fname" value="<?php echo $fname;?>" id="fname" placeholder="First name" onblur="validate('fname','efname')" autofocus></div>
                <span id="efname" style="display: none;">*required</span>
                <p><?php echo $efname;?></p>
                
                <div class="row"><label for="lname">Last Name:</label>
                    <input type="text" name="lname" value="<?php echo $lname;?>" id="lname" placeholder="Last name" onblur="validate('lname','elname')"></div>
                <span id="elname" style="display: none;">*required</span>
                <p><?php echo $elname;?></p>

                <div class="row"><label for="image">Profile Image:</label>
                    <input type="file" name="image"  id="image" ></div>
                <p><?php echo $fileErr;?></p>

                <div class="row"><label for="uname">User Name:</label>
                    <input type="text" name="uname" value="<?php echo $uname;?>" id="uname" placeholder="User name" onblur="validate('uname','euname')"></div>
                <span id="euname" style="display: none;">*required</span>
                <p><?php echo $euname;?></p>

                <div class="row"><label for="email">E-mail</label>
                    <input type="email" name="email" value="<?php echo $email;?>" id="email" placeholder="test@gmail.com" onblur="validate('email','eemail')"></div>
                <span id="eemail" style="display: none;">*required</span>
                <p><?php echo $eemail;?></p>

                <div class="row"><label for="phone">Phone number:</label>
                    <input type="tel" name="phone" value="<?php echo $phone;?>" id="phone" placeholder="phone" onblur="validate('phone','ephone')"></div>
                <span id="ephone" style="display: none;">*required</span>
                <p><?php echo $ephone;?></p>

                <div class="row"><label for="">Password (8 characters minimum):</label>
                    <input type="password" name="pass1" value="<?php echo $pass1;?>" id="pass1"  minlength="8" onblur="validate('pass1','epass1')"></div>
                <span id="epass1" style="display: none;">*required</span>
                <p><?php echo $epass1;?></p>

                <div class="row"> <label for="">Re-Enter Password</label>
                    <input type="password" name="pass2" value="<?php echo $pass2;?>" id="pass2"  onchange="validatepass('pass1','pass2','epass3')" onblur="validate('pass2','epass2')" ></div>
                    <span id="epass2" style="display: none;">*required</span>
                    <p id="epass3" style="display:none;"></p>
                    <p><?php echo $epass2;?></p>
                    <p><?php echo $epass3;?></p>

                    <div class="row"><input type="reset" name="" value="Reset"></div>
                    <div class="row"><input type="submit"  name="submit" value="Signup"></div>
                </div>

        </form>
    </fieldset>


</body>

</html>
