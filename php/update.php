<?php 


if(isset($_GET['id'])) {

    include "db_conn.php";
    
    function validate($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $id = validate($_GET['id']);

    
    $sql = "SELECT * FROM report WHERE id=$id";

    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
    } else {
        header("Location: read.php");
    }

} else if (isset($_POST['update'])) {
    
    include "../db_conn.php";

    function validate($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }


    $title = validate($_POST['title']);
    $description = validate($_POST['description']);
    $payee = validate($_POST['payee']);
    $payer = validate($_POST['payer']);
    $amount = validate($_POST['amount']);
    $account_number = validate($_POST['account_number']);
    $transaction_type = validate($_POST['transaction_type']);
    $id = validate($_POST['id']);

    $user_data = 'title='.$title
                    .'&description='.$description
                    .'&payee='.$payee
                    .'&payer='.$payer
                    .'&amount='.$amount
                    .'&account_number='.$account_number
                    .'&transaction_type='.$transaction_type;

    // echo $user_data;

    if(empty($title)) {
        header("Location: ../middle_index.php?error=title is required&$user_data"); 
    }
    else if (empty($description)) {
        header("Location: ../middle_index.php?error=description  is required&$user_data"); 
    }
    else if (empty($payee)) {
        header("Location: ../middle_index.php?error=payee  is required&$user_data"); 
    }
    else if (empty($payer)) {
        header("Location: ../middle_index.php?error=payer  is required&$user_data"); 
    }
    else if (empty($amount)) {
        header("Location: ../middle_index.php?error=amount  is required&$user_data"); 
    }
    else if (empty($account_number)) {
        header("Location: ../middle_index.php?error=account_number  is required&$user_data"); 
    }
    // else if (empty($transaction_type)) {
    //     header("Location: ../middle_index.php?error=transaction_type  is required&$user_data"); 
    // }
    else {
        
        $sql = "UPDATE report
                -- SET title='$title', description='$description', payee='$payee', payer='$payer', amount='$amount', account_number='$account_number'
                SET title='$title', description='$description', payee='$payee', payer='$payer', amount='$amount', account_number='$account_number', transaction='$transaction_type'
                WHERE id=$id";

        $result = mysqli_query($conn, $sql);

        if($result) {
            header("Location: ../read.php?success=successfully updated");
        }
        else {
            // header("Location: 
            // ../update.php?id=$id&error=unknown error occurred&$user_data");
        }

    }

} 

else {
    header("Location: read.php");
}


?>
