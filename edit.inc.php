<?php

    include_once './include/header.inc.php';
    include_once './include/sidebar.inc.php';

    if (isset($_GET['edit'])) {
        $id = $_GET['edit'];
        include_once './include/db.inc.php';
                
        $sql = "SELECT * FROM person WHERE id = '$id'";
        $result = mysqli_query($conn, $sql);
        
        $row = mysqli_fetch_assoc($result);

    

?>

<div id="content">
    <div id="content-header">
        <div id="breadcrumb"> <a href="index.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="region.php" class="current">Region</a> </div>
        <h1>Region</h1> 
    </div>
    <div class="container-fluid">
    <form action="include/person.inc.php" method="POST">
        <div class="control-group">
            <label class="control-label">Name :</label>
            <div class="controls">
                <input type="text" name="name" class="span5" value="<?php echo $row['name']; ?>" placeholder="Name" />
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">Address :</label>
            <div class="controls">
                <textarea class="span5" name="address" ><?php echo $row['address']; ?></textarea>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">Select Region</label>
            <div class="controls">
                <select name="region" class="span5" >            
            <?php

                $sqlReg = "SELECT * FROM regions ORDER BY name ASC";
                $resultReg = mysqli_query($conn, $sqlReg);
                mysqli_close($conn);
                $resultCheck = mysqli_num_rows($resultReg);
                if ($resultCheck > 0) {
                    while($rowReg = mysqli_fetch_assoc($resultReg)){
                        if ($rowReg['id'] == $row['region_id']) {
                            $selected = "selected";
                        }else {
                            $selected = "";
                        }
                        ?>
                    
                        <option value="<?php echo $rowReg['id'];?> "<?php echo $selected;?>><?php echo $rowReg['name']; ?></option>
            <?php
                    }
                    
                }
            ?>

                </select>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">Income :</label>
            <div class="controls">
                <input type="number" name="income" class="span5" value="<?php echo $row['income']; ?>"  placeholder="Income" />
            </div>
        </div>
        <input type="hidden" name="id" class="span5" value="<?php echo $row['id']; ?>" />
        <button type="submit" name="updatePerson" class="btn btn-primary" href="#">Confirm</button>  <a href="persons.php" data-dismiss="modal" class="btn">Cancel</a> 
    </form>
    </div>
</div>

    

<?php
    }else{
        mysqli_close($conn);
        header("Location: persons.php");
        exit();
    }
    include_once './include/footer.inc.php';

?>

