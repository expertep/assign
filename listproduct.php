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
<form class="" action="#" method="get">

<nav aria-label="next" class="page">
  <ul class="pagination">
    <?php for($i=1;$i<=$count/10;$i++){?>
    <li class="<?php if($i==$page)echo 'active'; ?>"><a href="<?php echo $_SERVER['SCRIPT_NAME']."?page=".$i;?>"><?php echo $i; ?> <span class="sr-only">(current)</span></a></li>

    <?php } ?>
  </ul>
</nav>
</form>
</div>

<?php
include_once 'template/footer.php';
 ?>
