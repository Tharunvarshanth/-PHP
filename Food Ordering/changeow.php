<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change user choices</title>
    <link rel="stylesheet" type="text/css"	href="fd.css">
     <script src="app.js">  </script> 
<style>
 *{
     margin:0px;
     padding:0px;
 } 
 body{
     background-image:url('6.jpg');
     background-size:cover;
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
  color:white;
}
.forgotbox{
  font-size:24px;
	margin:10px;
	padding:15px;
	border: 1px solid #e62e00;
  width:300px;
  height:300px;
	top:75px;
    left:550px;
  position: absolute;
  background-image:url('fast-food.jpg');
}
.forgotbox input{
  font-weight:bold;
  width:200px;
  height:25px;
  background:transparent;
}
.forbtn{
  background-color: #666600;
  width:100px;
  height:25px;
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
    
    if(isset($_POST['submit'])){

     $email=$_POST['email'];
     $phno =$_POST['phno'];
     

        if($email=="" && $phno==""){  ?>
         <script> forgotalert();   </script>   <?php   
        }
       elseif(empty($email)){
         $current=file_get_contents('user.json');
         $arr_data=json_decode($current,true);

         for($i=0;$i<count($arr_data);$i++){
             if($arr_data[$i]['phonenumber']==$phno){
               echo "verifiication code will send";
             }
         }
        }       
       elseif(empty($phno)){
        $current=file_get_contents('user.json');
        $arr_data=json_decode($current,true);

        for($i=0;$i<count($arr_data);$i++){
            if($arr_data[$i]['Email']==$email){
              echo "verifiication code will  send to your Mail";
              $msg="Your vertification code 1234";
              mail($email,"Your verification will send");
               
            }
        }
      }

    }

?>

<div class="forgotbox">
<form method="POST">

Email<br> <input type="email" name="email"><br><br>
Phone-Number <br><br> <input type="Number" name="phno" placeholder="0771234567">
  <br><br>          <button  class="forbtn" type="submit" name="submit">Send </button>

</form>

</div>















</body>
</html>