<?php

require_once __DIR__."/../Crawler.php";
class CrawlerTest extends \PHPUnit_Framework_TestCase
{
    public function testProcessUrl ()
    {   
        $cr = new Subash\Crawler('https://google.co.in');
        $data = $cr->processUrl();
        $this->assertNotEmpty($data);
    }
}
