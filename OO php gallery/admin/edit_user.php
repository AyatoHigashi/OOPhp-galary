<?php include("includes/header.php"); ?>

<?php if (!$session->is_signed_in()) {redirect("login.php");} ?>

<?php

if (empty($_GET['id'])) {

    redirect("users.php");
 }

 $user = User::find_by_id($_GET['id']);

    if(isset($_POST['update'])){
        
        if ($user) {

          $user->username = $_POST['username'];
          $user->first_name = $_POST['firstname'];
          $user->last_name = $_POST['lastname'];
          $user->password = $_POST['password'];

          if(empty($_FILES['user_image'])) {
              $user->save();
              redirect("users.php");
              $session->message("<p class='bg-success'>The {$user->username} has been updated successfully</p>");  
          } else {

            $user->set_file($_FILES['user_image']);

          $user->upload_photo();
          $user->save();
          $session->message("<p class='bg-success'>The {$user->username} has been updated successfully</p>");

        //   redirect("edit_user.php?id={$user->id}");          
            redirect("users.php"); 


          }

        }
    }
          
?>

<?php include('includes/photo_modul.php'); ?>

<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->

    <?php include("includes/top_nav.php") ?>

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

                <div class="text-center col-md-6 user_image_box">

                <a href="" data-toggle="modal" data-target="#photo-modal"><img class="rounded img-responsive" src="<?php echo $user->image_path_and_placeholder()?>" alt=""></a>
                
                </div> <br>

                <form action="" method="post" enctype="multipart/form-data">              

                <div class="col-md-6">

                    <div class="form-group">

                    <input type="file" name="user_image">

                    </div>

                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" class="form-control" value="<?php echo $user->username?>">

                    </div>
                    
                    <div class="form-group">
                        <label for="first name">First Name</label>
                        <input type="text" name="firstname" class="form-control" value="<?php echo $user->first_name?>">

                    </div>
                    <div class="form-group">
                        <label for="last name">Last Name</label>
                        <input type="text" name="lastname" class="form-control" value="<?php echo $user->last_name?>">

                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control" value="<?php echo $user->password?>">

                    </div>

                    <div class="form-group">

                        <a class="btn btn-danger pull-left" id="user-id" href="delete_user.php?id=<?php echo $user->id?>" >Delete</a>
                        

                        <input type="submit" name="update" value="Update" class="btn btn-primary pull-right">

                    </div>

                </div>

                </form>

            </div>
        </div>
        <!-- /.row -->

    </div>
    <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->

<?php include("includes/footer.php"); ?>