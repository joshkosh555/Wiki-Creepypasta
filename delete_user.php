<?php
    session_start();
    if(!isset($_SESSION['user_level']) or ($_SESSION['user_level'] !=1)){ // admin can access
        header("Location: login.php");
        exit();
    }
?>
<!doctype html>
<html lang="en">
<head>
    <title>Delete User - r/nosleep</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">	   
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <meta charset="utf-8">
    <link href="https://fonts.googleapis.com/css2?family=Creepster&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css designs/index.css">
    <link rel="stylesheet" type="text/css" href="css designs/indextext.css">
</head>
<body>
    <div id="container">         
        <?php include('navadmin.php'); ?>
        <div id="content">
            <div class="delete-form-container">
                <h2>Deleting Record...</h2>
                <?php
                    if ((isset($_GET['id']) && is_numeric($_GET['id'])) || (isset($_POST['id']) && is_numeric($_POST['id']))) {
                        $id = isset($_GET['id']) ? $_GET['id'] : $_POST['id'];
                    } else {
                        echo '<p class="text-danger">This page does not exist ER#0000000000001</p>';
                        echo '<a href="admin.php" class="btn btn-primary">Back to Main Page</a>';
                        echo '</div>';
                        exit();
                    }

                    require('mysqli.connect.php');
                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                        if ($_POST['sure'] == 'Yes') {
                            $query = "DELETE FROM users WHERE user_id=$id";
                            $result = @mysqli_query($dbc, $query);
                            if (mysqli_affected_rows($dbc) == 1) {
                                echo '<p class="text-success">Record Successfully Deleted!</p>';
                                echo '<div class="back-buttoninv">';
                                echo '<a href="index.php" class="btn btn-primary">Back to Homepage</a>'; 
                                echo '</div>';
                            } else {
                                echo '<p class="text-danger">Record Deletion Failed. ER#000000000505</p>';
                                echo '<div class="back-button">';
                                echo '</div>';
                            }
                        } else {
                            echo '<p>Deletion cancelled.</p>';
                            echo '<div class="back-buttoninv">';
                            echo '<a href="index.php" class="btn btn-primary">Back to Homepage</a>'; 
                            echo '</div>';
                        }
                    } else {
                        $query = "SELECT CONCAT(fname, ' ', lname) AS fullname FROM users WHERE user_id = $id";
                        $result = @mysqli_query($dbc, $query);
                        if (mysqli_num_rows($result) == 1) {
                            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                            echo "<h3>Are you sure you want to delete the following user: {$row['fullname']}?</h3>";
                            echo '
                            <form action="delete_user.php" method="post">
                                <input type="submit" name="sure" class="btn-yes" value="Yes">
                                <input type="submit" name="sure" class="btn-no" value="No">
                                <input type="hidden" name="id" value="'.$id.'">
                            </form>';
                        } else {
                            echo '<h3 class="text-danger">Invalid user ID.</h3>';
                            echo '<div class="back-button">';
                            echo '</div>';
                        }
                    }
                    mysqli_close($dbc);
                ?>
                <div class="back-button">
                    <a href="register.view.users.php" class="btn btn-secondary">Back</a>
                </div>
                <div class="back-buttoninv">
                    <a href="register.view.users.php" class="btn btn-secondary"></a>
                </div>
            </div>
        </div>
        <?php include('info.col.php'); ?>
        <?php include('footer.php'); ?>      
    </div>
</body>
</html>
