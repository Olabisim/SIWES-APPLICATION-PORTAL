<?php 


if (isset($_POST['create'])) {

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
    else if (empty($transaction_type)) {
        header("Location: ../middle_index.php?error=transaction_type  is required&$user_data"); 
    }
    else {
        
        $sql = "INSERT INTO report(title, description, payee, payer, amount, Account_Number, transaction) VALUES('$title', '$description', '$payee', '$payer', '$amount',  '$account_number', '$transaction_type')";

        $result = mysqli_query($conn, $sql);

        if($result) {
            header("Location: ../read.php?success=successfully created");
        }
        else {
            header("Location: 
            ../index.php?error=unknown error occurred&$user_data");
        }

    }

}

?>