
    <?php
    $str = "Tous ces instants seront perdus dans le temps comme les larmes sous la pluie.";

    $voyelles = "";

    $voyelles_list = "aeiouyAEIOUY";

    for ($i = 0; $i < strlen($str); $i++) {

        if (strpos($voyelles_list, $str[$i]) !== false) {
            
            $voyelles .= $str[$i];
        }
    }
    echo $voyelles;
    ?>
