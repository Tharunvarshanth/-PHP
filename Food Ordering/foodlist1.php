
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css"	href="fd.css">	
<style>
  div{
  color:#ff0066;
}
 </style> 
</head>
<title>Food list</title>
<body background="2.jpg">
 
<div> 
<h1 class="hx">Food Bytes</h1>   
<?php
$xmldata=simplexml_load_file("fooddetails.xml") or die("cannot read");
 
foreach($xmldata->children() as $list ){
      

      /*  echo $list['category']."  ";
      echo $list->Name."   ";
      echo $list->Price."<br>";
      */
    }


?>
	
 
<h2> Choice Your Food</h2>
<table>
<tr> 
	
 <td><p color:#ff0066;> <?=$xmldata->Food[0]->Name ?>  </p>
  <img  src="dosai.jpg" height="100" width="100" style="float: left">	  
        Price: <?=$xmldata->Food[0]->Price ?>  <p>
Quantity <input  type="number" id="q1" name="q1" value='0' style="width:8%"> 
       	 <button type="submit"  name="s1"     onclick="orderincrease('q1')" >+</button>
         <button type="submit"  name="s2"     onclick="orderdecrease('q1')"  >-</button></p> 
</td>

 
<td> <p> <?=$xmldata->Food[2]->Name ?></p> 
	<img src="idly.jpg"  height="100" width="100"  style="float: left" >
price :<?=$xmldata->Food[2]->Price  ?><p>
Quantity <input  type="number" id="q2" name="q2" value='0' style="width:8%  "> 
       	 <button type="submit" name="s3"          onclick="orderincrease('q2')">+</button>
         <button type="submit" name="s4"          onclick="orderdecrease('q2')">-</button></p> 	
</td>
</tr>
<tr></tr>
<tr> 
	<td> <p> <?=$xmldata->Food[3]->Name ?></p>
          <img src="paratta.jpg" height="100" width="100" style="float:left">
price:<?=$xmldata->Food[3]->Price  ?> <p>
Quantity <input  type="number" id="q3" name="q3" value='0' style="width:8% "> 
       	 <button  type="submit" name="s5"  onclick="orderincrease('q3')">+</button>
         <button type="submit"  name="s6"        onclick="orderdecrease('q3')">-</button></p> 	
</p>

 <td><p> <?=$xmldata->Food[4]->Name  ?> </p>
  <img src="puttu.jpg" height="100" width="100" style="float:left">
price: <?=$xmldata->Food[4]->Price  ?><p>
Quantity <input  type="number" id="q4" name="q4" value='0' style="width:8%"> 
       	 <button  type="submit" name="s7"  onclick="orderincrease('q4')">+</button>
         <button  type="submit"  name="s8"  onclick="orderdecrease('q4')">-</button>
</p>
</td>
</tr>
</table>
<p id="d"></p>
</div>
<button class="orderbutton" type="submit" name="proceddorder" onclick="bill()" >Proceed Order</button>



<script>
	function orderincrease(q){	
    
	document.getElementById(q).value=eval(document.getElementById(q).value+'+1');
}

    function orderdecrease(q){	

	document.getElementById(q).value=eval(document.getElementById(q).value+'-1');
}


      function bill(){
        var Total=0;

      var output ="<table> ";
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
    	   output+=" <tr> <td> Total ="+Total+"</table>";
           document.getElementById('d').innerHTML=output;

    }
	</script>














</body>
</html>	
