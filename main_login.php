
<?php
    session_start();
    ob_start();
    include 'db_conn.php';

    if(isset($_POST['submit'])){
        
        $uname = $_POST['uname'];
        $password = $_POST['password'];
        
        $uname = htmlentities(stripslashes(mysqli_real_escape_string($conn, $uname)));
        $password = htmlentities(stripslashes(mysqli_real_escape_string($conn, $password)));
        
        $query = "select * from admin where email = '$uname' AND password = '$password'";
        $select_user_query = mysqli_query($conn, $query) or die(mysqli_error($conn));


        $countUser = mysqli_num_rows($select_user_query);
        if($countUser == 1)
        {
           while($row = mysqli_fetch_array($select_user_query)){
            $_SESSION['email'] = $row['email'];
            $_SESSION['password'] = $row['password'];

            header('location: read.php');
           };
        

       } else {
            header('location: login.php?error=Wrong Username or Password'); 
       }
 
 ob_end_flush();       
    }
?>
