<?php
//kết nối vào CSDL 
$conn = mysqli_connect('localhost', 'root', '', 'fanofan');
if (!$conn) {
    echo mysqli_connect_error();
}
$rs = mysqli_query($conn, "SELECT *,product.id as product_id,product.name as product_name,category.name as category_name FROM product INNER JOIN category ON product.category_id=category.id");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <table class="table-auto border-separate border-spacing-2 border border-slate-500 ...">
        <thead>
            <tr>
                <th class="border border-slate-600 ...">ID</th>
                <th class="border border-slate-600 ...">Name</th>
                <th class="border border-slate-600 ...">price</th>
                <th class="border border-slate-600 ...">content</th>
                <th class="border border-slate-600 ...">image</th>
                <th class="border border-slate-600 ...">action</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($product = mysqli_fetch_assoc($rs)) : ?>
                <tr>
                    <td class="border border-slate-600 ..."><?php echo $product['product_id']; ?></td>
                    <td class="border border-slate-600 ..."><?php echo $product['product_name']; ?></td>
                    <td class="border border-slate-600 ..."><?php echo $product['price']; ?></td>
                    <td class="border border-slate-600 ..."><?php echo $product['content']; ?></td>
                    <td class="border border-slate-600 ..."><img src="<?php echo $product['image']; ?>" alt=""></td>
                    <td class="border border-slate-600 ...">
                        <a href="delete.php?id=<?php echo $product['product_id'];?>">Xóa</a>
                        <a href="edit.php?id=<?php echo $product['product_id']; ?>">Sửa</a>
                    </td>
                <?php endwhile ?>
                </tr>
        </tbody>
    </table>
</body>

</html>