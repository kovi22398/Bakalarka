<?php 

$db = mysqli_connect("localhost","root","","zahrady_rosina");

/// begin getRealIpUser functions ///

function getRealIpUser(){
    
    switch(true){
            
            case(!empty($_SERVER['HTTP_X_REAL_IP'])) : return $_SERVER['HTTP_X_REAL_IP'];
            case(!empty($_SERVER['HTTP_CLIENT_IP'])) : return $_SERVER['HTTP_CLIENT_IP'];
            case(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) : return $_SERVER['HTTP_X_FORWARDED_FOR'];
            
            default : return $_SERVER['REMOTE_ADDR'];
            
    }
    
}

/// finish getRealIpUser functions ///

/// begin add_cart functions ///

function add_cart(){
    
    global $db;
    
    if(isset($_GET['add_cart'])){
        
        $ip_add = getRealIpUser();
        
        $p_id = $_GET['add_cart'];
        
        $product_qty = $_POST['product_qty'];
        
        $check_product = "select * from cart where ip_add='$ip_add' AND p_id='$p_id'";
        
        $run_check = mysqli_query($db,$check_product);
        
        if(mysqli_num_rows($run_check)>0){

            echo "<script>window.open('cart.php','_self')</script>";
            
        }else{

            $get_price ="select * from products where product_id='$p_id'";

            $run_price = mysqli_query($db,$get_price);

            $row_price = mysqli_fetch_array($run_price);

            $pro_price = $row_price['product_price'];

            $product_price = $pro_price;
            
            $query = "insert into cart (p_id,ip_add,qty,p_price) values ('$p_id','$ip_add','$product_qty','$product_price')";
            
            $run_query = mysqli_query($db,$query);
            
            echo "<script>window.open('shop.php','_self')</script>";
            
        }
        
    }
    
}

/// finish add_cart functions ///

/// begin getPro functions ///

function getPro(){
    
    global $db;
    
    $get_products = "select * from products order by 1 DESC LIMIT 0,8";
    
    $run_products = mysqli_query($db,$get_products);
    
    while($row_products=mysqli_fetch_array($run_products)){
        
        $pro_id = $row_products['product_id'];
        
        $pro_title = $row_products['product_title'];
        
        $pro_price = $row_products['product_price'];
        
        $pro_img1 = $row_products['product_img1'];
        
        $category_id = $row_products['category_id'];

        $get_category = "select * from categories where category_id='$category_id'";

        $run_category = mysqli_query($db,$get_category);

        $row_category = mysqli_fetch_array($run_category);

        $category_title = $row_category['category_title'];

            $product_price = "  € $pro_price  ";

            $product_sale_price = "";

        
        echo "
        
        <div class='col-md-4 col-sm-6 single'>
        
            <div class='product'>
            
                <a href='details.php?pro_id=$pro_id'>
                
                    <img class='img-responsive' src='admin_area/product_images/$pro_img1'>
                
                </a>
                
                <div class='text'>

                <center>
                
                    <p class='btn btn-primary'> $category_title </p>
                
                </center>
                
                    <h3>
            
                        <a href='details.php?pro_id=$pro_id'>

                            $pro_title

                        </a>
                    
                    </h3>
                    
                    <p class='price'>
                    
                    $product_price
                    
                    </p>
                    
                    <p class='button'>
                    
                        <a class='btn btn-default' href='details.php?pro_id=$pro_id'>

                            Detaily

                        </a>
                    
                        <a class='btn btn-primary' href='details.php?pro_id=$pro_id'>

                            <i class='fa fa-shopping-cart'></i> Pridať do košíka

                        </a>
                    
                    </p>
                
                </div>

            
            </div>
        
        </div>
        
        ";
        
    }
    
}

/// finish getPro functions ///

/// finish getRealIpUser functions ///

function items(){
    
    global $db;
    
    $ip_add = getRealIpUser();
    
    $get_items = "select * from cart where ip_add='$ip_add'";
    
    $run_items = mysqli_query($db,$get_items);
    
    $count_items = mysqli_num_rows($run_items);
    
    echo $count_items;
    
}

/// finish getRealIpUser functions ///

/// begin total_price functions ///

function total_price(){
    
    global $db;
    
    $ip_add = getRealIpUser();
    
    $total = 0;
    
    $select_cart = "select * from cart where ip_add='$ip_add'";
    
    $run_cart = mysqli_query($db,$select_cart);
    
    while($record=mysqli_fetch_array($run_cart)){
        
        $pro_id = $record['p_id'];
        
        $pro_qty = $record['qty'];
            
        $sub_total = $record['p_price']*$pro_qty;
            
        $total += $sub_total;
        
    }
    
    echo "€" . $total;
    
}

/// finish total_price functions ///

/// Begin getProducts(); functions ///

function getProducts(){

    global $db;
    $aWhere = array();

    /// Begin for Manufacturer ///
    
    if(isset($_REQUEST['cat'])&&is_array($_REQUEST['cat'])){

        foreach($_REQUEST['cat'] as $sKey=>$sVal){

            if((int)$sVal!=0){

                $aWhere[] = 'category_id='.(int)$sVal;

            }

        }

    }

    /// Finish for Manufacturer ///  

    $per_page=6;

    if(isset($_GET['page'])){

        $page = $_GET['page'];

    }else{
        $page=1;
    }

    $start_from = ($page-1) * $per_page;
    $sLimit = " order by 1 DESC LIMIT $start_from,$per_page";
    $sWhere = (count($aWhere)>0?' WHERE '.implode(' or ',$aWhere):'').$sLimit;
    $get_products = "select * from products ".$sWhere;
    $run_products = mysqli_query($db,$get_products);
    while($row_products=mysqli_fetch_array($run_products)){
        
        $pro_id = $row_products['product_id'];
        
        $pro_title = $row_products['product_title'];
        
        $pro_price = $row_products['product_price'];
        
        $pro_img1 = $row_products['product_img1'];
        
        $category_id = $row_products['category_id'];

        $get_category = "select * from categories where category_id='$category_id'";

        $run_category = mysqli_query($db,$get_category);

        $row_category = mysqli_fetch_array($run_category);

        $category_title = $row_category['category_title'];


            $product_price = "  € $pro_price  ";

            $product_sale_price = "";

        
        echo "
        
        <div class='col-md-4 col-sm-6 center-responsive'>
        
            <div class='product'>
            
                <a href='details.php?pro_id=$pro_id'>
                
                    <img class='img-responsive' src='admin_area/product_images/$pro_img1'>
                
                </a>
                
                <div class='text'>

                <center>
                
                    <p class='btn btn-primary'> $category_title </p>
                
                </center>
                
                    <h3>
            
                        <a href='details.php?pro_id=$pro_id'>

                            $pro_title

                        </a>
                    
                    </h3>
                    
                    <p class='price'>
                    
                    $product_price
                    
                    </p>
                    
                    <p class='button'>
                    
                        <a class='btn btn-default' href='details.php?pro_id=$pro_id'>

                            Detaily

                        </a>
                    
                        <a class='btn btn-primary' href='details.php?pro_id=$pro_id'>

                            <i class='fa fa-shopping-cart'></i> Pridať do košíka

                        </a>
                    
                    </p>
                
                </div>
            
            </div>
        
        </div>
        
        ";
        
    }

}

/// finish getProducts(); functions ///

/// begin getPaginator(); functions ///

function getPaginator(){

    global $db;

    $per_page=6;
    $aWhere = array();
    $aPath = '';

    /// Begin for Manufacturer ///
    
    if(isset($_REQUEST['cat'])&&is_array($_REQUEST['cat'])){

        foreach($_REQUEST['cat'] as $sKey=>$sVal){

            if((int)$sVal!=0){

                $aWhere[] = 'category_id='.(int)$sVal;
                $aPath .= 'cat[]='.(int)$sVal.'&';

            }

        }

    }

    /// Finish for Manufacturer ///    
    
    $sWhere = (count($aWhere)>0?' WHERE '.implode(' or ',$aWhere):'');
    $query = "select * from products".$sWhere;
    $result = mysqli_query($db,$query);
    $total_records = mysqli_num_rows($result);
    $total_pages = ceil($total_records / $per_page);

    echo "<li> <a href='shop.php?page=1";
    if(!empty($aPath)){

        echo "&".$aPath;

    }

    echo "'>".'Začiatok'."</a></li>";

    for($i=1; $i<=$total_pages; $i++){

        echo "<li> <a href='shop.php?page=".$i.(!empty($aPath)?'&'.$aPath:'')."'>".$i."</a></li>";

    };

    echo "<li> <a href='shop.php?page=$total_pages";

    if(!empty($aPath)){

        echo "&".$aPath;

    }

    echo "'>".'Koniec'."</a></li>";

}

/// finish getPaginator(); functions ///

?>