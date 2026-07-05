<?php
include "includes/db.php";
include "includes/header.php";


?>

    <!-- Navigation -->

<?php

include "includes/navigation.php";


?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">
                
                <?php 

            $query = "SELECT * FROM posts";
            $select_all_posts_query = mysqli_query($connection,$query);

            while($row = mysqli_fetch_assoc($select_all_posts_query)) {
            $post_title =  $row['post_title'];
            $post_author = $row['post_author'];
            $post_date =  $row['post_date'];
            $post_image =  $row['post_image'];
            $post_content = $row['post_content'];
            $post_status = $row['post_status'];
            $post_tags = $row['post_tags'];   
                
         ?> 
                
             <h1 class="page-header" style="color:red">
                   <?php echo $post_status ?>  
                    <small style="color:red"><?php echo $post_tags ?>   </small>
                </h1>

                <!-- First Blog Post -->
                <h2>
                    <a href="#"><?php echo $post_title ?></a>
                </h2>
               <p class="lead">
                    by <a href="index.php"><?php echo $post_author ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span><?php echo $post_date ?></p>
                <hr>
                <img class="img-responsive" src="images/<?php echo $post_image ?>" alt="">
                <hr>
                <p> <?php echo $post_content ?></p>
               

                <hr>
     
                
                

     <?php   }  ?>
                
                
                
              
                

              
            

            

         
            </div>

            <!-- Blog Sidebar Widgets Column -->
            
              <?php include "includes/sidebar.php"; ?>



        </div>
        <!-- /.row -->

        <hr>

     <?php include "includes/footer.php"; ?>
