

<?php
session_start();
// session_destroy();

if (!isset($_SESSION['delete'])) {
    $_SESSION['delete'] = false;
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstarp css -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <!-- jquary js file  -->
    <script type="text/javascript" src="js/jquery-3.5.1.min.js"></script>
    <title>PHP CURD</title>
</head>

<body>

    <?php
    if ($_SESSION['delete']) {
        echo '<div class="alert alert-danger">' . $_SESSION['message'] . '</div>';
        $_SESSION['delete'] = false;
    }
    ?>



    <div class="container">

        <?php
        $mysqli = new mysqli('localhost', 'root', '', 'curd') or die(mysqli_error($mysqli));
        $result = $mysqli->query("SELECT * FROM data") or die($mysql->error);
        ?>
        <div class="row justify-content-center">
            <table class="table">
                <thead>
                    <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>AGE</th>
                        <th colspan="2">Action</th>
                    </tr>
                </thead>
                <?php
                while ($row = $result->fetch_assoc()) : ?>
                    <tr>
                        <td><?php echo $row['first_name']; ?></td>
                        <td><?php echo $row['last_name']; ?></td>
                        <td><?php echo $row['age']; ?></td>
                        <td>
                            <a href="index.php?edit=<?php echo $row['id']; ?>" class="btn btn-info">Edit</a>
                            <a href="process.php?delete=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                <?php endwhile; ?>

            </table>

        </div>








        <div class="row justify-content-center">
            <form action="process.php" method="POST">
                <div class="from-group">
                    <label>First Name</label>
                    <input type="text" name="first_name" class="form-control" placeholder="First Name" value="<?php echo $firts_name ?>">
                </div>
                <div class="from-group">
                    <label>Last Name</label>
                    <input type="text" name="last_name" class="form-control" placeholder="Last Name" value="<?php echo $last_name ?>">
                </div>
                <div class="from-group">
                    <label>AGE</label>
                    <input type="text" name="age" class="form-control" placeholder="Your Age" value="<?php echo $age ?>">
                </div>
                <div class="from-group">
                    <button type='submit' class="btn btn-primary" name='save'>Save</button>
                </div>
            </form>
        </div>

    </div>
</body>

</html>


<?php

session_destroy();


?>