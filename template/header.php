<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>DIV SHOP</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="css/css.css">
<link href="https://fonts.googleapis.com/css?family=Pavanam" rel="stylesheet">

<!-- Latest compiled and minified CSS -->

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="javascript/js/bootstrap.min.js" ></script>
<script type="text/javascript">
  /*  $(document).ready(function(){
          if(200<$(".body").scrollTop()){
            $("nav").css({"opacity":"1"});
          }
          else{
            $("nav").css({"opacity":"0"});
          }
    });
    $(document).scroll(function(){
          if(200<$(".body").scrollTop()){
            $("nav").css({"opacity":"1"});
          }
          else{
            $("nav").css({"opacity":"1"});
          }

    });*/
</script>
  </head>
  <body class="body">
    <!-- Latest compiled and minified JavaScript -->

    <nav class="navbar navbar-default">
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
            <li><a href="#">Link</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="#">Action</a></li>
                <li><a href="#">Another action</a></li>
                <li><a href="#">Something else here</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="#">Separated link</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="#">One more separated link</a></li>
              </ul>
            </li>
          </ul>
      <form class="navbar-form navbar-left">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">ค้นหา</button>
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
          <?php  if (!isset($_SESSION['username'])){ ?>
          <li><a href="member.php?action=login">Login</a></li>
          <li><a href="member.php?action=register">Register</a></li>

        <?php } else { ?>


      </span></span></a></li>



          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>
               <?php echo $_SESSION['username']; ?> <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="member.php?action=profiles">ข้อมูลส่วนตัว</a></li>
              <li><a href="member.php?action=historyorder">ประวัติสั่งซื้อ</a></li>
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
<div class="searchpage">

</div>
