<?php
namespace app\Crawly;

use Goutte\Client;
use Symfony\Component\HttpClient\HttpClient;

class Crawly {

    public function getAnswer(){

        $client = new Client(HttpClient::create(array(
            'headers' => array(
                'user-agent' => 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:73.0) Gecko/20100101 Firefox/73.0', // will be forced using 'Symfony BrowserKit' in executing
                'Accept' => 'text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,*/*;q=0.8',
                'Accept-Language' => 'en-US,en;q=0.5',
                'Origin'=> 'http://applicant-test.us-east-1.elasticbeanstalk.com/',
                'Content-Type'=> 'application/x-www-form-urlencoded; charset=UTF-8',
                'Connection'=> 'keep-alive',
                'Referer' => 'http://applicant-test.us-east-1.elasticbeanstalk.com/',
                'Upgrade-Insecure-Requests' => '1',
                'Save-Data' => 'on',
                'Pragma' => 'no-cache',
                'Cache-Control' => 'no-cache',
            ))));
        $client->setServerParameter('HTTP_USER_AGENT', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:73.0) Gecko/20100101 Firefox/73.0');
        
        
        $url = "http://applicant-test.us-east-1.elasticbeanstalk.com/";
        
        
        $crawler = $client->request('GET', $url);
        
        $cookieJar = $client->getCookieJar();
        
        $cookies = $cookieJar->all();
        $c = array('name' => "", 'value' => "");
        foreach ($cookies as $cookie) {
           
            $c['name'] = $cookie->getName();
            $c['value'] = $cookie->getValue();
        }
        
        $form = $crawler->filter('form')->form();
        $values = $form->getValues();
        
        
        ////////////////////////////////////////////////////////////////////
        $ch = curl_init();
        
            $config['useragent'] = 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.84 Safari/537.36';
        
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POST, 1);
            //curl_setopt($ch, CURLOPT_POSTFIELDS, "token=" . answer($values['token']));
            curl_setopt($ch, CURLOPT_POSTFIELDS, "token=" . $this->processToken($values['token']));
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded; charset=UTF-8'));
            $strCookie = 'PHPSESSID=' . $c['value']  . '; path=/';
            curl_setopt( $ch, CURLOPT_COOKIE, $strCookie ); //We set our session in the headers of the request!
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_REFERER, $url);
            curl_setopt($ch, CURLOPT_USERAGENT, $config['useragent']);
            curl_setopt($ch,CURLOPT_HTTPHEADER,array('Origin: ' . $url));
            
            $output = curl_exec ($ch);
            
            curl_close ($ch);
        
            $resposta = preg_replace("/.*>([^;]*)<.*/", "\\1", $output);
            return $output. "\n";

    }

    public function processToken(string $string):string{
                $r = array( 'a'=> 'z',
                'b'=> 'y',
                'c'=> 'x',
                'd'=> 'w',
                'e'=> 'v',
                'f'=> 'u',
                'g'=> 't',
                'h'=> 's',
                'i'=> 'r',
                'j'=> 'q',
                'k'=> 'p',
                'l'=> 'o',
                'm'=> 'n',
                'n'=> 'm',
                'o'=> 'l',
                'p'=> 'k',
                'q'=> 'j',
                'r'=> 'i',
                's'=> 'h',
                't'=> 'g',
                'u'=> 'f',
                'v'=> 'e',
                'w'=> 'd',
                'x'=> 'c',
                'y'=> 'b',
                'z'=> 'a',
                '0'=> '9',
                '1'=> '8',
                '2'=> '7',
                '3'=> '6',
                '4'=> '5',
                '5'=> '4',
                '6'=> '3',
                '7'=> '2',
                '8'=> '1',
                '9'=> '0');


        $stringCorrigida = "";
        $stringLength = strlen($string);

        for ($i = 0; $i < $stringLength; $i++) {

        $stringCorrigida .=  $r[$string[$i]];
        }
        return $stringCorrigida;
    }
}
