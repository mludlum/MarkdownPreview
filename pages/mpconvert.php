<?php

global $g_vendor_path;
$parsedown_sub = 'parsedown'.DIRECTORY_SEPARATOR.'Parsedown.php';
if (file_exists($g_vendor_path.DIRECTORY_SEPARATOR.$parsedown_sub))
{
        require_once($g_vendor_path.DIRECTORY_SEPARATOR.$parsedown_sub);
}
// version 2.7
else if (file_exists($g_vendor_path.DIRECTORY_SEPARATOR.'erusev'.DIRECTORY_SEPARATOR.$parsedown_sub))
{
        require_once($g_vendor_path.DIRECTORY_SEPARATOR.'erusev'.DIRECTORY_SEPARATOR.$parsedown_sub);
}
else
        die('<em style="color:red">parsedown library not available.</em>');


$Parsedown = new Parsedown();
echo $Parsedown->text($_REQUEST['markdown']);
