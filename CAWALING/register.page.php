<!doctype html>
<html lang="en">
    <head>
       <title> Register Page - r/nosleep Wiki </title>
       <meta charset="UTF-8">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">	   
	   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
       <meta charset=utf-8>
       <link href="https://fonts.googleapis.com/css2?family=Creepster&display=swap" rel="stylesheet">
	   <link rel="stylesheet" type="text/css" href="css designs/index.css">
       <link rel="stylesheet" type="text/css" href="css designs/indextext.css">
    </head>
    <body>
        <div id="container">
            <?php include('navlog.php'); ?>
            <?php include('mysqli.connect.php'); ?>
            <div id="content">
                <?php
                $errors = array(); 

                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    if (empty($_POST['fname'])) {
                        $errors[] = 'Please enter your first name.';
                    } else {
                        $fn = trim($_POST['fname']);
                    }

                    if (empty($_POST['lname'])) {
                        $errors[] = 'Please enter your last name.';
                    } else {
                        $ln = trim($_POST['lname']);
                    }

                    if (empty($_POST['email'])) {
                        $errors[] = 'Please enter your email.';
                    } else {
                        $email = trim($_POST['email']);
                    }

                    if (empty($_POST['psword1'])) {
                        $errors[] = 'Please enter your password.';
                    } else {
                        $psword1 = trim($_POST['psword1']); 
                        if ($psword1 != $_POST['psword2']) {
                            $errors[] = 'Your passwords do not match.';
                        } else {
                            $p_hashed = password_hash($psword1, PASSWORD_DEFAULT);  
                        }
                    }

                    if (empty($errors)) {
                        $query = "INSERT INTO users (fname, lname, email, psword, registration_date) VALUES (?, ?, ?, ?, NOW())";

                        $stmt = mysqli_prepare($dbc, $query);
                        mysqli_stmt_bind_param($stmt, 'ssss', $fn, $ln, $email, $p_hashed);

                        if (mysqli_stmt_execute($stmt)) {
                            header('Location: register-thanks.php');
                            exit();
                        } else {
                            echo '<h2>Error during registration. Please try again.</h2>';
                        }

                        mysqli_stmt_close($stmt);
                    } else {
                        echo '<div class="Error">';
                        echo '<h2>Error!</h2><p>The following error(s) occurred:<br>';
                        foreach ($errors as $ex) {
                            echo "→ $ex<br/>";
                        }
                        echo '</p><h4>Please try again</h4>';
                        echo '</div>';
                    }
                }
                ?>
                <div class="form-container">
                    <h3>Register</h3>
                    <form action="register.page.php" method="post">
                        <p><label class="label" for="fname">First Name: </label>
                        <input type="text" id="fname" name="fname" size="30" maxlength="40"
                        value="<?php if(isset($_POST['fname'])) echo $_POST['fname']?>"></p>

                        <p><label class="label" for="lname">Last Name: </label>
                        <input type="text" id="lname" name="lname" size="30" maxlength="40"
                        value="<?php if(isset($_POST['lname'])) echo $_POST['lname']?>"></p>

                        <p><label class="email" for="email">Email Address:  </label>
                        <input type="email" id="email" name="email" size="30" maxlength="50"
                        value="<?php if(isset($_POST['email'])) echo $_POST['email']?>"></p>

                        <p><label class="label" for="psword1">Password: </label>
                        <input type="password" id="psword1" name="psword1" size="25" maxlength="40"
                        value="<?php if(isset($_POST['psword1'])) echo $_POST['psword1']?>"></p>

                        <p><label class="label" for="psword2">Confirm Password: </label>
                        <input type="password" id="psword2" name="psword2" size="25" maxlength="40"
                        value="<?php if(isset($_POST['psword2'])) echo $_POST['psword2']?>"></p>

                        <p><input type="submit" id="submit" name="submit" value="Register"></p>
                    </form>
                </div>
            </div>
        </div>
    <?php include('footer.php'); ?>
    </body>
</html>
