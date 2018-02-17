<?php include("includes/header.php");



/**
 * Created by PhpStorm.
 * User: jjwInNY
 * Date: 2/13/18
 * Time: 8:25 PM
 */

?>

<?php
$the_message = "Welcome";

if($session->is_signed_in()){

    redirect("index.php");
}

if (isset($_POST['submit'])){
    
    $username = trim($_POST['username']);
    
    
    $password = trim($_POST['password']);



    //METHOD 1to check database user if exists, otherwise sign UP BUDDY!


    $user_found = User::verify_user($username, $password);
    //METHOD 2 Check the database.
    if($user_found){

        $session->login($user_found);
        redirect("index.php");

    } else {
        $the_message = "Your password or username are incorrect";

    }


    //The page is loaded and $user_FOUND is not found


    } else {
    $username = "";
    $password ="";

}
?>


<div class ="col-md-4 col-md-offset-5">
<h4 class="bg-danger"> <?php echo $the_message; ?></h4>
<form action="" method="post">

    <div class ="form-group">
        <label for=""username">Username</label>
        <input type="text" class="form-control" name="username" value="<?php echo htmlentities($username); ?>>
    </div>

    <div class=form-group">
        <label for=""username">Password</label>
        <input type="text" class="form-control" name="password" value="<?php echo htmlentities($password); ?>">
    </div>


    <div class="form-group">
        <input type="submit" name="submit" value="submit" class="btn btn-primary">



    </div>



    </form>
</div>
