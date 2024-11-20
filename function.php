<?php
    require 'dbcon.php';

    function checkParamsId($paramType){
        if(isset($_GET[$paramType]))
        {
            if($_GET[$paramType] != null){
                return $_GET[$paramType];
            }
            else{
                return 'no id found';
            }
        }
        else{
            return 'No id given';
        }
    }



    function redirect($url, $status){
        $_SESSION['status'] = $status;
        header("Location: $url"); 
        exit(0);
    }




    function validate($inputData){
        global $conn;
         $validatedData = mysqli_real_escape_string($conn, trim($inputData));
         return trim($validatedData);
    }



    function deleteQuery($tableName , $id){
        global $conn;

        $table = validate($tableName);
        $id = validate($id);

        $query = "DELETE from $table where id = '$id' LIMIT 1";
        $result = mysqli_query($conn, $query);
        return $result;
    }




    function getById($tableName , $id ){
        global $conn;
    
        $table = validate ($tableName);
        $id = validate($id);
    
        $query = "SELECT * from adminlogin where id = '$id' Limit 1";
        $result = mysqli_query($conn, $query);
    
        if($result){
            if(mysqli_num_rows($result)==1){
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                $response = [
                    'status' => 200,
                    'message' => 'Fected data',
                    'data' => $row
                ];
                return $response;
            }
            else{
                $response = [
                    'status' => 404,
                    'message' => 'No data Record'
                ];
                return $response;
            }
        }   
        else{
            $response = [
                'status' => 500,
                'message' => 'something Went Wrong'
            ];
            return $response;
        }
    }

?>