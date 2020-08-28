<?php
    include_once("config.php");

    //Fetch all users data from Database
    $result = mysqli_query($mysqli, "SELECT * FROM users ORDER BY id DESC");
?>

<html>
    <head>
        <title>CRUD Testing</title>
    </head>

    <body>
        <a href="add_user.php">Add new user</a><br><br>
        
        <table width="80%" border=1>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Mobile</th>
                <th>Update</th>
            </tr>

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
    </body>
</html>