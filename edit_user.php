<?php
    include_once("config.php");

    $id = $_GET["id"];

    $result = mysqli_query($mysqli, "SELECT * FROM users WHERE id=$id");

    //Fetch user data based on id
    while($user_data = mysqli_fetch_array($result))
    {
        $name = $user_data["name"];
        $email = $user_data["email"];
        $mobile = $user_data["mobile"];
    }
?>

<html>
    <head>
        <title>Edit User Data</title>
    </head>

    <body>
        <a href="index.php">Go to Home</a><br><br>

        <div id="form">
            <form action="edit_user.php" method="post" name="edit_form">
                Name <input type="text" name="name" value="<?php echo($name) ?>"><br>
                Email <input type="text" name="email" value="<?php echo($email) ?>"><br>
                Mobile <input type="text" name="mobile" value="<?php echo($mobile) ?>"><br>
                <br>
                <input type="hidden" name="id" value=<?php echo $_GET["id"] ?>>
                <input type="submit" name="Update" value="Update">
            </form>
        </div>

        <?php
            //Check if form is submitted, update user data to database
            if(isset($_POST["Update"]))
            {
                $id = $_POST["id"];
                $name = $_POST["name"];
                $email = $_POST["email"];
                $mobile = $_POST["mobile"];

                if($name != null && $email != null && $mobile != null)
                {
                    $result = mysqli_query($mysqli, "UPDATE users SET name='$name', email='$email', mobile='$mobile' WHERE id=$id");
                    header("Location: index.php");
                } else
                {
                    echo("Fill the form completely!");
                }
            }
        ?>
    </body>
</html>