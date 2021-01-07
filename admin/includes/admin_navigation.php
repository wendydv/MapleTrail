        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <a class="navbar-brand mr-auto pl-3" href="../index.php">Company Name</a>
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
               <li><a href="../index.php"><i class="fas fa-home"></i></a></li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fas fa-user"></i>
                    <?php 
						if(isset($_SESSION['username'])){
							echo $_SESSION['username'];
						}
						?>
                     
                    <b></b>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="profile.php"><i class="fas fa-user-cog"></i> Profile</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="../includes/logout.php"><i class="fas fa-sign-out-alt"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            
            
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    
                    <?php if(is_admin()): ?>
                    
                    <li>
                        <a href="index.php"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
                    </li>
                    
                    <?php endif; ?>
                    
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#posts_dropdown"><i class="fas fa-copy"></i> Blog <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="posts_dropdown" class="collapse">
                            <li>
                                <a href="./posts.php"> <i class="fas fa-copy"></i> View All Posts</a>
                            </li>
                            <li>
                                <a href="posts.php?source=add_post"><i class="fas fa-plus"></i> Add Post</a>
                            </li>
                        </ul>
                    </li>
                  
                    <li>
                        <a href="./comments.php"><i class="fas fa-comment-alt"></i> Comments</a>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#services_dropdown"><i class="fas fa-cogs"></i> Services <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="services_dropdown" class="collapse">
                            <li>
                                <a href="./services.php"> <i class="fas fa-cog"></i> View All Services</a>
                            </li>
                            <li>
                                <a href="services.php?source=add_service"><i class="fas fa-plus"></i> Add Service</a>
                            </li>
                        </ul>
                    </li>
                   
                      <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fas fa-users"></i> Users<i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li>
                                <a href="users.php"><i class="fas fa-users-cog"></i> View All Users</a>
                            </li>
                            <li>
                                <a href="users.php?source=add_user"><i class="fas fa-user-plus"></i> Add User</a>
                            </li>
                        </ul>
                    </li>
                     <li>
                        <a href="profile.php"><i class="fas fa-user-cog"></i> Profile</a>
                    </li>
                </ul>
            </div> <!-- /.navbar-collapse -->
        </nav>