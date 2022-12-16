<?php
    session_start();
    // s
    $mess = $_GET['message']??'';
  ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
  <title>Login</title>
</head>
<style>
  .gradient-custom {
    background: #ffffff;

  }
  span{
    color: red;
  }
</style>

<body>
  <section class="vh-100 gradient-custom">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
          <div class="card bg-dark text-white" style="border-radius: 1rem;">
            <div class="card-body p-5 ">

              <div class="mb-md-5 mt-md-4 pb-5">

                <h2 class="fw-bold mb-2 text-uppercase text-center">Login</h2>
                <form  action="admin/login.php" method="post" name="signin">
                  <p class="text-white-50 mb-5 text-center">Please enter your login and password!</p>
                  <hr width="100%" style="align-items: center;" />
                  <div class="form-outline form-white mb-4">
                    <label class="form-label" for="typeEmailX">User Name</label>
                    <input 
                      type="text" 
                      id="typeEmailX" 
                      name="username" 
                      class="form-control form-control-lg" 
                       <?php
                          if($mess!='')
                            echo 'value='.$mess;
                      ?>
                    />
                  </div>

                  <span id="errorEmail"></span>

                  <div class="form-outline form-white mb-4">
                    <label class="form-label" for="typePasswordX">Password</label>
                    <input type="password" name="password" id="typePasswordX" class="form-control form-control-lg" />
                  </div>

                  <span id="errorPassword"></span>

                  <div class="form-item-other">
                    <div class="checkbox">
                      <input type="checkbox" name="checkbox" id="rememberMeCheckBox">
                      <label for="rememberMeCheckBox">remember me</label>
                    </div>
                    <br>
                  </div>
                  <span id="errorLogin">
                    <?php
                      if($mess!='')
                        echo 'Sai tên đăng nhập hoặc mật khẩu';
                    ?>
                  </span>
                  <br>
                  <div class="text-center">
                    <button class="btn btn-outline-light btn-lg px-5" type="submit" id="submitBtn">Login</button>
                  </div>
  
                </form>
              </div>
              <div class="text-center">
                <p class="mb-0">Don't have an account? <a href="signupForm.php" class="text-white-50 fw-bold">Sign Up</a>
                </p>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <script>
    
  </script>
</body>

</html>