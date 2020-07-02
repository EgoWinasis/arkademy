<?php
// Create database connection using config file
include_once("config.php");

// Fetch all users data from database
$result = mysqli_query($mysqli, "SELECT * FROM produk ");
?>

<html>
<head>    
    <title>Homepage</title>
</head>

<body>
<a href="add.php">Add New User</a><br/><br/>

    <table width='80%' border=1>

    <tr>
        <th>ID</th><th>Nama Produk</th> <th>Harga</th> <th>Jumlah</th> <th>Keterangan</th>
    </tr>
    <?php  
    while($user_data = mysqli_fetch_array($result)) {         
        echo "<tr>";
        echo "<td>".$user_data['id']."</td>";
        echo "<td>".$user_data['nama_produk']."</td>";
        echo "<td>".$user_data['harga']."</td>";
        echo "<td>".$user_data['jumlah']."</td>"; 
        echo "<td>".$user_data['keterangan']."</td>";    
        echo "<td><a href='edit.php?id=$user_data[id]'>Edit</a> | <a href='delete.php?id=$user_data[id]'>Delete</a></td></tr>";        
    }
    ?>
    </table>
</body>
</html>