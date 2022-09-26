<?php
//kết nối vào CSDL 
$conn = mysqli_connect('localhost','root','','fanofan');
if (!$conn) {
    echo mysqli_connect_error();
}
$categoryRS = mysqli_query($conn, "SELECT * FROM category");
if (isset($_FILES['image']) && $_FILES['image']['name']) {
    $duongDanAnh = 'uploads/'. time() . $_FILES['image']['name'];
    move_uploaded_file($_FILES['image']['tmp_name'],$duongDanAnh);
    $name = $_POST['name'];
    $category_id = $_POST['category_id'];
    $price = $_POST['price'];
    $content = $_POST['content'];
    mysqli_query($conn,"INSERT INTO product(name,price,content,image,category_id) VALUES('$name','$price','$content','$duongDanAnh','$category_id')");
    echo mysqli_error($conn);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>add-product</title>
</head>

<body>
    <form method="POST" enctype="multipart/form-data">
        <table>
            <tbody>
                <tr>
                    <td>
                        <label>Tên quạt</label>
                        <input type="text" name="name" placeholder="Nhập tên quạt" />
                    </td>
                    <td>
                        <label>Chọn loại quạt</label>
                        <select name="category_id">
                            <?php while ($category = mysqli_fetch_assoc($categoryRS)) : ?>
                                <option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>        
                            <?php endwhile ?> 
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Giá</label>
                        <input type="text" name="price" placeholder="Nhập giá" />
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="file" name="image" placeholder="Chọn tập tin..." />
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <label>Mô tả</label>
                        <textarea name="content"></textarea>
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <button>Thêm mới</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </form>

</body>

</html>