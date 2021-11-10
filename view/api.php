<?php

// import des middlewares
require_once 'model/Base.php';
$dbd = new Base();

// get the HTTP method, path and body of the request
$method = $_SERVER['REQUEST_METHOD'];
// get the HTTP method, path and body of the request
if(isset($_SERVER['PATH_INFO'])){
    $request = explode('/', trim($_SERVER['PATH_INFO'], '/'));
} else {
    $request = [];
}
$input = json_decode(file_get_contents('php://input'), true);

// on ne supporte que les requetes GET
if ($method != 'GET') {
    echo ('error : only GET supported');
    http_response_code(405);
    exit();
}

// traiter requête
if (array_key_exists(1, $request)) {
    switch ($request[1]) {
        case 'meridiens':
            // routes : /meridiens/all
            if (array_key_exists(2, $request) && $request[2] == 'all') {

                $data = $dbd->getMeridien($dbd->getDbh());
                header('Content-Type: application/json');
                echo json_encode($data);
                break;
            }
            echo "Mauvaise requête.";
            http_response_code(400);
            exit();
        case 'symptomes':
            // routes : /symptomes/all
            if (array_key_exists(2, $request) && $request[2] == 'all') {
                $data = $dbd->getPatho();
                header('Content-Type: application/json');
                echo json_encode($data);
                break;
            }
            echo "Mauvaise requête.";
            http_response_code(400);
            exit();
        case 'pathosympto':
                // routes : /pathosympto/all
                if (array_key_exists(2, $request) && $request[2] == 'all') {
                    $data = $dbd->getPathoSympto();
                    header('Content-Type: application/json');
                    echo json_encode($data);
                    break;
                }
                echo "Mauvaise requête.";
                http_response_code(400);
                exit();

        case 'pathologies':
            // routes : /pathologies/all
            //          /pathologies/byKeyword/:keyword
            if (array_key_exists(1, $request)) {
                if ($request[2] == 'all') {
                    $data = $dbd->getPathologie();
                    header('Content-Type: application/json');
                    echo json_encode($data);
                    break;
                } elseif ($request[2] == 'byKeyword' && array_key_exists(3, $request)) {
                    $data = $dbd->getPathosByKeyWord($request[3]);
                    header('Content-Type: application/json');
                    echo json_encode($data);
                    break;
                }
            }
            echo "Mauvaise requête.";
            http_response_code(400);
            exit();

        default:
            $smarty->display("templates/api_index.tpl");
            
            exit();
    }
} else {
    $smarty->display("templates/api_index.tpl");
    exit();
}

http_response_code(200);