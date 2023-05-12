<?php
/*
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
            $sql = "SELECT * FROM t_mhs";
            $path = explode('/', $_SERVER['REQUEST_URI']);
            //print_r($path);
            //print($path[3]);
            //echo $path[3];
            if(isset($path[3]) && is_numeric($path[3])) {
                $sql .= " WHERE nim = :nim";
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(':nim', $path[3]);
                $stmt->execute();
                $dataMhs = $stmt->fetch(PDO::FETCH_ASSOC);
            } else {
                //echo $path[3];
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                $dataMhs = $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            
            echo json_encode($dataMhs);
            break;

        case "POST":
            $inputmhs = json_decode( file_get_contents('php://input') );
            $sql = "INSERT INTO t_mhs(nim, nama, email, jurusan, gender) VALUES(:nim, :nama, :email, :jurusan, :gender)";
            $stmt = $conn->prepare($sql);
            //$created_at = date('Y-m-d');
            $stmt->bindParam(':nim', $inputmhs->nim);
            $stmt->bindParam(':nama', $inputmhs->nama);
            $stmt->bindParam(':email', $inputmhs->email);
            $stmt->bindParam(':jurusan', $inputmhs->jurusan);
            $stmt->bindParam(':gender', $inputmhs->gender);
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
            $sql = "UPDATE t_mhs SET nim=:nim, nama=:nama, email=:email, jurusan=:jurusan, gender=:gender WHERE nim=:nim";
            $stmt = $conn->prepare($sql);
            
            $stmt->bindParam(':nim', $user->nim);
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
            $sql = "DELETE FROM t_mhs WHERE nim=:nim";
            $path = explode('/', $_SERVER['REQUEST_URI']);
            //print($path);
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':nim', $path[3]);           
            
            if($stmt->execute()){
                $response = ['status' => 1, 'message' => 'Record deleted successfully.'];
            }else{
                $response = ['status' => 0, 'message' => 'Failed to delete record.'];
            }

            echo json_encode($response);
            break;        
    }
*/
echo "Master API PHP"
?>