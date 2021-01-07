<?php include "includes/admin_header.php"; ?>
   
   <?php 

      if(!is_admin($_SESSION['username'])){
		 header("Location: ../index.php");
	  }

    ?>

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
					case 'add_user';
					include "includes/add_users.php";
					break;

					case 'edit_user';
					include "includes/edit_users.php";
					break;

				   default: include "includes/view_all_users.php";
				   break;
			   }
			  ?>
            </div>
        </div>
   </div>

<?php include "includes/admin_footer.php"; ?>