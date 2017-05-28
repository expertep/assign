<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>DIV SHOP</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="css/css.css">
<link rel="stylesheet" type="text/css" href="css/all.css">
<link href="https://fonts.googleapis.com/css?family=Pavanam" rel="stylesheet">

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" type="text/css" href="javascript/css/bootstrap.css">
<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">-->
<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="javascript/js/bootstrap.min.js" ></script>
<script type="text/javascript">
    function show(str) {
           $.ajax({
             type: "GET",
             url: '\product/listproduct_box.php',
             data: "cat=" + str, // appears as $_GET['id'] @ your backend side
             success: function(data) {
                   // data is ur summary
                  $('#list').html(data);
             }
           });
    }
    function save(id) {
        $(".buy."+id).css({"background-color":"rgb(171, 32, 32)","color":"#FFFFFF"});
        $(".buy1."+id).css({"background-color":"rgb(171, 32, 32)","color":"#FFFFFF"});
      document.getElementById("count").innerHTML =1+parseInt(document.getElementById("count").innerHTML);
      document.getElementById("count1").innerHTML =1+parseInt(document.getElementById("count1").innerHTML);
      var str="cart.php";
      $.ajax({
        type: 'POST',
        url: str,
        data: { product_id: id },
        success: function(response) {}
      });
    }
</script>
    <style media="screen">



    </style>
  </head>
  <body class="body">


    <nav class="navbar navbar-inverse">
      <div class="container-fluid">

        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>

        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <li class="active"><a href="member/.."><span class="glyphicon glyphicon-home" aria-hidden="true"></span> HOME<span class="sr-only">(current)</span></a></li>
            <li><a href="#foot">AboutUs</a></li>
          </ul>
      <form action="listproduct.php" method="get" class="navbar-form navbar-left">
        <div class="form-group">
          <input type="text" name="serachtext" class="form-control" placeholder="Search">
        </div>
        <button type="submit" name="serach" class="btn btn-default">ค้นหา</button>
      </form>

        <ul class="nav navbar-nav navbar-right">
          <li><a href="cart.php"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"><span class="badge" id='count'>
            <?php
             if (!isset($_SESSION['cart'])||$_SESSION['cart']==0){
             echo "0";
             }
             else {
               echo count($_SESSION['cart']);
             }
            ?>
            </span></span></a></li>
          <?php  if (!isset($_SESSION['username'])){ ?>
          <li><a href="member.php?action=login">Login</a></li>
          <li><a href="member.php?action=register">Register</a></li>

        <?php } else { ?>



          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>
               <?php echo $_SESSION['username']; ?> <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="member.php?action=profiles">ข้อมูลส่วนตัว</a></li>
              <li><a href="member.php?action=historyorder">ประวัติสั่งซื้อ</a></li>
              <li><a href="member.php?action=historyorder">แจ้งการชำระ</a></li>
              <li><a href="#">โปรโมชั่น</a></li>
              <li role="separator" class="divider"></li>
              <?php if ($_SESSION['user_status'] == "1") { ?>
              <li><a href="backend/">Controller</a></li>

              <?php } ?>
              <li><a href="member.php?action=logout">ออกจากระบบ</a></li>
            </ul>
          </li>

          <?php } ?>
      </ul>
    </div><!-- /.navbar-collapse -->

  </div><!-- /.container-fluid -->
</nav>
