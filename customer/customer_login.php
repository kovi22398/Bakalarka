<div class="box"><!-- box Begin -->
    
  <div class="box-header"><!-- box-header Begin -->
      
      <center><!-- center Begin -->
          
          <h1> Prihlasenie </h1>
          
          <p class="lead"> Máte už u nás účet..? </p>
          
          <p class="text-muted"> V tejto sekcií sa môžete prihlásiť do svojho účtu.<br> Ak u nás ešte nemáte účet tak sa najskôr musíte zaregistrovať. </p>
          
      </center><!-- center Finish -->
      
  </div><!-- box-header Finish -->
   
  <form method="post" action="checkout.php"><!-- form Begin -->
      
      <div class="form-group"><!-- form-group Begin -->
          
          <label> Email </label>
          
          <input name="c_email" type="text" class="form-control" required>
          
      </div><!-- form-group Finish -->
      
       <div class="form-group"><!-- form-group Begin -->
          
          <label> Heslo </label>
          
          <input name="c_pass" type="password" class="form-control" required>
          
      </div><!-- form-group Finish -->
      
      <div class="text-center"><!-- text-center Begin -->
          
          <button name="login" value="Login" class="btn btn-primary">
              
              <i class="fa fa-sign-in"></i> Prihlásiť
              
          </button>
          
      </div><!-- text-center Finish -->     
      
  </form><!-- form Finish -->
   
  <center><!-- center Begin -->
      
     <a href="customer_register.php">
         
         <h3> Nemáte ešte vytvorený účet..? Registrovať tu </h3>
         
     </a> 
      
  </center><!-- center Finish -->
    
</div><!-- box Finish -->


<?php 

if(isset($_POST['login'])){
    
    $customer_email = $_POST['c_email'];
    
    $customer_pass = $_POST['c_pass'];
    
    $select_customer = "select * from customers where customer_email='$customer_email' AND customer_pass='$customer_pass'";
    
    $run_customer = mysqli_query($con,$select_customer);
    
    $get_ip = getRealIpUser();
    
    $check_customer = mysqli_num_rows($run_customer);
    
    $select_cart = "select * from cart where ip_add='$get_ip'";
    
    $run_cart = mysqli_query($con,$select_cart);
    
    $check_cart = mysqli_num_rows($run_cart);
    
    if($check_customer==0){
        
        echo "<script>alert('Zadaný Email alebo heslo je nesprávne!')</script>";
        
        exit();
        
    }
    
    if($check_customer==1 AND $check_cart==0){
        
        $_SESSION['customer_email']=$customer_email;
        
       echo "<script>alert('Úspešne ste sa prihlásili.')</script>"; 
        
       echo "<script>window.open('shop.php','_self')</script>";
        
    }else{
        
        $_SESSION['customer_email']=$customer_email;
        
       echo "<script>alert('Úspešne ste sa prihlásili.')</script>"; 
        
       echo "<script>window.open('cart.php','_self')</script>";
        
    }
    
}

?>