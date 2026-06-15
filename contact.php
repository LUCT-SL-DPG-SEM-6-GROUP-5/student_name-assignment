<?php
include 'config/database.php';

$success = "";

if(isset($_POST['send'])){

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);

    mysqli_query(
        $conn,
        "INSERT INTO feedback(name,email,message)
         VALUES('$name','$email','$message')"
    );

    $success = "Feedback submitted successfully.";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Contact Us</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">

    <h1>Contact Us</h1>

    <p>
        Send us your health questions, suggestions, or feedback.
    </p>

    <a href="index.php" class="btn btn-primary mb-4">
        Back to Home
    </a>

        <div class="mb-3">
            <label class="form-label">Full Name</label>
            <input type="text"
                   name="name"
                   class="form-control"
                   required>
        </div>

        <div class="mb-3">
            <label class="form-label">Email Address</label>
            <input type="email"
                   name="email"
                   class="form-control"
                   required>
        </div>

        <div class="mb-3">
            <label class="form-label">Message</label>
            <textarea name="message"
                      class="form-control"
                      rows="5"
                      required></textarea>
        </div>

        <button type="submit"
                name="send"
                class="btn btn-success">
            Send Feedback
        </button>

    </form>

</div>

</body>
</html>