<?php 

    include_once './include/header.inc.php';
    include_once './include/sidebar.inc.php';

?>

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="region.php" class="current">Region</a> </div>
    <h1>Region</h1> 
  </div>
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
        <div class="widget-content"> <a href="#myModal" data-toggle="modal" class="btn btn-success">Add Region</a></div>  
          <div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
            <h5>List Region</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Region Name</th>
                  <th>Created At</th>
                  <th>Created By</th>
                </tr>
              </thead>
              <tbody>
                    <?php
                        include_once './include/db.inc.php';
                        $sql = "SELECT regions.id, regions.name, regions.created_at, users.email FROM regions INNER JOIN users ON regions.created_by = users.id ORDER BY regions.created_at ASC";
                        $result = mysqli_query($conn, $sql);
                        $resultCheck = mysqli_num_rows($result);
                        if ($resultCheck > 0) {
                            while($row = mysqli_fetch_assoc($result)){?>

                                 <tr class="odd gradeX">
                                    <td><?php echo $row['id']; ?></td>
                                    <td><?php echo $row['name']; ?></td>
                                    <td><?php echo $row['created_at']; ?></td>
                                    <td><?php echo $row['email']; ?></td>

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
        <h3>Add Region</h3>
    </div>
    <form action="include/regionadd.inc.php" method="POST">
        <div class="modal-body">
            <div class="control-group">
                <label class="control-label">Region Name :</label>
                    <div class="controls">
                        <input type="text" name="name" class="span5" placeholder="Region name" />
                    </div>
              </div>
        </div>
        <div class="modal-footer"><button type="submit" name="region" class="btn btn-primary" href="#">Confirm</button>  <a data-dismiss="modal" class="btn">Cancel</a> </div>
    </form>
</div>

<?php 

    include_once './include/footer.inc.php'

?>