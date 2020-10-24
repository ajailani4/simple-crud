<?php
    include_once("config.php");

    //Fetch all users data from Database
    $result = mysqli_query($mysqli, "SELECT * FROM users ORDER BY id DESC");
?>

<html>
    <head>
        <title>CRUD Testing</title>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    </head>

    <body>
        <div class="card bg-primary">
     
            <div class = "mt-5 ml-3">
                <h1>Crud Testing</h1>
             </div>    
                    
            <div class= "mt-0 ml-3">
                <p>Get, Edit and Delete your data</p>
            </div>
                   
            <div class= "text-right mr-5 ">
                <a href="add_user.php" class = "btn btn-success text-white">ADD NEW USER</a>
            </div> 
        
        <br>
     
        </div>
        <div class="mr-5 ml-5">
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
                    while($user_data = mysqli_fetch_array($result))
                {
                        echo("<tr>");
                        echo("<td>" . $user_data["name"] . "</td>");
                        echo("<td>" . $user_data["email"] . "</td>");
                        echo("<td>" . $user_data["mobile"] . "</td>");
                        echo("<td> <a href='edit_user.php?id=$user_data[id]'>Edit</a> | <a href='delete_user.php?id=$user_data[id]'>Delete</a> </td>");
                        echo("</tr>");
                }
              ?>
            </table>
        </div>
    </body>
</html>
