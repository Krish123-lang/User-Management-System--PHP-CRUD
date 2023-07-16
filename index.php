<?php include 'header.php'; ?>
<?php include 'connect.php'; ?>

<div class="container  my-5">
    <a href="user.php" class="btn btn-primary">Add User</a>


    <table class="table table-hover my-3">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Mobile</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>

            <!-- // DISPLAY DATA FROM DATABASE === === === === === === === === === === === === === === -->
            <?php
            $sql = "select * from crud";
            $result = mysqli_query($conn, $sql);

            if ($result) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $id = $row['id'];
                    $name = $row['name'];
                    $email = $row['email'];
                    $mobile = $row['mobile'];
                    $password = $row['password'];

                    // To get Update Id and Delete Id == === === === === === === === === === === === === ==
                    echo '
                        <tr>
                            <th scope="row">' . $id . '</th>
                            <td>' . $name . '</td>
                            <td>' . $email . '</td>
                            <td>' . $mobile . '</td>
                            <td>
                                <a class="btn btn-info" href="update.php?updateid=' . $id . '">Update</a>
                                <a class="btn btn-danger" href="delete.php?deleteid=' . $id . '" onclick="return confirmDelete()">Delete</a>
                            </td>
                        </tr>';
                }
            }
            ?>
            <!-- // DISPLAY DATA FROM DATABASE === === === === === === === === === === === === === === -->

        </tbody>
    </table>
</div>

<script>
    function confirmDelete() {
        return confirm("Are you sure you want to delete this record?");
    }
</script>

<?php include 'footer.php'; ?>