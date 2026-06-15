<?php
include 'config/database.php';

$message = "";

if(isset($_POST['register'])){

    $fullname = mysqli_real_escape_string($conn,$_POST['fullname']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
      $check = mysqli_query($conn,
      "SELECT * FROM users WHERE email='$email'");

      if(!$check){
          die("SQL Error: " . mysqli_error($conn));
      }

    if(mysqli_num_rows($check) > 0){

        $message = "<div class='alert alert-danger'>Email already exists!</div>";

    }else{

        $sql = "INSERT INTO users(fullname,email,password)
                VALUES('$fullname','$email','$password')";

        if(mysqli_query($conn,$sql)){
            $message = "<div class='alert alert-success'>
                        Registration Successful!
                        </div>";
        }else{
            $message = "<div class='alert alert-danger'>
                        Registration Failed!
                        </div>";
        }
    }
}

include 'includes/header.php';
include 'includes/navbar.php';
?>

<div class="container mt-5">

    <div class="row justify-content-center">

        <div class="col-md-6">

            <div class="card">

                <div class="card-header bg-success text-white">
                    <h3>Create Account</h3>
                </div>

                <div class="card-body">

                    <?php echo $message; ?>

                    <form method="POST">

                        <div class="mb-3">
                            <label>Full Name</label>
                            <input type="text"
                                   name="fullname"
                                   class="form-control"
                                   required>
                        </div>

                        <div class="mb-3">
                            <label>Email Address</label>
                            <input type="email"
                                   name="email"
                                   class="form-control"
                                   required>
                        </div>

                        <div class="mb-3">
                            <label>Password</label>
                            <input type="password"
                                   name="password"
                                   class="form-control"
                                   required>
                        </div>

                        <button type="submit"
                                name="register"
                                class="btn btn-success">
                            Register
                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

<?php
include 'includes/footer.php';
?>