<?php
header('Content-type: text/plain');
function lampuMerah() {
    static $colors = ['merah', 'kuning', 'hijau'];
    static $index = 0;
    
    $color = $colors[$index];
    $index = ($index + 1) % count($colors);
    
    return $color;
}

echo lampuMerah() . "\n"; 
echo lampuMerah() . "\n"; 
echo lampuMerah() . "\n"; 
echo lampuMerah() . "\n"; 
echo lampuMerah() . "\n";

?>