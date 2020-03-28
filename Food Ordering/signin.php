<html>
<head>
<link rel="stylesheet" type="text/css"	href="fd.css">
<script src="app.js"></script>
<style>
*{
  margin:0px;
  padding:0px;
  overflow-x:hidden;
}
	body{
	background-image:url("1.jpg");	
	
}
ul{
  float:right;     
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #333;
    list-style-type: none;
    width:200px;
}
ul li{
  display:block;
  position: relative;
}
ul li a{
  text-decoration:none;
  color:white;
  font-size:20px;
  padding:5px;
  display:block;
}
ul li ul{
  display:none;
}
ul li a:hover{
  background-color:red;
}
ul li:hover > ul{
  display:block;
}
.alert{
  background-color:red;
  padding: 5px;
  margin:5px 0 15px  0;
  color:white;
}
</style>

</head>
<title>FOOD ORDERING</title>
<BODY>
	<h1 class="hx">Food Bytes</h1>

<div  class="menu">
<ul>
<li><a href="#">Menu</a></li>

<li ><a href="singup.php">login</a>
<ul>
<li>  <a href="signin.php">Signin</a></li>
<li>  <a href="changeow.php">ChangeUsersetting</a></li>
</ul>
</li>
</ul>
</div>    


<div class="loginbox" >
<form method="POST" >  
<b class="size">  Username </b><br><br>
           <input type="name"     name="userin"><br><br>
<b class="size">  Password  </b>   <br><br>      
           <input type="password" name="passin"><br><br>
     <div class="bu">      <button type="submit"  name="submit">Signin</button></div>
         
</form>
<p style="font-size:14" >New user <a href="singup.php" style="text-decoration: none">click here</a> for registration</p>
<p style="font-size:14" >Forgot password <a href="changepw.php" style="text-decoration: none">click here</a> for reset password</p>
</div>

<?php
session_start();

  if(isset($_POST['submit'])){
    
   $jsondata=file_get_contents('user.json');
   $array=json_decode($jsondata,true); //get by array
       $ver=0;
      for($i=0;$i<count($array);$i++){
        
        if(($array[$i]["username"]==$_POST['userin'])&&($array[$i]["password"]==$_POST['passin'])){
             $_SESSION["User"]      =$_POST['userin'];
             $_SESSION["Password"]  =$_POST['passin'];     $ver=1;
             header("Location:http://localhost/Food%20Ordering/foodlist1.php");
        }
      }
        if($ver!=1){ ?>
    <script> 
      signinalert();
    </script>
    <?php }
    

  }
?>




















</BODY>
</html>	