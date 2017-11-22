<?php
session_start();
include 'connection.php';

?>
<!DOCTYPE html>
<html class="no-js">
    
    <head>
        <title>Sales Management System</title>
        <!-- Bootstrap -->
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
        <link href="vendors/easypiechart/jquery.easy-pie-chart.css" rel="stylesheet" media="screen">
        <link href="assets/styles.css" rel="stylesheet" media="screen">
        <script src="vendors/modernizr-2.6.2-respond-1.1.0.min.js"></script>

        <link href="assets/DT_bootstrap.css" rel="stylesheet" media="screen">
    </head>
    
    <body>
    <?php 
        include 'header.php';
        ?>
        <div class="container-fluid">
            <div class="row-fluid">
                <div class="span3" id="sidebar">
                 <?php

                 switch ($_SESSION['type']) 
                 {
                     case 'default':
                        include 'admin.php';
                             break;
                     case 'admin':
                        include 'admin.php';
                         break;
                         case 'cashier':
                        include 'cashier.php';
                             break;
                     default:
                         # code...
                         break;
                 }

                    ?>
                </div>
                
                <!--/span-->
                 <div class="span9" id="content">
                      <!-- morris stacked chart -->
                    <div class="row-fluid">
                        <!-- block -->
                        <?php echo isset($_SESSION['erroruser']) ? $_SESSION['erroruser']: '';
                        unset($_SESSION['erroruser']);
                        ?>
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Add Suppliers</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                     <form class="form-horizontal" method="post" action="./execute/savesupplier.php" parsley-validate>
                                      <fieldset>
                                        <?php 
                                    
$letter = 'SP';
        function numberletter() 
        {
            $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
            srand((double)microtime()*1000000);
            $i = 0;
            $passii = '' ;
            while ($i <= 8) {
              $num = rand() % 33;
              $tmp = substr($chars, $num, 1);
              $passii = $passii . $tmp;
              $i++;
            }
            return $passii;
        }
        $ccnumbers = numberletter();
        $confirmation = $letter.'-'.$ccnumbers;
                                        ?>
                                        <legend>Fill up form </legend>
                                         <div class="control-group">
                                          <label class="control-label" for="focusedInput">Supplier ID</label>
                                          <div class="controls">
                                           <input type="text" readonly value="<?php echo $confirmation?>" name="supplier_id">
                                          </div>
                                        </div>
                                       
                                       
                                     
                                        <div class="control-group">
                                          <label class="control-label">Supplier Name</label>
                                          <div class="controls">
                                            <input class="input-xlarge focused" type="text" name="supplier_name" required>
                                          </div>
                                        </div>
                                        <div class="control-group">
                                          <label class="control-label" for="disabledInput">Address</label>
                                          <div class="controls">
                                            <input class="input-xlarge focused" type="text" name="address" required>
                                          </div>
                                        </div>
                                         <div class="control-group">
                                          <label class="control-label" for="disabledInput">Contact No.</label>
                                          <div class="controls">
                                            <input class="input-xlarge focused" type="text" name="contact" required>
                                          </div>
                                        </div>
                                       
                                        <div class="form-actions">
                                          <input type="submit" class="btn btn-primary btn-large" name="submit" value="ADD SUPPLIER">
                                          <button type="reset" class="btn btn-danger btn-large">RESET</button>
                                        </div>
                                      </fieldset>
                                    </form>

                                </div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>

                    

               

                     <!-- validation -->
                 <!-- /validation -->


                </div>
            </div>
            <hr>
          
        </div>
        <!--/.fluid-container-->
        <script src="vendors/jquery-1.9.1.min.js"></script>

         <script src="vendors/parsley.min.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <script src="vendors/datatables/js/jquery.dataTables.min.js"></script>
        <script src="assets/scripts.js"></script>
        <script src="assets/DT_bootstrap.js"></script>
        <script>
        $(function() {
            
        });
        </script>
    </body>

</html>

