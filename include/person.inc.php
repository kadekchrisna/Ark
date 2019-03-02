<?php
    session_start();
    if (isset($_POST['person'])) {
        include 'db.inc.php';

        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $address = mysqli_real_escape_string($conn, $_POST['address']);
        $region = mysqli_real_escape_string($conn, $_POST['region']);
        $income = mysqli_real_escape_string($conn, $_POST['income']);
        $idPerson = mysqli_real_escape_string($conn, $_POST['id']);

        $id = $_SESSION['id'];

        if (empty($name) ||  empty($address) || empty($region) || empty($income)) {
            mysqli_close($conn);
			header("Location: ../persons.php?input=check");
			exit();
        }else{
            date_default_timezone_set('Asia/Jakarta');
			$now = date('Y-m-d H:i:s');
            $sql = "INSERT INTO person (name, region_id, address, income, created_at, created_by) VALUES ('$name', '$region', '$address', '$income', '$now', '$id');";
            mysqli_query($conn, $sql);
            mysqli_close($conn);
            header("Location: ../persons.php?input=success");
            exit();
        }

    }elseif (isset($_POST['updatePerson'])) {
        include 'db.inc.php';

        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $address = mysqli_real_escape_string($conn, $_POST['address']);
        $region = mysqli_real_escape_string($conn, $_POST['region']);
        $income = mysqli_real_escape_string($conn, $_POST['income']);
        $idPerson = mysqli_real_escape_string($conn, $_POST['id']);

        $id = $_SESSION['id'];



        if (empty($name) ||  empty($address) || empty($region) || empty($income)) {
            mysqli_close($conn);
			header("Location: ../persons.php?input=check");
			exit();
        }else{
            date_default_timezone_set('Asia/Jakarta');
			$now = date('Y-m-d H:i:s');
            $sql = "UPDATE person SET name = '$name', region_id = '$region', address = '$address', income = '$income', created_at = '$now', created_by = '$id' WHERE id = '$idPerson'";
            mysqli_query($conn, $sql);
            mysqli_close($conn);
            header("Location: ../persons.php?input=success");
            exit();
        }
    }elseif (isset($_GET['delete'])) {
        
        $id = $_GET['delete'];
        include 'db.inc.php';
        $sql = "DELETE FROM person WHERE id = '$id'";
        mysqli_query($conn, $sql);
        mysqli_close($conn);
        header("Location: ../persons.php?input=success");
        exit();


    }
    
    
    
    else{
        mysqli_close($conn);
        header("Location: ../persons.php?input=error");
        exit();
    }
    
?>