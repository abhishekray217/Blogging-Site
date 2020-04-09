<?php
session_start();
$servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "registration";
      $conn = new mysqli($servername, $username, $password, $dbname);
      if($_SESSION['loggedin']!==true){
          header ('location:Registration.php');
      }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Merriweather|Montserrat|Sacramento" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="Css/portfolio.css">
    <title>Portfolio</title>
</head>

<body>
    <div class="bg">
        <div class="navigation">
            <ul >
                <li><a href="profile.php">Home</a></li>
                <li><a href="createpost.php">Create post</a></li>
                <li><a href="registration.php">Signup</a></li>
                <li><a href="login.php">Login</a></li>
            </ul>
        </div>
        <div class="left">
        <h1>Welcome</h1>
                <?php
                echo "<h2>".$_SESSION['userdetails']['FIRST_NAME']." ".$_SESSION['userdetails']['LAST_NAME']."</h2>"
                ?>
            <div class="picimg">
                <img src="<?php echo $_SESSION['userdetails']['IMAGES']  ?>" alt="Profile pic">
            </div>
            <div class="about">
                
                <label>User name: </label>
                <?php
                echo "<p>".$_SESSION['userdetails']['USER_NAME']."</p><br>";
                ?>

                <label>Email: </label>
                <?php
                echo "<p>".$_SESSION['userdetails']['EMAIL']."</p><br>";
                ?>
                <label>Phone No: </label>
                <?php
                echo "<p>".$_SESSION['userdetails']['PHONE_NO']."</p><br>";
                ?>
                <ul> <li><a style="margin-left:10%;padding:5px;font-size: 1rem;" href="registration.php">Update</a></li>
                <li><a class="logout" style="margin-left:36%;padding:5px;font-size: 1rem;" href="logout.php">Logout</a></li></ul>
                
            </div>
            <hr>
            <h3>Contact Us</h3>
            <ul>
                <li>
                    <a class="fa fa-facebook" href=" https://www.facebook.com/abhishek.ray.7771 "> Facebook</a></li>
                <li>
                    <a class="fa fa-twitter" href="https://twitter.com/abhishe15936339 ">Twitter</a></li>
                <li>
                    <a class="fa fa-linkedin" href=" https://www.facebook.com/abhishek.ray.7771 "> Linkedin</a></li>

            </ul>


        </div>
        <div class="right ">
            <h3>"If you want to be a writer, you must do two things above all: Read a lot and write a lot”</h3>
            <p>
                Newbie bloggers or people just dreaming of becoming a blogger often face the problem that they don’t feel that they are writers. They do not think that their writing is good enough.    
                But we have all started out as beginners. We all jumped right in without being expert writers – most bloggers are not born Pulitzer Prize-winning writers.
                But your writing can develop. You can learn to write better. And the best way to learn writing is to read a lot and to write a lot.<br>
            </p>
            <br>
            <br>
            <h1 style="text-align:left;">My blogs..</h1>
            <?php          
             $id=$_SESSION['userdetails']['ID'];
             $sql="SELECT poid,title,description from post
                    inner join register on post.user_id=register.id where user_id=$id";
             $postresult=$conn->query($sql);
             while($row=$postresult->fetch_assoc())
              { echo "<div><h3>".$row["poid"]."</h3>";
                echo "<div><h3>".$row["title"]."</h3>";
                echo "<p>".$row["description"]."</p><hr>";
                // echo  "<li><a >Update</a></li><hr></div>";
             }         
      $conn->close();     
    ?>
        </div>
    </div>
</body>

</html>