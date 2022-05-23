<?php 
    session_start();
    if(!isset($_SESSION['customer_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<?php 

    if(isset($_GET['delete_order'])){
        
        $delete_id = $_GET['delete_order'];
        
        $delete_order = "delete from customer_orders where order_id='$delete_id'";
        
        $run_delete = mysqli_query($con,$delete_order);
        
        if($run_delete){
            
            echo "<script>alert('Jedna objednávka bola Vyamazaná.')</script>";
            
            echo "<script>window.open('my_account.php?my_orders','_self')</script>";
            
        }else{
            
            echo "<script>window.open('my_account.php?my_orders','_self')</script>";
            
        }
        
    }

?>

<?php } ?>