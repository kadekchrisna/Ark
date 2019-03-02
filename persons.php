<?php 

    include_once './include/header.inc.php';
    include_once './include/sidebar.inc.php';

?>
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="persons.php" class="current">Person</a> </div>
    <h1>Person</h1> 
  </div>
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
        <div class="widget-content"> <a href="#myModal" data-toggle="modal" class="btn btn-success">Add Person</a></div>  
          <div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
            <h5>List Persons</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Address</th>
                  <th>Region</th>
                  <th>Income</th>
                  <th>Created At</th>
                  <th>Created By</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                    <?php
                        include_once './include/db.inc.php';
                        $sql = "SELECT person.name AS B, person.id, person.income, person.address, regions.name, person.created_at, users.email FROM person INNER JOIN users INNER JOIN regions ON regions.id = person.region_id AND person.created_by = users.id ORDER BY regions.created_at ASC";
                        $result = mysqli_query($conn, $sql);
                        $resultCheck = mysqli_num_rows($result);
                        if ($resultCheck > 0) {
                            while($row = mysqli_fetch_assoc($result)){?>

                                 <tr class="odd gradeX">
                                    <td><?php echo $row['id']; ?></td>
                                    <td><?php echo $row['B']; ?></td>
                                    <td><?php echo $row['address']; ?></td>
                                    <td><?php echo $row['name']; ?></td>
                                    <td><?php echo $row['income']; ?></td>
                                    <td><?php echo $row['created_at']; ?></td>
                                    <td><?php echo $row['email']; ?></td>
                                    <td><a href="edit.inc.php?edit=<?php echo $row['id']; ?>" class="btn btn-primary btn-mini">Edit</a> <a href="./include/person.inc.php?delete=<?php echo $row['id']; ?>" class="btn btn-danger btn-mini deleteRecord">Delete</a></td>

                                </tr> 
                        
                    <?php
                            }
                        }
                    ?>
                              
              </tbody>
            </table>
          </div>
        </div>
    </div>
  </div>
</div>
<div id="myModal" class="modal hide">
    <div class="modal-header">
        <button data-dismiss="modal" class="close" type="button">×</button>
        <h3>Add Person</h3>
    </div>
    <form action="include/person.inc.php" method="POST">
        <div class="modal-body">
            <div class="control-group">
                <label class="control-label">Name :</label>
                <div class="controls">
                    <input type="text" name="name" class="span5" placeholder="Name" />
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Address :</label>
                <div class="controls">
                <textarea class="span5" name="address" ></textarea>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Select Region</label>
                <div class="controls">
                   <select name="region" class="span5" >            
            <?php
                include_once './include/db.inc.php';
                
                $sql = "SELECT * FROM regions ORDER BY name ASC";
                $result = mysqli_query($conn, $sql);
                mysqli_close($conn);
                $resultCheck = mysqli_num_rows($result);
                if ($resultCheck > 0) {
                    while($row = mysqli_fetch_assoc($result)){?>
                        <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
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
                    <input type="number" name="income" class="span5" placeholder="Income" />
                </div>
            </div>
        </div>
        <div class="modal-footer"><button type="submit" name="person" class="btn btn-primary" href="#">Confirm</button>  <a data-dismiss="modal" class="btn">Cancel</a> </div>
    </form>
</div>

<?php 

    include_once './include/footer.inc.php'

?>