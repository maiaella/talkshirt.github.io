<?php

$connect = "connected";
if($connect == "connected"){

echo "CONNECTED";

$r["re"]="Connected";
print(json_encode($r));

}

else{

echo "NO CONNECTION";

}

?>