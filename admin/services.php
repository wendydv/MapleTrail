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
						case 'add_service';
						include "includes/add_services.php";
						break;

						case 'edit_service';
						include "includes/edit_services.php";
						break;

					   default: include "includes/view_all_services.php";
					   break;
				   }

				  ?>
                </div>
            </div>
        </div>
</div>

<?php include "includes/admin_footer.php"; ?>