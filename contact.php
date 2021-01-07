<?php include "includes/header.php"; ?>
<?php include "includes/navigation.php"; ?>

<!--#################### PAGE HEADER ###################-->
<header id="contact-header">
  <div class="dark-overlay">
    <div class="container">
      <div class="row">
        <div class="col-md-6 m-auto text-center">
          <h1 class="mt-5">Contact Us</h1>
          <p>We're ready to lead you in your path to Canada</p>
        </div>
      </div>
    </div>
  </div>
</header>

<!--#################### CONTACT SECTION #################-->
<section id="contact" class="py-5">
  <div class="container">
    <div class="row">
      <div class="col-md-4">
        <div class="card p-4">
          <div class="card-body">
            <h4>Get in touch!</h4>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam, error!</p>
            <h5>Address</h5>
            <p><i class="fas fa-map-marker-alt text-info"></i> Vancouver, BC, Canada </p>
            <h5>Email</h5>
            <p><i class="fas fa-envelope text-info"></i> company.info@company.ca</p>
            <h5>Phone</h5>
            <p><i class="fas fa-phone text-info"></i> +1 555 555 5555</p>
          </div>
        </div>
      </div>

      <div class="col-md-8">
        <div class="card p-4">
          <div class="card-body py-5">
            <h4 class="text-center">Please, fill out this form to contact us!</h4>
            <hr>
            <form action="" method="post">
              <div class="form-group">
                <div class="input-group input-group-md">
                  <div class="input-group-prepend">
                    <span class="input-group-text bg-info text-white">
                      <i class="fas fa-user"></i>
                    </span>
                  </div>
                  <input type="text" class="form-control" placeholder="Name">
                </div>
              </div>
              <div class="form-group">
                <div class="input-group input-group-md">
                  <div class="input-group-prepend">
                    <span class="input-group-text bg-info text-white">
                      <i class="fas fa-envelope"></i>
                    </span>
                  </div>
                  <input type="email" class="form-control" placeholder="Email">
                </div>
              </div>
              <div class="form-group">
                <div class="input-group input-group-md">
                  <div class="input-group-prepend">
                    <span class="input-group-text bg-info text-white">
                      <i class="fas fa-pencil-alt"></i>
                    </span>
                  </div>
                  <textarea class="form-control" placeholder="Message"></textarea>
                </div>
              </div>

              <input type="submit" value="Submit" class="btn btn-info btn-block btn-md">
            </form>
          </div>
        </div>

      </div>
    </div>
  </div>
</section>


<?php include "includes/footer.php"; ?>