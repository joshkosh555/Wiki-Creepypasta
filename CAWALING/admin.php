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
       <title>Welcome Admin - r/nosleep</title>
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
		<?php include('headeradmin.php');?>
		<?php include('navadmin.php');?>
	
			<div class="w3-container">
            <div class="analytics">
                <img src="images/dash.png" alt="Dashboard" class="img-fluid rounded">
                <p class="image-title">Analytics</p>
        </div>
        </div>
        <?php include('info.col.php'); ?>
        <?php include('footer.php'); ?>      
	</body>
</html>