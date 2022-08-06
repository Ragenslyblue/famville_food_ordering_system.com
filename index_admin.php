<?php

/**
 * @author pakisab
 * @copyright 2018
 */

include('config.php');

include('admin/header.php');

include('admin/side_bar.php');

if(isset($_GET['page'])){
    $page=$_GET['page'];
}else{
    $page='category';
}
include('admin/'.$page.'.php');
include('admin/footer.php');
//include('admin/side_bar.php');


?>