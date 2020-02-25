<html>
<head></head>
<title>Student signup</title>
<body>
<style>
body{
	background-image:url('2.jpg');
}

div.backsignup{
	background-color:"#000000";
}

div.left{ 
  position: absolute;
  left: 300px;
  }
 div.right{
 	position:absolute;
 	right:300px;
 } 
 div.left1{
 	position:absolute;
 	  left:300px;
 }
div.sub{
	position: absolute;
    left: 25px;   
} 
div.size{
	font-size:175%;
} 
div.size1{
	font-size:125%;
}
div.box1{
	width:140px;
	border:5px solid green;
	padding:30px;
	margin-left: 300px;
} 


</style>

<?php
include("mysql.php");
 session_start(); 


  if(isset($_POST['submit'])) {
  	$username1=($_POST['username']);
  	$_SESSION["user"]=$username1;
     
  	if(empty($username1)){
  		echo "enter username";
  	}
  	$password=$_POST['password'];

  	if(empty($password)){
  		echo "enter password";
  	}
    if(!empty($username1) && !empty($password)){
            
    	$sql="select Name,Student_number from student where Username='$username1' AND Password='$password' ";    	
    	$result=mysqli_query($conn,$sql);
        $count=mysqli_num_rows($result);
        
    	if($count==0){
       
    		$name=$_POST['name'];  $sn=$_POST['sn'];

            $stmt=$conn->prepare("insert into student (Username,Password,Name,Student_number) values (?,?,?,?)");
            $stmt->bind_param("ssss",$username1,$password,$name,$sn);        
            $stmt->execute();
             $stmt->close();

             $stmt1=$conn->prepare("insert into student_course (Username) values (?)");
             $stmt1->bind_param("s",$username1);  $stmt1->execute();  $stmt1->close();

            echo "New records created successfully";
    	}
    	else {
    		echo "UserName  " .$username1 ."is already exist";
    	}
    }
}

       
    if(isset($_POST['submit1'])){
    	
      $oo="no"; $da="no"; $d_b="no";

      if(!empty($_POST['oo'])){
      	$oo="yes"; 
      }
      if(!empty($_POST['ds'])){
      	$da="yes"; 
      }
      if(!empty($_POST['da'])){
      	$d_b="yes";
      }
       
       echo $_SESSION["user"];
       $username1=$_SESSION["user"];
          $sql="update student_course  set object='$oo',Datastruct='$da',Databasems='$d_b' where='$username1'";
          if(mysqli_query($conn,$sql)){
          	echo "record added";
          }
          else   echo "Could not update record: ". mysqli_error($conn);
   
   }
    $conn->close();    

?>

<h2 align="center" style="font-size:300%;"	>   University Management System</h2>


<div class="left1"> <h4 style="font-size:150%;">Profile registration</h4></div> 
<div class="right"> <h4 style="font-size:150%;">Course registration</h4>

<form action=""  method="post">
  
<table>
	<tr>
		<th>Subject </th>
		<th>Status  </th>  </tr>
	
	  <tr>  <td style="color:white">ObjectOriended  </td> <td> <input type="checkbox" name="oo"> </td>  </tr>
	  <tr>  <td style="color:white">DataStrutures   </td> <td> <input type="checkbox" name="ds"> </td>  </tr>
	  <tr>  <td style="color:white">Database        </td> <td> <input type="checkbox" name="da"> </td>  </tr>
	  
	   <button type="submit"  name="submit1"> Submit</button>
</table>	    	
</form>
</div> <br><br><br>

<p style="color:white"> <img src="3.png" align="left">
 
<div class="box1">     <form action=""  method="post">
<div class="size">     <font style="color:white">   Username </font> </p>  <input type="text"  name="username"> 
                    <p><font style="color:white">  Password </font> </p> <input type="password"	name="password">     </div>  <br>

<div class="size1">   <font style="color:white"> Name   </font>        <br>    <input type="text"  name="name"> <br>
                      <font style="color:white"> Student Number</font> <br>    <input type="text"  name="sn"  >    </div> <br>
                                                                               <button type="submit"    name="submit">SIGNUP </button>  
            </form>
</div>



</body>
</html>