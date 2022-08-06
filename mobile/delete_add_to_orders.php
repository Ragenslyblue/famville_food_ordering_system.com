<?php

/**
 * @author pakisab
 * @copyright 2018
 */

include('../config.php');
if(isset($_GET['id'])){
    $id=$_GET['id'];
    
    $sql_delete='DELETE FROM `order_kitchen` WHERE order_kitchen.order_kitchen_id="'.$id.'"';
    $qry_delete=mysqli_query($CON, $sql_delete) or die(mysqli_error($qry_delete));
    header('Location:../index_mobile_app.php?page=add_to_orders');
}

?>