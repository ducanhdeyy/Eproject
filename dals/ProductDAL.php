<?php 
  require_once 'DB.php';
  require_once 'ICRUD.php';
  class ProductDAL extends DB implements  ICRUD{
    public function __construct(){
        parent::__construct();//chạy các lệnh trong constructor của cha 
        $this->setTableName("product");
    }

    public function getList(){
       $sql = "SELECT *,product.name as product_name,product.id as product_id,category.name as category_name FROM $this->tableName LEFT JOIN category ON product.category_id = category.id";
       $rs = $this->pdo->query($sql);  
       return $rs->fetchAll(PDO::FETCH_OBJ);   
    }

    public function getListByCategoryId($categoryId,$limit=4){
        $sql = "SELECT *,product.name as product_name,product.id as product_id,category.name as category_name FROM $this->tableName LEFT JOIN category ON product.category_id = category.id where product.category_id=$categoryId LIMIT 4";
        $rs = $this->pdo->query($sql);  
        return $rs->fetchAll(PDO::FETCH_OBJ);   
    }

    public function getOne($id){
        $sql = "SELECT * FROM $this->tableName WHERE id=$id";
        $rs = $this->pdo->query($sql);  
        $rs->setFetchMode(PDO::FETCH_OBJ);
        return $rs->fetch(); 
    }
    public function addOne($data){
        $prp = $this->pdo->prepare("INSERT INTO $this->tableName(name,content,price,image,category_id) VALUES(:name,:content,:price,:image,:category_id)");
        $prp->bindParam(':name',$data['name']);
        $prp->bindParam(':content',$data['content']);
        $prp->bindParam(':price',$data['price']);
        $prp->bindParam(':image',$data['image']);
        $prp->bindParam(':category_id',$data['category_id']);
        try{
            $prp->execute();
            return true;
        }catch(Exception $e){
            echo $e->getMessage();
            return false;
        }
    }//C

    public function deleteOne($id){
    
        try {
            $this->pdo->query("DELETE FROM $this->tableName WHERE id=$id");    
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
     
    }//D
    
    public function updateOne($id,$data){
        $prp = $this->pdo->prepare("UPDATE $this->tableName SET name=:name,content=:content,image=:image,price=:price,category_id=:category_id WHERE id=:id");
        $prp->bindParam(':name',$data['name']);
        $prp->bindParam(':content',$data['content']);
        $prp->bindParam(':price',$data['price']);
        $prp->bindParam(':image',$data['image']);
        $prp->bindParam(':category_id',$data['category_id']);
        try{
            $prp->execute();
            return true;
        }catch(Exception $e){
            return false;
        }
    }//U 
  }
?>