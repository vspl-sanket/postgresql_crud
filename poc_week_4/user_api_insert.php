<?php

    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: POST');
    
    $input = json_decode(file_get_contents('php://input'), true);
    

    include_once 'config/connect.php';
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

      //$data = json_decode(file_get_contents("php://input"));

        $data = [
            "f_name" => $input['f_name'],
            "l_name" => $input['l_name'],
            "dob" => $input['dob'],
            "mob" => $input['mob'],
            "address" => $input['address'],
            "city" => $input['city'],
            "pin_code" => $input['pin_code']
        ];
    
        try{  
            $res = pg_insert($pdo, 'users', $data);
            if ($res) {
                echo json_encode(['status'=>true,'message' => "User is added"]);
            } else {
                echo json_encode(['status'=>false,'message' => "Input data was wrong"]);
            }
        }catch(EXCEPTION $e){
            echo json_encode(['status'=>false,'message' => $e]);
        }
    } else {
        echo json_encode(['status'=>false,'message' => "Error: incorrect Method!"]);
    }

?>




