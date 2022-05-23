<?php 

$aMan = array();

// This is for categories Begin //

if(isset($_REQUEST['cat'])&&is_array($_REQUEST['cat'])){

    foreach($_REQUEST['cat'] as $sKey=>$sVal){

        if((int)$sVal!=0){

            $aMan[(int)$sVal] = (int)$sVal;

        }

    }

}

// This is for categories Finisih //

?>

<div class="panel panel-default sidebar-menu"><!-- panel panel-default sidebar-menu Begin -->
    <div class="panel-heading"><!-- panel-heading Begin -->
        <h3 class="panel-title">
            KATEGORIE

            <div class="pull-right"><!-- pull-right Begin -->
            
                <a href="JavaScript:Void(0);" style="color:black;">
                
                    <span class="nav-toggle hide-show"><!-- nav-toggle hide-show Begin -->
                    
                        Skryť
                    
                    </span><!-- nav-toggle hide-show Finish -->
                
                </a>
            
            </div><!-- pull-right finish -->

        </h3>
    </div><!-- panel-heading Finish -->

    <div class="panel-collapse collapse-data"><!-- panel-collapse collapse-data Begin -->
        <div class="panel-body scroll-menu"><!-- panel-body 2 Begin -->
            <ul class="nav nav-pills category-menu" id="cetegorie"><!-- nav nav-pills nav-stacked category-menu Begin -->
                
                <?php 
                
                $get_category = "select * from categories";
                $run_category = mysqli_query($con,$get_category);

                while($row_category=mysqli_fetch_array($run_category)){

                    $category_id = $row_category['category_id'];
                    $category_title = $row_category['category_title'];

                    echo "
                    <li class='checkbox checkbox-primary'>

                        <a>

                        <label>

                            <input ";
                            
                            if(isset($aMan[$category_id])){
                                echo "checked='checked'";
                            }
                            
                            echo " value='$category_id' type='checkbox' class='get_category' name='category'>

                            <span>
                            $category_title
                            </span>

                        </label>

                        </a>
                    
                    </li>
                    ";

                }
                
                ?>
                
            </ul><!-- nav nav-pills nav-stacked category-menu Finish -->
        </div><!-- panel-body 2 Finish -->

    </div><!-- panel-collapse collapse-data Finish -->
    
</div><!-- panel panel-default sidebar-menu Finish -->
