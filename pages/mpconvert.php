<?php

require_lib( 'parsedown' . DIRECTORY_SEPARATOR . 'Parsedown.php' );


$Parsedown = new Parsedown();
echo $Parsedown->text($_REQUEST['markdown']);
