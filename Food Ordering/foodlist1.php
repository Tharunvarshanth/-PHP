
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" type="text/css"	href="foodlist.css">
	<script src="app.js"> </script>	
<style>
  div{
  color:#ff0066;
}
.alert{
  background-color:green;
  padding: 5px;
  text-align:center;
  color:white;
		margin:5px 0 15px  0;
		font-size:20px;
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
input{
  width:25px;
}
#d td{  
  height:30px;
}
 </style> 
 
</head>

<body background="2.jpg">
 

<h1 class="hx">Food Bytes</h1>
<script>
  function fdusershow(message){
    var div= document.createElement('div');
    div.classList.add('alert');
    div.appendChild(document.createTextNode(message));
    document.querySelector('.hx').insertAdjacentElement("afterend",div);
}
 </script> 

<?php
session_start();

$xmldata=simplexml_load_file("fooddetails.xml") or die("cannot read");

?>

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

 <script>
	var message="Hi <?php echo $_SESSION['User']; ?> ";
	fdusershow(message);

</script>	
<h2 style="text-align:center"> Choice Your Food</h2>

 <table>
<tr>	 
 <td>
	 <p color:#ff0066;> <?=$xmldata->Food[0]->Name ?> </p>
  <img  src="dosai.jpg" height="100" width="100" style="float: left">	  
  &nbsp  Price: <?=$xmldata->Food[0]->Price ?>  <p>
  &nbsp Quantity <input  type="number" id="q1" name="q1" value='0' style="width:12%"> 
       	 <button type="submit"  name="s1"     onclick="orderincrease('q1')" >+</button>
         <button type="submit"  name="s2"     onclick="orderdecrease('q1')"  >-</button></p> 

</td>
 
<td>
 <p> <?=$xmldata->Food[2]->Name ?></p> 
	<img src="idly.jpg"  height="100" width="100"  style="float: left" >
&nbsp price :<?=$xmldata->Food[2]->Price  ?><p>
&nbsp Quantity <input  type="number" id="q2" name="q2" value='0' style="width:12%  "> 
       	 <button type="submit" name="s3"          onclick="orderincrease('q2')">+</button>
         <button type="submit" name="s4"          onclick="orderdecrease('q2')">-</button></p> 	
</td>
</tr>
<tr>
<td>
		 <p> <?=$xmldata->Food[3]->Name ?></p>
          <img src="paratta.jpg" height="100" width="100" style="float:left">
 &nbsp price:<?=$xmldata->Food[3]->Price  ?> <p>
 &nbsp Quantity <input  type="number" id="q3" name="q3" value='0' style="width:12% "> 
       	 <button  type="submit" name="s5"  onclick="orderincrease('q3')">+</button>
         <button type="submit"  name="s6"        onclick="orderdecrease('q3')">-</button></p> 	
</p>
</td>
<td>

 <p> <?=$xmldata->Food[4]->Name  ?> </p>
  <img src="puttu.jpg" height="100" width="100" style="float:left">
  &nbsp price: <?=$xmldata->Food[4]->Price  ?><p>
  &nbsp Quantity <input  type="number" id="q4" name="q4" value='0' style="width:12%"> 
       	 <button  type="submit" name="s7"  onclick="orderincrease('q4')">+</button>
         <button  type="submit"  name="s8"  onclick="orderdecrease('q4')">-</button>
</p>

</td>
</tr>
</table>
<br><br>

<button class="orderbutton" type="submit" name="proceedorder" onclick="bill()" >Proceed Order</button>

<table id="d"></table>


<script>
	function orderincrease(q){	
    
	document.getElementById(q).value=eval(document.getElementById(q).value+'+1');
}

    function orderdecrease(q){	

	document.getElementById(q).value=eval(document.getElementById(q).value+'-1');
}


      function bill(){
        var Total=0;

      var output ="";
    	if((document.getElementById('q1').value)>0){
    		var amt =document.getElementById('q1').value*50;
           output+="<tr> <td> Masala Dosai "+document.getElementById('q1').value+"pcs  ="+amt +"</td></tr>";
    	      Total+=amt;
    	   }

    	 if((document.getElementById('q2').value)>0){
    		var amt =document.getElementById('q2').value*25;
           output+="<tr> <td> Idly "+document.getElementById('q2').value+"pcs  ="+amt  +"</td></tr>";
    	      Total+=amt;
    	   }  

    	   if((document.getElementById('q3').value)>0){
    		var amt =document.getElementById('q3').value*10;
           output+="<tr> <td> Parotta "+document.getElementById('q3').value+"pcs  ="+amt +"</td></tr>" ;
    	      Total+=amt;
    	   } 

    	   if((document.getElementById('q4').value)>0){
    		var amt =document.getElementById('q4').value*100;
           output+=" <tr> <td> Puttu "+document.getElementById('q4').value+"pcs  ="+amt  +"</td></tr>";
    	      Total+=amt;
    	   }  
    	   output+=" <tr> <td> Total ="+Total+" </td></tr>";
           document.getElementById('d').innerHTML=output;

    }
	</script>








<?php
session_destroy(); 
session_unset(); 
?>



</body>
</html>	
