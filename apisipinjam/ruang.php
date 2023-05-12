<?php
    ini_set('display_errors', '1');
    ini_set('display_startup_errors', '1');
    error_reporting(E_ALL);
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: *");
    header("Access-Control-Allow-Methods: *");
    //echo "Testing";

    include "DbConnect.php";
    $objDb = new DbConnect;
    $conn = $objDb->connect();
   

    //print_r(file_get_contents('php://input'));
    $method = $_SERVER['REQUEST_METHOD'];
    switch($method){                   
        case "GET":
            $sql = "SELECT * FROM t_ruang";
            $path = explode('/', $_SERVER['REQUEST_URI']);
            //$stmt->bindParam(':id_alat', 'B001');
            //print_r($path);
            //is_numeric($path[4]);
            //print($path[1]);
            //echo $path[3];
            //$coba = $path[4];
            //echo $coba;
            if(isset($path[4]) && is_string($path[4])) {
                $sql .= " WHERE id_ruang = :idruang";
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(':idruang', $path[4]);
                $stmt->execute();
                //echo $stmt;
                $dataRuang = $stmt->fetch(PDO::FETCH_ASSOC);
            } else {
                //echo $path[3];
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                //echo $sql;
                $dataRuang = $stmt->fetchAll(PDO::FETCH_ASSOC);
                //echo "Coba";
            }
            
            echo json_encode($dataRuang);
            break;

        case "POST":
            $inputruang = json_decode( file_get_contents('php://input') );
            $sql = "INSERT INTO t_ruang(id_ruang, nama) VALUES(:idruang, :nama)";
            $stmt = $conn->prepare($sql);
            //$created_at = date('Y-m-d');
            $stmt->bindParam(':idruang', $inputruang->idruang);
            $stmt->bindParam(':nama', $inputruang->nama);
            //$stmt->bindParam(':created_at', $created_at);
            if($stmt->execute()){
                $response = ['status' => 1, 'message' => 'Record created successfully.'];
            }else{
                $response = ['status' => 0, 'message' => 'Failed to create record.'];
            }
            
            echo json_encode($response);
            break;

        case "PUT":
            $updatealat = json_decode( file_get_contents('php://input') );
            $sql = "UPDATE t_ruang SET nama=:nama WHERE id_ruang=:idruang";
            $stmt = $conn->prepare($sql);
            
            $stmt->bindParam(':idruang', $updatealat->id_ruang);
            $stmt->bindParam(':nama', $updatealat->nama);

            if($stmt->execute()){
                $response = ['status' => 1, 'message' => 'Record updated successfully.'];
            }else{
                $response = ['status' => 0, 'message' => 'Failed to update record.'];
            }
            
            echo json_encode($response);
            break;

        case "DELETE":
            $sql = "DELETE FROM t_ruang WHERE id_ruang=:idruang";
            $path = explode('/', $_SERVER['REQUEST_URI']);
            //print($path);
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':idruang', $path[4]);           
            
            if($stmt->execute()){
                $response = ['status' => 1, 'message' => 'Record deleted successfully.'];
            }else{
                $response = ['status' => 0, 'message' => 'Failed to delete record.'];
            }

            echo json_encode($response);
            break;        
    }
?>