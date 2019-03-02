<?php
    session_start();  
    if (isset($_POST['login'])) {
        
        include 'db.inc.php';

        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $pwd = mysqli_real_escape_string($conn, $_POST['pwd']);

        if (empty($email) || empty($pwd)) {
			mysqli_close($conn);
			header("Location: ../login.php?login=empty");
			exit();
		}else{
			$sql = "SELECT * FROM users WHERE email = '$email'";
			$result = mysqli_query($conn, $sql);
			$resultCheck = mysqli_num_rows($result);
			if ($resultCheck < 1 ) {
				mysqli_close($conn);
				header("Location: ../login.php?login=error");
				exit();
			}else{
				if ($row = mysqli_fetch_assoc($result)) {
					$hasingPwd = password_verify($pwd, $row['password']);
					if ($hasingPwd == false) {	
						mysqli_close($conn);
						header("Location: ../login.php?login=error");
						exit();
					}elseif ($hasingPwd == true) {

                        $_SESSION['u_id'] = $row['iduser'];
								$_SESSION['id'] = $row['id'];
								setcookie('id', $row['id'], time()+60*60*7);
								mysqli_close($conn);
								header("Location: ../index.php?login=success");
								exit();
                    }
                }
            }
        }
					
    }else{
		mysqli_close($conn);
		header("Location: ../login.php?login=error");
		exit();
	}

?>