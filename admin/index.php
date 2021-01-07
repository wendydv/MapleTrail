<?php include "includes/admin_header.php"; ?>

    <div id="wrapper">

       <?php include "includes/admin_navigation.php"; ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                       
                        <h2 class="page-header">
                            Welcome to Admin 
                            <small><?php echo strtoupper(get_user_name()); ?></small>
                        </h2>

                    </div>
                </div> <!-- /.row -->
                
				<div class="row"> <!-- /.row -->
					<div class="col-lg-3 col-md-6">
						<div class="panel panel-primary">
							<div class="panel-heading">
								<div class="row">
									<div class="col-xs-3">
										<i class="fas fa-file-alt fa-5x"></i>
									</div>
									<div class="col-xs-9 text-right">
								  <?php
									 $post_count = recordCount('post');
									  echo "<div class='huge'>{$post_count}</div>";
									?>
										<div>Posts</div>
									</div>
								</div>
							</div>
							<a href="./posts.php">
								<div class="panel-footer">
									<span class="pull-left">View Details</span>
									<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
									<div class="clearfix"></div>
								</div>
							</a>
						</div>
					</div>
					<div class="col-lg-3 col-md-6">
						<div class="panel panel-green">
							<div class="panel-heading">
								<div class="row">
									<div class="col-xs-3">
										<i class="fa fa-comments fa-5x"></i>
									</div>
									<div class="col-xs-9 text-right">
								     <?php 
										$comments_count = recordCount('comment');
										echo "<div class='huge'>{$comments_count}</div>";
										?>
									  
									  <div>Comments</div>
									</div>
								</div>
							</div>
							<a href="./comments.php">
								<div class="panel-footer">
									<span class="pull-left">View Details</span>
									<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
									<div class="clearfix"></div>
								</div>
							</a>
						</div>
					</div>
					<div class="col-lg-3 col-md-6">
						<div class="panel panel-yellow">
							<div class="panel-heading">
								<div class="row">
									<div class="col-xs-3">
										<i class="fa fa-user fa-5x"></i>
									</div>
									<div class="col-xs-9 text-right">
									    <div class='huge'><?php echo $users_count = recordCount('user'); ?></div>
					                    <div> Users</div>
									</div>
								</div>
							</div>
							<a href="users.php">
								<div class="panel-footer">
									<span class="pull-left">View Details</span>
									<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
									<div class="clearfix"></div>
								</div>
							</a>
						</div>
					</div>
					<div class="col-lg-3 col-md-6">
						<div class="panel panel-red">
							<div class="panel-heading">
								<div class="row">
									<div class="col-xs-3">
										<i class="fas fa-cogs fa-5x"></i>
									</div>
									<div class="col-xs-9 text-right">
									   <?php 
										$services_count = recordCount('service');
										echo "<div class='huge'>{$services_count}</div>";
										?>
										 <div>Services</div>
									</div>
								</div>
							</div>
							<a href="./services.php">
								<div class="panel-footer">
									<span class="pull-left">View Details</span>
									<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
									<div class="clearfix"></div>
								</div>
							</a>
						</div>
					</div>
				</div><!-- /.row -->
           
           <?php 
			
				
			$post_published_count = checkStatus('posts', 'status', 'published');
				
			$post_draft_count = checkStatus('posts', 'status', 'draft');
				
			$comments_unapproved_count = checkStatus('comments', 'status', 'unapproved');

			$users_client_count = checkUserRole('user', 'role', 'client');
					
			?>
            
            <div class="row py-5">
				<div class="col-lg-8 col-md-12">
				<div class="card">
					<div class="card-header">
					  General Information
					</div>
					<div class="card-body">
						<script type="text/javascript">
						  google.charts.load('current', {'packages':['bar']});
						  google.charts.setOnLoadCallback(drawChart);

						  function drawChart() {
							var data = google.visualization.arrayToDataTable([
							  ['Date', 'Count'],

								<?php 

								 $element_text = ['All Posts','Active Posts','Draft Posts','Comments', 'Pendient Comments', 'Users', 'Clients', 'Services'];
								 $element_count = [$post_count, $post_published_count, $post_draft_count, $comments_count, $comments_unapproved_count, $users_count, $users_client_count, $services_count];

								  for($i=0; $i<8; $i++){
									  echo "['{$element_text[$i]}'" . "," . "{$element_count[$i]}],";
								  }


								?>
							]);

							var options = {
								chart: {
								title: '',
								subtitle: '',
							  }
							};

							var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

							chart.draw(data, google.charts.Bar.convertOptions(options));
						  }
						</script>

				       <div id="columnchart_material" style="width: 'auto'; height: 350px;"></div>
					</div>
				 </div>
				</div>
				
				<div class="col-lg-4 col-md-12">
					<div class="card">
						<div class="card-header">
							Users - Clients
						</div>
						<div class="card-body">
							<script type="text/javascript">
							  google.charts.load('current', {'packages':['corechart']});
							  google.charts.setOnLoadCallback(drawChart);

							  function drawChart() {

								var data = google.visualization.arrayToDataTable([
								  ['Users', 'Count'],

								 <?php 

									 $element_text = ['Users','Clients'];
									 $element_count = [$users_count, $users_client_count];

									  for($i=0; $i<2; $i++){
										  echo "['{$element_text[$i]}'" . "," . "{$element_count[$i]}],";
									  }


									?>
								]);

								var options = {
								  title: ''
								};

								var chart = new google.visualization.PieChart(document.getElementById('piechart'));

								chart.draw(data, options);
							  }
							</script>

							<div id="piechart" style="width: 'auto'; height: 350px;"></div>
							
						</div>
					</div>
				</div>
              
              </div>

          </div> 

      </div>
</div>

<?php include "includes/admin_footer.php"; ?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" integrity="sha256-ENFZrbVzylNbgnXx0n3I1g//2WeO47XxoPe0vkp3NC8=" crossorigin="anonymous" />

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js" integrity="sha256-3blsJd4Hli/7wCQ+bmgXfOdK7p/ZUMtPXY08jmxSSgk=" crossorigin="anonymous"></script>



