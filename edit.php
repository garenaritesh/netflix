<!-- php script -->
<?php
include ('db.php');

$sql = "select * from netadmins";
$GetResult = mysqli_query($db, $sql);

if (isset($_REQUEST['edt'])) {
    $id = $_REQUEST['edt'];
    $sql = "select * from netadmins where netadmins_id = '$id'";
    $a = mysqli_query($db, $sql);
    $vk = mysqli_fetch_array($a);
}

if (isset($_REQUEST['ins'])) {
    $user = $_REQUEST['username'];
    $password = $_REQUEST['password'];

    $img = $_FILES['img']['name'];
    move_uploaded_file($_FILES['img']['tmp_name'],'images/'.$img);

    if ($img == '') 
    {
        $img = $vk['img'];
    }

    $sql = "update netadmins set username='$user',password='$password',img='$img' where netadmins_id = '$id'";
    mysqli_query($db, $sql);
    header("location:index.php");
}

if (isset($_REQUEST['del'])) {
    $id = $_REQUEST['del'];
    $sql = "delete from netadmins where netadmins_id = '$id'";
    mysqli_query($db, $sql);
    header("location:index.php");
}

?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Admins | Netflix </title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="media.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>

    <!-- Body Content Here -->
    <nav>
        <div class="logo">
            <h1>Net<span>Flix</span></h1>
            <i class='bx bx-menu' id="menu"></i>
            <i class='bx bx-x' id="cls-menu"></i>
        </div>
        <ul class="item">
            <li><i class='bx bxs-user'></i></li>
        </ul>
    </nav>

    <div class="container">
        <div class="left" id="left-sidebar">
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
            <div class="login_form">
                <form action="" method="post" enctype="multipart/form-data">
                    <input type="text" name="username" placeholder="Username" id="username"
                        value="<?php echo $vk['username']; ?>">
                    <input type="password" name="password" placeholder="Password" id="password"
                        value="<?php echo $vk['password']; ?>">
                    <div>Image</div>
                    <img src="images/<?php echo $vk['img']; ?>" alt=""
                        width="100" height="100">
                    <input type="file" name="img">

                    <input type="submit" name="ins" id="log_submit_btn">
                </form>
            </div>

            <!-- User Management Content Structure -->
            <table class="User_Management">
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Image</th>
                    <th>Delete User</th>
                </tr>
                <?php
                $no = 1;
                while ($row = mysqli_fetch_array($GetResult)) {
                    ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $row['username']; ?></td>
                        <td><?php echo $row['password']; ?></td>
                        <td><img src="images/<?php echo  $row['img']; ?>" alt="" style=" width:100px; height:100px; object-fit:cover border-radius:2px red" ></td>
                        <td><a href="index.php?del=<?php echo $row['netadmins_id']; ?>"><i class='bx bxs-trash-alt'></i></a>
                        </td>

                    </tr>
                    <?php
                }
                ?>
            </table>
        </div>
    </div>

    <!-- Javascript file link Here -->
    <script src="main.js"></script>

</body>

</html>