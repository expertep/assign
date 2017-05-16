
  <div class="jumbotron cover">
    <div class="container cover">
      <h1><b>DIV</b> SHOP</h1>
      <p>CENTRE of TOOLS</p>
      <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a></p>
    </div>
  </div>

  <div class="jumbotron product">
    <div class="container">
      <h1>promotion</h1>
      <div class="promotion" style="background-image:url(backend/promotion/images.jpg)">
        <br><br>
      </div>
      <div class="promotion" style="background-image:url(backend/promotion/images.jpg)">
        <br><br>
      </div>
    </div>
  </div>
    <?php
      $sql="SELECT count(product_category) AS count,product_category FROM table_product GROUP BY product_category";
      $result = $connect->query($sql);
     ?>
  <div class="jumbotron product">
    <div class="heading">
      <h3>PRODUCT</h3>
      <?php      while ($row = $result->fetch_assoc()){ ?>
      <a href="?cat=<?php echo $row['product_category']; ?>">
        <button class="btn category" type="button">
          <?php echo $row['product_category']; ?> <span class="badge"><?php echo $row['count']; ?></span>
        </button>
      </a>
      <?php } ?>
      <!--<span class="category">ไฟฟ้า</span><span class="category">ไฟฟ้า</span>-->
    </div>
    <div class="container">

       <?php include 'product/listproduct_box.php'; ?>

      <a class="btn btn-primary btn-md" href="listproduct.php" role="button">see more</a>
    </div>
  </div>
