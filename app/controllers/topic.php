
<?php
include (ROOT_PATH . '/app/helpers/TopicValidate.php');

$table = 'topics';
$topics = selectAll($table);

$id = '';
$title = '';
$article = '';
$errors = array();


if(isset($_POST['topics-btn'])){
	$errors = ValidateTopics($_POST);

	if (count($errors) == 0){
		unset($_POST['topics-btn']);
		$topic = create('topics', $_POST);
		$_SESSION['message'] = "Created";
		header('location: ' . BASE_URL . 'admin.php');
		exit();
	}
	else{
		$title = $_POST['title'];
		$article = $_POST['article'];

	}
   
}


if(isset($_GET['id'])){
	$id = $_GET['id'];
	$edit = SelectOne($table, ['id' => $id]);
	$id = $edit['id'];
	$title = $edit['title'];
	$article = $edit['article'];
}


if (isset($_GET['del_id'])){
	$id = $_GET['del_id'];
	$delete = delete($table, $id);
	$_SESSION['message'] = "Deleted";
	header('location: ' . BASE_URL . 'admin.php');
	exit();
}


if (isset($_POST['update-btn'])){
	$id = $_POST['name'];
	unset($_POST['name'], $_POST['update-btn']);
	$update = update($table, $id, $_POST);
	$_SESSION['message'] = "updated";
	header('location: ' . BASE_URL . 'admin.php');
	exit();
}





?>