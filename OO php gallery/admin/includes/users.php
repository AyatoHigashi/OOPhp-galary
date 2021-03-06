<?php include("includes/header.php"); ?>


<?php

$users = User::find_all();


?>


<?php if(!$session->is_signed_in()) {redirect("login.php");} ?>


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
                            users
                            <small>Subheading</small>
                        </h1>
                        

                    <div class="col-md-12">

                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <td>Id</td>
                                <td>Photo</td>
                                <td>username</td>
                                <td>First Name</td>
                                <td>Last Name</td>
                            </tr>
                        </thead>

                        <tbody>

                        <?php foreach ($users as $user) : ?>
                        

                            <tr>
                                <td><?php echo $user->id; ?></td>
                                <td><img class="admin-user-thumbnail" src="<?php echo $user->user_path(); ?>" alt="Image">
                                
                                <div class="pictures_link">

                                    <a href="delete_user.php?id=<?php echo $user->id; ?>">Delete</a>
                                    <a href="edit_user.php?id=<?php echo $user->id; ?>">Edit</a>
                                    <a href="">View</a>
                                
                                </div>
                                
                                </td>


                                
                                <td><?php echo $user->filename; ?></td>
                                <td><?php echo $user->title; ?></td>B
                                <td><?php echo $user->size; ?></td>
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