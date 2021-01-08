<!--###################### TOP BAR ########################-->
<div class="alert bg-info text-white alert-dismissible mb-0 py-1 border border-rounded-0">

    <button class="close py-1" type="button" data-dismiss="alert">
        <span>&times;</span>
    </button>
    <h6 class="text-center mt-1">This are some news or promos about immigration. <a href="blogs.php" class="text-white border-bottom font-italic">Learn more</a></h6>
</div>

<!--###################### NAVIGATION ########################-->
<nav class="navbar sticky-top navbar-expand-sm navbar-light bg-white py-3">
    <div class="container-fluid">
        <a href="index.php" class="navbar-brand text-info">Maple Trail Immigration</a>
        <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav ml-auto">
                <!-- <li class="nav-item">
                    <a href="index.php" class="nav-link">Home</a>
                </li> -->
                <li class="nav-item">
                    <a href="about.php" class="nav-link">About</a>
                </li>
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Services</a>
                    <div class="dropdown-menu mt-3 border border-white rounded-0">
                        <a href="service.php" class="dropdown-item"><i class="fas fa-graduation-cap text-info pr-2"></i>Study
                            Permit</a>
                        <a href="service.php" class="dropdown-item"><i class="fas fa-suitcase-rolling text-info pr-2"></i>Visitor
                            Visa</a>
                        <a href="service.php" class="dropdown-item"><i class="fas fa-plane-departure text-info pr-2"></i>Express
                            Entry</a>
                        <a href="service.php" class="dropdown-item"><i class="fas fa-route text-info pr-2"></i>Provincial
                            Nominations</a>
                        <a href="service.php" class="dropdown-item"><i class="fas fa-passport text-info pr-2"></i>Status
                            Extension</a>
                    </div>
                </li>
                <!-- <li class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">About Canada</a>
                <div class="dropdown-menu mt-3 border border-white rounded-0">
                    <a href="#" class="dropdown-item"><i class="fab fa-canadian-maple-leaf text-info pr-2"></i> Our
                        Canada</a>
                    <a href="housing.php" class="dropdown-item"><i class="fas fa-home text-info pr-2"></i> Housing</a>
                    <a href="work.php" class="dropdown-item"><i class="fas fa-briefcase text-info pr-2"></i> Work</a>
                    <a href="#" class="dropdown-item"><i class="fas fa-university text-info pr-2"></i> Education</a>
                    <a href="#" class="dropdown-item"><i class="fas fa-stethoscope text-info pr-2"></i> Health
                        Care</a>
                    <a href="#" class="dropdown-item"><i class="fas fa-piggy-bank text-info pr-2"></i> Money and
                        Finances</a>
                </div>
            </li> -->
                <li class="nav-item">
                    <a href="news.php" class="nav-link">News</a>
                </li>
                <li class="nav-item">
                    <a href="contact.php" class="nav-link">Contact</a>
                </li>

                <span class="border-left border-secondary ml-2 pl-2"></span>

                <div class="language mt-1">
                    <form method="get" class="navbar-form navbar-right" id="language-form" action="">
                        <div class="form-group">

                            <select name="lang" class="form-control-sm border-white text-secondary languaje-options" onchange="changeLanguage()">
                                <option value="en" data-thumbnail="img/uk_flag.png">English</option>
                                <option value="es" data-thumbnail="img/spain_flag.png">Español</option>
                            </select>
                        </div>
                    </form>
                </div>

                <?php if (isLoggedIn()) : ?>

                    <li class="nav-item"><a href="admin" class="nav-link">Admin</a></li>

                    <li class="nav-item"><a href="includes/logout.php" class="nav-link"><i class="fas fa-sign-out-alt"></i> Logout</a></li>

                <?php else : ?>

                    <li class="nav-item"><a href="login.php" class="nav-link"><i class="fas fa-user"></i> Login</a></li>

                <?php endif; ?>

                <!-- <li class="nav-item">
                <a href="#" class="nav-link ml-auto"><i class="fas fa-search"></i></a>
            </li> -->

                <li class="nav-item">
                    <a href="contact.php" class="btn btn-info btn-personalize d-none d-sm-block">Book a Consultation</a>
                </li>

            </ul>
        </div>
</nav>