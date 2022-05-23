<div id="footer"><!-- #footer Begin -->
    <div class="container"><!-- container Begin -->
        <div class="row"><!-- row Begin -->
            <div class="col-sm-8 col-md-4"><!-- col-sm-6 col-md-3 Begin -->
               
               <h4>Stránky</h4>
                
                <ul><!-- ul Begin -->
                    <li><a href="cart.php">Košík</a></li>
                    <li><a href="contact.php">Kontakt</a></li>
                    <li><a href="shop.php">Obchod</a></li>
                </ul><!-- ul Finish -->
                
                <hr>
                
                
            </div><!-- col-sm-8 col-md-4 Finish -->
            
            <div class="col-sm-8 col-md-4">
                
                <h4>Uživatelské sekcie</h4>
                
                <ul><!-- ul Begin -->
                    <li>
                    
                        <?php 
                           
                           if(!isset($_SESSION['customer_email'])){
                               
                               echo"<a href='checkout.php'>Prihlásiť</a>";
                               
                           }else{
                               
                              echo"<a href='customer/my_account.php?my_orders'>Môj účet</a>"; 
                               
                           }
                           
                           ?>
                        
                    </li>
                    <li>
                    
                        <?php 
                           
                           if(!isset($_SESSION['customer_email'])){
                               
                               echo"<a href='checkout.php'>Registrácia</a>";
                               
                           }else{ 
                               
                           }
                           
                        ?>
                        
                    </li>
                           
                    <li><a href="terms.php">Doprava a Platba</a></li>
                </ul><!-- ul Finish -->
                
                <hr class="hidden-md hidden-lg hidden-sm">
                
            </div><!-- col-sm-8 col-md-4 Finish -->
            
            <div class="col-sm-8 col-md-4"><!-- col-sm-6 col-md-3 Begin -->
                
                <h4>Kontakt</h4>
                
                <p><!-- p Start -->
                    
                    <strong>R&R creative</strong>
                    <br/>Nosice II/13
                    <br/>020 01 Púchov
                    <br/>0903 175 851
                    <br/>rar.rosina@gmail.com
                    <br/><strong>Mgr. Roman Rosina</strong>
                    
                </p><!-- p Finish -->
                
                <hr class="hidden-md hidden-lg">
                
            </div><!-- col-sm-8 col-md-4 Finish -->
        </div><!-- row Finish -->
    </div><!-- container Finish -->
</div><!-- #footer Finish -->


<div id="copyright"><!-- #copyright Begin -->
    <div class="container"><!-- container Begin -->
        <div class="col-md-6"><!-- col-md-6 Begin -->
            
            <p class="pull-left">&copy; 2020 Zahrady Rosina All Rights Reserve </p>
            
        </div><!-- col-md-6 Finish -->
        <div class="col-md-6"><!-- col-md-6 Begin -->
            
            <p class="pull-right">Theme by: <i>Radoslav Kováč</i></p>
            
        </div><!-- col-md-6 Finish -->
    </div><!-- container Finish -->
</div><!-- #copyright Finish -->