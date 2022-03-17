<?php 

    session_start();
    include_once 'db_conn.php';

    
    if(!$_SESSION['password']){
        header("location: login.php");
    }

?>


<!DOCTYPE html>
<html>
<head>
    <title>Login - SAAV</title>
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
    <link rel="stylesheet" href="css/neat_alert.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="css/material_design_icons.css?v=<?php echo time(); ?>">
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

        <div class="alert alert-error">

            <div class="icon__wrapper">
                <span class="mdi mdi-alert-outline"></span>
            </div>

            <p>
                <?php echo $_GET['error']; ?> 
                <!-- <a href="#">Button Component.</a> -->
            </p>

            <span class="mdi mdi-open-in-new open"></span>
            <span class="mdi mdi-close close"></span>

        </div> 

        <!-- <div class="alert alert-danger" role="alert">
            <?php echo $_GET['error']; ?>
        </div> -->

    <?php } ?>

        <form action="php/create.php" method="post">
        
            <input type="text" 
                    id="title"
                    name="title"
                    placeholder="Title" 
                    class="input" 
                    value="<?php if(isset($_GET['title']))
                                            echo($_GET['title']); ?>"
            />

            <input type="text" 
                    id="description"
                    name="description"
                    placeholder="description" 
                    class="input" 
                    value="<?php if(isset($_GET['description']))
                                            echo($_GET['description']); ?>"
            />

            <input type="text" 
                    id="payee"
                    name="payee"
                    placeholder="payee" 
                    class="input" 
                    value="<?php if(isset($_GET['payee']))
                                            echo($_GET['payee']); ?>"
            />

            <input type="text" 
                    id="payer"
                    name="payer"
                    placeholder="payer" 
                    class="input" 
                    value="<?php if(isset($_GET['payer']))
                                            echo($_GET['payer']); ?>"
            />

            <input type="number" 
                    id="account_number"
                    name="account_number"
                    placeholder="Account Number" 
                    class="input" 
                    style="appearance: textfield;"
                    value="<?php if(isset($_GET['account_number']))
                                            echo($_GET['account_number']); ?>"
            />

            <input type="number" 
                    id="amount"
                    name="amount"
                    placeholder="amount" 
                    class="input" 
                    style="appearance: textfield;
                    -webkit-appearance: none; 
                    margin: 0;"
                    value="<?php if(isset($_GET['amount']))
                                            echo($_GET['amount']); ?>"
            />

            <div>
                <p style="color: #70757d;">Choose your payment option</p>

                <input class="checkbox-tools" 
                        type="radio" 
                        name="transaction_type" 
                        id="eclipse" 
                        value="1">
                
                <label for="eclipse">
                Payment
                </label>

                <input class="checkbox-tools" 
                        type="radio" 
                        name="transaction_type" 
                        id="square"
                        value="0">

                <label for="square">
                Purchase
                </label>

            </div>

            <button 
                name='create' 
                class="input-btn"
                style="background: none"
                
            >create</button>

            <span class="span_link">

                <a href="read.php">ALL REPORTS</a>

            </span>
        
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
