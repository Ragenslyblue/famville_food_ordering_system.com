<?php

/**
 * @author pakisab
 * @copyright 2018
 */

include('config.php');

include('cashier_personnel/header.php');

include('cashier_personnel/side_bar.php');

if(isset($_GET['page'])){
    $page=$_GET['page'];
}else{
    $page='add_new_guest';
}
include('cashier_personnel/'.$page.'.php');

include('cashier_personnel/footer.php');
?>