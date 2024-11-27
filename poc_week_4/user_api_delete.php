<?php

    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: POST');
    
    $input = json_decode(file_get_contents('php://input'), true);
    

    include_once 'config/connect.php';
    if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {

      //$data = json_decode(file_get_contents("php://input"));

        $data = [
            "user_id" => $input['user_id'],
        ];
    
        try{ 
            $res = pg_delete($pdo, 'users', $data);
            if ($res) {
                echo json_encode(['status'=>true,'message' => "User is Deleted"]);
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




