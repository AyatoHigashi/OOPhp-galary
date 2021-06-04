<?php include("includes/init.php"); ?>

<?php if (!$session->is_signed_in()) {
     redirect("login.php");
    } ?>

<?php 



    if(empty($_GET['id'])) {

        redirect("users.php");

    }

    $users = User::find_by_id($_GET['id']);

    if($users) {

        $users->delete_user();
        redirect('users.php');
        $session->message("<p class='bg-danger'>The {$user->username} has been deleted successfully</p>");
        

    } else {

        redirect("users.php");

    }