<html>
<head></head>
<title>mysql_login_system</title>
<body>
<style>
    body{
    background-image:url('1.jpg');
}
div.box1{
  width:140px;
  height:140px;
  border:5px solid green;
  padding:20px;
  margin-left:500px;
}
.button{
  background-color:black; 
  border:none;
  color:white;
  padding:10px 10px;
  text-align:center;
  text-decoration:none;
  display:inline-block; 
  cursor:pointer;
}

</style>


<?php
  include("mysql.php");
  

    if(isset($_POST['submit'])){

$name=($_POST['usersignin']);
$pass=($_POST['passsignin']);

  if(empty($name)||empty($pass)){
    echo "fill username or password";
  }
  else{

 $sql="select Name,Student_Number from student where Username='$name' AND Password='$pass' ";
    
$result=mysqli_query($conn,$sql);

$count=mysqli_num_rows($result);

    if($count==1){
      
        $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
        echo "Name:- ".$row['Name']. "  Student_Number:- ".$row['Student_Number'];                    
       }
    else{
        $error="your username or password invalid";
    }
}

 mysqli_close($conn);
         }

?>

<form action="mysql_ums.php" method="post">
<div class="box1">Username <input type="name" name="usersignin"><br><br>
                  Password <input type="password" name="passsignin"><br><br>
                           <button class="button" type="submit"  name="submit">SUBMIT</button>  </div>   
       </form>
<p align="center" style="font-size:80%;"> New user <a href="signup_page.php"> click here </a> to sign up </p>




</body>
</html>