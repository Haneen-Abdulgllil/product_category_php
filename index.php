  
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

          <!-- Page Content  -->
        <div id="content" class="p-4 p-md-5">
          <h2 class="mb-4">WELCOME</h2>
          <img src="images/2.jpg" alt="" style = "width : 100%;">
        </div>

      </div>


<?php
if(isset($_GET['view_product'])){
  include 'view_p.php';
}
if(isset($_GET['delete_product'])){
  include 'delete_p.php';
}

if(isset($_GET['edit_product'])){
  include 'edit_p.php';
}

if(isset($_GET['insert_product_cat'])){
  include 'insert_p_cat.php';
}

if(isset($_GET['delete_p_cat'])){
  include 'delete_p_cat.php';
}

if(isset($_GET['edit_p_cat'])){
  include 'edit_p_cat.php';
}

?>


      <script src="js/jquery.min.js"></script>
      <script src="js/popper.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <script src="js/main.js"></script>
    </body>
  </html>