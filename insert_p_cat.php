
<?php 
include 'include/db.php'
?>
<!doctype html>
<html lang="en">
<head>
    <title> DashBoard Products Managment</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    
    <div class="wrapper d-flex align-items-stretch">
<?php 
include 'nav.php';
?>
<div class="panel-body m-5">
<form action="" class="form-horizontal" method="post">
<div class="form-group">
<label for="" class="col-md-10 control-label"> Product Category Title</label>
<div class="col-md-10">
<input type="text" class="form-control" name="p_cat_title" required>
</div>
</div>

<div class="form-group">
<label for="" class="col-md-12 control-label"> Product Category Description</label>
<div class="col-md-10">
<textarea name="p_cat_desc" id="" cols="30" rows="5" class="form-conrol" required></textarea>
</div>
</div>


<div class="form-group">
<label for="" class="col-md-10 control-label"> </label>
<div class="col-md-10">
<input type="submit" class=" btn btn-dark light form-control" name="submit" value = "submit Now">
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
if(isset($_POST['submit'])){
    $p_cat_title = $_POST['p_cat_title'];
    $p_cat_desc = $_POST['p_cat_desc'];
    $insert_p_cat = "insert into product_categories (
        p_cat_title,
        p_cat_desc
    )
    values(
        '$p_cat_title',
        '$p_cat_desc'
    )
    ";

    $run_p_cat = mysqli_query($con , $insert_p_cat);
    if($run_p_cat){
        echo "<script>alert('Product Category inserted successfully')</script>";
        echo "<script>window.open('view_p_cat.php')</script>";
    }
}
?>
