<?php
session_start();
?>
<div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Orders Queue(In-Progress)</h2>   
                        <!--<h5>Welcome Jhon Deo , Love to see you back. </h5>-->
                       
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr>
               <div class="row">
                <div class="col-md-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Pending Orders Request
                        </div>
                        <div class="panel-body">
                            <div class="panel-group" id="accordion">
                            <?php
                            include('config.php');
                            
                                //$sqls='SELECT DISTINCT order_bill_out.order_num_id FROM order_bill_out WHERE order_bill_out.action="unbump"';
                                $sqls='SELECT DISTINCT order_bill_out.order_num_id, order_bill_out.duration, order_bill_out.date_time FROM order_bill_out
                                    WHERE order_bill_out.action="unbump"';
                                $qrys=mysqli_query($CON, $sqls) or die(mysqli_error($qrys));
                                while($row=mysqli_fetch_array($qrys)){
                                    $order_num_id=$row['order_num_id'];
                                    $duration=$row['duration'];
                                    $date_time=$row['date_time'];
                                    
                                    $_SESSION['duration']=$duration;
                                    $_SESSION['start_time']=date('Y-m-d H:i:s');
                                    $end_time=date('Y-m-d H:i:s', strtotime('+'.$_SESSION['duration'].'minutes',strtotime($_SESSION['start_time'])));
                                    //$end_time=date($date_time, strtotime('+'.$_SESSION['duration'].'minutes',strtotime($_SESSION['start_time'])));
                                    $_SESSION['end_time']=$end_time;
                                    
                                    $sql_server_name='SELECT order_bill_out.order_bill_out_id, order_bill_out.order_num_id, order_kitchen.order_kitchen_id, order_kitchen.user_id, user.first_name, user.last_name, user.user_group_id, user_groups.user_groups
                                        FROM order_bill_out
                                        INNER JOIN order_kitchen
                                        ON order_kitchen.order_kitchen_id=order_bill_out.order_kitchen_id
                                        INNER JOIN user
                                        ON user.user_id=order_kitchen.user_id
                                        INNER JOIN user_groups
                                        ON user_groups.user_groups_id=user.user_group_id
                                        WHERE order_bill_out.order_num_id="'.$order_num_id.'" AND user_groups.user_groups="waiter"';
                                    $qry_server_name=mysqli_query($CON, $sql_server_name) or die(mysqli_error($qry_server_name));
                                    while($row=mysqli_fetch_array($qry_server_name)){
                                        $order_bill_out_id=$row['order_bill_out_id'];
                                        $first_name=$row['first_name'];
                                        $last_name=$row['last_name'];
                                        $user_groups=$row['user_groups'];
                            }
                                    
                            ?>
                                <div class="panel panel-default">
                                    <div class="panel-heading" style="
    padding-bottom: 0px;
">
                                        <h4 class="panel-title">
                                            <a data-parent="#accordion" href="<?php echo 'kitchen_staff/inside_queue.php?id='.$order_num_id;?>" class="collapsed"><?php echo $order_num_id; ?></a>
                                            <span style="
    padding-left: 790px;
">
<div class="server-name" style="
    text-align: center;
    margin-top: -13px;
">Server Name: <?php echo $first_name.' '.$last_name; ?></div>

<div id="response" style="
    float: right;
    margin-top: -14px;
">Time:
<?php //include('stop_watch.php'); ?>

<script type="text/javascript">
setInterval(function(){
    var xmlhttp=new XMLHttpRequest();
    //xmlhttp.open("GET", "response.php", false);
    xmlhttp.send(null);
    document.getElementById('response').innerHTML=xmlhttp.responseText;
}, 1000);
</script>

<?php
//include('response.php');
include('config.php');


//$from_time1=date('Y-m-d H:i:s');
$from_time1=$date_time;
$to_time1=$_SESSION['end_time'];
$to_time2=$_SESSION['duration'];

$time_first=strtotime($from_time1);
$time_second=strtotime($to_time1);
$time_third=strtotime($to_time2);

//$difference_inseconds=($time_second-$time_first)-1;
$difference_inseconds=$time_first-$time_third;
$update_time=gmdate('H:i:s', $difference_inseconds);

$sql_update='UPDATE `order_bill_out` SET `duration`="'.$update_time.'" WHERE order_bill_out.order_num_id="'.$order_num_id.'"';
$qry_update=mysqli_query($CON, $sql_update);
?>
</span>
<?php echo $update_time; ?></div>


                                        </h4>
                                    </div>
                                </div>
                            <?php
                                //}
                            }
                            ?>   
                               
                     <!-- End Form Elements -->
                </div>
            </div>
            
            
                <!-- /. ROW  -->
                
                <!-- /. ROW  -->
    </div>
             <!-- /. PAGE INNER  -->
            </div>