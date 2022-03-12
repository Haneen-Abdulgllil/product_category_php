<?php 
    include 'include/db.php'
    ?>

<!doctype html>
    <html lang="en">
        <head>
        <title> view products</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
        
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
        </head>
        <body>
        
        <div class="wrapper d-flex align-items-stretch">
    <?php 
    include 'nav.php';
    ?>

    <div class="row">
    </div>

        <!-- <div id="content" class="p-4 p-md-5">
            <h2 class="mb-4">View Products</h2>
        </div> -->

        <div class="panel-body m-5">
        <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped">
        <thead>
        <tr>
        <th>Product Id</th>
        <th>Product Title</th>
        <th> Product Image</th>
        <th> Product Category</th>
        <th> Category</th>
        <th>Product Price</th>
        <th>Product Keywords</th>
        <th>Date</th>
        <th>Product Delete</th>
        <th>Product Edit</th>

        </tr>
        </thead>

        <tbody>
        <?php 
        $i = 0;
        $get_product = "select * from products";
        $run_p = mysqli_query($con , $get_product);
        while($row = mysqli_fetch_array($run_p)){
            $pro_id = $row['product_id'];
            $pro_title = $row['product_title'];
            $pro_img1 = $row['product_img1'];
            $pro_cat = $row['p_cat_id'];
            $cat = $row['cat_id'];
            $pro_price = $row['product_price'];
            $pro_keyword = $row['product_keyword'];
            $date = $row['date'];
            $i++;
            ?>
            
            <tr>
            <td> <?php echo $i ?></td>
            <td> <?php echo $pro_title ?></td>
            <td> <img src= "images/<?php echo $pro_img1 ?>" width="80" height="80"></td>
            <td><?php echo  $pro_cat ?></td>
            <td><?php echo  $cat?></td>
            <td><?php echo $pro_price ?></td>
            <td><?php echo $pro_keyword ?></td>
            <td><?php echo $date ?></td>

            <td>
            <a href="index.php?delete_product= <?php echo $pro_id ?>">
            <i class="bi bi-trash-fill" style = "color : red;"></i>
            </a>
            </td>

            <td>
            <a href="edit_p.php?edit_product = <?php echo $pro_id ?>">
            <i class="bi bi-pencil-fill" style = "color : blue;"></i>
            </a>
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