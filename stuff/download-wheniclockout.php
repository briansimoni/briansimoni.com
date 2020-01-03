<?php
/**
 * Created by PhpStorm.
 * User: brian
 * Date: 9/11/16
 * Time: 5:36 PM
 */


$file = __DIR__ . "/wheniclockout.crx";

if(!file_exists($file)) {
    die($file . " does not exist");
}


header('Content-Description: File Transfer');
header('Content-Type: application/x-chrome-extension');
header('Content-Disposition: attachment; filename="'.basename($file).'"');
readfile($file);
exit;