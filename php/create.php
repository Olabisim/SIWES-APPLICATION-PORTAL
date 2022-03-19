<?php 


if (isset($_POST['create'])) {

    include "../db_conn.php";

    function validate($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    // by name i meant full name
    $name = validate($_POST['name']);
    $matric_no = validate($_POST['matric_no']);
    $department = validate($_POST['department']);
    // $payer = validate($_POST['payer']);
    // $amount = validate($_POST['amount']);
    // $account_number = validate($_POST['account_number']);
    $mode_of_entry = validate($_POST['mode_of_entry']);

    $user_data = 'name='.$name
                    .'&matric_no='.$matric_no
                    .'&department='.$department
                    .'&mode_of_entry='.$mode_of_entry;
                    // .'&payer='.$payer
                    // .'&amount='.$amount
                    // .'&account_number='.$account_number

    // echo $user_data;

    if(empty($name)) {
        header("Location: ../middle_index.php?error=name is required&$user_data"); 
    }
    else if (empty($matric_no)) {
        header("Location: ../middle_index.php?error=matric_no  is required&$user_data"); 
    }
    else if (empty($department)) {
        header("Location: ../middle_index.php?error=department  is required&$user_data"); 
    }
    // else if (empty($payer)) {
    //     header("Location: ../middle_index.php?error=payer  is required&$user_data"); 
    // }
    // else if (empty($amount)) {
    //     header("Location: ../middle_index.php?error=amount  is required&$user_data"); 
    // }
    // else if (empty($account_number)) {
    //     header("Location: ../middle_index.php?error=account_number  is required&$user_data"); 
    // }
    else if (empty($mode_of_entry)) {
        header("Location: ../middle_index.php?error=mode_of_entry  is required&$user_data"); 
    }
    else {
        
        $sql = "INSERT INTO report(name, matric_no, department, mode_of_entry) VALUES('$name', '$matric_no', '$department', '$mode_of_entry')";
        // $sql = "INSERT INTO report(name, matric_no, department, payer, amount, Account_Number, transaction) VALUES('$name', '$matric_no', '$department', '$payer', '$amount',  '$account_number', '$mode_of_entry')";

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