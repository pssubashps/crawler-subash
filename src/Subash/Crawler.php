<?php
namespace std;
namespace Subash;

class Crawler
{
    private $url;
    
    private $htmlString;
    
    public function __construct($url)
    {
        $this->url = $url;
    }
    
    public function processUrl()
    {
        $this->readData();
        $dom = new \DOMDocument;
        @$dom->loadHTML($this->htmlString);
        $arr = [];
        foreach ($dom->getElementsByTagName('a') as $node) {
          $arr[] =  $node->getAttribute( 'href' ). PHP_EOL;
        }
        return $arr;
    }
    
    private function readData()
    {
        $ch = curl_init();
        $timeout = 5;
        curl_setopt($ch, CURLOPT_URL, $this->url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
        $data = curl_exec($ch);
        curl_close($ch);
        $this->htmlString = $data;
    }
}