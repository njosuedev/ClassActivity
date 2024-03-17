<?php 
include 'connect.php';
session_start();

if(isset($_POST['update'])){
    $updateId = $_POST['updateId'];
    $name = $_POST['name'];
    $quantity = $_POST['quant'];
    $newprice = $_POST['newPrice'];

    $newTotal = $quantity * $newprice;
    $sql = "UPDATE `add_items` SET  `item_name`='$name',`quantity`='$quantity',`price`='$newprice', `totalPrice`='$newTotal' WHERE `item_id`='$updateId'";

    $query = mysqli_query($conn,$sql);

    if($query){
         header("location: update.php?message=changes saved successfully!");
    }
    else{
        header("location: update.php?message=changes failed to be saved!");
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
    <title>Stock|Add product</title>
    <script>
        if(window.history.replaceState){
            window.history.replaceState(null,null,window.location.href);
        }
    </script>
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
            <button><a href="register.php" style="color: #eee;text-decoration: none;font-weight: bold;">Add chief</a></button>
            <button><a href="add.php" style="color: #eee;text-decoration: none;font-weight: bold;">Add product</a></button>

            <button><a href="edit.php" style="color: #eee;text-decoration: none;font-weight: bold;">Edit Stock</a></button>

            <button><a href="report.php" style="color: #eee;text-decoration: none;font-weight: bold;">View Report</a></button>

         </div>
         <div>
         <?php
             if(isset($_GET['message'])){
                echo '<div style="background-color: limegreen;color: #eee;padding: 15px;border-radius: 10px;font-size: 17px;text-align: center;">'.$_GET['message'].'<a href="edit.php" style="color: green;background-color:#eee;padding: 5px 20px;border-radius: 10px;margin-left: 100px;text-decoration: none;">Back</a> </div>';
             }
            ?>
         </div><br>
        <div>
        <?php
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            include('connect.php');

            $sql = "SELECT * FROM `add_items` WHERE `item_id` = '$id'";
            $query = mysqli_query($conn,$sql);
          
        ?>
         
         <form action="update.php" method="POST">
            <?php
            while($row = mysqli_fetch_assoc($query)){
            ?> 
            <table>
            <caption>Stock Edit </caption>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>quantity ( Kg )</th>
                <th>Price</th>
                <th>Total Price</th>
                <th>Date</th>
                <!-- <th>Export</th> -->
            </tr>
            <tr> 
                <input type="hidden" name="updateId" value="<?php echo $row['item_id']; ?>">
                <td><?php echo 1; ?></td>
                <td>
                <select name="name" required><br>
                        <option value="potatoes">Potatoes</option>
                        <option value="Maize">Maize</option>
                        <option value="Rice">Rice</option>
                        <option value="Beans">Beans</option>
                        <option value="Vegetables">Vegetables</option>
                </select>
                </td>
                <td><input type="number" name="quant" value="<?php echo $row['quantity']; ?>"></td>

                <td><input type="number" name="newPrice" value="<?php echo $row['price']; ?>"></td>

                <td><?php echo $row['totalPrice'].' Rwf'; ?></td>
                <td><?php echo $row['date'];?></td>
            </tr>
            </table> <br>

                <button type="submit" name="update" style="padding: 10px 50px;font-weight: bold;">Save</button>
                <?php } } ?>
                <!-- end of Gender edit -->
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