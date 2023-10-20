<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration Form</title>
    <style>
        body {
            font-family: Arial;
            background-color: #FFFAFA;
            text-align: center;
        }

        h1 {
            color: #eea29a;
        }

        form {
            background-color: black;
            border-radius: 8px;
            width: 400px;
            margin: 0 auto;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        label {
            display: block;
            text-align: left;
            margin-top: 10px;
            color: white;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 90%;
            padding: 10px;
            margin: 5px 0;
            border: 1px solid white;
            border-radius: 5px;
            font-family: Arial;
        }

        input[type="submit"] {
            background-color: #F08080;
            color: black;
            font-family: Arial;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #F08080;
        }
    </style>
</head>
<body>
    <h1>USER REGISTRATION FORM</h1>
    <div class="form-container">
        <form method="post" action="">
            <label for="username">USERNAME</label>
            <input type="text" id="username" name="username" required><br><br>

            <label for="firstname">FIRST NAME</label>
            <input type="text" id="firstname" name="firstname" required><br><br>

            <label for="lastname">LAST NAME</label>
            <input type="text" id="lastname" name="lastname" required><br><br>

            <label for="email">EMAIL</label>
            <input type="email" id="email" name="email" required><br><br>

            <label for="password">PASSWORD</label>
            <input type="password" id="password" name="password" required><br><br>

            <input type="submit" value="SUBMIT" name="submit">
        </form>
    </div>
</body>
</html>
<?php
if (isset($_POST["submit"])) {
    $username = $_POST["username"];
    $firstname = $_POST["firstname"];
    $lastname  = $_POST["lastname"];
    $email  = $_POST["email"];
    $password = $_POST["password"];

    if (!empty($username) && !empty($firstname) && !empty($lastname) && !empty($email) && !empty($password)) {
    
    
        $link = mysqli_connect("localhost", "root", "", "usersaccount");
        
        if($link === false){
            die("ERROR: Could not connect. " . mysqli_connect_error());
        }
        
        $sql = "INSERT INTO usersinformation (username, firstname, lastname, email, password) VALUES ('$username', '$firstname', '$lastname' , '$email', '$password')";
        if(mysqli_query($link, $sql)){

            echo '<script>alert("Records inserted successfully.")</script>'; 
        } else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
        }

            mysqli_close($link);
        }
    }


?>
