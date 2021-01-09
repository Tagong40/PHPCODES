<?php

function ValidateTopics($table){
	global $conn;
	$errors = array();

	if (empty($table['title'])){
		array_push($errors, "Title is required");
	}

	if (empty($table['article'])){
		array_push($errors, "article required");
	}

	$existingTopic = selectOne('topics', ['title' => $table['title']]);

	if(isset($existingTopic)){
		array_push($errors, "Title Already Exist");
	}

	return $errors;

}