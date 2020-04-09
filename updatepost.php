<?php
session_start();
?>
<?php 
 $servername = "localhost";
 $username = "root";
 $password = "";
 $dbname = "registration";
 $status=true;
 $conn = new mysqli($servername, $username, $password, $dbname);
 if($status)
	{
	  
	  if ($conn->connect_error) 
		{
		 die("Connection failed: " . $conn->connect_error);
        }
        else{
            $id=$_SESSION['userdetails']['ID'];
            $sql="SELECT id,title,description from post
            inner join register on post.user_id=register.id where user_id=$id";
            $postresult=$conn->query($sql);    
            while($row=$postresult->fetch_assoc())
                   { 
                     echo "<div><h3>".$row["id"]."</h3>";
                     echo "<div><h3>".$row["title"]."</h3>";
                     echo "<p>".$row["description"]."</p><hr></div>";
                  }   
        }        
        $conn->close(); 
    }
    
 
 ?>  