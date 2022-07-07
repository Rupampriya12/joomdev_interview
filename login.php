<?php

include 'config.php';
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Login</title>
  </head>
  <body>
  <section>
  <div class="align-items-center h-100">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class="card" style="border-radius: 15px;">
            <div class="card-body p-5">
              <h2 class="text-uppercase text-center mb-5">Login</h2>

              <form method="post" >

                <div class="form-outline mb-4">
                  <input type="email" name="user_email" class="form-control form-control-md" placeholder="Enter E-mail Id" required/>
                </div>

                <div class="form-outline mb-4">
                  <input type="password" name="user_password" class="form-control form-control-md" placeholder="Enter Password" required />
                </div>

                <div class="d-flex justify-content-center">
                  <button type="submit" name="login"
                    class="btn btn-success btn-block btn-md  text-body">Login</button>
                </div>

                <p class="text-center mt-5 mb-0">New User? <a href="registration"
                    class="fw-bold text-body"><u>Register here</u></a></p>

              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


<!-- login with session -->

<?php

if (isset($_POST['login'])) {

     $user_email = mysqli_real_escape_string($con, $_POST['user_email']);
     $user_pwd = mysqli_real_escape_string($con, $_POST['user_password']);


     $query = "SELECT * FROM auth WHERE user_email='$user_email' AND user_pwd='$user_pwd'";
    $result = mysqli_query($con, $query);

    if (mysqli_num_rows($result) > 0) {

        $_SESSION['user_email'] = $user_email;

        $_SESSION['success'] = "You are now logged in";

        echo ("<script language='javascript'>
						
					   window.location.href='dashboard'
					   </script>");
    } else {
     echo "Invalid Credentials";
    }
}

?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </body>
</html>