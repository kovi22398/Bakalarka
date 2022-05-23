<?php 

session_start();

include("includes/db.php");
include("functions/functions.php");

?>

<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Záhrady Rosina - realizácia záhrad</title>
    <meta name=”description” content=” Všetko čo nesmie chýbať pri práci na záhrade. ”>     <!-- popis vo vyhladavaci -->
    <meta name="author" content="Radoslav Kováč">
    <link rel="icon" type="image/png" sizes="16x16" href="../images/icon16x16.png">
	<link rel="stylesheet" href="styles/bootstrap-337.min.css">
    <link rel="stylesheet" href="font-awsome/css/font-awesome.min.css">
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>
   
   <div id="top"><!-- Top Begin -->
       
       <div class="container"><!-- container Begin -->
           
           <div class="col-md-6 offer"><!-- col-md-6 offer Begin -->
               
               <a href="#" class="btn btn-success btn-sm">
                   
                   <?php 
                   
                   if(!isset($_SESSION['customer_email'])){
                       
                       echo "Vitajte";
                       
                   }else{
                       
                       echo $_SESSION['customer_email'] . "";
                       
                   }
                   
                   ?>
                   
               </a>
               
           </div><!-- col-md-6 offer Finish -->
           
           <div class="col-md-6"><!-- col-md-6 Begin -->
               
               <ul class="menu"><!-- cmenu Begin -->
                   
                   <li>
                       <?php 
                           
                           if(!isset($_SESSION['customer_email'])){
                       
                                echo "<a href='cart.php'> Ísť do Košíku </a>";

                               }else{

                                echo " <a href='customer/my_account.php'> Môj účet </a> ";

                               }
                           
                           ?>
                   </li>
                   <li>
                       <?php 
                           
                           if(!isset($_SESSION['customer_email'])){
                       
                                echo "<a href='customer_register.php'> Registrácia </a>";

                               }else{

                                echo " <a href='cart.php'> Ísť do Košíku </a> ";

                               }
                           
                           ?>
                   </li>
                   <li>                           
                           <?php 
                           
                           if(!isset($_SESSION['customer_email'])){
                       
                                echo "<a href='checkout.php'> Prihlásiť </a>";

                               }else{

                                echo " <a href='logout.php'> Odhlásiť </a> ";

                               }
                           
                           ?>
                   </li>
                   
               </ul><!-- menu Finish -->
               
           </div><!-- col-md-6 Finish -->
           
       </div><!-- container Finish -->
       
   </div><!-- Top Finish -->
   
   <div id="navbar" class="navbar navbar-default"><!-- navbar navbar-default Begin -->
       
       <div class="container"><!-- container Begin -->
           
           <div class="navbar-header"><!-- navbar-header Begin -->
               
               <a href="index.php" class="navbar-brand home"><!-- navbar-brand home Begin -->
                   
                   <img src="images/logo.png" alt="Zahradnictvo Rosina Logo" class="hidden-xs">
                   <img src="images/logo-mobile.png" alt="Zahradnictvo Rosina Logo Mobile" class="visible-xs">
                   
               </a><!-- navbar-brand home Finish -->
               
                <button class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
                   
                   <span class="sr-only">Toggle Navigation</span>
                   
                   <i class="fa fa-align-justify"></i>
                   
               </button>
               
           </div><!-- navbar-header Finish -->
           
           <div class="navbar-collapse collapse" id="navigation"><!-- navbar-collapse collapse Begin -->
               
               <div class="padding-nav"><!-- padding-nav Begin -->
                   
                   <ul class="nav navbar-nav left"><!-- nav navbar-nav left Begin -->
                       
                        <li class="<?php if($active=='Home') echo"active"; ?>">
                           <a href="index.php">Domov</a>
                       </li>
                       <li class="<?php if($active=='Shop') echo"active"; ?>">
                           <a href="shop.php">Obchod</a>
                       </li>
                       <li class="<?php if($active=='Account') echo"active"; ?>">
                           
                           <?php 
                           
                           if(isset($_SESSION['customer_email'])){
                               
                               echo"<a href='customer/my_account.php'>Môj účet</a>";
                               
                           }
                           
                           ?>
                           
                       </li>
                       <li class="<?php if($active=='Cart') echo"active"; ?>">
                           
                           <?php 
                           
                           if(isset($_SESSION['customer_email'])){
                               
                               echo"<a href='cart.php'>Košík</a>";
                               
                           }
                           
                           ?>

                       </li>
                       <li class="<?php if($active=='Contact') echo"active"; ?>">
                           <a href="contact.php">Kontakt</a>
                       </li>
                       
                   </ul><!-- nav navbar-nav left Finish -->
                   
               </div><!-- padding-nav Finish -->
               
               <a href="cart.php" class="btn navbar-btn btn-primary right"><!-- btn navbar-btn btn-primary Begin -->
                   
                   <i class="fa fa-shopping-cart"></i>
                   
                   <span><?php items(); ?> | </span>
                   
                   <i class="fa fa-money"></i>
                   
                   <span><?php total_price(); ?></span>
                   
                   
               </a><!-- btn navbar-btn btn-primary Finish -->
               
           </div><!-- navbar-collapse collapse Finish -->
           
       </div><!-- container Finish -->
       
   </div><!-- navbar navbar-default Finish -->