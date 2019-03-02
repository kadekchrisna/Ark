<?php
    session_start();
    if (isset($_POST['region'])) {

        include 'db.inc.php';

        $name = mysqli_real_escape_string($conn, $_POST['name']);

        $id = $_SESSION['id'];

        if (empty($name)) {
            mysqli_close($conn);
			header("Location: ../region.php?input=check");
			exit();
        }else{
            date_default_timezone_set('Asia/Jakarta');
			$now = date('Y-m-d H:i:s');
            $sql = "INSERT INTO regions (name, created_at, created_by) VALUES ('$name', '$now', '$id');";
            mysqli_query($conn, $sql);
            mysqli_close($conn);
            header("Location: ../region.php?input=success");
            exit();
        }

    }else{
        mysqli_close($conn);
        header("Location: ../region.php?input=error");
        exit();
    }


?>