<?php 

    $active='Account';
    include("includes/header.php");

?>
   
   <div id="content"><!-- #content Begin -->
       <div class="container"><!-- container Begin -->
           <div class="col-md-12"><!-- col-md-12 Begin -->
               
               <ul class="breadcrumb"><!-- breadcrumb Begin -->
                   <li>
                       <a href="index.php">Domov</a>
                   </li>
                   <li>
                       <?php 
                
                        if(!isset($_SESSION['customer_email'])){

                            echo "<a> Prihlásenie </a>";

                        }else{

                            echo "<a href='cart.php'> Kosík </a>";

                        }

                        ?>
                       
                   </li>
                   
                   
                       <?php 
                
                        if(isset($_SESSION['customer_email'])){
                            ?>
                   
                   
                            <li>
                                <a>Spôsob platby</a>

                            </li>
                   
                   
                        <?php
                        } ?>
                       

               </ul><!-- breadcrumb Finish -->
               
           </div><!-- col-md-12 Finish -->
           
           <div class="col-md-12"><!-- col-md-12 Begin -->
           
                <?php 
                
                if(!isset($_SESSION['customer_email'])){
                    
                    include("customer/customer_login.php");
                    
                }else{
                    
                    include("payment_options.php");
                    
                }
                
                ?>
           
           </div><!-- col-md-12 Finish -->
           
       </div><!-- container Finish -->
   </div><!-- #content Finish -->
   
   <?php 
    
    include("includes/footer.php");
    
    ?>
    
    <script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script>
    
    
</body>
</html>