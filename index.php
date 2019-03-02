<?php 

    include_once './include/header.inc.php';
    include_once './include/sidebar.inc.php';

?>


<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a></div>
  </div>
  <div class="container-fluid">
  <h2>Regional Data</h2> 
    <hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
            <h5>List Region</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Region Name</th>
                  <th>Total Population</th>
                  <th>Total Income</th>
                  <th>Average Income</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>
                    <?php
                        include_once './include/db.inc.php';
                        $sql = "SELECT regions.id, regions.name, COUNT(person.id) AS Number, AVG(person.income) AS Average, SUM(person.income) AS Total FROM regions LEFT JOIN person ON regions.id = person.region_id GROUP BY regions.name";
                        $result = mysqli_query($conn, $sql);
                        $resultCheck = mysqli_num_rows($result);
                        if ($resultCheck > 0) {
                            while($row = mysqli_fetch_assoc($result)){
                              if ($row['Average'] < 1700000) {
                                $label = "label-important";
                              }elseif ($row['Average'] < 2200000){
                                $label = "label-warning";
                              }else {
                                $label = "label-success";
                              }
                              ?>

                                 <tr class="odd gradeX">
                                    <td><?php echo $row['id']; ?></td>
                                    <td><?php echo $row['name']; ?></td>
                                    <td><?php echo $row['Number']; ?></td>
                                    <td><?php echo $row['Total']; ?></td>
                                    <td><?php echo $row['Average']; ?></td>
                                    <td><span class="label <?php echo $label; ?>">    </span></td>

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

<?php 

    include_once './include/footer.inc.php'

?>