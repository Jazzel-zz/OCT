<?php

 

// search form
        echo ('<div class="row pt-3 pl-3"><div class="col-6">');
        echo('<div class="h1 text-white styled-font">'.$page_title.'</div>');
        echo ('</div>');
        echo ('<div class="col">');
        echo('<a href="create_category.php" type="submit" class="btn btn-md btn-primary mb-2 pull-right"><i class="fa fa-plus"></i></a>');
        echo "</div>";
        echo "</div>";



// display the products if there are any
if($total_rows>0){
 
    echo "<table class='table table-hover table-striped'>";
        echo "<tr style='color:white !important;'>";
            echo "<th colspan='7'>Category</th>";
                echo "<th></th>";
                echo "<th></th>";
                echo "<th></th>";
                echo "<th></th>";

            echo "<th>Actions</th>";
        echo "</tr>";
 
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
 
            extract($row);
 
            echo "<tr>";
                echo "<td colspan='7'>{$name}</td>";
                echo "<td ></td>";
                echo "<td ></td>";
                echo "<td ></td>";
                echo "<td ></td>";
    
                    echo "<td>";
                        // read product button
                        echo "<a href='detail_category.php?id={$id}' class='mr-1 btn btn-primary left-margin'>";
                            echo "<span class='fa fa-list'></span> ";
                    echo "</a>";
 
                    // edit product button
                    echo "<a href='update_category.php?id={$id}' class='ml-1 mr-1 btn btn-info left-margin'>";
                        echo "<span class='fa fa-edit'></span> ";
                    echo "</a>";
 
                    // delete product button
                   echo "<a delete-id='{$id}' class='ml-1 mr-1 btn btn-danger delete-object'>";
                        echo "<span class='fa fa-trash'></span> ";
                    echo "</a>";
 
                echo "</td>";
 
            echo "</tr>";
 
        }
 
    echo "</table>";
 
    // paging buttons
    include_once 'dashboard_paging.php';
}
 
// tell the user there are no products
else{
    echo "<div class='alert alert-danger'>No products found.</div>";
}
