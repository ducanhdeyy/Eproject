<?php
if(isset($_GET['id']) && is_numeric($_GET['id'])){
    $id = $_GET['id'];
    $conn = mysqli_connect('localhost', 'root', '', 'fanofan');
    if (!$conn) {
        echo 'kết nối CSDL đến csdl thất bại';
        echo mysqli_connect_error();
    }
    mysqli_query($conn,"DELETE FROM product WHERE id=$id");
}
header('Location:product.php');
?>