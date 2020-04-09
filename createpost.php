<?php
session_start();
?>
<?php
      $titleerr=$descerr="";
      $title=$desc="";
      $status=true;
      $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "registration";
   $conn = new mysqli($servername, $username, $password, $dbname);
      if(!empty($_POST))
 {
    if(empty($_POST['title'])) {
		$status=false;
		$titleerr = "**Title Required";
	} 
	else {
		$title =$_POST['title'];
	}

	if(empty($_POST['desc'])) {
		$status=false;
		$descerr = "**Describe";
	} 
	else {
		$desc =$_POST['desc'];
    }
    
	if($status)
	{
	  
	  if ($conn->connect_error) 
		{
		 die("Connection failed: " . $conn->connect_error);
        }
        else{
            $id=$_SESSION['userdetails']['ID'];
            $sql="INSERT into post( TITLE  ,DESCRIPTION,user_id) 
                   values('$title','$desc','$id')";
                   
            $result=$conn->query($sql);
            header ('location:profile.php');
        }        
        $conn->close(); 
    }
    
}  
 ?>  
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Merriweather|Montserrat|Sacramento" rel="stylesheet">
    <script src="Js/createpost.js"></script>
    <link rel="stylesheet" href="Css/createpost.css">
    <title>Create new blogs</title>
</head>
<body>
    <div class="bg-image">
        <h2>Start an Amazing Blog In Minutes.</h2>
        
        <fieldset>
            <legend>Create a new Blog</legend>
            <form action="<?=$_SERVER['PHP_SELF'];?>" method ="post"onsubmit="return validateform()" >
            <label for="title">Title:</label><br><br>
            <input type="text" name="title" id="title"value="<?php echo $title;?>"onblur="validate('title','etitle')"><br>
            <span id="etitle" style="display: none;">*Title Required</span>
            <p><?php echo $titleerr;?></p>

            <label for="desc">Description:</label><br><br>
            <textarea name="desc" id="desc" cols="75" rows="10"value="<?php echo $desc;?>"onblur="validate('desc','edesc')"></textarea><br>
            <span id="edesc" style="display: none;">*Description Required</span>
            <p><?php echo $descerr;?></p>
        
            <input type="submit" value="Create post">
            </form>
        </fieldset>
        
</div>     
</body>
</html>
