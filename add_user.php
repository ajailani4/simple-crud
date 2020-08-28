<html>
    <head>
        <title>Add New User</title>
    </head>

    <body>
        <a href="index.php">Go to Home</a><br><br>

        <div id="form">
            <form action="add_user.php" method="post" name="add_form">
                Name <input type="text" name="name"><br>
                Email <input type="text" name="email"><br>
                Mobile <input type="text" name="mobile"><br>
                <br>
                <input type="submit" name="Submit" value="Add">
            </form>
        </div>

        <?php
            //Check if form is submitted, insert the data to database
            if(isset($_POST["Submit"]))
            {
                $name = $_POST["name"];
                $email = $_POST["email"];
                $mobile = $_POST["mobile"];

                include_once("config.php");

                if($name != null && $email != null && $mobile != null)
                {
                    $result = mysqli_query($mysqli, "INSERT INTO users(name, email, mobile) VALUES('$name', '$email', '$mobile')");
                    echo("User is added successfully");
                } else
                {
                    echo("Fill the form completely!");
                }
            }
        ?>
    </body>
</html>