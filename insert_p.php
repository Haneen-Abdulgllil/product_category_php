    <?php 
    include 'include/db.php'
    ?>
    
    
    <!doctype html>
    <html lang="en">
        <head>
        <title> insert products</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
                
        <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
        <script>tinymce.init({selector:'textarea'});</script>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
        <link rel="stylesheet" href="css/style.css">
        </head>
        <body>
        
        <div class="wrapper d-flex align-items-stretch">
    <?php 
    include 'nav.php';
    ?>

    <div class="row m-5">
    <div class="col-lg-12">
    <div class="panel panel-default">
    <h3 class="panel-title">
    <i class="fa fa-mony fa-w"></i> Insert Product
    </h3>
    </div>
    </div>
    
<form action="" class="form-horizontal" method = "post" enctype = "multipart/form-data">

<div class="form-group">
<label for="" class="col-md-6 control-label">Product Title</label>
<input type="text" name="product-title" class="form-control" required="">
</div>

<div class="form-group">
<label for="" class="col-md-8 control-label">Product Cateory</label>
<select name="product-cat" id="" class="form-control">
<option value="">Select a product category</option>
<?php 
$get_p_cats = "select * from product_categories";
$run_p_cats = mysqli_query($con , $get_p_cats);
while($row = mysqli_fetch_array($run_p_cats)){
    $id = $row['p_cat_id'];
    $cat_title = $row ['p_cat_title'];
    echo "<option value = '$id' > $cat_title  </option>";
}
?>
</select>
</div>

<div class="form-group">
<label for="" class="col-md-8 control-label">Catigories</label>
<select name="cat" id="" class="form-control">
<option value="">Select Categories</option>
<?php 
$get_p_cats = "select * from categories";
$run_p_cats = mysqli_query($con , $get_p_cats);
while($row = mysqli_fetch_array($run_p_cats)){
    $id = $row['cat_id'];
    $cat_title = $row ['cat_title'];
    echo "<option value = '$id' > $cat_title  </option>";
}
?>
</select>
</div>

<div class="form-group">
<label for="" class="col-md-6 control-label">Product Image 1</label>
<input type="file" name="product-img1" class="form-control" required="">
</div>

<div class="form-group">
<label for="" class="col-md-6 control-label">Product Image 2</label>
<input type="file" name="product-img2" class="form-control" required="">
</div>

<div class="form-group">
<label for="" class="col-md-6 control-label">Product Image 3</label>
<input type="file" name="product-img3" class="form-control" required="">
</div>

<div class="form-group">
<label for="" class="col-md-6 control-label">Product Price</label>
<input type="text" name="product-price" class="form-control" required="">
</div>

<div class="form-group">
<label for="" class="col-md-6 control-label">Product Keyword</label>
<input type="text" name="product-keyword" class="form-control" required="">
</div>

<div class="form-group">
<label for="" class="col-md-6y control-label">Product Description</label>
<textarea type="text" name="product-desc" class="form-control" required="" row = "6" col = "19"></textarea>
</div>

<div class="form-group">
<input type="submit" name="submit" class="form-control btn btn-dark light" value = "insert product">
</div>

</form>
</div>





        <script src="js/jquery.min.js"></script>
        <script src="js/popper.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/main.js"></script>
        </body>
    </html>




    <?php 
    if(isset($_POST['submit'])){
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

        $insert_product = "insert into products (
            p_cat_id,
            cat_id,
            date,
            product_title,
            product_img1,
            product_img2,
            product_img3,
            product_price,
            product_desc,
            product_keyword
            )
            values(
                ' $product_cat', 
                '$cat' ,
                Now(),
                '$product_title',
                '$product_img1',
                '$product_img2',
                '$product_img3',
                '$product_price',
                '$product_desc',
                '$product_keywords'    

        )";

        $run_product = mysqli_query($con, $insert_product);
        if($run_product){
            echo "<script>alert('product inserted successfully')</script>";
            echo "<script>window.open('view_p.php')</script>";
        }
        else{
            echo "erroe:" . mysql_error($con);
        }

    }
    
    
    ?>