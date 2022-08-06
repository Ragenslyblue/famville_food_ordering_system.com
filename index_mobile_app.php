<?php

/**
 * @author pakisab
 * @copyright 2018
 */

include('config.php');

//include('mobile/header.php');

include('mobile/side_bar.php');

if(isset($_GET['page'])){
    $page=$_GET['page'];
}else{
    $page='area_select';
}
include('mobile/'.$page.'.php');
//include('mobile/footer.php');
//include('admin/side_bar.php');


?>