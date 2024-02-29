<?php
header('Content-type: text/plain');

function countDuplicate($data){
    $count = [];
    $lower = strtolower($data);
    for ($i = 0; $i < strlen($data); $i++) {
      $char = $lower[$i];
      if (!isset($count[$char]))
      $count[$char] = 1;
    else
      $count[$char]++;
    
    }

    $char_terbanyak = '';
    $countMax = 0;
    foreach ($count as $key=>$data) {
        if($data > $countMax){
            $char_terbanyak = $key;
            $countMax = $data;
        }
    }

    // print_r($count);
    return   "$char_terbanyak  $countMax x";

}

print_r(countDuplicate("Hello World"));

?>