<html>
<head>
 <style>
  input{
    width:240px;
  }
  div{
    color:#B8860B;
  }
.signupbox{
  border: 1px solid black;
  background-color: #1f2e2e;  
  position:absolute;
  top:75px; 
  left:450px;
  padding-top: 50px;
  padding-right: 30px;
  padding-bottom: 50px;
  padding-left: 80px;
}

 </style> 
</head>
<title>Customer-Registration</title>
<BODY background="3.jpg">




<?php

if(isset($_POST['submit'])){
    $current=file_get_contents('user.json');
    $arr_data=json_decode($current,true);

	$username=$_POST['userin'];
 	$password=$_POST['passin'];
    $phno    =$_POST['phno'];
 $users= array('username' => $username,'password'=>$password,'phonenumber'=>$phno );   
    
    $arr_data[]=$users;
    $final=json_encode($arr_data);
    file_put_contents('user.json', $final); 

 

}
?>
<div class="signupbox">
<form method="POST" >  
<b style="font-size:25px ">  Username </b><br>
           <input type="name"     name="userin"><br><br>
<b style="font-size:25px ">  Password  </b>   <br>      
           <input type="password" name="passin"><br><br>

<b style="font-size:25px ">  Phone Number</b>  <br>   <input type="Number"  name="phno"><br><br><br>

           <button type="submit"  name="submit">Signup</button>

</form>
</div>





</BODY>
</html>	