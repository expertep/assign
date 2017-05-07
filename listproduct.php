<?php
require_once 'config/config.php';
include_once 'template/header.php';

 ?>

 <div class="jumbotron product">
   <div class="heading">
   <h3>PRODUCT</h3>
 </div>
 <div class="container">

<?php include 'product/listproduct_box.php'; ?>


</div>
<nav aria-label="next" class="page">
  <ul class="pagination">
    <li class="active"><a href="#">1 <span class="sr-only">(current)</span></a></li>
    <li class="disable"><a href="#">2 <span class="sr-only"></span></a></li>
  </ul>
</nav>
</div>

<?php
include_once 'template/footer.php';
 ?>
