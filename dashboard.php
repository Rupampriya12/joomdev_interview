<?php
include 'config.php';
?>
<?php
if (!isset($_SESSION['user_email'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}

$usersession = $_SESSION['user_email'];
$query = mysqli_query($con, "SELECT * FROM auth WHERE user_email='$usersession'");
$result = mysqli_fetch_array($query, MYSQLI_ASSOC);

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <style>
            .error{
                color:red;
                font-size:13px;
            }

            .dn{
                display: block;
            }
        </style>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>dashboard</title>
  </head>
  <body>
     <div class="container">
<div class="row">
    <div class="col-sm-12">
<div class="card">
    <div class="card-header mt-4">
<h4>Welcome, <?php echo $result['user_name']; ?><span><a href="logout.php" role="button" class="btn btn-warning " style="float:right">Logout</a></span></h4>

    </div>

<div class="container" style="max-width:800px;margin:0 auto;margin-top:50px;">
            <div>

                <div class="form-group">
                    <label for="text">Add Text to Publish</label>


                    <textarea name="message" class="form-control" id="message" required></textarea>
                    <div class="error" id="error_message"></div>
                </div>
                <div class="form-group">
                    <button class="btn btn-success" id="save">Publish</button>
                </div>

                <div class="display-content">

                    <div class="message-wrap dn ">
                      <?php
$query = mysqli_query($con, "select * from publish order by id desc");
while ($row = mysqli_fetch_array($query)) {

    ?>
<span><?php echo str_replace("\n", "<br />", $row['publish']); ?><br></span>
<hr>
<?php
}

?>

                    </div>
                </div>
            </div>
        </div>

<!-- Ajax code -->
        <script>
            $(document).on("click", "#save", function () {

                var message = $("#message").val();
                  if (message == "") {
                    $("#error_message").html("Please enter text");
                    // return false;
                } else {
                    $("#error_message").html("");
                }

                $.ajax({

                    type: "POST",
                    url: "action.php",
                    data: {message: message},
                    cache: false,
                    success: function (data) {
                       $(data).insertBefore(".message-wrap:first");

                       $("#message").val("");


                    }
                });
            });

        </script>









<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


  </body>
</html>





