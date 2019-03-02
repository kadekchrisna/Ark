<!DOCTYPE html>
<html lang="en">
    
<head>
        <title>Register</title><meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" href="css/bootstrap.min.css" />
		<link rel="stylesheet" href="css/bootstrap-responsive.min.css" />
        <link rel="stylesheet" href="css/matrix-login.css" />
        <link href="font-awesome/css/font-awesome.css" rel="stylesheet" />
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>

    </head>
    <body>
        <div id="loginbox">            
            <form id="loginform" class="form-vertical" action="include/register.inc.php" method="POST">
                <?php 

                    if (empty($_GET)) {
                    }else{
                        $response = $_GET['register'];
                        if ($response == 'usertaken') {
                            echo '
                            <div class="form-label-group">
                                <div class="alert alert-danger" role="alert">
                                    Username telah dipakai
                                </div>
                            </div>';
                                               
                        }
                    }

                ?>
				 <div class="control-group normal_text"> <h3>Register</h3></div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_lg"><i class="icon-user"> </i></span><input type="email" name="email" placeholder="Username" />
                        </div>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_ly"><i class="icon-lock"></i></span><input type="password" name="pwd" placeholder="Password" />
                        </div>
                    </div>
                </div>
                <div class="form-actions">
                    <button class="pull-right btn btn-success" type="submit" name="submit">Sign Up</button>
                </div>
            </form>
        </div>
        
        <script src="js/jquery.min.js"></script>  
        <script src="js/matrix.login.js"></script> 
    </body>

</html>
