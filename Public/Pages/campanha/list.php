<?php
    use App\Campanha\Campanha;
    
    $camp = new Campanha();
    
    $limit = $_POST['limit'] ?? 10;
    $page = $_POST['page'] ?? 1;
    
    $dados = array(
        "limit"=> $limit,
        "page"=> $page,
    );
    
    $camp->setDadosCampanha($dados);
    
    $result = $camp->listCampanha();
    $dados = [];
    
    $data = array(
        "status"=> 200,
        "message"=> "OK",
        "data"=>array(
            'data'=> $result['data']->fetch_array(),
            "qtdAll" => $result["qtdAll"],
            'qtdPage'=> $result["qtdPage"],
            'numPage'=> $result['numPage'],
        ),
    );
    
    echo json_encode($data);