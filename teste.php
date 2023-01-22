<?php
ini_set('display_errors', 1);
require 'app/bootstrap.php';

use app\Curl\Curl;

$token = "";

       $curl = new Curl();
       $curl->setUrl('http://localhost:8080/')
            ->setData('&processToken='.$token)
            ->setType('POST');
        $curl->send();

        var_dump($curl->getResponse());
