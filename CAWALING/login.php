<!doctype html>
<html lang="en">
    <head>
        <title>Login - r/nosleep</title>
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
            <?php include('headerlog.php'); ?>
            <?php include('navlog.php'); ?>
            <div class="form-container">
                <?php
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    require('mysqli.connect.php');

                    // Validate inputs
                    $email = !empty($_POST['email']) ? trim($_POST['email']) : null;
                    $psword = !empty($_POST['psword']) ? trim($_POST['psword']) : null;

                    if (!$email) {
                        echo '<p class="text-danger">Please enter your email address.</p>';
                    }

                    if (!$psword) {
                        echo '<p class="text-danger">Please enter your password.</p>';
                    }

                    if ($email && $psword) {
                        // Prepare the SQL statement
                        $stmt = $dbc->prepare("SELECT user_id, fname, user_level, psword FROM users WHERE email = ?");
                        $stmt->bind_param("s", $email);
                        $stmt->execute();
                        $result = $stmt->get_result();

                        if ($result->num_rows === 1) {
                            $user = $result->fetch_assoc();

                            // Verify the password
                            if (password_verify($psword, $user['psword'])) {
                                session_start();
                                $_SESSION['user_id'] = $user['user_id'];
                                $_SESSION['fname'] = $user['fname'];
                                $_SESSION['user_level'] = (int) $user['user_level'];

                                $url = ($_SESSION['user_level'] === 1) ? 'admin.php' : 'members.php';
                                header('Location: ' . $url);
                                exit();
                            } else {
                                echo '<p class="text-danger">Invalid password. Please try again.</p>';
                            }
                        } else {
                            echo '<p class="text-danger">No account found with that email address. Please register first.</p>';
                        }

                        $stmt->close();
                    }
                    $dbc->close();
                }
                ?>
                <h3>Login</h3>
                <form action="login.php" method="post">
                    <p>
                        <label class="label" for="email">Email Address: </label>
                        <input type="email" id="email" name="email" size="30" maxlength="50"
                               value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>">
                    </p>
                    <p>
                        <label class="label" for="psword">Password: </label>
                        <input type="password" id="psword" name="psword" size="25" maxlength="40">
                    </p>
                    <p>
                        <input type="submit" id="submit" name="submit" value="Login">
                    </p>
                </form>
            </div>
        </div>
        <?php include('info.col.php'); ?>
        <?php include('footer.php'); ?>      
    </body>
</html>
