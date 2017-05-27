<?php
include_once 'config/config.php';
include 'template/header.php';

  if(isset($_GET['id'])){
    $sql="SELECT * FROM table_product WHERE product_id=".$_GET['id'];
    $result = $connect->query($sql);
    while ($row = $result->fetch_assoc()){
      $str='';
      if(isset($_SESSION['cart'])){
        $key = array_search($row['product_id'],$_SESSION['cart']);
        if ((string)$key != ""){
          $str='background-color:rgb(171, 32, 32);color:white;';
        }
       }
?>
<style media="screen">
  .jumbotron.detailproduct{
    margin:auto 20px;
    max-width:1000px;
    background: white;

  }
</style>

<center>
  <div class="jumbotron detailproduct">

        <header class="page-header">
          <h2 class="page-title"><?php echo $row['product_name'] ?></h2>
          <small> <i class="fa fa-clock-o"></i> Last Updated on: <time>วันนี้ พรุ่งนี้ วันมะรืน</time></small>
        </header>
            <div class="row">
                <div class="col-xs-12 col-sm-4">
                  <figure>
                    <img src="<?php echo $row['product_picture'] ?>" width="100%" height="auto">
                  </figure>
                </div>
                <div class="col-xs-12 col-sm-8">
                  <h1><?php echo $row['product_price'] ?> บาท</h1>
                  <button class="form-control buy1 <?php echo $row['product_id']; ?>" onclick="save('<?php echo $row['product_id'] ?>')" style="<?php echo $str; ?>">Add Cart</button>

                </div>
          </div>
          <div class="row">
          <div class="bs-callout bs-callout-danger">
            <h4>รายละเอียด</h4>
            <p>
              <?php echo $row['product_desc'] ?>
            </p>
          </div>
          </div>
  </div>
</center>


<?php }} ?>
  </body>
</html>
