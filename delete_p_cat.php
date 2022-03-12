<?php 
    include 'include/db.php'
?>

<?php
if(isset($_GET['delete_p_cat'])){
    $delete_p_cat_id = $_GET['delete_p_cat'];
    $delete_p_cat = "delete from product_categories where p_cat_id = ' $delete_p_cat_id'";
    $run_delete_p_cat= mysqli_query($con , $delete_p_cat);
    if( $run_delete_p_cat){
        echo "<script>alert('product category has been deleted successfully')</script>";
        echo "<script>window.open('index.php?view_p_cat','_self')</script>";
    }

}

?>