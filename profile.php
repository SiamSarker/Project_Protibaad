<?php
session_start();
include 'config.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="write_review.css">

    <meta charset="utf-8">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2 mt-5">
                <table class="table table-striped border">
                    <thead class="table-primary">
                        <tr>
                            <th></th>
                            <th>User Info</th>
                        </tr>
                    </thead>
                    <?php
                    $username =  $_SESSION['username'];
                    $sql = "SELECT username, email FROM  users WHERE `username`='$username'";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {

                        while ($row = $result->fetch_assoc()) {
                            $username = $row["username"];
                            $email = $row["email"];
                    ?>
                            <tbody>
                                <tr>
                                    <th scope="row">User Name : </th>
                                    <td>
                                        <?php echo $username; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Email : </th>
                                    <td><?php echo $email; ?></td>
                                </tr>
                            </tbody>
                    <?php
                        }
                    }
                    ?>

                </table>
            </div>

        </div>
    </div>

</body>

</html>