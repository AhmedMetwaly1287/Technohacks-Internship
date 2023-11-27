<?php
require_once('Controllers/DBController.php');
require_once('Controllers/UserController.php');
require_once('Variables/user.php');

$DB = DBController::getInstance();
$user = new User;
$userCon = new UserController;

session_start();
$user->id = $_GET['id'];
if ($DB->OpenCon()) {
  $userInfo = $userCon->getByID($user);
}
?>
<!DOCTYPE html>

<html lang="en" class="light-style" dir="ltr" data-theme="theme-default" data-assets-path="assets/"
  data-template="vertical-menu-template-free">

<head>
  <meta charset="utf-8" />
  <meta name="viewport"
    content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

  <title>User Data</title>

  <meta name="description" content="" />

  <!-- Favicon -->
  <link rel="icon" type="image/x-icon" href="assets/img/favicon/favicon.ico" />

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
    rel="stylesheet" />

  <!-- Icons. Uncomment required icon fonts -->
  <link rel="stylesheet" href="assets/vendor/fonts/boxicons.css" />

  <!-- Core CSS -->
  <link rel="stylesheet" href="assets/vendor/css/core.css" class="template-customizer-core-css" />
  <link rel="stylesheet" href="assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
  <link rel="stylesheet" href="assets/css/demo.css" />

  <!-- Vendors CSS -->
  <link rel="stylesheet" href="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />


  <!-- Helpers -->
  <script src="assets/vendor/js/helpers.js"></script>

  <script src="assets/js/config.js"></script>
</head>

<body>
  <!-- Content -->

  <h4 class="fw-bold p-4">User Data</h4>
  <div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">

    </h4>

    <!-- Basic Layout & Basic with Icons -->
    <div class="row">
      <!-- Basic Layout -->
      <div class="col-xxl">
        <div class="card mb-4">
          <div class="card-header d-flex align-items-center justify-content-between">


          </div>
          <div class="card-body">
            <form>
              <?php foreach ($userInfo as $userInformation) { ?>
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label" for="pfp">Profile Picture</label>
                  <div class="col-sm-10">
                    <label class="form-label" for="pfp"><strong>
                        <?php echo '<img  class="d-block rounded" height="100px" width="100px" src="data:image;base64,' . $userInformation['image'] . '">'; ?>
                      </strong>


                  </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label" for="fname">First Name</label>
                  <div class="col-sm-10">
                    <label class="form-label" for="fname"><strong>
                        <?php echo $userInformation['fname']; ?>
                      </strong>

                  </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label" for="lname">Last Name</label>
                  <div class="col-sm-10">
                    <div class="input-group input-group-merge">
                      <label class="form-label" for="lname"><strong>
                          <?php echo $userInformation['lname']; ?>
                        </strong>


                    </div>

                  </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label" for="email">Email</label>
                  <div class="col-sm-10">
                    <label class="form-label" for="email"><strong>
                        <?php echo $userInformation['email']; ?>
                      </strong>

                  </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label" for="pw">
                    Hashed Password (Using BCRYPT hashing
                    Algorithm)</label>
                  <div class="col-sm-10">
                    <label class="form-label" for="password"><strong>
                        <?php echo $userInformation['password']; ?>
                      </strong>

                  </div>
                </div>
                <div class="row justify-content-end">
                  <div class="col-sm-10">
                  <?php } ?>


                </div>

              </div>

            </form>
            <a href="login.php" value="Sign out">
              <button class="btn btn-primary d-grid w-100">
                Sign out
              </button>
            </a>
          </div>
        </div>
      </div>

    </div>
    </form>
  </div>
  </div>


  <!-- Core JS -->
  <!-- build:js assets/vendor/js/core.js -->
  <script src="assets/vendor/libs/jquery/jquery.js"></script>
  <script src="assets/vendor/libs/popper/popper.js"></script>
  <script src="assets/vendor/js/bootstrap.js"></script>
  <script src="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

  <script src="assets/vendor/js/menu.js"></script>
  <!-- endbuild -->

  <!-- Vendors JS -->

  <!-- Main JS -->
  <script src="assets/js/main.js"></script>

  <!-- Page JS -->

  <!-- Place this tag in your head or just before your close body tag. -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>

</html>