<?php include 'path.php'; ?>
<?php include (ROOT_PATH . '/app/database/db.php');?>
<?php include (ROOT_PATH . '/app/controllers/topic.php');?>


<!DOCTYPE html>
<html>
<head>
	<title>PHP TEST ME</title>
</head>
<body>


<?php if (isset($_SESSION['id'])): ?>
<a href="<?php echo BASE_URL . 'index.php'; ?>" ><h1><?php echo $_SESSION['username']; ?></a>
<a href="<?php echo BASE_URL . '/logout.php'; ?> " ><h1>Logout</h1></a>

<?php else: ?>

<h1>HOME PAGE</h1>

<?php endif; ?>

<?php include (ROOT_PATH . '/app/helpers/msg.php');?>



<?php if(isset($_SESSION['message'])): ?>
<?php echo $_SESSION['message']; ?>
<?php unset($_SESSION['message']); ?>
<?php endif; ?>


<form action="index.php" method="post">

    <input type="text" placeholder="Title" name="title" value="<?php echo $title; ?>">
    <textarea type="text" placeholder="article" name="article"  ><?php echo $article; ?></textarea> 

<button type="submit" class="btn btn-secondary" name="topics-btn">Post</button>





    </form>

</body>
</html>