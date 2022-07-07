<?php

include 'config.php';

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Registration</title>
  </head>
  <body>
  <section class="vh-100 bg-image">
  <div class="mask d-flex align-items-center h-100 gradient-custom-3">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class="card" style="border-radius: 15px;">
            <div class="card-body p-5">
              <h2 class="text-uppercase text-center mb-5">Create an account</h2>

              <form method="post">

                <div class="form-outline mb-4">
                  <input type="text"  name="uname" class="form-control form-control-md" placeholder="Enter Name" required/>

                </div>

                <div class="form-outline mb-4">
                  <input type="email" name="uemail" class="form-control form-control-md" placeholder="Enter E-mail Id" required/>

                </div>

                <div class="form-outline mb-4">
                  <input type="password" name="upwd" class="form-control form-control-md" placeholder="Enter Password" required/>

                </div>

                <div class="d-flex justify-content-center">
                  <button type="submit" name="register"
                    class="btn btn-success btn-block btn-md text-body">Register</button>
                </div>

                <p class="text-center text-muted mt-5 mb-0">Have already an account? <a href="login"
                    class="fw-bold text-body"><u>Login here</u></a></p>

              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


<!-- insert data into db  -->

<?php
if (isset($_POST['register'])) {
    $uname = $_POST['uname'];
    $uemail = $_POST['uemail'];

    $upwd = $_POST['upwd'];

    $sql = "insert into  `auth` (user_name,user_email,user_pwd)
 values('$uname','$uemail','$upwd')";
    $result = mysqli_query($con, $sql);
    if ($result) {

        echo ("<script language='javascript'>
						 window.alert('Registration Successfull')
					   window.location.href='login'
					   </script>");

    } else {
        echo ("<script language='javascript'>
        window.alert('Invalid Input ')

      </script>");
    }
}

?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


  </body>
</html>