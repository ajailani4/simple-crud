<?php
    include_once("config.php");

    //Fetch all users data from Database
    $result = mysqli_query($mysqli, "SELECT * FROM users ORDER BY id DESC");

    if(isset($_POST["submit"])) {
        $userName = $_POST["search"];
        $result = mysqli_query($mysqli, "SELECT * FROM users WHERE name LIKE '%$userName%'");
    }
?>

<html>
    <head>
        <title>CRUD Testing</title>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    </head>

    <body>
        <div class="card bg-primary">
     
            <div class = "mt-5 ml-3">
                <h1 class="text-white">Crud Testing</h1>
             </div>    
                    
            <div class= "mt-0 ml-3">
                <p class="text-white">Add, Get, Edit, and Delete Your Data</p>
            </div>
                   
            <div class= "text-right mr-5 ">
                <a href="add_user.php" class = "btn btn-success text-white">ADD NEW USER</a>
            </div> 

            <div class="mr-5 ml-5">
                <div class="search_user">
                    <form action="" method="POST" class = "form-row align-items-center">
                        <div class="col-auto">
                                <input type="text" class="form-control mb-2" name="search" placeholder="Search user">
                        </div>
                        <div class="col-auto">
                        <button name="submit" class="btn btn-info text-white mb-2">Search</button>
                        </div>
                    </form>
                </div>

                <table width="80%" class="Table">
                    <thead  class = "card-header bg-warning text-white">
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Mobile</th>
                            <th scope="col">Update</th>
                    </tr>
                    </thead>
                
                    <?php
                        while($user_data = mysqli_fetch_array($result)) {
                            echo("<tr>");
                            echo("<td class='text-white'>" . $user_data["name"] . "</td>");
                            echo("<td class='text-white'>" . $user_data["email"] . "</td>");
                            echo("<td class='text-white'>" . $user_data["mobile"] . "</td>");
                            echo("<td class='text-white'> 
                                <a class='text-white' href='edit_user.php?id=$user_data[id]'>Edit</a> | 
                                <a class='text-white' href='delete_user.php?id=$user_data[id]'>Delete</a> </td>");
                            echo("</tr>");
                        }
                    ?>
                </table>
            </div>
        </div>
    </body>
</html>
