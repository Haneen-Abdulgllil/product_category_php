
<?php 
    include 'include/db.php'
?>

<?php 
if(isset($_GET['edit_product'])){
    $edit_id = $_GET['edit_product'];
    $get_p = "select * from products where product_id= '$edit_id'";
    $run_edit = mysqli_query($con , $get_p);
    $row_edit = mysqli_fetch_array($run_edit);

    $p_id = $row_edit['product_id'];
    $p_title = $row_edit['product_title'];
    $p_cat = $row_edit['p_cat_id'];
    $cat = $row_edit['cat_id'];
    $p_image1 = $row_edit['product_img1'];
    $p_image2 = $row_edit['product_img2'];
    $p_image3 = $row_edit['product_img3'];
    $p_price = $row_edit['product_price'];
    $p_desc = $row_edit['product_desc'];
    $p_keywords = $row_edit['product_keyword'];

    $get_p_cat = "select * from product_categories where p_cat_id='$p_cat'";
    $run_p_cat = mysqli_query($con , $get_p_cat);
    $run_p_cat = mysqli_fetch_array($run_p_cat);
    $p_cat_title = $row_p_cat['p_cat_title'];

    $get_cat = "select * from categories where cat_id = '$cat'";
    $run_cat = mysqli_query($con , $get_cat);
    $row_title = $row_cat['cat_title'];

}



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src = "//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>tinymce.init({selector:'textarea'});</script>
    <title>edit products</title>
</head>
<body>
<div class="wrapper d-flex align-items-stretch">
<?php 
    include 'nav.php';
?>
    
    <div class="panel-body m-5">
    <form action="" class="form-horizontal" method="post" enctype="multipart/form-data">

        <div class="form-group">
        <label class="col-md-3 control-lable">Product Title</label>
        <div class="col-md-6">
        <input type="text" name="product_title" calss = "form-control" required value="<?php echo $p_title; ?>">
        </div>
        </div>


        <div class="form-group">
        <label class="col-md-3 control-label"> Product Category</label>
        <div class="col-md-6">
        <select name="product_cat" id="" class="form-control">
        <option value="<?php echo $p_cat ?>"> <?php echo $p_cat_title; ?></option>

        <?php
        $get_p_cats = "select * from product_categories";
        $run_p_cats = mysqli_query($con ,$get_p_cats);
        while($row_p_cats = mysqli_fetch_array($run_p_cats)){
            $p_cat_id = $row_p_cats['p_cat_id'];
            $p_cat_title = $row_p_cats['p_cat_title'];
            echo "<option value = '$p_cat_id' > $p_cat_title </option>";
        }
        ?>

        </select>
        </div>
    
        <div class="form-group">
        <label class="col-md-3 control-label"> Category</label>
        <div class="col-md-6">
        <select name="product_cat" id="" class="form-control">
        <option value="<?php echo $cat ?>"> <?php echo $cat_title; ?></option>

        <?php
        $get_cats = "select * from categories";
        $run_cats = mysqli_query($con ,$get_cats);
        while($row_cats = mysqli_fetch_array($run_cats)){
            $cat_id = $row_cats['cat_id'];
            $cat_title = $row_cats['cat_title'];
            echo "<option value = '$cat_id' > $cat_title </option>";
        }
        ?>
        </select>
        </div>
        </div>


        <div class="form-group">
        <label class="col-md-3 control-label"> Product image 1</label>
        <div class="col-md-6">
        <input type="flie" name = "product_img1" class = "form-control" required>
        <br>
        <img src="images/<?php  echo $p_image1;?>" width = "70"  height ="80">
        </div>
        </div>


        <div class="form-group">
        <label class="col-md-3 control-label"> Product image 2</label>
        <div class="col-md-6">
        <input type="flie" name = "product_img2" class = "form-control" required>
        <br>
        <img src="images/<?php  echo $p_image2;?>" width = "70"  height ="80">
        </div>
        </div>


        <div class="form-group">
        <label class="col-md-3 control-label"> Product image 3</label>
        <div class="col-md-6">
        <input type="flie" name = "product_img3" class = "form-control" required>
        <br>
        <img src="images/<?php  echo $p_image3;?>" width = "70"  height ="80">
        </div>
        </div>

        <div class="form-group">
        <label class="col-md-3 control-label"> Product Price</label>
        <div class="col-md-6">
        <input type="text" name = "product_price" class = "form-control" required value="<?php echo $p_price; ?>">
        </div>
        </div>

        <div class="form-group">
        <label class="col-md-3 control-label"> Product Keywords</label>
        <div class="col-md-6">
        <input type="text" name = "product_keywords" class = "form-control" required value="<?php echo $p_keywords; ?>">
        </div>
        </div>

        <div class="form-group">
        <label class="col-md-3 control-label"> Product Description</label>
        <div class="col-md-6">
        <textarea type="text" name = "product_desc" class = "form-control" required value="<?php echo $p_desc; ?>"></textarea>
        </div>
        </div>

        <div class="form-group">
        <label class="col-md-3 control-label"></label>
        <div class="col-md-6">
        <input type="submit" name = "update" required value="Update Product" class ="btn btn-dark  form-control">
        </div>
        </div>
        

    </form>
    </div>
</div>
        <script src="js/jquery.min.js"></script>
        <script src="js/popper.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/main.js"></script>
</body>
</html>



    <?php 
    if(isset($_POST['update'])){
        $product_title = $_POST['product-title'];
        $product_cat = $_POST['product-cat'];
        $cat = $_POST['cat'];
        $product_price = $_POST['product-price'];
        $product_desc = $_POST['product-desc'];
        $product_keywords= $_POST['product-keyword'];
        
        $product_img1 = $_FILES['product-img1']['name'];
        $product_img2 = $_FILES['product-img2']['name'];
        $product_img3 = $_FILES['product-img3']['name'];

        $temp_name1 = $_FILES['product-img1']['tmp_name'];
        $temp_name2 = $_FILES['product-img2']['tmp_name'];
        $temp_name3 = $_FILES['product-img3']['tmp_name'];

        move_uploaded_file($temp_name1, "images/$product_img1");
        move_uploaded_file($temp_name2, "images/$product_img2");
        move_uploaded_file($temp_name3, "images/$product_img3");


        $update_product = "update products set
        p_cat_id= '$product_cat',
        cat_id = '$cat',
        date = Now(),
        product_title = '$product_title',
        product_img1 = '$product_img1',
        product_img2 = '$product_img2',
        product_img3 = '$product_img3',
        product_price = '$product_price',
        product_desc = '$product_desc',
        product_keyword = '$product_keywords'
        where product_id = '$p_id'
        ";

        $run_product = mysqli_query($con , $update_product);
        if ($run_product){
            echo "<script>alert('product updated successfully')</script>";
            echo "<script>window.open('index.php?view_p','_self')</script>";
        }
    }

    ?>

    

