<?php include 'path.php'; ?>
<?php include (ROOT_PATH . '/app/controllers/users.php'); ?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <title>PHP</title>
</head>

<?php include (ROOT_PATH . '/app/helpers/msg.php'); ?>

<body>
    <form action="register.php" method="post">

    <input type="text" placeholder="Username" name="username" value="<?php echo $username; ?>">
    <input type="text" placeholder="Email" name="email" value="<?php echo $email; ?>">
     <input type="password" placeholder="Password" name="password" value="<?php echo $password; ?>" >
     <input type="password" placeholder="Confirm Password" name="password2" value="<?php echo $username; ?>">

<button type="submit" class="btn btn-secondary" name="register-btn">Register</button>





    </form>
</body>
</html>