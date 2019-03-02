<?php

    if (isset($_POST['submit'])) {

        include_once 'db.inc.php';

        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $pwd = mysqli_real_escape_string($conn, $_POST['pwd']);

        if (empty($email) || empty($pwd)) {
            mysqli_close($conn);
            header("Location: ../register.php?register=empty");
            exit();

        }else{
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                mysqli_close($conn);
                header("Location: ../register.php?register=invalidemail");
                exit();
            }else{
                $sql = "SELECT * FROM users WHERE email='$email'";
                $result = mysqli_query($conn, $sql);
                $resultChecked = mysqli_num_rows($result);
                if ($resultChecked > 0) {
                    mysqli_close($conn);
                    header("Location: ../register.php?register=usertaken");
                    exit();
                }else{
                    
					date_default_timezone_set('Asia/Jakarta');
					$now = date('Y-m-d H:i:s');
                    $hashPwd = password_hash($pwd, PASSWORD_DEFAULT);
                    $sql = "INSERT INTO users (email, password, plain_pwd, created_at) VALUES ('$email', '$hashPwd', '$pwd', '$now');";
                    mysqli_query($conn, $sql);
                    mysqli_close($conn);
                    header("Location: ../register.php?register=success");
                    exit();
                }
            
            }
    
        }
    

    }else{
        mysqli_close($conn);
        header("Location: ../register.php?register=error");
        exit();
    }

?>