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
<center>
  <div class="jumbotron detailproduct">

        <header class="page-header">
          <h2 class="page-title"><?php echo $row['product_name'] ?></h2>
          <b>ประเภท</b> <?php echo $row['product_category'] ?><br>
          <b>ชนิด</b> <?php echo $row['product_type'] ?>
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
                  <button class="btn btn-lg buy1 <?php echo $row['product_id']; ?>" onclick="save('<?php echo $row['product_id'] ?>')" style="<?php echo $str; ?>">Add Cart</button>

                </div>
          </div>
          <div class="row">
            <div class="col-xs-12 col-sm-12">
            <h4>รายละเอียด</h4>
            <p id="detail">
              <?php echo $row['product_desc'] ?>
            </p>

          </div>
          </div>
  </div>
</center>
  <script type="text/javascript">
    var str= $("#detail").text();
    str=str.replace(/\n/g, "<br />")
    document.getElementById("detail").innerHTML=str;
  </script>
<?php }} ?>
  </body>
</html>
