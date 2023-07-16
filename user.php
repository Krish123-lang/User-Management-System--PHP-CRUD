<?php
include 'connect.php';

// ADDING DATA TO DATABASE === === === === === === === === === === === === === === === === === 
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $password = $_POST['password'];

    $sql = "insert into crud(name, email, mobile, password) values('$name', '$email', '$mobile', '$password')";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        header('location: index.php');
    } else {
        die(mysqli_error($conn));
    }
}

?>

<!-- =================================================== -->

<?php include 'header.php'; ?>

<div class="container my-5">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" class="form-control" name="name" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" class="form-control" name="email" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Mobile</label>
            <input type="tel" class="form-control" maxlength="10" name="mobile" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" class="form-control" name="password" required>
        </div>

        <button type="submit" class="btn btn-primary" name="submit">Submit</button>

    </form>
</div>

<?php include 'footer.php'; ?>