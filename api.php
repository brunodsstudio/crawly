<?php
ini_set('display_errors', 1);
require 'app/bootstrap.php';


$a = new app\Crawly\Crawly;


if(!empty($_POST)){
   
    if(isset($_POST['processToken'])){

    

      if($_POST['processToken'] === "" || is_null($_POST['processToken']) || strlen($_POST['processToken']) !== 32 ){
        $json = '{"parametro errado":"bad request"}';
        header("Content-Type: application/json");
        http_response_code(400);

        $ar = array("token" => $_POST['processToken'], "processed" => "erro");
        echo json_encode($ar);
       
        
      } else {
        $ar = array("token" => $_POST['processToken'], "processed" => $a->processToken($_POST['processToken']));
        header("Content-Type: application/json");
        http_response_code(200);
        echo json_encode($ar);
      }

    } else if(isset($_POST['answer'])) {

        header("Content-Type: application/json");
        $resp = strip_tags(str_replace('Voltar',"",$a->getAnswer()));
        http_response_code(200);
        $data = array("message", $resp);
        echo json_encode($data);

    }
} else {
    header("Content-Type: application/json");
    $resp = strip_tags(str_replace('Voltar',"",$a->getAnswer()));
    http_response_code(200);
    $data = array("message", $resp);
    echo json_encode($data);
}
