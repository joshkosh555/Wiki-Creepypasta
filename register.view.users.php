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
       <title>View Users - r/nosleep</title>
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
		<?php include('navadmin.php');?>
	        <div class="content">
                <h5>Registered Users</h5>
                <p>
                    <?php
                        require("mysqli.connect.php");

                        $query = "SELECT CONCAT(lname, ', ', fname) as fullname, email, DATE_FORMAT(registration_date, '%M %D %Y') as regdat, user_id FROM users ORDER BY user_id ASC";
                        $result = @mysqli_query($dbc, $query); 
                        if (mysqli_num_rows($result) > 0){
                            echo '<table>
                            <tr>
                            <td>Full Name</td>
                            <td>Email</td>
                            <td>Registered Date</td>
                            <td style="text-align: center;">Actions</td>
                            </tr>';
                            while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                                echo '<tr>';
                                echo '<td>'.$row['fullname'].'</td>';
                                echo '<td>'.$row['email'].'</td>';
                                echo '<td>'.$row['regdat'].'</td>';
                                echo '<td style="text-align: center;">
                                        <div style="display: flex; justify-content: space-between; align-items: center; width: 85%;">
                                            <a href="edit_user.php?id='.$row["user_id"].'" style="display: inline-block; text-align: center; opacity: 0.7;">
                                                <img src="images/edit.png" alt="Edit" style="width:30px; height:30px; margin-bottom: 5px; margin-left: 25px;"> Edit
                                            </a>
                                            <a href="delete_user.php?id='.$row["user_id"].'" style="display: inline-block; text-align: center; opacity: 0.7;">
                                                <img src="images/delete.png" alt="Delete" style="width:30px; height:30px; margin-bottom: 5px; margin-right: 8px;"> Delete
                                            </a>
                                      </td>';
                                echo '</tr>';
                            
                            }
                            echo '</table';
                        }else {
                            echo '<p class="error">The current registered users could not be retrieved. Contact the system administrator</p>';
                        }
                        mysqli_close($dbc)
                    ?>
                </p>
        <?php include('footer.php'); ?>      
	</body>
</html>