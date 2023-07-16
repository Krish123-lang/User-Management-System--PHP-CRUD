<?php
include 'connect.php';
include 'header.php';

// Check if the 'updateid' parameter is set
if (isset($_GET['updateid'])) {
    $id = $_GET['updateid'];

    // Fetch the user details from the database
    $sql = "SELECT * FROM crud WHERE id='$id'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $name = $row['name'];
        $email = $row['email'];
        $mobile = $row['mobile'];

        if (isset($_POST['submit'])) {
            $newName = $_POST['name'];
            $newEmail = $_POST['email'];
            $newMobile = $_POST['mobile'];

            // Update the user details in the database
            $updateSql = "UPDATE crud SET name='$newName', email='$newEmail', mobile='$newMobile' WHERE id='$id'";
            $updateResult = mysqli_query($conn, $updateSql);

            if ($updateResult) {
                echo "Updated successfully";
                // Redirect to the display page after successful update
                header('Location: index.php');
                exit();
            } else {
                echo "Error updating record: " . mysqli_error($conn);
            }
        }
    } else {
        echo "No user found with the given ID";
    }
} else {
    echo "Missing user ID parameter";
}
?>

<div class="container my-5">
    <h1 class="text-center">Update Details</h1>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . '?updateid=' . $id; ?>" method="post">
        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" class="form-control" name="name" value="<?php echo $name; ?>">
        </div>

        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" class="form-control" name="email" value="<?php echo $email; ?>">
        </div>

        <div class="mb-3">
            <label class="form-label">Mobile</label>
            <input type="tel" class="form-control" maxlength="10" name="mobile" value="<?php echo $mobile; ?>">
        </div>

        <button type="submit" class="btn btn-primary" name="submit">Update</button>
    </form>
</div>

<?php include 'footer.php'; ?>