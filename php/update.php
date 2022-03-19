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


    $name = validate($_POST['name']);
    $matric_no = validate($_POST['matric_no']);
    $department = validate($_POST['department']);
    // $payer = validate($_POST['payer']);
    // $amount = validate($_POST['amount']);
    // $account_number = validate($_POST['account_number']);
    $mode_of_entry = validate($_POST['mode_of_entry']);
    $id = validate($_POST['id']);

    $user_data = 'name='.$name
                    .'&matric_no='.$matric_no
                    .'&department='.$department
                    // .'&payer='.$payer
                    // .'&amount='.$amount
                    .'&account_number='.$account_number
                    .'&mode_of_entry='.$mode_of_entry;

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
    // else if (empty($mode_of_entry)) {
    //     header("Location: ../middle_index.php?error=mode_of_entry  is required&$user_data"); 
    // }
    else {
        
        $sql = "UPDATE report
                -- SET name='$name', matric_no='$matric_no', department='$department', payer='$payer', amount='$amount', account_number='$account_number'
                SET name='$name', matric_no='$matric_no', department='$department', mode_of_entry='$mode_of_entry'
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
