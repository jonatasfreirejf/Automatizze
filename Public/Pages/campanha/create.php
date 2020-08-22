<?php
    use App\Campanha\Campanha;
    
    $camp = new Campanha();
    
    if(!isset($_POST['name'])){
        $result = array(
            "status" => 200,
            "data" => array(
                "status" => 2,
                "message" => "Dados invalidos"
            ),
        );
        echo json_encode($result);
        exit();
    }
    
    $camp->setDadosCampanha(array("name" => $_POST['name']));
    
    $result = $camp->createCampanha();
    
    $result = array(
        "status" => 200,
        "data" => $result,
    );
    
    echo json_encode($result);
    
    