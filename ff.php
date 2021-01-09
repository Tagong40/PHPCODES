<?php

require("connect.php");


function Create($talbe, $data){
    global $conn;
    $sql = "INSERT INTO $talbe SET";
    $i = 0;
    foreach($data as $key => $value){
        if($i == 0){
            $sql = $sql . " $key=?";
        }else{
            $sql = $sql . ", $key=?";
          }
        $i++;
    }
    $stmt = $conn->prepare($sql);
    $values = array_values($data);
    $types = str_repeat('s', count($values));
    $stmt->bind_param($types, ...$values);
    $stmt->execute();
    $id = $stmt->insert_id;
    return $id;
}



function SelectOne($table, $conditions){
    global $conn;
    
    $sql = "SELECT * FROM $table";
    $i=0;
    foreach($conditions as $key => $value){
        if($i==0){
            $sql = $sql . " WHERE $key=?";
        }
        else{
            $sql = $sql . " AND $key=?";
        }
        $i++;
    }
    $stmt = $conn->prepare($sql);
    $values = array_values($conditions);
    $types = str_repeat('s', count($values));
    $stmt->bind_param($types, ...$values);
    $stmt->execute();
    $results = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    return $results;

}


function SelectAll($table, $conditions = []){
    global $conn;

    $sql = "SELECT * FROM $table";
    $i=0;
    foreach($conditions as $key => $value){
        if($i==0){
            $sql = $sql . " WHERE $key=?";
        }
        else{
            $sql = $sql . " AND $key=?";
        }
        $i++;

    }
    $stmt = $conn->prepare($sql);
    $values = array_values($conditions);
    $types = str_repeat('s', count($values));
    $stmt->bind_param($types, ...$values);
    $stmt->execute();
    $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    return $records;

}




function Update($table, $id, $data){

    global $conn;
    
    $sql = "UPDATE $table SET";
    $i=0;
    foreach($data as $key => $value){
        if($i==0){
            $sql = $sql . " $key=?";
        }
        else{
            $sql = $sql . ", $key=?";
        }
        $i++;
    }
    $sql = $sql . " WHERE id=?";
    $data['id'] = $id;
    $stmt = $conn->prepare($sql);
    $values = array_values($data);
    $types = str_repeat('s', count($values));
    $stmt->bind_param($types, ...$values);
    $stmt->execute();
    return $stmt->affected_rows;



}

function delete($table, $id){
    global $conn;
    $sql = "DELETE FROM $table WHERE id=?";
    $stmt = $conn->prepare($sql);
    $values = array_values(['id' => $id]);
    $types = str_repeat('s', count($values));
    $stmt->bind_param($types, ...$values);
    $stmt->execute();
    return $stmt->affected_rows;
}


$data = [
    'admin' => 1,
    'username' => "Julius",
    'email' => "tensangna@gg.com",
   
];

$id = delete('users', 3);

echo '<pre>', print_r($id, true), '</pre>';