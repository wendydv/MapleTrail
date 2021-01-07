<?php include "includes/admin_header.php"; ?>
    

    <div id="wrapper">
        
       <?php include "includes/admin_navigation.php"; ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                         <?php 
						
						   if(isset($_GET['source'])){
							   $source = $_GET['source'];
							   
						   }
						else{
							$source = '';
						}
						   switch($source){
								case 'add_post';
								include "includes/add_posts.php";
								break;
								
								case 'edit_post';
								include "includes/edit_posts.php";
								break;
								   
							   default: include "includes/view_all_posts.php";
							   break;
						   }
						
						  ?>
                </div>
            </div>
        </div>
</div>

<?php include "includes/admin_footer.php"; ?>