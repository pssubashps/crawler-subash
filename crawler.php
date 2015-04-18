<?php
$loader = require 'vendor/autoload.php';
$loader->add('AppName', __DIR__.'/../src/');

use Subash\Crawler;

if(php_sapi_name () == 'cli')
{
    //require_once 'src/Subash/Crawler.php';
    $cr = new Subash\Crawler('https://www.google.co.in/');
    $data = $cr->processUrl();
    print implode(PHP_EOL ,$data);
    
}else{
    die("No Access");
}
