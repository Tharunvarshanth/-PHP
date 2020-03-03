<html>
<head>
<link rel="stylesheet" type="text/css"	href="fd.css">
<style>
	body{
	background-image:url("1.jpg");	
	
}
</style>

</head>
<title>FOOD ORDERING</title>
<BODY>
	<h1 class="hx">Food Bytes</h1>  
<?php
  if(isset($_POST['submit'])){
    
   $jsondata=file_get_contents('user.json');
   $array=json_decode($jsondata,true); //get by array
       
      for($i=0;$i<count($array);$i++){
        
        if(($array[$i]["username"]==$_POST['userin'])&&($array[$i]["password"]==$_POST['passin'])){
             header("Location:http://localhost/Food%20Ordering/foodlist1.php");
        }
      }
    

  }
?>

<div class="loginbox" >
<form method="POST" >  
<b class="size">  Username </b><br><br>
           <input type="name"     name="userin"><br><br>
<b class="size">  Password  </b>   <br><br>      
           <input type="password" name="passin"><br><br>
     <div class="bu">      <button type="submit"  name="submit">Signin</button></div>
         
</form>
<p style="font-size:12" >New user <a href="singup.php" style="text-decoration: none">click here</a> for registration</p>
</div>






















</BODY>
</html>	