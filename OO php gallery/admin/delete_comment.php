<?php include("includes/init.php"); ?>

<?php if (!$session->is_signed_in()) {
     redirect("login.php");
    } ?>

<?php 



    if(empty($_GET['id'])) {

        redirect("comments.php");

    }

    $comments = Comment::find_by_id($_GET['id']);

    if($comments) {

        $comments->delete();

        redirect('comments.php');
        $session->message("<p class='bg-danger'>The comment from {$comments->id} has been deleted successfully</p>");
        

    } else {

        redirect("comments.php");

    }