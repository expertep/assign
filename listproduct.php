<?php
require_once 'config/config.php';
include_once 'template/header.php';

 ?>
<center>

<?php include 'product/listproduct_box.php'; ?>


</div>
<form class="" action="#" method="get">

<nav aria-label="next" class="page">
  <ul class="pagination">
    <?php for($i=0;$i<=$count/10;$i++){?>
    <li class="<?php if($i==$page)echo 'active'; ?>"><a href="<?php echo $_SERVER['SCRIPT_NAME']."?page=".$i;?>"><?php echo $i+1; ?> <span class="sr-only">(current)</span></a></li>

    <?php } ?>
  </ul>
</nav>
</form>
</div>
</center>
<?php
include_once 'template/footer.php';
 ?>
