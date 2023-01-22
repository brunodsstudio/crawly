<?php namespace Tests;

use PHPUnit\Framework\TestCase;
use app\Crawly\Crawly;
use app\Curl\Curl;

class CrawlyTest extends TestCase
{

    private $http;

    public function setUp(): void
    {
        
    }

    public function tearDown(): void
    {
       
    }


    public function test_process_Token_ok()
    {
       $token = "0ddb75d9c22105d699746c4d48819166";

       $curl = new Curl();
       $curl->setUrl('http://172.20.5.2/')
            ->setData('&processToken='.$token)
            ->setType('POST');
        $curl->send();

    
     $this->assertEquals('9wwy24w0x77894w300253x5w51180833', $curl->getResponse()->processed);
     $this->assertEquals(200, $curl->getStatusCode());

    }

    public function test_process_Token_err()
    {
        $token = "";

       $curl = new Curl();
       $curl->setUrl('http://172.20.5.2/')
            ->setData('&processToken='.$token)
            ->setType('POST');
        $curl->send();
  

     $this->assertEquals(400, $curl->getStatusCode());
       
    }
    public function test_answer()
    {
        $curl = new Curl();
        $curl->setUrl('http://172.20.5.2/')
            ->setType('GET');
        $curl->send();
  
     $this->assertEquals(200, $curl->getStatusCode());
    }


}