<?php
session_start();
include 'config/database.php';

$message = '';

if(isset($_POST['login'])){

    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];

    $query = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");

    if(mysqli_num_rows($query) == 1){

        $user = mysqli_fetch_assoc($query);

        if(password_verify($password, $user['password'])){

            $_SESSION['user_id'] = $user['id'];
            $_SESSION['fullname'] = $user['fullname'];
            $_SESSION['role'] = $user['role'];

            if($user['role'] == 'admin'){
                header("Location: admin/dashboard.php");
            }else{
                header("Location: user/dashboard.php");
            }
            exit();

        } else {
            $message = "Invalid password";
        }

    } else {
        $message = "User not found";
    }
}
?>



<?php include 'includes/header.php'; ?>
<?php include 'includes/navbar.php'; ?>

<div class="container mt-5">

    <div class="row justify-content-center">

        <div class="col-md-5">

            <div class="card shadow">

                <div class="card-header bg-success text-white">
                    <h3>Login</h3>
                </div>

                <div class="card-body">

                    <?php if(!empty($message)): ?>
                        <div class="alert alert-danger">
                            <?php echo $message; ?>
                        </div>
                    <?php endif; ?>

                    <form method="POST">

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
                                name="login"
                                class="btn btn-success">
                            Login
                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

<?php include 'includes/footer.php'; ?>


