<?php include "php/read.php"; ?>
<?php 

    session_start();
    include_once 'db_conn.php';

    
    if(!$_SESSION['password']){
        header("location: login.php");
    }

?>

<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <link rel="shortcut icon" type="image/x-icon" href="https://production-assets.codepen.io/assets/favicon/favicon-8ea04875e70c4b0bb41da869e81236e54394d63638a1ef12fa558a4a835f1164.ico" />
  <link rel="mask-icon" type="" href="https://production-assets.codepen.io/assets/favicon/logo-pin-f2d2b6d2c61838f7e76325261b7195c27224080bc099486ddd6dccb469b8e8e6.svg" color="#111" />
  <title>CodePen - &lt;Table&gt; Responsive</title>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js" type="text/javascript"></script>

    <link href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css' rel='stylesheet'/>

    <link rel="stylesheet" href="css/read.css?v=<?php echo time(); ?>">
    
    <link rel="stylesheet" href="css/alert.css?v=<?php echo time(); ?>">

    <link rel="stylesheet" href="css/button.css?v=<?php echo time(); ?>">

  <script>
  window.console = window.console || function(t) {};
</script>

  
  
  <script>
  if (document.location.search.match(/type=embed/gi)) {
    window.parent.postMessage("resize", "*");
  }
</script>

</head>

<body translate="no" >

  <img src="img/Lasu_logo.PNG" alt="lasu logo">
  <h1><span>
      <!-- &lt; -->
    </span>LASU SIWES REPORT<span>
        <!-- &gt; -->
    </span> <span class="yellow">Report</span></h1>

  <?php if (isset($_GET['success'])) {?>

    
    <div class='content'>
        <div class="alert alert-success alert-white rounded">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <div class="icon"><i class="fa fa-check"></i></div>
            <strong>Success!</strong> <?php echo $_GET['success']; ?>!
        </div>
        
    </div>

    <?php } ?>


    <form action="search.php" method="GET">
        <input type="search" name="query" id="query">
        <button type="submit">Search</button>
    </form>



    <?php if(mysqli_num_rows($result)) {?>

    <table class="container">
        
        <thead>
            <tr>
                <th scope="col">Full Name</th>
                <th scope="col">Matric no.</th>
                <th scope="col">Department</th>
                <!-- <th scope="col">payee</th>
                <th scope="col">payer</th>
                <th scope="col">amount</th> -->
                <th scope="col">mode of entry</th>
                <th scope="col">update</th>
                <th scope="col">delete</th>
            </tr>
            
        </thead>

        
        <tbody>
            <?php 
                $i = 0;
                while($rows = mysqli_fetch_assoc($result)) { 
                $i++;
            ?>
                <tr>
                    <!-- <th scope="row" > <?=$i?> </th> -->
                    <td>
                        <a href="view_student.php?id=<?=$rows['id']?>">
                            <?=$rows['name']?>
                        </a> 
                    </td>
                    <td><?=$rows['matric_no']?></td>
                    <td><?=$rows['department']?></td>
                    <!-- <td><?=$rows['payee']?></td>
                    <td><?=$rows['payer']?></td>
                    <td><?=$rows['amount']?></td> -->
                    <td>
                        <?php
                        
                        
                            if($rows['mode_of_entry']){

                                echo 'DE';

                            } else {
                                echo "JAMB";
                            }
                        
                        ?>
                    
                    </td>
                    <td>
                        <a href="update.php?id=<?=$rows['id']?>" 
                        class="btn btn-success">Update</a>
                      
                    </td>
                    <td>
                        <a href="php/delete.php?id=<?=$rows['id']?>" 
                        class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>

        
    </table>

    <?php } ?>

    <div class="handle_button_container">


        <a class="btn btn--svg js-animated-button" href="middle_index.php"><span class="btn--svg__label"> create!</span><svg class="btn--svg__circle" width="190" x="0px" y="0px" viewBox="0 0 60 60" enable-background="new 0 0 60 60">

            <circle class="js-discover-circle" fill="green" cx="30" cy="30" r="28.7"></circle>
            </svg><svg class="btn--svg__border" x="0px" y="0px" preserveaspectratio="none" viewBox="2 29.3 56.9 13.4" enable-background="new 2 29.3 56.9 13.4" width="190">
                <g class="btn--svg__border--left js-discover-left-border" id="Calque_2">
                    <path fill="none" stroke="green" stroke-width="0.5" stroke-miterlimit="1" d="M30.4,41.9H9c0,0-6.2-0.3-6.2-5.9S9,30.1,9,30.1h21.4"></path>
                </g>
                <g class="btn--svg__border--right js-discover-right-border" id="Calque_3">
                    <path fill="none" stroke="green" stroke-width="0.5" stroke-miterlimit="1" d="M30.4,41.9h21.5c0,0,6.1-0.4,6.1-5.9s-6-5.9-6-5.9H30.4"></path>
                </g>
            </svg>

        </a>


    </div>
    

    <div class="handle_button_container">


        <a class="btn btn--svg js-animated-button" href="logout.php"><span class="btn--svg__label logout-button"> Logout! </span><svg class="btn--svg__circle" width="190" x="0px" y="0px" viewBox="0 0 60 60" enable-background="new 0 0 60 60">

            <circle class="js-discover-circle" fill="red" cx="30" cy="30" r="28.7"></circle>
            </svg><svg class="btn--svg__border" x="0px" y="0px" preserveaspectratio="none" viewBox="2 29.3 56.9 13.4" enable-background="new 2 29.3 56.9 13.4" width="190">
                <g class="btn--svg__border--left js-discover-left-border" id="Calque_2">
                    <path fill="none" stroke="red" stroke-width="0.5" stroke-miterlimit="1" d="M30.4,41.9H9c0,0-6.2-0.3-6.2-5.9S9,30.1,9,30.1h21.4"></path>
                </g>
                <g class="btn--svg__border--right js-discover-right-border" id="Calque_3">
                    <path fill="none" stroke="red" stroke-width="0.5" stroke-miterlimit="1" d="M30.4,41.9h21.5c0,0,6.1-0.4,6.1-5.9s-6-5.9-6-5.9H30.4"></path>
                </g>
            </svg>

        </a>


    </div>
    
    <!-- <a href="logout.php" class="link-primary">Logout</a> -->
  
  

</body>
</html>

