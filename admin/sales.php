<?php
include('config.php');

?>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Sales</h2>   
                        
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr />
               
            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <form action="<?php echo $BASE_URL;?>index_admin.php?page=sales_2" method="post" enctype="multipart/form-data">
                    <div class="panel panel-default">
                    
                    <div class="form-group">
                                            <label>Date From</label>
                                            <input type="date" name="date_from" class="form-control"/>
                                        </div>
                                        
                    <div class="form-group">
                                            <label>Date To</label>
                                            <input type="date" name="date_to" class="form-control"/>
                    </div>
                    
                    <button type="submit" style="
    margin-left: 420px;
" name="btn_generate" value="Generate" class="btn btn-primary">Generate</button>    
                    </div>
                    <style type="text/css">
                    #isLess{background-color: red;}
                    </style>
                    
                    <!--End Advanced Tables -->
                </div>
            </div>
                <!-- /. ROW  -->
            
                <!-- /. ROW  -->
            
                <!-- /. ROW  -->
            
                <!-- /. ROW  -->
        </div>
               
    </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
     <!-- DATA TABLE SCRIPTS -->
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
        <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
    </script>
         <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    
   
</body>
</html>
