<?php 
    //kết nối vào mysql server 
    $connect = mysqli_connect('localhost','root','','fanofan'); 
    if(!$connect){
      die("Connect Failed").mysqli_connect_error();//in ra thông báo lỗi và dừng chương trình
    }
    $id = $_GET['id'];
    if(isset($_POST['name'])){
        $name = $_POST['name'];
        $price  = $_POST['price'];
        $content = $_POST['content'];
        $category_id = $_POST['category_id'];
        $image = $_POST['image'];
        $sql = "UPDATE product SET name='$name',price='$price',content='$content',category_id='$category_id',image = '$image' WHERE id=$id";
        mysqli_query($connect,$sql);
    }

    $sql = "SELECT * FROM product WHERE id=$id";
    $results = mysqli_query($connect,$sql);
    if(mysqli_num_rows($results)==1){
        $obj = mysqli_fetch_assoc($results);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST">
    <div>
    <label for="">Tên quạt</label>
          <input type="text" name="name" placeholder="Name" value="<?php echo $obj['name']; ?>"/>
        </div> 
        <div>
        <label for="">nhập giá</label>
          <input type="text" name="price" placeholder="Price" value="<?php echo $obj['price']; ?>"/>
        </div>
        
        <div>
        <label for="">Mô tả</label>
          <textarea name="content" placeholder="content"><?php echo $obj['content']; ?></textarea>
        </div>
        <div>
        <label>category_id</label>
            <input type="text" name="category_id" placeholder="category_id" value="<?php echo $obj['category_id']?>">
        </div>
        <div>
          <input type="file" name="image" placeholder="image" value="<?php echo $obj['image']; ?>"/>
        </div>
       
        <button>Submit</button>
    </form>
</body>
</html>