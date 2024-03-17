<?php

include 'connect.php';
session_start();

if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM `user` WHERE `username` = '$username'";
    $query = mysqli_query($conn,$sql);
    $res = mysqli_num_rows($query);

    if($res > 0){
        while($row = mysqli_fetch_assoc($query)){
            if($password == $row['pass']){
                if($row['status'] == 'admin'){
                    $_SESSION['username'] = $row['username'];
                    $_SESSION['profile'] = $row['profile'];
                    
                    header("location: home.php");
                }
                else{
                    $_SESSION['username'] = $row['username'];
                    $_SESSION['profile'] = $row['profile'];
                    header("location: user.php");
                }
            }
            else{
                echo '<script>alert("user not found")</script>';
            }
        }
    }
    else{
        function mess(){
            $notFound = 'user Not Found';
        echo $notFound;
        }
    }
}

?>

<!DOCTYPE html">
<html lang="en" style="color-scheme: dark;">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        html{
            color-scheme: dark;
        }
        body{
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-self: center;
        }
        form{
            width: 400px;
            height: 400px;
            background-color:#333;
            padding: 20px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            border-radius: 20px;
        }
        a{
            color: blue;
        }
        form > input{
            outline: none;
            border: none;
            height: 30px;
            padding: 5px 20px;
            border-radius: 5px;
            font-size: 15px;
            color: #b4b4b4;
        }
        form > h3{
            text-align: center;
        }
        form > button{
            padding: 10px;
        }
        form > input:focus{
             border-bottom: 1px solid tomato;
             padding: 10px 20px;
        }
    </style>
</head>
<body>
<h2> Ecole Primaire Sainte Anne Stock Management System</h2>
    <form  method="post">
    <h2 style="text-align: center;">login to manage stock </h2>
         <input type="text" name="username"placeholder="User Name"><br><br>
         <input type="password" name="password" placeholder="Password"><br><br>
        <button type="submit" name="submit">Login</button>
        <br><br>
    </form>
</body>
</html>