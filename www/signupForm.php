<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <title>Signup</title>
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
      
                  <div class="mb-md-5 mt-md-4 pb-5" >
                   
                    <h2 class="fw-bold mb-2 text-uppercase text-center">Sign up</h2>
                    <form name="frm" onsubmit="check2()">
                    <p class="text-white-50 mb-5 text-center">It's free and only takes a minute</p>
                    <hr width="100%" style="align-items: center;"/>

                    <div class="form-outline form-white mb-3">
                      <label class="form-label " for="typeFullNameX">Full Name</label>
                      <input name="fullName" type="name" id="typeFullNameX" class="form-control form-control-lg" />
                    </div>

                    <span id="errorFirstName"></span>

                    <div class="form-outline form-white mb-3">
                        <label class="form-label " for="typeNameX">User Name</label>
                        <input name="userName" type="name" id="typeNameX" class="form-control form-control-lg" />
                      </div>

                      <span id="errorName"></span>


                    <div class="form-outline form-white mb-3">
                      <label class="form-label " for="typeEmailX">Email</label>
                      <input type="email" id="typeEmailX" class="form-control form-control-lg" />
                    </div>
      
                    <span id="errorEmail"></span>

                    <div class="form-outline form-white mb-3">
                      <label class="form-label" for="typePasswordX">Password</label>
                      <input name="pw" type="password" name="psw" id="typePasswordX" class="form-control form-control-lg" />
                    </div>

                    <span id="errorPassword"></span>

                    <div class="form-outline form-white mb-3">
                        <label class="form-label" for="typeConfirmPasswordX">Confirm Password</label>
                        <input type="password" name="reps" id="typeConfirmPasswordX" class="form-control form-control-lg" />
                    </div>

                    <span id="errorConfirmPassword"></span>

                    <br id="errorConfirmPassword">
                    <br>

                    <div class="text-center">
                      <button class="btn btn-outline-light btn-lg px-5" type="submit" id="submitBtn">Sign up</button>
                    </div>
                    </form>
                  </div>

                  <div class="text-center">
                    <p class="mb-0">Already have an account? <a href="loginForm.php" class="text-white-50 fw-bold">Login here</a>
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <script src="./handleLogic/signup.js"></script>
</body>
</html>
