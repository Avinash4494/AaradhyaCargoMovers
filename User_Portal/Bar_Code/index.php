<?php 
include 'barcode.php';
$generate = new barcode_generator();
$options = array();
$generator->output_image('svg'. 'upc-a'.'258585874'. $options);
?>
 