
<?php

$xmldata=simplexml_load_file('fooddetails.xml') or die("error");

foreach($xmldata->children() as $list){
    echo $list->Name;
}

?>
