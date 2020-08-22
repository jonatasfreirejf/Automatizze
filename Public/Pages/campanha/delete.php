<?php
    use App\Campanha\Campanha;
    
    $camp = new Campanha();
    
    if(!isset($_POST['id_campanha'])){
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
    
    $camp->setDadosCampanha(
        array("id_campanha" => $_POST['id_campanha'])
    );
    
    $result = $camp->deleteCampanha();
    
    $result = array(
        "status" => 200,
        "data" => $result,
    );
    
    echo json_encode($result);