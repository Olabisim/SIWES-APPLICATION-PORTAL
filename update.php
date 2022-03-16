
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
                    id="title"
                    name="title"
                    placeholder="Title" 
                    class="input" 
                    value="<?=$row['title'] ?>"
            />

            <input type="text" 
                    id="description"
                    name="description"
                    placeholder="description" 
                    class="input" 
                    value="<?=$row['description'] ?>"
            />

            <input type="text" 
                    id="payee"
                    name="payee"
                    placeholder="payee" 
                    class="input" 
                    value="<?=$row['payee'] ?>"
            />

            <input type="text" 
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
            />


            <div>
                <p>Choose your payment option</p>

                   <input class="checkbox-tools" 
                        type="radio" 
                        name="transaction_type" 
                        id="eclipse" 
                        value="1"
                        <?php if($row['transaction'] == 1) echo 'checked' ?>
                    />

                <label for="eclipse">
                    Payment
                </label>

                <input class="checkbox-tools" 
                        type="radio" 
                        name="transaction_type" 
                        id="square"
                        value="0"
                        <?php if($row['transaction'] == 0) echo 'checked' ?>
                    />

                <label for="square">
                Purchase
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