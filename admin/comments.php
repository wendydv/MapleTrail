<?php include "includes/admin_header.php"; ?>
    

    <div id="wrapper">
        
       <?php include "includes/admin_navigation.php"; ?>

        <div id="page-wrapper">

            <div class="container-fluid">

				 <?php 

				   if(isset($_GET['source'])){
					   $source = $_GET['source'];

				   }
				else{
					$source = '';
				}
				   switch($source){

					   default: include "includes/view_all_comments.php";
					   break;
				   }

				  ?>
            </div>
        </div>
 </div>

<?php include "includes/admin_footer.php"; ?>