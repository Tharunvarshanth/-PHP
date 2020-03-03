<html>
<head>
</head>
<title>
</title>
<body>

<?php

$xmldata=simplexml_load_file("fooddetails.xml") or die("cannot read");
$i=0;
echo $xmldata->Food[0]->Name;
    foreach($xmldata->children() as $list ){

        echo $list['category']."  ";
    	echo $list->Name."   ";
    	echo $list->Price."<br>";
    	$i++;
    }






?>


































</body>
</html>	
