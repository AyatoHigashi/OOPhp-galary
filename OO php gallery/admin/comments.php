<?php include("includes/header.php"); ?>


<?php

$comments = Comment::find_all();

?>

<?php if (!$session->is_signed_in()) {
    redirect("login.php");
} ?>


<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->

    <?php

    include("includes/top_nav.php");

    ?>

    <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->

    <?php

    include("includes/side_nav.php");

    ?>

    <!-- /.navbar-collapse -->
</nav>

<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Comments
                </h1>

                <?php

                echo $message;

                ?>

                <div class="col-md-12">

                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <td>Id</td>
                                <td>Author</td>
                                <td>Comment</td>
                            </tr>
                        </thead>

                        <tbody>

                            <?php foreach ($comments as $comment) : ?>


                                <tr>
                                    <td><?php echo $comment->id; ?></td>
                                    <td><?php echo $comment->author; ?></td>
                                    <td><?php echo $comment->body; ?></td>
                                    <td>
                                        <div class="action_links">

                                            <a style="width: 65px;
                                margin-bottom: 5px;" class="edit-btn btn btn-primary" href="edit_comment.php?id=<?php echo $comment->id; ?>">Edit</a>
                                            <br>
                                            <a class="btn btn-danger" href="delete_comment.php?id=<?php echo $comment->id; ?>">Delete</a>

                                        </div>
                                    </td>

                                </tr>
                        </tbody>

                    <?php endforeach; ?>

                    </table> <!--  end of table -->

                </div>

            </div>
        </div>
        <!-- /.row -->

    </div>
    <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->

<?php include("includes/footer.php"); ?>