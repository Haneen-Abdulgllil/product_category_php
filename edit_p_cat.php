<?php 
    include 'include/db.php'
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
    <title>edit products Category</title>
</head>
<body>
<div class="wrapper d-flex align-items-stretch">
<?php 
    include 'nav.php';
?>



<?php
if(isset($_GET['edit_p_cat'])){
    $edit_p_cat_id = $_GET['edit_p_cat'];
    $edit_p_cat_query = "select * from product_categories where p_cat_id = $edit_p_cat_id ";
    $run_edit = mysqli_query($con , $edit_p_cat_query);
    $row_edit = mysqli_fetch_array($run_edit);
    $p_cat_id = $row_edit['p_cat_id'];
    $p_cat_title = $row_edit['p_cat_title'];
    $p_cat_desc = $row_edit['p_cat_desc'];
}
?>


<div class="panel-body m-5">
<form action="" class="form-horizontal" method = "post">


<div class="form-group">
<label for="" class="col-md-12 control-label"> Product Category Title</label>
<div class="col-md-12">
<input type="text" name="p_cat_title" class="form-control" value= "<?php echo  $row_edit['p_cat_title']; ?>" >
</div>
</div>


<div class="form-group">
<label for="" class="col-md-12 control-label"> Product Category Description</label>
<div class="col-md-12">
<textarea type="text" name="p_cat_title" class="form-control" value= "<?php echo $row_edit['p_cat_desc'];?>"></textarea>
</div>
</div>



<div class="form-group">
<label class="col-md-3 control-label"></label>
<div class="col-md-12">
<input type="submit" name = "update" required  value="Update Product Category" class ="btn btn-dark  form-control">
</div>
</div>

</form>
</div>

</div>
</body>
</html>

<?php
if(isset($_POST['update'])){
    $p_cat_title = $_POST['p_cat_title'];
    $p_cat_desc = $_POST['p_cat_desc'];

    $update_p_cat = "update product_categories set 
    p_cat_title = '$p_cat_title',
    p_cat_desc = '$p_cat_desc' 
    where p_cat_id = '$p_cat_id'
    ";

    $run_p_cat = mysqli_query($con , $update_p_cat);
    if ($run_p_cat){
        echo "<script>alert('product category updated successfully')</script>";
        echo "<script>window.open('index.php?view_p_cat','_self')</script>";
    }
}
?>