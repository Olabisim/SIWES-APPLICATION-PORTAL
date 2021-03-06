
<?php include 'php/update.php'; ?>
<?php 

    session_start();
    include_once 'db_conn.php';

    
    if(!$_SESSION['password']){
        header("location: login.php");
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>

    <title>Update</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <meta author="">
    <link rel="icon" href="img/logo.png">
    <meta property="og:type" content="website">
    <meta charset="utf-8">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="css/login.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="css/radio_button.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="css/arrow_animation.css?v=<?php echo time(); ?>">

</head>

<style>
 
    body {
        overflow-x: hidden;
        /* overflow-y:hidden; */
    }

</style>





<body>



    <div class="login-form">

        <div class="front-face">
            <span class="login-text">REPORT</span>
            
        </div> 
        <?php if (isset($_GET['error'])) {?>

            <div class="alert alert-danger" role="alert">
                <?php echo $_GET['error']; ?>
            </div>

        <?php } ?>

        <form action="php/update.php" method="post">
        

            <input type="text" 
                    name="id" 
                    value="<?=$row['id']?>"
                    hidden >
                    
            <input type="text" 
                    id="name"
                    name="name"
                    placeholder="name" 
                    class="input" 
                    value="<?=$row['name'] ?>"
            />

            <input type="text" 
                    id="matric_no"
                    name="matric_no"
                    placeholder="matric_no" 
                    class="input" 
                    value="<?=$row['matric_no'] ?>"
            />

            <input type="text" 
                    id="department"
                    name="department"
                    placeholder="department" 
                    class="input" 
                    value="<?=$row['department'] ?>"
            />

            <input type="text" 
                    id="email"
                    name="email"
                    placeholder="email" 
                    class="input" 
                    value="<?=$row['email'] ?>"
            />

            <input type="text" 
                    id="start_month"
                    name="start_month"
                    placeholder="start_month" 
                    class="input" 
                    value="<?=$row['start_month'] ?>"
            />

            <input type="text" 
                    id="end_month"
                    name="end_month"
                    placeholder="end_month" 
                    class="input" 
                    value="<?=$row['end_month'] ?>"
            />

            <!-- <input type="text" 
                    id="payer"
                    name="payer"
                    placeholder="payer" 
                    class="input" 
                    value="<?=$row['payer'] ?>"
            />

            <input type="number" 
                    id="account_Number"
                    name="account_number"
                    placeholder="Account Number" 
                    class="input" 
                    value="<?=$row['Account_Number'] ?>"
            />

            <input type="number" 
                    id="amount"
                    name="amount"
                    placeholder="amount" 
                    class="input" 
                    style="appearance: textfield;
                    -webkit-appearance: none; 
                    margin: 0;"
                    value="<?=$row['amount'] ?>"
            /> -->


            <div>
                <p>Choose your mode of entry</p>

                   <input class="checkbox-tools" 
                        type="radio" 
                        name="mode_of_entry" 
                        id="eclipse" 
                        value="1"
                        <?php if($row['mode_of_entry'] == 1) echo 'checked' ?>
                    />

                <label for="eclipse">
                    DE
                </label>

                <input class="checkbox-tools" 
                        type="radio" 
                        name="mode_of_entry" 
                        id="square"
                        value="2"
                        <?php if($row['mode_of_entry'] == 2) echo 'checked' ?>
                    />

                <label for="square">
                    JAMB
                </label>

            </div>
            


            <button name='update' class="input-btn" type="submit">Update</button>
            <a href="read.php" class="link-primary">View</a>
        
        </form>

    </div>

    <div class="wrapper">

        <div class="arrow">
            <div class="arrow-body"></div>
            <div class="down-arrow-head"></div>
        </div> 


    </div> 
  







</body>
</html>