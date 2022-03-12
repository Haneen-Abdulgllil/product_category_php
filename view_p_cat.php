    
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
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
        <link rel="stylesheet" href="css/style.css">
        </head>
        <body>
        
        <div class="wrapper d-flex align-items-stretch">
    <?php 
    include 'nav.php';
    ?>

    <div class="panel-body m-5">
    <div class="table-responsive">
    <table class="table table-bordered table-hover table-striped">
    <thead>
    <tr>
    <th>Product Category Id</th>
    <th>Product Category Title</th>
    <th>Product Category Description</th>
    <th> Delete Product Category </th>
    <th> Edit Product Category </th>
    </tr>
    </thead>
    <tbody>
    <?php 
    $i = 0;
    $get_p_cats = "select * from product_categories";
    $run_p_cats = mysqli_query($con , $get_p_cats);
    while($row_p_cats = mysqli_fetch_array($run_p_cats)){
        $p_cat_id = $row_p_cats['p_cat_id'];
        $p_cat_title = $row_p_cats['p_cat_title'];
        $p_cat_desc = $row_p_cats['p_cat_desc'];
        $i++;
        
        ?>

        <tr>
        <td> <?php echo $i; ?></td>
        <td><?php echo $p_cat_title; ?></td>
        <td width = "300"><?php echo $p_cat_desc; ?> </td>
        <td>
        <a href="index.php?delete_p_cat=<?php echo $p_cat_id; ?>">
        <i class="bi bi-trash-fill" style = "color : red;"></i>
        </a>
        </td>

        <td>
        <a href="edit_p_cat.php?edit_p_cat = <?php echo $p_cat_id ?>">
        <i class="bi bi-pencil-fill" style = "color : blue;"></i>
        </a>
        </td>
        
        </td>
        </tr>
        <?php  } ?>
    </tbody>
    </table> 
    </div>
    </div>




</div>
        <script src="js/jquery.min.js"></script>
        <script src="js/popper.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/main.js"></script>
        </body>
    </html>