<!doctype html>
<html lang="en">
<head>
    <title>Edit User - r/nosleep</title>
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
        <?php include('navadmin.php');?>
        <div id="content">
            <div class="edit-form-container">
                <h2>Editing User Information</h2>
                <?php
                    if((isset($_GET['id'])) && (is_numeric($_GET['id']))){
                        $id = $_GET['id'];
                    } elseif((isset($_POST['id'])) && (is_numeric($_POST['id']))){
                        $id = $_POST['id'];
                    } else {
                        echo '<p class="text-danger text-center">Invalid User ID.</p>';
                        echo '<div class="back-button">';
                        echo '<a href="register.view.users.php" class="btn btn-primary">Back to View Users</a>';
                        echo '</div>';
                        exit();
                    }

                    require('mysqli.connect.php');
                    if($_SERVER['REQUEST_METHOD'] == 'POST') {
                        $fname = $_POST['fname'];
                        $lname = $_POST['lname'];
                        $query = "UPDATE users SET fname='$fname', lname='$lname' WHERE user_id=$id";
                        $result = @mysqli_query($dbc, $query);
                        if(mysqli_affected_rows($dbc) == 1){
                            echo '<p class="text-success text-center">User information successfully updated!</p>';
                        } else {
                            echo '<p class="text-danger text-center">Error updating user information. ERROR_CODE#00000000001.</p>';
                        }
                    } else {
                        $query = "SELECT fname, lname FROM users WHERE user_id = $id";
                        $result = @mysqli_query($dbc, $query);
                        if(mysqli_num_rows($result) == 1){
                            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                            echo '<form action="edit_user.php" method="post">
                                <div class="form-group">
                                    <label for="fname">First Name:</label>
                                    <input type="text" name="fname" class="form-control" value="'.$row['fname'].'">
                                </div>
                                <div class="form-group">
                                    <label for="lname">Last Name:</label>
                                    <input type="text" name="lname" class="form-control" value="'.$row['lname'].'">
                                </div>
                                <input type="submit" class="btn btn-dark" value="Save Changes">
                                <input type="hidden" name="id" value="'.$id.'">
                            </form>';
                        } else {
                            echo '<p class="text-danger text-center">You are not recognized. Please log in and try again.</p>';
                            echo '<div class="back-button">';
                            echo '</div>';
                        }
                    }
                    mysqli_close($dbc);
                ?>
                <div class="back-button">
                    <a href="register.view.users.php" class="btn btn-secondary">Back</a>
                </div>
            </div>
        </div>
        <?php include('info.col.php'); ?>
        <?php include('footer.php'); ?>      
    </div>
</body>
</html>
