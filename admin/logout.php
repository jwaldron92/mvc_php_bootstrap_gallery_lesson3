<?php include("includes/header.php")

/**
 * Created by PhpStorm.
 * User: jjwInNY
 * Date: 2/13/18
 * Time: 8:25 PM
 */

?>

<?php

$session->logout();

redirect("login.php");
?>