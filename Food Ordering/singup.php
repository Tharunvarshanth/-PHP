<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>

  <style>
*{
  margin:0px;padding:0px;
  }
 body{
  background:url("3.jpg");
  background-size:cover;
 }
 .signbtn{
	width:100px;
  background-color: #ff944d;
  color:yellow;
  height:25px;
}

  input{
    width:240px;
  }
  div{
    color:#800000;
    font-weight: bold;
  }
.signupbox{
  animation-name: example;
	animation-duration :1s;
  border: 1px solid black;
  background-image:url('7.jpg');
      position:absolute;
  top:100px; 
  left:500px;
  padding-top: 50px;
  padding-right: 30px;
  padding-bottom: 50px;
  padding-left: 80px;
}
@keyframes example{
	from { left:0 }
	to { left:500px; }
}
.signupbox input{
	height:20px;
	color:white ;
	background: transparent;
	
}
.hx{
	text-align: center;
	font-size: 40px;
	color:#662200;
  background-color: #e6e6e6;
  opacity:0.9;
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
}

 </style> 
</head>
<body>
  
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


<?php
session_start();

       if(isset($_POST['submit'])){
  
    $current=file_get_contents('user.json');
    $arr_data=json_decode($current,true);

	$username=$_POST['userin'];
 	$password=$_POST['passin'];
        $phno=$_POST['phno'];
        $email=$_POST['email'];
  

   $count=0;
   for($i=0;$i<count($arr_data);$i++){              
      if($phno!=$arr_data[$i]['phonenumber']){
        $count++;
      }}


   if(($username)=="" ||($password)=="" ||($phno)==""  || ($email)==""){  
       ?> <script> var div= document.createElement('div');
                       div.classList.add('alert');
                       div.appendChild(document.createTextNode('Fill the Fields'));
                       document.querySelector('.hx').insertAdjacentElement("afterend",div);
         </script>;  <?php 
  
   // header("Location:http://localhost/Food%20Ordering/singup.php"); 
    }

   else if(strlen(strval($phno))<10){
    ?> <script> var div= document.createElement('div');
    div.classList.add('alert');
    div.appendChild(document.createTextNode('Phone Number Not Valid'));
    document.querySelector('.hx').insertAdjacentElement("afterend",div);
</script>;  <?php 
   // header("Location:http://localhost/Food%20Ordering/singup.php");
  } 
      elseif($count==count($arr_data)){
    $users= array('username' => $username,'password'=>$password,'phonenumber'=>$phno,'Email'=>$email);   
             $_SESSION["User"]=$username;
             $_SESSION["Password"]=$password;
    $arr_data[]=$users;
    $final=json_encode($arr_data);
    file_put_contents('user.json', $final); 
        
   
    header("Location:http://localhost/Food%20Ordering/foodlist1.php");
           }
  
     else{
      ?> <script> var div= document.createElement('div');
      div.classList.add('alert');
      div.appendChild(document.createTextNode('User Already Exists'));
      document.querySelector('.hx').insertAdjacentElement("afterend",div);
       </script>  <?php 
     }

}

?>


<br>

<div class="signupbox">
<h2 style="color:white;text-align:center;">Customers Registration<h2>
<br>

<form method="POST" >  
<b style="font-size:25px ">  Username </b><br>
           <input type="name"     name="userin"><br><br>
<b style="font-size:25px ">  Password  </b>   <br>      
           <input type="password" id="ps" name="passin" ><br><br>

<b style="font-size:25px">  Phone Number</b>  <br>   <input type="Number"  name="phno"><br><br>
<b style="font-size:25px">  Email Address</b> <br>   <input type="email" name="email"><br><br><br>
           <button class="signbtn" type="submit"  name="submit"><b>Signup</b></button>

</form>
</div>





</BODY>
</html>	