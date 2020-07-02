<?php
// include database connection file
include_once("config.php");

// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['update']))
{   
    $id = $_POST['id'];

    $nama=$_POST['nama_produk'];
    $harga=$_POST['harga'];
    $jumlah=$_POST['jumlah'];
    $keterangan=$_POST['keterangan'];

    // update user data
    $result = mysqli_query($mysqli, "UPDATE produk SET nama_produk='$nama',harga='$harga',jumlah='$jumlah', keterangan= '$keterangan' WHERE id=$id");

    // Redirect to homepage to display updated user in list
    header("Location: index.php");
}
?>
<?php
// Display selected user data based on id
// Getting id from url
$id = $_GET['id'];

// Fetech user data based on id
$result = mysqli_query($mysqli, "SELECT * FROM produk WHERE id=$id");

while($user_data = mysqli_fetch_array($result))
{
    $nama = $user_data['nama_produk'];
    $harga = $user_data['harga'];
    $jumlah = $user_data['jumlah'];
    $keterangan = $user_data['keterangan'];
}
?>
<html>
<head>  
    <title>Edit User Data</title>
</head>

<body>
    <a href="index.php">Home</a>
    <br/><br/>

    <form name="update_user" method="post" action="edit.php">
        <table border="0">
            <tr> 
                <td>Nama Produk</td>
                <td><input type="text" name="nama" value=<?php echo $nama;?>></td>
            </tr>
            <tr> 
                <td>Harga</td>
                <td><input type="text" name="harga" value=<?php echo $harga;?>></td>
            </tr>
            <tr> 
                <td>Jumlah</td>
                <td><input type="text" name="jumlah" value=<?php echo $jumlah;?>></td>
            </tr>
            <tr> 
                <td>Keterangan</td>
                <td><input type="text" name="keterangan" value=<?php echo $keterangan;?>></td>
            </tr>
            <tr>
                <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>