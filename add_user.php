<html>
    <head>
        <title>Add New User</title>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    </head>

    <body>
        <div class = "mt-3 ml-3">
            <a href="index.php" class="btn btn-primary text-white">Go to Home</a><br><br>
        </div>

        <div class="modal-dialog text-center">  
            <div class="modal-content">      
                <div id="form" class="col-12">
                    <form action="add_user.php" method="post" name="add_form">
                        <br>
                        <div class="form-group">
                            <input type="text"class= "form-control" placeholder="Enter Name" name="name">
                        </div>
                        <br>
                        <div class="form-group">
                            <input type="text" class = "form-control" placeholder="Enter E-mail" name="email">
                        </div>
                        <br>
                        <div class="form-group">
                             <input type="text" class = "form-control" placeholder= "Enter Mobile" name="mobile">
                        </div>
                        <br>
                        <br>
                        <button type="submit" class ="btn btn-success" name="Submit">ADD</button>
                    </form>
                </div>
            </div>
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
