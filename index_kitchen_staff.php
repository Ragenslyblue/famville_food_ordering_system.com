<?php

/**
 * @author pakisab
 * @copyright 2018
 */

include('config.php');

include('kitchen_staff/header.php');

include('kitchen_staff/side_bar.php');

if(isset($_GET['page'])){
    $page=$_GET['page'];
}else{
    $page='orders_queue';
}
include('kitchen_staff/'.$page.'.php');

include('kitchen_staff/footer.php');
?>