<?php 
include 'connect.php';
session_start();

if(isset($_POST['regist'])){

    $fullName = $_POST['name'];
    $uname = $_POST['uname'];
    $password = $_POST['passing'];
    $status = $_POST['userStatus'];
    $pro = $_FILES['image']['name'];


    $insert = "INSERT INTO `user`(`name`, `username`, `profile`, `pass`, `status`) VALUES ('$fullName','$uname','$pro','$password','$status')";

    $result = mysqli_query($conn,$insert);
    if($result){
        move_uploaded_file($_FILES['image']['tmp_name'], "profile/".$pro);
        if($status == 'user'){
            header("location: register.php?message=".$uname." as chief registered successfully!");
        }
        else{
            header("location: register.php?messageErro=chief Fail to be registered");
        }
    }
    else{
        echo 'registration failed';
    }

  }  
if(isset($_SESSION['username']) && isset($_SESSION['profile'])){
    $adminName = $_SESSION['username'];
    $adminProfile = $_SESSION['profile'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>stock || add chief</title>
    <style>
        .asideProduct{
            display: flex;
            flex-direction: column;
            background: white;
            width: 10%;
            padding: 40px;
            background-color: rgb(2, 2, 56);
        }
          .container .asideProduct a{
            color: #eee;
            text-decoration: none;
            font-family: arial;
            font-size: 15px;
            margin-top: 30px;
            border: 1px solid #eee;
            padding: 10px 15px;
            border-radius: 4px;
        }
        *{
            margin: 0;
            padding: 0;
        }
        body{
            background-color: #eee;
        }
        .container{
            display: flex;
            height: 100vh;
            gap: 2px;
        }
        .container .asideProduct{
            display: flex;
            flex-direction: column;
            width: 10%;
        }
        .container .mainContainer{
            padding: 40px;
        }
        /* table */
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td, th {
            border: 1px solid #333;
            text-align: left;
            padding: 8px;
        }
        caption{
            background: #333;
            color: #eee;
            padding: 10px;
        }
        button{
            background: #333;
            border: none;
            border-radius: 10px;
            color:#eee;
            padding: 10px 40px;
            margin-bottom: 20px;
        }
         /* Print-specific styles */
         @media print {
            body {
                margin: 0;
                background-color: #333;
                color: #eee;
            }

            table {
                width: 100%;
            }

            th, td {
                border: 1px solid #000;
                padding: 5px;
            }
        }
        /* end of table */
    </style>
</head>
<script>
    if(window.history.replaceState){
        window.history.replaceState(null,null,window.location.href);
    }
</script>
<body>
    <div class="container">
       
        <div   class="asideProduct">
        <h2 style="color: #eee; font-family: arial; padding: 10px; ">Admin Panel</h2>
            <a href="logout.php">Logout</a>
        </div>
        <div class="mainContainer">
         <div style="display: flex;background-color: orangered;margin-bottom: 20px;gap: 20vw;align-items: center;border-radius: 10px;">
            <div style="padding: 20px;color: #eee;border-radius: 10px;width: 60%;">
            <h1>Hello, Admin ( <?php echo $adminName;?> )</h1>
            <p>you are now intracting as admin, Therefore you are now allowed to add new chief to the system , products (stock in ) and Edit products as you wish as well as you can view the stock report by seleting dates </p>
            </div>
            <div style="width: 100px;height: 100px;background-color: #eee;border-radius: 50%;display: flex;justify-content:center;align-items: center;">
              <?php echo '<img style="width: 100%;border-radius: 50%;border: 4px solid #eee;" src="./profile/'.$adminProfile.'">'; ?>
            </div>
         </div>
         <div>
            <?php
             if(isset($_GET['message'])){
                echo '<div style="background-color: limegreen;color: #eee;padding: 15px;border-radius: 10px;font-size: 17px;text-align: center;">'.$_GET['message'].'</div>';
             }
             elseif(isset($_GET['messageErro'])){
                echo '<div style="background-color: rgb(248, 4, 98);color: #eee;padding: 15px;border-radius: 10px;font-size: 17px;text-align: center;">'.$_GET['messageErro'].'</div>';
             }

            ?>
         </div>
         <div>
            <button><a href="register.php" style="color: #eee;text-decoration: none;font-weight: bold;">Add chief</a></button>
            <button><a href="add.php" style="color: #eee;text-decoration: none;font-weight: bold;">Add product</a></button>

            <button><a href="edit.php" style="color: #eee;text-decoration: none;font-weight: bold;">Edit Stock</a></button>

            <button><a href="report.php" style="color: #eee;text-decoration: none;font-weight: bold;">View Report</a></button>

         </div>
        <div>
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data">
            <h2>register now</h2>
            <input type="text" name="name" placeholder="Full Name" required>
            <br><br>
            <input type="text"  name="uname" placeholder="User name" required>
            <br><br>
            <input type="password"  name="passing" placeholder="Password" required>
            <br><br>
             
            <label for="pro">Add Profile</label><br>
            <input type="file"  name="image" placeholder="image" required>
            <br><br>

            <label for="gender">user Status </label>
            <br>
            <input type="radio"  name="userStatus" value="user" required>
            <label for="male">user</label>
            <br>
            <input type="radio" name="userStatus" value="admin" required>
            <label for="female">admin</label>
            <br><br>
            <button type="submit"name="regist">add chief</button>
         </form>
        </div>
      
        <div style="border-top: 2px solid orangered;height: 5vh;padding: 20px;display: flex;flex-direction: column;justify-content: center;align-items: center;font-size: 11px;font-family: arial;">
         Ecole Primaire Sainte Anne &copy; 2024 all right is reserved <br>
         <p>
         Developed by <a href="info.php">NIYOMWUNGERI Josue</a>
         </p>
        </div>
        </div>
    </div>
    <script>
    function printTable() {
        var printWindow = window.open('', '_blank');
        printWindow.document.write('<html><head><title>Print Table</title>');
        printWindow.document.write('<link rel="stylesheet" type="text/css" href="styles.css">'); // Link to external styles if needed
        printWindow.document.write('</head><body>');
        printWindow.document.write(document.getElementById('dataTable').outerHTML);
        printWindow.document.write('</body></html>');
        printWindow.document.close();
        printWindow.print();
    }
</script>
</body>
</html>
<?php
}
else{
    header("location:index.php");
}
?>