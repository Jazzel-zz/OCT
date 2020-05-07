<?php
    $page_title = 'Admin';   

 include_once('./header.php');

?>
      <div class="content">
        <div class="row">
          <div class="col-12">
            <div class="card card-chart">
              <div class="card-body p-4">
                <div class="h1 text-white styled-font">Admin functions</div>
              <div class="card shadow">
                  <div class="card-body">
                      <h2 class="card-title">Export database</h4>
                      <a class="btn btn-primary" href="./database_backup.php" role="button">Backup Database</a>
                  </div>
              </div>
              <div class="card shadow">
                  <div class="card-body">
                      <h2 class="card-title">Reports</h4>
                      <a class="btn btn-primary" href="./best_selling_products.php" role="button">Top 10 best selling products</a>
                      <a class="btn btn-primary" href="./.php" role="button">Top 10 clients/users (doing maximum shopping)</a>
                  </div>
              </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      
  
<?php  include_once('./footer.php') ?>