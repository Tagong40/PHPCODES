<?php include 'path.php'; ?>

<?php include (ROOT_PATH . '/app/database/db.php');?>
<?php include (ROOT_PATH . '/app/controllers/topic.php');?>


<form action="edit.php" method="post">
     <input type="hidden" name="name" value="<?php echo $id; ?>">
    <input type="text" placeholder="Title" name="title" value="<?php echo $title; ?>">
    <textarea type="text" placeholder="article" name="article" value="" ><?php echo $article; ?></textarea> 

<button type="submit" class="btn btn-secondary" name="update-btn">Post</button>





    </form>