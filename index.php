<?php
	require_once "vendor/autoload.php";
	header('Access-Control-Allow-Origin: *');
	header ('Content-type: text/json; charset=UTF-8');


	//Carregamento do arquivo .env
	$dotenv = Dotenv\Dotenv::createMutable(__DIR__);
	$dotenv->load();
    
	if(isset($_GET['url']))
	{
	    if(empty($_GET['url']))
	    {
	        require_once 'Public/Pages/404.php';
	        exit();
	    }
	    
	}
	else
	{
	    require_once 'Public/Pages/404.php';
	    exit();
	}
	
	
	$pasta = explode("/", $_GET['url']);
	$modulo = $pasta[0] ?? null;
	$acao = $pasta[1] ?? null;
	$id = $pasta[2] ?? null;
	
	if(!is_dir("Public/Pages/". $modulo))
	{
	    require_once 'Public/Pages/404.php';
	    exit();
	}
	
	if(!is_file("Public/Pages/". $modulo. "/" . $acao . ".php"))
	{
	    require_once 'Public/Pages/404.php';
	    exit();
	}
	
	require_once 'Public/Pages/'. $modulo. "/". $acao . ".php";
	
	
?>