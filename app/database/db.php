<?php

session_start();

require("connect.php");


function dev($value){
	echo "<pre>", print_r($value, true), "</pre>";
}



function executeQuery($sql, $data){
	global $conn;

	$stmt = $conn->prepare($sql);
	$values = array_values($data);
	$types = str_repeat('s', count($values));
	$stmt->bind_param($types, ...$values);
	$stmt->execute();
	return $stmt;


}


function create($table, $data){
	global $conn;

	$sql = "INSERT INTO $table SET";
	$i = 0;
	foreach ($data as $key => $value) {
		if($i == 0){
			$sql = $sql . " $key=?";
		}
		else{
			$sql = $sql . ", $key=?";
		}
		$i++;
	}

	$stmt = executeQuery($sql, $data);
	$id = $stmt->insert_id;
	return $id;


}


function selectAll($table, $conditions = []){
	global $conn;
	
	$sql = "SELECT * FROM $table";
	
    if (empty($conditions)){
        $stmt = $conn->prepare($sql);
        $stmt->execute();
		$records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
		return $records;
    }
    else{
        $i = 0;
        foreach($conditions as $key => $value){
            if ($i == 0){ 
                $sql = $sql . " WHERE $key=?";
            }
            else{
                $sql = $sql . " AND $key=?";
            }
            $i++;
        }
        $stmt = excuteQuery($sql, $conditions);
        $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        return $records;

    }
}





function selectOne($table, $conditions){
	global $conn;

	$sql = " SELECT * FROM $table";
	$i=0;
	foreach ($conditions as $key => $value) {
		if($i == 0){
			$sql = $sql . " WHERE $key=?";
		}
		else{
			$sql = $sql . " AND $key=?";
		}
		$i++;
	}
	$sql  = $sql . " LIMIT 1";
	$stmt = executeQuery($sql, $conditions);
	$results = $stmt->get_result()->fetch_assoc();
	return $results;

}



function update($table, $id , $data){
	global $conn;

	$sql =  "UPDATE $table SET";
	$i = 0;
	foreach ($data as $key => $value) {
		if($i == 0){
			$sql = $sql . " $key=?";
		}
		else{
			$sql = $sql . ", $key=?";
		}
		$i++;
	}
	$sql = $sql . " WHERE id=?";
	$data['id'] = $id;
	$stmt = executeQuery($sql, $data);
	return $stmt->affected_rows;
}


function updateMe($table, $id, $data){
	global $conn;

	$sql = "UPDATE $table SET";
	$i=0;
	foreach ($data as $key => $value) {
		if($i == 0){
			$sql = $sql . " $key=?";
		}
		else{
			$sql = $sql . ", $key=?";
		}
		$i++;
	}
	$sql = $sql . " WHERE id=?";
	$data['id'] = $id;
	$stmt = executeQuery($sql, $data);
	return $stmt->affected_rows;
}


function delete($table, $id){
	global $conn;
	$sql = " DELETE FROM $table WHERE id=?";
	$stmt = executeQuery($sql, ['id' => $id]);
	return $stmt->affected_rows;
}





// $conditions = [

// 	'admin' => 1,
// 	'username' => "Winfred",
// 	'email' => 'jaytinz45@gmail.com',
// 	'password' => "Godfred20",

// ];


// $results = delete('test', $conditions);

// echo "<pre>", print_r($results, true), "</pre>";

// ?>