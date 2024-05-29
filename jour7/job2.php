<?php
function bonjour($jour){
    if($jour ){
    echo "bonjour";
    }else{
    echo "bonsoir";
}
}

bonjour(true);
echo "<br>";
bonjour(false);
echo "<br>";

?>