<div class="box"><!-- box Begin -->
   
   <?php 
    
    $session_email = $_SESSION['customer_email'];
    
    $select_customer = "select * from customers where customer_email='$session_email'";
    
    $run_customer = mysqli_query($con,$select_customer);
    
    $row_customer = mysqli_fetch_array($run_customer);
    
    $customer_id = $row_customer['customer_id'];
    
    ?>
    
    <h1 class="text-center">Spôsob Platby</h1>  
    <p class="text-center"><strong>Pri Prevzatí:</strong> Celkovú cenu zaplatíte až po dodaní Tovaru.<br> Momentálne neni k dispozící žiadny iný spôsob Platby (pracujeme na tom).  </p>
    
     <p class=" btn-primary lead text-center"><!-- lead text-center Begin -->
         
         <a href="order.php?c_id=<?php echo $customer_id ?>"> Pri Prevzatí </a>
         
     </p><!-- lead text-center Finish -->
    
</div><!-- box Finish -->