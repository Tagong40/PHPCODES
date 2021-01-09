<?php include 'path.php'; ?>

<?php include (ROOT_PATH . '/app/database/db.php');?>
<?php include (ROOT_PATH . '/app/controllers/topic.php');?>



<?php if(isset($_SESSION['id'])): ?>
<a href="<?php echo BASE_URL . 'index.php'; ?>" ><h1><?php echo $_SESSION['username']; ?></a>
<a href="<?php echo BASE_URL . '/logout.php'; ?> " ><h1>Logout</h1></a>
    <?php endif; ?>


<?php if(isset($_SESSION['message'])): ?>

<?php echo $_SESSION['message']; ?>
<?php unset($_SESSION['message']); ?>
<?php endif; ?>




<?php foreach ($topics as $key => $topic): ?>
<h1>Total Topics <?php echo $key + 1; ?></h1>
<a href="edit.php?id=<?php echo $topic['id']; ?>"><li><?php echo $topic['title']; ?></li></a>
<a href="admin.php?del_id=<?php echo $topic['id']; ?>">delete</a>
<?php endforeach; ?>