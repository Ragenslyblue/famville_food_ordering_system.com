<div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Menu Items</h2>   
                        <h5>Tap Some the Category of Items to Start the Order.</h5>
                    </div>
                    <div class="input-group" style="
    margin-left: 690px;
    margin-top: 10px;
">
                      <input type="text" name="search_table_or_guest" placeholder="Search Menu items..." class="form-control">
                      <span class="form-group input-group-btn">
                        <button type="submit" value="Search" name="btn_search" class="btn btn-default" style="
    margin-right: 10px;
">Search</button>
                      </span>
                      
                </div>
                </div>
                
                <br />
                
                 <!-- /. ROW  -->
                 <hr>
               <div class="row">
                <div class="col-md-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        
                        <div class="panel-heading">
                               
                        </div>
                                               
                        <div class="row">
                        
                        <?php
                        include('config.php');
                        
                        $sql_cat='SELECT * FROM `category`';
                        $qry_cat=mysqli_query($CON, $sql_cat) or die(mysqli_error($qry_cat));
                        while($row=mysqli_fetch_array($qry_cat)){
                            $category_id=$row['category_id'];
                            $category_type=$row['category_type'];
                            $category_description=$row['category_description'];
                            $image=$row['image'];
                            
                            if($category_type=='drinks' || $category_type=='Drinks'){
                                echo '';
                            }else{
                                
                        ?>
                          <div class="column">
                            <a href="<?php echo 'kitchen_staff/enable_disable_menu.php?id='.$category_id; ?>"><img src="<?php echo 'images_2/upload/'.$image; ?>" alt="<?php echo $category_type; ?>" style="width: 202px" height="134px"></a>
                            <div class="image-text"><h4 style="text-align: center;"><?php echo $category_type; ?></h4></div>
                          </div>
                        <?php
                            }
                        }
                        ?> 
                        </div>
                    </div>
                    
        

                     <!-- End Form Elements -->
                </div>
            </div>
            
            
                <!-- /. ROW  -->
                
                <!-- /. ROW  -->
    </div>
             <!-- /. PAGE INNER  -->
            </div>