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
            $sql = "SELECT * FROM t_dosen";
            $path = explode('/', $_SERVER['REQUEST_URI']);
            //print_r($path);
            //print($path[3]);
            //echo $path[3];
            if(isset($path[4]) && is_string($path[4])) {
                $sql .= " WHERE nip = :nip";
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(':nip', $path[4]);
                $stmt->execute();
                $dataDosen = $stmt->fetch(PDO::FETCH_ASSOC);
            } else {
                //echo $path[3];
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                $dataDosen = $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            
            echo json_encode($dataDosen);
            break;

        case "POST":
            $inputdosen = json_decode( file_get_contents('php://input') );
            $sql = "INSERT INTO t_dosen(nip, nama, email, jurusan, gender) VALUES(:nip, :nama, :email, :jurusan, :gender)";
            $stmt = $conn->prepare($sql);
            //$created_at = date('Y-m-d');
            $stmt->bindParam(':nip', $inputdosen->nip);
            $stmt->bindParam(':nama', $inputdosen->nama);
            $stmt->bindParam(':email', $inputdosen->email);
            $stmt->bindParam(':jurusan', $inputdosen->jurusan);
            $stmt->bindParam(':gender', $inputdosen->gender);
            //$stmt->bindParam(':created_at', $created_at);
            if($stmt->execute()){
                $response = ['status' => 1, 'message' => 'Record created successfully.'];
            }else{
                $response = ['status' => 0, 'message' => 'Failed to create record.'];
            }
            
            echo json_encode($response);
            break;

        case "PUT":
            $user = json_decode( file_get_contents('php://input') );
            $sql = "UPDATE t_dosen SET nama=:nama, email=:email, jurusan=:jurusan, gender=:gender WHERE nip=:nip";
            $stmt = $conn->prepare($sql);
            
            $stmt->bindParam(':nip', $user->nip);
            $stmt->bindParam(':nama', $user->nama);
            $stmt->bindParam(':email', $user->email);
            $stmt->bindParam(':jurusan', $user->jurusan);
            $stmt->bindParam(':gender', $user->gender);

            if($stmt->execute()){
                $response = ['status' => 1, 'message' => 'Record updated successfully.'];
            }else{
                $response = ['status' => 0, 'message' => 'Failed to update record.'];
            }
            
            echo json_encode($response);
            break;
        
        case "DELETE":
            $sql = "DELETE FROM t_dosen WHERE nip=:nip";
            $path = explode('/', $_SERVER['REQUEST_URI']);
            //print($path);
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':nip', $path[4]);           
            
            if($stmt->execute()){
                $response = ['status' => 1, 'message' => 'Record deleted successfully.'];
            }else{
                $response = ['status' => 0, 'message' => 'Failed to delete record.'];
            }

            echo json_encode($response);
            break;        
    }
?>