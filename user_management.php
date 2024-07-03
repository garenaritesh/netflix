<!-- php script -->
<?php
include ('db.php');

$sql = "select * from netadmins";
$GetResult = mysqli_query($db, $sql);

// if (isset($_REQUEST['ins'])) {
//     $user = $_REQUEST['username'];
//     $password = $_REQUEST['password'];

//     $sql = " insert into netadmins(username,password) values('$user','$password')";
//     mysqli_query($db, $sql);
//     header("location:index.php");
// }

if (isset($_REQUEST['del'])) {
    $id = $_REQUEST['del'];
    $sql = "delete from netadmins where netadmins_id = '$id'";
    mysqli_query($db , $sql);
    header("location:index.php");
}

?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Admins | Netflix </title>
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>

    <!-- Body Content Here -->
    <nav>
        <div class="logo">
            <h1>Net<span>Flix</span></h1>
        </div>
        <ul class="item">
            <li><i class='bx bxs-user'></i></li>
        </ul>
    </nav>

    <div class="container">
        <div class="left">
            <ul>
                <li>Overview</li>
                <li>User Management</li>
                <li>Content Management</li>
                <li>Payment</li>
                <li></li>
            </ul>
        </div>
        <!-- DashBoard Content Show There Box -->
        <div class="right">
            <!-- <div class="login_form">
                <form action="" method="post">
                    <input type="text" name="username" placeholder="Username" id="username">
                    <input type="password" name="password" placeholder="Password" id="password">
                    <input type="submit" name="ins" id="log_submit_btn">
                </form>
            </div> -->

            <!-- User Management Content Structure -->
            <table class="User_Management+-">
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Delete User</th>
                </tr>
                <?php
                while ($row = mysqli_fetch_array($GetResult)) {
                    ?>
                    <tr>
                        <td><?php echo $row['netadmins_id'] ?></td>
                        <td><?php echo $row['username']; ?></td>
                        <td><?php echo $row['password']; ?></td>
                        <td><a href="index.php?del=<?php echo $row['netadmins_id'];?>"><i class='bx bxs-trash-alt' ></i></a></td>

                    </tr>
                    <?php
                }
                ?>
            </table>
        </div>
    </div>

</body>

</html>